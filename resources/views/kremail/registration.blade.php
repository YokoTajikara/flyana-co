<!DOCTYPE HTML>
<html lang="en" class="en">
<head>
    <meta charset="UTF-8">
    <meta name="fragment" content="!">
    <title>ANA E-Newsletter Registration From</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">

    <link rel="icon" type="image/x-icon" href="https://www.ana.co.jp/favicon.ico">
    <link rel="stylesheet" href="/stylesheets/font-awesome.min.css">
    <link rel="stylesheet" href="/stylesheets/jquery.bxslider.css">
    <link rel="stylesheet" href="/stylesheets/animate.css">
    <link rel="stylesheet" href="/stylesheets/style.css">
    <link rel="stylesheet" href="/stylesheets/form.css">
    <link rel="stylesheet" href="/stylesheets/lp-style.css">
    <link rel="stylesheet" href="/stylesheets/jquery.fs.boxer.css">
    <link rel="stylesheet" href="/stylesheets/font_kr.css">

    <script src="/javascripts/jquery-2.1.4.min.js"></script>
    <script src="/javascripts/bootstrap.min.js"></script>
    <script src="/javascripts/jquery.bxslider.min.js"></script>
    <script src="/javascripts/wow.min.js"></script>
    <script src="/javascripts/base.js"></script>
    <script src="/javascripts/jquery.fs.boxer.js"></script>

    <link rel="stylesheet" type="text/css" href="/javascripts/pick/jquery.minimalect.css" media="screen" />
    <script src="/javascripts/pick/jquery.minimalect.js"></script>

    <style type="text/css">
        .form-btn .submit.disabled {
            background-color: darkgray;
            cursor: default;
        }
        .form-btn .submit.disabled:hover {
            opacity: 1;
        }
    </style>
    <script type="text/javascript">
    $(function() {
        //$("select").minimalect();
		$("#lang").minimalect({ theme: "bubble", placeholder: "Language" });
		});
	</script>

    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-76870021-7', 'auto');
  ga('send', 'pageview');

</script>


</head>

