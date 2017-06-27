$(function() {
  fullscreen();
  $( window ).resize(fullscreen);

  $('#bxslider').bxSlider({
    speed:1500,
    auto: true,
    autoHover: true,
    //adaptiveHeight:true,
    //adaptiveHeightSpeed:1500,
  });

  $('#bxslider_usa').bxSlider({
    speed:1500,
    auto: true,
    autoHover: true,
    autoDelay: 1000
    //adaptiveHeight:true,
    //adaptiveHeightSpeed:1500,
  });

  /*$('.terms-slider').bxSlider({
    minSlides: 2,
    maxSlides: 4,
    slideWidth: 240,
    slideMargin: 0,
    pager: false,
    infiniteLoop: false,
    //hideControlOnEnd: true
  });*/

  //go to top
  $(window).scroll(function () {
    if ($(this).scrollTop() > 500) {
        $(".scrollup").addClass("show");
    } else {
        $(".scrollup").removeClass("show");
    }
  });
  $(".scrollup").click(function() {
    $("html, body").animate({ scrollTop: 0 }, "slow");
    return false;
  });

  function fullscreen() {
    $(".section-main").css({ 'height': "inherit" });
    var headerH = $('header').height() + 80;
    $(".section-main .container").css({ 'padding-top': headerH });
    $(".section-thank .container").css({ 'padding-top': headerH });
    console.log(headerH);
    var windowH = $(window).height();
    if(windowH > $(".section-main").height()){
      $(".section-main").height(windowH);
    }
    $(".section-thank").css({ 'height': "inherit" });
    if(windowH > $(".section-thank").height()){
      $(".section-thank").height(windowH - 70);
    }
  }

});


wow = new WOW(
  {
    boxClass:     'wow',      // default
    animateClass: 'animated', // default
    offset:       100,          // default
    mobile:       true,       // default
    live:         true        // default
  }
)
wow.init();

/* img change */
$(function() {
  // 置換の対象とするclass属性。
  var $elem = $('.js-image-switch');
  // 置換の対象とするsrc属性の末尾の文字列。
  var sp = '_sp.';
  var pc = '_pc.';
  // 画像を切り替えるウィンドウサイズ。
  var replaceWidth = 640;

  function imageSwitch() {
    // ウィンドウサイズを取得する。
    var windowWidth = parseInt($(window).width());

    // ページ内にあるすべての`.js-image-switch`に適応される。
    $elem.each(function() {
      var $this = $(this);
      // ウィンドウサイズが768px以上であれば_spを_pcに置換する。
      if(windowWidth >= replaceWidth) {
        $this.attr('src', $this.attr('src').replace(sp, pc));

      // ウィンドウサイズが768px未満であれば_pcを_spに置換する。
      } else {
        $this.attr('src', $this.attr('src').replace(pc, sp));
      }
    });
  }
  imageSwitch();

  // 動的なリサイズは操作後0.2秒経ってから処理を実行する。
  var resizeTimer;
  $(window).on('resize', function() {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(function() {
      imageSwitch();
    }, 200);
  });
});

/* smooth */
$(function(){
   // #で始まるアンカーをクリックした場合に処理
   $('a[href^=#]').click(function() {
      // スクロールの速度
      var speed = 400; // ミリ秒
      // アンカーの値取得
      var href= $(this).attr("href");
      // 移動先を取得
      var target = $(href == "#" || href == "" ? 'html' : href);
      // 移動先を数値で取得
      var position = target.offset().top;
      // スムーススクロール
      $('body,html').animate({scrollTop:position}, speed, 'swing');
      return false;
   });
});
