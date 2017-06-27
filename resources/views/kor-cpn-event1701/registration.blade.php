<!DOCTYPE HTML>
<html lang="en" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
<head>
    <meta name="fragment" content="!">
    <meta charset="UTF-8">
    <!-- <base href="/"> -->
    <link rel="canonical" href="https://www.ana-campaign.com/kor-cpn-event1701/">
    <title>ANA 항공권 구매 이벤트 응모페이지 | 캠페인 | ANA</title>
    <meta name="keywords" content="">
    <meta name="description" content="ANA 항공권 구매 이벤트의 응모페이지 입니다.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">

    <meta property="fb:app_id" content="1871155366431428" />
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="article">
    <meta property="og:site_name" content="ANA 돈키호테 2017">
    <meta property="og:title" content="ANA 항공권 구매 이벤트 응모페이지 | 캠페인 | ANA">
    <meta property="og:url" content="https://www.ana-campaign.com/kor-cpn-event1701/">
    <meta property="og:description" content="ANA 항공권 구매 이벤트의 응모페이지 입니다.">
    <meta property="og:image" content="https://www.ana-campaign.com/kor-cpn-event1701/images/ogp_noremal.jpg">
    <meta property="fb:app_id" content="1783070985282087">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@FlyANA_official">
    <meta name="twitter:creator" content="@FlyANA_official">
    <meta name="twitter:title" content="ANA 항공권 구매 이벤트 응모페이지 | 캠페인 | ANA">
    <meta name="twitter:description" content="ANA 항공권 구매 이벤트의 응모페이지 입니다.">
    <meta name="twitter:image" content="https://www.ana-campaign.com/kor-cpn-event1701/images/ogp_noremal.jpg">
    <link rel="icon" type="image/x-icon" href="https://www.ana.co.jp/favicon.ico">
    <link rel="stylesheet" href="/kor-cpn-event1701/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/kor-cpn-event1701/font-awesome-4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/kor-cpn-event1701/jquery.bxslider/jquery.bxslider.css">
    <link rel="stylesheet" type="text/css" href="/kor-cpn-event1701/stylesheets/style.css">
    <link rel="stylesheet" type="text/css" href="/kor-cpn-event1701/stylesheets/form.css">

    <!--ヘッダー移植-->
        <LINK href="/kor-cpn-event1701/common/wws.common.css" rel="stylesheet" type="text/css" media="all">
        <link rel="stylesheet" type="text/css" href="/kor-cpn-event1701/common/wws.share.css">
        <link rel="stylesheet" type="text/css" href="/kor-cpn-event1701/common/wws.reset-form.css">
    <!--ヘッダー移植用CSSココまで-->

    <script src="/kor-cpn-event1701/javascripts/jquery-2.1.4.min.js"></script>
    <script src="/kor-cpn-event1701/jquery.bxslider/jquery.bxslider.min.js"></script>
    <script src="//connect.facebook.net/en_US/all.js"></script>
</head>

<body class="page-en">


