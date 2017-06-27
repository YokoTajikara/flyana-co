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
						<li class="language_c"><a href="/ninjawifi/hkch">中文</a></li>
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
	<form id="inputForm" name="inputForm" action="/ninjawifi/{{ $form_name }}/confirm" method="POST">
		{!! Form::token() !!}
		<input type="hidden" name="AMC" value=""/>
		<input type="hidden" name="E_newsletter" value=""/>
		<input type="hidden" name="language" value="{{ $language }}"/>
		<input type="hidden" name="origin" value="{{ $origin }}"/>
		<input type="hidden" name="form_name" value="{{ $form_name }}"/>

		<div class="contents">
			<h1>{{ trans('messages.cap_title') }}</h1>
			<div class="coupon">
				<h2>{{ trans('messages.msg_cap_coupon') }}</h2>
				<p>{{ trans('messages.msg_coupon1') }}</p>
				<p>{{ trans('messages.msg_coupon2') }}</p>
				<p class="coupon-required">{{ trans('messages.msg_required') }}</p>
			</div>

			<div class="reservation">
				<div class="reservation-input">
					<dl>
						<dt><label>{{ trans('messages.cap_reservation_number') }}</label></dt>
						<dd class="tf-checker">
							<input type="text" class="text-reservation tf-required tf-en" size="35"
								   name="Reservation_number" value="{{ $Reservation_number }}">
							<p class="@if (!empty($errors->first('Reservation_number'))) error @endif">{{ $errors->first('Reservation_number') }}</p>
							<p class="tf-message-Reservation_number-required message"> {{ trans('messages.error_reservation_required') }}</p>
							<p class="tf-message-Reservation_number-rnum message"> {{ trans('messages.error_reservation_regex') }}</p>
							<p class="tf-message-Reservation_number-used message"> {{ trans('messages.error_reservation_used') }}</p>
						</dd>
					</dl>
					<p class="coupon-reservation">{!! trans('messages.msg_reservation') !!}</p>

					<dl>
						<dt><label>{{ trans('messages.cap_flight-no') }}</label></dt>
						<dd class="tf-checker">
							{!! Form::text('FlightNo', Input::get('FlightNo'), ['size' => '35', 'class' => 'text-flight-no tf-required tf-en']) !!}
							<p class="@if (!empty($errors->first('FlightNo'))) error @endif">{{ $errors->first('FlightNo') }}</p>
							<p class="tf-message-FlightNo-required message"> {{ trans('messages.error_flight-no_required') }}</p>
							<p class="tf-message-FlightNo-num message"> {{ trans('messages.error_flight-no_regex') }}</p>
						</dd>
					</dl>
					
					<dl>
						<dt><label>{{ trans('messages.cap_departure-date') }}</label></dt>
						<dd class="tf-checker">
							<div class="custom custom-year">
								{!! Form::select('DepartureDateYear', $yearList, Input::get('DepartureDateYear'), ['id' => 'departure-date-year', 'class' => 'tf-required']) !!}
							</div><span class="departure-date-sep departure-date-sep-left">/</span>{!! Form::text('DepartureDateMonth', Input::get('DepartureDateMonth'), ['size' => '2', 'maxlength' => '2', 'class' => 'text-departure-date-month tf-required tf-en', 'placeholder' => trans('messages.placeholder_departure-date-month')]) !!}<span class="departure-date-sep">/</span>{!! Form::text('DepartureDateDay', Input::get('DepartureDateDay'), ['size' => '2', 'maxlength' => '2', 'class' => 'text-departure-date-month tf-required tf-en', 'placeholder' => trans('messages.placeholder_departure-date-day')]) !!}
							<p class="@if (!empty($errors->first('DepartureDateYear'))) error @endif">{{ $errors->first('DepartureDateYear') }}</p>
							<p class="tf-message-DepartureDateYear-required message"> {{ trans('messages.error_departure-date_required') }}</p>
							<p class="tf-message-DepartureDateYear-num message"> {{ trans('messages.error_departure-date_regex') }}</p>
						</dd>
					</dl>

				</div>
			</div>

		</div>

		<div class="contents_form">
			<div class="form-input">
				<dl>
					<dt><label>{{ trans('messages.cap_sex') }}</label></dt>
					<dd class="tf-checker">
						<div class="custom">
							{!! Form::select('Sex', $sexList, Input::get('Sex'), ['id' => 'sex', 'class' => 'tf-required']) !!}
						</div>
						<p class="@if (!empty($errors->first('Sex'))) error @endif">{{ $errors->first('Sex') }}</p>
						<p class="tf-message-Sex-required message"> {{ trans('messages.error_sex') }}</p>
					</dd>
				</dl>
				<?php if ('jp' == $language) { ?>
				<dl>
					<dt><label>{{ trans('messages.cap_last_name') }}</label></dt>
					<dd class="tf-checker">
						{!! Form::text('Last_Name',Input::get('Last_Name'), ['size' => '35', 'class' => 'text tf-required tf-en', 'placeholder' => trans('messages.placeholder_lastname')]) !!}
						<p class="@if (!empty($errors->first('Last_Name'))) error @endif">{{ $errors->first('Last_Name') }}</p>
						<p class="tf-message-Last_Name-required message"> {{ trans('messages.error_lastname_required') }}</p>
						<p class="tf-message-Last_Name-en message"> {{ trans('messages.error_lastname_regex') }}</p>
					</dd>
				</dl>
				<dl>
					<dt><label>{{ trans('messages.cap_first_name') }}</label></dt>
					<dd class="tf-checker">
						{!! Form::text('First_Name',Input::get('First_Name'), ['size' => '35', 'class' => 'text tf-required tf-en', 'placeholder' => trans('messages.placeholder_firstname')]) !!}
						<p class="@if (!empty($errors->first('First_Name'))) error @endif">{{ $errors->first('First_Name') }}</p>
						<p class="tf-message-First_Name-required message"> {{ trans('messages.error_firstname_required') }}</p>
						<p class="tf-message-First_Name-en message"> {{ trans('messages.error_firstname_regex') }}</p>
					</dd>
				</dl>
				<?php } else { ?>
				<dl>
					<dt><label>{{ trans('messages.cap_first_name') }}</label></dt>
					<dd class="tf-checker">
						{!! Form::text('First_Name',Input::get('First_Name'), ['size' => '35', 'class' => 'text tf-required tf-en', 'placeholder' => trans('messages.placeholder_firstname')]) !!}
						<p class="@if (!empty($errors->first('First_Name'))) error @endif">{{ $errors->first('First_Name') }}</p>
						<p class="tf-message-First_Name-required message"> {{ trans('messages.error_firstname_required') }}</p>
						<p class="tf-message-First_Name-en message"> {{ trans('messages.error_firstname_regex') }}</p>
					</dd>
				</dl>
				<dl>
					<dt><label>{{ trans('messages.cap_last_name') }}</label></dt>
					<dd class="tf-checker">
						{!! Form::text('Last_Name',Input::get('Last_Name'), ['size' => '35', 'class' => 'text tf-required tf-en', 'placeholder' => trans('messages.placeholder_lastname')]) !!}
						<p class="@if (!empty($errors->first('Last_Name'))) error @endif">{{ $errors->first('Last_Name') }}</p>
						<p class="tf-message-Last_Name-required message"> {{ trans('messages.error_lastname_required') }}</p>
						<p class="tf-message-Last_Name-en message"> {{ trans('messages.error_lastname_regex') }}</p>
					</dd>
				</dl>
				<?php } ?>
				<dl>
					<dt><label>{{ trans('messages.cap_mail') }}</label></dt>
					<dd class="tf-checker">
						{!! Form::text('Email',Input::get('Email'), ['size' => '35', 'class' => 'text tf-required tf-email', 'placeholder' => trans('messages.placeholder_mail')]) !!}
						<p class="@if (!empty($errors->first('Email'))) error @endif">{{ $errors->first('Email') }}</p>
						<p class="tf-message-Email-required message"> {{ trans('messages.error_mail_required') }}</p>
						<p class="tf-message-Email-email message"> {{ trans('messages.error_mail_regex') }}</p>
					</dd>
				</dl>
				<dl>
					<?php if ('th' == $language) { ?>
						<dt><label>{{ trans('messages.cap_mail_confirm') }}</label></dt>
					<?php } else { ?>
						<dt><label>{{ trans('messages.cap_mail') }}
								<span>{{ trans('messages.cap_mail_confirm') }}</span></label></dt>
					<?php } ?>
					<dd class="tf-checker">
						{!! Form::text('Email_confirm',Input::get('Email_confirm'), ['size' => '35', 'class' => 'text tf-required', 'placeholder' => trans('messages.placeholder_mail')]) !!}
						<p class="@if (!empty($errors->first('Email_confirm'))) error @endif">{{ $errors->first('Email_confirm') }}</p>
						<p class="tf-message-Email_confirm-required message"> {{ trans('messages.error_mailc_required') }}</p>
						<p class="tf-message-Email_confirm-match message"> {{ trans('messages.error_mailc_regex') }}</p>
					</dd>
				</dl>
				<dl>
					<dt><label>{{ trans('messages.cap_country'.$transPrefix) }}</label></dt>
					<dd class="tf-checker">
						<div class="custom">
							{!! Form::select('Country', $countryList, Input::get('Country'), ['id' => 'country', 'class' => 'tf-required']) !!}
						</div>
						<p class="@if (!empty($errors->first('Country'))) error @endif">{{ $errors->first('Country') }}</p>
						<p class="tf-message-Country-required message"> {{ trans('messages.error_country'.$transPrefix) }}</p>
					</dd>
				</dl>
				<dl>
					<dt><label>{{ trans('messages.cap_country_code') }}</label></dt>
					<dd class="tf-checker">
						{!! Form::text('Country_code',Input::get('Country_code'), ['id' => 'Country_code', 'size' => '35', 'class' => 'text tf-required', 'placeholder' => trans('messages.placeholder_country_code')]) !!}
						<p class="@if (!empty($errors->first('Country_code'))) error @endif">{{ $errors->first('Country_code') }}</p>
						<p class="tf-message-Country_code-required message"> {{ trans('messages.error_country_code') }}</p>
					</dd>
				</dl>
				<dl>
					<dt><label>{{ trans('messages.cap_tel') }}</label></dt>
					<dd class="tf-checker">
						{!! Form::text('Tel',Input::get('Tel'), ['size' => '35', 'class' => 'text tf-required tf-tel', 'placeholder' => trans('messages.placeholder_tel')]) !!}
						<p class="@if (!empty($errors->first('Tel'))) error @endif">{{ $errors->first('Tel') }}</p>
						<p class="tf-message-Tel-required message"> {{ trans('messages.error_tel_required') }}</p>
						<p class="tf-message-Tel-tel message"> {{ trans('messages.error_tel_regex') }}</p>
					</dd>
				</dl>
				<div class="form-checkbox">
					<p class="member">{!! Form::checkbox('AMC', 'true', Input::get('AMC'), ['id' => 'member', 'class' => 'checkbox']) !!}
						<label for="member" class="checkbox"><span>{{ trans('messages.cap_amc') }}</span></label></p>
					<p class="mail">{!! Form::checkbox('E_newsletter', 'true', $E_newsletter, ['id' => 'mail', 'class' => 'checkbox']) !!}
						<label for="mail" class="CheckBoxLabelClass"><span>{{ trans('messages.cap_newsletter') }}</span></label>
					</p>
				</div>
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
				<button type="submit" name="confirm-btn" id="submit" class="submit"
						value="CONFIRM">{{ trans('messages.btn_confirm') }}<i class="fa-angle-right"></i></button>
			</div>

		</div>
		{!! Form::close() !!}
			<!--CONTENTS-->


		@include('entry.footer')
