<!DOCTYPE HTML>
<?php if ('en' == $language) { ?>
<html lang="en" class="en">
<?php } else if ('tw' == $language) { ?>
<html lang="zh" class="zh">
<?php } else if ('hk' == $language) { ?>
<html lang="zh" class="zh">
<?php } else if ('kr' == $language) { ?>
<html lang="ko" class="ko">
<?php } else if ('th' == $language) { ?>
<html lang="th" class="th">
<?php } else if ('id' == $language) { ?>
<html lang="in" class="in">
<?php } else if ('vn' == $language) { ?>
<html lang="vi" class="vi">
<?php } ?>
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
    <link rel="stylesheet" href="/stylesheets/jquery.fs.boxer.css">

    <script src="/javascripts/jquery-2.1.4.min.js"></script>
    <script src="/javascripts/bootstrap.min.js"></script>
    <script src="/javascripts/jquery.bxslider.min.js"></script>
    <script src="/javascripts/wow.min.js"></script>
    <script src="/javascripts/base.js"></script>
    <script src="/javascripts/jquery.fs.boxer.js"></script>

    <style type="text/css">
        .form-btn .submit.disabled {
            background-color: darkgray;
            cursor: default;
        }
        .form-btn .submit.disabled:hover {
            opacity: 1;
        }
    </style>
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
                    <a href="#"><img src="/images/logo.png" alt="ANA Inspiration of JAPAN"/></a>
                </div>
            </div>
        </div>
    </header>

