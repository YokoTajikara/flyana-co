<!DOCTYPE HTML>
<html lang="th" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
<head>
    <meta name="fragment" content="!">
    <meta charset="UTF-8">
    <!-- <base href="/"> -->
    <link rel="canonical" href="https://www.ana-campaign.com/bangkok16b/">
    <title>ANA Endless Inspire Campaign</title>
    <meta name="keywords" content="ANA, Endless, Inspire, Campaign, fly to Japan, fly to USA">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">

    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="article">
    <meta property="og:site_name" content="ANA Endless Inspire Campaign">
    <meta property="og:title" content="ANA Endless Inspire Campaign">
    <meta property="og:url" content="https://www.ana-campaign.com/bangkok16b">
    <meta property="og:description" content="สัมผัสสุดยอดประสบการณ์แห่งการเดินทางกับ ANA พร้อมลุ้นรับรางวัลใหญ่เมื่อซื้อบัตรโดยสารออนไลน์ ผ่านเว็บไซต์ ANA (ประเทศไทย) ">
    <meta property="og:image" content="https://www.ana-campaign.com/bangkok16b/images/ogp_noremal.jpg">
    <meta property="fb:app_id" content="1783070985282087">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@FlyANA_official">
    <meta name="twitter:creator" content="@FlyANA_official">
    <meta name="twitter:title" content="ANA Endless Inspire Campaign">
    <meta name="twitter:description" content="สัมผัสสุดยอดประสบการณ์แห่งการเดินทางกับ ANA พร้อมลุ้นรับรางวัลใหญ่เมื่อซื้อบัตรโดยสารออนไลน์ ผ่านเว็บไซต์ ANA (ประเทศไทย) ">
    <meta name="twitter:image" content="https://www.ana-campaign.com/bangkok16b/images/ogp_noremal.jpg">

    <link rel="icon" type="image/x-icon" href="https://www.ana.co.jp/favicon.ico">
    <link rel="stylesheet" href="/bangkok16b/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bangkok16b/font-awesome-4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/bangkok16b/jquery.bxslider/jquery.bxslider.css">
    <link rel="stylesheet" type="text/css" href="/bangkok16b/stylesheets/animate.css">
    <link rel="stylesheet" type="text/css" href="/bangkok16b/stylesheets/style.css">
    <link rel="stylesheet" type="text/css" href="/bangkok16b/stylesheets/style_thai.css">
    <link rel="stylesheet" type="text/css" href="/bangkok16b/stylesheets/form.css">
    <link rel="stylesheet" type="text/css" href="/bangkok16b/stylesheets/form_thai.css">

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
        <h2>ลงทะเบียนแคมเปญ</h2>

        <!-- form -->
        <form method="POST" action="/bangkok16b/confirm" accept-charset="UTF-8" id="inputForm" name="inputForm">
            {!! csrf_field() !!}

            <div class="contents">
                <div class="contents-header">
                    <p class="contents-header-required">* ฟิลด์ที่จำเป็น.</p>
                </div>

                <div class="contents-wrapper">

                    <div class="eticket-number">
                        <div class="eticket-number-input">
                            <dl>
                                <dt><label>หมายเลขการสำรองที่นั่ง</label> <span class="form--attention">*</span></dt>
                                <dd class="tf-checker">
                                    {{Form::input('text','reservation_number',array_get($form,'reservation_number'),['size'=>35,'class'=>'text tf-required tf-en text-eticket-number'])}}
                                    {!! $errors->first('reservation_number', '<p class="error">:message</p>') !!}
                                    <p class="tf-message-eticket_number-required message"> messages.s25_form_error_eticket_required</p>
                                    <p class="tf-message-eticket_number-rnum message"> messages.s25_form_error_eticket_regex</p>
                                </dd>
                            </dl>
                        </div>
                    </div>

                    <div class="eticket-number">
                        <div class="eticket-number-input">
                            <dl>
                                <dt><label>ANA หมายเลขบัตรโดยสาร</label></dt>
                                <dd class="tf-checker">
                                    <span class="eticket-number-input-prefix">205 - </span>
                                    {{Form::input('text','eticket_number',array_get($form,'eticket_number'),['size'=>35,'class'=>'text tf-required tf-en text-eticket-number','placeholder'=>"205 is default followed by 10 digits."])}}
                                    {!! $errors->first('eticket_number', '<p class="error">:message</p>') !!}
                                    <p class="tf-message-eticket_number-required message"> messages.s25_form_error_eticket_required</p>
                                    <p class="tf-message-eticket_number-rnum message"> messages.s25_form_error_eticket_regex</p>
                                </dd>
                            </dl>
                        </div>
                    </div>

                    <div class="eticket-number">
                        <div class="eticket-number-input">
                            <dl>
                                <dt><label>วันออกเดินทางของเที่ยวบินจากกรุงเทพไปญี่ปุ่น </label> <span class="form--attention">*</span></dt>
                                <dd class="tf-checker">
                                    <div class="custom custom-day">
                                        {{Form::select("boarding_date_day",$dayList,array_get($form,'boarding_date_day'),['id'=>'birth_date_day','class'=>'tf-required'])}}
                                    </div>
                                    <div class="custom custom-month">
                                        {{Form::select("boarding_date_month",$monthList,array_get($form,'boarding_date_month'),['id'=>'birth_date_month','class'=>'tf-required'])}}
                                    </div>
                                    <div class="custom custom-year">
                                        {{Form::select("boarding_date_year",$yearList,array_get($form,'boarding_date_year'),['id'=>'birth_date_year','class'=>'tf-required'])}}
                                    </div>
                                    @if (!empty($errors->first('boarding_date_year')))
                                        <p class="error">{{ $errors->first('boarding_date_year') }}</p>
                                    @elseif (!empty($errors->first('boarding_date_month')))
                                        <p class="error">{{ $errors->first('boarding_date_month') }}</p>
                                    @elseif (!empty($errors->first('boarding_date_day')))
                                        <p class="error">{{ $errors->first('boarding_date_day') }}</p>
                                    @endif
                                    <p class="tf-message-birth_date_year-required message"> messages.s25_error_birth_date_required</p>
                                    <p class="tf-message-birth_date_year-num message"> messages.s25_error_birth_date_regex</p>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>


            <div class="contents_form">
                <div class="form-input">
                    <dl>
                        <dt><label>เพศ</label> <span class="form--attention">*</span></dt>
                        <dd class="tf-checker">
                            <div class="custom">
                                {{Form::select("gender",$genderList,array_get($form,'gender'),['id'=>'gender','class'=>'tf-required'])}}
                            </div>
                            {!! $errors->first('gender', '<p class="error">:message</p>') !!}
                            <p class="tf-message-gender-required message"> messages.s25_form_error_gender</p>
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>ชื่อจริง</label> <span class="form--attention">*</span></dt>
                        <dd class="tf-checker">
                            <input size="35" class="text tf-required tf-en" placeholder="Taro (Given name)" name="first_name" type="text" value="{{array_get($form,'first_name')}}">
                            {!! $errors->first('first_name', '<p class="error">:message</p>') !!}
                            <p class="tf-message-first_name-required message"> Please enter first name.</p>
                            <p class="tf-message-first_name-en message"></p>
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>นามสกุล</label> <span class="form--attention">*</span></dt>
                        <dd class="tf-checker">
                            <input size="35" class="text tf-required tf-en" placeholder="Sorano (Surname)" name="last_name" type="text" value="{{array_get($form,'last_name')}}">
                            {!! $errors->first('last_name', '<p class="error">:message</p>') !!}
                            <p class="tf-message-last_name-required message"> Please enter last name.</p>
                            <p class="tf-message-last_name-en message"></p>
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>อายุ</label> <span class="form--attention">*</span></dt>
                        <dd class="tf-checker">
                            <input size="35" class="text tf-required tf-en" placeholder="" name="age" type="text" value="{{array_get($form,'age')}}">
                            {!! $errors->first('age', '<p class="error">:message</p>') !!}
                            <p class="tf-message-nric_fin-required message"> Please enter NRIC/FIN.</p>
                            <p class="tf-message-nric_fin-en message"> Please enter correct NRIC/FIN.</p>
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>เบอร์โทรศัพท์มือถือ</label> <span class="form--attention">*</span></dt>
                        <dd class="tf-checker">
                            <input size="35" class="text tf-required tf-en" placeholder="" name="mobile" type="text" value="{{array_get($form,'mobile')}}">
                            {!! $errors->first('mobile', '<p class="error">:message</p>') !!}
                            <p class="tf-message-nric_fin-required message"> Please enter NRIC/FIN.</p>
                            <p class="tf-message-nric_fin-en message"> Please enter correct NRIC/FIN.</p>
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>อีเมล์</label> <span class="form--attention">*</span></dt>
                        <dd class="tf-checker">
                            <input size="35" class="text tf-required tf-email" placeholder="sorano-taro@ana.com" name="email" type="text" type="text" value="{{array_get($form,'email')}}">
                            {!! $errors->first('email', '<p class="error">:message</p>') !!}
                            <p class="tf-message-email-required message"> messages.s25_form_error_mail_required</p>
                            <p class="tf-message-email-email message"> messages.s25_form_error_mail_regex</p>
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>ยืนยันอีเมล์ <span class="form--attention">*</span></label></dt>
                        <dd class="tf-checker">
                            <input size="35" class="text tf-required" placeholder="sorano-taro@ana.com" name="email_confirm" type="text" value="{{array_get($form,'email_confirm')}}">
                            {!! $errors->first('email_confirm', '<p class="error">:message</p>') !!}
                            <p class="tf-message-email_confirm-required message"> messages.s25_form_error_mailc_required</p>
                            <p class="tf-message-email_confirm-match message"> messages.s25_form_error_mailc_regex</p>
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>ท่านมีโปรแกรมสะสมไมล์ของสายการบินหรือไม่</label> <span class="form--attention">*</span></dt>
                        <dd class="form-checkbox holder">
                            <p class="holder"><input id="ANA" class="checkbox" name="holder_of_airline[]" type="checkbox" value="ANA" {{in_array('ANA',array_get($form,'holder_of_airline',[]))?'checked':''}}><label for="ANA" class="checkbox"><span>ANA</span></label></p>
                            <p class="holder"><input id="Thai" class="checkbox" name="holder_of_airline[]" type="checkbox" value="Thai" {{in_array('Thai',array_get($form,'holder_of_airline',[]))?'checked':''}}><label for="Thai" class="checkbox"><span>การบินไทย</span></label></p>
                            <p class="holder"><input id="JAL" class="checkbox" name="holder_of_airline[]" type="checkbox" value="JAL" {{in_array('JAL',array_get($form,'holder_of_airline',[]))?'checked':''}}><label for="JAL" class="checkbox"><span>JAL</span></label></p>
                            <p class="holder"><input id="StarAlliance" class="checkbox" name="holder_of_airline[]" type="checkbox" value="StarAlliance" {{in_array('StarAlliance',array_get($form,'holder_of_airline',[]))?'checked':''}}><label for="StarAlliance" class="checkbox"><span>Membership of Star Alliance Carriers</span></label></p>
                            <p class="holder"><input id="Others" class="checkbox" name="holder_of_airline[]" type="checkbox" value="Others" {{in_array('Others',array_get($form,'holder_of_airline',[]))?'checked':''}}><label for="Others" class="checkbox"><span>อื่นๆ</span></label></p>
                            <p class="holder"><input id="No" class="checkbox" name="holder_of_airline[]" type="checkbox" value="No" {{in_array('No',array_get($form,'holder_of_airline',[]))?'checked':''}}><label for="No" class="checkbox"><span>ไม่มี</span></label></p>
                        </dd>
                        {!! $errors->first('holder_of_airline', '<dt></dt><dd class="error">:message</dd>') !!}
                        <p class="tf-message-occupation-required message"> Please answer to this question.</p>
                        <p class="tf-message-occupation-en message"></p>

                    </dl>
                    <dl>
                        <dt><label>ปัจจัยที่ทำให้ท่านซื้อบัตรโดยสารผ่านเว็บไซต์ANA ประเทศไทย</label> <span class="form--attention">*</span></dt>
                        <dd class="form-checkbox holder">
                            <p class="holder"><input id="deals" class="checkbox" name="motive_for_your_ticket[]" type="checkbox" value="deals" {{in_array('deals',array_get($form,'motive_for_your_ticket',[]))?'checked':''}}><label for="deals" class="checkbox"><span>มีข้อเสนอพิเศษที่ดีกว่าสายการบินอื่นหรือช่องทางการจองอื่นๆ</span></label></p>
                            <p class="holder"><input id="advantage" class="checkbox" name="motive_for_your_ticket[]" type="checkbox" value="advantage" {{in_array('advantage',array_get($form,'motive_for_your_ticket',[]))?'checked':''}}><label for="advantage" class="checkbox"><span>เพื่อรับสิทธิประโยชน์ในแคมเปญนี้ </span></label></p>
                            <p class="holder"><input id="noseats" class="checkbox" name="motive_for_your_ticket[]" type="checkbox" value="noseats" {{in_array('noseats',array_get($form,'motive_for_your_ticket',[]))?'checked':''}}><label for="noseats" class="checkbox"><span>สายการบินที่ต้องการไม่มีที่นั่งว่าง</span></label></p>
                            <p class="holder"><input id="ANAnetwork" class="checkbox" name="motive_for_your_ticket[]" type="checkbox" value="ANAnetwork" {{in_array('ANAnetwork',array_get($form,'motive_for_your_ticket',[]))?'checked':''}}><label for="ANAnetwork" class="checkbox"><span>ANA มีเส้นทางการเดินทางที่ครอบคลุม</span></label></p>
                            <p class="holder"><input id="frequentANA" class="checkbox" name="motive_for_your_ticket[]" type="checkbox" value="frequentANA" {{in_array('frequentANA',array_get($form,'motive_for_your_ticket',[]))?'checked':''}}><label for="frequentANA" class="checkbox"><span>ใช้บริการANA โดยตลอด</span></label></p>
                            <p class="holder"><input id="ANAservice" class="checkbox" name="motive_for_your_ticket[]" type="checkbox" value="ANAservice" {{in_array('ANAservice',array_get($form,'motive_for_your_ticket',[]))?'checked':''}}><label for="ANAservice" class="checkbox"><span>สนใจในบริการของ ANA</span></label></p>
                            <p class="holder"><input id="GoodANA" class="checkbox" name="motive_for_your_ticket[]" type="checkbox" value="GoodANA" {{in_array('GoodANA',array_get($form,'motive_for_your_ticket',[]))?'checked':''}}><label for="GoodANA" class="checkbox"><span>ได้รับการแนะนำจากคนรู้จักหรือสื่อเกี่ยวกับ ANA</span></label></p>
                            <p class="holder"><input id="Other" class="checkbox" name="motive_for_your_ticket[]" type="checkbox" value="Other" {{in_array('Other',array_get($form,'motive_for_your_ticket',[]))?'checked':''}}><label for="Other" class="checkbox"><span> อื่นๆ (โปรดระบุ)/span></label></p>
                            <p class="holder"><input id="No_particular" class="checkbox" name="motive_for_your_ticket[]" type="checkbox" value="No_particular" {{in_array('No_particular',array_get($form,'motive_for_your_ticket',[]))?'checked':''}}><label for="No_particular" class="checkbox"><span>ไม่มี</span></label></p>
                        </dd>
                        {!! $errors->first('motive_for_your_ticket', '<dt></dt><dd class="error">:message</dd>') !!}
                        <p class="tf-message-occupation-required message"> Please answer to this question.</p>
                        <p class="tf-message-occupation-en message"></p>

                    </dl>

                    <dl>
                        <dt></dt>
                        <dd class="tf-checker">
                            <textarea rows="5" cols="40" class="textarea tf-required tf-en" wrap="hard" placeholder="If you check [Other (if any specify)], please type your message here" name="motive_for_your_ticket_text" type="textarea">{{array_get($form,'motive_for_your_ticket_text')}}</textarea>
                            <p class="tf-message-occupation-en message"></p>
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>ท่านมีข้อแนะนำ ติชม หรือข้อเสนอแนะต่างๆ เกี่ยวกับสายการบินANA หรือแคมเปญในครั้งนี้หรือไม่</label></dt>
                        <dd class="tf-checker">
                            <textarea rows="5" cols="40" class="textarea tf-en" wrap="hard" placeholder="" name="any_suggestion" type="textarea">{{array_get($form,'any_suggestion')}}</textarea>
                        </dd>
                    </dl>


                    <div class="form-checkbox agree_newsletter">
                        <p class="agree_newsletter"><input id="agree_newsletter" class="checkbox" checked="checked" name="agree_newsletter" type="checkbox" value="1"><label for="agree_newsletter" class="checkbox"><span>หากท่านต้องการรับข่าวสารและข้อเสนอพิเศษทางอีเมล์จากANA  โปรดใส่เครื่องหมายในช่องนี้.</span></label></p>
                    </div>
                </div>
                <!-- /form-input -->

                <div class="form-btn tf-checker">
                    <div class="form-checkbox">
                        <p class="policy"><input id="policy" name="privacy" type="checkbox" class="checkbox tf-required"><label for="policy" class="checkbox"><span>ข้าพเจ้ายอมรับในข้อตกลงและ<a href="https://www.ana.co.jp/wws/privacy/t/ana.html" target="_blank">เงื่อนไข และนโยบายความเป็นส่วนตัวของ ANA</a></span></label></p>
                        {!! $errors->first('privacy', '<p class="error">:message</p>') !!}
                        <p align="center" class="tf-message-privacy-required message"> messages.s25_form_error_privacy</p>
                    </div>

                    <div class="submit-btn">
                        <button type="submit" name="confirm-btn" id="submit" class="submit" value="CONFIRM">ยืนยัน<i class="fa-angle-right"></i></button>
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
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    document.getElementById('shareBtn').onclick = function () {
        FB.ui({
            method: 'share',
            mobile_iframe: true,
            href: 'https://www.ana-campaign.com/bangkok16b/',
        }, function (response) {});
    }
</script>

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-84221512-1', 'auto');
    ga('send', 'pageview');

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
