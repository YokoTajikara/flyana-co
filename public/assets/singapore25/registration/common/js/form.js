/*
 * tamform ver1.0
 */
(function ($) {
	'use strict';

	$.fn.extend({
		tamForm: function (options) {
			var defaults = {
				option: ''
			};
			options = $.extend(defaults, options);

			/*
			 * 変換系メソッド
			 */
			var convert = {
				// 行頭と行末のスペースを削除
				trimSpace: function (str) {
					return str.replace(/^( |　)+/, '').replace(/( |　)+$/, '');
				},
				// ハイフンを除去
				removeHyphen: function (str) {
					return str.replace(/(-|-|―|-|ｰ|‐|\u2212)/g, '');
				},
				// 半角に変換
				toEn: function (str) {
					str = str.replace(/[Ａ-Ｚａ-ｚ０-９－！”＃＄％＆’（）＝＜＞，．／？＿［］｛｝＠`＾?￥｜]/g, function (s) {
						return String.fromCharCode(s.charCodeAt(0) - 0xFEE0);
					});
					return str.replace(/　/g, ' ');
				}
			};

			/*
			 * バリデーション系メソッド
			 */
			var validate = {
				// 電話番号 文字数制限2文字以上　スペース許可
				tel: function (str) {
					return str.match(/^[\d+ ]{2,}$/)
				},
				// 郵便番号
				zip: function (str) {
					return str.match(/^\d{7}$/);
				},
				// メールアドレス
				email: function (str) {
					return str.match(/^\S+@[a-zA-Z0-9-]+\.[a-zA-Z0-9\.-]*$/);
				},
				// 半角のみ
				en: function (str) {
					return str.match(/^[\x20-\x7E]*$/);
				}
			};

			/*
			 * プラグイン開始
			 */
			this.each(function () {
				var $form = $(this);
				var $formElms = $form.find('input, select, textarea');
				var $formSubmit = $form.find('input:submit, input:image, button:submit');


				/*
				 * 項目単位の結果を反映
				 */
				function setResultView($e, result, notEmpty, errCls) {

					var name = $e.attr('name');
					name = name.replace(/(\[|\])/g, '\\$1');

					var $allMsg = $form.find("[class|='tf-message-" + name + "']");
					var errClsSel = [];
					for (var cls in errCls) {
						errClsSel.push(".tf-message-" + name + "-" + errCls);
					}
					var $errMsg = $form.find(errClsSel.join(","));

					// データが空の時
					if (!notEmpty) {
						$e.addClass('tf-empty');
						if (result === false && !$form.hasClass('tf-submitted')) {
							// 空データは、一度もsubmitされていない場合はエラー表示しない
							$e.removeClass('tf-valid tf-error error');
							$allMsg.hide();
							return;
						}
					}
					else {
						$e.removeClass('tf-empty');
					}

					// 結果を反映
					if (result) {
						$e.addClass('tf-valid').removeClass('tf-error error');

						// customSelect.対応
						if ($e.prop("tagName") == 'SELECT') {
							$e.next("span").css("margin-bottom", "").css("border", "");
						}

						$allMsg.hide();
					}
					else {
						$e.addClass('tf-error error').removeClass('tf-valid');

						// customSelect.js対応
						if ($e.prop("tagName") == 'SELECT') {
							$e.next("span").css("marginBottom", "5px")
								.css("border", "1px solid #F01326");
						}

						$allMsg.hide();
						$errMsg.show();
					}
				}

				/*
				 * 全体の見た目を反映
				 */
				function updateAllView() {
					// .tf-checker 単位でエラーチェック
					$form.find('.tf-checker').each(function () {
						var $checker = $(this);
						if ($checker.find('.tf-error, .tf-empty, .error').length === 0) {
							// OKなので .tf-check-ok クラスをつける
							$checker.addClass('tf-check-ok');
						}
						else {
							$checker.removeClass('tf-check-ok');
						}
					});

					// submitボタンの設定
					if (options.is_control_submit_button === true) {
						if ($form.find('.tf-error, .error').length > 0) {
							$formSubmit.attr('disabled', 'disabled');
						}
						else {
							$formSubmit.attr('disabled', null);
						}
					}
					if ($form.find('.tf-error, .error').length > 0) {
						return false;
					}
					else {
						return true;
					}
				}

				/*
				 * 要素単位のエラーチェック
				 */
				function validateSingle($e) {
					var result = true;
					var notEmpty = true;
					var errCls = [];

					if (options.validate) {
						var optionResult = options.validate($e);
						result = optionResult['result'];
						notEmpty = optionResult['notEmpty'];
						errCls = optionResult['errCls'];
					}

					/*
					 * input / textarea
					 */
					if ($e.is(':text') || $e.is('textarea') || $e.is(':password') || $e.is('[type=tel]') || $e.is('[type=email]')) {
						var val = convert.trimSpace($e.val());

						// 値が空でないとき → 値の変換とチェック
						if (val) {
							var error_cnt = 0;

							// 全角
							if ($e.hasClass('tf-em')) {
								val = convert.toEm(val);
								if (!validate.em(val)) {
									error_cnt++;
									errCls.push('em');
								}
							}
							// 半角
							if ($e.hasClass('tf-en')) {
								val = convert.toEn(val);
								if (!validate.en(val)) {
									error_cnt++;
									errCls.push('en');
								}
							}
							// ひらがな
							if ($e.hasClass('tf-hiragana')) {
								val = convert.toHiragana(val);
								if (!validate.hiragana(val)) {
									error_cnt++;
									errCls.push('hiragana');
								}
							}
							// カタカナ
							if ($e.hasClass('tf-katakana')) {
								val = convert.toKatakana(val);
								if (!validate.katakana(val)) {
									error_cnt++;
									errCls.push('katakana');
								}
							}
							// 電話番号
							if ($e.hasClass('tf-tel')) {
								val = convert.removeHyphen(convert.toEn(val));
								if (!validate.tel(val)) {
									error_cnt++;
									errCls.push('tel');
								}
							}
							// 郵便番号
							if ($e.hasClass('tf-zip')) {
								val = convert.removeHyphen(convert.toEn(val));
								if (!validate.zip(val)) {
									error_cnt++;
									errCls.push('zip');
								}
							}
							// メールアドレス
							if ($e.hasClass('tf-email')) {
								val = convert.toEn(val);
								if (!validate.email(val)) {
									error_cnt++;
									errCls.push('email');
								}
							}

							// 値の変換結果を反映
							if ($e.val() !== val) {
								$e.val(val);
							}

							// 結果反映
							if (error_cnt > 0) {
								// エラーあり
								result = false;
								notEmpty = true;
							}
							else if (result) {
								result = true;
								notEmpty = true;
							}
						}
						else {
							// 値が空だった
							$e.val('');

							// 必須ならエラーとする
							if ($e.hasClass('tf-required')) {
								errCls.push('required');
								result = false;
								notEmpty = false;
							}
							else if (result) {
								result = true;
								notEmpty = false;
							}
						}
					}

					/*
					 * input/textarea 以外 → 必須チェックのみ行う
					 */
					if ($e.hasClass('tf-required')) {

						/*
						 * checkbox / radio
						 */
						if ($e.is(':checkbox') || $e.is(':radio')) {
							var filter = "[name='" + $e.attr('name') + "']:checked";
							if ($formElms.filter(filter).length === 0) {
								// 同じnameを持つ要素のチェック数が 0 → エラー
								errCls.push('required');
								result = false;
								notEmpty = false;
							}
							else if (result) {
								result = true;
								notEmpty = true;
							}
						}

						/*
						 * select
						 */
						if ($e.is('select')) {
							if (!$e.val()) {
								errCls.push('required');
								result = false;
								notEmpty = false;
							} else if (result) {
								result = true;
								notEmpty = true;
							}
						}
					}

					setResultView($e, result, notEmpty, errCls);
					return result;
				}

				/*
				 * フォーム全体のバリデーションを開始
				 */
				function validateForm() {

					if (options.is_debug) {
						return 0;
					}

					// 各要素ごとにエラーチェック
					var err = 0;
					$formElms.each(function () {
						err += !validateSingle($(this));
					});
          if (options.validateAll) {
						var errorElms = options.validateAll($formElms);
            for (var i = 0; i < errorElms.length; i++) {
              setResultView(errorElms[i]['object'], errorElms[i]['result'], errorElms[i]['notEmpty'], errorElms[i]['errCls']);
            }
            err += errorElms.length;
					}
 
					// 見た目を反映
					updateAllView();

					return err;
				}

				/*
				 * 送信ボタンが押された時の処理
				 */
				$formSubmit.click(function () {
					$form.addClass('tf-submitted');

					if (validateForm() > 0) {
						//alert('Please fill in all required fields and be sure to use valid information.');
						return false;
					}
					return true;
				});

				/*
				 * 初期処理
				 */
				$formElms.change(function () {
					if ($(this).is(":checkbox") || $(this).is(":radio")) {
						validateForm();
					} else {
						validateSingle($(this));
					}
					if ($(this).prop("tagName") == 'SELECT') {
						// リサイズしないと、範囲外をクリックしてもリスト表示される場合がある
						$(this).width($(this).next("span").innerWidth()); // IE考慮してinner
					}
				});

				$formElms.blur(function () {
					validateSingle($(this));

					// 見た目を反映
					updateAllView();
				});

				if (options.is_initial_validate) {
					validateForm();
				}

				return this;
			});
		}
	});
})(jQuery);

