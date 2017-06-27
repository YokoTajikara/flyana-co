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
class EntryController extends Controller
{
	/**
	 */
	public function __construct()
	{
	}

	/**
	 * ヴァリデーション処理を実行する。
	 */
	private function executeValidation($request)
	{
		$rules = [
			'Reservation_number' => 'required',
			'Sex' => 'required',
			'First_Name' => 'required',
			'Last_Name' => 'required',
			'Email' => 'required|email',
			'Email_confirm' => 'required|email|same:Email',
			'Country' => 'required',
			'Country_code' => 'required',
			'Tel' => 'required',
			'Privacy' => 'required',
			'FlightNo' => 'required',
			'DepartureDateYear' => 'required',
			'DepartureDateMonth' => 'required|numeric|digits:2',
			'DepartureDateDay' => 'required|numeric|digits:2',
		];

		return \Validator::make($request->all(), $rules);
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
	 * 顕在マーケット向けHOME画面(日本語)を表示する。
	 */
	public function indexJpAm()
	{
		$handled = AnaRequest::forceSecureRequest();
		if ($handled) {
			return $handled;
		}

		App::setLocale("jp");

		$params = Input::all();

		$params["language"] = "jp";
		$params["origin"] = "am";
		$params["form_name"] = "form";
		$this->filteringReservationCode($params);
		$params = $this->filterParams($params);

		$pageSrv = new PageOpenStatusService();
		$params["isClosed"] = (false == $pageSrv->isOpenNinjaWifiCampaignEntry());
		return view('home.jp-am', $params);
	}

	/**
	 * 顕在マーケット向けHOME画面(英語)を表示する。
	 */
	public function indexEnAm()
	{
		$handled = AnaRequest::forceSecureRequest();
		if ($handled) {
			return $handled;
		}

		App::setLocale("en");

		$params = Input::all();

		$params["language"] = "en";
		$params["origin"] = "am";
		$params["form_name"] = "form";
		$this->filteringReservationCode($params);
		$params = $this->filterParams($params);

		$pageSrv = new PageOpenStatusService();
		$params["isClosed"] = (false == $pageSrv->isOpenNinjaWifiCampaignEntry());
		return view('home.en-am', $params);
	
	}

	/**
	 * 顕在マーケット向けHOME画面(中国語)を表示する。
	 */
	public function indexHkAm()
	{
		$handled = AnaRequest::forceSecureRequest();
		if ($handled) {
			return $handled;
		}

		$params = Input::all();

		$params["language"] = "hk";
		$params["origin"] = "am";
		$params["form_name"] = "form";
		$this->filteringReservationCode($params);
		$params = $this->filterParams($params);

		$pageSrv = new PageOpenStatusService();
		$params["isClosed"] = (false == $pageSrv->isOpenNinjaWifiCampaignEntry());
		return view('home.hk-am', $params);
	}

	/**
	 * 潜在マーケット向けHOME画面(日本語)を表示する。
	 */
	public function indexJpPm()
	{
		$handled = AnaRequest::forceSecureRequest();
		if ($handled) {
			return $handled;
		}

		$params = Input::all();

		$params["language"] = "jp";
		$params["origin"] = "pm";
		$params["form_name"] = "form-po";
		$this->filteringReservationCode($params);
		$params = $this->filterParams($params);

		$pageSrv = new PageOpenStatusService();
		$params["isClosed"] = (false == $pageSrv->isOpenNinjaWifiCampaignEntry());
		return view('home.jp-pm', $params);
	}

	/**
	 * 潜在マーケット向けHOME画面(英語)を表示する。
	 */
	public function indexEnPm()
	{
		$handled = AnaRequest::forceSecureRequest();
		if ($handled) {
			return $handled;
		}

		$params = Input::all();

		$params["language"] = "en";
		$params["origin"] = "pm";
		$params["form_name"] = "form-po";
		$this->filteringReservationCode($params);
		$params = $this->filterParams($params);

		$pageSrv = new PageOpenStatusService();
		$params["isClosed"] = (false == $pageSrv->isOpenNinjaWifiCampaignEntry());
		return view('home.en-pm', $params);
	}

	/**
	 * 潜在マーケット向けHOME画面(タイ語)を表示する。
	 */
	public function indexThPm()
	{
		$handled = AnaRequest::forceSecureRequest();
		if ($handled) {
			return $handled;
		}

		$params = Input::all();

		$params["language"] = "th";
		$params["origin"] = "pm";
		$params["form_name"] = "form-po";
		$this->filteringReservationCode($params);
		$params = $this->filterParams($params);

		$pageSrv = new PageOpenStatusService();
		$params["isClosed"] = (false == $pageSrv->isOpenNinjaWifiCampaignEntry());
		return view('home.th-pm', $params);
	}

	/**
	 * 初期値を設定する
	 */
	private function filterInitialParams($params = array(), $request = null)
	{
		if (!array_key_exists('E_newsletter', $params)) {
			$params['E_newsletter'] = true;
		}
		if (!array_key_exists('Country', $params)) {
			if ($this->isPoForm($request)) {
				$params['Country'] = "";
			} else {
				$params['Country'] = "Hong kong";
			}
		}
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
			} else if ('th' == $params['language']) {
				$params['fbLang'] = 'th_TH';
			} else if ('hk' == $params['language']) {
				$params['fbLang'] = 'zh_HK';
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
		if ($pageSrv->isOpenNinjaWifiCampaignEntry()) {
			return false;
		}
		
		$url = 'https://' . $_SERVER['HTTP_HOST'];
		return redirect($url);
	}

	/**
	 * 入力画面を表示する。
	 */
	public function input(Request $request)
	{
		$handled = $this->filterClosedPage();
		if (false !== $handled) {
			return $handled;
		}
		$handled = AnaRequest::forceSecureRequest();
		if ($handled) {
			return $handled;
		}

		$params = Input::all();
		App::setLocale($params["language"]);

		// 修正ボタン押下時ではない
		if (!array_key_exists("back-btn", $params)) {
			$params = $this->filterInitialParams($params);
			$params = $this->filterParams($params);
			Input::merge($params);
		} else {
			$params = $this->filterParams($params);
		}

		if ($this->isPoForm($request)) {
			$params["form_name"] = "form-po";
		} else {
			$params["form_name"] = "form";
		}

		$this->createYearList($params, $request);
		$this->createSexList($params, $request);
		$this->createCountryList($params, $request);
		$params['transPrefix'] = '-' . $params['origin'];
		
		return view('entry.form', $params);
	}

	/**
	 * 入力画面からのアクション
	 */
	public function confirm(Request $request)
	{
		$handled = $this->filterClosedPage();
		if (false !== $handled) {
			return $handled;
		}
		$handled = AnaRequest::forceSecureRequest();
		if ($handled) {
			return $handled;
		}

		$params = Input::all();
		$params = $this->filterParams($params);
		App::setLocale($params["language"]);

		$params = $this->filterParams($params);

		$this->createYearList($params, $request);
		$this->createSexList($params, $request);
		$this->createCountryList($params, $request);
		$params['transPrefix'] = '-' . $params['origin'];

		$v = $this->executeValidation($request);
		if ($v->fails()) {
			return view('entry.form', $params)->withErrors($v->errors());;
		} else {
			if ($request->session()->has('coupon_code')) {
				$couponCode = $request->session()->get('coupon_code');
				//Logger::logInfo("confirm: get coupon-code from sesstion. coupon_code=" . $couponCode);
			} else {
				$couponCode = $this->getCouponCode($params["Reservation_number"], $params["language"], $this->getMarketType());
				if (empty($couponCode) || (false == $couponCode)) {
					//Logger::logInfo("confirm: failed to get coupon-code from sf. reservation_number=" . $params["Reservation_number"]);
					$params['usedReservationNumber'] = $params["Reservation_number"];
					return view('entry.form', $params);
				}
				$request->session()->put('coupon_code', $couponCode);
			}
			$params["coupon_code"] = $couponCode;

			return view('entry.confirm', $params);
		}
	}

	/**
	 * 確認画面からのアクション
	 */
	public function complete(Request $request)
	{
		$handled = $this->filterClosedPage();
		if (false !== $handled) {
			return $handled;
		}
		$handled = AnaRequest::forceSecureRequest();
		if ($handled) {
			return $handled;
		}

		$params = Input::all();
		$params = $this->filterParams($params);
		App::setLocale($params["language"]);

		$params = $this->filterParams($params);

		$this->createYearList($params, $request);
		$this->createSexList($params, $request);
		$this->createCountryList($params, $request);

		$v = $this->executeValidation($request);
		if ($v->fails()) {
			return view('entry.form', $params)->withErrors($v->errors());;
		} else {
			$params['pardotFormHandlerEndpoint'] = $this->getPardotFormHandlerEndpoint($request)
				. $this->getPardotFormHandlerEndpointParameter(array(), array(), $request);
			$request->session()->put('coupon_code', $params['coupon_code']);
			$request->session()->put('language', $params['language']);
			$request->session()->put('origin', $params['origin']);

			$params = $this->filterSFParams($params, $request);
			//Logger::logInfo('complete: call insert lead data. params=' . print_r($params, true));
			$this->insertLeadData($params, $request);
			//Logger::logInfo('complete: success insert lead data. params=' . print_r($params, true));

			$params = $this->filterPardotParams($params);
			//Logger::logInfo('complete: call pardot request view. params=' . print_r($params, true));
			return view('entry.pardot', $params);
		}
	}

	/**
	 * 完了画面を表示する。
	 */
	public function thanks(Request $request)
	{
		$handled = $this->filterClosedPage();
		if (false !== $handled) {
			return $handled;
		}
		$handled = AnaRequest::forceSecureRequest();
		if ($handled) {
			return $handled;
		}

		if (!$request->session()->has('coupon_code') || !$request->session()->has('language')) {
			//Logger::logInfo('thanks: not has session value');
			return redirect('https://' . $_SERVER['HTTP_HOST'] . '/ninjawifi/');
		}

		//Logger::logInfo("thanks: called thanks. session=" . print_r($request->session()->all(), true));

		$sessionParams = array();
		$sessionParams['coupon_code'] = $request->session()->get('coupon_code');
		$sessionParams['language'] = $request->session()->get('language');
		$sessionParams['origin'] = $request->session()->get('origin');
		$request->session()->clear();

		App::setLocale($sessionParams["language"]);

		//Logger::logInfo("complete: sessino=" . print_r($sessionParams, true));

		$params = Input::all();
		$params = array_merge($params, $sessionParams);
		$params = $this->filterParams($params);
		$params['transPrefix'] = '-' . $sessionParams['origin'];
		$params['entryFormLanguage'] = 'jp';
		if ('hk' == $sessionParams['language']) {
			$params['entryFormLanguage'] = 'tw';
		} else if (('en' == $sessionParams['language']) || ('th' == $sessionParams['language'])) {
			$params['entryFormLanguage'] = 'en';
		}
		return view('entry.thanks', $params);
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
		$name = $this->isPoForm($request) ? 'error-po' : 'error';
		$params = Input::all();
		$params = $this->filterParams($params);
		return redirect('https://' . $_SERVER['HTTP_HOST'] . '/ninjawifi/' . $name . '?language=' . $params['language']);
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
		$data["yearList"][''] = Lang::get('messages.placeholder_departure-date-year');
		$data["yearList"]['2016'] = '2016';
		$data["yearList"]['2017'] = '2017';
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
		} else if ('th' == $this->getLangType($request)) {
			$data["sexList"] = array(
				'' => 'โปรดเลือก',
				'Male' => 'ชาย',
				'Female' => 'หญิง',
			);
		} else if ('jp' == $this->getLangType($request)) {
			$data["sexList"] = array(
				'' => '選択してください',
				'Male' => '男性',
				'Female' => '女性',
			);
		} else if ('hk' == $this->getLangType($request)) {
			$data["sexList"] = array(
				'' => '請選擇',
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
		} else if ('th' == $this->getLangType($request)) {
			$list = array(
				'Male' => 'ชาย',
				'Female' => 'หญิง',
			);
		} else if ('jp' == $this->getLangType($request)) {
			$list = array(
				'Male' => '男性',
				'Female' => '女性',
			);
		} else if ('hk' == $this->getLangType($request)) {
			$list = array(
				'Male' => '先生',
				'Female' => '女士',
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
		} else if ('th' == $this->getLangType($request)) {
			$selectWord = 'โปรดเลือก ประเทศที่พำนัก';
		} else if ('jp' == $this->getLangType($request)) {
			$selectWord = '選択してください';
		} else if ('hk' == $this->getLangType($request)) {
			$selectWord = '請選擇';
		}
		$data["countryList"] = ($this->isPoForm($request))
			? array(
				'' => $selectWord,
				'Australia' => 'Australia',
				'India' => 'India',
				'Indonesia' => 'Indonesia',
				'Thailand' => 'Thailand',
				'Malaysia' => 'Malaysia',
				'Myanmar' => 'Myanmar',
				'Philippine' => 'Philippines',
				'Singapore' => 'Singapore',
				'Vietnam' => 'Vietnam',
			)
			: array(
				'' => $selectWord,
				'Hong kong' => 'Hong kong',
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
		$result = $sfSrv->insertLead($args);
		return $result;
	}

	/**
	 * Salesforceへ渡すパラメータに調整する
	 */
	private function filterSFParams($params, $request=null)
	{
		$params['status'] = 'New'; // 固定値を入れる仕様
		$params['Company'] = '1stNinjaWifi2016'; // 固定値を入れる仕様

		$tmp = str_replace('+', '', $params['Country_code']);
		$params['Country_code'] = $tmp;

		$tmp = $params['origin'] == 'am' ? 'Actualized Market' : 'Potential Market';
		$params['origin'] = $tmp;

		$tmp = '';
		if ($params['language'] == 'jp') {
			$tmp = 'Japanese';
		} else if ($params['language'] == 'en') {
			$tmp = 'English';
		} else if ($params['language'] == 'th') {
			$tmp = 'Thai';
		} else if ($params['language'] == 'hk') {
			$tmp = 'HK-Chinese';
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

		$successLocation = 'https://' . $_SERVER['HTTP_HOST'] . '/ninjawifi/' . ($this->isPoForm($request) ? 'thanks-po' :
				'thanks') . $successLocationQuery;
		$errorLocation = 'https://' . $_SERVER['HTTP_HOST'] . '/ninjawifi/' . ($this->isPoForm($request) ? 'pardoterror-po'
				: 'pardoterror') . $errorLocationQuery;

		$param = "?";
		$param .= "success_location=" . urlencode($successLocation);
		$param .= "&";
		$param .= "error_location=" . urlencode($errorLocation);
		return $param;
	}

	/**
	 * -poフォームかどうかを取得.
	 */
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

	/**
	 * マーケットタイプ
	 */
	private function getMarketType($request=null)
	{
		$market = $this->isPoForm($request) ? 'pm' : 'am';
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
		$market = $this->getMarketType();
		$lang = $this->getLangType($request);
		$endpoint = '';

		if ('am' === $market) {
			if ('jp' === $lang) {
				$endpoint = 'https://pi.ana-campaign.com/l/168252/2016-03-30/2ck';
			} else if ('en' === $lang) {
				$endpoint = 'https://pi.ana-campaign.com/l/168252/2016-04-19/7gr';
			} else if ('hk' === $lang) {
				$endpoint = 'https://pi.ana-campaign.com/l/168252/2016-04-19/7gw';
			}
		} else if ('pm' === $market) {
			if ('jp' === $lang) {
				$endpoint = 'https://pi.ana-campaign.com/l/168252/2016-04-19/7gp';
			} else if ('en' === $lang) {
				$endpoint = 'https://pi.ana-campaign.com/l/168252/2016-04-19/7gt';
			} else if ('th' === $lang) {
				$endpoint = 'https://pi.ana-campaign.com/l/168252/2016-04-19/7gy';
			}
		}

		return $endpoint;
	}

}
