<!DOCTYPE HTML>
<html lang="en" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
<head>
    <meta name="fragment" content="!">
    <meta charset="UTF-8">
    <!-- <base href="/"> -->
    <link rel="canonical" href="https://www.ana-campaign.com/bangkok16b/">
    <title>ANA Endless Inspire Campaign</title>
    <meta name="keywords" content="ANA, Endless, Inspire, Campaign, fly to Japan, fly to USA">
    <meta name="description" content="Customers who purchase tickets flights through Japan or USA on ANA Sky Web (Thailand) during campaign period (3 October 2016 – 30 December 2016) and apply for join the campaign on websites. You will be the eligible customer who can get the top rewards from ENDLESS INSPIRE Campaign, ANA economy Class tickets to Japan for 2 persons.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">

    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="article">
    <meta property="og:site_name" content="ANA Endless Inspire Campaign">
    <meta property="og:title" content="ANA Endless Inspire Campaign">
    <meta property="og:url" content="https://www.ana-campaign.com/bangkok16b">
    <meta property="og:description" content="Experience Ultimate Travel in Japan with ANA Thailand. Buy online ticket now to win a prize!">
    <meta property="og:image" content="https://www.ana-campaign.com/bangkok16b/images/ogp_noremal.jpg">
    <meta property="fb:app_id" content="1783070985282087">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@FlyANA_official">
    <meta name="twitter:creator" content="@FlyANA_official">
    <meta name="twitter:title" content="ANA Endless Inspire Campaign">
    <meta name="twitter:description" content="Experience Ultimate Travel in Japan with ANA Thailand. Buy online ticket now to win a prize!">
    <meta name="twitter:image" content="https://www.ana-campaign.com/bangkok16b/images/ogp_noremal.jpg">

    <link rel="icon" type="image/x-icon" href="https://www.ana.co.jp/favicon.ico">
    <link rel="stylesheet" href="/bangkok16b/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bangkok16b/font-awesome-4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/bangkok16b/jquery.bxslider/jquery.bxslider.css">
    <link rel="stylesheet" type="text/css" href="/bangkok16b/stylesheets/animate.css">
    <link rel="stylesheet" type="text/css" href="/bangkok16b/stylesheets/style.css">
    <link rel="stylesheet" type="text/css" href="/bangkok16b/stylesheets/form.css">

    <script src="/bangkok16b/javascripts/jquery-2.1.4.min.js"></script>
    <script src="/bangkok16b/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <script src="/bangkok16b/jquery.bxslider/jquery.bxslider.min.js"></script>
    <script src="/bangkok16b/javascripts/wow.min.js"></script>
    <script src="/bangkok16b/javascripts/base.js"></script>
    <script src="//connect.facebook.net/en_US/all.js"></script>
    @include('bangkok16b._component.head')
</head>

<body class="page-en">
@include('bangkok16b._component.bodyAfter')