<?php if ('en' == $language) { ?>
    <section class="section-mainvisual">
        <div class="mainimg">
            <h1 class="title">Sign up for ANA E-newsletter</h1>
        </div>
    </section>

    <div class="registration">
        <div class="container">
            <div class="step-number">
                <ol>
                    <li>Input</li>
                    <li class="current">Confirmation</li>
                    <li>Completion</li>
                </ol>
            </div>

            <!-- form -->
            <form method="POST" action="/thankyou" accept-charset="UTF-8" id="" name="">
                {!! csrf_field() !!}

                <div class="contents_form">
                    <div class="form-input">
                        <dl>
                            <dt>First Name <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam-confirm">{{ array_get($form, 'first_name') }}</dd>
                        </dl>
                        <dl>
                            <dt>Last Name <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam-confirm">{{ array_get($form, 'last_name') }}</dd>
                        </dl>
                        <dl>
                            <dt>Gender <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam-confirm">{{$genderList[array_get($form,'gender')]}}</dd>
                        </dl>
                        <dl>
                            <dt>Email <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam-confirm">{{array_get($form,'email')}}</dd>
                        </dl>
                        <dl>
                            <dt>Residence Region <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam-confirm">{{array_get($form,'residence_region')}}</dd>
                            <input type="hidden" name="residence_region" value="{{array_get($form,'residence_region')}}">
                        </dl>

                        <div class="form-checkbox agree_newsletter wifi-cam-confirm-list">
                            <p class="agree_newsletter">
                                @if (array_get($form,'agree_newsletter',false)) <i class="fa fa-check " aria-hidden="true"></i> @else <i></i> @endif
                                <span>Yes, I would like to receive e-newsletter from ANA.</span></p>
                        </div>
                    </div>
                    <!-- /form-input -->

                    <div class="form-btn wifi-cam-confirm-list">

                        <div class="submit-btn confirm-btn">
                            <button type="button" class="back" id="back-btn" name="back-btn" value="BACK" onclick="location.href='/registration'">
                                <i class="fa-angle-left"></i>Back
                            </button>
                            <button type="submit" class="send" name="regist-btn" value="REGIST">Submit
                                <i class="fa-angle-right"></i>
                            </button>
                        </div>
                    </div>

                </div>
            </form>
            <!-- /form -->

        </div>
        <!-- /container -->

    </div>
    <!-- /registration -->


<?php } else if ('tw' == $language) { ?>
    <section class="section-mainvisual">
        <div class="mainimg">
            <h1 class="title">立即訂閱ANA電子報</h1>
        </div>
    </section>

    <div class="registration">
        <div class="container">
            <div class="step-number">
                <ol>
                    <li>輸入</li>
                    <li class="current">確認</li>
                    <li>完成</li>
                </ol>
            </div>

            <!-- form -->
            <form method="POST" action="/tw/thankyou" accept-charset="UTF-8" id="" name="">
                {!! csrf_field() !!}

                <div class="contents_form">
                    <div class="form-input">
                        <dl>
                            <dt>名字拼音(英文) <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam-confirm">{{ array_get($form, 'first_name') }}</dd>
                        </dl>
                        <dl>
                            <dt>姓氏拼音(英文) <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam-confirm">{{ array_get($form, 'last_name') }}</dd>
                        </dl>
                        <dl>
                            <dt>性別 <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam-confirm">{{$genderList[array_get($form,'gender')]}}</dd>
                        </dl>
                        <dl>
                            <dt>電子信箱地址 <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam-confirm">{{array_get($form,'email')}}</dd>
                        </dl>
                        <dl>
                            <dt>居住地區 <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam-confirm">{{array_get($form,'residence_region')}}</dd>
                        </dl>

                        <div class="form-checkbox agree_newsletter wifi-cam-confirm-list">
                            <p class="agree_newsletter">
                                @if (array_get($form,'agree_newsletter',false)) <i class="fa fa-check " aria-hidden="true"></i> @else <i></i> @endif
                                <span>是，我願意收到ANA的電子報</span></p>
                        </div>
                    </div>
                    <!-- /form-input -->

                    <div class="form-btn wifi-cam-confirm-list">

                        <div class="submit-btn confirm-btn">
                            <button type="button" class="back" id="back-btn" name="back-btn" value="BACK" onclick="location.href='/registration'">
                                <i class="fa-angle-left"></i>返回
                            </button>
                            <button type="submit" class="send" name="regist-btn" value="REGIST">註冊
                                <i class="fa-angle-right"></i>
                            </button>
                        </div>
                    </div>

                </div>
            </form>
            <!-- /form -->

        </div>
        <!-- /container -->

    </div>
    <!-- /registration -->

<?php } else if ('kr' == $language) { ?>
    <section class="section-mainvisual">
        <div class="mainimg">
            <h1 class="title">지금 바로 E-newsletter에 등록하세요!</h1>
        </div>
    </section>

    <div class="registration">
        <div class="container">
            <div class="step-number">
                <ol>
                    <li>입력</li>
                    <li class="current">확인</li>
                    <li>완료</li>
                </ol>
            </div>

            <!-- form -->
            <form method="POST" action="/kr/thankyou" accept-charset="UTF-8" id="" name="">
                {!! csrf_field() !!}

                <div class="contents_form">
                    <div class="form-input">
                        <dl>
                            <dt>이름 (영문) <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam-confirm">{{ array_get($form, 'first_name') }}</dd>
                        </dl>
                        <dl>
                            <dt>성 (영문) <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam-confirm">{{ array_get($form, 'last_name') }}</dd>
                        </dl>
                        <dl>
                            <dt>성별 <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam-confirm">{{$genderList[array_get($form,'gender')]}}</dd>
                        </dl>
                        <dl>
                            <dt>메일 주소 <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam-confirm">{{array_get($form,'email')}}</dd>
                        </dl>
                        <dl>
                            <dt>거주지 <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam-confirm">{{array_get($form,'residence_region')}}</dd>
                        </dl>

                        <div class="form-checkbox agree_newsletter wifi-cam-confirm-list">
                            <p class="agree_newsletter">
                                @if (array_get($form,'agree_newsletter',false)) <i class="fa fa-check " aria-hidden="true"></i> @else <i></i> @endif
                                <span>네, ANA E-newsletter를 구독하겠습니다.</span></p>
                        </div>
                    </div>
                    <!-- /form-input -->

                    <div class="form-btn wifi-cam-confirm-list">

                        <div class="submit-btn confirm-btn">
                            <button type="button" class="back" id="back-btn" name="back-btn" value="BACK" onclick="location.href='/registration'">
                                <i class="fa-angle-left"></i>뒤로가기
                            </button>
                            <button type="submit" class="send" name="regist-btn" value="REGIST">제출하기
                                <i class="fa-angle-right"></i>
                            </button>
                        </div>
                    </div>

                </div>
            </form>
            <!-- /form -->

        </div>
        <!-- /container -->

    </div>
    <!-- /registration -->

<?php } else if ('hk' == $language) { ?>
    <section class="section-mainvisual">
        <div class="mainimg">
            <h1 class="title">立即訂閱 ANA E-Newsletter</h1>
        </div>
    </section>

    <div class="registration">
        <div class="container">
            <div class="step-number">
                <ol>
                    <li>輸入</li>
                    <li class="current">確認</li>
                    <li>完成</li>
                </ol>
            </div>

            <!-- form -->
            <form method="POST" action="/hk/thankyou" accept-charset="UTF-8" id="" name="">
                {!! csrf_field() !!}

                <div class="contents_form">
                    <div class="form-input">
                        <dl>
                            <dt>名字 (英文) <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam-confirm">{{ array_get($form, 'first_name') }}</dd>
                        </dl>
                        <dl>
                            <dt>姓氏 (英文) <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam-confirm">{{ array_get($form, 'last_name') }}</dd>
                        </dl>
                        <dl>
                            <dt>性別 <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam-confirm">{{$genderList[array_get($form,'gender')]}}</dd>
                        </dl>
                        <dl>
                            <dt>電郵地址 <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam-confirm">{{array_get($form,'email')}}</dd>
                        </dl>
                        <dl>
                            <dt>居住地區 <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam-confirm">{{array_get($form,'residence_region')}}</dd>
                        </dl>

                        <div class="form-checkbox agree_newsletter wifi-cam-confirm-list">
                            <p class="agree_newsletter">
                                @if (array_get($form,'agree_newsletter',false)) <i class="fa fa-check " aria-hidden="true"></i> @else <i></i> @endif
                                <span>是，我希望收到 ANA E-Newsletter</span></p>
                        </div>
                    </div>
                    <!-- /form-input -->

                    <div class="form-btn wifi-cam-confirm-list">

                        <div class="submit-btn confirm-btn">
                            <button type="button" class="back" id="back-btn" name="back-btn" value="BACK" onclick="location.href='/registration'">
                                <i class="fa-angle-left"></i>返回
                            </button>
                            <button type="submit" class="send" name="regist-btn" value="REGIST">登記
                                <i class="fa-angle-right"></i>
                            </button>
                        </div>
                    </div>

                </div>
            </form>
            <!-- /form -->

        </div>
        <!-- /container -->

    </div>
    <!-- /registration -->

<?php } else if ('vn' == $language) { ?>
    <section class="section-mainvisual">
        <div class="mainimg">
            <h1 class="title">Đăng ký nhận bản tin điện tử của ANA</h1>
        </div>
    </section>

    <div class="registration">
        <div class="container">
            <div class="step-number">
                <ol>
                    <li>Nhập thông tin</li>
                    <li class="current">Xác nhận</li>
                    <li>Hoàn tất</li>
                </ol>
            </div>

            <!-- form -->
            <form method="POST" action="/vn/thankyou" accept-charset="UTF-8" id="" name="">
                {!! csrf_field() !!}

                <div class="contents_form">
                    <div class="form-input">
                        <dl>
                            <dt>Tên (Chữ cái) <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam-confirm">{{ array_get($form, 'first_name') }}</dd>
                        </dl>
                        <dl>
                            <dt>Họ (Chữ cái) <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam-confirm">{{ array_get($form, 'last_name') }}</dd>
                        </dl>
                        <dl>
                            <dt>Giới tính <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam-confirm">{{$genderList[array_get($form,'gender')]}}</dd>
                        </dl>
                        <dl>
                            <dt>Email <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam-confirm">{{array_get($form,'email')}}</dd>
                        </dl>
                        <dl>
                            <dt>Khu vực cư trú <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam-confirm">{{array_get($form,'residence_region')}}</dd>
                        </dl>

                        <div class="form-checkbox agree_newsletter wifi-cam-confirm-list">
                            <p class="agree_newsletter">
                                @if (array_get($form,'agree_newsletter',false)) <i class="fa fa-check " aria-hidden="true"></i> @else <i></i> @endif
                                <span>Vâng, tôi đồng ý nhận bản tin điện tử từ ANA.</span></p>
                        </div>
                    </div>
                    <!-- /form-input -->

                    <div class="form-btn wifi-cam-confirm-list">

                        <div class="submit-btn confirm-btn">
                            <button type="button" class="back" id="back-btn" name="back-btn" value="BACK" onclick="location.href='/registration'">
                                <i class="fa-angle-left"></i>Trở về
                            </button>
                            <button type="submit" class="send" name="regist-btn" value="REGIST">Gửi
                                <i class="fa-angle-right"></i>
                            </button>
                        </div>
                    </div>

                </div>
            </form>
            <!-- /form -->

        </div>
        <!-- /container -->

    </div>
    <!-- /registration -->

<?php } else if ('th' == $language) { ?>
    <section class="section-mainvisual">
        <div class="mainimg">
            <h1 class="title">สมัครรับจดหมายข่าวของ ANA</h1>
        </div>
    </section>

    <div class="registration">
        <div class="container">
            <div class="step-number">
                <ol>
                    <li>กรอกข้อมูล</li>
                    <li class="current">ยืนยัน</li>
                    <li>เสร็จสมบูรณ์</li>
                </ol>
            </div>

            <!-- form -->
            <form method="POST" action="/th/thankyou" accept-charset="UTF-8" id="" name="">
                {!! csrf_field() !!}

                <div class="contents_form">
                    <div class="form-input">
                        <dl>
                            <dt>ชื่อ  (ตัวอักษร) <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam-confirm">{{ array_get($form, 'first_name') }}</dd>
                        </dl>
                        <dl>
                            <dt>นามสกุล  (ตัวอักษร) <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam-confirm">{{ array_get($form, 'last_name') }}</dd>
                        </dl>
                        <dl>
                            <dt>เพศ <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam-confirm">{{$genderList[array_get($form,'gender')]}}</dd>
                        </dl>
                        <dl>
                            <dt>อีเมล์ <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam-confirm">{{array_get($form,'email')}}</dd>
                        </dl>
                        <dl>
                            <dt>ประเทศที่พำนัก <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam-confirm">{{array_get($form,'residence_region')}}</dd>
                        </dl>

                        <div class="form-checkbox agree_newsletter wifi-cam-confirm-list">
                            <p class="agree_newsletter">
                                @if (array_get($form,'agree_newsletter',false)) <i class="fa fa-check " aria-hidden="true"></i> @else <i></i> @endif
                                <span>ใช่ ฉันต้องการรับจดหมายข่าวจากANA</span></p>
                        </div>
                    </div>
                    <!-- /form-input -->

                    <div class="form-btn wifi-cam-confirm-list">

                        <div class="submit-btn confirm-btn">
                            <button type="button" class="back" id="back-btn" name="back-btn" value="BACK" onclick="location.href='/registration'">
                                <i class="fa-angle-left"></i>ย้อนกลับ
                            </button>
                            <button type="submit" class="send" name="regist-btn" value="REGIST">ส่ง
                                <i class="fa-angle-right"></i>
                            </button>
                        </div>
                    </div>

                </div>
            </form>
            <!-- /form -->

        </div>
        <!-- /container -->

    </div>
    <!-- /registration -->

<?php } else if ('id' == $language) { ?>
    <section class="section-mainvisual">
        <div class="mainimg">
            <h1 class="title">Pendaftaran ANA E-newsletter</h1>
        </div>
    </section>

    <div class="registration">
        <div class="container">
            <div class="step-number">
                <ol>
                    <li>Memasukkan</li>
                    <li class="current">Setuju</li>
                    <li>Penamatan</li>
                </ol>
            </div>

            <!-- form -->
            <form method="POST" action="/id/thankyou" accept-charset="UTF-8" id="" name="">
                {!! csrf_field() !!}

                <div class="contents_form">
                    <div class="form-input">
                        <dl>
                            <dt>Nama Depan (Alfabet)<span class="form--attention">*</span></dt>
                            <dd class="wifi-cam-confirm">{{ array_get($form, 'first_name') }}</dd>
                        </dl>
                        <dl>
                            <dt>Nama Belakang (Alfabet)<span class="form--attention">*</span></dt>
                            <dd class="wifi-cam-confirm">{{ array_get($form, 'last_name') }}</dd>
                        </dl>
                        <dl>
                            <dt>Jenis Kelamin <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam-confirm">{{$genderList[array_get($form,'gender')]}}</dd>
                        </dl>
                        <dl>
                            <dt>Email <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam-confirm">{{array_get($form,'email')}}</dd>
                        </dl>
                        <dl>
                            <dt>Negara <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam-confirm">{{array_get($form,'residence_region')}}</dd>
                        </dl>

                        <div class="form-checkbox agree_newsletter wifi-cam-confirm-list">
                            <p class="agree_newsletter">
                                @if (array_get($form,'agree_newsletter',false)) <i class="fa fa-check " aria-hidden="true"></i> @else <i></i> @endif
                                <span>Saya setuju untuk menerima e-newsletter dari ANA.</span></p>
                        </div>
                    </div>
                    <!-- /form-input -->

                    <div class="form-btn wifi-cam-confirm-list">

                        <div class="submit-btn confirm-btn">
                            <button type="button" class="back" id="back-btn" name="back-btn" value="BACK" onclick="location.href='/registration'">
                                <i class="fa-angle-left"></i>Kembali
                            </button>
                            <button type="submit" class="send" name="regist-btn" value="REGIST">Daftar
                                <i class="fa-angle-right"></i>
                            </button>
                        </div>
                    </div>

                </div>
            </form>
            <!-- /form -->

        </div>
        <!-- /container -->

    </div>
    <!-- /registration -->
<?php } ?>

    <footer>
        <div class="container">
            <div class="row">
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

<script type="text/javascript">
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
