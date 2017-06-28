<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="fragment" content="!">
    <title>ANA E-Newsletter Registration From</title>
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
                    <li>Input</li>
                    <li class="current">Confirmation</li>
                    <li>Completion</li>
                </ol>
            </div>

            <!-- form -->
            <form method="POST" action="/ph-email/thankyou" accept-charset="UTF-8" id="" name="">
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
                            <button type="button" class="back" id="back-btn" name="back-btn" value="BACK" onclick="location.href='/ph-email/registration'">
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

</body>
</html>
