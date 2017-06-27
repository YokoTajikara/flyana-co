$(function() {
  fullscreen();
  $( window ).resize(fullscreen);

  $('.bxslider').bxSlider({
    speed:1500,
    auto: true,
    autoHover: true,
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
    if(windowH > $(".section-thank").height()){
      $(".section-thank").height(windowH - 80);
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
