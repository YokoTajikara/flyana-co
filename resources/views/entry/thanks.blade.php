<!DOCTYPE HTML>
<?php if ('jp' == $language) { ?>
<html lang="ja" class="ja">
<?php } else if ('en' == $language) { ?>
<html lang="en" class="en">
<?php } else if ('hk' == $language) { ?>
<html lang="zh" class="zh">
<?php } else if ('th' == $language) { ?>
<html lang="th" class="th">
<?php } ?>
<head>
	@include('entry.tag-meta')
	<title>{{ trans('messages.head_title_form') }}</title>
	<link rel="shortcut icon" href="favicon.ico">
	<link rel=stylesheet href="/ninjawifi/css/common.css">
	<link rel=stylesheet href="/ninjawifi/css/form.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<!--google analytics
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-73016360-1', 'auto');
      ga('send', 'pageview');

    </script>
    google analytics-->
	@include('entry.tag-inside-head')
</head>

<body>
@include('entry.tag-body-after')
<div id="wrapper">
	<!--GLOBAL HEADER BOX-->
	<div class="header_all">
		<div class="global-header-box clearfix">
			<?php if (('jp' == $language)&& ('am' == $origin)) { ?>
			<div class="header_logo"><a href="/ninjawifi/" target="_new"><img src="/ninjawifi/image/header_ana_logo.png" alt="ANA Inspiration of JAPAN"></a></div>
			<?php } else if (('jp' == $language)&& ('pm' == $origin)) { ?>
			<div class="header_logo"><a href="/ninjawifi/japanese-po" target="_new"><img src="/ninjawifi/image/header_ana_logo.png" alt="ANA Inspiration of JAPAN"></a></div>
			<?php } else if (('en' == $language)&& ('am' == $origin)) { ?>
			<div class="header_logo"><a href="/ninjawifi/english" target="_new"><img src="/ninjawifi/image/header_ana_logo.png" alt="ANA Inspiration of JAPAN"></a></div>
			<?php } else if (('en' == $language)&& ('pm' == $origin)) { ?>
			<div class="header_logo"><a href="/ninjawifi/english-po" target="_new"><img src="/ninjawifi/image/header_ana_logo.png" alt="ANA Inspiration of JAPAN"></a></div>
			<?php } else if ('hk' == $language) { ?>
			<div class="header_logo"><a href="/ninjawifi/hkch" target="_new"><img src="/ninjawifi/image/header_ana_logo.png" alt="ANA Inspiration of JAPAN"></a></div>
			<?php } else if ('th' == $language) { ?>
			<div class="header_logo"><a href="/ninjawifi/thai-po" target="_new"><img src="/ninjawifi/image/header_ana_logo.png" alt="ANA Inspiration of JAPAN"></a></div>
			<?php } ?>
			<div class="header_links">
				<div class="header-links-nav clearfix">
					<ul class="btn_lang">
						<?php if (('jp' == $language)&& ('am' == $origin)) { ?>
						<li class="language_e"><a href="/ninjawifi/english">English</a></li>
						<li class="language_c"><a href="/ninjawifi/hkch">中文</a></li>
						<?php } else if (('jp' == $language)&& ('pm' == $origin)) { ?>
						<li class="language_e"><a href="/ninjawifi/english-po">English</a></li>
						<li class="language_c"><a href="/ninjawifi/thai-po">ภาษาไทย</a></li>
						<?php } else if (('en' == $language)&& ('am' == $origin)) { ?>
						<li class="language_e"><a href="/ninjawifi/japanese-po">日本語</a></li>
						<li class="language_c"><a href="/ninjawifi/thai-po">ภาษาไทย</a></li>
						<?php } else if (('en' == $language)&& ('pm' == $origin)) { ?>
						<li class="language_e"><a href="/ninjawifi/japanese-po">日本語</a></li>
						<li class="language_c"><a href="/ninjawifi/thai-po">ภาษาไทย</a></li>
						<?php } else if ('hk' == $language) { ?>
						<li class="language_e"><a href="/ninjawifi/">日本語</a></li>
						<li class="language_c"><a href="/ninjawifi/english">English</a></li>
						<?php } else if ('th' == $language) { ?>
						<li class="language_e"><a href="/ninjawifi/japanese-po">日本語</a></li>
						<li class="language_c"><a href="/ninjawifi/english-po">English</a></li>
						<?php } ?>
					</ul>
					<ul class="btn_sns">
						<li><a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
							<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script></li>
						<li><div class="fb-share-button" data-layout="button_count" data-mobile_iframe="false">
							</div></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!--GLOBAL HEADER BOX-->

	<!--CONTENTS-->
	<form action="https://ninjawifi.com/{{ $entryFormLanguage }}/application/order" method="get">
		<div class="contents">
			<h1>{{ trans('messages.cap_title') }}</h1>
			<h2 class="getcode">{{ trans('messages.msg_comp1') }}<br>{{ trans('messages.msg_comp2') }}</h2>
		</div>

		<div class="campaigncode">
			<dl class="code">
				<dt>{{ trans('messages.msg_comp3') }}</dt>
				<dd>{{ $coupon_code }}</dd>
			</dl>
		</div>

		<h2 class="getcode">{{ trans('messages.msg_comp12') }}</h2>

		<div class="thanks-contents">
			<p>{{ trans('messages.msg_comp4'.$transPrefix) }}</p>
			<p class="ninjawifi"><a href="#"><img src="/ninjawifi/image/logo_ninjawifi.png" alt="NINJA WiFi"></a></p>
		</div>

		<div class="thanks-form-btn">
			<input type="hidden" name="coupon" value="{{ $coupon_code }}"/>
			<input type="hidden" name="pr_vmaf" value="7vZgBC39Ep"/>
			<button type="submit" name="" value="">{{ trans('messages.msg_comp5') }}<i
					class="fa-external-link"></i></button>
		</div>

		<div class="thanks-notice">
			<h3 class="notice">{!! trans('messages.msg_comp6') !!}</h3>
			<p>{{ trans('messages.msg_comp7') }}</p>
			<h4>{{ trans('messages.msg_comp8') }}</h4>
			<p>{{ trans('messages.msg_comp9'.$transPrefix) }}<br>
				{{ trans('messages.msg_comp10') }}<br>
				{{ trans('messages.msg_comp11') }}</p>
		</div>

	</form>
	<!--CONTENTS-->


	<!--FOOTER-->
	<footer>
		<div class="inquiry">
			<ul class="clearfix">
				<li><span class="inq">{{ trans('messages.cap_inquiry') }}</span><span class="mailto"><a
							href="mailto:info@ana-campaign.com">info@ana-campaign.com</a></span></li>
				<li><a href="http://www.staralliance.com/"><img src="/ninjawifi/image/footer_logo.png"
																alt="A STAR ALLIANCE MEMBER"></a></li>
			</ul>
		</div>
		<div class="copyright">Copyright &copy; ANA</div>
	</footer>
	<!--FOOTER-->


