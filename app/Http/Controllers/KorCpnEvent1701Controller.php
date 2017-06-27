<?php
namespace App\Http\Controllers;

use App;
use App\Http\AnaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Lang;

class KorCpnEvent1701Controller extends Controller
{
    private $language   = "kr";
    private $genderList = [];
    private $yearList   = [];
    private $monthList  = [];
    private $dayList    = [];

    /**
     * KorCpnEvent1701Controller constructor.
     */
    public function __construct()
    {
        //パラメータがある場合、言語切り替えを行う
        $language       = \Input::get("language", null);
        $this->language = empty($language) ? \Session::get("language", "kr") : $language;
        \Session::set('language', $this->language);
        App::setLocale($this->language);

        $this->yearList = [
            ""     => Lang::get("messages.kor-cpn-event1701_form_DepartureDate_y_option_select_empty"),
            "2017" => "2017"
        ];

        $this->monthList     = [];
        $this->monthList[""] = Lang::get("messages.kor-cpn-event1701_form_DepartureDate_m_option_select_empty");
        for ($i = 2; $i <= 12; $i++) {
            $this->monthList[$i] = $i;
        }

        $this->dayList     = [];
        $this->dayList[""] = Lang::get("messages.kor-cpn-event1701_form_DepartureDate_d_option_select_empty");
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
        $data["e_newsletter__c"] = array_key_exists("e_newsletter__c", $data) ? $data["e_newsletter__c"] : 0;
        $data["privacy"]         = array_key_exists("privacy", $data) ? $data["privacy"] : false;

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
            "E_ticket_number__c" => array_get($data, "E_ticket_number__c"),
            "DepartureDate__c"   => array_get($data, "DepartureDate_y__c") . "-" . array_get($data, "DepartureDate_m__c") . "-" . array_get($data, "DepartureDate_d__c"),
            "FirstName"          => array_get($data, "First_Name__c"),
            "LastName"           => array_get($data, "Last_Name__c"),
            "Email"              => array_get($data, "Email"),
            "e_newsletter__c"    => array_get($data, "e_newsletter__c") == 1 ? 1 : 0,
        ];

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

        return view('kor-cpn-event1701.registration', $data);
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
        $form = \Session::get("kor-cpn-event1701_form", []);
        \Session::remove('kor-cpn-event1701_form');
        /** @var \Illuminate\Support\MessageBag $error */
        $error = \Session::get("kor-cpn-event1701_error", new \Illuminate\Support\MessageBag());
        \Session::remove('kor-cpn-event1701_error');

        $handled = AnaRequest::forceSecureRequest();
        if ($handled) {
            return $handled;
        }

        $data = [
            "form"      => $form,
            "errors"    => $error,
            "yearList"  => $this->yearList,
            "monthList" => $this->monthList,
            "dayList"   => $this->dayList,
        ];

        return view('kor-cpn-event1701.registration', $data);

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

        \Session::set("kor-cpn-event1701_form", $request->toArray());

        // validation
        $validRet = $this->validationConfirm($request);
        if ( ! $validRet["success"]) {

            // 入力画面へ
            \Session::set("kor-cpn-event1701_error", $validRet["error"]);

            return redirect()->action('KorCpnEvent1701Controller@registrationGet');
        }

        $data = [
            "form"      => $validRet["input"],
            "yearList"  => $this->yearList,
            "monthList" => $this->monthList,
            "dayList"   => $this->dayList,
        ];

        return view('kor-cpn-event1701.confirm', $data);

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
        $data["X2017DonKorea__c"] = true;
        $data["Applied_Date__c"]  = date("Y-m-d");
        $data["status"]           = "new";
        $data["Origin__c"]        = "2017DonKorea";
        $data["Company"]          = "2017DonKorea";

        $sfSrv = App::make(\Ana\SalesForceService::class);
        $sfSrv->init();
        $ret = $sfSrv->kor_cpn_event1701InsertLead($data);

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

        $successLocation = 'https://' . $_SERVER['HTTP_HOST'] . '/kor-cpn-event1701/thankyou_/index.html' . $successLocationQuery;
        $errorLocation   = 'https://' . $_SERVER['HTTP_HOST'] . '/kor-cpn-event1701/registration-error' . $errorLocationQuery;

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
        $data = \Session::get("kor-cpn-event1701_form", []);
        \Session::remove('kor-cpn-event1701_form');
        $data = $this->filterCheckboxValue($data);
        $data = $this->trimDataArray($data);

        // sf
        $sfRet = $this->saveSfData($data);
        if ( ! $sfRet) {
            throw new \Exception("failed to insert salesforce data.");
        }

        $endpoint = "https://go.pardot.com/l/168252/2017-01-19/72nys";

