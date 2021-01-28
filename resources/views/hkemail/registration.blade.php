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
                    <a href="/"><img src="/images/logo-en.png" alt="ANA Inspiration of JAPAN"/></a>
                </div>
                <div class="col-xs-12 text-right-side">
                    <select id="lang" onchange="location.href=value">
                        <option value="#" class="selected">English</li>
                        <option value="/tw/">繁體中文(台湾)</option>
                        <option value="/hk/">繁體中文(香港)</option>
                        <option value="/kr/">한국어</option>
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
                <span class="hdg-txt">訂閱</span><br>
                <strong>ANA 電子通訊!</strong>
            </h1>
            <p class="sbsc-now"><a href="#registration"><span class="sbsc-now-txt01"></span><br><span class="sbsc-now-txt02">立即訂閱</span></a></p>
        </div>
    </section>
    <section class="main-contents">
        <div class="outer-box01"><img src="/images/flag.png" alt='Stay connected with ANA'></div>
        <ul class="merit">
            <li>
                <div>
                    <h2>獨家特惠票價</h2>
                    <p>您將會第一時間接收到 ANA<br>限時特惠票價資訊</p>                  
                </div>

            </li>
            <li>
                <div>
                    <h2>搜尋 ANA 推廣優惠</h2>
                    <p>千萬不要錯過本地的推廣活動及資訊。</p>                
                </div>
            </li>
            <li>
                <div>
                    <h2>了解如何計劃日本之旅</h2>
                    <p>我們提供各種日本旅行建議，<br>例如必做的事情，旅行提示等。</p>                    
                </div>
            </li>
            <li>
                <div>
                    <h2>ANA 服務的實用資訊</h2>
                    <p>了解 ANA 最新的航班情況和飛行體驗。</p>
                </div>
            </li>
        </ul>
    </section>

    <div id="registration" class="registration">
        <div class="cloud-img"></div>
        <div class="mainimg">
            <h3 class="title">立即註冊 ANA 電子通訊</h3>
        </div>
        <div class="container">
            <div class="step-number">
                <div class="line"></div>
                <ul class="line">
                    <li class="current"></li>
                    <li></li>
                    <li></li>
                </ul>
                <!--ol>
                    <li class="current">Input</li>
                    <li>Confirmation</li>
                    <li>Completion</li>
                </ol-->
            </div>

            <!-- form -->
            <form method="POST" action="/hk/confirm" accept-charset="UTF-8" id="" name="">
                {!! csrf_field() !!}
                <input type="hidden" name="language" value="hk"/>

                <div class="contents_form">
                    <div class="form-input">
                        <dl>
                            <dt><label for="first_name">名字 (英文)</label> <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam">
                                {{Form::input('text','first_name',array_get($form,'first_name'),['maxlength'=>'40','size'=>35,'class'=>'text tf-required tf-en','placeholder'=>'Taro (名字)'])}}
                                <p class="tf-message-first_name-required message"> 請以英文輸入名字</p>
                                {!! $errors->first('first_name', '<p class="error">:message</p>') !!}
                            </dd>
                        </dl>
                        <dl>
                            <dt><label for="last_name">姓氏 (英文)</label> <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam">
                                {{Form::input('text','last_name',array_get($form,'last_name'),['maxlength'=>'80','size'=>35,'class'=>'text tf-required tf-en','placeholder'=>'Sorano (姓氏)'])}}

                                <p class="tf-message-last_name-required message"> 請以英文輸入姓氏</p>
                                {!! $errors->first('last_name', '<p class="error">:message</p>') !!}
                            </dd>
                        </dl>
                        <dl>
                            <dt><label for="gender">性別</label> <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam">
                                <div class="custom">
                                    {{Form::select("gender",$genderList,array_get($form,'gender'),['id'=>'gender','class'=>'tf-required'])}}
                                </div>
                                {!! $errors->first('gender', '<p class="error">:message</p>') !!}
                            </dd>
                        </dl>
                        <dl>
                            <dt><label for="email">電郵地址</label> <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam">
                                <input size="35" class="text tf-required tf-email" placeholder="sorano-taro@ana.com" name="email" type="text" value="{{array_get($form,'email')}}" maxlength="50">
                                <p class="tf-message-email-required message"> messages.s25_form_error_mail_required</p>
                                {!! $errors->first('email', '<p class="error">:message</p>') !!}
                            </dd>
                        </dl>

                        <dl>
                            <dt><label for="email_confirm">電郵地址 <span> (確認)</span> <span class="form--attention">*</span></label></dt>
                            <dd class="wifi-cam">
                                <input id="email_confirm" size="35" class="text tf-required" placeholder="sorano-taro@ana.com" name="email_confirm" type="text" value="{{array_get($form,'email_confirm')}}" maxlength="50">
                                {!! $errors->first('email_confirm', '<p class="error">:message</p>') !!}
                            </dd>
                        </dl>
                        <dl>
                            <dt><label for="residence_region">居住地區</label> <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam">
                                <div class="custom">
                                    {{Form::select("residence_region",$countryList,array_get($form,'residence_region',$country_name),['id'=>'gender','class'=>'tf-required'])}}
                                </div>
                                {!! $errors->first('residence_region', '<p class="error">:message</p>') !!}
                            </dd>
                        </dl>

                        <div class="form-checkbox agree_newsletter">
                            <p class="agree_newsletter">
                            <p class="agree_newsletter"><input id="agree_newsletter" class="checkbox" checked="checked" name="agree_newsletter" type="checkbox" value="1"><label for="agree_newsletter" class="checkbox"><span>是，我希望收到 ANA E-Newsletter</span></label></p>
                            {!! $errors->first('agree_newsletter', '<p class="error">:message</p>') !!}
                        </div>
                    </div>
                    <!-- /form-input -->

                    <div class="form-note">
                        <p>"如同意透過本網站登記收取 ANA E-Newsletter, 表示閣下已年滿18歲或以上。當完成填寫並送出個人資料後, 表示閣下充分瞭解及同意ANA依據<a href="http://www.ana.co.jp/wws/privacy/hk/ana.html" target="_blank">「隱私權政策」</a>蒐集、處理、利用閣下所提供的個人資料而進行行銷和相關活動。ANA將依據閣下同意接收或將來選擇退出接收訊息的要求而繼續或停止發送相關行銷推廣訊息。</p>
                    </div>

                    <div class="form-btn">
                        <div class="submit-btn">
                            <button type="submit" name="confirm-btn" id="submit" class="submit" value="CONFIRM">確認<i class="fa-angle-right"></i></button>
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
</body>
</html>
