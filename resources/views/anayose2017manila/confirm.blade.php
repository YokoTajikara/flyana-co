<!DOCTYPE HTML>
<html lang="en" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
<head>
    <meta name="fragment" content="!">
    <meta charset="UTF-8">
    <!-- <base href="/"> -->
    <link rel="canonical" href="https://www.ana-campaign.com/anayose2017manila/">
    <title>ANA Endless Inspire Campaign</title>
    <meta name="keywords" content="ANA, Endless, Inspire, Campaign, fly to Japan, fly to USA">
    <meta name="description"
          content="Customers who purchase tickets flights through Japan or USA on ANA Sky Web (Thailand) during campaign period (3 October 2016 – 30 December 2016) and apply for join the campaign on websites. You will be the eligible customer who can get the top rewards from ENDLESS INSPIRE Campaign, ANA economy Class tickets to Japan for 2 persons.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">

    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="article">
    <meta property="og:site_name" content="ANA Endless Inspire Campaign">
    <meta property="og:title" content="ANA Endless Inspire Campaign">
    <meta property="og:url" content="https://www.ana-campaign.com/anayose2017manila">
    <meta property="og:description"
          content="Experience Ultimate Travel in Japan with ANA Thailand. Buy online ticket now to win a prize!">
    <meta property="og:image" content="https://www.ana-campaign.com/anayose2017manila/images/ogp_noremal.jpg">
    <meta property="fb:app_id" content="1783070985282087">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@FlyANA_official">
    <meta name="twitter:creator" content="@FlyANA_official">
    <meta name="twitter:title" content="ANA Endless Inspire Campaign">
    <meta name="twitter:description"
          content="Experience Ultimate Travel in Japan with ANA Thailand. Buy online ticket now to win a prize!">
    <meta name="twitter:image" content="https://www.ana-campaign.com/anayose2017manila/images/ogp_noremal.jpg">

    <link rel="icon" type="image/x-icon" href="https://www.ana.co.jp/favicon.ico">
    <link rel="stylesheet" href="/anayose2017manila/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/anayose2017manila/font-awesome-4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/anayose2017manila/jquery.bxslider/jquery.bxslider.css">
    <link rel="stylesheet" type="text/css" href="/anayose2017manila/stylesheets/style.css">
    <link rel="stylesheet" type="text/css" href="/anayose2017manila/stylesheets/form.css">

    <script src="/anayose2017manila/javascripts/jquery-2.1.4.min.js"></script>
    <script src="/anayose2017manila/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <script src="/anayose2017manila/jquery.bxslider/jquery.bxslider.min.js"></script>
    <script src="/anayose2017manila/javascripts/base.js"></script>
    <script src="//connect.facebook.net/en_US/all.js"></script>
</head>

<body class="page-en">

<div class="main-wrapper">
    <header>
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <a href="../"><img src="/anayose2017manila/images/logo.png"/></a>
                </div>
            </div>
        </div>
    </header>

  <div class="container confirm">
     <div class="contents">
                <div class="contents-header">
                    <h2>REGISTRATION FOR<br>ANA YOSE ON FEBRUARY 19TH, 2017</h2>
                </div>
            </div>

        <!-- form -->
        <form method="POST" action="/anayose2017manila/thankyou" accept-charset="UTF-8" id="inputForm" name="inputForm">
            {!! csrf_field() !!}
            <div class="contents_form-confirm">
                <div class="form-confirm">
                    <dl>
                        <dt><label>Title</label></dt>
                        <dd><p>
                                @if(array_get($form, 'Title__c') == "Miss")
                                    Ms
                                @else
                                    {{ array_get($form, 'Title__c') }}
                                @endif
                            </p>
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>First Name</label></dt>
                        <dd><p>{{ array_get($form, 'First_Name__c') }}</p></dd>
                    </dl>

                    <dl>
                        <dt><label>Last Name</label></dt>
                        <dd><p>{{ array_get($form, 'Last_Name__c') }}</p></dd>
                    </dl>

                    <dl>
                        <dt><label>Gender</label></dt>
                        <dd><p>{{ array_get($form, 'sex__c') }}</p></dd>
                    </dl>

                    <dl>
                        <dt><label>Date Of Birth</label></dt>
                        <dd><p>{{ array_get($form, 'Birthday_y__c')}} / {{array_get($form, 'Birthday_m__c')}}
                                / {{array_get($form, 'Birthday_d__c')}}</p></dd>
                    </dl>

                    <dl>
                        <dt><label>Occupation</label></dt>
                        <dd><p>{{ array_get($form, 'Occupation__c') }}</p></dd>
                    </dl>

                    <dl>
                        <dt><label>Mobile Phone Number</label></dt>
                        <dd><p>{{ array_get($form, 'Mobile_phone__c') }}</p></dd>
                    </dl>

                    <dl>
                        <dt><label>Email</label></dt>
                        <dd><p>{{ array_get($form, 'Email') }}</p></dd>
                    </dl>

                    <dl>
                        <dt><label>How many will attend YOSE event?</label></dt>
                        <dd><p>{{ array_get($form, 'How_many_will_attend_YOSE_event__c') }}</p></dd>
                    </dl>

                    <dl>
                        <dt><label>How often do you travel overseas per year?</label></dt>
                        <dd>
                            <p>{{ array_get($form, 'How_often_do_you_travel_overseas_p_year__c') }}</p>
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Country of residence</label></dt>
                        <dd>@if(array_get($form, "Country_of_residence__c"))<p>{{  array_get($form, "Country_of_residence__c") }}</p>@else<p></p>@endif</dd>
                    </dl>

                    <dl>
                        <dt><label>How do you know this event?</label></dt>
                        <dd class="form-checkbox holder" style="margin-left:1%;">
                            <p class="agree_newsletter confirm">
                                @if(array_get($form, "ana_web_site"))<i class="fa-check display "></i>@else<i></i>@endif
                                <span>ANA Philippines Website</span>
                            </p>
                            <p class="agree_newsletter confirm">
                                @if(array_get($form, "JFM"))<i class="fa-check display "></i>@else<i></i>@endif
                                <span>Japan Foundation Manila</span>
                            </p>
                            <p class="agree_newsletter confirm">
                                @if(array_get($form, "Newspaper"))<i class="fa-check display "></i>@else<i></i>@endif
                                <span>Newspaper</span>
                            </p>
                            <p class="agree_newsletter confirm">
                                @if(array_get($form, "PPW"))<i class="fa-check display "></i>@else<i></i>@endif
                                <span>Philippine Primer Web</span>
                            </p>
                            <p class="agree_newsletter confirm">
                                @if(array_get($form, "Friend/Relatives"))<i class="fa-check display "></i>@else
                                    <i></i>@endif
                                <span>Friend/Relatives</span>
                            </p>
                            <p class="agree_newsletter confirm">
                                @if(array_get($form, "Others"))<i class="fa-check display "></i>@else<i></i>@endif
                                <span>Others</span>
                            </p>
                            @if(array_get($form, "othertext"))<p>{{  array_get($form, "othertext") }}</p>@else<p></p>@endif
                        </dd>
                    </dl>
                </div>
                @if(!empty(array_get($form, 'Person2_Title__c')))
                <div class="form-input-second form-confirm">
                    <h3>Second person to apply</h3>
                    <dl>
                        <dt><label>Title</label></dt>
                        <dd><p>
                                @if(array_get($form, 'Person2_Title__c') == "Miss")
                                    Ms
                                @else
                                    {{ array_get($form, 'Person2_Title__c') }}
                                @endif
                            </p>
                        </dd>
                    </dl>
