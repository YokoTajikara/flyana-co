@section("beforeHeaderHead")
	<link rel=stylesheet href="/assets/singapore25/registration/css/form.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
@endsection
@include('singapore25._component.header', [
'title' => "Registration",
"canonical" => "https://" . $_SERVER["HTTP_HOST"] . "/singapore25",
"description" => "ANA 25th Anniversary \"Just By Saying Thank You Is Never Enough\". Stand a chance to win a pair of ANA tickets and travel to any desired destination to Japan or North America from 18th Aug - 31st Oct 2016!",
"keywords" => "ANA, 25th anniversary campaign, fly to Japan, fly to North America",
])

<main class="main">
	<!--CONTENTS-->
	{{ Form::open(["url" => "https://" . $_SERVER["HTTP_HOST"] . "/singapore25/confirm", "id" => "inputForm", "name" => "inputForm", "method" => "post"]) }}
		<input type="hidden" name="form_name" value="input"/>

		<div class="contents">
            <div class="contents-header">
                <div class="contents-header-title">
                    <div>
                        <img class="contents-header-logo" src="/assets/singapore25/images/common/headline/logo_headline_25th.png" alt="25th ANA Anniversary">
                        <h1 class="contents-header-caption">{{ trans('messages.s25_cap_title') }}</h1>
                    </div>
                </div>
                <p class="contents-header-required">{{ trans('messages.s25_form_msg_required') }}</p>
            </div>

		<div class="contents-wrapper">
			<div class="eticket-number">
				<div class="eticket-number-input">
					<dl>
						<dt><label>{{ trans('messages.s25_form_cap_eticket_number') }}</label></dt>
						<dd class="tf-checker">
						    <span class="eticket-number-input-prefix">205 - </span>{!! Form::text('eticket_number',Input::get('eticket_number'), ['size' => '35', 'class' => 'text tf-required tf-en text-eticket-number', 'placeholder' => trans('messages.s25_form_placeholder_eticket_number')]) !!}
							<p class="@if (!empty($errors->first('eticket_number'))) error @endif">{{ $errors->first('eticket_number') }}</p>
							<p class="tf-message-eticket_number-required message"> {{ trans('messages.s25_form_error_eticket_required') }}</p>
							<p class="tf-message-eticket_number-rnum message"> {{ trans('messages.s25_form_error_eticket_regex') }}</p>
						</dd>
					</dl>
					<p class="coupon-eticket-number">{!! trans('messages.s25_form_msg_eticket_number') !!}</p>
				</div>
			</div>
		</div>
		</div>

		<div class="contents_form">
			<div class="form-input">

				<dl>
					<dt><label>{{ trans('messages.s25_form_cap_name_title') }}</label> <span class="form--attention">*</span></dt>
					<dd class="tf-checker">
						<div class="custom">
							{!! Form::select('name_title', $nameTitleList, Input::get('name_title'), ['id' => 'name_title', 'class' => 'tf-required']) !!}
						</div>
						<p class="@if (!empty($errors->first('name_title'))) error @endif">{{ $errors->first('name_title') }}</p>
						<p class="tf-message-name_title-required message"> {{ trans('messages.s25_form_error_name_title') }}</p>
					</dd>
				</dl>

				<dl>
					<dt><label>{{ trans('messages.s25_form_cap_first_name') }}</label> <span class="form--attention">*</span></dt>
					<dd class="tf-checker">
						{!! Form::text('first_name',Input::get('first_name'), ['size' => '35', 'class' => 'text tf-required tf-en', 'placeholder' => trans('messages.s25_form_placeholder_first_name')]) !!}
						<p class="@if (!empty($errors->first('first_name'))) error @endif">{{ $errors->first('first_name') }}</p>
						<p class="tf-message-first_name-required message"> {{ trans('messages.s25_form_error_first_name_required') }}</p>
						<p class="tf-message-first_name-en message"> {{ trans('messages.s25_form_error_first_name_regex') }}</p>
					</dd>
				</dl>
				<dl>
					<dt><label>{{ trans('messages.s25_form_cap_last_name') }}</label> <span class="form--attention">*</span></dt>
					<dd class="tf-checker">
						{!! Form::text('last_name',Input::get('last_name'), ['size' => '35', 'class' => 'text tf-required tf-en', 'placeholder' => trans('messages.s25_form_placeholder_last_name')]) !!}
						<p class="@if (!empty($errors->first('last_name'))) error @endif">{{ $errors->first('last_name') }}</p>
						<p class="tf-message-last_name-required message"> {{ trans('messages.s25_form_error_last_name_required') }}</p>
						<p class="tf-message-last_name-en message"> {{ trans('messages.s25_form_error_last_name_regex') }}</p>
					</dd>
				</dl>
				<dl>
					<dt><label>{{ trans('messages.s25_form_cap_gender') }}</label> <span class="form--attention">*</span></dt>
					<dd class="tf-checker">
						<div class="custom">
							{!! Form::select('gender', $genderList, Input::get('gender'), ['id' => 'gender', 'class' => 'tf-required']) !!}
						</div>
						<p class="@if (!empty($errors->first('gender'))) error @endif">{{ $errors->first('gender') }}</p>
						<p class="tf-message-gender-required message"> {{ trans('messages.s25_form_error_gender') }}</p>
					</dd>
				</dl>
				<dl>
					<dt><label>{{ trans('messages.s25_form_cap_nric_fin') }}</label> <span class="form--attention">*</span></dt>
					<dd class="tf-checker">
						{!! Form::text('nric_fin',Input::get('nric_fin'), ['size' => '35', 'class' => 'text tf-required tf-en', 'placeholder' => trans('messages.s25_form_placeholder_nric_fin')]) !!}
						<p class="@if (!empty($errors->first('nric_fin'))) error @endif">{{ $errors->first('nric_fin') }}</p>
						<p class="tf-message-nric_fin-required message"> {{ trans('messages.s25_form_error_nric_fin_required') }}</p>
						<p class="tf-message-nric_fin-en message"> {{ trans('messages.s25_form_error_nric_fin_regex') }}</p>
					</dd>
				</dl>

				<dl>
					<dt><label>{{ trans('messages.s25_form_cap_birth_date') }}</label> <span class="form--attention">*</span></dt>
					<dd class="tf-checker">
						<div class="custom custom-day">
                            {!! Form::select('birth_date_day', $dayList, Input::get('birth_date_day'), ['id' => 'birth_date_day', 'class' => 'tf-required']) !!}
                        </div>
						<div class="custom custom-month">
                            {!! Form::select('birth_date_month', $monthList, Input::get('birth_date_month'), ['id' => 'birth_date_month', 'class' => 'tf-required']) !!}
                        </div>
						<div class="custom custom-year">
                            {!! Form::select('birth_date_year', $yearList, Input::get('birth_date_year'), ['id' => 'birth_date_year', 'class' => 'tf-required']) !!}
                        </div>
