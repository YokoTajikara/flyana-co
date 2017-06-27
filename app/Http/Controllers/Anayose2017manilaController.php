<?php
namespace App\Http\Controllers;

use App;
use App\Http\AnaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Lang;

class Anayose2017manilaController extends Controller
{
    private $language   = "en";
    private $genderList = [];
    private $yearList   = [];
    private $monthList  = [];
    private $dayList    = [];

    /**
     * Anayose2017manilaController constructor.
     */
    public function __construct()
    {
        //パラメータがある場合、言語切り替えを行う
        $language       = \Input::get("language", null);
        $this->language = empty($language) ? \Session::get("language", "en") : $language;
        \Session::set('language', $this->language);
        App::setLocale($this->language);

        $this->genderList   = [
            ""       => Lang::get("messages.bangkok16b_form_option_select_empty"),
            "Male"   => Lang::get("messages.bangkok16b_form_option_select_male"),
            "Female" => Lang::get("messages.bangkok16b_form_option_select_female"),
        ];
        $this->yearList[""] = Lang::get("messages.s25_form_birth_date_year_option_select_empty");
        for ($i = 1930; $i <= date("Y"); $i++) {
            $this->yearList[$i] = $i;
        }

        $this->monthList = [
            ""   => Lang::get("messages.s25_form_birth_date_month_option_select_empty"),
            "1"  => "Jan",
            "2"  => "Feb",
            "3"  => "Mar",
            "4"  => "Apr",
            "5"  => "May",
            "6"  => "Jun",
            "7"  => "Jul",
            "8"  => "Aug",
            "9"  => "Sep",
            "10" => "Oct",
            "11" => "Nov",
            "12" => "Dec",
        ];

        $this->dayList     = [];
        $this->dayList[""] = Lang::get("messages.s25_form_birth_date_day_option_select_empty");
        for ($i = 1; $i <= 31; $i++) {
            $this->dayList[$i] = $i;
        }
    }

    /**
     * チェックボックスの入力が無い場合、対応するkeyの値をfalseで作る。
     *
     * @param $data
     *
     * @return mixed
     */
    private function filterCheckboxValue($data)
    {
        $data["ana_web_site"]     = array_key_exists("ana_web_site", $data) ? $data["ana_web_site"] : false;
        $data["JFM"]              = array_key_exists("JFM", $data) ? $data["JFM"] : false;
        $data["Newspaper"]        = array_key_exists("Newspaper", $data) ? $data["Newspaper"] : false;
        $data["PPW"]              = array_key_exists("PPW", $data) ? $data["PPW"] : false;
        $data["Friend/Relatives"] = array_key_exists("Friend/Relatives", $data) ? $data["Friend/Relatives"] : false;
        $data["Others"]           = array_key_exists("Others", $data) ? $data["Others"] : false;
        $data["amc__c"]           = array_key_exists("amc__c", $data) ? $data["amc__c"] : false;
        $data["agree_newsletter"] = array_key_exists("agree_newsletter", $data) ? $data["agree_newsletter"] : false;
        $data["privacy"]          = array_key_exists("privacy", $data) ? $data["privacy"] : false;

        return $data;
    }