<body class="page-en">
<div class="main-wrapper">
    <header>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-left">
                    <a href="/kr/"><img src="/images/logo-en.png" alt="ANA Inspiration of JAPAN"/></a>
                </div>
                <div class="col-xs-12 text-right-side">
                    <select id="lang" onchange="location.href=value">
                        <option value="#" class="selected">한글
                        </option><option value="/">English</option>
                        <option value="/tw/">繁體中文(台湾)</option>
                        <option value="/hk/">繁體中文(香港)</option>
                        <option value="/id/">Bahasa Indonesia</option>
                        <option value="/th/">ภาษาไทย</option>
                        <option value="/vn/">Việt Nam</option>
                  </select>
                </div>

            </div>
        </div>
    </header>

    <section class="section-mainvisual">
        <div class="inner-box">
            <h1 class="hdg">
                <span class="hdg-txt">구독 신청</span><br>
                <strong>ANA e-뉴스레터!</strong>
            </h1>
            <p class="sbsc-now"><a href="#registration"><img src="/images/kr_ballon.png" alt="지금 구독 신청"></a></p>
        </div>
    </section>
    <section class="main-contents">
        <div class="outer-box01"><img src="/images/kr_flag.png" alt='Stay connected with ANA'></div>
        <ul class="merit">
            <li>
                <div>
                    <h2>스페셜 특가</h2>
                    <p>가장 먼저 ANA의 특가 정보를 받으실 수 있습니다.</p>                  
                </div>

            </li>
            <li>
                <div>
                    <h2>ANA 프로모션</h2>
                    <p>한국에서 진행되는 캠페인과 이벤트 정보와 <br>같은 프로모션 소식을 알려드립니다.</p>                
                </div>
            </li>
            <li>
                <div>
                    <h2>일본 여행 계획에 대한 정보를 확인해 보세요.</h2>
                    <p>일본 여행에서의 활동, 여행 팁 등 다양한 일본<br>여행에 대한 추천을 받아 보세요.</p>                    
                </div>
            </li>
            <li>
                <div>
                    <h2>ANA의 서비스에 대한 정보</h2>
                    <p>ANA로부터 비행과 서비스에 대한 최신<br>업데이트 정보를 받아보세요.</p>
                </div>
            </li>
        </ul>
    </section>

    <div id="registration" class="registration kr hk">
        <div class="cloud-img"></div>
        <div class="mainimg">
            <h3 class="title">ANA e-뉴스레터 구독 신청</h3>
        </div>
        <div class="container">
            <div class="step-number">
                <div class="line"></div>
                <ul class="line">
                    <li class="current"><p>입력</p></li>
                    <li><p>확인</p></li>
                    <li><p>완료</p></li>
                </ul>
                <!--ol>
                    <li class="current">Input</li>
                    <li>Confirmation</li>
                    <li>Completion</li>
                </ol-->
            </div>

            <!-- form -->
            <form method="POST" action="/kr/confirm" accept-charset="UTF-8" id="" name="">
                {!! csrf_field() !!}
                <input type="hidden" name="language" value="kr"/>
                <div class="contents_form">
                    <div class="form-input">
                        <dl>
                            <dt><label for="first_name">이름 (영문)</label> <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam">
                                {{Form::input('text','first_name',array_get($form,'first_name'),['maxlength'=>'40','size'=>35,'class'=>'text tf-required tf-en','placeholder'=>'Taro (이름)'])}}
                                <p class="tf-message-first_name-required message"> 이름을 입력해 주세요</p>
                                {!! $errors->first('first_name', '<p class="error">:message</p>') !!}
                            </dd>
                        </dl>
                        <dl>
                            <dt><label for="last_name">성 (영문)</label> <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam">
                                {{Form::input('text','last_name',array_get($form,'last_name'),['maxlength'=>'80','size'=>35,'class'=>'text tf-required tf-en','placeholder'=>'Sorano (성)'])}}

                                <p class="tf-message-last_name-required message"> 성을 입력해 주세요</p>
                                {!! $errors->first('last_name', '<p class="error">:message</p>') !!}
                            </dd>
                        </dl>
                        <dl>
                            <dt><label for="gender">성별</label> <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam">
                                <div class="custom">
                                    {{Form::select("gender",$genderList,array_get($form,'gender'),['id'=>'gender','class'=>'tf-required'])}}
                                </div>
                                {!! $errors->first('gender', '<p class="error">:message</p>') !!}
                            </dd>
                        </dl>
                        <dl>
                            <dt><label for="email">메일 주소</label> <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam">
                                <input size="35" class="text tf-required tf-email" placeholder="sorano-taro@ana.com" name="email" type="text" value="{{array_get($form,'email')}}" maxlength="50">
                                <p class="tf-message-email-required message"> messages.s25_form_error_mail_required</p>
                                {!! $errors->first('email', '<p class="error">:message</p>') !!}
                            </dd>
                        </dl>

                        <dl>
                            <dt><label for="email_confirm">메일 주소 확인<span class="form--attention">*</span></label></dt>
                            <dd class="wifi-cam">
                                <input id="email_confirm" size="35" class="text tf-required" placeholder="sorano-taro@ana.com" name="email_confirm" type="text" value="{{array_get($form,'email_confirm')}}" maxlength="50">
                                {!! $errors->first('email_confirm', '<p class="error">:message</p>') !!}
                            </dd>
                        </dl>
                        <dl>
                            <dt><label for="residence_region">거주지</label> <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam">
                                <div class="custom">
                                    {{Form::select("residence_region",$countryList,array_get($form,'residence_region',$country_name),['id'=>'gender','class'=>'tf-required'])}}
                                </div>
                                {!! $errors->first('residence_region', '<p class="error">:message</p>') !!}
                            </dd>
                        </dl>

                        <div class="form-checkbox agree_newsletter">
                            <p class="agree_newsletter">
                            <p class="agree_newsletter"><input id="agree_newsletter" class="checkbox" checked="checked" name="agree_newsletter" type="checkbox" value="1"><label for="agree_newsletter" class="checkbox"><span>네, ANA E-newsletter를 구독하겠습니다.</span></label></p>
                            {!! $errors->first('agree_newsletter', '<p class="error">:message</p>') !!}
                        </div>
                    </div>
                    <!-- /form-input -->

                    <div class="form-note">
                        <p>"ANA e-Newsletter 등록 양식을 제출함으로써, 이용자 본인은 18세 이상임을 인정합니다. ANA는 ANA의 개인 정보 보호 정책에 의거하여 귀하가 제공하는 개인 정보를 이용할 수 있습니다. <a href="https://www.ana.co.jp/wws/privacy/k/ana.html" target="_blank">ANA는 위에 명시된 귀하의 요청을 준수하며</a>, ANA에서 마케팅 자료를 수령한 후에 귀하가 요청한 변경 사항을 반영합니다.</p>
                    </div>

                    <div class="form-btn">
                        <div class="submit-btn">
                            <button type="submit" name="confirm-btn" id="submit" class="submit" value="CONFIRM">확인<i class="fa-angle-right"></i></button>
                        </div>
                    </div>

                </div>
            </form>
            <!-- /form -->

        </div>
        <!-- /container -->

    </div>
    <!-- /registration -->


    <footer>
        <div class="container">
            <div class="row">
                <p class="cntct-txt"><span class="txt01">Contact</span><span class="txt02">info@ana-campaign.com</span></p>
                <div class="col-xs-12 text-right">
                    <img src="/images/footer-logo.png" alt="A STAR ALLIANCE MEMBER"/>
                </div>
            </div>
        </div>
        <p class="copy">Copyright<span>&copy;</span>ANA</p>
    </footer>
</div>

<a title="Scroll to top" class="scrollup" href="#"><i class="fa fa-angle-up"></i></a>

<script>
  $(document).ready(function(){
    $('#agree_newsletter').on('change', function () {
      if ($(this).prop('checked')) {
        $('#submit').removeAttr('disabled').removeClass('disabled');
      }else{
        $('#submit').attr('disabled','disabled').addClass('disabled');
      }
    });
    $('#agree_newsletter').trigger('change');
  });
</script>

<script>
  $(".boxer").boxer();
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

<script>/* <![CDATA[ */(function(d,s,a,i,j,r,l,m,t){try{l=d.getElementsByTagName('a');t=d.createElement('textarea');for(i=0;l.length-i;i++){try{a=l[i].href;s=a.indexOf('/cdn-cgi/l/email-protection');m=a.length;if(a&&s>-1&&m>28){j=28+s;s='';if(j<m){r='0x'+a.substr(j,2)|0;for(j+=2;j<m&&a.charAt(j)!='X';j+=2)s+='%'+('0'+('0x'+a.substr(j,2)^r).toString(16)).slice(-2);j++;s=decodeURIComponent(s)+a.substr(j,m-j)}t.innerHTML=s.replace(/</g,'&lt;').replace(/\>/g,'&gt;');l[i].href='mailto:'+t.value}}catch(e){}}}catch(e){}})(document);/* ]]> */</script>
<script type="text/javascript" src="https://www.ana.co.jp/common/js/tealium/tealium_flyana.js"></script>
</body>
</html>
