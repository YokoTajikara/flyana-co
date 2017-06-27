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
@include('usaentry.tag-body-after')
<body class="page-en">
<div class="main-wrapper">
	<header>
		<div class="container">
			<div class="row">
				<div class="col-xs-6 text-left">
					<?php if (('jp' == $language)) { ?>
					<a href="/anausa/jp/" target="_new"><img src="/anausa/images/logo.png" alt="ANA Inspiration of JAPAN"/></a>
					<?php } else if (('en' == $language)) { ?>
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
	<form action="{!! $nextFormAction !!}" method="get" name="form1">
		<input type="hidden" name="pr_vmaf" value="OF9JXLaiX8"/>
		<input type="hidden" name="coupon" value="{{ $coupon_code }}"/>
		<div class="registration">
		<div class="container">
			<div class="step-number">
				<ol>
					<li>STEP1</li>
					<li class="current">STEP2</li>
					<li>STEP3</li>
					<li>STEP4</li>
				</ol>
			</div>

			<div class="contents_form_end">
				<h3>
					{{ trans('messages.msg_usa1') }}<br>
					<span>{{ trans('messages.msg_usa2') }}</span>
				</h3>
				<div class="coupon_code">
					<p class="code"><span>{{ trans('messages.msg_usa3') }}</span>{{ $coupon_code }}</p>
					<dl>
						<dt>STEP 3</dt>
						<dd>{{ trans('messages.msg_usa4') }}<br>
							{{ trans('messages.msg_usa5') }}</dd>
					</dl>
					<img src="/anausa/images/wifi-logo.png" alt="WIFI 7DAYS Free in USA Campaign">
					<div class="form-btn wifi-cam-complete">
						<div class="signup btn"><a href="javascript:document.form1.submit();">{{ trans('messages.msg_usa6') }}<i class="fa-external-link"></i></a></div>
					</div>
				</div>
				<div class="caution">
					<dl>
						<dt>{{ trans('messages.msg_usa7') }}</dt>
						<dd>{{ trans('messages.msg_usa8') }}
							{{ trans('messages.msg_usa9') }}
							{{ trans('messages.msg_usa10') }}</dd>
					</dl>
					<dl>
						<dt>{{ trans('messages.msg_usa11') }}</dt>
						<dd>{{ trans('messages.msg_usa12') }}
							<ul>
								<li><span>{{ trans('messages.msg_usa13') }}</span>{{ trans('messages.msg_usa14') }}</li>
							</ul>
						</dd>
					</dl>
				</div>

			</div>

		</div>
		<!-- /container -->

	</div>
	<!-- /registration -->
	</form>
	@include('usaentry.footer')
</div>

<a title="Scroll to top" class="scrollup" href="#"><i class="fa fa-angle-up"></i></a>


<script>
	$(".boxer").boxer();
</script>

@include('usaentry.tag-endbody-before')
</body>
</html>
