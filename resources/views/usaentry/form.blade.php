<!DOCTYPE HTML>
<?php if ('jp' == $language) { ?>
<html lang="ja" class="ja">
<?php } else if ('en' == $language) { ?>
<html lang="en" class="en">
<?php } ?>
<head>
	@include('usaentry.tag-meta')
	<meta name="fragment" content="!">
	<title>{{ trans('messages.usa_head_title_form') }}</title>
	<meta name="format-detection" content="telephone=no">

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

	<style type="text/css">
		.form-btn .submit.disabled {
			background-color: darkgray;
			cursor: default;
		}
		.form-btn .submit.disabled:hover {
			opacity: 1;
		}
	</style>

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
			<form id="inputForm" name="inputForm" action="/anausa/{{ $lang }}confirm" method="POST">
				{!! Form::token() !!}
				<input type="hidden" name="AMC" value=""/>
				<input type="hidden" name="E_newsletter" value=""/>
				<input type="hidden" name="language" value="{{ $language }}"/>
				<input type="hidden" name="form_name" value="{{ $form_name }}"/>
				<div class="contents_form">
					<div class="eticket-number-input">
						<dl>
							<dt><label for="ticket_number">{{ trans('messages.ticket_number') }}</label> <span class="form--attention">*</span></dt>
							<dd class="wifi-cam tf-checker">
								<div class="wifi-cam">
									<input id="ticket_number" size="35" class="text tf-required tf-en" placeholder="{{ trans('messages.ticket_placeholder') }}" name="Reservation_number" type="text" value="{{Input::get('Reservation_number')}}">
								</div>
								<p class="modal"><a href="/anausa/images/ticket_sample.png" class="boxer"><i class="fa fa-question-circle" aria-hidden="true"></i> {{ trans('messages.ticket_info') }}</a></p>
								<p class="@if (!empty($errors->first('Reservation_number'))) error @endif">{{ $errors->first('Reservation_number') }}</p>
								<p class="tf-message-Reservation_number-required message"> {{ trans('messages.usa_error_reservation_required') }}</p>
								<p class="tf-message-Reservation_number-rnum message"> {{ trans('messages.usa_error_reservation_regex') }}</p>
								<p class="tf-message-Reservation_number-used message"> {{ trans('messages.usa_error_reservation_used') }}</p>

							</dd>
						</dl>
						<?php if ('jp' == $language){ ?>
						<dl>
							<dt><label for="birth_date_day">{!!  trans('messages.departure_date')  !!}</label> <span class="form--attention">*</span></dt>
							<dd class="wifi-cam">
								<div class="custom custom-year">
									<p id="DepartureDateYearLabel" class="tf-required tf-valid">2017</p>
									<input type="hidden" name="DepartureDateYear" value="2017">
								</div>
								<div class="custom custom-month">
									{!! Form::select('DepartureDateMonth', $monthList, Input::get('DepartureDateMonth'), ['id' => 'DepartureDateMonth', 'class' => 'tf-required']) !!}
								</div>
								<div class="custom custom-day">
									{!! Form::select('DepartureDateDay', $dayList, Input::get('DepartureDateDay'), ['id' => 'DepartureDateDay', 'class' => 'tf-required']) !!}
								</div>
								<p class="@if (!empty($errors->first('DepartureDateYear'))) error @endif">{{ $errors->first('DepartureDateYear') }}</p>
								<p class="tf-message-DepartureDateYear-required message"> {{ trans('messages.usa_error_departure-date_required') }}</p>
								<p class="tf-message-DepartureDateYear-num message"> {{ trans('messages.usa_error_departure-date_regex') }}</p>
							</dd>
						</dl>
						<?php } else { ?>
						<dl>
							<dt><label for="birth_date_day">{!!  trans('messages.departure_date')  !!}</label> <span class="form--attention">*</span></dt>
							<dd class="wifi-cam">
								<div class="custom custom-day">
									{!! Form::select('DepartureDateDay', $dayList, Input::get('DepartureDateDay'), ['id' => 'DepartureDateDay', 'class' => 'tf-required']) !!}
								</div>
								<div class="custom custom-month">
									{!! Form::select('DepartureDateMonth', $monthList, Input::get('DepartureDateMonth'), ['id' => 'DepartureDateMonth', 'class' => 'tf-required']) !!}
								</div>
								<div class="custom custom-year">
									<p id="DepartureDateYearLabel" class="tf-required tf-valid">2017</p>
									<input type="hidden" name="DepartureDateYear" value="2017">
								</div>
								<p class="@if (!empty($errors->first('DepartureDateYear'))) error @endif">{{ $errors->first('DepartureDateYear') }}</p>
								<p class="tf-message-DepartureDateYear-required message"> {{ trans('messages.usa_error_departure-date_required') }}</p>
								<p class="tf-message-DepartureDateYear-num message"> {{ trans('messages.usa_error_departure-date_regex') }}</p>
							</dd>
						</dl>
						<?php } ?>
					</div>
					<div class="form-input">
						<?php if ('jp' == $language){ ?>
							<dl>
								<dt><label for="last_name">{{ trans('messages.cap_last_name') }}</label> <span class="form--attention">*</span></dt>
								<dd class="wifi-cam tf-checker">
									{!! Form::text('Last_Name',Input::get('Last_Name'), ['size' => '35', 'class' => 'text tf-required tf-en', 'placeholder' => trans('messages.usa_placeholder_lastname')]) !!}
									<p class="tf-message-Last_Name-required message"> {{ trans('messages.usa_error_lastname_required') }}</p>
									<p class="tf-message-Last_Name-en message"> {{ trans('messages.usa_error_lastname_regex') }}</p>
									<p class="tf-message-Last_Name-str message @if (!empty($errors->first('Last_Name'))) error @endif"> @if (!empty($errors->first('Last_Name'))) {{$errors->first('Last_Name')}} @else {{ trans('messages.usa_error_lastname_str') }} @endif </p>
								</dd>
							</dl>

							<dl>
								<dt><label for="first_name">{{ trans('messages.cap_first_name') }}</label> <span class="form--attention">*</span></dt>
								<dd class="wifi-cam tf-checker">
									{!! Form::text('First_Name',Input::get('First_Name'), ['size' => '35', 'class' => 'text tf-required tf-en', 'placeholder' => trans('messages.usa_placeholder_firstname')]) !!}
									<p class="tf-message-First_Name-required message"> {{ trans('messages.usa_error_firstname_required') }}</p>
									<p class="tf-message-First_Name-en message"> {{ trans('messages.usa_error_firstname_regex') }}</p>
									<p class="tf-message-First_Name-str message @if (!empty($errors->first('First_Name'))) error @endif"> @if (!empty($errors->first('First_Name'))) {{$errors->first('First_Name')}} @else {{ trans('messages.usa_error_firstname_str') }} @endif </p>
								</dd>
							</dl>
						<?php } else { ?>

							<dl>
								<dt><label for="first_name">{{ trans('messages.cap_first_name') }}</label> <span class="form--attention">*</span></dt>
								<dd class="wifi-cam tf-checker">
									{!! Form::text('First_Name',Input::get('First_Name'), ['size' => '35', 'class' => 'text tf-required tf-en', 'placeholder' => trans('messages.usa_placeholder_firstname')]) !!}
									<p class="tf-message-First_Name-required message"> {{ trans('messages.usa_error_firstname_required') }}</p>
									<p class="tf-message-First_Name-en message"> {{ trans('messages.usa_error_firstname_regex') }}</p>
									<p class="tf-message-First_Name-str message @if (!empty($errors->first('First_Name'))) error @endif"> @if (!empty($errors->first('First_Name'))) {{$errors->first('First_Name')}} @else {{ trans('messages.usa_error_firstname_str') }} @endif </p>
								</dd>
							</dl>
							<dl>
								<dt><label for="last_name">{{ trans('messages.cap_last_name') }}</label> <span class="form--attention">*</span></dt>
								<dd class="wifi-cam tf-checker">
									{!! Form::text('Last_Name',Input::get('Last_Name'), ['size' => '35', 'class' => 'text tf-required tf-en', 'placeholder' => trans('messages.usa_placeholder_lastname')]) !!}
									<p class="tf-message-Last_Name-required message"> {{ trans('messages.usa_error_lastname_required') }}</p>
									<p class="tf-message-Last_Name-en message"> {{ trans('messages.usa_error_lastname_regex') }}</p>
									<p class="tf-message-Last_Name-str message @if (!empty($errors->first('Last_Name'))) error @endif"> @if (!empty($errors->first('Last_Name'))) {{$errors->first('Last_Name')}} @else {{ trans('messages.usa_error_lastname_str') }} @endif </p>
								</dd>
							</dl>

							<?php } ?>
						<dl>
							<dt><label for="sex">{{ trans('messages.cap_sex') }}</label> <span class="form--attention">*</span></dt>
							<dd class="wifi-cam tf-checker">
								<div class="custom">
									{!! Form::select('Sex', $sexList, Input::get('Sex'), ['id' => 'sex', 'class' => 'tf-required']) !!}
								</div>
								<p class="tf-message-Sex-required message @if (!empty($errors->first('Sex'))) error @endif">{{ trans('messages.usa_err_gender') }}</p>
							</dd>
						</dl>

						<dl>
							<dt><label for="email">{{ trans('messages.cap_mail') }}</label> <span class="form--attention">*</span></dt>
							<dd class="wifi-cam tf-checker">
								{!! Form::text('Email',Input::get('Email'), ['size' => '35', 'class' => 'text tf-required tf-email', 'placeholder' => trans('messages.placeholder_mail')]) !!}
								<p class="@if (!empty($errors->first('Email'))) error @endif">{{ $errors->first('Email') }}</p>
								<p class="tf-message-Email-required message"> {{ trans('messages.usa_error_mail_required') }}</p>
								<p class="tf-message-Email-email message"> {{ trans('messages.usa_error_mail_regex') }}</p>
							</dd>
						</dl>

						<dl>
							<dt><label for="email_confirm">{{ trans('messages.cap_mail') }} <span>{{ trans('messages.cap_mail_confirm') }} </span> <span class="form--attention">*</span></label></dt>
							<dd class="wifi-cam tf-checker">
								{!! Form::text('Email_confirm',Input::get('Email_confirm'), ['size' => '35', 'class' => 'text tf-required', 'placeholder' => trans('messages.placeholder_mail')]) !!}
								<p class="@if (!empty($errors->first('Email_confirm'))) error @endif">{{ $errors->first('Email_confirm') }}</p>
								<p class="tf-message-Email_confirm-required message"> {{ trans('messages.usa_error_mailc_required') }}</p>
								<p class="tf-message-Email_confirm-match message"> {{ trans('messages.usa_error_mailc_regex') }}</p>
							</dd>
						</dl>
						<dl>
							<dt><label for="residence_region">{{ trans('messages.usa_residence_region') }}</label> <span class="form--attention">*</span></dt>
							<dd class="wifi-cam tf-checker">
								<div class="custom">
									{!! Form::select('Country', $countryList, Input::get('Country'), ['id' => 'residence_country', 'class' => 'tf-required']) !!}
								</div>
								<p class="@if (!empty($errors->first('Country'))) error @endif">{{ $errors->first('Country') }}</p>
								<p class="tf-message-Country-required message"> {{ trans('messages.residence_region_error') }}</p>
							</dd>
						</dl>
						<dl>
							<dt><label for="country_code">{{ trans('messages.country_code') }}</label> <span class="form--attention">*</span></dt>
							<dd class="wifi-cam tf-checker">
								{!! Form::text('Country_code',Input::get('Country_code'), ['id' => 'Country_code', 'size' => '35', 'class' => 'text tf-required tf-en', 'placeholder' => trans('messages.placeholder_country_code')]) !!}
								<p class="@if (!empty($errors->first('Country_code'))) error @endif">{{ $errors->first('Country_code') }}</p>
								<p class="tf-message-Country_code-required message"> {{ trans('messages.country_code_error') }}</p>
							</dd>
						</dl>
						<dl>
							<dt><label for="mobile">{{ trans('messages.cap_tel') }}</label> <span class="form--attention">*</span></dt>
							<dd class="wifi-cam tf-checker">
								{!! Form::text('Tel',Input::get('Tel'), ['size' => '35', 'class' => 'text tf-required tf-en', 'placeholder' => trans('messages.placeholder_tel')]) !!}
								<p class="tf-message-Tel-rnum message @if (!empty($errors->first('Tel'))) error @endif"> @if (!empty($errors->first('Tel'))) {{$errors->first('Tel') }} @else {{ trans('messages.usa_error_tel_rnum') }} @endif</p>
								<p class="tf-message-Tel-required message"> {{ trans('messages.error_tel_required') }}</p>
								<p class="tf-message-Tel-tel message"> {{ trans('messages.error_tel_regex') }}</p>
							</dd>
						</dl>
						<div class="form-checkbox club_menber">
							<p class="club_menber">
								{!! Form::checkbox('AMC', 'true', Input::get('AMC'), ['id' => 'club_menber', 'class' => 'checkbox']) !!}
								<label for="club_menber" class="checkbox"><span>{{ trans('messages.cap_amc') }}</span></label></p>
						</div>
						<div class="form-checkbox agree_newsletter">
							<p class="agree_newsletter">
								{!! Form::checkbox('E_newsletter', 'true', $E_newsletter, ['id' => 'agree_newsletter', 'class' => 'checkbox']) !!}
								<label for="agree_newsletter" class="checkbox"><span>{{ trans('messages.s25_form_cap_agree_newsletter') }}</span></label></p>
						</div>
					</div>

					<div class="form-btn tf-checker">
						<div class="form-checkbox">
							<p class="policy"><input id="policy" name="Privacy" type="checkbox" class="checkbox tf-required">
								<label for="policy" class="checkbox"><span>{!! trans('messages.cap_privacy') !!}</span></label></p>
						</div>
						<p align="center"
						   class="@if (!empty($errors->first('Privacy'))) error @endif">{{ $errors->first('Privacy') }}</p>
						<p align="center" class="tf-message-Privacy-required message"> {{ trans('messages.error_privacy') }}</p>
						<div class="submit-btn">
							<button type="submit" name="confirm-btn" id="submit" class="submit disabled"
									value="CONFIRM">{{ trans('messages.btn_confirm') }}<i class="fa-angle-right"></i></button>
						</div>

					</div>

				</div>
			{!! Form::close() !!}
			<!-- /form -->

		</div>
		<!-- /container -->

	</div>
	<!-- /registration -->
