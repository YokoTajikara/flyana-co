<?php
namespace App\Http\Controllers;

use Ana\SalesforceService;
use Ana\PageOpenStatusService;
use Ana\Logger;
use App\Http\AnaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Session;
use Crypt;
use App;
use Lang;

/**
 * 登録画面.
 */
class UsaEntryController extends Controller
{
	// 便名入力を削除した。SFやPardotは必須入力となっているためダミー値を入れる必要がある。
	private static $NO_REQUIRED_FLIGHT_NO = "NoRequired";

	/**
	 */
	public function __construct()
	{

	}

	/**
	 * 便名のパラメータに必須入力チェック回避用の固定値を入れる。
	 */
	private function setFlightNoParameter($data)
	{
		if (is_array($data)) {
			$data["FlightNo"] = self::$NO_REQUIRED_FLIGHT_NO;
			$data["FlightNoUSA"] = self::$NO_REQUIRED_FLIGHT_NO;
		}

		return $data;
	}

	/**
	 * ヴァリデーション処理を実行する。
	 */
	private function executeValidation($request)
	{
		// チケットナンバー重複チェック
		\Validator::extend('usaticket', function($attribute, $value, $parameters, $validator)
		{
			$data = $validator->getData();
			$sfSrv = App::make(\Ana\SalesForceService::class);
			$sfSrv->init();
			$count = $sfSrv->NaritaGetLeadByTicketNumber($data);
			$ok = (0 == $count);
			return $ok;
		});

		$rules = [
			'Reservation_number' => 'required|usaticket',
			'Sex' => 'required',
			'First_Name' => 'required|max:40|regex:/^[a-zA-Z0-9 =._]+$/',
			'Last_Name' => 'required|max:80|regex:/^[a-zA-Z0-9 =._]+$/',
			'Email' => 'required|email',
			'Email_confirm' => 'required|email|same:Email',
			'Country' => 'required',
			'Country_code' => 'required',
			'Tel' => 'required|regex:/^[0-9-]+$/|min:8',
			'Privacy' => 'required',
			'DepartureDateYear' => 'required',
			'DepartureDateMonth' => 'required|numeric|digits:2',
			'DepartureDateDay' => 'required|numeric|digits:2',
		];
		$messages = [
			"Reservation_number.usaticket" => trans("messages.usa_error_reservation_used"),
		];

		//return \Validator::make($request->all(), $rules);
		$validator = \Validator::make($request->all(), $rules, $messages);

		return $validator;
	}

	/**
	 * 予約コードがパラメータに含まれていなければ空文字を設定する。
	 */
	private function filteringReservationCode(&$params)
	{
		if (!isset($params["REC_LOC"])) {
			$params["REC_LOC"] = "";
		}
	}

	/**
	 * 初期値を設定する
	 */
	private function filterInitialParams($params = array(), $request = null)
	{
		if (!array_key_exists('E_newsletter', $params)) {
			$params['E_newsletter'] = true;
		}
/*
		if (!array_key_exists('Country', $params)) {
			if ($this->isPoForm($request)) {
				$params['Country'] = "";
			} else {
				$params['Country'] = "Hong kong";
			}
		}
*/
		return $params;
	}

	/**
	 * パラメータの調整.
	 */
	private function filterParams($params = array())
	{
		if (array_key_exists('language', $params)) {
			if ('jp' == $params['language']) {
				$params['fbLang'] = 'ja_JP';
			} else if ('en' == $params['language']) {
				$params['fbLang'] = 'en_US';
			}
		}
		if (!array_key_exists('AMC', $params)) {
			$params['AMC'] = '';
		}
		if (!array_key_exists('E_newsletter', $params)) {
			$params['E_newsletter'] = '';
		}
		return $params;
	}

	/**
	 * 公開状態を判定して、公開終了なら終了ページに遷移.
	 */
	private function filterClosedPage() {
		$pageSrv = new PageOpenStatusService();
		if ($pageSrv->isOpenAnausaCampaignEntry()) {
			return false;
		}

		$url = 'https://' . $_SERVER['HTTP_HOST'];
		return redirect($url);
	}