    /**
     * データを保存用に整形する
     *
     * @param $data
     *
     * @return mixed
     */
    private function trimDataArray($data)
    {
        $Data = [
            "Title__c"                                   => array_get($data, "Title__c"),
            "FirstName"                                  => array_get($data, "First_Name__c"),
            "LastName"                                   => array_get($data, "Last_Name__c"),
            "sex__c"                                     => array_get($data, "sex__c"),
            "Birthday__c"                                => array_get($data, "Birthday_y__c") . "-" . array_get($data, "Birthday_m__c") . "-" . array_get($data, "Birthday_d__c"),
            "Occupation__c"                              => array_get($data, "Occupation__c"),
            "Mobile_phone__c"                            => array_get($data, "Mobile_phone__c"),
            "Email"                                      => array_get($data, "Email"),
            "How_many_will_attend_YOSE_event__c"         => array_get($data, "How_many_will_attend_YOSE_event__c"),
            "How_often_do_you_travel_overseas_p_year__c" => array_get($data, "How_often_do_you_travel_overseas_p_year__c"),
            "Country_of_residence__c"                    => array_get($data, "Country_of_residence__c"),
            "How_do_you_know_this_event__c"              => [],
            "amc__c"                                     => ! empty(array_get($data, "amc__c")) ? true : false,
            "e_newsletter__c"                            => ! empty(array_get($data, "e_newsletter__c")) ? true : false,
            "Person2_Title__c"                           => array_get($data, "Person2_Title__c"),
            "Person2_First_Name__c"                      => array_get($data, "Person2_First_Name__c"),
            "Person2_Last_Name__c"                       => array_get($data, "Person2_Last_Name__c"),
            "Person2_Gender__c"                          => array_get($data, "Person2_Gender__c"),
            "Person2_Mobile_Phone__c"                    => array_get($data, "Person2_Mobile_Phone__c"),
        ];
        if ( ! empty(array_get($data, "Person2_Date_of_Birthday_y__c"))) {
            $Data["Person2_Date_of_Birthday__c"] = array_get($data, "Person2_Date_of_Birthday_y__c") . "-" . array_get($data, "Person2_Date_of_Birthday_m__c") . "-" . array_get($data, "Person2_Date_of_Birthday_d__c");
        }

        // How do you know this event?の値を整える
        $HDYKTE   = [];
        $HDYKTE[] = ! empty(array_get($data, "ana_web_site")) ? array_get($data, "ana_web_site") : "";
        $HDYKTE[] = ! empty(array_get($data, "JFM")) ? array_get($data, "JFM") : "";
        $HDYKTE[] = ! empty(array_get($data, "Newspaper")) ? array_get($data, "Newspaper") : "";
        $HDYKTE[] = ! empty(array_get($data, "PPW")) ? array_get($data, "PPW") : "";
        $HDYKTE[] = ! empty(array_get($data, "Friend/Relatives")) ? array_get($data, "Friend/Relatives") : "";
        $HDYKTE[] = ! empty(array_get($data, "Others")) ? array_get($data, "Others") : "";
        if ( ! empty(array_get($data, "Others") && ! empty(array_get($data, "othertext")))) {
            $HDYKTE[] = array_get($data, "othertext");
        }
        if ( ! empty($HDYKTE)) {
            $Data["How_do_you_know_this_event__c"] = implode(",", $HDYKTE);
        }

        return $Data;
    }

    /**
     * キャンペーントップページ
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function registration()
    {
        $data = [
            "genderList" => $this->genderList,
            "yearList"   => $this->yearList,
            "monthList"  => $this->monthList,
            "dayList"    => $this->dayList,
        ];

        return view('anayose2017manila.registration', $data);
    }


    /**
     * バリデーションエラー時、確認画面 -> 戻る時の入力画面
     *
     * @param Request $request
     *
     * @return bool|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function registrationGet(Request $request)
    {
        $form = \Session::get("anayose2017manila_form", []);
        \Session::remove('anayose2017manila_form');
        /** @var \Illuminate\Support\MessageBag $error */
        $error = \Session::get("anayose2017manila_error", new \Illuminate\Support\MessageBag());
        \Session::remove('anayose2017manila_error');

        $handled = AnaRequest::forceSecureRequest();
        if ($handled) {
            return $handled;
        }

        $data = [
            "form"       => $form,
            "errors"     => $error,
            "genderList" => $this->genderList,
            "yearList"   => $this->yearList,
            "monthList"  => $this->monthList,
            "dayList"    => $this->dayList,
        ];

