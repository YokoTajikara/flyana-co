<?php

namespace App\Http\Controllers;

use App;
use App\Http\AnaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Lang;

/**
 * Class PhEmailController
 * @package App\Http\Controllers
 */
class PhEmailController extends Controller
{
    private $language   = "en";
    private $genderList = [];

    /**
     * PhEmailController constructor.
     */
    public function __construct()
    {
        \Session::set('language', $this->language);
        App::setLocale($this->language);

        // 性別コンボボックスリスト
        $this->genderList = [
            ""       => Lang::get("messages.ph-email_form_name_empty"),
            "Male"   => "Male",
            "Female" => "Female"
        ];

    }

    /**
     * バリデーションエラー時、確認画面 -> 戻る時の入力画面
     *
     * @param App\Http\AnaRequest $request
     *
     * @return bool|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function registrationGet(AnaRequest $request)
    {
        $form = \Session::get("ph-email_form", []);
        \Session::remove('ph-email_form');

        /** @var \Illuminate\Support\MessageBag $error */
        $error = \Session::get("ph-email_error", new \Illuminate\Support\MessageBag());
        \Session::remove('ph-email_error');

        $handled = $request::forceSecureRequest();
        if ($handled) {
            return $handled;
        }
        $data = [
            "form"       => $form,
            "errors"     => $error,
            "genderList" => $this->genderList
        ];

        return view('ph-email.registration', $data);

    }

    /**
     * 確認画面
     *
     * @param Request $request
     *
     * @return bool|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function confirmPost(Request $request)
    {
        $handled = AnaRequest::forceSecureRequest();
        if ($handled) {
            return $handled;
        }

        \Session::set("ph-email_form", $request->toArray());

        // バリデーションチェック
        $validRet = $this->_validate($request);
        if ($validRet->fails()) {
            // 入力画面へ
            \Session::set("ph-email_error", $validRet->errors());

            return redirect()->action('PhEmailController@registrationGet');
        }

        $data = [
            "form"       => $request->toArray(),
            "genderList" => $this->genderList
        ];

        return view('ph-email.confirm', $data);

    }

    /**
     * 確認->pardotデータ投入用リダイレクト画面
     *
     * @param Request $request
     *
     * @return bool|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     * @throws \Exception
     */
    public function thankyouPost(Request $request)
    {
        $handled = AnaRequest::forceSecureRequest();
        if ($handled) {
            return $handled;
        }
        $data = \Session::get("ph-email_form", []);
        \Session::clear();

        // sf
        $sfRet = $this->saveSfData($data);

        if ( ! $sfRet) {
            throw new \Exception("failed to insert salesforce data.");
        }


        return view('ph-email.thanks');

    }

    /**
     * バリデーション
     *
     * @param Request $request
     *
     * @return \Illuminate\Validation\Validator
     */
    private function _validate(Request $request)
    {
        // 接続先URL取得
        $url = $request->url();
        // バリデーションルール設定
        $rules = [
            'first_name'       => 'required',
            'last_name'        => 'required',
            'gender'           => 'required',
            'email'            => 'required|email',
            'email_confirm'    => 'required|same:email',
            'residence_region' => 'required'
        ];
        // エラーメッセージ設定
        $messages = [
            'first_name.required'       => trans('messages.ph-email_form_error_name_First_Name__c_required'),
            'last_name.required'        => trans('messages.ph-email_form_error_name_Last_Name__c_required'),
            'gender.required'           => trans('messages.ph-email_form_error_name_Gender__c_required'),
            'email.required'            => trans('messages.ph-email_form_error_name_Email_required'),
            'email.email'               => trans('messages.ph-email_form_error_name_Email_email'),
            'email_confirm.same'        => trans('messages.ph-email_form_error_name_Email_confirm_same'),
            'residence_region.required' => trans('messages.ph-email_form_error_name_Residence_Region__c_required'),
        ];

        // バリデーション実施
        return \Validator::make($request->all(), $rules, $messages);
    }


    /**
     * SFへのデータ登録
     *
     * @param $data
     *
     * @return mixed
     */
    private function saveSfData($data)
    {
        // 入力値取得
        // Sales Force APIに接続し、データ転送
        $salesForceRequest = [
            "First_Name__c"       => Arr::get($data, 'first_name'),
            "Last_Name__c"        => Arr::get($data, 'last_name'),
            "Gender__c"           => Arr::get($data, 'gender'),
            "Email__c"            => Arr::get($data, 'email'),
            "Residence_Region__c" => Arr::get($data, 'residence_region'),
            "e_newsletter__c"     => (bool)Arr::get($data, 'agree_newsletter'),
        ];

        $sfSrv = App::make(\Ana\SalesForceService::class);
        $sfSrv->init();
        $ret = $sfSrv->phEmailInsertLead($salesForceRequest);

        return $ret["success"];
    }

}