</div>


<script src="/ninjawifi/js/jquery-1.11.3.min.js"></script>
<script>
	$(function () {
		var $setElem = $('.switch'),
			pcName = '_pc',//PC版のファイル名
			spName = '_sp',//スマホ版のファイル名
			replaceWidth = 641;//切り替える画面サイズ

		$setElem.each(function () {
			var $this = $(this);

			function imgSize() {
				var windowWidth = parseInt($(window).width());
				if (windowWidth >= replaceWidth) {
					$this.attr('src', $this.attr('src').replace(spName, pcName)).css({visibility: 'visible'});
				} else if (windowWidth < replaceWidth) {
					$this.attr('src', $this.attr('src').replace(pcName, spName)).css({visibility: 'visible'});
				}
			}

			$(window).resize(function () {
				imgSize();
			});
			imgSize();
		});
	});
</script>
<!-- showTop
<script>
$(function(){
    var showTop = 100;

    $('body').append('<a href="javascript:void(0);" id="fixedTop">▲</a>');
    var fixedTop = $('#fixedTop');
    fixedTop.on('click',function(){
        $('html,body').animate({scrollTop:'0'},500);
    });
    $(window).on('load scroll resize',function(){
        if($(window).scrollTop() >= showTop){
            fixedTop.fadeIn('normal');
        } else if($(window).scrollTop() < showTop){
            fixedTop.fadeOut('normal');
        }
    });
});
</script> -->
<!-- Yahoo Code for your Target List
<script type="text/javascript">
/* <![CDATA[ */
var yahoo_ss_retargeting_id = 1000280463;
var yahoo_sstag_custom_params = window.yahoo_sstag_params;
var yahoo_ss_retargeting = true;
/* ]]> */
</script>
<script type="text/javascript" src="//s.yimg.jp/images/listing/tool/cv/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//b97.yahoo.co.jp/pagead/conversion/1000280463/?guid=ON&script=0&disvt=false"/>
</div>
</noscript> -->
<!-- Yahoo
<script type="text/javascript">
  (function () {
    var tagjs = document.createElement("script");
    var s = document.getElementsByTagName("script")[0];
    tagjs.async = true;
    tagjs.src = "//s.yjtag.jp/tag.js#site=FPH1u0U";
    s.parentNode.insertBefore(tagjs, s);
  }());
</script>
<noscript>
  <iframe src="//b.yjtag.jp/iframe?c=FPH1u0U" width="1" height="1" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
</noscript>
<script type="text/javascript" language="javascript">
/* <![CDATA[ */
var yahoo_retargeting_id = 'QSVI6GTRQK';
var yahoo_retargeting_label = '';
/* ]]> */
</script>
<script type="text/javascript" language="javascript" src="//b92.yahoo.co.jp/js/s_retargeting.js"></script> -->
@include('entry.tag-endbody-before')
</body>
</html>