        // pardot
        $pardotData = [
            "pardotFormHandlerEndpoint" => $endpoint . $this->getPardotFormHandlerEndpointParameter([]),
            "pardotDataList"            => [
                "E-ticket number" => array_get($data, "E_ticket_number__c"),
                "Departure Date"  => array_get($data, "DepartureDate__c"),
                "email"           => array_get($data, "Email"),
                "First Name"      => array_get($data, "FirstName"),
                "Last Name"       => array_get($data, "LastName"),
                "E_newsletter"    => array_get($data, "e_newsletter__c"),
                "2017_DonKorea"   => true,
                "Applied Date"    => date("Y-m-d"),
                "Status"          => "new",
            ]
        ];

        return view('kor-cpn-event1701.pardot', $pardotData);
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
                return redirect("/kor-cpn-event1701");
            }
        }

        $data = $request->all();

        $sSrv->clearSectionData(self::class);

        return redirect('/kor-cpn-event1701/thankyou_/index.html');

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

        /**
         *  Emailの重複チェック
         */
        Validator::extend('duplicate_e_ticket_number', function ($attribute, $value, $parameters, $validator) {
            $data  = $validator->getData();
            $sfSrv = App::make(\Ana\SalesForceService::class);
            $sfSrv->init();
            $count = $sfSrv->kor_cpn_event1701GetLeadByETicketNumber($data);
            $ok    = (0 == $count);

            return $ok;
        });

        /**
         *  Emailの文字列チェック(205から始まる13桁の数字)
         */
        Validator::extend('check_e_ticket_number', function ($attribute, $value, $parameters, $validator) {
            $data     = $validator->getData();
            $e_ticket = $data["E_ticket_number__c"];
            if (preg_match("/^205[0-9]{10}+$/", $e_ticket)) {
                return true;
            } else {
                return false;
            }
        });

        /**
         * 搭乗日が正しいか確認
         */
        \Validator::extend('check_departure_date', function ($attribute, $value, $parameters, $validator) {
            $data = $validator->getData();

            $year  = $data["DepartureDate_y__c"];
            $month = $data["DepartureDate_m__c"];
            $day   = $data["DepartureDate_d__c"];

            //日付がない場合は、判定しない
            if (empty($year) || empty($month) || empty($day)) {
                return true;
            }

            if ( ! checkdate($month, $day, $year)) {
                return false;
            }
            $departure_date = strtotime($year . "-" . $month . "-" . $day);
            $start          = strtotime("2017-02-01");
            $end            = strtotime("2017-12-31");
            if ($departure_date < $start || $departure_date > $end) {
                return false;
            }

            return true;
        });


        $rules = [
            'E_ticket_number__c' => 'required|check_e_ticket_number|duplicate_e_ticket_number',
            'DepartureDate_y__c' => 'required|check_departure_date',
            'DepartureDate_m__c' => 'required',
            'DepartureDate_d__c' => 'required',
            'First_Name__c'      => 'required',
            'Last_Name__c'       => 'required',
            'Email'              => 'required|email',
            'Email_confirm'      => 'required|same:Email',
            'privacy'            => 'required',
        ];

        $messages = [
            'E_ticket_number__c.required'                  => trans('messages.kor-cpn-event1701_form_error_name_E_ticket_number__c_required'),
            'E_ticket_number__c.check_e_ticket_number'     => trans('messages.kor-cpn-event1701_form_error_name_E_ticket_number__c_incorrect'),
            'E_ticket_number__c.duplicate_e_ticket_number' => trans('messages.kor-cpn-event1701_form_error_name_E_ticket_number__c_duplicate'),
            'DepartureDate_y__c.check_departure_date'      => trans('messages.kor-cpn-event1701_form_error_name_DepartureDate_y__c_check_departure_date'),
            'DepartureDate_y__c.required'                  => trans('messages.kor-cpn-event1701_form_error_name_DepartureDate_d__c_required'),
            'DepartureDate_y__c.check_departure_data'      => trans('messages.kor-cpn-event1701_form_error_name_DepartureDate_y__c_excluded'),
            'DepartureDate_d__c.required'                  => trans('messages.kor-cpn-event1701_form_error_name_DepartureDate_d__c_required'),
            'DepartureDate_m__c.required'                  => trans('messages.kor-cpn-event1701_form_error_name_DepartureDate_d__c_required'),
            'First_Name__c.required'                       => trans('messages.kor-cpn-event1701_form_error_name_First_Name__c_required'),
            'Last_Name__c.required'                        => trans('messages.kor-cpn-event1701_form_error_name_Last_Name__c_required'),
            'Email.required'                               => trans('messages.kor-cpn-event1701_form_error_name_Email_required'),
            'Email.email'                                  => trans('messages.kor-cpn-event1701_form_error_name_Email_email'),
            'Email_confirm.required'                       => trans('messages.kor-cpn-event1701_form_error_name_Email_confirm_required'),
            'Email_confirm.same'                           => trans('messages.kor-cpn-event1701_form_error_name_Email_confirm_same'),
            'privacy.required'                             => trans('messages.kor-cpn-event1701_form_error_privacy_required'),
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