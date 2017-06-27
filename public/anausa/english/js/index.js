$(function () {

	var nav = $(".nav");

	//navの位置
	var navTop = nav.offset().top;

	//スクロールをするたびに実行
	$(window).scroll(function () {
		var winTop = $(this).scrollTop();
		nav.stop();
		if (winTop >= navTop) {
			nav.animate({top: winTop + 328 + "px"}, "slow");

		} else if (winTop <= navTop) {
			nav.animate({top: 328 + "px"}, "slow"); // 下から上へ戻るときもアニメーション
		}
	});
});