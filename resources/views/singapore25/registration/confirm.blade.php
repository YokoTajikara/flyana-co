@section("beforeHeaderHead")
	<link rel=stylesheet href="/assets/singapore25/registration/css/form.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
@endsection
@include('singapore25._component.header', [
'title' => "Confirmation",
"canonical" => "https://" . $_SERVER["HTTP_HOST"] . "/singapore25",
"description" => "ANA 25th Anniversary \"Just By Saying Thank You Is Never Enough\". Stand a chance to win a pair of ANA tickets and travel to any desired destination to Japan or North America from 18th Aug - 31st Oct 2016!",
"keywords" => "ANA, 25th anniversary campaign, fly to Japan, fly to North America",
])
<main class="main">
	<!--CONTENTS-->
	{{ Form::open(["url" => "https://" . $_SERVER["HTTP_HOST"] . "/singapore25/thankyou", "id" => "confirm-form", "method" => "post"]) }}
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
				<div class="eticket-number-confirm">
					<dl>
						<dt><label>{{ trans('messages.s25_form_cap_eticket_number') }}</label></dt>
						<dd><p>205-{{ $eticket_number }}</p></dd>
					</dl>
				</div>
			</div>
		</div>
		</div>

		<div class="contents_form-confirm">
			<div class="form-confirm">
				<dl>
					<dt><label>{{ trans('messages.s25_form_cap_name_title') }}</label></dt>
					<dd><p>{{ $nameTitleList[$name_title] }}</p></dd>
				</dl>
				<dl>
					<dt><label>{{ trans('messages.s25_form_cap_first_name') }}</label></dt>
					<dd><p>{{ $first_name}}</p></dd>
				</dl>
				<dl>
					<dt><label>{{ trans('messages.s25_form_cap_last_name') }}</label></dt>
					<dd><p>{{ $last_name }}</p></dd>
				</dl>
				<dl>
					<dt><label>{{ trans('messages.s25_form_cap_gender') }}</label></dt>
					<dd><p>{{ $genderList[$gender] }}</p></dd>
				</dl>
				<dl>
					<dt><label>{{ trans('messages.s25_form_cap_nric_fin') }}</label></dt>
					<dd><p>{{ $nric_fin }}</p></dd>
				</dl>

				<dl>
					<dt><label>{{ trans('messages.s25_form_cap_birth_date') }}</label></dt>
					<dd><p>{{ $birth_date_day }} / {{ $birth_date_month }} / {{ $birth_date_year }}</p></dd>
				</dl>

				<dl>
					<dt><label>{{ trans('messages.s25_form_cap_occupation') }}</label></dt>
					<dd><p>{{ $occupation }}</p></dd>
				</dl>
				<dl>
					<dt><label>{{ trans('messages.s25_form_cap_tel') }}</label></dt>
					<dd><p>{{ $tel }}</p></dd>
				</dl>
				<dl>
					<dt><label>{{ trans('messages.s25_form_cap_mail') }}</label></dt>
					<dd><p>{{ $email }}</p></dd>
				</dl>

				<div class="form-checkbox">
                    <p class="agree_newsletter confirm">
                        <i class="fa-check  @if ($agree_newsletter == true) display @else hidden @endif"></i>
                        <span>{{ trans('messages.s25_form_cap_agree_newsletter') }}</span>
					</p>
				</div>
			</div>
		</div>

		<div class="form-btn confirm-policy">
			<div class="form-checkbox">
				<p class="policy"><i class="fa-check  @if ($privacy == true) display @else hidden @endif"></i>
                    <span>{!! trans('messages.s25_form_cap_privacy') !!}</span>
                </p>
			</div>
			<div class="submit-btn confirm-btn">
                <button type="button" class="back" id="back-btn" name="back-btn" value="BACK">
                    <i class="fa-angle-left"></i>{{ trans('messages.s25_form_btn_back') }}
                </button>
                <button type="submit" class="send" name="regist-btn" value="REGIST">{{ trans('messages.s25_form_btn_send') }}
                    <i class="fa-angle-right"></i>
                </button>
			</div>

		</div>
		{!! Form::close() !!}
			<!--CONTENTS-->
</div>


@section("beforeFooterBody")
<script src="/assets/singapore25/registration/js/jquery-1.11.3.min.js"></script>
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

		$('#back-btn').on('click', function (event) {
			$("#confirm-form").attr("action", "https://{{ $_SERVER['HTTP_HOST'] }}/singapore25/registration");
			$("#confirm-form").submit();
		});
	});
</script>
@endSection
</main>
@include('singapore25._component.footer')
