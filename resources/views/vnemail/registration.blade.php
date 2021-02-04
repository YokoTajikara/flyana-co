<!DOCTYPE HTML>
<html lang="en" class="en">
<head>
    <meta charset="UTF-8">
    <meta name="fragment" content="!">
    <title>ANA e-Newsletter Registration From</title>
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
                    <a href="/vn/"><img src="/images/logo-en.png" alt="ANA Inspiration of JAPAN"/></a>
                </div>
                <div class="col-xs-12 text-right-side">
                    <select id="lang" onchange="location.href=value">
                        <option value="#" class="selected">Việt Nam
                        </option><option value="/">English</option>
                        <option value="/tw/">繁體中文(台湾)</option>
                        <option value="/hk/">繁體中文(香港)</option>
                        <option value="/kr/">한국어</option>
                        <option value="/id/">Bahasa Indonesia</option>
                        <option value="/th/">ภาษาไทย</option>
                  </select>
                </div>

            </div>
        </div>
    </header>

    <section class="section-mainvisual vn">
        <div class="inner-box">
            <h1 class="hdg">
                <span class="hdg-txt">Đăng ký</span><br>
                <strong>bản tin điện tử ANA!</strong>
            </h1>
            <p class="sbsc-now"><a href="#registration"><img src="/images/vn_ballon.png" alt="Đăng ký ngay"></a></p>
        </div>
    </section>
    <section class="main-contents">
        <div class="outer-box01"><img src="/images/vn_flag.png" alt='Stay connected with ANA'></div>
        <ul class="merit vn">
            <li>
                <div>
                    <h2>Giá vé siêu đặc biệt</h2>
                    <p class="vn_sp">Bạn sẽ là người đầu tiên nhận thông tin<br> về giá vé đặc biệt giới hạn từ ANA</p>                  
                </div>

            </li>
            <li>
                <div>
                    <h2>Khám phá các chương trình khuyến mãi của ANA</h2>
                    <p>Đừng bỏ lỡ thông tin về các chương trình khuyến mãi và sự kiện của ANA dành riêng cho khách hàng tại Việt Nam</p>                
                </div>
            </li>
            <li>
                <div>
                    <h2>Khám phá cách lên kế hoạch cho chuyến đi đến Nhật</h2>
                    <p>Chúng tôi đưa ra các gợi ý du lịch Nhật Bản phong phú như các hoạt động hữu ích, lời khuyên du lịch và hơn thế nữa.</p>
                </div>
            </li>
            <li>
                <div>
                    <h2>Thông tin về các dịch vụ của ANA</h2>
                    <p>Luôn cập nhật thông tin và trải nghiệm về chuyến bay ANA</p>
                </div>
            </li>
        </ul>
    </section>

    <div id="registration" class="registration vn">
        <div class="cloud-img"></div>
        <div class="mainimg">
            <h3 class="title">Hãy đăng ký nhận bản tin điện tử ANA</h3>
        </div>
        <div class="container">
            <div class="step-number">
                <div class="line"></div>
                <ul class="line">
                    <li class="current"><p>Nhập thông tin</p></li>
                    <li><p>Xác nhận</p></li>
                    <li><p>Hoàn tất</p></li>
                </ul>
                <!--ol>
                    <li class="current">Input</li>
                    <li>Confirmation</li>
                    <li>Completion</li>
                </ol-->
            </div>

            <!-- form -->
            <form method="POST" action="/vn/confirm" accept-charset="UTF-8" id="" name="">
                {!! csrf_field() !!}
                <input type="hidden" name="language" value="vn"/>

                <div class="contents_form">
                    <div class="form-input">
                        <dl>
                            <dt><label for="first_name">Tên (Chữ cái)</label> <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam">
                                {{Form::input('text','first_name',array_get($form,'first_name'),['maxlength'=>'40','size'=>35,'class'=>'text tf-required tf-en','placeholder'=>'Taro (Tên đệm)'])}}
                                <p class="tf-message-first_name-required message"> Vui lòng nhập Tên</p>
                                {!! $errors->first('first_name', '<p class="error">:message</p>') !!}
                            </dd>
                        </dl>
                        <dl>
                            <dt><label for="last_name">Họ (Chữ cái)</label> <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam">
                                {{Form::input('text','last_name',array_get($form,'last_name'),['maxlength'=>'80','size'=>35,'class'=>'text tf-required tf-en','placeholder'=>'Sorano (Họ)'])}}

                                <p class="tf-message-last_name-required message"> Vui lòng nhập Họ</p>
                                {!! $errors->first('last_name', '<p class="error">:message</p>') !!}
                            </dd>
                        </dl>
                        <dl>
                            <dt><label for="gender">Giới tính</label> <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam">
                                <div class="custom">
                                    {{Form::select("gender",$genderList,array_get($form,'gender'),['id'=>'gender','class'=>'tf-required'])}}
                                </div>
                                {!! $errors->first('gender', '<p class="error">:message</p>') !!}
                            </dd>
                        </dl>
                        <dl>
                            <dt><label for="email">Email</label> <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam">
                                <input size="35" class="text tf-required tf-email" placeholder="sorano-taro@ana.com" name="email" type="text" value="{{array_get($form,'email')}}" maxlength="50">
                                <p class="tf-message-email-required message"> messages.s25_form_error_mail_required</p>
                                {!! $errors->first('email', '<p class="error">:message</p>') !!}
                            </dd>
                        </dl>

                        <dl>
                            <dt><label for="email_confirm">Email <span>(xác nhận lại)</span> <span class="form--attention">*</span></label></dt>
                            <dd class="wifi-cam">
                                <input id="email_confirm" size="35" class="text tf-required" placeholder="sorano-taro@ana.com" name="email_confirm" type="text" value="{{array_get($form,'email_confirm')}}" maxlength="50">
                                {!! $errors->first('email_confirm', '<p class="error">:message</p>') !!}
                            </dd>
                        </dl>
                        <dl>
                            <dt><label for="residence_region">Khu vực cư trú</label> <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam">
                                <div class="custom">
                                    {{Form::select("residence_region",$countryList,array_get($form,'residence_region',$country_name),['id'=>'gender','class'=>'tf-required'])}}
                                </div>
                                {!! $errors->first('residence_region', '<p class="error">:message</p>') !!}
                            </dd>
                        </dl>

                        <div class="form-checkbox agree_newsletter">
                            <p class="agree_newsletter">
                            <p class="agree_newsletter"><input id="agree_newsletter" class="checkbox" checked="checked" name="agree_newsletter" type="checkbox" value="1"><label for="agree_newsletter" class="checkbox"><span>Vâng, tôi đồng ý nhận bản tin điện tử từ ANA</span></label></p>
                            {!! $errors->first('agree_newsletter', '<p class="error">:message</p>') !!}
                        </div>
                    </div>
                    <!-- /form-input -->

                    <div class="form-note">
                        <p>Khi gửi mẫu đăng ký nhận bản tin điện tử ANA này, quý khách xác nhận mình ít nhất 18 tuổi. ANA chỉ sử dụng thông tin cá nhân quý khách cung cấp trong mẫu đăng ký này theo <a href="https://www.ana.co.jp/wws/privacy/v/ana.html" target="_blank">chính sách bảo mật của ANA</a>, và ANA tuân thủ đúng theo yêu cầu của quý khách liệt kê ở trên, và bất cứ thay đổi yêu cầu nào trong tương lai của quý khách, liên quan đến việc nhận bản tin từ ANA.</p>
                    </div>

                    <div class="form-btn">
                        <div class="submit-btn">
                            <button type="submit" name="confirm-btn" id="submit" class="submit" value="CONFIRM">Xác nhận<i class="fa-angle-right"></i></button>
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
