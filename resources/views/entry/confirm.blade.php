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
	<form id="confirm-form" action="/ninjawifi/{{ $form_name }}/complete" method="POST">
		{!! Form::token() !!}
		<input type="hidden" name="coupon_code" value="{{ $coupon_code }}"/>
		<input type="hidden" name="language" value="{{ $language }}"/>
		<input type="hidden" name="origin" value="{{ $origin }}"/>
		<input type="hidden" name="Reservation_number" value="{{ $Reservation_number }}"/>
		<input type="hidden" name="First_Name" value="{{ $First_Name }}"/>
		<input type="hidden" name="Last_Name" value="{{ $Last_Name }}"/>
		<input type="hidden" name="Email" value="{{ $Email }}"/>
		<input type="hidden" name="Email_confirm" value="{{ $Email_confirm }}"/>
		<input type="hidden" name="Sex" value="{{ $Sex }}"/>
		<input type="hidden" name="Country" value="{{ $Country }}"/>
		<input type="hidden" name="Country_code" value="{{ $Country_code }}"/>
		<input type="hidden" name="Tel" value="{{ $Tel }}"/>
		<input type="hidden" name="AMC" value="{{ $AMC }}"/>
		<input type="hidden" name="E_newsletter" value="{{ $E_newsletter }}"/>
		<input type="hidden" name="Privacy" value="{{ $Privacy }}"/>
		<input type="hidden" name="FlightNo" value="{{ $FlightNo }}"/>
		<input type="hidden" name="DepartureDateYear" value="{{ $DepartureDateYear }}"/>
		<input type="hidden" name="DepartureDateMonth" value="{{ $DepartureDateMonth }}"/>
		<input type="hidden" name="DepartureDateDay" value="{{ $DepartureDateDay }}"/>

		<div class="contents">
			<h1>{{ trans('messages.cap_title') }}</h1>
			<div class="coupon">
				<h2>{{ trans('messages.msg_cap_coupon') }}</h2>
				<p>{{ trans('messages.msg_coupon1') }}</p>
				<p>{{ trans('messages.msg_coupon2') }}</p>
				<p class="coupon-required">{{ trans('messages.msg_required') }}</p>
			</div>

			<div class="reservation">
				<div class="reservation-confirm">
					<dl>
						<dt><label>{{ trans('messages.cap_reservation_number') }}</label></dt>
						<dd><p>{{ $Reservation_number }}</p></dd>
					</dl>
				</div>
			</div>

			<div class="flight-no">
				<div class="flight-no-confirm">
					<dl>
						<dt><label>{{ trans('messages.cap_flight-no') }}</label></dt>
						<dd><p>{{ $FlightNo }}</p></dd>
					</dl>
				</div>
			</div>

			<div class="departure-date">
				<div class="departure-date-confirm">
					<dl>
						<dt><label>{{ trans('messages.cap_departure-date') }}</label></dt>
						<dd><p>{{ $DepartureDateYear }} / {{ $DepartureDateMonth }} / {{ $DepartureDateDay }}</p></dd>
					</dl>
				</div>
			</div>

		</div>

		<div class="contents_form">
			<div class="form-confirm">
				<dl>
					<dt><label>{{ trans('messages.cap_sex') }}</label></dt>
					<dd><p>{{ $sexList[$Sex] }}</p></dd>
				</dl>
				<?php if ('jp' == $language) { ?>
				<dl>
					<dt><label>{{ trans('messages.cap_last_name') }}</label></dt>
					<dd><p>{{ $Last_Name }}</p></dd>
				</dl>
				<dl>
					<dt><label>{{ trans('messages.cap_first_name') }}</label></dt>
					<dd><p>{{ $First_Name }}</p></dd>
				</dl>
				<?php } else { ?>
				<dl>
					<dt><label>{{ trans('messages.cap_first_name') }}</label></dt>
					<dd><p>{{ $First_Name }}</p></dd>
				</dl>
				<dl>
					<dt><label>{{ trans('messages.cap_last_name') }}</label></dt>
					<dd><p>{{ $Last_Name }}</p></dd>
				</dl>
				<?php } ?>
				<dl>
					<dt><label>{{ trans('messages.cap_mail') }}</label></dt>
					<dd><p>{{ $Email }}</p></dd>
				</dl>
				<dl>
					<dt><label>{{ trans('messages.cap_country'.$transPrefix) }}</label></dt>
					<dd><p>{{ $countryList[$Country] }}</p></dd>
				</dl>
				<dl>
					<dt><label>{{ trans('messages.cap_country_code') }}</label></dt>
					<dd><p>{{ $Country_code }}</p></dd>
				</dl>
				<dl>
					<dt><label>{{ trans('messages.cap_tel') }}</label></dt>
					<dd><p>{{ $Tel }}</p></dd>
				</dl>
				<div class="form-checkbox">
					<p class="member confirm"><i
							class="fa-check @if ($AMC == true) display @else hidden @endif"></i><span>{{ trans('messages.cap_amc') }}</span>
					</p>
					<p class="mail confirm"><i
							class="fa-check  @if ($E_newsletter == true) display @else hidden @endif"></i><span>{{ trans('messages.cap_newsletter') }}</span></label>
					</p>
					<!-- 選択している場合は「display」、選択していない場合は「hidden」 -->
				</div>
			</div>
		</div>

		<div class="form-btn confirm-policy">
			<div class="form-checkbox">
				<p class="policy"><i class="fa-check  @if ($Privacy == true) display @else hidden @endif"></i>
					<span>{!! trans('messages.cap_privacy') !!}</span></p>
				<!-- 選択している場合は「display」、選択していない場合は「hidden」 -->
			</div>
			<div class="submit-btn confirm-btn">
				<button type="button" class="back" id="back-btn" name="back-btn" value="BACK"><i
						class="fa-angle-left"></i>{{ trans('messages.btn_back') }}</button>
				<button type="submit" class="send" name="regist-btn" value="REGIST">{{ trans('messages.btn_send') }}<i
						class="fa-angle-right"></i></button>
			</div>

		</div>
		{!! Form::close() !!}
			<!--CONTENTS-->


		<!--FOOTER-->
		<footer>
			<div class="inquiry">
				<ul class="clearfix">
					<li><span class="inq">{{ trans('messages.cap_inquiry') }}</span><span class="mailto"><a
								href="mailto:info@flyana.co">info@flyana.co</a></span></li>
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

		$('#back-btn').on('click', function (event) {
			$("#confirm-form").attr("action", "/ninjawifi/{{ $form_name }}/input");
			$("#confirm-form").submit();
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
