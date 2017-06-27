<?php
namespace App\Http\Requests;

class Bangkok16bValidateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'reservation_number'  => 'required|regex:![0-9]{10}!',
            'eticket_number'      => 'required',
            'boarding_date_day'   => 'required',
            'boarding_date_month' => 'required',
            'boarding_date_year'  => 'required',
            'gender'              => 'required',
            'first_name'          => 'required',
            'last_name'           => 'required',
            'age'                 => 'required',
            'mobile'              => 'required',
            'email'               => 'required',
            'email_confirm'       => 'required',
            'motive_text'         => 'required',
            'any_suggestion'      => 'required',
            'agree_newsletter'    => '',
            'privacy'             => 'required',
        ];

        return $rules;
    }

    public function attributes($request)
    {
        return [
            'reservation_number' => 'reservation_number',

//            "reservation_number.required" => "いれてね",//trans("messages.s25_form_error_name_title_required"),

//            "eticket_number.regex" => trans("messages.s25_form_error_eticket_number_regex"),
//
//            "name_title.required" => trans("messages.s25_form_error_name_title_required"),
//            "name_title.In"       => trans("messages.s25_form_error_name_title_In"),
//
//            "first_name.required" => trans("messages.s25_form_error_first_name_required"),
//            "last_name.required"  => trans("messages.s25_form_error_last_name_required"),
//
//            "gender.required" => trans("messages.s25_form_error_gender_required"),
//            "gender.In"       => trans("messages.s25_form_error_gender_In"),
//
//            "nric_fin.required"   => trans("messages.s25_form_error_nric_fin_required"),
//            "nric_fin.regex"      => trans("messages.s25_form_error_nric_fin_regex"),
//            "nric_fin.In"         => trans("messages.s25_form_error_nric_fin_In"),
//            "nric_fin.s25nricfin" => trans("messages.s25_form_error_nric_fin_s25nricfin"),
//
//            "birth_date_year.s25birthday"  => trans("messages.s25_form_error_birth_date_required"),
//            "birth_date_year.required"     => trans("messages.s25_form_error_birth_date_required"),
//            "birth_date_year.between"      => trans("messages.s25_form_error_birth_date_required"),
//            "birth_date_month.s25birthday" => trans("messages.s25_form_error_birth_date_required"),
//            "birth_date_month.required"    => trans("messages.s25_form_error_birth_date_required"),
//            "birth_date_month.between"     => trans("messages.s25_form_error_birth_date_required"),
//            "birth_date_day.s25birthday"   => trans("messages.s25_form_error_birth_date_required"),
//            "birth_date_day.required"      => trans("messages.s25_form_error_birth_date_required"),
//            "birth_date_day.between"       => trans("messages.s25_form_error_birth_date_required"),
//
//            "occupation.required" => trans("messages.s25_form_error_occupation_required"),
//
//            "tel.required" => trans("messages.s25_form_error_tel_required"),
//
//            "email.required" => trans("messages.s25_form_error_email_required"),
//            "email.regex"    => trans("messages.s25_form_error_email_email"),
//
//            "email_confirm.required" => trans("messages.s25_form_error_email_confirm_required"),
//            "email_confirm.regex"    => trans("messages.s25_form_error_email_confirm_email"),
//            "email_confirm.same"     => trans("messages.s25_form_error_email_confirm_same"),
//
//            "privacy.required" => trans("messages.s25_form_error_privacy_required"),
        ];

    }

}