function httpGet(theUrl)
{
    var xmlHttp = null;

    xmlHttp = new XMLHttpRequest();
    xmlHttp.open( "GET", theUrl, false );
    xmlHttp.send( null );
    return xmlHttp.responseText;
}

crypt_calc_background_color = typeof crypt_calc_background_color == "undefined" ? "#FFFFFF" : crypt_calc_background_color;
crypt_calc_transperency = typeof crypt_calc_transperency == "undefined" ? true : crypt_calc_transperency;
crypt_calc_border_width = typeof crypt_calc_border_width == "undefined" ? 1 : crypt_calc_border_width;
crypt_calc_border_color = typeof crypt_calc_border_color == "undefined" ? "#CCCCCC" : crypt_calc_border_color;
crypt_calc_border_corners = typeof crypt_calc_border_corners == "undefined" ? "rounded" : crypt_calc_border_corners;
crypt_calc_font_family = typeof crypt_calc_font_family == "undefined" ? "Arial" : crypt_calc_font_family;
crypt_calc_font_size = typeof crypt_calc_font_size == "undefined" ? "medium" : crypt_calc_font_size;
crypt_calc_font_color = typeof crypt_calc_font_color == "undefined" ? "#000000" : crypt_calc_font_color;

crypt_calc_options = eval('(' + httpGet("https://api.cryptonator.com/api/currencies") + ')');
crypt_calc_optionsArr = new Array();

for (var i = 0; i < crypt_calc_options.rows.length; ++i) {
    crypt_calc_optionsArr.push(crypt_calc_options.rows[i].name + " (" + crypt_calc_options.rows[i].code + ")");
}

crypt_calc_optionsArr.sort();

function outList(item) {
    var text = "";

    for (var i = 0; i < crypt_calc_optionsArr.length; ++i) {
        var code = crypt_calc_optionsArr[i].match(/.*?\(([0-9a-z$-]+)\)/i)[1];

        if (code == item)
            text += '<option value="' + code + '" selected>' +
                crypt_calc_optionsArr[i] + '</option>';
        else
            text += '<option value="' + code + '">' +
                crypt_calc_optionsArr[i] + '</option>';
    }

    return text;
}


if (crypt_calc_transperency)
    crypt_calc_background_color = 'transparent';

switch (crypt_calc_font_size) {
    case 'small':
        crypt_calc_font_size = "80%";
        break;

    case 'medium':
        crypt_calc_font_size = "100%";
        break;

    case 'large':
        crypt_calc_font_size = "150%";
        break;
}

crypt_calc_style = 'background: ' + crypt_calc_background_color +
    '; border: ' + crypt_calc_border_width + 'px solid ' + crypt_calc_border_color + ';' +
    'font-family: ' + crypt_calc_font_family +'; font-size: ' + crypt_calc_font_size +
    '; color: ' + crypt_calc_font_color + ';';

crypt_calc_font_style = 'font-family: ' + crypt_calc_font_family +'; font-size: ' + crypt_calc_font_size + '; height: auto;';

if (crypt_calc_border_corners == "square") {
    crypt_calc_style += "-webkit-border-radius: 0 !important; -moz-border-radius: 0 !important; border-radius: 0 !important;";
}

document.write('\
<div class="cryptonatorwidget" style="border-radius:4px;padding:10px;' + crypt_calc_style + '">\
    <table width="100%" cellpadding="6">\
		<tr>\
			<td style="width:100%;">\
				<input id="amount-1" type="text" placeholder="enter amount" style="width:100%;' + crypt_calc_font_style + '">\
			</td>\
		</tr>\
        <tr>\
            <td style="width:100%;">\
                <select id="cur-1" style="width:100%;' + crypt_calc_font_style + '">' + outList("BTC") + '</select>\
            </td>\
        </tr>\
		<tr>\
			<td style="width:100%;">\
				<input id="amount-2" type="text" placeholder="enter amount" style="width:100%;' + crypt_calc_font_style + '">\
			</td>\
		</tr>\
        <tr>\
            <td style="width:100%;">\
                <select id="cur-2" style="width:100%;' + crypt_calc_font_style + '">' + outList("USD") + '</select>\
            </td>\
        </tr>\
	</table>\
    <div style="text-align:center;font-size:10px;opacity:0.6;padding-top:10px;">Powered by <a href="https://www.cryptonator.com" style="color:' + crypt_calc_font_color + ';" target="_blank">Cryptonator Bitcoin wallet</a></div>\
</div>');

crypt_calc_price12 = 0;
crypt_calc_price21 = 0;

function loadRates() {
    var crypt_calc_cur1 = document.getElementById('cur-1').value;
    var crypt_calc_cur2 = document.getElementById('cur-2').value;

    var crypt_calc_getPar = eval('(' + httpGet("https://api.cryptonator.com/api/ticker/" +
        crypt_calc_cur1 + "-" + crypt_calc_cur2) + ')');

    if (crypt_calc_getPar.success == true)
        crypt_calc_price12 = crypt_calc_getPar.ticker.price;
    else
        crypt_calc_price12 = 0;

    crypt_calc_getPar = eval('(' + httpGet("https://api.cryptonator.com/api/ticker/" +
        crypt_calc_cur2 + "-" + crypt_calc_cur1) + ')');

    if (crypt_calc_getPar.success == true)
        crypt_calc_price21 = crypt_calc_getPar.ticker.price;
    else
        crypt_calc_price21 = 0;
}

loadRates();

document.getElementById('cur-1').onchange = function () {
    loadRates();
    if (document.getElementById('amount-1').value > 0) {
        if (crypt_calc_price12 != 0)
            document.getElementById('amount-2').value = document.getElementById('amount-1').value * crypt_calc_price12;
        else
            document.getElementById('amount-2').value = "No price available";
    }
}

document.getElementById('cur-2').onchange = function () {
    loadRates();
    if (document.getElementById('amount-2').value > 0) {
        if (crypt_calc_price21 != 0)
            document.getElementById('amount-1').value = document.getElementById('amount-2').value * crypt_calc_price21;
        else
            document.getElementById('amount-1').value = "No price available";
    }
}

document.getElementById('amount-1').onkeyup = function () {
        if (crypt_calc_price12 != 0)
            document.getElementById('amount-2').value = document.getElementById('amount-1').value * crypt_calc_price12;
        else
            document.getElementById('amount-2').value = "No price available";
}

document.getElementById('amount-2').onkeyup = function () {
    if (crypt_calc_price21 != 0)
        document.getElementById('amount-1').value = document.getElementById('amount-2').value * crypt_calc_price21;
    else
        document.getElementById('amount-1').value = "No price available";
}