<div class="main-wrapper">
    <header>
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <a href="/bangkok16b/"><img src="/bangkok16b/images/logo.png"/></a>
                </div>
                <div class="col-xs-6 text-right lang-all">
                    <a href="/bangkok16b" class="lang-en"></a>
                    <a href="/bangkok16b/thai" class="lang-th"></a>
                </div>
            </div>
        </div>
    </header>

    <div class="container registration">
        <h2>REGISTRATION</h2>

        <!-- form -->
        <form method="POST" action="/bangkok16b/thankyou" accept-charset="UTF-8" id="inputForm" name="inputForm">
            {!! csrf_field() !!}

            <div class="contents">


                <div class="contents-wrapper">

                    <div class="eticket-number">
                        <div class="eticket-number-confirm">
                            <dl>
                                <dt><label>Reservation Number</label></dt>
                                <dd><p>{{array_get($form,'reservation_number')}}</p></dd>
                            </dl>
                        </div>
                    </div>

                    <div class="eticket-number">
                        <div class="eticket-number-confirm">
                            <dl>
                                <dt><label>ANA E-ticket number</label></dt>
                                <dd><p>205-{{array_get($form,'eticket_number')}}</p></dd>
                            </dl>
                        </div>
                    </div>

                    <div class="eticket-number">
                        <div class="eticket-number-confirm">
                            <dl>
                                <dt><label>Boarding date of your flight from Bangkok to Tokyo</label></dt>
                                <dd><p>{{array_get($form,'boarding_date_day')}} / {{array_get($form,'boarding_date_month')}} / {{array_get($form,'boarding_date_year')}}</p></dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>


            <div class="contents_form-confirm">
                <div class="form-confirm">
                    <dl>
                        <dt><label>Gender</label></dt>
                        <dd><p>{{$genderList[array_get($form,'gender')]}}</p></dd>
                    </dl>

                    <dl>
                        <dt><label>First Name</label></dt>
                        <dd><p>{{array_get($form,'first_name')}}</p></dd>
                    </dl>

                    <dl>
                        <dt><label>Last Name</label></dt>
                        <dd><p>{{array_get($form,'last_name')}}</p></dd>
                    </dl>

                    <dl>
                        <dt><label>Age</label></dt>
                        <dd><p>{{array_get($form,'age')}}</p></dd>
                    </dl>

                    <dl>
                        <dt><label>Mobile Phone Number</label></dt>
                        <dd><p>{{array_get($form,'mobile')}}</p></dd>
                    </dl>

                    <dl>
                        <dt><label>Email</label></dt>
                        <dd><p>{{array_get($form,'email')}}</p></dd>
                    </dl>

                    <dl>
                        <dt><label>Holder of airline frequent flyer program</label></dt>
                        <dd class="form-checkbox holder" style="margin-left:1%;">
                            <p class="agree_newsletter confirm">
                                @if (in_array('ANA',array_get($form,'holder_of_airline',[]))) <i class="fa-check   display "></i> @else <i></i> @endif
                                <span>ANA</span>
                            </p>
                            <p class="agree_newsletter confirm">
                                @if (in_array('Thai',array_get($form,'holder_of_airline',[]))) <i class="fa-check   display "></i> @else <i></i> @endif
                                <span>Thai Airways</span>
                            </p>
                            <p class="agree_newsletter confirm">
                                @if (in_array('JAL',array_get($form,'holder_of_airline',[]))) <i class="fa-check   display "></i> @else <i></i> @endif
                                <span>JAL</span>
                            </p>
                            <p class="agree_newsletter confirm">
                                @if (in_array('StarAlliance',array_get($form,'holder_of_airline',[]))) <i class="fa-check   display "></i> @else <i></i> @endif
                                <span>Membership of Star Alliance Carriers</span>
                            </p>
                            <p class="agree_newsletter confirm">
                                @if (in_array('Others',array_get($form,'holder_of_airline',[]))) <i class="fa-check   display "></i> @else <i></i> @endif
                                <span>Others</span>
                            </p>
                            <p class="agree_newsletter confirm">
                                @if (in_array('No',array_get($form,'holder_of_airline',[]))) <i class="fa-check   display "></i> @else <i></i> @endif
                                <span>No</span>
                            </p></dd>

                    </dl>

                    <dl>
                        <dt><label>Motive for your ticket purchase through ANA website Thailand</label></dt>
                        <dd class="form-checkbox holder" style="margin-left:1%;">
                            <p class="agree_newsletter confirm">
                                @if (in_array('deals',array_get($form,'motive_for_your_ticket',[]))) <i class="fa-check   display "></i> @else <i></i> @endif
                                <span>Better deals than other airlines or booking channels</span>
                            </p>
                            <p class="agree_newsletter confirm">
                                @if (in_array('advantage',array_get($form,'motive_for_your_ticket',[]))) <i class="fa-check   display "></i> @else <i></i> @endif
                                <span>Taking advantage of this campaign</span>
                            </p>
                            <p class="agree_newsletter confirm">
                                @if (in_array('noseats',array_get($form,'motive_for_your_ticket',[]))) <i class="fa-check   display "></i> @else <i></i> @endif
                                <span>No available seats on your preferred airlines</span>
                            </p>
                            <p class="agree_newsletter confirm">
                                @if (in_array('ANAnetwork',array_get($form,'motive_for_your_ticket',[]))) <i class="fa-check   display "></i> @else <i></i> @endif
                                <span>ANA's extensive network</span>
                            </p>
                            <p class="agree_newsletter confirm">
                                @if (in_array('frequentANA',array_get($form,'motive_for_your_ticket',[]))) <i class="fa-check   display "></i> @else <i></i> @endif
                                <span>Frequent customer of ANA</span>
                            </p>
                            <p class="agree_newsletter confirm">
                                @if (in_array('ANAservice',array_get($form,'motive_for_your_ticket',[]))) <i class="fa-check   display "></i> @else <i></i> @endif
                                <span>Keen on ANA's service</span>
                            </p>
                            <p class="agree_newsletter confirm">
                                @if (in_array('GoodANA',array_get($form,'motive_for_your_ticket',[]))) <i class="fa-check   display "></i> @else <i></i> @endif
                                <span>Good reputation about ANA from your acquaintance or media</span>
                            </p>
                            <p class="agree_newsletter confirm">
                                @if (in_array('Other',array_get($form,'motive_for_your_ticket',[]))) <i class="fa-check   display "></i> @else <i></i> @endif
                                <span>Other (if any, specify)</span>
                            </p>
                            <p class="agree_newsletter confirm">
                                @if (in_array('No_particular',array_get($form,'motive_for_your_ticket',[]))) <i class="fa-check   display "></i> @else <i></i> @endif
                                <span>None in particular</span>
                            </p>
                            <p>{!!  nl2br(e(array_get($form,'motive_for_your_ticket_text'))) !!}</p>
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Any suggestion or feedback about this campaign or ANA</label></dt>
                        <dd>
                            <p>{!! nl2br(e(array_get($form,'any_suggestion'))) !!}</p>
                        </dd>
                    </dl>


                    <div class="form-checkbox">
                        <p class="agree_newsletter confirm">
                            @if (array_get($form,'agree_newsletter',false)) <i class="fa-check   display "></i> @else <i></i> @endif
                            <span>Check this box if you would like to subscribe for e-newsletter from ANA.</span>
                        </p>
                    </div>

                    <div class="form-checkbox">
                        <p class="agree_newsletter confirm">
                            <i class="fa-check   display "></i>
                            <span>I agree with the ANA's <a href="http://www.ana.co.jp/wws/privacy/e/ana.html" target="_blank">privacy policy</a></span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="submit-btn confirm-btn">
                <button type="button" class="back" id="back-btn" name="back-btn" value="BACK" onclick="location.href='/bangkok16b/registration'">
                    <i class="fa-angle-left"></i>Back
                </button>
                <button type="submit" class="send" name="regist-btn" value="REGIST">Submit
                    <i class="fa-angle-right"></i>
                </button>
            </div>

        </form>
    </div>


</div>
<!-- /form -->

</div>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-xs-6">
                <b>CONTACT</b> : <a href="mailto:bkkdesk@ana-campaign.com">bkkdesk<span>@</span>ana-campaign.com</a>
            </div>
            <div class="col-xs-6 text-right">
                <img src="/bangkok16b/images/footer-logo.png"/>
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
            href: 'https://www.ana-campaign.com/bangkok16b/',
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
