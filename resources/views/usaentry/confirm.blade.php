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
	@include('usaentry.tag-meta')
	<meta name="fragment" content="!">
	<title>{{ trans('messages.usa_head_title_form') }}</title>

	<link rel="icon" type="image/x-icon" href="https://www.ana.co.jp/favicon.ico">
	<link rel="stylesheet" href="/anausa/stylesheets/font-awesome.min.css">
	<link rel="stylesheet" href="/anausa/stylesheets/jquery.bxslider.css">
	<link rel="stylesheet" href="/anausa/stylesheets/animate.css">
<?php if ('jp' == $language) { ?>
	<link rel="stylesheet" href="/anausa/stylesheets/style-jp.css">
<?php } else if ('en' == $language) { ?>
	<link rel="stylesheet" href="/anausa/stylesheets/style.css">
<?php } ?>
	<link rel="stylesheet" href="/anausa/stylesheets/form.css">
	<link rel="stylesheet" href="/anausa/stylesheets/jquery.fs.boxer.css">

	<script src="/anausa/javascripts/jquery-2.1.4.min.js"></script>
	<script src="/anausa/javascripts/bootstrap.min.js"></script>
	<script src="/anausa/javascripts/jquery.bxslider.min.js"></script>
	<script src="/anausa/javascripts/wow.min.js"></script>
	<script src="/anausa/javascripts/base.js"></script>
	<script src="/anausa/javascripts/jquery.fs.boxer.js"></script>
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
	<style type="text/css">
		.form-btn .submit.disabled {
			background-color: darkgray;
			cursor: default;
		}
		.form-btn .submit.disabled:hover {
			opacity: 1;
		}
	</style>
	@include('usaentry.tag-inside-head')
</head>

<body class="page-en">
@include('usaentry.tag-body-after')
<div class="main-wrapper">
	<header>
		<div class="container">
			<div class="row">
				<div class="col-xs-6 text-left">
					<?php if (('jp' == $language)) { ?>
					<?php $lang ="jp/"; ?>
						<a href="/anausa/jp/" target="_new"><img src="/anausa/images/logo.png" alt="ANA Inspiration of JAPAN"/></a>
					<?php } else if (('en' == $language)) { ?>
						<?php $lang =""; ?>
					<a href="/anausa/" target="_new"><img src="/anausa/images/logo.png" alt="ANA Inspiration of JAPAN"/></a>
					<?php } ?>
				</div>
				<div class="nav col-xs-6 text-right">
					<?php if (('jp' == $language)) { ?>
					<a href="/anausa/">English</a>
					<span class="language">日本語</span>
					<?php } else if (('en' == $language)) { ?>
					<span class="language">English</span>
					<a href="/anausa/jp/application/">日本語</a>
					<?php } ?>
				</div>
			</div>
		</div>
	</header>

	<div class="section-mainvisual">
