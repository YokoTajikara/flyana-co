<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="fragment" content="!">
    <title>Application | ANA USA | WiFi Router 7 Days Free in USA Campagin</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">

    <link rel="icon" type="image/x-icon" href="https://www.ana.co.jp/favicon.ico">
    <link rel="stylesheet" href="/ph-email/stylesheets/font-awesome.min.css">
    <link rel="stylesheet" href="/ph-email/stylesheets/jquery.bxslider.css">
    <link rel="stylesheet" href="/ph-email/stylesheets/animate.css">
    <link rel="stylesheet" href="/ph-email/stylesheets/style.css">
    <link rel="stylesheet" href="/ph-email/stylesheets/form.css">
    <link rel="stylesheet" href="/ph-email/stylesheets/jquery.fs.boxer.css">

    <script src="/ph-email/javascripts/jquery-2.1.4.min.js"></script>
    <script src="/ph-email/javascripts/bootstrap.min.js"></script>
    <script src="/ph-email/javascripts/jquery.bxslider.min.js"></script>
    <script src="/ph-email/javascripts/wow.min.js"></script>
    <script src="/ph-email/javascripts/base.js"></script>
    <script src="/ph-email/javascripts/jquery.fs.boxer.js"></script>

    <style type="text/css">
        .form-btn .submit.disabled {
            background-color: darkgray;
            cursor: default;
        }
        .form-btn .submit.disabled:hover {
            opacity: 1;
        }
    </style>


</head>

<body class="page-en">
<div class="main-wrapper">
    <header>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-left">
                    <a href="#"><img src="/ph-email/images/logo.png" alt="ANA Inspiration of JAPAN"/></a>
                </div>
            </div>
        </div>
    </header>

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
            <form method="POST" action="/ph-email/confirm" accept-charset="UTF-8" id="" name="">
                {!! csrf_field() !!}

                <div class="contents_form">
                    <div class="form-input">
                        <dl>
                            <dt><label for="first_name">First Name</label> <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam">
                                {{Form::input('text','first_name',array_get($form,'first_name'),['size'=>35,'class'=>'text tf-required tf-en','placeholder'=>'Taro (Given name)'])}}
                                <p class="tf-message-first_name-required message"> Please enter first name.</p>
                                {!! $errors->first('first_name', '<p class="error-message">:message</p>') !!}
                            </dd>
                        </dl>
                        <dl>
                            <dt><label for="last_name">Last Name</label> <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam">
                                {{Form::input('text','last_name',array_get($form,'last_name'),['size'=>35,'class'=>'text tf-required tf-en','placeholder'=>'Sorano (Surname)'])}}

                                <p class="tf-message-last_name-required message"> Please enter last name.</p>
                                {!! $errors->first('last_name', '<p class="error-message">:message</p>') !!}
                            </dd>
                        </dl>
                        <dl>
                            <dt><label for="gender">Gender</label> <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam">
                                <div class="custom">
                                    {{Form::select("gender",$genderList,array_get($form,'gender'),['id'=>'gender','class'=>'tf-required'])}}
                                </div>
                                {!! $errors->first('gender', '<p class="error-message">:message</p>') !!}
                            </dd>
                        </dl>
                        <dl>
                            <dt><label for="email">Email</label> <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam">
                                <input size="35" class="text tf-required tf-email" placeholder="sorano-taro@ana.com" name="email" type="email" value="{{array_get($form,'email')}}">
                                <p class="tf-message-email-required message"> messages.s25_form_error_mail_required</p>
                                {!! $errors->first('email', '<p class="error">:message</p>') !!}
                            </dd>
                        </dl>

                        <dl>
                            <dt><label for="email_confirm">Email <span>(Confirmation)</span> <span class="form--attention">*</span></label></dt>
                            <dd class="wifi-cam">
                                <input id="email_confirm" size="35" class="text tf-required" placeholder="sorano-taro@ana.com" name="email_confirm" type="text" value="{{array_get($form,'email_confirm')}}">
                                {!! $errors->first('email_confirm', '<p class="error">:message</p>') !!}
                            </dd>
                        </dl>
                        <dl>
                            <dt><label for="residence_region">Residence Region</label> <span class="form--attention">*</span></dt>
                            <dd class="wifi-cam">
                                {{Form::input('text','residence_region',array_get($form,'residence_region','Philippines'),['size'=>35,'class'=>'text tf-required tf-en','placeholder'=>''])}}
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
                            ANA will only use the personal information you provide in this sign up form in accordance with ANA's privacy policy, and ANA will comply with your requests indicated above, and any changes to those requests you indicate in the future, regarding the receipt of marketing materials from ANA.</p>
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

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-right">
                    <img src="/ph-email/images/footer-logo.png" alt="A STAR ALLIANCE MEMBER"/>
                </div>
            </div>
        </div>
        <p class="copy">Copyright<span>&copy;</span>ANA</p>
    </footer>
</div>

<a title="Scroll to top" class="scrollup" href="#"><i class="fa fa-angle-up"></i></a>

<script>
  $(document).ready(function(){
    $('#agree_newsletter2').on('change', function () {
      console.log("agree_newsletter2");
      if ($(this).prop('checked')) {
        $('#submit').removeAttr('disabled').removeClass('disabled');
      }else{
        $('#submit').attr('disabled','disabled').addClass('disabled');
      }
    });
    $('#agree_newsletter2').trigger('change');
  });
</script>

<script>
  $(".boxer").boxer();
</script>

</body>
</html>