        return view('anayose2017manila.registration', $data);

    }

    /**
     * 確認画面
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function confirmPost(Request $request)
    {
        $handled = AnaRequest::forceSecureRequest();
        if ($handled) {
            return $handled;
        }

        \Session::set("anayose2017manila_form", $request->toArray());

        // validation
        $validRet = $this->validationConfirm($request);
        if ( ! $validRet["success"]) {

            // 入力画面へ
            \Session::set("anayose2017manila_error", $validRet["error"]);

            return redirect()->action('Anayose2017manilaController@registrationGet');
        }

        $data = [
            "form"       => $validRet["input"],
            "genderList" => $this->genderList,
            "yearList"   => $this->yearList,
            "monthList"  => $this->monthList,
            "dayList"    => $this->dayList,
        ];

        return view('anayose2017manila.confirm', $data);

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
        $data["X2017YoseManila__c"] = true;
        $data["Applied_Date__c"]    = date("Y-m-d");
        $data["language__c"]        = "en";
        $data["status"]             = "new";
        $data["Origin__c"]          = "2017YoseManila";
        $data["Company"]            = "2017YoseManila";

        $sfSrv = App::make(\Ana\SalesForceService::class);
        $sfSrv->init();
        $ret = $sfSrv->anayose2017manilaInsertLead($data);

        return $ret["success"];
    }

    /**
     * Pardotフォームハンドラエンドポイントに付加するパラメータを作る.
     *
     * @param array $successLocationParameters
     * @param array $errorLocationParameters
     * @param array $request
     *
     * @return string
     */
    private function getPardotFormHandlerEndpointParameter(
        $successLocationParameters = array(),
        $errorLocationParameters = array(),
        $request = array()
    ) {
        $successLocationQuery = '';
        $errorLocationQuery   = '';

        $elms = array();
        foreach ($successLocationParameters as $k => $v) {
            //$elms[] = $k . '=' . $v;
            $elms[] = $k . '=' . rawurlencode($v);
        }
        if ( ! empty($elms)) {
            $successLocationQuery = '?' . implode('&', $elms);
        }

        $elms = array();
        foreach ($errorLocationParameters as $k => $v) {
            //$elms[] = $k . '=' . $v;
            $elms[] = $k . '=' . rawurlencode($v);
        }
        if ( ! empty($elms)) {
            $errorLocationQuery = '?' . implode('&', $elms);
        }

        $successLocation = 'https://' . $_SERVER['HTTP_HOST'] . '/anayose2017manila/thankyou_/index.html' . $successLocationQuery;
        $errorLocation   = 'https://' . $_SERVER['HTTP_HOST'] . '/anayose2017manila/registration-error' . $errorLocationQuery;

        // @note: locationのクエリ文字列に空白を含む値を指定した場合、urlencodeしても引き渡されなかった
        $param = "?";
        $param .= "success_location=" . rawurlencode($successLocation);
        $param .= "&";
        $param .= "error_location=" . rawurlencode($errorLocation);

        return $param;
    }

    /**
     * 確認->pardotデータ投入用リダイレクト画面
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function thankyouPost(Request $request)
    {
        $handled = AnaRequest::forceSecureRequest();
        if ($handled) {
            return $handled;
        }
        $data = \Session::get("anayose2017manila_form", []);
        \Session::remove('anayose2017manila_form');
        $data = $this->filterCheckboxValue($data);
        $data = $this->trimDataArray($data);

        // sf
        $sfRet = $this->saveSfData($data);
        if ( ! $sfRet) {
            throw new \Exception("failed to insert salesforce data.");
        }

        $endpoint = "https://go.pardot.com/l/168252/2016-12-21/63vs7";

        // pardot
        $pardotData = [
            "pardotFormHandlerEndpoint" => $endpoint . $this->getPardotFormHandlerEndpointParameter([]),
            "pardotDataList"            => [
                "email"                                   => array_get($data, "Email"),
                "First_Name"                              => array_get($data, "FirstName"),
                "Last_Name"                               => array_get($data, "LastName"),
                "Company"                                 => "2017YoseManila",
                "Title"                                   => array_get($data, "Title__c"),
                "Occupation"                              => array_get($data, "Occupation__c"),
                "Mobile_phone"                            => array_get($data, "Mobile_phone__c"),
                "How_many_will_attend_YOSE_event"         => array_get($data, "How_many_will_attend_YOSE_event__c"),
                "How_often_do_you_travel_overseas_p_year" => array_get($data, "How_often_do_you_travel_overseas_p_year__c"),
                "Country_of_residence"                    => array_get($data, "Country_of_residence__c"),
                "How_do_you_know_this_event"              => array_get($data, "How_do_you_know_this_event__c"),
                "amc"                                     => array_get($data, "amc__c"),
                "e_newsletter"                            => array_get($data, "e_newsletter__c"),
                "Person2_Title"                           => array_get($data, "Person2_Title__c"),
                "Person2_First_Name"                      => array_get($data, "Person2_First_Name__c"),
                "Person2_Gender"                          => array_get($data, "Person2_Gender__c"),
                "Person2_Date_of_Birthday"                => array_get($data, "Person2_Date_of_Birthday__c"),
                "Person2_Mobile_Phone"                    => array_get($data, "Person2_Mobile_Phone__c"),
                "X2017YoseManila"                         => true,
                "Applied_Date"                            => date("Y-m-d"),
                "Status"                                  => "new",
                "Person2_Last_Name"                       => array_get($data, "Person2_Last_Name__c")
            ]
        ];

        return view('anayose2017manila.pardot', $pardotData);
    }

    /**
     * pardot -> 完了画面
     * pardotからコールされる。
     *
     * @param Request $request
     *
     * @return bool|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function thankyouGet(Request $request)
    {
        $handled = AnaRequest::forceSecureRequest();
        if ($handled) {
            return $handled;
        }

        $sSrv = App::make(\Ana\SessionService::class);

        // Facebook, Twitter以外のユーザーの直接アクセスの場合はトップへ戻す。
        if ( ! $sSrv->has(self::class, "input")) {
            if ( ! AnaRequest::isFacebookUserAgentAccess() && ! AnaRequest::isTwitterUserAgentAccess()) {
                return redirect("/anayose2017manila");
            }
        }

        $data = $request->all();

        $sSrv->clearSectionData(self::class);

        return redirect('/anayose2017manila/thankyou_/index.html');

    }

    /**
     * pardotエラー画面
     * pardotからコールされる。
     *
     * @param Request $request
     *
     * @throws \Exception
     */
    public function registrationErrorGet(Request $request)
    {
        throw new \Exception("raise pardot error. info=" . print_r($request->all(), true));
    }


    /**
     * バリデーション処理
     *
     * @param Request $request
     *
     * @return array
     */
    private function validationConfirm(Request $request)
    {
        $data = $request->toArray();
        // Emailの重複チェック
        Validator::extend('duplicate_email', function ($attribute, $value, $parameters, $validator) {
            $data  = $validator->getData();
            $sfSrv = App::make(\Ana\SalesForceService::class);
            $sfSrv->init();
            $count = $sfSrv->anayose2017manilaGetLeadByEmail($data);
            if ($count == 0) {
                return true;
            } else {
                return false;
            }
        });

        /**
         * 1人目の誕生日の範囲チェック
         */
        \Validator::extend('check_birthday', function ($attribute, $value, $parameters, $validator) {
            $data = $validator->getData();

            $year  = $data["Birthday_y__c"];
            $month = $data["Birthday_m__c"];
            $day   = $data["Birthday_d__c"];

            //日付がない場合は、判定しない
            if (empty($year) || empty($month) || empty($day)) {
                return true;
            }

            if ( ! checkdate($month, $day, $year)) {
                return false;
            }
            $birth = date("Ymd", strtotime($year . "/" . $month . "/" . $day));
            $now   = date("Ymd");
            $age   = floor(($now - $birth) / 10000);
            if ($age < 18 || $age > 90) {
                return false;
            }

            return true;
        });

        /**
         * 2人目の誕生日の範囲チェック
         */
        \Validator::extend('check_person2_birthday', function ($attribute, $value, $parameters, $validator) {
            $data = $validator->getData();

            $year  = $data["Person2_Date_of_Birthday_y__c"];
            $month = $data["Person2_Date_of_Birthday_m__c"];
            $day   = $data["Person2_Date_of_Birthday_d__c"];

            //日付がない場合は、判定しない
            if (empty($year) || empty($month) || empty($day)) {
                return true;
            }

            if ( ! checkdate($month, $day, $year)) {
                return false;
            }
            $birth = date("Ymd", strtotime($year . "/" . $month . "/" . $day));
            $now   = date("Ymd");
            $age   = floor(($now - $birth) / 10000);
            if ($age <= 6 || $age > 90) {
                return false;
            }

            return true;
        });

        $rules = [
            'Title__c'                                   => 'required',
            'First_Name__c'                              => 'required',
            'Last_Name__c'                               => 'required',
            'sex__c'                                     => 'required',
            'Birthday_d__c'                              => 'required',
            'Birthday_m__c'                              => 'required',
            'Birthday_y__c'                              => 'required|check_birthday',
            'Occupation__c'                              => 'required',
            'Mobile_phone__c'                            => 'required|regex:/^[0-9]{11}$/',
            'Email'                                      => 'required|email|duplicate_email',
            'Email_confirm'                              => 'required|same:Email',
            'How_many_will_attend_YOSE_event__c'         => 'required',
            'How_often_do_you_travel_overseas_p_year__c' => 'required',
            'privacy'                                    => 'required',
            'Person2_Date_of_Birthday_d__c'              => '',
            'Person2_Date_of_Birthday_m__c'              => '',
            'Person2_Date_of_Birthday_y__c'              => 'check_person2_birthday',
            'Person2_Mobile_Phone__c'                    => 'regex:/^[0-9]{11}$/',
        ];

        // How many will attend YOSE event?が2の場合、Person2の項目を必須項目にする
        if ( $data["How_many_will_attend_YOSE_event__c"] == "2") {
            $rules["Person2_Title__c"]              = 'required';
            $rules["Person2_First_Name__c"]         = 'required';
            $rules["Person2_Last_Name__c"]          = 'required';
            $rules["Person2_Gender__c"]             = 'required';
            $rules["Person2_Date_of_Birthday_d__c"] = 'required';
            $rules["Person2_Date_of_Birthday_m__c"] = 'required';
            $rules["Person2_Date_of_Birthday_y__c"] = 'required|check_person2_birthday';
        }

        $messages = [
            'Title__c.required'                                    => trans('messages.anayose2017manila_form_error_name_Title__c_required'),
            'First_Name__c.required'                               => trans('messages.anayose2017manila_form_error_name_First_Name__c_required'),
            'Last_Name__c.required'                                => trans('messages.anayose2017manila_form_error_name_Last_Name__c_required'),
            'sex__c.required'                                      => trans('messages.anayose2017manila_form_error_name_sex__c_required'),
            'Birthday_d__c.required'                               => trans('messages.anayose2017manila_form_error_name_Birthday_d__c_required'),
            'Birthday_m__c.required'                               => trans('messages.anayose2017manila_form_error_name_Birthday_m__c_required'),
            'Birthday_y__c.required'                               => trans('messages.anayose2017manila_form_error_name_Birthday_y__c_required'),
            'Birthday_y__c.check_birthday'                         => trans('messages.anayose2017manila_form_error_name_Birthday_y__c_check_birthday'),
            'Occupation__c.required'                               => trans('messages.anayose2017manila_form_error_name_Occupation__c_required'),
            'Mobile_phone__c.required'                             => trans('messages.anayose2017manila_form_error_name_Mobile_phone__c_required'),
            'Mobile_phone__c.regex'                                => trans('messages.anayose2017manila_form_error_name_Mobile_phone__c_incorrect'),
            'Email.required'                                       => trans('messages.anayose2017manila_form_error_name_Email_required'),
            'Email.email'                                          => trans('messages.anayose2017manila_form_error_name_Email_email'),
            'Email.duplicate_email'                                => trans('messages.anayose2017manila_form_error_name_Email_duplicate_email'),
            'Email_confirm.required'                               => trans('messages.anayose2017manila_form_error_name_Email_confirm_required'),
            'Email_confirm.same'                                   => trans('messages.anayose2017manila_form_error_name_Email_confirm_same'),
            'How_many_will_attend_YOSE_event__c.required'          => trans('messages.anayose2017manila_form_error_name_How_many_will_attend_YOSE_event__c_required'),
            'How_often_do_you_travel_overseas_p_year__c.required'  => trans('messages.anayose2017manila_form_error_name_How_often_do_you_travel_overseas_p_year__c_required'),
            'privacy.required'                                     => trans('messages.anayose2017manila_form_error_name_privacy_required'),
            'Person2_Title__c.required'                            => trans('messages.anayose2017manila_form_error_name_Person2_Title__c_required'),
            'Person2_First_Name__c.required'                       => trans('messages.anayose2017manila_form_error_name_Person2_First_Name__c_required'),
            'Person2_Last_Name__c.required'                        => trans('messages.anayose2017manila_form_error_name_Person2_Last_Name__c_required'),
            'Person2_Gender__c.required'                           => trans('messages.anayose2017manila_form_error_name_Person2_Gender__c_required'),
            'Person2_Date_of_Birthday_d__c.required'               => trans('messages.anayose2017manila_form_error_name_Person2_Birthday_d__c_required'),
            'Person2_Date_of_Birthday_m__c.required'               => trans('messages.anayose2017manila_form_error_name_Person2_Birthday_m__c_required'),
            'Person2_Date_of_Birthday_y__c.required'               => trans('messages.anayose2017manila_form_error_name_Person2_Birthday_y__c_required'),
            'Person2_Date_of_Birthday_y__c.check_person2_birthday' => trans('messages.anayose2017manila_form_error_name_Person2_Birthday_y__c_check_person2_birthday'),
            'Person2_Mobile_Phone__c.regex'                        => trans('messages.anayose2017manila_form_error_name_Person2_Mobile_Phone__c_incorrect'),
        ];

        $validator = \Validator::make($request->all(), $rules, $messages);

        // errors
        $ret = [
            "success" => (false == $validator->fails()),
            "input"   => $data,
            "error"   => $validator->errors()
        ];

        return $ret;

    }
}