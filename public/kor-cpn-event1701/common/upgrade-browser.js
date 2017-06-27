/*
  指定ブラウザ、指定バージョン以下はリダイレクト
*/

(function () {
  var REDIRECT_URL = '/wws/upgrade-browser/';
  
  var TARGET_BROWSER = [
    ['IE', 8]
  ];

  for (var i = 0; i < TARGET_BROWSER.length; i++) {
    if (TARGET_BROWSER[i][0] === 'IE') {
      var version = /msie\s?([0-9]{1,})/.exec(window.navigator.userAgent.toLowerCase());
      if (version && parseInt(version[1], 10) <= TARGET_BROWSER[i][1]) {
        window.location.href = REDIRECT_URL;
      }
    }
  }
})();
