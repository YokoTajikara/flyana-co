<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    "accepted"         => ":attributeが確認されていません。",
    "active_url"       => ":attributeは無効なURLです。",
    "after"            => ":attributeは:dateより後の日付でなければなりません。",
    "alpha"            => ":attributeにはアルファベット以外使用できません。",
    "alpha_dash"       => ":attributeにはアルファベット、数字、ハイフン、アンダーバー以外使用できません。",
    "alpha_num"        => ":attributeにはアルファベット、数字以外使用できません。",
    "before"           => ":attributeは:dateより前の日付でなければなりません。",
    "between"          => array(
        "numeric" => ":attributeは:min～:maxの範囲である必要があります。",
        "file"    => ":attributeのファイルサイズは:min～:maxキロバイトの範囲である必要があります。",
        "string"  => ":attributeの長さは:min～:max文字の範囲である必要があります。",
    ),
    "confirmed"        => ":attributeは確認欄と一致しませんでした。",
    "date"             => ":attributeは正しい日付ではありません。",
    "date_format"      => ":attributeは:format形式ではありません。",
    "different"        => ":attributeと:otherは異なる必要があります。",
    "digits"           => ":attributeは:digits桁である必要があります。",
    "digits_between"   => ":attributeは:min～:max桁の範囲である必要があります。",
    "email"            => "正しいメールアドレスを入力してください。",
    "exists"           => "選択された:attributeは存在しませんでした。",
    "image"            => ":attributeは画像ファイルである必要があります。",
    "in"               => "選択された:attributeは正しくありません。",
    "integer"          => ":attributeは整数である必要があります。",
    "ip"               => ":attributeは正しいIPアドレスではありません。",
    "max"              => array(
        "numeric" => ":attributeは:max以下である必要があります。",
        "file"    => ":attributeのファイルサイズは:maxキロバイト以下である必要があります。",
        "string"  => ":attributeの長さは:max文字以下である必要があります。",
    ),
    "mimes"            => ":attributeのファイル種別は:valuesである必要があります。",
    "min"              => array(
        "numeric" => ":attributeは:min以上である必要があります。",
        "file"    => ":attributeのファイルサイズは:minキロバイト以上である必要があります。",
        "string"  => ":attributeの長さは :min文字以上である必要があります。",
    ),
    "not_in"           => "選択された:attributeは正しくありません。",
    "numeric"          => ":attributeは数値である必要があります。",
    "regex"            => ":attributeの形式は正しくありません。",
    "required"         => "請輸入:attribute",
    "required_if"      => ":otherが:valueである場合、:attributeは必須項目です。",
    "required_with"    => ":valuesが指定されている場合、:attributeは必須項目です。",
    "required_without" => ":valuesが指定されていない場合、:attributeは必須項目です。",
    "required_without_all" => ":attributeは必須項目です。",
    "same"             => ":attributeが一致しません。",
    "size"             => array(
        "numeric" => ":attributeは:sizeである必要があります。",
        "file"    => ":attributeのファイルサイズは:sizeキロバイトである必要があります。",
        "string"  => ":attributeの長さは:size文字である必要があります。",
    ),
    "unique"           => ":attributeはすでに使われています。",
    "url"              => ":attributeは正しいURL形式ではありません。",
    "mimes_ex"       =>":attributeの種別はcsvである必要があります。",

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'Email' => [
				'required' => '請輸入電郵地址',
				'email' => '請輸入正確的電郵地址',
		],
    	'Country' => [
    			'required' => '請選擇居住國家',
    	],
    	'Privacy' => [
    			'required' => '請同意私隱政策',
    	]
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => array(
        'Reservation_number' => '預約號碼',
    	'Sex'                => '性別',
        'First_Name'         => '名稱（字母）',
        'Last_Name'          => '姓氏（字母）',
        'Email'              => '電郵地址',
        'Email_confirm'      => '電郵地址',
        'Country'            => '居住國家',
        'Country_code'       => '國家或地區代碼',
        'Tel'                => '電話號碼',
        'Privacy'            => '私隱政策',
    ),

];
