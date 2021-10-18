/* ------------------  Topbar Bitcoin Tracker ------------------ */
var baseUrl = "https://widgets.cryptocompare.com/";
var scripts = document.getElementsByClassName("topbarBitcoinTracker");
var embedder = scripts[scripts.length - 1];
var cccTheme = {
    "General": {
        "background": "#1b1a1a",
        "priceText": "#f9f9f9",
        "enableMarquee": true
    },
    "Currency": {
        "color": "#f9f9f9"
    },
    "Trend": {
        "colorDown": "#ff0000"
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
    var theUrl = baseUrl + 'serve/v3/coin/header?fsyms=BTC,ETH,XMR,LTC&tsyms=USD,EUR,CNY,GBP';
    s.src = theUrl + (theUrl.indexOf("?") >= 0 ? "&" : "?") + "app=" + appName;
    embedder.parentNode.appendChild(s);
})();