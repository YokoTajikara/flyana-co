<?php
namespace App\Http\Controllers;

use App;
use App\Http\AnaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Lang;
use Ana\PageOpenStatusService;

class Bangkok16bController extends Controller
{
    private $language   = "en";
    private $genderList = [];
    private $yearList   = [];
    private $monthList  = [];
    private $dayList    = [];

    /**
     * Bangkok16bController constructor.
     */
    public function __construct()
    {
        //パラメータがある場合、言語切り替えを行う
        $language = \Input::get("language", null);
        $this->language = empty($language) ? \Session::get("language", "en") : $language;
        \Session::set('language', $this->language);
        App::setLocale($this->language);

        $this->genderList = [
            ""       => Lang::get("messages.bangkok16b_form_option_select_empty"),
            "Male"   => Lang::get("messages.bangkok16b_form_option_select_male"),
            "Female" => Lang::get("messages.bangkok16b_form_option_select_female"),
        ];
        $this->yearList = [
            ""     => Lang::get("messages.s25_form_birth_date_year_option_select_empty"),
            "2016" => "2016",
            "2017" => "2017"
        ];
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

        $this->dayList = [];
        $this->dayList[""] = Lang::get("messages.s25_form_birth_date_day_option_select_empty");
        for ($i = 1; $i <= 31; $i++) {
            $this->dayList[$i] = $i;
        }
    }

	/**
	 * 各アクションの前処理.
	 *
	 * @return 以後の処理を行う必要がない場合はreturnするobject, そのまま処理を継続する場合はfalse.
	 */
	private function beforeAction($request) {
		$handled = false;
		$pageSrv = new PageOpenStatusService();
		if (false === $pageSrv->isOpenBangkok16bCampaignEntry()) {
			if (1 === preg_match('!/bangkok16b/thai!', $request->url())) {
				if (1 !== preg_match('!/bangkok16b/thai[/]?$!', $request->url())) {
					$handled = redirect()->secure('https://' . $_SERVER['HTTP_HOST'] . '/bangkok16b/thai');
				}
			} else {
				if (1 !== preg_match('!/bangkok16b[/]?$!', $request->url())) {
					$handled = redirect()->secure('https://' . $_SERVER['HTTP_HOST'] . '/bangkok16b');
				}
			}
		}
		return $handled;
	}

    /**
     * チェックボックスの入力が無い場合、対応するkeyの値をfalseで作る。
     * @param $data
     * @return mixed
     */
    private function filterCheckboxValue($data)
    {
        $data["agree_newsletter"] = array_key_exists("agree_newsletter", $data) ? $data["agree_newsletter"] : false;
        $data["privacy"] = array_key_exists("privacy", $data) ? $data["privacy"] : false;
        return $data;
    }

    /**
     * キャンペーントップページ
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
		$handled = $this->beforeAction($request);
		if ($handled) {
			return $handled;
		}

        $this->language = "en";
        \Session::set('language', $this->language);
        App::setLocale($this->language);

		$data = [];

		$pageSrv = new PageOpenStatusService();
		$data['pageClosed'] = (false === $pageSrv->isOpenBangkok16bCampaignEntry());

        return view('bangkok16b.index', $data);
    }

    /**
     * キャンペーントップページ
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index_thai(Request $request)
    {
		$handled = $this->beforeAction($request);
		if ($handled) {
			return $handled;
		}

        $this->language = "th";
        \Session::set('language', $this->language);
        App::setLocale($this->language);

		$data = [];

		$pageSrv = new PageOpenStatusService();
		$data['pageClosed'] = (false === $pageSrv->isOpenBangkok16bCampaignEntry());

        return view('bangkok16b.index_thai', $data);
    }

    /**
     * バリデーションエラー時、確認画面 -> 戻る時の入力画面
     * @param Request $request
     * @return bool|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function registrationGet(Request $request)
    {
		$handled = $this->beforeAction($request);
		if ($handled) {
			return $handled;
		}

        $form = \Session::get("bankok16b_form", []);
        \Session::remove('bankok16b_form');
        /** @var \Illuminate\Support\MessageBag $error */
        $error = \Session::get("bankok16b_error", new \Illuminate\Support\MessageBag());
        \Session::remove('bankok16b_error');

