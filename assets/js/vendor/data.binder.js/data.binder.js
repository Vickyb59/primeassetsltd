/**
 * Simple data binder
 *
 * @author Mike Kalinin <www.intermike@gmail.com
 * @link https://github.com/intermike/data.binder.js
 * @license GPL
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 */
;(function ($, document, window, undefined)
{

    "use strict";

    var pluginName = 'databinder';

    var dataBinder = function (that, element, path)
    {

        var self = this;

        this.that = that;
        this.element = element;
        this.path = path;
        this.methods = {
            'input': ['none', []],
            'output': ['none', []],
            'filterin': ['none', []],
            'filterout': ['none', []],
            'event': ['none', []]
        };

        var parts = $.map(element.data('bind').split(','), $.trim);

        for (var i = 0, l = parts.length; i < l; i++) {
            var $segments = $.map(parts[i].split(':'), $.trim);
            var $m = $segments[0];
            var $arg = $segments[1] ? $.map($segments[1].replace(/\]/g, "").split(/\[/), $.trim) : [''];
            var $f = $arg.shift();

            if ($m == 'in') {
                this._add_method('input', $f, $arg);
            } else if ($m == 'out') {
                this._add_method('output', $f, $arg);
            } else if ($m == 'f') {
                this._add_method('filterin', $f, $arg);
                this._add_method('filterout', $f, $arg);
            } else if ($m == 'e') {
                this._add_method('event', $f, $arg);
            } else if ($m == 't') { //trigger
                element.bind($f, $.proxy(function ()
                {
                    this.that._update();
                }, this));
            }
        }

        if (this.methods['input'][0] != 'none') {
            element.bind('change recalculate', function (event)
            {
                self.event(event);
            });
        }

        //Initializing associated data with empty value
        this.that._data_set(path, this._run('filterin', ''));
    };

    dataBinder.prototype = {

        read: function ()
        {
            var value = this._run('input', this.element);
            value = this._run('filterin', value);
            return value;
        },
        input: function ()
        {
            if (this.methods['input'][0] == 'none') return false;
            var value = this.read();
            var oldvalue = this.that._data_get(this.path);
            this.that._data_set(this.path, value);
            return oldvalue != value;
        },
        write: function (value)
        {
            this._run('output', this.element, this._run('filterout', value), value);
            return true;
        },
        output: function ()
        {
            if (this.methods['output'][0] == 'none') return false;
            var value = this.that._data_get(this.path);
            return this.write(value);
        },
        event: function (event)
        {
            var is_updated = this.input();

            if (this._custom_events(event))
                is_updated = true;

            if (is_updated && !this.element.is('[data-bind-no-trigger]')) this.that._update();
        },

        _custom_events: function (event)
        {
            if (this.methods['event'][0] == 'none') return false;

            return Boolean(this._run('event', event, this.element));
        },

        _add_method: function (type, func, arg)
        {
            this.methods[type] = [typeof this.that.opts[type][func] == 'function' ? func : 'none', arg];
        },

        _run: function ()
        {

            if (arguments.length === 0) return;
            var args = [];
            Array.prototype.push.apply(args, arguments);

            var type = args.shift();

            var method = this.that.opts[type][this.methods[type][0]];
            if (typeof method == 'undefined') return null;
            return this.that.opts[type][this.methods[type][0]].apply(this, args.concat(this.methods[type][1]));
        }
    };

    $[pluginName] = function (parent, options)
    {

        var self = this;

        var defaults = {
            money: {
                decimals: 2,
                separator: ',',
                thousands: '`',
                cutzero: true
            },
            noInitial: false
        };

        self.data = options.data ? $.extend({}, options.data) : {};
        self.binder = {};

        delete options.data;

        self.opts = {};

        self.opts.calculate = function (data)
        {
        };

        self.opts.event = {
            none: function (element)
            {
                return false;
            },
            click: function (element)
            {
                return true;
            }
        };

        self.opts.input = {
            none: function (element)
            {
                return null;
            },
            text: function (element)
            {
                return element.text();
            },
            html: function (element)
            {
                return element.html();
            },
            value: function (element)
            {
                return element.val();
            },
            radio: function (element)
            {
                return $("input:radio[name ='" + element.attr('name') + "']:checked").val();
            },
            checkbox: function (element)
            {
                return element.is(':checked') ? element.val() : null;
            },
            prop: function (element, property)
            {
                return element.prop(property);
            },
            attr: function (element, attribute)
            {
                return element.attr(attribute);
            },
            'class': function (element, attribute)
            {
                return element.hasClass(attribute);
            },
            visible: function (element, attribute)
            {
                return element.is(':visible');
            },
            submit: function (element, attribute)
            {
                return true;
            }
        };

        self.opts.output = {
            none: function (element, value, unformatted)
            {
                return null;
            },
            text: function (element, value, unformatted)
            {
                return element.text(value);
            },
            html: function (element, value, unformatted)
            {
                return element.html(value);
            },
            value: function (element, value, unformatted)
            {
                return element.val(value);
            },
            prop: function (element, value, unformatted, property)
            {
                element.prop(property, value);
            },
            attr: function (element, value, unformatted, attribute)
            {
                element.attr(attribute, value);
            },
            'class': function (element, value, unformatted, attribute)
            {
                element.toggleClass(attribute, unformatted ? true : false);
            },
            visible: function (element, value, unformatted, attribute)
            {
                var v = unformatted ? true : false;
                if (attribute == 'not') v = !v;
                element.toggle(v);
            },
            price: function (element, value, unformatted)
            {
                element.find('.pr-sign').toggle(unformatted <= 0);
                element.find('.pr-wrap').toggle(unformatted != 0);
                element.find('.pr').text(value.replace('-', ''));
            }
        };

        self.opts.filterin = {
            none: function (value)
            {
                return value;
            },
            int: function (value)
            {
                value = parseInt(value);
                if (isNaN(value)) value = 0;
                return value;
            },
            float: function (value)
            {
                if (!value) return 0.0;
                value = parseFloat(value.replace(/[^0-9\.\-]/, ''));
                if (isNaN(value)) value = 0.0;
                return value;
            },
            bool: function (value)
            {
                return Boolean(value);
            },
            currency: function (value)
            {
                return self.opts.filterin.float(value);
            }
        };

        self.opts.filterout = {
            none: function (value)
            {
                return value;
            },
            int: function (value)
            {
                return Math.round(value);
            },
            float: function (value)
            {
                return value.toFixed(2);
            },
            bool: function (value)
            {
                return Boolean(value);
            },
            currency: function (value)
            {
                var res = self.formatMoney(value, self.opts.money.decimals, self.opts.money.separator, self.opts.money.thousands);
                if (self.opts.money.cutzero) res = res.replace(new RegExp('\\' + self.opts.money.separator + '0+$'), '');
                return res;
            }
        };

        self.opts = $.extend(true, {}, defaults, self.opts, options);

        parent.on('recalculate', function ()
        {
            self._get();
            self._update();
        });

        this.init(parent);
    };

    $[pluginName].prototype = {

        init: function (parent)
        {

            var self = this;

            self.binder = [];

            parent.find('[data-bind]').each(function ()
            {
                var element = $(this);
                var attr = element.attr('data-name');
                if (typeof attr == 'undefined' || attr == false) attr = element.attr('name');
                if (!attr) return;

                var path = $.map(attr.replace(/\]/g, "").split(/\[/), $.trim);

                var index = self.binder.push(new dataBinder(self, element, path));
                $.data(element.get(0), 'data-binding', self.binder[index - 1]);
            });

            this._get();
            if (!self.opts.noInitial) {
                this._update();
            }
        },

        _data_set: function getValueAt(keys, value)
        {
            var object = this.data,
                i      = 0,
                len    = keys.length;

            while (i < len - 1) {
                if (typeof object[keys[i]] == 'undefined')
                    object[keys[i]] = {};

                object = object[keys[i]];

                i++;
            }

            var oldvalue = object[keys[i]];
            object[keys[i]] = value;
            return oldvalue;
        },

        _data_get: function getValueAt(keys, def)
        {
            var object = this.data,
                i      = 0,
                len    = keys.length;

            while (i < len - 1) {

                if (typeof object[keys[i]] == 'undefined')
                    object[keys[i]] = {};

                object = object[keys[i]];
                i++;
            }

            if (typeof object[keys[i]] == 'undefined')
                return def;

            return object[keys[i]];
        },

        _get: function ()
        {
            for (var i = 0, l = this.binder.length; i < l; i++)
                this.binder[i].input();
            for (i = 0, l = this.binder.length; i < l; i++)
                this.binder[i]._custom_events();
        },

        _set: function ()
        {
            for (var i = 0, l = this.binder.length; i < l; i++)
                this.binder[i].output();
        },

        _update: function ()
        {
            var self = this;
            if (typeof this.opts.calculate == 'function') {
                this.opts.calculate(this.data, function (newdata)
                {
                    self.data = newdata;
                    self._set();
                });
            } else {
                self._set();
            }
        },

        formatMoney: function (n, c, d, t)
        {
            var c = isNaN(c = Math.abs(c)) ? 2 : c,
                d = d == undefined ? "." : d,
                t = t == undefined ? ":" : t,
                s = n < 0 ? "-" : "",
                i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "",
                j = (j = i.length) > 3 ? j % 3 : 0;
            return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
        }
    };

    $.fn[pluginName] = function (options)
    {
        var instance = new $[pluginName](this, options);

        this.each(function ()
        {
            $.data(this, pluginName, instance);
        });

        return instance;
    };

    return $.fn[pluginName];

})(jQuery, document, window);

