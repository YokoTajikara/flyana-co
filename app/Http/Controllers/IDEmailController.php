<?php

namespace App\Http\Controllers;

use App;
use App\Http\AnaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Lang;

/**
 * Class EmailController
 * @package App\Http\Controllers
 */
class IDEmailController extends Controller
{
    private $language   = "id";
    private $genderList = [];

    /**
     * EmailController constructor.
     */
    public function __construct()
    {
        \Session::set('language', $this->language);
        App::setLocale($this->language);

        // 性別コンボボックスリスト
        $this->genderList = [
            ""       => Lang::get("messages.email_form_name_empty"),
            "Male"   => "Pria",
            "Female" => "Wanita"
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
        #read Maxmind GeoIP Db
        $reader = new \GeoIp2\Database\Reader('GeoLite2-City.mmdb');
        #get the client's IP
        $user_ip = $this->getUserIP();
        #get country of IP from Maxmind GeoIP db
        $record = $reader->city($user_ip);
        #the country name of client
        $country_name = $record->country->name;

        $form = \Session::get("email_form", []);
        \Session::remove('email_form');

        /** @var \Illuminate\Support\MessageBag $error */
        $error = \Session::get("email_error", new \Illuminate\Support\MessageBag());
        \Session::remove('email_error');

        $handled = $request::forceSecureRequest();
        if ($handled) {
            return $handled;
        }
        $data = [
            "form"       => $form,
            "errors"     => $error,
            "genderList" => $this->genderList,
            "country_name" => $country_name
        ];

        return view('idemail.registration', $data);

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

        \Session::set("email_form", $request->toArray());

        // バリデーションチェック
        $validRet = $this->_validate($request);
        if ($validRet->fails()) {
            // 入力画面へ
            \Session::set("email_error", $validRet->errors());

            return redirect()->action('IDEmailController@registrationGet');
        }

        $data = [
            "form"       => $request->toArray(),
            "genderList" => $this->genderList
        ];

        return view('idemail.confirm', $data);

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
        $data = \Session::get("email_form", []);
        \Session::clear();

        // sf
        $sfRet = $this->saveSfData($data);

        if ( ! $sfRet) {
            throw new \Exception("failed to insert salesforce data.");
        }


        return view('idemail.thanks');

    }

    public function thankyouGet(Request $request)
    {
        \Session::clear();
        return redirect()->action('IDEmailController@registrationGet');
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
            'residence_region' => 'required',
            'agree_newsletter' => 'required'
        ];
        // エラーメッセージ設定
        $messages = [
            'first_name.required'       => Lang::get('messages.email_form_error_name_First_Name__c_required'),
            'last_name.required'        => Lang::get('messages.email_form_error_name_Last_Name__c_required'),
            'gender.required'           => Lang::get('messages.email_form_error_name_Gender__c_required'),
            'email.required'            => Lang::get('messages.email_form_error_name_Email_required'),
            'email.email'               => Lang::get('messages.email_form_error_name_Email_email'),
            'email_confirm.required'    => Lang::get('messages.email_form_error_name_Email_confirm_required'),
            'email_confirm.same'        => Lang::get('messages.email_form_error_name_Email_confirm_same'),
            'residence_region.required' => Lang::get('messages.email_form_error_name_Residence_Region__c_required'),
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
            "Gender__c"           => Arr::get($data, 'gender') == "Male" ? "Male" : "Female",
            "Email__c"            => Arr::get($data, 'email'),
            "Residence_Region__c" => Arr::get($data, 'residence_region'),
            "e_newsletter__c"     => (bool)Arr::get($data, 'agree_newsletter'),
        ];

        $sfSrv = App::make(\Ana\SalesForceService::class);
        $sfSrv->init();
        $ret = $sfSrv->phEmailInsertLead($salesForceRequest);

        return $ret["success"];
    }

    #Returns the IP of the client
    function getUserIP()
    {
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else
        {
            $ip = $remote;
        }

        return $ip;
    }

}