        $handled = AnaRequest::forceSecureRequest();
        if ($handled) {
            return $handled;
        }

//        $data = [];
//        $sSrv = App::make(\Ana\SessionService::class);
//        if ($sSrv->has(self::class, "input")) {
//            $data = array_merge($data, $sSrv->get(self::class, "input"));
//            $request->merge($data);
//        }
//        if ($sSrv->has(self::class, "inputError")) {
//            // バリデーションエラー時のエラーデータ
//            $data["errors"] = $sSrv->get(self::class, "inputError");
//        }

        $data = [
            "form"       => $form,
            "errors"     => $error,
            "genderList" => $this->genderList,
            "yearList"   => $this->yearList,
            "monthList"  => $this->monthList,
            "dayList"    => $this->dayList,
        ];

        if ($this->language == "th") {
            return view('bangkok16b.registration_thai', $data);
        } else {
            return view('bangkok16b.registration', $data);
        }
    }

    /**
     * 確認画面
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function confirmPost(Request $request)
    {
		$handled = $this->beforeAction($request);
		if ($handled) {
			return $handled;
		}

        $handled = AnaRequest::forceSecureRequest();
        if ($handled) {
            return $handled;
        }

        \Session::set("bankok16b_form", $request->toArray());

        // validation
        $validRet = $this->validationConfirm($request);
        if (!$validRet["success"]) {
            // 入力画面へ
            \Session::set("bankok16b_error", $validRet["error"]);

            return redirect()->action('Bangkok16bController@registrationGet');
        }

        $data = [
            "form"       => $validRet["input"],
            "genderList" => $this->genderList,
            "yearList"   => $this->yearList,
            "monthList"  => $this->monthList,
            "dayList"    => $this->dayList,
        ];

        if ($this->language == "th") {
            return view('bangkok16b.confirm_thai', $data);
        } else {
            return view('bangkok16b.confirm', $data);
        }
    }

    /**
     * SFへのデータ登録
     * @param $data
     * @return mixed
     */
    private function saveSfData($data)
    {
        $data["eticket_number"] = "205-" . $data["eticket_number"];
        $data["gender"] = $this->genderList[$data["gender"]];
        $data["boarding_date"] = $data["boarding_date_year"] . "-" . $data["boarding_date_month"] . "-" . $data["boarding_date_day"];
        $data["agree_newsletter"] = (bool)array_get($data, "agree_newsletter", false);

        $data["holder_of_airline"] = implode(" ", $data["holder_of_airline"]);
        $data["motive_for_your_ticket"] = implode(" ", $data["motive_for_your_ticket"]);

        $data['Bangkok16b__c'] = true;
        $data['Applied_Date__c'] = date("Y-m-d");
        $data['company'] = 'bangkok16b'; // 固定値を入れる仕様


        $sfSrv = App::make(\Ana\SalesForceService::class);
        $sfSrv->init();
        $ret = $sfSrv->bangkok16bInsertLead($data);

        return $ret["success"];

    }

    /**
     * Pardotフォームハンドラエンドポイントに付加するパラメータを作る.
     * @param array $successLocationParameters
     * @param array $errorLocationParameters
     * @param array $request
     * @return string
     */
    private function getPardotFormHandlerEndpointParameter(
        $successLocationParameters = array(),
        $errorLocationParameters = array(),
        $request = array()
    ) {
        $successLocationQuery = '';
        $errorLocationQuery = '';

        $elms = array();
        foreach ($successLocationParameters as $k => $v) {
            //$elms[] = $k . '=' . $v;
            $elms[] = $k . '=' . rawurlencode($v);
        }
        if (!empty($elms)) {
            $successLocationQuery = '?' . implode('&', $elms);
        }

        $elms = array();
        foreach ($errorLocationParameters as $k => $v) {
            //$elms[] = $k . '=' . $v;
            $elms[] = $k . '=' . rawurlencode($v);
        }
        if (!empty($elms)) {
            $errorLocationQuery = '?' . implode('&', $elms);
        }

        $successLocation = 'https://' . $_SERVER['HTTP_HOST'] . '/bangkok16b/thankyou_/index.html' . $successLocationQuery;
        $errorLocation = 'https://' . $_SERVER['HTTP_HOST'] . '/bangkok16b/registration-error' . $errorLocationQuery;

        // @note: locationのクエリ文字列に空白を含む値を指定した場合、urlencodeしても引き渡されなかった
        $param = "?";
        $param .= "success_location=" . rawurlencode($successLocation);
        $param .= "&";
        $param .= "error_location=" . rawurlencode($errorLocation);
        return $param;
    }

    /**
     * 確認->pardotデータ投入用リダイレクト画面
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function thankyouPost(Request $request)
    {
		$handled = $this->beforeAction($request);
		if ($handled) {
			return $handled;
		}

        $handled = AnaRequest::forceSecureRequest();
        if ($handled) {
            return $handled;
        }
        $data = \Session::get("bankok16b_form", []);
        \Session::remove('bankok16b_form');
        $data = $this->filterCheckboxValue($data);

        // sf
        $sfRet = $this->saveSfData($data);
        if (!$sfRet) {
            throw new \Exception("failed to insert salesforce data.");
        }

        $endpoint = [
            "en" => "https://go.pardot.com/l/168252/2016-09-27/4pnth",
            "th" => "https://go.pardot.com/l/168252/2016-09-27/4pntk"
        ];

        // pardot
        $pardotData = [
            "pardotFormHandlerEndpoint" => array_get($endpoint, $this->language) . $this->getPardotFormHandlerEndpointParameter([]),
            "pardotDataList"            => [
                'email'                                                                  => $data['email'],
                'FirstName'                                                              => $data ['first_name'],
                'LastName'                                                               => $data['last_name'],
                'Reservation_number'                                                     => $data['reservation_number'],
                'Ticket_number'                                                          => "205-" . $data['eticket_number'],
                'DepartureDate'                                                          => $data["boarding_date_year"] . "-" . $data["boarding_date_month"] . "-" . $data["boarding_date_day"],
                'Gender'                                                                 => $data['gender'],
                'Age'                                                                    => $data['age'],
                'MobilePhone'                                                            => $data['mobile'],
                'Holder of airline frequent flyer program'                               => implode(" ", $data["holder_of_airline"]),
                'Motive for your ticket purchase through ANA website Thailand'           => implode(" ", $data["motive_for_your_ticket"]),
                'Motive for your ticket purchase through ANA website Thailand TEXT AREA' => $data['motive_for_your_ticket_text'],
                'Any suggestion or feedback about this campaign or ANA'                  => $data['any_suggestion'],
                'ENews'                                                                  => $data['agree_newsletter'],
                'Bangkok16b'                                                             => "1",
                'Applied Date'                                                           => date("Y-m-d"),
            ]
        ];

        return view('bangkok16b.pardot', $pardotData);
    }

    /**
     * pardot -> 完了画面
     * pardotからコールされる。
     *
     * @param Request $request
     * @return bool|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function thankyouGet(Request $request)
    {
		$handled = $this->beforeAction($request);
		if ($handled) {
			return $handled;
		}

        $handled = AnaRequest::forceSecureRequest();
        if ($handled) {
            return $handled;
        }

        $sSrv = App::make(\Ana\SessionService::class);

        // Facebook, Twitter以外のユーザーの直接アクセスの場合はトップへ戻す。
        if (!$sSrv->has(self::class, "input")) {
            if (!AnaRequest::isFacebookUserAgentAccess() && !AnaRequest::isTwitterUserAgentAccess()) {
                return redirect("/bangkok16b");
            }
        }

        $data = $request->all();

        $sSrv->clearSectionData(self::class);

        if ($this->language == "th") {
            return redirect('/bangkok16b/thai/thankyou/index.html');//view('bangkok16b.thankyou', $data);
        } else {
            return redirect('/bangkok16b/thankyou_/index.html');//view('bangkok16b.thankyou', $data);
        }
    }

    /**
     * pardotエラー画面
     * pardotからコールされる。
     *
     * @param Request $request
     * @throws \Exception
     */
    public function registrationErrorGet(Request $request)
    {
        throw new \Exception("raise pardot error. info=" . print_r($request->all(), true));
    }


    /**
     * バリデーション処理
     * @param Request $request
     * @return array
     */
    private function validationConfirm(Request $request)
    {
        $data = $request->toArray();
        // NRIC/FINの重複チェック
        Validator::extend('duplicate_ticket_number', function ($attribute, $value, $parameters, $validator) {
            $data = $validator->getData();
            $sfSrv = App::make(\Ana\SalesForceService::class);
            $sfSrv->init();
            $count = $sfSrv->bangkok16bGetLeadByTicketNumber($data);
            $ok = (0 == $count);
            return $ok;
        });
        Validator::extend('boarding_date', function ($attribute, $value, $parameters, $validator) {
            $data = $validator->getData();

            $year = $data["boarding_date_year"];
            $month = $data["boarding_date_month"];
            $day = $data["boarding_date_day"];
            if (!checkdate($month, $day, $year)) {
                return false;
            }
            $time = strtotime($year . "/" . $month . "/" . $day);
            $time_min = strtotime('2016/10/03');
            $time_max = strtotime('2017/3/31');
            if ($time < $time_min || $time > $time_max) {
                return false;
            }
            return true;
        });
        $rules = [
            'reservation_number'     => 'required|regex:/^(?=.*[0-9])(?=.*[A-Z])[A-Z0-9]{6}$/',
            'eticket_number'         => 'required|regex:/^[0-9]{10}$/|duplicate_ticket_number',
            'boarding_date_day'      => 'required|boarding_date',
            'boarding_date_month'    => 'required|boarding_date',
            'boarding_date_year'     => 'required|boarding_date',
            'gender'                 => 'required',
            'first_name'             => 'required',
            'last_name'              => 'required',
            'age'                    => 'required|integer|min:18',
            'mobile'                 => 'required|regex:/^[0-9]{10}$/',
            'email'                  => 'required|email',
            'email_confirm'          => 'required|same:email',
            'holder_of_airline'      => 'required',
            'motive_for_your_ticket' => 'required',
            'privacy'                => 'required',
        ];
        $messages = [
            'reservation_number.required'            => trans("messages.bangkok16b_form_error_name_reservation_number_required"),
            'reservation_number.regex'               => trans("messages.bangkok16b_form_error_name_reservation_number_regex"),
            'eticket_number.required'                => trans("messages.bangkok16b_form_error_name_eticket_number_required"),
            'eticket_number.regex'                   => trans("messages.bangkok16b_form_error_name_eticket_number_regex"),
            'eticket_number.duplicate_ticket_number' => trans("messages.bangkok16b_form_error_name_eticket_number_duplicate"),
            'boarding_date_day.required'             => trans("messages.bangkok16b_form_error_name_boarding_date_day_required"),
            'boarding_date_month.required'           => trans("messages.bangkok16b_form_error_name_boarding_date_month_required"),
            'boarding_date_year.required'            => trans("messages.bangkok16b_form_error_name_boarding_date_year_required"),
            'boarding_date_day.boarding_date'        => trans("messages.bangkok16b_form_error_name_boarding_date_day_boarding_date"),
            'boarding_date_month.boarding_date'      => trans("messages.bangkok16b_form_error_name_boarding_date_month_boarding_date"),
            'boarding_date_year.boarding_date'       => trans("messages.bangkok16b_form_error_name_boarding_date_year_boarding_date"),
            'gender.required'                        => trans("messages.bangkok16b_form_error_name_gender_required"),
            'first_name.required'                    => trans("messages.bangkok16b_form_error_name_first_name_required"),
            'last_name.required'                     => trans("messages.bangkok16b_form_error_name_last_name_required"),
            'age.required'                           => trans("messages.bangkok16b_form_error_name_age_required"),
            'age.integer'                            => trans("messages.bangkok16b_form_error_name_age_min"),
            'age.min'                                => trans("messages.bangkok16b_form_error_name_age_min"),
            'mobile.required'                        => trans("messages.bangkok16b_form_error_name_mobile_required"),
            'mobile.regex'                           => trans("messages.bangkok16b_form_error_name_mobile_regex"),
            'email.required'                         => trans("messages.bangkok16b_form_error_name_email_required"),
            'email.email'                            => trans("messages.bangkok16b_form_error_name_email_email"),
            'email_confirm.required'                 => trans("messages.bangkok16b_form_error_name_email_confirm_required"),
            'email_confirm.same'                     => trans("messages.bangkok16b_form_error_name_email_confirm_same"),
            'holder_of_airline.required'             => trans("messages.bangkok16b_form_error_name_holder_of_airline_required"),
            'motive_for_your_ticket.required'        => trans("messages.bangkok16b_form_error_name_motive_for_your_ticket_required"),
            'privacy.required'                       => trans("messages.bangkok16b_form_error_name_privacy_required"),
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