	public function inputJp(Request $request)
	{
		$handled = $this->filterClosedPage();
		if (false !== $handled) {
			return $handled;
		}
		$handled = AnaRequest::forceSecureRequest();
		if ($handled) {
			return $handled;
		}

		$params = $this->input($request,'jp');
		return view('usaentry.form', $params);


	}
	public function confirmJp(Request $request)
	{
		$handled = $this->filterClosedPage();
		if (false !== $handled) {
			return $handled;
		}
		$handled = AnaRequest::forceSecureRequest();
		if ($handled) {
			return $handled;
		}

		list($params,$error) = $this->confirm($request,'jp');
		if(isset($error)){
			return view('usaentry.form', $params)->withErrors($error);
		}

		return view('usaentry.confirm', $params);

	}
	public function completeJp(Request $request)
	{
		$handled = $this->filterClosedPage();
		if (false !== $handled) {
			return $handled;
		}
		$handled = AnaRequest::forceSecureRequest();
		if ($handled) {
			return $handled;
		}

		list($params,$error) = $this->complete($request,'jp');
		if(isset($error)){
			return view('usaentry.form', $params)->withErrors($error);
		}

		return view('usaentry.pardot', $params);

	}



	public function inputEn(Request $request)
	{
		$handled = $this->filterClosedPage();
		if (false !== $handled) {
			return $handled;
		}
		$handled = AnaRequest::forceSecureRequest();
		if ($handled) {
			return $handled;
		}

		$params = $this->input($request,'en');
		return view('usaentry.form', $params);


	}
	public function confirmEn(Request $request)
	{
		$handled = $this->filterClosedPage();
		if (false !== $handled) {
			return $handled;
		}
		$handled = AnaRequest::forceSecureRequest();
		if ($handled) {
			return $handled;
		}

		list($params,$error) = $this->confirm($request,'en');
		if(isset($error)){
			return view('usaentry.form', $params)->withErrors($error);
		}

		return view('usaentry.confirm', $params);

	}
	public function completeEn(Request $request)
	{
		$handled = $this->filterClosedPage();
		if (false !== $handled) {
			return $handled;
		}
		$handled = AnaRequest::forceSecureRequest();
		if ($handled) {
			return $handled;
		}

		list($params,$error) = $this->complete($request,'en');
		if(isset($error)){
			return view('usaentry.form', $params)->withErrors($error);
		}

		return view('usaentry.pardot', $params);

	}

	/**
	 * 入力画面を表示する。
	 */
	private function input(Request $request,$language)
	{

		$params = Input::all();


		$params["language"] = $language;

		if(!isset($language)){
			$url = 'https://' . $_SERVER['HTTP_HOST'];
			return redirect($url);

		}

		App::setLocale($language);

		// 修正ボタン押下時ではない
		if (!array_key_exists("back-btn", $params)) {
			$params = $this->filterInitialParams($params);
			$params = $this->filterParams($params);
			Input::merge($params);
		} else {
			$params = $this->filterParams($params);
		}

		$params["form_name"] = "form";

		$this->createYearList($params, $request);
		$this->createMonthList($params, $request);
		$this->createDayList($params, $request);
		$this->createSexList($params, $request);
		$this->createCountryList($params, $request);
//		$params['transPrefix'] = '-' . $params['origin'];
		return $params;
	}

	/**
	 * 入力画面からのアクション
	 */
	private function confirm(Request $request,$language)
	{

		$params = Input::all();
		$params = $this->filterParams($params);
		App::setLocale($language);

		$params = $this->filterParams($params);
		$params["form_name"] = "form";

		$this->createYearList($params, $request);
		$this->createMonthList($params, $request);
		$this->createDayList($params, $request);

		$this->createSexList($params, $request);
		$this->createCountryList($params, $request);
//		$params['transPrefix'] = '-' . $params['origin'];

		// 入力ミス内容を都度記録
		if (isset($params['key_check'])) {
			$keyCheckLog = "[[[ [key_check]: " . $params['key_check'] . " ]]]";
			Logger::logInfo($keyCheckLog);
		}

		$v = $this->executeValidation($request);
		if ($v->fails()) {
			//return view('usaentry.form', $params)->withErrors($v->errors());;
			return array($params, $v->errors());

		} else {
			if ($request->session()->has('coupon_code')) {
				$couponCode = $request->session()->get('coupon_code');
				//Logger::logInfo("confirm: get coupon-code from sesstion. coupon_code=" . $couponCode);
			} else {
				$couponCode = $this->getCouponCode($params["Reservation_number"], $params["language"], $this->getMarketType());
				if (empty($couponCode) || (false == $couponCode)) {
					//Logger::logInfo("confirm: failed to get coupon-code from sf. reservation_number=" . $params["Reservation_number"]);
					$params['usedReservationNumber'] = $params["Reservation_number"];
					return array($params,null);
				}
				$request->session()->put('coupon_code', $couponCode);
			}
			$params["coupon_code"] = $couponCode;
			return array($params,null);


		}
	}