@if (!empty($errors->first('birth_date_year')))
						<p class="error">{{ $errors->first('birth_date_year') }}</p>
@elseif (!empty($errors->first('birth_date_month')))
						<p class="error">{{ $errors->first('birth_date_month') }}</p>
@elseif (!empty($errors->first('birth_date_day')))
						<p class="error">{{ $errors->first('birth_date_day') }}</p>
@endif
						<p class="tf-message-birth_date_year-required message"> {{ trans('messages.s25_error_birth_date_required') }}</p>
						<p class="tf-message-birth_date_year-num message"> {{ trans('messages.s25_error_birth_date_regex') }}</p>
					</dd>
				</dl>
				<dl>
					<dt><label>{{ trans('messages.s25_form_cap_occupation') }}</label> <span class="form--attention">*</span></dt>
					<dd class="tf-checker">
						{!! Form::text('occupation',Input::get('occupation'), ['size' => '35', 'class' => 'text tf-required tf-en', 'placeholder' => trans('messages.s25_form_placeholder_occupation')]) !!}
						<p class="@if (!empty($errors->first('occupation'))) error @endif">{{ $errors->first('occupation') }}</p>
						<p class="tf-message-occupation-required message"> {{ trans('messages.s25_form_error_occupation_required') }}</p>
						<p class="tf-message-occupation-en message"> {{ trans('messages.s25_form_error_occupation_regex') }}</p>
					</dd>
				</dl>
				<dl>
					<dt><label>{{ trans('messages.s25_form_cap_tel') }}</label> <span class="form--attention">*</span></dt>
					<dd class="tf-checker">
						{!! Form::text('tel',Input::get('tel'), ['size' => '35', 'class' => 'text tf-required tf-tel', 'placeholder' => trans('messages.s25_form_placeholder_tel')]) !!}
						<p class="@if (!empty($errors->first('tel'))) error @endif">{{ $errors->first('tel') }}</p>
						<p class="tf-message-tel-required message"> {{ trans('messages.s25_form_error_tel_required') }}</p>
						<p class="tf-message-tel-tel message"> {{ trans('messages.s25_form_error_tel_regex') }}</p>
					</dd>
				</dl>

				<dl>
					<dt><label>{{ trans('messages.s25_form_cap_mail') }}</label> <span class="form--attention">*</span></dt>
					<dd class="tf-checker">
						{!! Form::text('email',Input::get('email'), ['size' => '35', 'class' => 'text tf-required tf-email', 'placeholder' => trans('messages.s25_form_placeholder_mail')]) !!}
						<p class="@if (!empty($errors->first('email'))) error @endif">{{ $errors->first('email') }}</p>
						<p class="tf-message-email-required message"> {{ trans('messages.s25_form_error_mail_required') }}</p>
						<p class="tf-message-email-email message"> {{ trans('messages.s25_form_error_mail_regex') }}</p>
					</dd>
				</dl>
				<dl>
                    <dt><label>{{ trans('messages.s25_form_cap_mail') }}
                        <span>{{ trans('messages.s25_form_cap_mail_confirm') }}</span> <span class="form--attention">*</span></label></dt>
					<dd class="tf-checker">
						{!! Form::text('email_confirm',Input::get('email_confirm'), ['size' => '35', 'class' => 'text tf-required', 'placeholder' => trans('messages.s25_form_placeholder_mail')]) !!}
						<p class="@if (!empty($errors->first('email_confirm'))) error @endif">{{ $errors->first('email_confirm') }}</p>
						<p class="tf-message-email_confirm-required message"> {{ trans('messages.s25_form_error_mailc_required') }}</p>
						<p class="tf-message-email_confirm-match message"> {{ trans('messages.s25_form_error_mailc_regex') }}</p>
					</dd>
				</dl>

				<div class="form-checkbox agree_newsletter">
                    <p class="agree_newsletter">{!! Form::checkbox('agree_newsletter', '1', (isset($agree_newsletter) ? $agree_newsletter : ""), ['id' => 'agree_newsletter', 'class' => 'checkbox']) !!}
                        <label for="agree_newsletter" class="checkbox"><span>{{ trans('messages.s25_form_cap_agree_newsletter') }}</span></label>
					</p>
				</div>
			</div>
		</div>

		<div class="form-btn tf-checker">
			<div class="form-checkbox">
				<p class="policy"><input id="policy" name="privacy" type="checkbox" class="checkbox tf-required">
                    <label for="policy" class="checkbox"><span>{!! trans('messages.s25_form_cap_privacy') !!}</span></label>
                </p>
			<p align="center" class="@if (!empty($errors->first('privacy'))) error @endif">{{ $errors->first('privacy') }}</p>
			<p align="center" class="tf-message-privacy-required message"> {{ trans('messages.s25_form_error_privacy') }}</p>
			</div>
			<div class="submit-btn">
				<button type="submit" name="confirm-btn" id="submit" class="submit" value="CONFIRM">{{ trans('messages.s25_form_btn_confirm') }}<i class="fa-angle-right"></i></button>
			</div>
		</div>
    {!! Form::close() !!}
    <!--CONTENTS-->

