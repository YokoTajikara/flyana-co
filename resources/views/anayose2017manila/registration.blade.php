<!DOCTYPE HTML>
<html lang="en" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
<head>
    <meta name="fragment" content="!">
    <meta charset="UTF-8">
    <!-- <base href="/"> -->
    <link rel="canonical" href="https://www.ana-campaign.com/anayose2017manila/">
    <title>Registration | ANA YOSE 2017 on Februry 19th, 2017</title>
    <meta name="keywords" content="">
    <meta name="description"
          content="All registred names will be included in a raffle to be held on January 30th, 2017. Ticket winners will be notified by email by 1st Feb, 2017">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">

    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="article">
    <meta property="og:site_name" content="ANA YOSE 2017 on Februry 19th, 2017">
    <meta property="og:title" content="ANA YOSE 2017 on Februry 19th, 2017">
    <meta property="og:url" content="https://www.ana-campaign.com/anayose2017manila/">
    <meta property="og:description"
          content="Experience Ultimate Travel in Japan with ANA Thailand. Buy online ticket now to win a prize!">
    <meta property="og:image" content="https://www.ana-campaign.com/anayose2017manila/images/ogp_noremal.jpg">
    <meta property="fb:app_id" content="1783070985282087">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@FlyANA_official">
    <meta name="twitter:creator" content="@FlyANA_official">
    <meta name="twitter:title" content="ANA YOSE 2017 on Februry 19th, 2017">
    <meta name="twitter:description" content="ANA YOSE 2017 on Februry 19th, 2017">
    <meta name="twitter:image" content="https://www.ana-campaign.com/anayose2017manila/images/ogp_noremal.jpg">
    <link rel="icon" type="image/x-icon" href="https://www.ana.co.jp/favicon.ico">
    <link rel="stylesheet" href="/anayose2017manila/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/anayose2017manila/font-awesome-4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/anayose2017manila/jquery.bxslider/jquery.bxslider.css">
    <link rel="stylesheet" type="text/css" href="/anayose2017manila/stylesheets/style.css">
    <link rel="stylesheet" type="text/css" href="/anayose2017manila/stylesheets/form.css">

    <script src="/anayose2017manila/javascripts/jquery-2.1.4.min.js"></script>
    <script src="/anayose2017manila/jquery.bxslider/jquery.bxslider.min.js"></script>
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

    <div class="container registration">

        <!-- form -->
        {{--{{ Form::open(["action" => "route(.confirmPost)", "accept-charset" => "UTF-8" , "id" => "inputForm", "name" => "inputForm"]) }}--}}
        <form id="inputForm" name="inputForm" class="form form-horizontal" accept-charset="UTF-8" method="post"
              action="/anayose2017manila/confirm">
            {!! csrf_field() !!}
            {{ Form::hidden("form_name", "input") }}

            <div class="contents">
                <div class="contents-header">
                    <h2>REGISTRATION FOR<br>ANA YOSE ON FEBRUARY 19TH, 2017</h2>
                </div>
            </div>


            <div class="contents_form">
                <div class="form-input">
                    <dl>
                        <dt><label>Title</label> <span class="form--attention">*</span></dt>
                        <dd class="tf-checker">
                            <div class="custom">
                                {{ Form::select("Title__c", ["" => "Please select", "Mr" => "Mr", "Miss" => "Ms"], array_get($form, 'Title__c'), ["id" => "title", "class" => "tf-required"]) }}
                            </div>
                            {!! $errors->first('Title__c', '<p class="error">:message</p>') !!}
                            <p class="tf-message-title-required message">
                                messages.anayose2017manila_form_error_name_Title__c_required</p>
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>First Name</label> <span class="form--attention">*</span></dt>
                        <dd class="tf-checker">
                            {{ Form::input("text", "First_Name__c", array_get($form, 'First_Name__c'), ["size" =>"35", "class" => "text tf-required tf-en", "placeholder" =>"Taro (Given name)"]) }}
                            {!! $errors->first('First_Name__c', '<p class="error">:message</p>') !!}
                            <p class="tf-message-first_name-required message">
                                messages.anayose2017manila_form_error_name_First_Name__c_required</p>
                            <p class="tf-message-first_name-en message"></p>
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Last Name</label> <span class="form--attention">*</span></dt>
                        <dd class="tf-checker">
                            {{ Form::input("text", "Last_Name__c", array_get($form, 'Last_Name__c'), ["size" =>"35", "class" => "text tf-required tf-en", "placeholder" =>"Sorano (Surname)"]) }}
                            <p class=""></p>
                            {!! $errors->first('Last_Name__c', '<p class="error">:message</p>') !!}
                            <p class="tf-message-last_name-required message">
                                messages.anayose2017manila_form_error_name_Last_Name__c_required</p>
                            <p class="tf-message-last_name-en message"></p>
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Gender</label> <span class="form--attention">*</span></dt>
                        <dd class="tf-checker">
                            <div class="custom">
                                {{ Form::select("sex__c", $genderList, array_get($form, 'sex__c'), ["id" => "gender", "class" => "tf-required"]) }}
                            </div>
                            {!! $errors->first('sex__c', '<p class="error">:message</p>') !!}
                            <p class="tf-message-gender-required message">
                                messages.anayose2017manila_form_error_name_sex__c_required</p>
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Date of Birth</label> <span class="form--attention">*</span></dt>
                        <dd class="tf-checker">
                            <div class="custom custom-day">
                                {{ Form::select("Birthday_d__c", $dayList, array_get($form, 'Birthday_d__c'), ["id" => "birth_date_day", "class" => "tf-required"]) }}
                            </div>
                            <div class="custom custom-month">
                                {{ Form::select("Birthday_m__c", $monthList, array_get($form, 'Birthday_m__c'), ["id" => "birth_date_month", "class" => "tf-required"]) }}
                            </div>
                            <div class="custom custom-year">
                                {{ Form::select("Birthday_y__c", $yearList, array_get($form, 'Birthday_y__c'), ["id" => "birth_date_year", "class" => "tf-required"]) }}
                            </div>
                            {!! $errors->first('Birthday_d__c', '<p class="error">:message</p>') !!}
                            <p class="tf-message-birth_date_year-required message">
                                messages.anayose2017manila_form_error_name_Birthday_d__c_required</p>
                            <p class="tf-message-birth_date_year-num message">
                                messages.anayose2017manila_form_error_name_Birthday_d__c_check_birthday</p>
                            {!! $errors->first('Birthday_m__c', '<p class="error">:message</p>') !!}
                            <p class="tf-message-birth_date_year-required message">
                                messages.anayose2017manila_form_error_name_Birthday_m__c_required</p>
                            <p class="tf-message-birth_date_year-num message">
                                messages.anayose2017manila_form_error_name_Birthday_m__c_check_birthday</p>
                            {!! $errors->first('Birthday_y__c', '<p class="error">:message</p>') !!}
                            <p class="tf-message-birth_date_year-required message">
                                messages.anayose2017manila_form_error_name_Birthday_y__c_required</p>
                            <p class="tf-message-birth_date_year-num message">
                                messages.anayose2017manila_form_error_name_Birthday_y__c_check_birthday</p>
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Occupation</label> <span class="form--attention">*</span></dt>
                        <dd class="tf-checker">
                            {{ Form::input("text", "Occupation__c", array_get($form, 'Occupation__c'), ["size" =>"35", "class" => "text tf-required tf-en", "placeholder" =>""]) }}
                            {!! $errors->first('Occupation__c', '<p class="error">:message</p>') !!}
                            <p class="tf-message-_occupation-required message">
                                messages.anayose2017manila_form_error_name_Occupation__c_required</p>
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Mobile Phone Number</label> <span class="form--attention">*</span></dt>
                        <dd class="tf-checker">
                            {{ Form::input("text", "Mobile_phone__c", array_get($form, 'Mobile_phone__c'), ["size" =>"35", "class" => "text tf-required tf-en", "placeholder" =>""]) }}
                            {!! $errors->first('Mobile_phone__c', '<p class="error">:message</p>') !!}
                            <p class="tf-message-nric_fin-required message">
                                messages.anayose2017manila_form_error_name_Mobile_phone__c_required</p>
                            <p class="tf-message-nric_fin-en message"></p>
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Email</label> <span class="form--attention">*</span></dt>
                        <dd class="tf-checker">
                            {{ Form::input("text", "Email", array_get($form, 'Email'), ["size" =>"35", "class" => "text tf-required tf-email", "placeholder" => "sorano-taro@ana.com"]) }}
                            {!! $errors->first('Email', '<p class="error">:message</p>') !!}
                            <p class="tf-message-email-required message">
                                messages.anayose2017manila_form_error_name_Email_required</p>
                            <p class="tf-message-email-email message">
                                messages.anayose2017manila_form_error_name_Email_email</p>
                            <p class="tf-message-email-duplicate_email message">
                                messages.anayose2017manila_form_error_name_Email_duplicate_email</p>
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Email<span>(Confirmation)</span> <span class="form--attention">*</span></label></dt>
                        <dd class="tf-checker">
                            {{ Form::input("text", "Email_confirm", array_get($form, 'Email_confirm'), ["size" =>"35", "class" => "text tf-required", "placeholder" => "sorano-taro@ana.com"]) }}
                            {!! $errors->first('Email_confirm', '<p class="error">:message</p>') !!}
                            <p class="tf-message-email_confirm-required message">
                                messages.anayose2017manila_form_error_name_Email_confirm_required</p>
                            <p class="tf-message-email_confirm-match message">
                                messages.anayose2017manila_form_error_name_Email_confirm_same</p>
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>How many will attend YOSE event?</label> <span class="form--attention">*</span></dt>
                        <dd class="tf-checker">
                            <div class="custom">
                                {{ Form::select("How_many_will_attend_YOSE_event__c", ["" => "Please select", "1" => "1", "2" => "2"], array_get($form, 'How_many_will_attend_YOSE_event__c'), ["id" => "how_many", "class" => "tf-required"]) }}
                            </div>
                            {!! $errors->first('How_many_will_attend_YOSE_event__c', '<p class="error">:message</p>') !!}
                            <p class="tf-message-how_many-required message">
                                messages.anayose2017manila_form_error_name_How_many_will_attend_YOSE_event__c_required</p>
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>How often do you travel overseas per year?</label> <span
                                    class="form--attention">*</span></dt>
                        <dd class="tf-checker">
                            <div class="custom">
                                {{ Form::select("How_often_do_you_travel_overseas_p_year__c", ["" => "Please select", "0" => "0", "1-2" => "1-2", "3 more" => "3 more"], array_get($form, 'How_often_do_you_travel_overseas_p_year__c'), ["id" => "how_often", "class" => "tf-required"]) }}
                            </div>
                            {!! $errors->first('How_often_do_you_travel_overseas_p_year__c', '<p class="error">:message</p>') !!}
                            <p class="tf-message-how_often-required message">
                                messages.anayose2017manila_form_error_name_How_often_do_you_travel_overseas_p_year__c_required</p>
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Country of residence</label></dt>
                        <dd class="tf-checker">
                            <div class="custom">
                                {{ Form::select("Country_of_residence__c", ["" => "Please select", "Philippines" => "Philippines", "Others" => "Others"], array_get($form, 'Country_of_residence__c'), ["id" => "residence", "class" => "tf-required"]) }}
                            </div>
                            {!! $errors->first('Country_of_residence__c', '<p class="error">:message</p>') !!}
                            <p class="tf-message-residence-required message">
                                messages.anayose2017manila_form_error_name_Country_of_residence__c_required</p>
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>How did you know this event?</label></dt>
                        <dd class="form-checkbox holder">
                            <p class="holder">{{ Form::checkbox("ana_web_site", "ANA Philippines Website", array_get($form, 'ana_web_site'), ["id" => "ana_web_site", "class" => "checkbox"]) }}
                                <label for="ana_web_site" class="checkbox"><span>ANA Philippines Website</span></label>
                            </p>
                            <p class="holder">{{ Form::checkbox("JFM", "Japan Foundation Manila", array_get($form, 'JFM'), ["id" => "JFM", "class" => "checkbox"]) }}
                                <label for="JFM" class="checkbox"><span>Japan Foundation Manila</span></label></p>
                            <p class="holder">{{ Form::checkbox("Newspaper", "Newspaper", array_get($form, 'Newspaper'), ["id" => "Newspaper", "class" => "checkbox"]) }}
                                <label for="Newspaper" class="checkbox"><span>Newspaper</span></label></p>
                            <p class="holder">{{ Form::checkbox("PPW", "Philippine Primer Web", array_get($form, 'PPW'), ["id" => "PPW", "class" => "checkbox"]) }}
                                <label for="PPW" class="checkbox"><span>Philippine Primer Web</span></label></p>
                            <p class="holder">{{ Form::checkbox("Friend/Relatives", "Friend/Relatives", array_get($form, 'Friend/Relatives'), ["id" => "Friend/Relatives", "class" => "checkbox"]) }}
                                <label for="Friend/Relatives" class="checkbox"><span>Friend/Relatives</span></label></p>
                            <p class="holder">{{ Form::checkbox("Others", "Others", array_get($form, 'Others'), ["id" => "Others", "class" => "checkbox"]) }}
                                <label for="Others" class="checkbox"><span>Others</span></label></p>
                        </dd>
                    </dl>

                    <dl style="padding: 0;">
                        <dt style="margin-top:0px;"></dt>
                        <dd class="tf-checker">
                            {{Form::textarea("othertext", array_get($form, 'othertext'), ["rows" => "1", "cols" => "40", "class" => "textarea tf-required tf-en", "wrap" => "hard", "placeholder" => "If you check [Others], please specify"])}}
                        </dd>
                    </dl>


                    <div class="form-checkbox agree_newsletter">
                        <p class="agree_newsletter">{{ Form::checkbox("amc__c", "1", array_get($form, 'amc__c'), ["id" => "agree_amc", "class" => "checkbox"]) }}
                            <label for="agree_amc"
                                   class="checkbox"><span>I am an ANA Mileage Club Member</span></label></p>
                    </div>

                    <div class="form-checkbox agree_newsletter">
                        <p class="agree_newsletter">{{ Form::checkbox("e_newsletter__c", "1", "checked", ["id" => "agree_newsletter", "class" => "checkbox"]) }}
                            <label for="agree_newsletter" class="checkbox"><span>I would like to receive e-newsletter from ANA.</span></label>
                        </p>
                    </div>

                    <div class="form-checkbox">
                        <p class="policy">{{ Form::checkbox("privacy", "1", null, ["id" => "privacy", "class" => "checkbox tf-required"]) }}
                            <label for="privacy" class="checkbox"><span>I agree with ANA's <a
                                            href="http://www.ana.co.jp/wws/privacy/e/ana.html" target="_blank">privacy policy</a></span></label>
                        </p>
                        {!! $errors->first('privacy', '<p class="error">:message</p>') !!}
                        <p align="center" class="tf-message-privacy-required message">
                            messages.anayose2017manila_form_error_name_privacy_required</p>
                    </div>

                </div>
                <!-- /form-input -->

                <!-- Second Person -->
                <div class="form-input-second none_person2">
                    <h3>Second person to apply</h3>
                    <dl>
                        <dt><label>Title</label> <span class="form--attention">*</span></dt>
                        <dd class="tf-checker">
                            <div class="custom">
                                {{ Form::select("Person2_Title__c", ["" => "Please select", "Mr" => "Mr", "Miss" => "Ms"], array_get($form, 'Person2_Title__c'), ["id" => "title", "class" => "tf-required"]) }}
                            </div>
                            {!! $errors->first('Person2_Title__c', '<p class="error">:message</p>') !!}
                            <p class="tf-message-title-required message">
                                messages.anayose2017manila_form_error_name_Person2_Title__c_required</p>
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>First Name</label> <span class="form--attention">*</span></dt>
                        <dd class="tf-checker">
                            {{ Form::input("text", "Person2_First_Name__c", array_get($form, 'Person2_First_Name__c'), ["size" =>"35", "class" => "text tf-required tf-en", "placeholder" =>"Taro (Given name)"]) }}
                            {!! $errors->first('Person2_First_Name__c', '<p class="error">:message</p>') !!}
                            <p class="tf-message-first_name-required message">
                                messages.anayose2017manila_form_error_name_Person2_First_Name__c_required</p>
                            <p class="tf-message-first_name-en message"></p>
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Last Name</label> <span class="form--attention">*</span></dt>
                        <dd class="tf-checker">
                            {{ Form::input("text", "Person2_Last_Name__c", array_get($form, 'Person2_Last_Name__c'), ["size" =>"35", "class" => "text tf-required tf-en", "placeholder" =>"Sorano (Surname)"]) }}
                            {!! $errors->first('Person2_Last_Name__c', '<p class="error">:message</p>') !!}
                            <p class="tf-message-last_name-required message">
                                messages.anayose2017manila_form_error_name_Person2_Last_Name__c_required</p>
                            <p class="tf-message-last_name-en message"></p>
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Gender</label> <span class="form--attention">*</span></dt>
                        <dd class="tf-checker">
                            <div class="custom">
                                {{ Form::select("Person2_Gender__c", $genderList, array_get($form, 'Person2_Gender__c'), ["id" => "gender", "class" => "tf-required"]) }}
                            </div>
                            {!! $errors->first('Person2_Gender__c', '<p class="error">:message</p>') !!}
                            <p class="tf-message-gender-required message">
                                messages.anayose2017manila_form_error_name_Person2_Gender__c_required</p>
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Date of Birth</label> <span class="form--attention">*</span></dt>
                        <dd class="tf-checker">
                            <div class="custom custom-day">
                                {{ Form::select("Person2_Date_of_Birthday_d__c", $dayList, array_get($form, 'Person2_Date_of_Birthday_d__c'), ["id" => "birth_date_day", "class" => "tf-required"]) }}
                            </div>
                            <div class="custom custom-month">
                                {{ Form::select("Person2_Date_of_Birthday_m__c", $monthList, array_get($form, 'Person2_Date_of_Birthday_m__c'), ["id" => "birth_date_month", "class" => "tf-required"]) }}
                            </div>
                            <div class="custom custom-year">
                                {{ Form::select("Person2_Date_of_Birthday_y__c", $yearList, array_get($form, 'Person2_Date_of_Birthday_y__c'), ["id" => "birth_date_year", "class" => "tf-required"]) }}
                            </div>
                            {!! $errors->first('Person2_Date_of_Birthday_d__c', '<p class="error">:message</p>') !!}
                            <p class="tf-message-birth_date_year-required message">
                                messages.anayose2017manila_form_error_name_Person2_Date_of_Birthday_d__c_required</p>
                            <p class="tf-message-birth_date_year-num message">
                                messages.anayose2017manila_form_error_name_Person2_Birthday_d__c_check_person2_birthday </p>
                            {!! $errors->first('Person2_Date_of_Birthday_m__c', '<p class="error">:message</p>') !!}
                            <p class="tf-message-birth_date_year-required message">
                                messages.anayose2017manila_form_error_name_Person2_Date_of_Birthday_m__c_required</p>
                            <p class="tf-message-birth_date_year-num message">
                                messages.anayose2017manila_form_error_name_Person2_Birthday_m__c_check_person2_birthday </p>
                            {!! $errors->first('Person2_Date_of_Birthday_y__c', '<p class="error">:message</p>') !!}
                            <p class="tf-message-birth_date_year-required message">
                                amessages.nayose2017manila_form_error_name_Person2_Date_of_Birthday_y__c_required</p>
                            <p class="tf-message-birth_date_year-num message">
                                messages.anayose2017manila_form_error_name_Person2_Birthday_y__c_check_person2_birthday </p>
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Mobile Phone Number</label></dt>
                        <dd class="tf-checker">
                            {{ Form::input("text", "Person2_Mobile_Phone__c", array_get($form, 'Person2_Mobile_Phone__c'), ["size" =>"35", "class" => "text tf-required tf-en", "placeholder" =>""]) }}
                            {!! $errors->first('Person2_Mobile_Phone__c', '<p class="error">:message</p>') !!}
                            <p class="tf-message-nric_fin-en message">
                                messages.anayose2017manila_form_error_name_Person2_Mobile_Phone__c_incorrect</p>
                        </dd>
                    </dl>
                    <!-- /Second Person -->
                </div>
                <div class="form-btn tf-checker">

                    <div class="submit-btn">
                        <button type="submit" name="confirm-btn" id="submit" class="submit disabled" value="CONFIRM">
                            Confirm<i class="fa-angle-right"></i></button>
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
    $(document).ready(function () {
        $('#privacy').on('change', function () {
            if ($(this).prop('checked')) {
                $('#submit').removeAttr('disabled').removeClass('disabled');
            } else {
                $('#submit').attr('disabled', 'disabled').addClass('disabled');
            }
        });
        $('#privacy').trigger('change');

        if($("#how_many option:selected").val() == "2"){
            $(".form-input-second").removeClass("none_person2");
        }

        $("#how_many").on("change", function () {
            if ($(this).val() == "2") {
                $(".form-input-second").removeClass("none_person2");
            } else {
                $(".form-input-second").addClass("none_person2");
                $(".form-input-second").find("input,select").each(function(){
                    $(this).val("");
                });
            }
        });

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
<style type="text/css">
    .form-btn .submit.disabled {
        background-color: darkgray;
        cursor: default;
    }

    .form-btn .submit.disabled:hover {
        opacity: 1;
    }
</style>

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