	/**
	 * 確認画面からのアクション
	 */
	private function complete(Request $request,$language)
	{
		$params = Input::all();
		$params = $this->filterParams($params);
		App::setLocale($language);

		$params = $this->setFlightNoParameter($params);

		$params = $this->filterParams($params);
		$params["form_name"] = "form";

		$this->createYearList($params, $request);
		$this->createMonthList($params, $request);
		$this->createDayList($params, $request);

		$this->createSexList($params, $request);
		$this->createCountryList($params, $request);

		$v = $this->executeValidation($request);
		if ($v->fails()) {
			//return view('usaentry.form', $params)->withErrors($v->errors());
			return array($params, $v->errors());
		} else {
			$params['pardotFormHandlerEndpoint'] = $this->getPardotFormHandlerEndpoint($request)
				. $this->getPardotFormHandlerEndpointParameter(array(), array(), $request);
			$request->session()->put('coupon_code', $params['coupon_code']);
			$request->session()->put('language', $params['language']);
//			$request->session()->put('origin', $params['origin']);


			$params = $this->filterSFParams($params, $request);

			//Logger::logInfo('complete: call insert lead data. params=' . print_r($params, true));
			$this->insertLeadData($params, $request);
			//Logger::logInfo('complete: success insert lead data. params=' . print_r($params, true));

			$params = $this->filterPardotParams($params);
			//Logger::logInfo('complete: call pardot request view. params=' . print_r($params, true));
			return array($params,null);

		}
	}

	/**
	 * 完了画面を表示する。
	 */
	public function thanks(Request $request)
	{

		if (!$request->session()->has('coupon_code') || !$request->session()->has('language')) {
			//Logger::logInfo('thanks: not has session value');
			return redirect('https://' . $_SERVER['HTTP_HOST'] . '/anausa/');
		}

		//Logger::logInfo("thanks: called thanks. session=" . print_r($request->session()->all(), true));

		$sessionParams = array();
		$sessionParams['coupon_code'] = $request->session()->get('coupon_code');
		$sessionParams['language'] = $request->session()->get('language');
//		$sessionParams['origin'] = $request->session()->get('origin');
		$request->session()->clear();

		App::setLocale($sessionParams["language"]);

		//Logger::logInfo("complete: sessino=" . print_r($sessionParams, true));

		$params = Input::all();
		$params = array_merge($params, $sessionParams);
		$params = $this->filterParams($params);
//		$params['transPrefix'] = '-' . $sessionParams['origin'];
		$params['entryFormLanguage'] = 'en'; // en固定

		$params['nextFormAction'] = (env('APP_ENV', '') == 'production')
			? 'https://visionglobalwifi.com/' . $params['entryFormLanguage'] . '/application/order'
			: 'https://stg.visionglobalwifi.com/' . $params['entryFormLanguage'] . '/application/order';

		return view('usaentry.thanks', $params);
	}

	/**
	 * pardotエラー処理受付先URL。
	 *
	 * エラー時のパラメータに個人情報が載るので、一旦受け取ってからリダイレクトしてURLのパラメータを空にする
	 */
	public function pardoterror(Request $request)
	{
		$handled = $this->filterClosedPage();
		if (false !== $handled) {
			return $handled;
		}
		//Logger::logInfo("pardoterror: " . print_r(Input::all(), true));
		$name = 'error';
		$params = Input::all();
		$params = $this->filterParams($params);
		return redirect('https://' . $_SERVER['HTTP_HOST'] . '/anausa/' . $name . '?language=' . $params['language']);
	}

	/**
	 * エラー画面を表示する。
	 */
	public function error(Request $request)
	{
		$handled = $this->filterClosedPage();
		if (false !== $handled) {
			return $handled;
		}
		$msg = "pardot error.";
		$msg .= " session=" . print_r($request->session()->all(), true);
		$request->session()->clear();

		throw new \Exception($msg);
	}

	/**
	 * 出発日リストを生成してセットする。
	 */
	private function createYearList(&$data, $request = null)
	{
		/*$data["yearList"][''] = Lang::get('messages.placeholder_departure-date-year');
		$data["yearList"]['2016'] = '2016'; */
		$data["yearList"]['2017'] = '2017';
	}

