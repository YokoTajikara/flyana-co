(function ($, window, document, undefined) {
  'use strict';

  var WWSJS = window.WWSJS = window.WWSJS || {};
  WWSJS.EXTERNAL_LIST = WWSJS.EXTERNAL_LIST || {};

  /*
    run: 外部読み込みを実行する場合true
        []配列の指定で個別指定
        tc1なら["tc1"]、tc1とcnなら["tc1", "cn"]
    mbox: mbox対応コンテンツ
    target: mbox以外のコンテンツの場合、対象要素を指定
            beforeで自身のscriptタグの直前に挿入
    filePath: 単一ファイルの場合、ファイルパスを入力
    fileName: 外部ファイル名
    すべて同一なら"外部ファイル名"
    tcで分ける場合以下のようにする
    {
      tc1: "newsletter-banner",
      tc2: "newsletter-banner",
      tc3: "newsletter"
    }
    fileType: デフォルトファイルタイプ
    templateSource: テンプレートソース
    templateName: テンプレートファイル
    すべて同一なら"テンプレート名"
    tcで分ける場合以下のようにする
    {
      tc1: "newsletter-banner",
      tc2: "newsletter-banner",
      tc3: "newsletter"
    }
    templateLogin: ログインの有無でテンプレートファイルを分ける場合true
    login: ログインの有無で外部ファイルを分ける場合
          true,falseで全国の指定
          []配列の指定で個別指定
          tc1なら["tc1"]、tc1とcnなら["tc1", "cn"]
    branch: 支店管理ならtrue
    async: trueで非同期通信
    cookieLocale: 国言語判定をcookie値から判定する場合true
    reInitComponent: 再初期化が必要なコンポーネントが存在すれば指定
  */
  
  /*
   html側
   
   ・通常
    <script type="text/javascript">
    WWSJS.getContent('WWSJS.EXTERNAL_LIST名');
    </script>
    
    ・デフォルトfileTypeとは別のファイルを個別に指定する場合
    <script type="text/javascript">
    WWSJS.getContent('WWSJS.EXTERNAL_LIST名', 'html');
    </script>
  */


  WWSJS.EXTERNAL_LIST["emergency-notice"] = {
    run: true,
    mbox: false,
    target: "before",
    filePath: "/_shared-wws-top-oparate/cmn/data/emergency-notice.json",
    fileType: "json",
    templateName: "emergency-notice",
    login: false,
    branch: false,
    async: true,
    reInitComponent: ""
  };
  WWSJS.EXTERNAL_LIST["global-nav"] = {
    run: true,
    mbox: false,
    target: "#navbar",
    fileName: "global-nav",
    fileType: "json",
    templateName: "global-nav",
    login: false,
    branch: false,
    async: false,
    reInitComponent: ["linkSwitch"]
  };
  WWSJS.EXTERNAL_LIST["contact"] = {
    run: true,
    mbox: false,
    target: "#support-nav",
    fileName: "contact",
    fileType: "json",
    templateName: "contact",
    login: false,
    branch: false,
    async: true,
    reInitComponent: ""
  };
  WWSJS.EXTERNAL_LIST["language"] = {
    run: true,
    mbox: false,
    target: "#utility-nav",
    fileName: "language",
    fileType: "json",
    templateName: "language",
    login: false,
    branch: false,
    async: true,
    reInitComponent: "toggle"
  };
  WWSJS.EXTERNAL_LIST["main-visual"] = {
    run: true,
    mbox: true,
    target: "",
    fileName: "main-visual",
    fileType: "json",
    templateName: "main-visual",
    login: false,
    branch: true,
    async: true,
    reInitComponent: "mainSlider"
  };
  WWSJS.EXTERNAL_LIST["short-nav"] = {
    run: true,
    mbox: false,
    target: "#short-nav-area",
    fileName: "short-nav",
    fileType: "json",
    templateName: "short-nav",
    login: false,
    branch: false,
    async: true,
    reInitComponent: "shortNavSlider"
  };
  WWSJS.EXTERNAL_LIST["fares"] = {
    run: true,
    mbox: true,
    target: "",
    fileName: "fares",
    fileType: "json",
    templateName: "fares",
    login: false,
    branch: true,
    async: true,
    reInitComponent: "fare"
  };
  WWSJS.EXTERNAL_LIST["fare-movie"] = {
    run: true,
    mbox: true,
    target: "",
    fileName: "fare-movie",
    fileType: "json",
    templateName: "fare-movie",
    login: false,
    branch: true,
    async: true,
    reInitComponent: ""
  };
  WWSJS.EXTERNAL_LIST["campaign-top"] = {
    run: true,
    mbox: true,
    target: "",
    fileName: "campaign-top",
    fileType: "json",
    templateName: "campaign-top",
    login: ["tc1", "tc3", "cn"],
    branch: true,
    async: true,
    reInitComponent: ["linkSwitch", "imageSwitch"]
  };
  WWSJS.EXTERNAL_LIST["campaign-btm"] = {
    run: true,
    mbox: false,
    target: "#campaign-area .btm-bnr-wrap",
    fileName: "campaign-btm",
    fileType: "json",
    templateName: "campaign-btm",
    login: ["tc1", "tc3", "cn"],
    branch: false,
    async: true,
    reInitComponent: ["linkSwitch", "imageSwitch"]
  };
  WWSJS.EXTERNAL_LIST["newsletter"] = {
    run: true,
    mbox: true,
    target: "",
    fileName: "newsletter",
    fileType: "json",
    templateName: "newsletter",
    templateLogin: true,
    login: true,
    branch: true,
    async: true,
    reInitComponent: "imageSwitch"
  };
  WWSJS.EXTERNAL_LIST["social"] = {
    run: true,
    mbox: false,
    target: "#social-area",
    fileName: "social",
    fileType: "json",
    templateName: "social",
    login: false,
    branch: false,
    async: true,
    reInitComponent: ""
  };
  WWSJS.EXTERNAL_LIST["information"] = {
    run: true,
    mbox: false,
    target: "before",
    fileName: "information",
    fileType: "json",
    templateName: "information",
    login: false,
    branch: false,
    async: true,
    reInitComponent: ""
  };
  WWSJS.EXTERNAL_LIST["information-branch"] = {
    run: true,
    mbox: false,
    target: "before",
    fileName: "information-branch",
    fileType: "json",
    templateName: "information-branch",
    login: false,
    branch: true,
    async: true,
    reInitComponent: ""
  };
  WWSJS.EXTERNAL_LIST["information-list"] = {
    run: true,
    mbox: false,
    target: "before",
    fileName: "information-list",
    fileType: "json",
    templateName: "information-list",
    login: false,
    branch: false,
    async: true,
    reInitComponent: ""
  };
  WWSJS.EXTERNAL_LIST["footer"] = {
    run: true,
    mbox: false,
    target: "#footer",
    fileName: "footer",
    fileType: "json",
    templateName: "footer",
    login: false,
    branch: false,
    async: true,
    reInitComponent: ""
  };
  
})(jQuery, window, document);