@section("beforeFooterBody")
<script src="/assets/singapore25/registration/js/jquery-1.11.3.min.js"></script>
<script src="/assets/singapore25/registration/common/js/jquery.customSelect.js"></script>
<script src="/assets/singapore25/registration/common/js/form.js"></script>
<script>
	$(function () {
		var $setElem = $('.switch'),
			pcName = '_pc',//PC版のファイル名
			spName = '_sp',//スマホ版のファイル名
			replaceWidth = 641;//切り替える画面サイズ

		$setElem.each(function () {
			var $this = $(this);

			function imgSize() {
				var windowWidth = parseInt($(window).width());
				if (windowWidth >= replaceWidth) {
					$this.attr('src', $this.attr('src').replace(spName, pcName)).css({visibility: 'visible'});
				} else if (windowWidth < replaceWidth) {
					$this.attr('src', $this.attr('src').replace(pcName, spName)).css({visibility: 'visible'});
				}
			}

			$(window).resize(function () {
				imgSize();
			});
			imgSize();
		});
	});
</script>
<script>
	$(function () {
		var options = {};

		var validate = function (e) {
			var result = true;
			var notEmpty = true;
			var errCls = [];

			// 確認用メールアドレスチェック
			if (e.is("[name=email_confirm]")) {
				if (e.val() == "") {
					errCls.push("required");
					notEmpty = false;
				} else {
					if (e.val() != $("input[type=text][name=email]").val()) {
						errCls.push("match");
						result = false;
					}
				}
			}

			// 航空券予約番号チェック
			if (e.is("[name=eticket_number]")) {
				if (e.val() == "") {
					errCls.push("required");
					notEmpty = false;
				} else {
					var ncount = 0;
					var strs = e.val().split('');

					$.each(strs, function (index, val) {
						if (val.match(/[0-9]/)) {
							ncount++;
						}
					});

					var rnumOk = (ncount == 10);
					if (!rnumOk) {
						errCls.push("rnum");
						result = false;
					}
				}
			}
			return {
				"result": result,
				"notEmpty": notEmpty,
				"errCls": errCls,
			};
			return errCls;
		};
		options["validate"] = validate;

		var validateAll = function($elms) {
			var errorElms = [];
			return errorElms;
		};
		options["validateAll"] = validateAll;
	});
</script>
@endSection
</main>
@include('singapore25._component.footer')