	/**
	 * 出発日リストを生成してセットする。
	 */
	private function createMonthList(&$data, $request = null)
	{
		$data["monthList"][''] = Lang::get('messages.placeholder_departure-date-month');

		if($data["language"]=='jp'){
			for ($i = 1; $i <= 12; $i++) {
				$data["monthList"][sprintf('%02d', $i)] = "{$i}";
			}

		}else{
			$data["monthList"]["01"] = "Jan";
			$data["monthList"]["02"] = "Feb";
			$data["monthList"]["03"] = "Mar";
			$data["monthList"]["04"] = "Apr";
			$data["monthList"]["05"] = "May";
			$data["monthList"]["06"] = "Jun";
			$data["monthList"]["07"] = "Jul";
			$data["monthList"]["08"] = "Aug";
			$data["monthList"]["09"] = "Sep";
			$data["monthList"]["10"] = "Oct";
			$data["monthList"]["11"] = "Nov";
			$data["monthList"]["12"] = "Dec";
		}
	}
	/**
	 * 出発日リストを生成してセットする。
	 */
	private function createDayList(&$data, $request = null)
	{
		$data["dayList"][''] = Lang::get("messages.placeholder_departure-date-day");
		for ($i = 1; $i <= 31; $i++) {
			$data["dayList"][sprintf('%02d', $i)] = "{$i}";
		}
	}

	/**
	 * 性別リストを生成してセットする。
	 */
	private function createSexList(&$data, $request = null)
	{
		$data["sexList"] = null;
		if ('en' == $this->getLangType($request)) {
			$data["sexList"] = array(
				'' => 'Please select',
				'Male' => 'Male',
				'Female' => 'Female',
			);
		} else if ('jp' == $this->getLangType($request)) {
			$data["sexList"] = array(
				'' => '選択してください',
				'Male' => '男性',
				'Female' => '女性',
			);
		}
	}

	/**
	 * 敬称リストを生成してセットする。
	 */
	private function createSalutationList($request = null)
	{
		$list = array();
		if ('en' == $this->getLangType($request)) {
			$list = array(
				'Male' => 'Mr.',
				'Female' => 'Ms.',
			);
		} else if ('jp' == $this->getLangType($request)) {
			$list = array(
				'Male' => '男性',
				'Female' => '女性',
			);
		}
		return $list;
	}

	/**
	 * 居住国リストを生成してセットする。
	 */
	private function createCountryList(&$data, $request = null)
	{
		$selectWord = '選択してください';
		if ('en' == $this->getLangType($request)) {
			$selectWord = 'Please select';
		} else if ('jp' == $this->getLangType($request)) {
			$selectWord = '選択してください';
		}
		$data["countryList"] = array(
			'' => $selectWord,
			'Indonesia' => 'Indonesia',
			'Malaysia' => 'Malaysia',
			'Philippine' => 'Philippines',
			'Singapore' => 'Singapore',
			'Thailand' => 'Thailand',
			'Vietnam' => 'Vietnam',
			);
	}
	/**
	 * Lead登録.
	 */
	private function insertLeadData($args)
	{
		$sfSrv = new SalesforceService(array('debug' => env('SF_DEBUG')));
		if (!$sfSrv->init()) {
			throw new \Exception("failed to initialize safesforceservice. args=" . print_r($args, true));
		}
		$args['DepartureDate'] = $args['DepartureDateYear'] . '-' . $args['DepartureDateMonth'] . '-' . $args['DepartureDateDay'];
		$result = $sfSrv->NaritainsertLead($args);
		return $result;
	}

	/**
	 * Salesforceへ渡すパラメータに調整する
	 */
	private function filterSFParams($params, $request=null)
	{
		$params['status'] = 'New'; // 固定値を入れる仕様
		$params['Company'] = 'ANAUSA'; // 固定値を入れる仕様

		$tmp = str_replace('+', '', $params['Country_code']);
		$params['Country_code'] = $tmp;

//		$tmp = $params['origin'] == 'am' ? 'Actualized Market' : 'Potential Market';
		$params['origin'] = 'ANAUSA';

		$params['X2016_ANAUSA'] = true;
		$params['Applied_Date'] = date('Y-m-d');

		$tmp = '';
		if ($params['language'] == 'jp') {
			$tmp = 'Japanese';
		} else if ($params['language'] == 'en') {
			$tmp = 'English';
		}
		$params['language'] = $tmp;

		if (empty($params['AMC'])) {
			$params['AMC'] = false;
		}
		if (empty($params['E_newsletter'])) {
			$params['E_newsletter'] = false;
		}

		$salList = $this->createSalutationList($request);
		if (!array_key_exists($params['Sex'], $salList)) {
			throw new \Exception("filterSFParams: parameter:Sex is not set.");
		}
		$params['Salutation_for_email'] = $salList[$params['Sex']];

		return $params;
	}