S
                    <dl>
                        <dt><label>First Name</label></dt>
                        <dd><p>{{ array_get($form, 'Person2_First_Name__c') }}</p></dd>
                    </dl>

                    <dl>
                        <dt><label>Last Name</label></dt>
                        <dd><p>{{ array_get($form, 'Person2_Last_Name__c') }}</p></dd>
                    </dl>

                    <dl>
                        <dt><label>Gender</label></dt>
                        <dd><p>{{ array_get($form, 'Person2_Gender__c') }}</p></dd>
                    </dl>

                    <dl>
                        <dt><label>Date Of Birth</label></dt>
                        <dd>@if(!empty(array_get($form, 'Person2_Date_of_Birthday_y__c')))
                                    <p>{{ array_get($form, 'Person2_Date_of_Birthday_y__c')}} / {{array_get($form, 'Person2_Date_of_Birthday_m__c')}}/ {{array_get($form, 'Person2_Date_of_Birthday_d__c')}}</p>
                                @else
                                    <p></p>
                                @endif
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Mobile Phone Number</label></dt>
                        <dd>@if(array_get($form, "Person2_Mobile_Phone__c"))<p>{{  array_get($form, "Person2_Mobile_Phone__c") }}</p>@else<p></p>@endif</dd>
                    </dl>
                </div>
                @endif
                <div class="submit-btn confirm-btn">
                    <button type="button" class="back" id="back-btn" name="back-btn" value="BACK" onclick="location.href='/anayose2017manila/registration'">
                        <i class="fa-angle-left"></i>Back
                    </button>
                    <button type="submit" class="send" name="regist-btn" value="REGIST">Submit
                        <i class="fa-angle-right"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <!-- /form -->
</div>
</div>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-xs-6">
               <b>CONTACT</b> : <a href="mailto:anayose2017manila@ana-campaign.com">anayose2017manila<span>@</span>ana-campaign.com</a>
                </div>
            <div class="col-xs-6 text-right">
                <img src="/anayose2017manila/images/footer-logo.png"/>
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
<!--▼SiteCatalyst----------------------------------------------------------------------->
<!-- SiteCatalyst code version: H.2.
Copyright 1997-2005 Omniture, Inc. More info available at http://www.omniture.com -->
<script language="JavaScript"><!--
SiteCatalystReportSuites = "GLOBAL_OTHER";
SiteCatalystCharSet   = "UTF-8";
SiteCatalystChannel   = "ANA-CAMPAIGN";
//--></script>
<script language="JavaScript"><!--
strSCodePath="//www.ana.co.jp/common/js/sitecatalyst/s_code_" + SiteCatalystReportSuites + ".js";
strSCodeToPaste="//www.ana.co.jp/wws/js/code_to_paste_wws.js";
document.write("<script type='text/javascript' src='" + strSCodePath +"'></scri"+"pt>");
document.write("<script type='text/javascript' src='" + strSCodeToPaste +"'></scri"+"pt>");
// --></script>
<!-- End SiteCatalyst code version: H.2. -->
<!--▲SiteCatalyst----------------------------------------------------------------------->
<script language="JavaScript"><!--
function SCClick(LinkName){
	var s=s_gi(s_account);
	s.linkTrackVars='prop7,eVar7,prop13,prop14';
	s.prop7		= LinkName;
	s.eVar7		= LinkName;
	s.prop13	= SiteCatalystCookie0;
	s.prop14	= SiteCatalystDateTimeSec;
	s.tl(this,'o',LinkName);
}
//--></script>

</body>
</html>
