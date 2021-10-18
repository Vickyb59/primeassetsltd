baseUrl = "https://widgets.cryptocompare.com/";
var scripts = document.getElementsByClassName("bitcoin-chart");
var embedder = scripts[scripts.length - 1];
var cccTheme = {
    "General": {
        "background": "#ffb400",
        "borderWidth": "0",
        "borderColor": "fff",
        "borderRadius": "0"
    },
    "Header": {
        "background": "#ffb400",
        "color": "#fff",
        "displayFollowers": false
    },
    "Followers": {
        "background": "#f36b05",
        "color": "#fed17b",
        "borderColor": "#f36b05",
        "counterBorderColor": "#f36b05"
    },
    "Data": {
        "priceColor": "#fff",
        "infoLabelColor": "#fff",
        "infoValueColor": "#fff"
    },
    "Chart": {
        "fillColor": "#f78715",
        "borderColor": "#fed785"
    },
    "Trend": {
        "colorUnchanged": "#fcc671"
    },
    "Conversion": {
        "color": "#fff"
    }
};
(function() {
    var appName = encodeURIComponent(window.location.hostname);
    if (appName == "") {
        appName = "local";
    }
    var s = document.createElement("script");
    s.type = "text/javascript";
    s.async = true;
    var theUrl = baseUrl + 'serve/v2/coin/chart?fsym=BTC&tsym=USD&period=1M';
    s.src = theUrl + (theUrl.indexOf("?") >= 0 ? "&" : "?") + "app=" + appName;
    embedder.parentNode.appendChild(s);
})();