</div>

@include('usaentry.footer')
<a title="Scroll to top" class="scrollup" href="#"><i class="fa fa-angle-up"></i></a>

<script>

	$(document).ready(function(){
		$('#policy').on('change', function () {
			if ($(this).prop('checked')) {
				$('#submit').removeAttr('disabled').removeClass('disabled');
			}else{
				$('#submit').attr('disabled','disabled').addClass('disabled');
			}
		});
		$('#policy').trigger('change');
	});

</script>
<script>
	$(".boxer").boxer();
</script>
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

<script src="/anausa/common/js/jquery.customSelect.js"></script>
<script src="/anausa/common/js/form.js"></script>
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
<script>
	$(function () {
		var options = {};

		var missInput = {
			'ticket_number': []
		};

		var validate = function (e) {
			var result = true;
			var notEmpty = true;
			var errCls = [];

			// 確認用メールアドレスチェック
			if (e.is("[name=Email_confirm]")) {
				if (e.val() == "") {
					errCls.push("required");
					notEmpty = false;
				} else {
					if (e.val() != $("input[type=text][name=Email]").val()) {
						errCls.push("match");
						result = false;
					}
				}
			}

			// 航空券予約番号チェック
			if (e.is("[name=Reservation_number]")) {
				if (e.val() == "") {
					errCls.push("required");
					notEmpty = false;
					@if (isset($usedReservationNumber))
				} else if (e.val() == "{{ $usedReservationNumber }}") {
					errCls.push("used");
					result = false;
					@endif
				} else {
					var acount = 0;
					var ncount = 0;
					var first_str = '';
					var strs = e.val().split('');

					$.each(strs, function (index, val) {

						if(index < 3){
							first_str = first_str + val;
						}else{
							if (val.match(/[0-9]/)) {
								ncount++;
							}
						}
						if(index > 12){
							ncount++;
						}
					});

					if(first_str=='205'){
						acount=3;
					}
					var rnumOk = ((acount + ncount) == 13);
					if (!rnumOk) {
						errCls.push("rnum");
						result = false;

						missInput['ticket_number'].push(e.val());
						jQuery.unique(missInput['ticket_number']);
					}
				}
			// FName
			} else if (e.is("[name=First_Name]")) {
				if (e.val() == "") {
					errCls.push("required");
					notEmpty = false;
				} else {
					var fNoOk = false;
					if (e.val().match(/^[a-zA-Z0-9 =._]+$/)) {
						fNoOk = true;
					}
					if (!fNoOk) {
						errCls.push("str");
						result = false;
					}
				}
			} else if (e.is("[name=Last_Name]")) {
				if (e.val() == "") {
					errCls.push("required");
					notEmpty = false;
				} else {
					var fNoOk = false;
					if (e.val().match(/^[a-zA-Z0-9 =._]+$/)) {
						fNoOk = true;
					}
					if (!fNoOk) {
						errCls.push("str");
						result = false;
					}
				}
			} else if (e.is("[name=Tel]")) {
				if (e.val() == "") {
					errCls.push("required");
					notEmpty = false;
				} else {
					var count = 0;
					var strs = e.val().split('');

					$.each(strs, function (index, val) {

						if (val.match(/^[0-9-]+$/)) {
							count++;
						}
					});

					var rnumOk = ((count) >= 8);
					if (!rnumOk) {
						errCls.push("rnum");
						result = false;
					}
				}
			}
			return {
				"result": result,
				"notEmpty": notEmpty,
				"errCls": errCls,
			};
			return errCls;
		};
		options["validate"] = validate;

		var validateAll = function($elms) {
			var errorElms = [];

			// 搭乗日チェック
			var departureDateYear = {"object": $("[name=DepartureDateYear]"), "result": true, "notEmpty": false, "errCls": ""};
			var departureDateMonth = {"object": $("[name=DepartureDateMonth]"), "result": true, "notEmpty": false, "errCls": ""};
			var departureDateDay = {"object": $("[name=DepartureDateDay]"), "result": true, "notEmpty": false, "errCls": ""};
			if ( ($("[name=DepartureDateMonth]").val() == "")
					|| ($("[name=DepartureDateDay]").val() == "") ) {
				departureDateYear["result"] = false;
				departureDateYear["errCls"] = "required";
				departureDateMonth["result"] = false;
				departureDateMonth["errCls"] = "required";
				departureDateDay["result"] = false;
				departureDateDay["errCls"] = "required";

				errorElms.push(departureDateYear);
				errorElms.push(departureDateMonth);
				errorElms.push(departureDateDay);
			} else {
				var date = '2017' + $("[name=DepartureDateMonth]").val() + $("[name=DepartureDateDay]").val();
				var fmt = false;
				if (date.match(/^[0-9]{8}$/)) {
					fmt = true;
				}
				today = new Date(2017,$("[name=DepartureDateMonth]").val(),$("[name=DepartureDateDay]").val(),0,0,0);
				myD   = today.getTime();
				myD_y = today.getFullYear();
				myD_m = today.getMonth() + 1;
				myD_d = today.getDate();

				start   = new Date(2016,12,02,0,0,0);
				myS   = start.getTime();
				myS_y = start.getFullYear();
				myS_m = start.getMonth() + 1;
				myS_d = start.getDate();
				end   = new Date(2017,3,29,0,0,0);
				myE   = end.getTime();
				myE_y = end.getFullYear();
				myE_m = end.getMonth() + 1;
				myE_d = end.getDate();

				if(myS <= myD && myE >= myD){
					fmt = true;
				}else{
					fmt = false;
				}

				if (fmt) {
					departureDateYear["result"] = true;
					departureDateMonth["result"] = true;
					departureDateDay["result"] = true;
				} else {
					departureDateYear["result"] = false;
					departureDateYear["errCls"] = "num";
					departureDateMonth["result"] = false;
					departureDateMonth["errCls"] = "num";
					departureDateDay["result"] = false;
					departureDateDay["errCls"] = "num";

					errorElms.push(departureDateYear);
					errorElms.push(departureDateMonth);
					errorElms.push(departureDateDay);
				}
			}

			return errorElms;
		};
		options["validateAll"] = validateAll;

		var keyCheck = {
			'ticket_number': []
		};
		var keyBuf = {
			'ticket_number': []
		};
		var lastInputTime = {
			'ticket_number': new Date()
		};

		options['onclick'] = function(){
			pushKey('ticket_number', keyBuf['ticket_number']);
			var jsonObj = {
				'keyCheck': keyCheck,
				'missInput': missInput
			};
			$('#key_check').remove();
			var $inputObj = $('<input>', {
				'id': 'key_check',
				'type': 'hidden',
				'name': 'key_check',
				'value': JSON.stringify(jsonObj)
			});
			$('#inputForm').append($inputObj);
		};


		@if (isset($usedReservationNumber))
				options["is_initial_validate"] = true;
		@endif
                $('form[name=inputForm]').tamForm(options);

		// 国コード
		var ccode = {
			'Australia': '+61',
			'India': '+91',
			'Indonesia': '+62',
			'Thailand': '+66',
			'Malaysia': '+60',
			'Myanmar': '+95',
			'Philippine': '+63',
			'Singapore': '+65',
			'Vietnam': '+84',
			'Hong kong': '+852'
		};

		// 国コード自動入力
		$('#residence_country').on('change', function (event) {
			$('#Country_code').val(ccode[$('#residence_country').val()]);
		});
		$('#Country_code').val(ccode[$('#residence_country').val()]);

		function pushKey(id, keyValue) {
			if (0 < keyValue.length) {
				keyCheck[id].push(keyValue);
			}
		}

		setInterval(function(){
			var currentTime = new Date();
			var intervalSec = (currentTime - lastInputTime['ticket_number']) / 1000;
			if ( (1 < intervalSec) && (0 < keyBuf['ticket_number'].length) ) {
				pushKey('ticket_number', keyBuf['ticket_number']);
				keyBuf['ticket_number'] = [];
			}
		}, 10);

		$('#ticket_number').on('keydown', function(evt){
			var id = $(evt.currentTarget).attr('id');
			keyBuf[id].push(evt.keyCode);
			lastInputTime[id] = new Date();
		});

	});
</script>
@include('usaentry.tag-endbody-before')

</body>
</html>
