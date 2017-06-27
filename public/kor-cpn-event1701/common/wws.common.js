// console.log
if (!('console' in window)) {
    window.console = {};
    window.console.log = function(str){return str;};
}

(function ($, window, document, undefined) {
  'use strict';

  var WWSJS = window.WWSJS = window.WWSJS || {};

  WWSJS.Utils = WWSJS.Utils || {};
  WWSJS.component = WWSJS.component || {};
  
  WWSJS.setting = {
    fixedWinMode: $('html').hasClass('fixed'), // fixedチェック
    //currentWinNameList: WWSJS.Utils.getWinSizeNameList(), // 初期サイズチェック
    currentWinNameList: [],
    beforeWinNameList: [],
    triggerInNameList: [],
    triggerOutNameList: [],
    fadeTransitionTime: 300,
    slideTransitionTime: 500,
    isSpMode: $('html').hasClass('spMode'), // spサイトならtrue
    easing: 'easeOutQuint',
    cssEase: ($('html').hasClass('no-cubicbezierrange')) ? 'linear' : 'cubic-bezier(0.23, 1, 0.32, 1)',
    breakpoint: [0, 768, 1025, '*']
  }
  
  WWSJS.setting.responsive = [ // レスポンシブ設定
    {
      size: [WWSJS.setting.breakpoint[0], WWSJS.setting.breakpoint[1]],
      name: 'ws'
    },{
      size: [WWSJS.setting.breakpoint[1], WWSJS.setting.breakpoint[2]],
      name: 'wm'
    },{
      size: [WWSJS.setting.breakpoint[2], WWSJS.setting.breakpoint[3]],
      name: 'wl'
    }/*,{
      size: [0, 1200],
      name: 'wsm'
    },*/
  ]

  // fixedの場合
  if(WWSJS.setting.fixedWinMode) {
    WWSJS.setting.responsive = [
      {
        size: [0, '*'],
        name: 'wfixed'
      }
    ]
  }
  
  
  WWSJS.Utils.userAgent = (function() {
    var name = window.navigator.userAgent.toLowerCase(),
    nameFunc = function(){ return name;},
    isIE = function(){ return ( name.indexOf('msie') >= 0 || name.indexOf('trident') >= 0 );},
    isEdge = function(){ return name.indexOf('edge') >= 0;},
    isChrome = function(){ return name.indexOf('chrome') >= 0;},
    isFirefox = function(){ return name.indexOf('firefox') >= 0;},
    isSafari = function(){ return name.indexOf('safari') >= 0;},
    isOpera = function(){ return name.indexOf('opera') >= 0;},
    isiPhone = function(){ return name.indexOf('iphone') >= 0;},
    isiPod = function(){ return name.indexOf('ipod') >= 0;},
    isiPad = function(){ return name.indexOf('ipad') >= 0;},
    isiOS = function(){ return ( isiPhone() || isiPod() || isiPad() );},
    isAndroid = function(){ return name.indexOf('android') >= 0;},
    isAndroidDefault = function(){ return ( isAndroid() && name.indexOf('chrome') < 0 && name.indexOf('firefox') < 0 );},
    // isAndroidTablet = function(){ return ( isAndroid() && name.indexOf('mobile') < 0 );},
    // isAndroidPhone = function(){ return ( isAndroid() && name.indexOf('mobile') >= 0 );},
    isAndroidTablet = function(){ return ( isAndroid() && /.*android.*[0-9]\ssafari.*/.test(name));},
    isAndroidPhone = function(){ return ( isAndroid() && !/.*android.*[0-9]\ssafari.*/.test(name));},
    isWindowsPhone = function(){ return (isIE() && name.indexOf('iemobile') >= 0);},
    isTablet = function(){ return ( isiPad() || isAndroidTablet() );},
    // isSmartPhone = function(){ return ( isiPhone() || isAndroidPhone() || isWindowsPhone() );},
    isSmartPhone = function(){ return ( isiPhone() || isAndroidPhone() );},
    isMobileDevice = function(){ return ( isSmartPhone() || isTablet() );},
    isMac = function(){ return ( name.indexOf('mac') >= 0 || name.indexOf('ppc') >= 0);},
    isAnaApl = function(){ return name.indexOf('anaapl') >= 0;},
    verArray = function(){ return _getVerArray();};

    function _getVerArray() {
      var array = (function() {
        if (isIE()) {
          return /(msie|rv:?)\s?([0-9]{1,})([\.0-9]{1,})/.exec(name);
        } else if (isiOS()) {
          return /(os)\s([0-9]{1,})([\_0-9]{1,})/.exec(name);
        } else if (isAndroid()) {
          return /(android)\s([0-9]{1,})([\.0-9]{1,})/.exec(name);
        }/* else if (isWindowsPhone()) {
          return /.../.exec(name);
        }*/
      })();

      return (array) ? [parseInt(array[2], 10), array[2] + array[3]] : false;
    }

    //IEバージョン
    var isIEVer = function(targetVer) {
        return (isIE() && verArray()[0] == targetVer);
    },
    //IEバージョン（小なり判定）
    isIEVerLt = function(targetVer) {
        return (isIE() && verArray()[0] < targetVer);
    },
    //IEバージョン（小なりイコール判定）
    isIEVerLte = function(targetVer) {
        return (isIE() && verArray()[0] <= targetVer);
    },
    //IEバージョン（大なり判定）
    isIEVerGt = function(targetVer) {
        return (isIE() && verArray()[0] > targetVer);
    },
    //IEバージョン（大なりイコール判定）
    isIEVerGte = function(targetVer) {
        return (isIE() && verArray()[0] >= targetVer);
    };

    return {
      name: nameFunc,
      isIE: isIE,
      isEdge: isEdge,
      isChrome: isChrome,
      isFirefox: isFirefox,
      isSafari: isSafari,
      isOpera: isOpera,
      isiPhone: isiPhone,
      isiPod: isiPod,
      isiPad: isiPad,
      isiOS: isiOS,
      isAndroid: isAndroid,
      isAndroidDefault: isAndroidDefault,
      isAndroidTablet: isAndroidTablet,
      isAndroidPhone: isAndroidPhone,
      isTablet: isTablet,
      isSmartPhone: isSmartPhone,
      isMobileDevice: isMobileDevice,
      isWindowsPhone: isWindowsPhone,
      isAnaApl: isAnaApl,
      isIEVer: isIEVer,
      isIEVerLt: isIEVerLt,
      isIEVerLte: isIEVerLte,
      isIEVerGt: isIEVerGt,
      isIEVerGte: isIEVerGte,
      getVer: verArray[0],
      getVerFull: verArray[1],
      verArray: verArray
    };
  })();

  WWSJS.Utils.getUaList = function() {

    var uaList = [];
    var ua = WWSJS.Utils.userAgent;

    // IE
    if (ua.isIE()) {
        uaList.push('isIE');
        if (ua.isIEVer(11)) { uaList.push('isIE11'); }
        if (ua.isIEVer(10)) { uaList.push('isIE10'); }
        if (ua.isIEVer(9)) { uaList.push('isIE9'); }
        if (ua.isIEVer(8)) { uaList.push('isIE8'); }
        if (ua.isIEVer(7)) { uaList.push('isIE7'); }
        if (ua.isIEVer(6)) { uaList.push('isIE6'); }
        if (ua.isIEVerLte(8)) { uaList.push('isLegacy'); }
        if (ua.isWindowsPhone()) { uaList.push('isWinPhone'); }
    }
    
    // 他のブラウザ
    if (!ua.isIE()) {
      if (ua.isEdge()) {
        uaList.push('isEdge');
      } else if (ua.isChrome()) {
        uaList.push('isChrome');
      } else if (ua.isFirefox()) {
        uaList.push('isFirefox');
      } else if (ua.isSafari()) {
        uaList.push('isSafari');
      } else if (ua.isOpera()) {
        uaList.push('isOpera');
      }
    }

    // iOS
    if (ua.isiOS()) {
        uaList.push('isiOS');
        if (ua.isiPad()) { uaList.push('isiPad'); }
        if (ua.isiPhone()) { uaList.push('isiPhone'); }
        if (ua.isiPod()) { uaList.push('isiPod'); }
    }

    // android
    if (ua.isAndroid()) {
        uaList.push('isAndroid');
        // android標準ブラウザ
        if(ua.isAndroidDefault()){  uaList.push('isAndroidDefault'); }
        // androidタブレット
        if (ua.isTablet()) {  uaList.push('isAndroidTablet'); }
    }

    // device
    if (ua.isTablet()) { uaList.push('isTablet'); }
    if (ua.isSmartPhone()) { uaList.push('isSmartPhone'); }
    if (ua.isMobileDevice()) { uaList.push('isMobileDevice'); }
    if (!ua.isMobileDevice()) { uaList.push('isOtherDevice'); }

    //Mac
    //if (ua.isMac()) { uaList.push('isMac'); }

    return uaList.join(' ');
  };
  
  WWSJS.Utils.setFocusLoop = function (flg, el, contentName) {
    if (flg === 'on') {
      $(document).on('keydown.focusloop', function (e) {
        var c = e.which ? e.which : e.keyCode;
        if (c === 9) {
          var $focus = $(this).find(':focus');
          var $focusElements = WWSJS.Utils.getfocusElement(el, contentName);
          if (e.shiftKey && $focus[0] == $focusElements.eq(0)[0]) {
            e.preventDefault();
            $focusElements.last().focus();
          } else if (!e.shiftKey && $focus[0] == $focusElements.last()[0]) {
            e.preventDefault();
            $focusElements.eq(0).focus();
          }
        }
      })
    } else {
      $(document).off('keydown.focusloop');
      var $openBtn = (contentName) ? $(el).find(contentName) : $(el);
      if ($openBtn[0]) $openBtn.focus();
    }
  };

  WWSJS.Utils.getfocusElement = function (el, contentName) {
    var $el = (contentName) ? $(el).find(contentName) : $(el);
    return $el.find('button:visible, a[href]:visible, input:visible, select:visible, textarea:visible, object:visible, *[tabindex][tabindex!="-1"]').not('disabled');
  };
  
  WWSJS.Utils.getOtherClass = function() {
    var classList = [];
    // Modernizr
    if (Modernizr) {
      if (Modernizr.touch) { classList.push('isTouchDevice'); }
      if (!Modernizr.flexbox) { classList.push('no-flexbox'); }
      if (!Modernizr.cubicbezierrange) { classList.push('no-cubicbezierrange'); }
    }
    // https
    if( document.location.protocol === 'https:') {
        classList.push('isHttps');
    }
    return classList.join(' ');
  };

  WWSJS.Utils.getWWSPathNum = function () {
    var pathname = location.pathname.split('/');
    var ret = false;
    if (/^\/wws\/|^\/asw\/wws\//.test(location.pathname)) {
      for (var i = 0; i < pathname.length; i++) {
        if (pathname[i] == 'wws') {
          ret = i;
        }
      }
    }
    return ret;
  };

  // 現在のcountry language 取得 (cookie版)
  WWSJS.Utils.getCookieCountryCode = function () {
    var amcglobal = $.cookie('amcglobal');
    var toplocale = $.cookie('toplocale');
    var amcglobalList = (amcglobal) ? amcglobal.split('/') : [];
    var toplocaleList = (toplocale) ? toplocale.split('/') : [];
    var country = amcglobalList[0] || window.DEFAULT_COUNTRY || '';
    var raw_country = country;
    var language = amcglobalList[1] || window.DEFAULT_LANGUAGE || '';
    var lang_short = (function () {
      if (language == 'zh') {
        return WWSJS.SHORT_LANG_MAP[country + '_' + language];
      } else {
        return WWSJS.SHORT_LANG_MAP[language];
      }
    })();
    
    if (country == 'eu' && toplocaleList[0] == 'eu') {
      country = toplocaleList[3];
    }

    return {
      lang_short: lang_short || '',
      language: language || '',
      country: country || '',
      raw_country: raw_country || ''
    }
  };
  
  // 現在のcountry取得
  WWSJS.Utils.getCountryCode = function () {
    var wwsPathNum = WWSJS.Utils.getWWSPathNum();
    var pathname = location.pathname.split('/');
    return {
      country: (wwsPathNum !== false) ? pathname[wwsPathNum + 1] : '',
      raw_country: (wwsPathNum !== false) ? pathname[wwsPathNum + 1] : ''
    }
  };

  // 現在のlanguage取得
  WWSJS.Utils.getLanguageCode = function () {
    var wwsPathNum = WWSJS.Utils.getWWSPathNum();
    var pathname = location.pathname.split('/');
    var langCode = (pathname[wwsPathNum + 2] && WWSJS.LANG_MAP[pathname[wwsPathNum + 2]]) ? WWSJS.LANG_MAP[pathname[wwsPathNum + 2]] : '';
    return {
      lang_short: (wwsPathNum !== false) ? pathname[wwsPathNum + 2] : '',
      language: (wwsPathNum !== false) ? langCode :  ''
    }
  };

  // 現在のzone取得
  WWSJS.Utils.getZoneCode = function (country) {
    if (!country) return '';
    var countryCode = (WWSJS.COUNTRY_URL_TO_COOKIE[country]) ? WWSJS.COUNTRY_URL_TO_COOKIE[country] : country;
    for (var i = 1; i <= 3; i++){
      for (var j = 0; j < WWSJS.ZONE_MAP['tc' + i].length; j++){
        if (countryCode === WWSJS.ZONE_MAP['tc' + i][j]) {
          return 'tc' + i;
        }
      }
    }
    return '';
  };

  // locale情報まとめて取得
  WWSJS.Utils.getLocale = function (flg) {
    var country, lang, zone;
    if (flg == 'cookie') {
      country = WWSJS.Utils.getCookieCountryCode();
      lang = {
        lang_short: country.lang_short,
        language: country.language
      };
    } else {
      country = WWSJS.Utils.getCountryCode();
      lang = WWSJS.Utils.getLanguageCode();
    }
    zone = WWSJS.Utils.getZoneCode(country.country);

    return {
      country: country.country,
      up_country: country.country.toUpperCase(),
      raw_country: country.raw_country,
      up_raw_country: country.raw_country.toUpperCase(),
      lang_short: lang.lang_short,
      up_lang_short: lang.lang_short.toUpperCase(),
      language: lang.language,
      up_language: lang.language.toUpperCase(),
      zone: zone,
      up_zone: zone.toUpperCase(),
      login: $('html').hasClass('login')
    }
  };
  
  // SCClick用
  WWSJS.Utils.getSCClick = function (name) {
    return WWSJS.locale.up_raw_country + '_' + WWSJS.locale.up_language + '_' + name;
  };
  WWSJS.Utils.getSCClickCookie = function (name) {
    var country = (WWSJS.COUNTRY_COOKIE_TO_URL[WWSJS.cookieLocale.raw_country]) ? WWSJS.COUNTRY_COOKIE_TO_URL[WWSJS.cookieLocale.raw_country] : WWSJS.cookieLocale.raw_country;
    return country.toUpperCase() + '_' + WWSJS.cookieLocale.up_language + '_' + name;
  };
  
  // sitecatalyst用
  WWSJS.Utils.getSCParam = function (cookie) {
    var COUNTRY = (function () {
      var country = (cookie) ? WWSJS.cookieLocale.raw_country :  WWSJS.locale.raw_country;
      var retCountry = (WWSJS.SC_COUNTRY_MAP[country]) ? WWSJS.SC_COUNTRY_MAP[country] : country;
      retCountry = retCountry.toUpperCase();
      return retCountry;
    })();

    var LANG = (function () {
      var lang = (cookie) ? WWSJS.cookieLocale.lang_short : WWSJS.locale.lang_short;
      var retLang = WWSJS.SC_LANG_MAP[lang];
      retLang = (retLang) ? retLang.toUpperCase() : retLang;
      return retLang;
    })();
    
    return {
      COUNTRY: COUNTRY,
      LANG: LANG,
      ZONE: (cookie) ? WWSJS.cookieLocale.zone : WWSJS.locale.zone
    }
  };

  // mbox用
  WWSJS.Utils.getMboxName = function (name) {
    return WWSJS.locale.raw_country + '_' + WWSJS.locale.language + '_' + name;
  };
  
  // locale情報を保存
  WWSJS.locale = (function () {
    return WWSJS.Utils.getLocale();
  })();
  WWSJS.cookieLocale = (function () {
    return WWSJS.Utils.getLocale('cookie');
  })();
  
  // 外部読み込み
  WWSJS.getContent = function (contentName, fileType) {
    if (!WWSJS.EXTERNAL_LIST[contentName]) return;
    var setting = WWSJS.EXTERNAL_LIST[contentName];
    var locale = (setting.cookieLocale) ? WWSJS.cookieLocale : WWSJS.locale;
    if (setting.cookieLocale && !WWSJS.cookieLocale.country) return;
    var extName = (fileType) ? fileType : setting.fileType;
    
    var reInitCheck = function (reInitComponent) {
      if (Object.prototype.toString.call(reInitComponent) === '[object Array]') {
        for (var i = 0; i < reInitComponent.length; i++) {
          if (reInitComponent[i] && WWSJS.components[reInitComponent[i]]) {
            WWSJS.components[reInitComponent[i]].reinit();
          }
        }
      } else {
        if (reInitComponent && WWSJS.components[reInitComponent]) {
          WWSJS.components[reInitComponent].reinit();
        }
      }
    }
    
    var areaCheck = function (area) {
      if (area === true) {
        return true;
      } else if (area === false) {
        return false;
      } else if (Object.prototype.toString.call(area) === '[object Array]') {
        for (var i = 0; i < area.length; i++) {
          if (area[i] == "tc1" || area[i] == "tc2" || area[i] == "tc3") {
            if (area[i] == locale.zone) {
              return true;
            }
          } else if (WWSJS.ZONE_MAP[locale.zone]) {
            for (var j = 0; j < WWSJS.ZONE_MAP[locale.zone].length; j++) {
              if (area[i] == WWSJS.ZONE_MAP[locale.zone][j]) {
                return true;
              }
            }
          }
        }
        return false;
      } else {
        return false;
      }
    };
    
    var setName = function (data) {
      if (Object.prototype.toString.call(data) == "[object Object]") {
        if (data[locale.zone]) {
          return data[locale.zone];
        }
      } else {
        return data;
      }
    };
    
    // 外部読み込みファイルのファイルパス取得
    var getContentPath = function (fileName, login, branch, extName, locale) {
      var baseUrl = (function () {
        if (branch) {
          return '/_shared-wws-top-contents';
        } else {
          return '/_shared-wws-top-oparate';
        }
      })();
      
      var country = (WWSJS.COUNTRY_COOKIE_TO_URL[locale.raw_country]) ? WWSJS.COUNTRY_COOKIE_TO_URL[locale.raw_country] : locale.raw_country;
      var loginName = (login) ? (locale.login) ? '_mem' : '_non' : '';
      return baseUrl + '/' + locale.zone + '/' + country + '/' + locale.lang_short + '/data/' + fileName + loginName + '.' + extName;
    };
    
    if (!areaCheck(setting.run)) return;
    
    var $target = (function () {
      if (setting.target === 'before') {
        var currentScript = document.currentScript || (function() {
          var nodeList = document.getElementsByTagName('script');
          return nodeList.item(nodeList.length - 1);
        })();
        return $(currentScript);
      } else {
        return (setting.mbox) ? $('.mboxWwsTarget').last() : $(setting.target);
      }
    })();
    
    if (setting.mbox) {
      if($target[0] && $target.hasClass('mboxCreated')) {
        // reInitCheck(reInitComponent);
        return;
      }
    } else {
      if(!$target[0]) return;
    }

    var dataType = (function () {
      if (extName === 'html') {
        return 'html'
      } else if (extName === 'json') {
        return 'json'
      } else if (extName === 'txt') {
        return 'text'
      } else if (extName === 'xml') {
        return 'json'
      } else if (extName === 'js') {
        return 'script'
      }
    })();

    var useTemplate = (function () {
      if (extName === 'html') {
        return false
      } else {
        return true
      }
    })();

    var device = (function () {
      if (WWSJS.Utils.userAgent.isiOS()) {
        if (WWSJS.Utils.userAgent.isiPad()) {
          return 'ipad'
        } else {
          return 'iphone'
        }
      } else if (WWSJS.Utils.userAgent.isAndroid()) {
        if (WWSJS.Utils.userAgent.isAndroidTablet()) {
          return 'androidtablet'
        } else {
          return 'android'
        }
      } else {
        return 'pc'
      }
    })();

    var login = areaCheck(setting.login);
    var filePath = (setting.filePath) ? setting.filePath : getContentPath(setName(setting.fileName), login, setting.branch, extName, locale);
    var templateSource = setting.templateSource;
    var templateName = setName(setting.templateName);
    var templateLogin = (login && setting.templateLogin) ? (locale.login) ? '_mem': '_non' : '';
    var reInitComponent = setting.reInitComponent;

    var setHtml = function (template) {
      $.ajax({
        type: 'GET',
        dataType: dataType,
        async: setting.async,
        url: filePath
      })
      .done(function(data){
        var html;

        if (useTemplate && dataType === 'json') {
          // json → {data: data}で包む
          html = template.render({data: data}, {
            locale: locale,
            device: device
          });
        } else {
          html = data;
        }

        if (setting.target === 'before') {
          $target.before(html);
        } else {
          $target.html(html);
          $target.addClass('loaded');
        }

        reInitCheck(reInitComponent);
      })
      .fail(function(data, textStatus, errorThrown){})
      .always(function(data) {});
    };

    if (!useTemplate) {
      setHtml();
    } else if (templateName) {
      $.ajax({
        type: 'GET',
        dataType: 'text',
        async: setting.async,
        url: '/_shared-wws/template/' + templateName + templateLogin + '.tmpl'
      })
      .done(function(templateCode){
        var template = $.templates(templateCode);
        setHtml(template);
      })
      .fail(function(data, textStatus, errorThrown){})
      .always(function(data) {});
    } else if (templateSource) {
      var template = $.templates(templateSource);
      setHtml(template);
    }
  };
  
  // 外部読み込み ダイレクト版
  WWSJS.getContentDirect = function (filePath) {
    var $target = (function () {
      var currentScript = document.currentScript || (function() {
        var nodeList = document.getElementsByTagName('script');
        return nodeList.item(nodeList.length - 1);
      })();
      return $(currentScript);
    })();

    var setHtml = function () {
      $.ajax({
        type: 'GET',
        dataType: 'html',
        async: false,
        url: filePath
      })
      .done(function(data){
        $target.before(data);
      })
      .fail(function(data, textStatus, errorThrown){})
      .always(function(data) {});
    };

    setHtml();
  };


  WWSJS.Utils.getUniqueId = function(myStrong) {
    var strong = (myStrong) ? myStrong : 1000;
    return new Date().getTime().toString(16).substr(5) + Math.floor(strong * Math.random()).toString(16)
  };
  
  WWSJS.Utils.getConpomentListNum = function(id, list) {
    var num;
    for (var i = 0, len = list.length; i < len; i++) {
      if (id === list[i].id) {
        num = i;
        break;
      }
    }
    return num;
  };
  
  WWSJS.Utils.isHtmlScrollable = function() {
    var bodyS = document.body.scrollTop;
    var htmlS = document.documentElement.scrollTop;
    if (bodyS === 0 && htmlS === 0) {
      $('html').scrollTop(1);
      var flg = ($('html').scrollTop() > 0);
      $('html').scrollTop(0);
      return flg;
    } else if (bodyS !== 0) {
      return false
    } else {
      return true
    }
  };

  WWSJS.Utils.debounce = function (func, lnterval) {
    var timer;
    return function () {
      clearTimeout(timer);
      timer = setTimeout(function () {
        func.call();
      }, lnterval);
    }
  };

  WWSJS.Utils.throttle = function (func, limit) {
    var flg = false;
    return function () {
      if (!flg) {
        flg = true;
        func.call();
        setTimeout(function () {
          flg = false;
        }, limit);
      }
    }
  };
  

  WWSJS.Utils.getWinSizeNameList = function () {
    var responsiveSize = WWSJS.setting.responsive,
        w = window.innerWidth || document.documentElement.clientWidth || 0,
        winName = [];

    for (var i = 0, len = responsiveSize.length; i < len; i++) {
      if(responsiveSize[i].size[1] == '*') {
        if(w >= responsiveSize[i].size[0]) {
          winName.push(responsiveSize[i].name);
        }
      } else {
        if(w >= responsiveSize[i].size[0] && w < responsiveSize[i].size[1]) {
          winName.push(responsiveSize[i].name);
        }
      }
    }
    return winName;
  };

  // currentWinNameListかその他のリストに指定の名前が存在するかどうか
  WWSJS.Utils.winNameCheck = (function () {
    // currentWinNameListを見る場合
    function hasName (winName) {
      return _check(winName, WWSJS.setting.currentWinNameList);
    }
    // その他 listで配列指定
    function hasOtherName (winName, winNameList) {
      return _check(winName, winNameList);
    }
    function _check (winName, winNameList) {
      var returnArr = [];

      if(Object.prototype.toString.call(winName) === '[object Array]') {
        for (var i = 0, ilen = winName.length; i < ilen; i++) {
            for (var j = 0, jlen = winNameList.length; j < jlen; j++) {
                if (winName[i] === winNameList[j]) {
                    returnArr.push(winName[i]);
                }
            }
        }
      } else {
        for (var i = 0, len = winNameList.length; i < len; i++) {
            if (winName === winNameList[i]) {
                returnArr.push(winName);
            }
        }
      }
      
      return (returnArr.length !== 0)
    }
    
    return {
      hasName: hasName,
      hasOtherName: hasOtherName
    }
  })();

  // リサイズ
  WWSJS.responsive = (function () {
    function init () {
      _resizeEvent();
      resizeCheck();
    }

    function resizeCheck () {
  		var sizeNameList = WWSJS.Utils.getWinSizeNameList();
      var isEqual = false;
      var triggerIn = [];
      var triggerOut = [];

      for (var i = 0; i < sizeNameList.length; i++) {
        if (sizeNameList[i] !== WWSJS.setting.currentWinNameList[i]) {
          isEqual = true;
        }
      }

      if(isEqual) {
        WWSJS.setting.beforeWinNameList = WWSJS.setting.currentWinNameList;
        WWSJS.setting.currentWinNameList = sizeNameList;
        triggerIn = WWSJS.setting.triggerInNameList = _difference(WWSJS.setting.currentWinNameList, WWSJS.setting.beforeWinNameList);
        triggerOut = WWSJS.setting.triggerOutNameList = _difference(WWSJS.setting.beforeWinNameList, WWSJS.setting.currentWinNameList);
        
        var send = [
          WWSJS.setting.currentWinNameList,
          WWSJS.setting.beforeWinNameList,
          triggerIn,
          triggerOut
        ];
        
        //$('html').trigger('winBreakpoint', send);
        _breakpointEvent(null, send[0],send[1],send[2],send[3]);
      }
  	}
    
    function _difference (array, others) {
      var resultArray = []
      for (var i = 0, ilen = array.length; i < ilen; i++) {
        var flg = false;
        for (var j = 0, jlen = others.length; j < jlen; j++) {
          if (array[i] === others[j]) {
              flg = true;
          }
        }
        if (!flg) {
          resultArray.push(array[i])
        }
      }
      return resultArray;
    }

    function _resizeEvent () {
      var resizeCheckThrottle = WWSJS.Utils.throttle(resizeCheck, 25);
      $(window).on('resize', function() {
        resizeCheckThrottle();
      });
      $(window).on('orientationchange', function() {
        resizeCheck();
      });
    }

    // $('html').on('winBreakpoint', _breakpointEvent);
    
    function _breakpointEvent (e, current, before, triggerIn, triggerOut) {
      // console.log(e, current, before, triggerIn, triggerOut)
      $('html')
        .removeClass(WWSJS.setting.beforeWinNameList.join(' '))
        .addClass(WWSJS.setting.currentWinNameList.join(' '));

      for (var key in WWSJS.components) {
        if (WWSJS.components.hasOwnProperty(key) && WWSJS.components[key].isResponsive) {
          if(typeof WWSJS.components[key].change !== 'undefined' && typeof WWSJS.components[key].change === 'function') {
            WWSJS.components[key].change(current, before, triggerIn, triggerOut);
          }
        }
      }
    }
    
    return {
      init: init,
      resizeCheck: resizeCheck
    }
  })();


  // component登録
  WWSJS.component = function(name, o){
    if (WWSJS.components.hasOwnProperty(name)) {
      throw new Error('The component name is duplicate');
    } else {
      if (Object.prototype.toString.call(o) === '[object Object]') {
        WWSJS.components[name] = o;
        WWSJS.component.boot(name);
        WWSJS.component.init(name);
      } else if (Object.prototype.toString.call(o) === '[object Function]') {
        WWSJS.components[name] = (o)();
        WWSJS.component.boot(name);
        WWSJS.component.init(name);
      }
    }
  };
  
  WWSJS.component.bootSet = function (componentName) {
    if (WWSJS.components.hasOwnProperty(componentName) && typeof WWSJS.components[componentName].boot !== 'undefined' && typeof WWSJS.components[componentName].boot === 'function' && !WWSJS.components[componentName].isBooted) {
      WWSJS.components[componentName].boot();
      WWSJS.components[componentName].isBooted = true;
    }
  };

  WWSJS.component.initSet = function (componentName, type) {
    if (type === 'init') {
      if (WWSJS.components.hasOwnProperty(componentName) && typeof WWSJS.components[componentName].init !== 'undefined' && typeof WWSJS.components[componentName].init === 'function' && !WWSJS.components[componentName].isReady) {
        WWSJS.components[componentName].init();
        WWSJS.components[componentName].isReady = true;
      }
    } else if (type === 'reinit') {
      if (WWSJS.components.hasOwnProperty(componentName) && typeof WWSJS.components[componentName].reinit !== 'undefined' && typeof WWSJS.components[componentName].reinit === 'function') {
        WWSJS.components[componentName].reinit();
      }
    } else {
    }
  };
  
  WWSJS.component.boot = function (name) {
    if (name === undefined) {
      for (var key in WWSJS.components) {
        WWSJS.component.bootSet(key)
      }
    } else {
      WWSJS.component.bootSet(name)
    }
  };

  WWSJS.component.init = function (name, type) {
    if (!WWSJS.domReady && type !== 'force') return;
    
    var initType = (type === undefined) ? 'init' : type;

    if (name === undefined) {
      for (var key in WWSJS.components) {
        WWSJS.component.initSet(key, initType)
      }
    } else {
      WWSJS.component.initSet(name, initType)
    }
  };

  // 該当componentのreinit実行
  WWSJS.componentReInit = function (name) {
    WWSJS.component.init(name, 'reinit');
  };
  // readyを待たずにcomponentのinit実行
  WWSJS.componentInitForce = function (name) {
    WWSJS.component.init(name, 'force');
  };
  // あとからcomponent要素を追加した場合に（追加要素に対してinitが必要な場合）
  WWSJS.addComponent = function(componentName, el){
    if (WWSJS.components.hasOwnProperty(componentName)) {
      if (typeof WWSJS.components[componentName].addComponent !== 'undefined' && typeof WWSJS.components[componentName].addComponent === 'function') {
        WWSJS.components[componentName].addComponent(el);
      }
    }
  };
  
  
  WWSJS.domReady = false;
  
  (function init() {
    $('html')
      .removeClass('no-js')
      .addClass('js')
      .addClass(WWSJS.Utils.getUaList())
      .addClass(WWSJS.Utils.getOtherClass())
      .addClass(WWSJS.Utils.getWinSizeNameList().join(' '));
      
    // 画面サイズチェック
    WWSJS.responsive.init();
    // boot
    WWSJS.component.boot();
    
    $(function() {
      // init
      WWSJS.domReady = true;
      WWSJS.component.init();
    });
  })();


})(jQuery, window, document);