<?php if ('jp' == $language) { ?>
		<h2><img src="/anausa/images/mainvisual-logo-jp.png" alt="WiFi 7DAYS Free in USA Campaign"></h2>
<?php } else if ('en' == $language) { ?>
		<h2><img src="/anausa/images/mainvisual-logo.png" alt="WiFi 7DAYS Free in USA Campaign"></h2>
<?php } ?>
	</div>
	</div>

	<div class="registration">
		<div class="container">
			<div class="step-number">
				<ol>
					<li class="current">STEP1</li>
					<li>STEP2</li>
					<li>STEP3</li>
					<li>STEP4</li>
				</ol>
			</div>

			<!-- form -->
					<form id="confirm-form" action="/anausa/{{ $lang }}complete" method="POST" accept-charset="UTF-8">
				{!! Form::token() !!}
				<input type="hidden" name="coupon_code" value="{{ $coupon_code }}"/>
				<input type="hidden" name="language" value="{{ $language }}"/>
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
				<input type="hidden" name="DepartureDateYear" value="{{ $DepartureDateYear }}"/>
				<input type="hidden" name="DepartureDateMonth" value="{{ $DepartureDateMonth }}"/>
				<input type="hidden" name="DepartureDateDay" value="{{ $DepartureDateDay }}"/>
				<div class="contents_form">
					<div class="eticket-number-input">
						<dl>
							<dt>{{ trans('messages.ticket_number') }}<span class="form--attention">*</span></dt>
							<dd class="wifi-cam-confirm">{{ $Reservation_number }}</dd>
						</dl>
						<dl>
							<dt>{!! trans('messages.departure_date') !!}<span class="form--attention">*</span></dt>
							<dd class="wifi-cam-confirm">{{ $DepartureDateYear }} / {{ $DepartureDateMonth }} / {{ $DepartureDateDay }}</dd>
						</dl>
					</div>
					<div class="form-input">
						<?php if ('jp' == $language){ ?>
							<dl>
								<dt>{{ trans('messages.cap_last_name') }} <span class="form--attention">*</span></dt>
								<dd class="wifi-cam-confirm">{{ $Last_Name }}</dd>
							</dl>

							<dl>
								<dt>{{ trans('messages.cap_first_name') }}<span class="form--attention">*</span></dt>
								<dd class="wifi-cam-confirm">{{ $First_Name }}</dd>
							</dl>
						<?php } else { ?>
							<dl>
								<dt>{{ trans('messages.cap_first_name') }}<span class="form--attention">*</span></dt>
								<dd class="wifi-cam-confirm">{{ $First_Name }}</dd>
							</dl>
							<dl>
								<dt>{{ trans('messages.cap_last_name') }} <span class="form--attention">*</span></dt>
								<dd class="wifi-cam-confirm">{{ $Last_Name }}</dd>
							</dl>

						<?php } ?>

						<dl>
							<dt>{{ trans('messages.cap_sex') }} <span class="form--attention">*</span></dt>
							<dd class="wifi-cam-confirm">{{ $sexList[$Sex] }}</dd>
						</dl>
						<dl>
							<dt>{{ trans('messages.cap_mail') }} <span class="form--attention">*</span></dt>
							<dd class="wifi-cam-confirm">{{ $Email }}</dd>
						</dl>
						<dl>
							<dt>{{ trans('messages.usa_residence_region') }} <span class="form--attention">*</span></dt>
							<dd class="wifi-cam-confirm">{{ $countryList[$Country] }}</dd>
						</dl>
						<dl>
							<dt>{{ trans('messages.country_code') }}<span class="form--attention">*</span></dt>
							<dd class="wifi-cam-confirm">{{ $Country_code }}</dd>
						</dl>
						<dl>
							<dt>{{ trans('messages.cap_tel') }} <span class="form--attention">*</span></dt>
							<dd class="wifi-cam-confirm">{{ $Tel }}</dd>
						</dl>

						<div class="form-checkbox club_menber wifi-cam-confirm-list">
							<p class="@if ($AMC == true) agree_newsletter @else club_menber @endif"><i class="fa fa-check" aria-hidden="true"></i><span>{{ trans('messages.cap_amc') }}</span></p>
						</div>
						<div class="form-checkbox agree_newsletter wifi-cam-confirm-list">
							<p class="@if ($E_newsletter == true) agree_newsletter @else club_menber @endif"><i class="fa fa-check" aria-hidden="true"></i><span>{{ trans('messages.s25_form_cap_agree_newsletter') }}</span></p>
						</div>
					</div>
					<!-- /form-input -->

					<div class="form-btn wifi-cam-confirm-list">
						<div class="form-checkbox">
							<p class="policy"><i class="fa fa-check  @if ($Privacy == true) display @else hidden @endif" aria-hidden="true"></i> <span>{!! trans('messages.cap_privacy') !!}</span></p>
						</div>

						<div class="submit-btn confirm-btn">
							<button type="button" class="back" id="back-btn" name="back-btn" value="BACK">
								<i class="fa-angle-left"></i>{{ trans('messages.btn_back') }}
							</button>
							<button type="submit" class="send" name="regist-btn" value="REGIST">{{ trans('messages.btn_send') }}
								<i class="fa-angle-right"></i>
							</button>
						</div>
					</div>

				</div>
			{!! Form::close() !!}
			<!-- /form -->

		</div>
		<!-- /container -->

	</div>
	<!-- /registration -->

	@include('usaentry.footer')
</div>

<a title="Scroll to top" class="scrollup" href="#"><i class="fa fa-angle-up"></i></a>

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
			$("#confirm-form").attr("action", "/anausa/{{ $lang }}application/input");
			$("#confirm-form").submit();
		});
	});
</script>

<script type="text/javascript">
	$(".boxer").boxer();
</script>
@include('usaentry.tag-endbody-before')
</body>
</html>