	/**
	 * Pardotへ渡すパラメータに調整する
	 */
	private function filterPardotParams($params, $request=null)
	{
		if (empty($params['AMC'])) {
			$params['AMC'] = 'false';
		}
		if (empty($params['E_newsletter'])) {
			$params['E_newsletter'] = 'false';
		}

		$salList = $this->createSalutationList($request);
		if (!array_key_exists($params['Sex'], $salList)) {
			throw new \Exception("filterPardotParams: parameter:Sex is not set.");
		}
		$params['Salutation_for_email'] = $salList[$params['Sex']];

		return $params;
	}

	/**
	 * クーポンコードを取得.
	 */
	private function getCouponCode($reservationNumber, $country, $market)
	{
		$sfSrv = new SalesforceService(array('debug' => env('SF_DEBUG')));
		if (!$sfSrv->init()) {
			throw new \Exception("failed to initialize safesforceservice.");
		}

		$code = $sfSrv->getCouponCode($country, $reservationNumber, $market);
		return $code;
	}

	/**
	 * Pardotフォームハンドラエンドポイントに付加するパラメータを作る.
	 */
	private function getPardotFormHandlerEndpointParameter($successLocationParameters = array(),
														   $errorLocationParameters = array(), $request=array())
	{
		$successLocationQuery = '';
		$errorLocationQuery = '';

		$elms = array();
		foreach ($successLocationParameters as $k => $v) {
			$elms[] = $k . '=' . $v;
		}
		if (!empty($elms)) {
			$successLocationQuery = '?' . implode('&', $elms);
		}

		$elms = array();
		foreach ($errorLocationParameters as $k => $v) {
			$elms[] = $k . '=' . $v;
		}
		if (!empty($elms)) {
			$errorLocationQuery = '?' . implode('&', $elms);
		}

		$successLocation = 'https://' . $_SERVER['HTTP_HOST'] . '/anausa/thankyou' . $successLocationQuery;
		$errorLocation = 'https://' . $_SERVER['HTTP_HOST'] . '/anausa/pardoterror' . $errorLocationQuery;

		$param = "?";
		$param .= "success_location=" . urlencode($successLocation);
		$param .= "&";
		$param .= "error_location=" . urlencode($errorLocation);
		return $param;
	}

	/**
	 * -poフォームかどうかを取得.

	private function isPoForm($request=null)
	{
		$r = (false !== strstr($_SERVER["REQUEST_URI"], 'form-po'));
		if ($r) {
			return $r;
		}

		$params = Input::all();
		if (!is_null($request)) {
			if ($request->session()->has('origin')) {
				$params['origin'] = $request->session()->get('origin');
			}
		}
		if (!array_key_exists('origin', $params)) {
			return $r;
		}
		if ($params['origin'] == 'am') {
			$r = false;
		} else if ($params['origin'] == 'pm') {
			$r = true;
		}

		return $r;
	}
	 */
	/**
	 * マーケットタイプ
	 */
	private function getMarketType($request=null)
	{
		$market = 'narita';
		return $market;
	}

	/**
	 * 言語タイプを返す
	 */
	private function getLangType($request=null)
	{
		$params = Input::all();
		if (!is_null($request)) {
			if ($request->session()->has('language')) {
				$params['language'] = $request->session()->get('language');
			}
		}
		if (!array_key_exists('language', $params)) {
			return false;
		}
		return $params['language'];
	}

	/**
	 * pardotのフォームハンドラエンドポイントを返す
	 */
	private function getPardotFormHandlerEndpoint($request=null)
	{
		$lang = $this->getLangType($request);
		$endpoint = '';

		if ('jp' === $lang) {
			//$endpoint = 'https://pi.ana-campaign.com/l/168252/2016-03-30/2ck';
			$endpoint = 'https://go.pardot.com/l/168252/2016-11-06/56p25';

		} else if ('en' === $lang) {
			//$endpoint = 'https://pi.ana-campaign.com/l/168252/2016-04-19/7gr';
			$endpoint = 'https://go.pardot.com/l/168252/2016-11-06/56p21';
		}

		return $endpoint;
	}

}
