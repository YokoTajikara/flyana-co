<!DOCTYPE HTML>
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
                    <li class="current">Input</li>
                    <li>Confirmation</li>
                    <li>Completion</li>
                </ol>
            </div>

            <!-- form -->
            <form method="POST" action="/confirm" accept-charset="UTF-8" id="" name="">
                {!! csrf_field() !!}

                <div class="contents_form">
                    <div class="form-input">
                        <dl>
                            <dt><label for="first_name">First Name</label> <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam">
                                {{Form::input('text','first_name',array_get($form,'first_name'),['maxlength'=>'40','size'=>35,'class'=>'text tf-required tf-en','placeholder'=>'Taro (Given name)'])}}
                                <p class="tf-message-first_name-required message"> Please enter first name.</p>
                                {!! $errors->first('first_name', '<p class="error">:message</p>') !!}
                            </dd>
                        </dl>
                        <dl>
                            <dt><label for="last_name">Last Name</label> <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam">
                                {{Form::input('text','last_name',array_get($form,'last_name'),['maxlength'=>'80','size'=>35,'class'=>'text tf-required tf-en','placeholder'=>'Sorano (Surname)'])}}

                                <p class="tf-message-last_name-required message"> Please enter last name.</p>
                                {!! $errors->first('last_name', '<p class="error">:message</p>') !!}
                            </dd>
                        </dl>
                        <dl>
                            <dt><label for="gender">Gender</label> <span class="form--attention">*</span></dt>
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
                            <dt><label for="email_confirm">Email <span>(Confirmation)</span> <span class="form--attention">*</span></label></dt>
                            <dd class="wifi-cam">
                                <input id="email_confirm" size="35" class="text tf-required" placeholder="sorano-taro@ana.com" name="email_confirm" type="text" value="{{array_get($form,'email_confirm')}}" maxlength="50">
                                {!! $errors->first('email_confirm', '<p class="error">:message</p>') !!}
                            </dd>
                        </dl>
                        <dl>
                            <dt><label for="residence_region">Residence Region</label> <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam">
                                {{Form::input('text','residence_region',array_get($form,'residence_region',$country_name),['size'=>35,'class'=>'text tf-required tf-en','placeholder'=>''])}}
                                {!! $errors->first('residence_region', '<p class="error">:message</p>') !!}
                            </dd>
                        </dl>

                        <div class="form-checkbox agree_newsletter">
                            <p class="agree_newsletter">
                            <p class="agree_newsletter"><input id="agree_newsletter" class="checkbox" checked="checked" name="agree_newsletter" type="checkbox" value="1"><label for="agree_newsletter" class="checkbox"><span>Yes, I would like to receive e-newsletter from ANA.</span></label></p>
                            {!! $errors->first('agree_newsletter', '<p class="error">:message</p>') !!}
                        </div>
                    </div>
                    <!-- /form-input -->

                    <div class="form-note">
                        <p>By submitting this ANA e-Newsletter enrollment form you acknowledge to ANA that you are at least 18 years of age.<br>
                            ANA will only use the personal information you provide in this sign up form in accordance with <a href="http://www.ana.co.jp/wws/privacy/e/ana.html" target="_blank">ANA's privacy policy</a>, and ANA will comply with your requests indicated above, and any changes to those requests you indicate in the future, regarding the receipt of marketing materials from ANA.</p>
                    </div>

                    <div class="form-btn">
                        <div class="submit-btn">
                            <button type="submit" name="confirm-btn" id="submit" class="submit" value="CONFIRM">Confirm<i class="fa-angle-right"></i></button>
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
                    <li class="current">輸入</li>
                    <li>確認</li>
                    <li>完成</li>
                </ol>
            </div>

            <!-- form -->
            <form method="POST" action="/tw/confirm" accept-charset="UTF-8" id="" name="">
                {!! csrf_field() !!}

                <div class="contents_form">
                    <div class="form-input">
                        <dl>
                            <dt><label for="first_name">名字拼音(英文)</label> <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam">
                                {{Form::input('text','first_name',array_get($form,'first_name'),['maxlength'=>'40','size'=>35,'class'=>'text tf-required tf-en','placeholder'=>'Taro (名字)'])}}
                                <p class="tf-message-first_name-required message"> 請輸入名字拼音(英文)</p>
                                {!! $errors->first('first_name', '<p class="error">:message</p>') !!}
                            </dd>
                        </dl>
                        <dl>
                            <dt><label for="last_name">姓氏拼音(英文)</label> <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam">
                                {{Form::input('text','last_name',array_get($form,'last_name'),['maxlength'=>'80','size'=>35,'class'=>'text tf-required tf-en','placeholder'=>'Sorano (姓氏)'])}}

                                <p class="tf-message-last_name-required message"> 請輸入姓氏拼音(英文)</p>
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
                            <dt><label for="email">電子信箱地址</label> <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam">
                                <input size="35" class="text tf-required tf-email" placeholder="sorano-taro@ana.com" name="email" type="text" value="{{array_get($form,'email')}}" maxlength="50">
                                <p class="tf-message-email-required message"> messages.s25_form_error_mail_required</p>
                                {!! $errors->first('email', '<p class="error">:message</p>') !!}
                            </dd>
                        </dl>

                        <dl>
                            <dt><label for="email_confirm">請您確認電子信箱地址<span class="form--attention">*</span></label></dt>
                            <dd class="wifi-cam">
                                <input id="email_confirm" size="35" class="text tf-required" placeholder="sorano-taro@ana.com" name="email_confirm" type="text" value="{{array_get($form,'email_confirm')}}" maxlength="50">
                                {!! $errors->first('email_confirm', '<p class="error">:message</p>') !!}
                            </dd>
                        </dl>
                        <dl>
                            <dt><label for="residence_region">居住地區</label> <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam">
                                {{Form::input('text','residence_region',array_get($form,'residence_region',$country_name),['size'=>35,'class'=>'text tf-required tf-en','placeholder'=>''])}}
                                {!! $errors->first('residence_region', '<p class="error">:message</p>') !!}
                            </dd>
                        </dl>

                        <div class="form-checkbox agree_newsletter">
                            <p class="agree_newsletter">
                            <p class="agree_newsletter"><input id="agree_newsletter" class="checkbox" checked="checked" name="agree_newsletter" type="checkbox" value="1"><label for="agree_newsletter" class="checkbox"><span>是，我願意收到ANA的電子報</span></label></p>
                            {!! $errors->first('agree_newsletter', '<p class="error">:message</p>') !!}
                        </div>
                    </div>
                    <!-- /form-input -->

                    <div class="form-note">
                        <p>"當您同意透過本網站註冊ANA電子報,即表明您已年滿18歲或以上。當您完成填寫並送出個人資料後，即視同您充分瞭解及同意ANA依據<a href="http://www.ana.co.jp/wws/privacy/tw/ana.html" target="_blank">「隱私權政策」</a>蒐集、處理、利用 您所提供的個人資料而進行行銷相關活動。ANA將依據您同意接收或者未來選擇退出接收訊息的需求而繼續或停止發送相關行銷推廣訊息。</p>
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
                    <li class="current">입력</li>
                    <li>확인</li>
                    <li>완료</li>
                </ol>
            </div>

            <!-- form -->
            <form method="POST" action="/kr/confirm" accept-charset="UTF-8" id="" name="">
                {!! csrf_field() !!}

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
                                {{Form::input('text','residence_region',array_get($form,'residence_region',$country_name),['size'=>35,'class'=>'text tf-required tf-en','placeholder'=>''])}}
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
                        <p>"ANA e-Newsletter 등록 양식을 제출함으로써, 이용자 본인은 18세 이상임을 인정합니다. ANA는 ANA의 개인 정보 보호 정책에 의거하여 귀하가 제공하는 개인 정보를 이용할 수 있습니다. <a href="http://www.ana.co.jp/wws/privacy/kr/ana.html" target="_blank">ANA는 위에 명시된 귀하의 요청을 준수하며</a>, ANA에서 마케팅 자료를 수령한 후에 귀하가 요청한 변경 사항을 반영합니다.</p>
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
                    <li class="current">輸入</li>
                    <li>確認</li>
                    <li>完成</li>
                </ol>
            </div>

            <!-- form -->
            <form method="POST" action="/hk/confirm" accept-charset="UTF-8" id="" name="">
                {!! csrf_field() !!}

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
                                {{Form::input('text','residence_region',array_get($form,'residence_region',$country_name),['size'=>35,'class'=>'text tf-required tf-en','placeholder'=>''])}}
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
                    <li class="current">Nhập thông tin</li>
                    <li>Xác nhận</li>
                    <li>Hoàn tất</li>
                </ol>
            </div>

            <!-- form -->
            <form method="POST" action="/vn/confirm" accept-charset="UTF-8" id="" name="">
                {!! csrf_field() !!}

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
                                {{Form::input('text','residence_region',array_get($form,'residence_region',$country_name),['size'=>35,'class'=>'text tf-required tf-en','placeholder'=>''])}}
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
                        <p>Khi gửi mẫu đăng ký nhận bản tin điện tử ANA này, quý khách xác nhận mình ít nhất 18 tuổi. ANA chỉ sử dụng thông tin cá nhân quý khách cung cấp trong mẫu đăng ký này theo chính sách bảo mật của ANA, và ANA tuân thủ đúng theo yêu cầu của quý khách liệt kê ở trên, và bất cứ thay đổi yêu cầu nào trong tương lai của quý khách, liên quan đến việc nhận bản tin từ ANA.</p>
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
                    <li class="current">กรอกข้อมูล</li>
                    <li>ยืนยัน</li>
                    <li>เสร็จสมบูรณ์</li>
                </ol>
            </div>

            <!-- form -->
            <form method="POST" action="/th/confirm" accept-charset="UTF-8" id="" name="">
                {!! csrf_field() !!}

                <div class="contents_form">
                    <div class="form-input">
                        <dl>
                            <dt><label for="first_name">ชื่อ  (ตัวอักษร)</label> <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam">
                                {{Form::input('text','first_name',array_get($form,'first_name'),['maxlength'=>'40','size'=>35,'class'=>'text tf-required tf-en','placeholder'=>'Taro (ชื่อจริง)'])}}
                                <p class="tf-message-first_name-required message"> โปรดใส่ชื่อจริง</p>
                                {!! $errors->first('first_name', '<p class="error">:message</p>') !!}
                            </dd>
                        </dl>
                        <dl>
                            <dt><label for="last_name">นามสกุล  (ตัวอักษร)</label> <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam">
                                {{Form::input('text','last_name',array_get($form,'last_name'),['maxlength'=>'80','size'=>35,'class'=>'text tf-required tf-en','placeholder'=>'Sorano (นามสกุล)'])}}

                                <p class="tf-message-last_name-required message"> โปรดใส่นามสกุล</p>
                                {!! $errors->first('last_name', '<p class="error">:message</p>') !!}
                            </dd>
                        </dl>
                        <dl>
                            <dt><label for="gender">เพศ</label> <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam">
                                <div class="custom">
                                    {{Form::select("gender",$genderList,array_get($form,'gender'),['id'=>'gender','class'=>'tf-required'])}}
                                </div>
                                {!! $errors->first('gender', '<p class="error">:message</p>') !!}
                            </dd>
                        </dl>
                        <dl>
                            <dt><label for="email">อีเมล์</label> <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam">
                                <input size="35" class="text tf-required tf-email" placeholder="sorano-taro@ana.com" name="email" type="text" value="{{array_get($form,'email')}}" maxlength="50">
                                <p class="tf-message-email-required message"> messages.s25_form_error_mail_required</p>
                                {!! $errors->first('email', '<p class="error">:message</p>') !!}
                            </dd>
                        </dl>

                        <dl>
                            <dt><label for="email_confirm">อีเมล์ <span>(ยืนยันอีกครั้ง)</span> <span class="form--attention">*</span></label></dt>
                            <dd class="wifi-cam">
                                <input id="email_confirm" size="35" class="text tf-required" placeholder="sorano-taro@ana.com" name="email_confirm" type="text" value="{{array_get($form,'email_confirm')}}" maxlength="50">
                                {!! $errors->first('email_confirm', '<p class="error">:message</p>') !!}
                            </dd>
                        </dl>
                        <dl>
                            <dt><label for="residence_region">ประเทศที่พำนัก</label> <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam">
                                {{Form::input('text','residence_region',array_get($form,'residence_region',$country_name),['size'=>35,'class'=>'text tf-required tf-en','placeholder'=>''])}}
                                {!! $errors->first('residence_region', '<p class="error">:message</p>') !!}
                            </dd>
                        </dl>

                        <div class="form-checkbox agree_newsletter">
                            <p class="agree_newsletter">
                            <p class="agree_newsletter"><input id="agree_newsletter" class="checkbox" checked="checked" name="agree_newsletter" type="checkbox" value="1"><label for="agree_newsletter" class="checkbox"><span>ใช่ ฉันต้องการรับจดหมายข่าวจากANA</span></label></p>
                            {!! $errors->first('agree_newsletter', '<p class="error">:message</p>') !!}
                        </div>
                    </div>
                    <!-- /form-input -->

                    <div class="form-note">
                        <p>ในการสมัครรับจดหมายข่าวANAนี้ ท่านรับรองว่าท่านมีอายุอย่างน้อย 18 ปี  ANAจะใช้ข้อมูลส่วนบุคคลที่ท่านให้ในแบบฟอร์มการสมัครนี้เท่านั้นตามนโยบายความเป็นส่วนตัวของANA และANAจะปฏิบัติตามคำขอของท่านที่ระบุข้างต้นและคำขอในการเปลี่ยนแปลงใดๆที่ท่านระบุในอนาคตเกี่ยวกับการรับเอกสารทางการตลาดจาก ANA</p>
                    </div>

                    <div class="form-btn">
                        <div class="submit-btn">
                            <button type="submit" name="confirm-btn" id="submit" class="submit" value="CONFIRM">ยืนยัน<i class="fa-angle-right"></i></button>
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
                    <li class="current">Memasukkan</li>
                    <li>Setuju</li>
                    <li>Penamatan</li>
                </ol>
            </div>

            <!-- form -->
            <form method="POST" action="/id/confirm" accept-charset="UTF-8" id="" name="">
                {!! csrf_field() !!}

                <div class="contents_form">
                    <div class="form-input">
                        <dl>
                            <dt><label for="first_name">Nama Depan (Alfabet)</label> <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam">
                                {{Form::input('text','first_name',array_get($form,'first_name'),['maxlength'=>'40','size'=>35,'class'=>'text tf-required tf-en','placeholder'=>'Taro (Nama pemberian)'])}}
                                <p class="tf-message-first_name-required message"> Masukkan Nama Depan.</p>
                                {!! $errors->first('first_name', '<p class="error">:message</p>') !!}
                            </dd>
                        </dl>
                        <dl>
                            <dt><label for="last_name">Nama Belakang (Alfabet)</label> <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam">
                                {{Form::input('text','last_name',array_get($form,'last_name'),['maxlength'=>'80','size'=>35,'class'=>'text tf-required tf-en','placeholder'=>'Sorano (Nama Keluarga)'])}}

                                <p class="tf-message-last_name-required message"> Masukkan Nama Belakang</p>
                                {!! $errors->first('last_name', '<p class="error">:message</p>') !!}
                            </dd>
                        </dl>
                        <dl>
                            <dt><label for="gender">Jenis Kelamin</label> <span class="form--attention">*</span></dt>
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
                            <dt><label for="email_confirm">Konfirmasi Email  <span class="form--attention">*</span></label></dt>
                            <dd class="wifi-cam">
                                <input id="email_confirm" size="35" class="text tf-required" placeholder="sorano-taro@ana.com" name="email_confirm" type="text" value="{{array_get($form,'email_confirm')}}" maxlength="50">
                                {!! $errors->first('email_confirm', '<p class="error">:message</p>') !!}
                            </dd>
                        </dl>
                        <dl>
                            <dt><label for="residence_region">Negara</label> <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam">
                                {{Form::input('text','residence_region',array_get($form,'residence_region',$country_name),['size'=>35,'class'=>'text tf-required tf-en','placeholder'=>''])}}
                                {!! $errors->first('residence_region', '<p class="error">:message</p>') !!}
                            </dd>
                        </dl>

                        <div class="form-checkbox agree_newsletter">
                            <p class="agree_newsletter">
                            <p class="agree_newsletter"><input id="agree_newsletter" class="checkbox" checked="checked" name="agree_newsletter" type="checkbox" value="1"><label for="agree_newsletter" class="checkbox"><span>Saya setuju untuk menerima e-newsletter dari ANA.</span></label></p>
                            {!! $errors->first('agree_newsletter', '<p class="error">:message</p>') !!}
                        </div>
                    </div>
                    <!-- /form-input -->

                    <div class="form-note">
                        <p>B"Dengan mengisi formulir pendaftaran ANA e-Newsletter ini, Anda memastikan bahwa usia Anda minimal 18 tahun. Kami hanya akan menggunakan informasi pribadi yang Anda berikan dalam formulir pendaftaran ini sesuai dengan kebijakan privasi dan akan mematuhi permintaan Anda yang ditunjukkan di atas serta setiap perubahan atas permintaan yang Anda nyatakan di masa depan, mengenai penerimaan materi penawaran dari ANA.</p>
                    </div>

                    <div class="form-btn">
                        <div class="submit-btn">
                            <button type="submit" name="confirm-btn" id="submit" class="submit" value="CONFIRM">Setuju<i class="fa-angle-right"></i></button>
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