<div class="main-wrapper">
             <div id="header-area">
					<header id="header" role="banner">
						<div class="inner" id="head-info">
						<h1 class="logo"><img alt="ANA Inspiration of JAPAN" src="/kor-cpn-event1701/resource/img/logo_ana.png"></a></h1>

						</div>
					</header>
				</div>

    <!--<header>
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <a href="../"><img src="/kor-cpn-event1701/images/logo.png" /></a>
                </div>

            </div>
        </div>
    </header>-->

    <div class="container registration">

        <!-- form -->
        <form method="POST" action="/kor-cpn-event1701/confirm" accept-charset="UTF-8" id="inputForm" name="inputForm">
            {!! csrf_field() !!}
            {{ Form::hidden("form_name", "input") }}
            <div class="contents">
                <div class="contents-header">
                    <h2>ANA 항공권 구매 이벤트 응모페이지</h2>
                </div>
            </div>
            <div class="contents_form">
                <div class="form-input">
                    <dl>
                        <dt><label>E-ticket 번호</label> <span class="form--attention">*</span></dt>
                        <dd class="tf-checker">
                            {{ Form::input("text", "E_ticket_number__c", array_get($form, 'E_ticket_number__c'), ["size" =>"13", "class" => "text tf-required tf-en", "placeholder" =>"항공권 번호 13자리"]) }}
                            {!! $errors->first('E_ticket_number__c', '<p class="error">:message</p>') !!}
                            <p class="tf-message-email_ticket_number-required message">
                                messages.kor-cpn-event1701_form_error_name_E_ticket_number__c_required</p>
                            <p class="tf-message-email_ticket_number-incorrect message">
                                messages.kor-cpn-event1701_form_error_name_E_ticket_number__c_incorrect</p>
                            <p class="tf-message-email_ticket_number-duplicate message">
                                messages.kor-cpn-event1701_form_error_name_E_ticket_number__c_duplicate</p>
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>탑승일</label> <span class="form--attention">*</span></dt>
                        <dd class="tf-checker">
                            <div class="custom custom-year">
                                {{ Form::select("DepartureDate_y__c", $yearList, array_get($form, 'DepartureDate_y__c'), ["id" => "DepartureYear", "class" => "tf-required"]) }}
                            </div>
                            <div class="custom custom-month">
                                {{ Form::select("DepartureDate_m__c", $monthList, array_get($form, 'DepartureDate_m__c'), ["id" => "DepartureMonth", "class" => "tf-required"]) }}
                            </div>

                            <div class="custom custom-day">
                                {{ Form::select("DepartureDate_d__c", $dayList, array_get($form, 'DepartureDate_d__c'), ["id" => "DepartureDate", "class" => "tf-required"]) }}
                            </div>
                            {!! $errors->first('DepartureDate_y__c', '<p class="error">:message</p>') !!}
                            <p class="tf-message-departure_date_year-required message">
                                messages.kor-cpn-event1701_form_error_name_DepartureDate_y__c_required</p>
                            <p class="tf-message-departure_date_year-exclude message">
                                messages.kor-cpn-event1701_form_error_name_DepartureDate_y__c_excluded</p>
                            {!! $errors->first('DepartureDate_m__c', '<p class="error">:message</p>') !!}
                            <p class="tf-message-departure_date_month-required message">
                                messages.kor-cpn-event1701_form_error_name_DepartureDate_m__c_required</p>
                            <p class="tf-message-departure_date_month-exclude message">
                                messages.kor-cpn-event1701_form_error_name_DepartureDate_m__c_excluded</p>
                            {!! $errors->first('DepartureDate_d__c', '<p class="error">:message</p>') !!}
                            <p class="tf-message-departure_date_day-required message">
                                messages.kor-cpn-event1701_form_error_name_DepartureDate_d__c_required</p>
                            <p class="tf-message-departure_date_day-exclude message">
                                messages.kor-cpn-event1701_form_error_name_DepartureDate_d__c_excluded</p>
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>이름</label> <span class="form--attention">*</span></dt>
                        <dd class="tf-checker">
                            {{ Form::input("text", "First_Name__c", array_get($form, 'First_Name__c'), ["size" =>"35", "class" => "text tf-required tf-en", "placeholder" =>"길동 (이름)"]) }}
                            {!! $errors->first('First_Name__c', '<p class="error">:message</p>') !!}
                            <p class="tf-message-first_name-required message">
                                messages.kor-cpn-event1701_form_error_name_First_Name__c_required</p>
                            <p class="tf-message-first_name-en message"></p>
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>성</label> <span class="form--attention">*</span></dt>
                        <dd class="tf-checker">
                            {{ Form::input("text", "Last_Name__c", array_get($form, 'Last_Name__c'), ["size" =>"35", "class" => "text tf-required tf-en", "placeholder" =>"홍 (성)"]) }}
                            <p class=""></p>
                            {!! $errors->first('Last_Name__c', '<p class="error">:message</p>') !!}
                            <p class="tf-message-last_name-required message">
                                messages.kor-cpn-event1701_form_error_name_Last_Name__c_required</p>
                            <p class="tf-message-last_name-en message"></p>
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Email</label> <span class="form--attention">*</span></dt>
                        <dd class="tf-checker">
                            {{ Form::input("text", "Email", array_get($form, 'Email'), ["size" =>"35", "class" => "text tf-required tf-email", "placeholder" => "sorano-taro@ana.com"]) }}
                            {!! $errors->first('Email', '<p class="error">:message</p>') !!}
                            <p class="tf-message-email-required message">
                                messages.kor-cpn-event1701_form_error_name_Email_required</p>
                            <p class="tf-message-email-email message">
                                messages.kor-cpn-event1701_form_error_name_Email_email</p>
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Email 확인</label><span class="form--attention">*</span></dt>
                        <dd class="tf-checker">
                            {{ Form::input("text", "Email_confirm", array_get($form, 'Email_confirm'), ["size" =>"35", "class" => "text tf-required", "placeholder" => "sorano-taro@ana.com"]) }}
                            {!! $errors->first('Email_confirm', '<p class="error">:message</p>') !!}
                            <p class="tf-message-email_confirm-required message">
                                messages.kor-cpn-event1701_form_error_name_Email_confirm_required</p>
                            <p class="tf-message-email_confirm-match message">
                                messages.kor-cpn-event1701_form_error_name_Email_confirm_same</p>
                        </dd>
                    </dl>

                    <div class="form-checkbox agree_newsletter">
                        <p class="agree_newsletter">{{ Form::checkbox("e_newsletter__c", "1", "checked", ["id" => "agree_newsletter", "class" => "checkbox"]) }}
                            <label for="agree_newsletter" class="checkbox"><span>ANA e-newsletter를 구독 하시겠습니까? (선택)</span></label>
                        </p>
                    </div>

                    <div class="form-checkbox">
                        <p class="policy">{{ Form::checkbox("privacy", "1", null, ["id" => "privacy", "class" => "checkbox tf-required"]) }}
                            <label for="privacy" class="checkbox"><span><a href="http://www.ana.co.jp/wws/privacy/e/ana.html" target="_blank">개인 정보 보호 정책</a>에 동의합니다. (필수)</span></label>
                        </p>
                        {!! $errors->first('privacy', '<p class="error">:message</p>') !!}
                        <p align="center" class="tf-message-privacy-required message">
                            messages.kor-cpn-event1701_form_error_privacy_required</p>
                    </div>

                </div>
                <!-- /form-input -->



                <div class="form-btn tf-checker">

                    <div class="submit-btn">
                        <button type="submit" name="confirm-btn" id="submit" class="submit disabled" value="CONFIRM">확인<i class="fa-angle-right"></i></button>
                    </div>
                </div>
                <!-- /Second Person -->

            </div>
        </form>
        <!-- /form -->

    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <b>CONTACT</b> : <a href="mailto:selnh@ana-campaign.com">selnh<span>@</span>ana-campaign.com</a>
                </div>
                <div class="col-xs-6 text-right">
                    <img src="/kor-cpn-event1701/images/footer-logo.png" />
                </div>
            </div>
        </div>
    </footer>
</div>

<a title="Scroll to top" class="scrollup" href="#"><i class="fa fa-angle-up"></i></a>
<script>
    $(document).ready(function () {
        $('#privacy').on('change', function () {
            if ($(this).prop('checked')) {
                $('#submit').removeAttr('disabled').removeClass('disabled');
            } else {
                $('#submit').attr('disabled', 'disabled').addClass('disabled');
            }
        });
        $('#privacy').trigger('change');
    });
</script>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '1783070985282087',
            status     : true,
            cookie     : true,
            xfbml      : true,
            version    : 'v2.7'
        });
    };
    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    document.getElementById('shareBtn').onclick = function() {
        FB.ui({
            method: 'share',
            mobile_iframe: true,
            href: 'https://www.ana-campaign.com/kor-cpn-event1701/',
        }, function(response){});
    }
</script>
<style type="text/css">
    .form-btn .submit.disabled {
        background-color: darkgray;
        cursor: default;
    }

    .form-btn .submit.disabled:hover {
        opacity: 1;
    }
</style>

</body>
</html>