</div>


<script src="/ninjawifi/js/jquery-1.11.3.min.js"></script>
<script src="/ninjawifi/common/js/jquery.customSelect.js"></script>
<script src="/ninjawifi/common/js/form.js"></script>
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
<script>
	$(function () {
		var options = {};

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
					var strs = e.val().split('');

					$.each(strs, function (index, val) {
						if (val.match(/[0-9]/)) {
							ncount++;
						}
						else if (val.match(/[A-Z]/)) {
							acount++;
						}
					});

					var rnumOk = ((acount + ncount) == 6);
					if (!rnumOk) {
						errCls.push("rnum");
						result = false;
					}
				}
				// 日本域便名チェック
			} else if (e.is("[name=FlightNo]")) {
				if (e.val() == "") {
					errCls.push("required");
					notEmpty = false;
				} else {
					var fNoOk = false;
					if (e.val().match(/^[A-Z]{2}[0-9]{3}$/)) {
						fNoOk = true;
					}
					if (!fNoOk) {
						errCls.push("num");
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
			if ( ($("[name=DepartureDateYear]").val() == "")
				|| ($("[name=DepartureDateMonth]").val() == "")
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
				var date = $("[name=DepartureDateYear]").val() + $("[name=DepartureDateMonth]").val() + $("[name=DepartureDateDay]").val();
				var fmt = false;
				if (date.match(/^[0-9]{8}$/)) {
					fmt = true;
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
		$('#country').on('change', function (event) {
			$('#Country_code').val(ccode[$('#country').val()]);
		});
		$('#Country_code').val(ccode[$('#country').val()]);
	});
</script>
@include('entry.tag-endbody-before')
</body>
</html>
