(function ($, window, document, undefined) {
  'use strict';

  var WWSJS = window.WWSJS = window.WWSJS || {};

  WWSJS.ZONE_MAP = {
    tc1: ['us', 'ca', 'mx'],
    tc2: ['be', 'ch', 'de', 'es', 'eu', 'cz', 'dk', 'fi',
          'hu', 'ie', 'no', 'pl', 'se', 'fr', 'uk', 'it',
          'bg', 'gr', 'il', 'ro', 'ru', 'za', 'tr', 'ae', 'ua'],
    tc3: ['cn', 'kh', 'hk', 'in', 'id', 'kr', 'my', 'ph', 'sg', 'tw', 'th', 'vn', 'mm', 'au']
  };

  WWSJS.LANG_MAP = {
    e: 'en',
    j: 'ja',
    es: 'es',
    f: 'fr',
    d: 'de',
    c: 'zh',
    ch: 'zh',
    k: 'ko',
    i: 'id',
    t: 'th',
    v: 'vn',
  };

  WWSJS.SHORT_LANG_MAP = {
    en: 'e',
    ja: 'j',
    es: 'es',
    fr: 'f',
    de: 'd',
    cn_zh: 'c',
    hk_zh: 'c',
    tw_zh: 'ch',
    ko: 'k',
    id: 'i',
    th: 't',
    vn: 'v',
  };
  
  WWSJS.COUNTRY_URL_TO_COOKIE = {
    sz: 'ch',
    eur: 'eu',
    ind: 'in'
  };
  
  WWSJS.COUNTRY_COOKIE_TO_URL = {
    ch: 'sz',
    eu: 'eur',
    in: 'ind'
  };
  
  WWSJS.SC_LANG_MAP = {
    j: 'jp',
    e: 'en',
    c: 'ji',
    i: 'id',
    k: 'kr',
    ch: 'fa',
    t: 'th',
    v: 'vn',
    d: 'de',
    f: 'fr',
    es: 'es'
  };

  WWSJS.SC_COUNTRY_MAP = {
    eu: 'eur',
    ind: 'in'
  };

})(jQuery, window, document);

