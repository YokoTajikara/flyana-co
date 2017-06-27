<!DOCTYPE HTML>
<html lang="en" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
<head>
    <meta name="fragment" content="!">
    <meta charset="UTF-8">
    <!-- <base href="/"> -->
    <link rel="canonical" href="https://www.ana-campaign.com/bangkok16b/">
    <title>ANA 항공권 구매 이벤트 응모페이지 | 캠페인 | ANA</title>
    <meta name="keywords" content="">
    <meta name="description" content="ANA 항공권 구매 이벤트 응모페이지 | 캠페인 | ANA">
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
    <link rel="stylesheet" type="text/css" href="/kor-cpn-event1701/stylesheets/animate.css">
    <link rel="stylesheet" type="text/css" href="/kor-cpn-event1701/stylesheets/style.css">
    <link rel="stylesheet" type="text/css" href="/kor-cpn-event1701/stylesheets/form.css">

    <script src="/kor-cpn-event1701/javascripts/jquery-2.1.4.min.js"></script>
    <script src="/kor-cpn-event1701/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <script src="/kor-cpn-event1701/jquery.bxslider/jquery.bxslider.min.js"></script>
    <script src="/kor-cpn-event1701/javascripts/wow.min.js"></script>
    <script src="/kor-cpn-event1701/javascripts/base.js"></script>
    <script src="//connect.facebook.net/en_US/all.js"></script>

        <!--ヘッダー移植-->
        <LINK href="/kor-cpn-event1701/common/wws.common.css" rel="stylesheet" type="text/css" media="all">
        <link rel="stylesheet" type="text/css" href="/kor-cpn-event1701/common/wws.share.css">
        <link rel="stylesheet" type="text/css" href="/kor-cpn-event1701/common/wws.reset-form.css">
    <!--ヘッダー移植用CSSココまで-->


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

    <div class="container confirm">
        <div class="contents">
            <div class="contents-header">
                <h2>ANA 항공권 구매 이벤트 응모페이지</h2>
            </div>
        </div>

        <!-- form -->
        <form method="POST" action="/kor-cpn-event1701/thankyou" accept-charset="UTF-8" id="inputForm" name="inputForm">
            {!! csrf_field() !!}
            <div class="contents_form-confirm">
                <div class="form-confirm">
                    <dl>
                        <dt><label>E-ticket 번호</label></dt>
                        <dd><p>{{ array_get($form, 'E_ticket_number__c') }}</p></dd>
                    </dl>

                    <dl>
                        <dt><label>탑승일</label></dt>
                        <dd><p>{{ array_get($form, 'DepartureDate_y__c')}} / {{array_get($form, 'DepartureDate_m__c')}} / {{array_get($form, 'DepartureDate_d__c')}}</p></dd>
                    </dl>

                    <dl>
                        <dt><label>이름</label></dt>
                        <dd><p>{{ array_get($form, 'First_Name__c') }}</p></dd>
                    </dl>

                    <dl>
                        <dt><label>성</label></dt>
                        <dd><p>{{ array_get($form, 'Last_Name__c') }}</p></dd>
                    </dl>


                    <dl>
                        <dt><label>Email</label></dt>
                        <dd><p>{{ array_get($form, 'Email') }}</p></dd>
                    </dl>


                    <div class="form-checkbox">
                        <p class="agree_newsletter confirm">
                            @if(!empty(array_get($form, 'e_newsletter__c')))<i class="fa-check   display "></i>@endif
                            <span>ANA e-newsletter를 구독 하시겠습니까?</span>
                        </p>
                    </div>


                    <div class="form-checkbox">
                        <p class="agree_newsletter confirm">
                            <i class="fa-check   display "></i>
                            <span><a href="http://www.ana.co.jp/wws/privacy/e/ana.html" target="_blank">개인 정보 보호 정책</a>에 동의합니다.</span>
                        </p>
                    </div>


                    <div class="submit-btn confirm-btn">
                        <button type="button" class="back" id="back-btn" name="back-btn" value="BACK" onclick="location.href='/kor-cpn-event1701/registration'">
                            <i class="fa-angle-left"></i>뒤로
                        </button>
                        <button type="submit" class="send" name="regist-btn" value="REGIST">제출
                            <i class="fa-angle-right"></i>
                        </button>
                    </div>

                </div>


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
                    <img src="/kor-cpn-event1701/images/footer-logo.png"/>
                </div>
            </div>
        </div>
    </footer>
</div>

<a title="Scroll to top" class="scrollup" href="#"><i class="fa fa-angle-up"></i></a>

<script>
    window.fbAsyncInit = function () {
        FB.init({
            appId: '1783070985282087',
            status: true,
            cookie: true,
            xfbml: true,
            version: 'v2.7'
        });
    };
    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    document.getElementById('shareBtn').onclick = function () {
        FB.ui({
            method: 'share',
            mobile_iframe: true,
            href: 'https://www.ana-campaign.com/kor-cpn-event1701/',
        }, function (response) {
        });
    }
</script>

<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-84221512-1', 'auto');
    ga('send', 'pageview');

</script>

</body>
</html>