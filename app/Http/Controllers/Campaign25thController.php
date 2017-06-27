<?php
namespace App\Http\Controllers;

use App;
use App\Http\AnaRequest;
use Crypt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Lang;
use Session;
use Ana\PageOpenStatusService;

/**
 * 登録画面.
 */
class Campaign25thController extends Controller
{
	private $nameTitleList = [];
	private $genderList = [];
	private $yearList = [];
	private $monthList = [];
	private $dayList = [];

	private $naDestinationList = [];

	private $japanDestinationGroupList = [];
	private $japanDestinationList = [];

	private $destinationOgpImageMap = [];
	private $destinationTwitterImageMap = [];

	/**
	 */
	public function __construct()
	{
		App::setLocale("en");

		$this->nameTitleList = [
			"" => Lang::get("messages.s25_form_option_select_empty"),
			"Mr" => "Mr",
			"Miss" => "Miss",
			"Mrs" => "Mrs",
			"Madam" => "Madam",
		];

		$this->genderList = [
			"" => Lang::get("messages.s25_form_option_select_empty"),
			"Male" => "Male",
			"Female" => "Female"
		];
		$this->yearList = [];
		$this->yearList[""] = Lang::get("messages.s25_form_birth_date_year_option_select_empty");
		for ($i = 1900; $i <= 1998; $i++) {
			$this->yearList["{$i}"] = "{$i}";
		}
		$this->monthList = [];
		$this->monthList[""] = Lang::get("messages.s25_form_birth_date_month_option_select_empty");
		$this->monthList["1"] = "Jan";
		$this->monthList["2"] = "Feb";
		$this->monthList["3"] = "Mar";
		$this->monthList["4"] = "Apr";
		$this->monthList["5"] = "May";
		$this->monthList["6"] = "Jun";
		$this->monthList["7"] = "Jul";
		$this->monthList["8"] = "Aug";
		$this->monthList["9"] = "Sep";
		$this->monthList["10"] = "Oct";
		$this->monthList["11"] = "Nov";
		$this->monthList["12"] = "Dec";

		$this->dayList = [];
		$this->dayList[""] = Lang::get("messages.s25_form_birth_date_day_option_select_empty");
		for ($i = 1; $i <= 31; $i++) {
			$this->dayList["{$i}"] = "{$i}";
		}

		// value => label
		$this->naDestinationList = [
			"CHICAGO" => "CHICAGO",
			"HONOLULU" => "HONOLULU",
			"HOUSTON" => "HOUSTON",
			"LOSANGELES" => "LOS ANGELES",
			"NEWYORK" => "NEW YORK",
			"SANFRANCISCO" => "SAN FRANCISCO",
			"SANJOSE" => "SAN JOSE",
			"SEATTLE" => "SEATTLE",
			"VANCOUVER" => "VANCOUVER",
			"WASHINGTON_DC" => "WASHINGTON D.C.",
		];
		$this->japanDestinationGroupList = [
			"CHUGOKU_SHIKOKU" => "CHUGOKU/SHIKOKU",
			"HOKKAIDO" => "HOKKAIDO",
			"KYUSHU" => "KYUSHU",
			"NAGOYA" => "NAGOYA",
			"OKINAWA" => "OKINAWA",
			"OSAKA" => "OSAKA",
			"TOHOKU_HOKURIKU" => "TOHOKU/HOKURIKU",
			"TOKYO" => "TOKYO",
		];
		$this->japanDestinationList = [];
		$this->japanDestinationList["CHUGOKU_SHIKOKU"] = [
			"HAGIIWAMI" => "HAGI IWAMI",
			"HIROSHIMA" => "HIROSHIMA",
			"IWAKUNI" => "IWAKUNI",
			"KOCHI" => "KOCHI",
			"MATSUYAMA" => "MATSUYAMA",
			"OKAYAMA" => "OKAYAMA",
			"TAKAMATSU" => "TAKAMATSU",
			"TOKUSHIMA" => "TOKUSHIMA",
			"TOTTORI" => "TOTTORI",
			"YAMAGUCHI_UBE" => "YAMAGUCHI UBE",
			"YONAGO" => "YONAGO",
		];
		$this->japanDestinationList["HOKKAIDO"] = [
			"ASAHIKAWA" => "ASAHIKAWA",
			"HAKODATE" => "HAKODATE",
			"KUSHIRO" => "KUSHIRO",
			"MEMANBETSU" => "MEMANBETSU",
			"NAKASHIBETSU" => "NAKASHIBETSU",
			"OBIHIRO" => "OBIHIRO",
			"OKHOTSKMONBETSU" => "OKHOTSK MONBETSU",
			"SAPPORO" => "SAPPORO",
			"WAKKANAI" => "WAKKANAI",
		];
		$this->japanDestinationList["KYUSHU"] = [
			"FUKUOKA" => "FUKUOKA",
			"KAGOSHIMA" => "KAGOSHIMA",
			"KITAKYUSHU" => "KITAKYUSHU",
			"KUMAMOTO" => "KUMAMOTO",
			"MIYAZAKI" => "MIYAZAKI",
			"NAGASAKI" => "NAGASAKI",
			"OITA" => "OITA",
			"SAGA" => "SAGA",
		];
		$this->japanDestinationList["NAGOYA"] = [
			"NAGOYA" => "NAGOYA",
		];
		$this->japanDestinationList["OKINAWA"] = [
			"ISHIGAKI" => "ISHIGAKI",
			"MIYAKO" => "MIYAKO",
			"OKINAWA_NAHA" => "OKINAWA(NAHA)",
		];
		$this->japanDestinationList["OSAKA"] = [
			"OSAKA" => "OSAKA",
		];
		$this->japanDestinationList["TOHOKU_HOKURIKU"] = [
			"AKITA" => "AKITA",
			"KOMATSU" => "KOMATSU",
			"NOTO" => "NOTO",
			"ODATE_NOSHIRO" => "ODATE NOSHIRO",
			"SHONAI" => "SHONAI",
			"TOYAMA" => "TOYAMA",
		];
		$this->japanDestinationList["TOKYO"] = [
			"HACHIJOJIMA" => "HACHIJOJIMA",
			"TOKYO_HANEDA_NARITA" => "TOKYO(HANEDA/NARITA)",
		];

		$this->destinationOgpImageMap = [
			// ja
			"HAGIIWAMI" => "ogp-banner_1200x620_jp26_haji-iwami.jpg",
			"HIROSHIMA" => "ogp-banner_1200x620_jp21_hiroshima.jpg",
			"IWAKUNI" => "ogp-banner_1200x620_jp22_iwakuni.jpg",
			"KOCHI" => "ogp-banner_1200x620_jp30_kochi.jpg",
			"MATSUYAMA" => "ogp-banner_1200x620_jp29_matsuyama.jpg",
			"OKAYAMA" => "ogp-banner_1200x620_jp20_okayama.jpg",
			"TAKAMATSU" => "ogp-banner_1200x620_jp28_takamatsu.jpg",
			"TOKUSHIMA" => "ogp-banner_1200x620_jp27_tokushima.jpg",
			"TOTTORI" => "ogp-banner_1200x620_jp24_tottori.jpg",
			"YAMAGUCHI_UBE" => "ogp-banner_1200x620_jp23_yamaguchi-ube.jpg",
			"YONAGO" => "ogp-banner_1200x620_jp25_yonago.jpg",
			"ASAHIKAWA" => "ogp-banner_1200x620_jp09_asahikawa.jpg",
			"HAKODATE" => "ogp-banner_1200x620_jp13_hakodate.jpg",
			"KUSHIRO" => "ogp-banner_1200x620_jp11_kushiro.jpg",
			"MEMANBETSU" => "ogp-banner_1200x620_jp08_memanbetsu.jpg",
			"NAKASHIBETSU" => "ogp-banner_1200x620_jp10_nakashibetsu.jpg",
			"OBIHIRO" => "ogp-banner_1200x620_jp12_obihiro.jpg",
			"OKHOTSKMONBETSU" => "ogp-banner_1200x620_jp07_okhotsk-monetsu.jpg",
			"SAPPORO" => "ogp-banner_1200x620_jp05_sapporo.jpg",
			"WAKKANAI" => "ogp-banner_1200x620_jp06_wakkanai.jpg",
			"FUKUOKA" => "ogp-banner_1200x620_jp31_fukuoka.jpg",
			"KAGOSHIMA" => "ogp-banner_1200x620_jp38_kagoshima.jpg",
			"KITAKYUSHU" => "ogp-banner_1200x620_jp32_kitakyushu.jpg",
			"KUMAMOTO" => "ogp-banner_1200x620_jp35_kumamoto.jpg",
			"MIYAZAKI" => "ogp-banner_1200x620_jp37_miyazaki.jpg",
			"NAGASAKI" => "ogp-banner_1200x620_jp36_nagasaki.jpg",
			"OITA" => "ogp-banner_1200x620_jp34_oita.jpg",
			"SAGA" => "ogp-banner_1200x620_jp33_saga.jpg",
			"NAGOYA" => "ogp-banner_1200x620_jp04_nagoya.jpg",
			"ISHIGAKI" => "ogp-banner_1200x620_jp41_ishigaki.jpg",
			"MIYAKO" => "ogp-banner_1200x620_jp40_miyako.jpg",
			"OKINAWA_NAHA" => "ogp-banner_1200x620_jp39_okinawa.jpg",
			"OSAKA" => "ogp-banner_1200x620_jp03_osaka.jpg",
			"AKITA" => "ogp-banner_1200x620_jp15_akita.jpg",
			"KOMATSU" => "ogp-banner_1200x620_jp18_komatsu.jpg",
			"NOTO" => "ogp-banner_1200x620_jp19_noto.jpg",
			"ODATE_NOSHIRO" => "ogp-banner_1200x620_jp14_odate-noshiro.jpg",
			"SHONAI" => "ogp-banner_1200x620_jp16_shonai.jpg",
			"TOYAMA" => "ogp-banner_1200x620_jp17_toyama.jpg",
			"HACHIJOJIMA" => "ogp-banner_1200x620_jp02_hachijojima.jpg",
			"TOKYO_HANEDA_NARITA" => "ogp-banner_1200x620_jp01_tokyo.jpg",
			// na
			"CHICAGO" => "ogp-banner_1200x620_na08_chicago.jpg",
			"HONOLULU" => "ogp-banner_1200x620_na10_honolulu.jpg",
			"HOUSTON" => "ogp-banner_1200x620_na07_houston.jpg",
			"LOSANGELES" => "ogp-banner_1200x620_na01_los-angeles.jpg",
			"NEWYORK" => "ogp-banner_1200x620_na06_newyork.jpg",
			"SANFRANCISCO" => "ogp-banner_1200x620_na02_san-francisco.jpg",
			"SANJOSE" => "ogp-banner_1200x620_na03_sanjose.jpg",
			"SEATTLE" => "ogp-banner_1200x620_na04_seattle.jpg",
			"VANCOUVER" => "ogp-banner_1200x620_na09_vancouver.jpg",
			"WASHINGTON_DC" => "ogp-banner_1200x620_na05_washingtondc.jpg",
		];

		$this->destinationTwitterImageMap = [
			// ja
			"HAGIIWAMI" => "twitter-banner_1024x512_jp26_haji-iwami.jpg",
			"HIROSHIMA" => "twitter-banner_1024x512_jp21_hiroshima.jpg",
			"IWAKUNI" => "twitter-banner_1024x512_jp22_iwakuni.jpg",
			"KOCHI" => "twitter-banner_1024x512_jp30_kochi.jpg",
			"MATSUYAMA" => "twitter-banner_1024x512_jp29_matsuyama.jpg",
			"OKAYAMA" => "twitter-banner_1024x512_jp20_okayama.jpg",
			"TAKAMATSU" => "twitter-banner_1024x512_jp28_takamatsu.jpg",
			"TOKUSHIMA" => "twitter-banner_1024x512_jp27_tokushima.jpg",
			"TOTTORI" => "twitter-banner_1024x512_jp24_tottori.jpg",
			"YAMAGUCHI_UBE" => "twitter-banner_1024x512_jp23_yamaguchi-ube.jpg",
			"YONAGO" => "twitter-banner_1024x512_jp25_yonago.jpg",
			"ASAHIKAWA" => "twitter-banner_1024x512_jp09_asahikawa.jpg",
			"HAKODATE" => "twitter-banner_1024x512_jp13_hakodate.jpg",
			"KUSHIRO" => "twitter-banner_1024x512_jp11_kushiro.jpg",
			"MEMANBETSU" => "twitter-banner_1024x512_jp08_memanbetsu.jpg",
			"NAKASHIBETSU" => "twitter-banner_1024x512_jp10_nakashibetsu.jpg",
			"OBIHIRO" => "twitter-banner_1024x512_jp12_obihiro.jpg",
			"OKHOTSKMONBETSU" => "twitter-banner_1024x512_jp07_okhotsk-monetsu.jpg",
			"SAPPORO" => "twitter-banner_1024x512_jp05_sapporo.jpg",
			"WAKKANAI" => "twitter-banner_1024x512_jp06_wakkanai.jpg",
			"FUKUOKA" => "twitter-banner_1024x512_jp31_fukuoka.jpg",
			"KAGOSHIMA" => "twitter-banner_1024x512_jp38_kagoshima.jpg",
			"KITAKYUSHU" => "twitter-banner_1024x512_jp32_kitakyushu.jpg",
			"KUMAMOTO" => "twitter-banner_1024x512_jp35_kumamoto.jpg",
			"MIYAZAKI" => "twitter-banner_1024x512_jp37_miyazaki.jpg",
			"NAGASAKI" => "twitter-banner_1024x512_jp36_nagasaki.jpg",
			"OITA" => "twitter-banner_1024x512_jp34_oita.jpg",
			"SAGA" => "twitter-banner_1024x512_jp33_saga.jpg",
			"NAGOYA" => "twitter-banner_1024x512_jp04_nagoya.jpg",
			"ISHIGAKI" => "twitter-banner_1024x512_jp41_ishigaki.jpg",
			"MIYAKO" => "twitter-banner_1024x512_jp40_miyako.jpg",
			"OKINAWA_NAHA" => "twitter-banner_1024x512_jp39_okinawa.jpg",
			"OSAKA" => "twitter-banner_1024x512_jp03_osaka.jpg",
			"AKITA" => "twitter-banner_1024x512_jp15_akita.jpg",
			"KOMATSU" => "twitter-banner_1024x512_jp18_komatsu.jpg",
			"NOTO" => "twitter-banner_1024x512_jp19_noto.jpg",
			"ODATE_NOSHIRO" => "twitter-banner_1024x512_jp14_odate-noshiro.jpg",
			"SHONAI" => "twitter-banner_1024x512_jp16_shonai.jpg",
			"TOYAMA" => "twitter-banner_1024x512_jp17_toyama.jpg",
			"HACHIJOJIMA" => "twitter-banner_1024x512_jp02_hachijojima.jpg",
			"TOKYO_HANEDA_NARITA" => "twitter-banner_1024x512_jp01_tokyo.jpg",
			// na
			"CHICAGO" => "twitter-banner_1024x512_na08_chicago.jpg",
			"HONOLULU" => "twitter-banner_1024x512_na10_honolulu.jpg",
			"HOUSTON" => "twitter-banner_1024x512_na07_houston.jpg",
			"LOSANGELES" => "twitter-banner_1024x512_na01_los-angeles.jpg",
			"NEWYORK" => "twitter-banner_1024x512_na06_newyork.jpg",
			"SANFRANCISCO" => "twitter-banner_1024x512_na02_san-francisco.jpg",
			"SANJOSE" => "twitter-banner_1024x512_na03_sanjose.jpg",
			"SEATTLE" => "twitter-banner_1024x512_na04_seattle.jpg",
			"VANCOUVER" => "twitter-banner_1024x512_na09_vancouver.jpg",
			"WASHINGTON_DC" => "twitter-banner_1024x512_na05_washingtondc.jpg",
		];
	}

	/**
	 * チェックボックスの入力が無い場合、対応するkeyの値をfalseで作る。
	 */
	private function filterCheckboxValue($data)
	{
		if (!is_array($data)) {
			$data = [];
		}
		$data["agree_newsletter"] = array_key_exists("agree_newsletter", $data) ? $data["agree_newsletter"] : false;
		$data["privacy"] = array_key_exists("privacy", $data) ? $data["privacy"] : false;
		return $data;
	}

	/**
	 * 各アクションの前処理.
	 *
	 * @return 以後の処理を行う必要がない場合はreturnするobject, そのまま処理を継続する場合はfalse.1
	 */
	private function beforeAction($request) {
		$handled = false;
		$pageSrv = new PageOpenStatusService();
		if (false === $pageSrv->isOpen25thCampaignEntry()) {
			$ptn = '!/singapore25[/]?$!';
			if (1 !== preg_match($ptn, $request->url())) {
				$handled = redirect()->secure('https://' . $_SERVER['HTTP_HOST'] . '/singapore25');
			}
		}

		return $handled;
	}


	/**
	 */
	public function indexGet(Request $request)
	{
		$handled = AnaRequest::forceSecureRequest();
		if ($handled) {
			return $handled;
		}
		$handled = $this->beforeAction($request);
		if ($handled) {
			return $handled;
		}

		$data = [];

		$pageSrv = new PageOpenStatusService();
		$data['isClosed'] = (false === $pageSrv->isOpen25thCampaignEntry());

		return view('singapore25.index', $data);
	}

	/**
	 */
	public function japanGet(Request $request)
	{
		$handled = AnaRequest::forceSecureRequest();
		if ($handled) {
			return $handled;
		}
		$handled = $this->beforeAction($request);
		if ($handled) {
			return $handled;
		}

		$data = [];
		$data["destinationGroupList"] = $this->japanDestinationGroupList;
		$data["destinationList"] = $this->japanDestinationList;
		$pageSrv = new PageOpenStatusService();
		$data['isClosed'] = (false === $pageSrv->isOpen25thCampaignEntry());
		return view('singapore25.japan.index', $data);
	}

	/**
	 */
	public function naGet(Request $request)
	{
		$handled = AnaRequest::forceSecureRequest();
		if ($handled) {
			return $handled;
		}
		$handled = $this->beforeAction($request);
		if ($handled) {
			return $handled;
		}

		$data = [];
		$data["destinationList"] = $this->naDestinationList;
		$pageSrv = new PageOpenStatusService();
		$data['isClosed'] = (false === $pageSrv->isOpen25thCampaignEntry());
		return view('singapore25.na.index', $data);
	}

	/**
	 */
	public function tncsGet(Request $request)
	{
		$handled = AnaRequest::forceSecureRequest();
		if ($handled) {
			return $handled;
		}
		$handled = $this->beforeAction($request);
		if ($handled) {
			return $handled;
		}

		$data = [];
		$pageSrv = new PageOpenStatusService();
		$data['isClosed'] = (false === $pageSrv->isOpen25thCampaignEntry());
		return view('singapore25.tncs.index', $data);
	}

	/**
	 * japanese, na -> 入力画面
	 */
	public function registrationPost(Request $request)
	{
		App::setLocale("en");
		$handled = AnaRequest::forceSecureRequest();
		if ($handled) {
			return $handled;
		}
		$handled = $this->beforeAction($request);
		if ($handled) {
			return $handled;
		}
		
		$data = [];
		
		
		$sSrv = App::make(\Ana\SessionService::class);
		if ($sSrv->has(self::class, "input")) {
			$data = array_merge($data, $sSrv->get(self::class, "input"));
			$request->merge($data);
		}

		$data = $request->all();
		if (false == array_key_exists("agree_newsletter", $data)) {
			// ニュースレター受取はデフォルトON。
			$data["agree_newsletter"] = '1';
		}

		if (!isset($data["destination"])) {
			throw new \Exception("wrong access.");
		}
		$sSrv = App::make(\Ana\SessionService::class);
		// validation
		$sSrv->put(self::class, "input", $data);

		$data["countryList"] = [];
		$data["E_newsletter"] = "";
		$data["genderList"] = $this->genderList;
		$data["nameTitleList"] = $this->nameTitleList;
		$data["yearList"] = $this->yearList;
		$data["monthList"] = $this->monthList;
		$data["dayList"] = $this->dayList;

		$pageSrv = new PageOpenStatusService();
		$data['isClosed'] = (false === $pageSrv->isOpen25thCampaignEntry());
		return view('singapore25.registration.input', $data);
	}

	/**
	 * バリデーションエラー時、確認画面 -> 戻る時の入力画面
	 */
	public function registrationGet(Request $request)
	{
		App::setLocale("en");
		$handled = AnaRequest::forceSecureRequest();
		if ($handled) {
			return $handled;
		}
		$handled = $this->beforeAction($request);
		if ($handled) {
			return $handled;
		}

		$data = [];

		$sSrv = App::make(\Ana\SessionService::class);
		if ($sSrv->has(self::class, "input")) {
			$data = array_merge($data, $sSrv->get(self::class, "input"));
			$request->merge($data);
		}
		if ($sSrv->has(self::class, "inputError")) {
			// バリデーションエラー時のエラーデータ
			$data["errors"] = $sSrv->get(self::class, "inputError");
		}

		if (!isset($data["destination"])) {
			return redirect("/");
		}

		$data["countryList"] = [];
		$data["E_newsletter"] = "";
		$data["genderList"] = $this->genderList;
		$data["nameTitleList"] = $this->nameTitleList;
		$data["yearList"] = $this->yearList;
		$data["monthList"] = $this->monthList;
		$data["dayList"] = $this->dayList;

		$pageSrv = new PageOpenStatusService();
		$data['isClosed'] = (false === $pageSrv->isOpen25thCampaignEntry());
		return view('singapore25.registration.input', $data);
	}

	/**
	 * 入力値バリデーション
	 */
	private function validationConfirm($data, $request)
	{
		// NRIC/FINの重複チェック
		Validator::extend('s25nricfin', function($attribute, $value, $parameters, $validator)
		{
			$data = $validator->getData();
			$sfSrv = App::make(\Ana\SalesForceService::class);
			$sfSrv->init();
			$count = $sfSrv->s25GetLeadByNricFin($data);
			$ok = (0 == $count);
			return $ok;
		});
		Validator::extend('s25birthday', function($attribute, $value, $parameters, $validator)
		{
			$data = $validator->getData();
			
			$year = $data["birth_date_year"];
			if ( (intval($year) < 1900) || (1998 < intval($year)) ) {
				return false;
			}
			$month = $data["birth_date_month"];
			if ( (intval($month) < 1) || (12 < intval($month)) ) {
				return false;
			}
			$day = $data["birth_date_day"];
			if ( (intval($day) < 1) || (31 < intval($day)) ) {
				return false;
			}
			return true;
		});	
		$rules = [
			'eticket_number' => 'sometimes|regex:![0-9]{10}!',
			'name_title' => 'required|In:Mr,Miss,Mrs,Madam',
			'first_name' => 'required',
			'last_name' => 'required',
			'gender' => 'required|In:Male,Female',
			'nric_fin' => 'required|regex:![STFGstfg]{1}[0-9]{7}[A-Za-z]{1}!|s25nricfin',
			'birth_date_year' => 'required|s25birthday',
			'birth_date_month' => 'required|s25birthday',
			'birth_date_day' => 'required|s25birthday',
			'occupation' => 'required',
			'tel' => 'required',
			'email' => 'required|regex:![^@]+@[^@]+!',
			'email_confirm' => 'required|regex:![^@]+@[^@]+!|same:email',
			'privacy' => 'required',
		];
		$messages = [
			"eticket_number.regex" => Lang::get("messages.s25_form_error_eticket_number_regex"),

			"name_title.required" => Lang::get("messages.s25_form_error_name_title_required"),
			"name_title.In" => Lang::get("messages.s25_form_error_name_title_In"),
			
			"first_name.required" => Lang::get("messages.s25_form_error_first_name_required"),
			"last_name.required" => Lang::get("messages.s25_form_error_last_name_required"),
			
			"gender.required" => Lang::get("messages.s25_form_error_gender_required"),
			"gender.In" => Lang::get("messages.s25_form_error_gender_In"),
			
			"nric_fin.required" => Lang::get("messages.s25_form_error_nric_fin_required"),
			"nric_fin.regex" => Lang::get("messages.s25_form_error_nric_fin_regex"),
			"nric_fin.In" => Lang::get("messages.s25_form_error_nric_fin_In"),
			"nric_fin.s25nricfin" => Lang::get("messages.s25_form_error_nric_fin_s25nricfin"),

			"birth_date_year.s25birthday" => Lang::get("messages.s25_form_error_birth_date_required"),
			"birth_date_year.required" => Lang::get("messages.s25_form_error_birth_date_required"),
			"birth_date_year.between" => Lang::get("messages.s25_form_error_birth_date_required"),
			"birth_date_month.s25birthday" => Lang::get("messages.s25_form_error_birth_date_required"),
			"birth_date_month.required" => Lang::get("messages.s25_form_error_birth_date_required"),
			"birth_date_month.between" => Lang::get("messages.s25_form_error_birth_date_required"),
			"birth_date_day.s25birthday" => Lang::get("messages.s25_form_error_birth_date_required"),
			"birth_date_day.required" => Lang::get("messages.s25_form_error_birth_date_required"),
			"birth_date_day.between" => Lang::get("messages.s25_form_error_birth_date_required"),
			
			"occupation.required" => Lang::get("messages.s25_form_error_occupation_required"),
			
			"tel.required" => Lang::get("messages.s25_form_error_tel_required"),
			
			"email.required" => Lang::get("messages.s25_form_error_email_required"),
			"email.regex" => Lang::get("messages.s25_form_error_email_email"),
			
			"email_confirm.required" => Lang::get("messages.s25_form_error_email_confirm_required"),
			"email_confirm.regex" => Lang::get("messages.s25_form_error_email_confirm_email"),
			"email_confirm.same" => Lang::get("messages.s25_form_error_email_confirm_same"),
			
			"privacy.required" => Lang::get("messages.s25_form_error_privacy_required"),
		];
		$validator = Validator::make($request->all(), $rules, $messages);

		// errors
		$ret = [];
		$ret["success"] = (false == $validator->fails());
		$ret["input"] = $data;
		$ret["error"] = $validator->errors();
		return $ret;
	}

	/**
	 * 確認画面
	 */
	public function confirmPost(Request $request)
	{
		$handled = AnaRequest::forceSecureRequest();
		if ($handled) {
			return $handled;
		}
		$handled = $this->beforeAction($request);
		if ($handled) {
			return $handled;
		}

		$data = [];

		$sSrv = App::make(\Ana\SessionService::class);
		// destination値取得
		$data = $sSrv->get(self::class, "input");
		
		// チェックボックスの入力状態に合わせて値を設定
		if (!$request->has("agree_newsletter")) {
			$data["agree_newsletter"] = false;
		}
		if (!$request->has("privacy")) {
			$data["privacy"] = false;
		}
		
		$data = $this->filterCheckboxValue($data);

		// validation
		$data = array_merge($data, $request->all());
		$validRet = $this->validationConfirm($data, $request);
		if (!$validRet["success"]) {
			// 入力画面へ
			$sSrv->put(self::class, "input", $validRet["input"]);
			$sSrv->put(self::class, "inputError", $validRet["error"]);
			return redirect("/singapore25/registration");
		}
		$sSrv->put(self::class, "input", $validRet["input"]);
		$sSrv->clear(self::class, "inputError");

		$data = array_merge($data, $validRet["input"]);
		$data["genderList"] = $this->genderList;
		$data["nameTitleList"] = $this->nameTitleList;
		$data["yearList"] = $this->yearList;
		$data["monthList"] = $this->monthList;
		$data["dayList"] = $this->dayList;

		$pageSrv = new PageOpenStatusService();
		$data['isClosed'] = (false === $pageSrv->isOpen25thCampaignEntry());
		return view('singapore25.registration.confirm', $data);
	}

	/**
	 * SFへのデータ登録
	 */
	private function saveSfData($data)
	{
		$data["eticket_number"] = "205-" . $data["eticket_number"];
		$data["name_title"] = $this->nameTitleList[$data["name_title"]];
		$data["gender"] = $this->genderList[$data["gender"]];
		$data["birth_day"] = $data["birth_date_year"]
			. "-" . $data["birth_date_month"]
			. "-" . $data["birth_date_day"];
		$data["agree_newsletter"] = ("1" == array_get($data, "agree_newsletter", 0)) ? true : false;
		// TODO : 確認
		$data['status'] = 'New'; // 固定値を入れる仕様
		$data['company'] = '2st25th2016'; // 固定値を入れる仕様

		$sfSrv = App::make(\Ana\SalesForceService::class);
		$sfSrv->init();
		$ret = $sfSrv->s25InsertLead($data);
		return $ret["success"];

	}

	/**
	 * Pardotフォームハンドラエンドポイントに付加するパラメータを作る.
	 */
	private function getPardotFormHandlerEndpointParameter($successLocationParameters = array(),
														   $errorLocationParameters = array(), $request = array())
	{
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

		$successLocation = 'https://' . $_SERVER['HTTP_HOST'] . '/singapore25/thankyou' . $successLocationQuery;
		$errorLocation = 'https://' . $_SERVER['HTTP_HOST'] . '/singapore25/registration-error' . $errorLocationQuery;

		// @note: locationのクエリ文字列に空白を含む値を指定した場合、urlencodeしても引き渡されなかった
		$param = "?";
		$param .= "success_location=" . rawurlencode($successLocation);
		$param .= "&";
		$param .= "error_location=" . rawurlencode($errorLocation);
		return $param;
	}

	/**
	 * 確認->pardotデータ投入用リダイレクト画面
	 */
	public function thankyouPost(Request $request)
	{
		$handled = AnaRequest::forceSecureRequest();
		if ($handled) {
			return $handled;
		}
		$handled = $this->beforeAction($request);
		if ($handled) {
			return $handled;
		}

		$data = [];

		$sSrv = App::make(\Ana\SessionService::class);
		// destination値取得
		$data = $sSrv->get(self::class, "input");

		if ($sSrv->has(self::class, "input")) {
			$data = array_merge($data, $sSrv->get(self::class, "input"));
			$request->merge($data);
		}

		$data = $this->filterCheckboxValue($data);

		// validation
		$validRet = $this->validationConfirm($data, $request);
		if (!$validRet["success"]) {
			// 入力画面へ
			$sSrv->put(self::class, "input", $validRet["input"]);
			$sSrv->put(self::class, "inputError", $validRet["error"]);
			return redirect("/singapore25/registration");
		}

		$data = array_merge($data, $validRet["input"]);

		// sf
		$sfRet = $this->saveSfData($data);
		if (!$sfRet) {
			throw new \Exception("failed to insert salesforce data.");
		}

		// pardot
		$data["pardotFormHandlerEndpoint"] = "https://go.pardot.com/l/168252/2016-08-02/3hhf3"
			. $this->getPardotFormHandlerEndpointParameter(["destination" => $data["destination"]]);
		$pardotData["Email"] = $data["email"];
		$pardotData["E-ticket number"] = "205-" . $data["eticket_number"];
		$pardotData["Title"] = $this->nameTitleList[$data["name_title"]];
		$pardotData["First Name"] = $data["first_name"];
		$pardotData["Last Name"] = $data["last_name"];
		$pardotData["sex"] = $this->genderList[$data["gender"]];
		$pardotData["NRIC/FIN"] = $data["nric_fin"];
		$pardotData["Birthday"] = $data["birth_date_year"]
			. "-" . $data["birth_date_month"]
			. "-" . $data["birth_date_day"];
		$pardotData["Occupation"] = $data["occupation"];
		$pardotData["Mobile phone"] = $data["tel"];
		$pardotData["Email_confirm"] = $data["email"];
		$pardotData["E-newsletter"] = ("1" == array_get($data, "agree_newsletter", 0)) ? "True" : "False";
		$pardotData["Destination"] = $data["destination"];

		$data["pardotDataList"] = $pardotData;

		$pageSrv = new PageOpenStatusService();
		$data['isClosed'] = (false === $pageSrv->isOpen25thCampaignEntry());
		return view('singapore25.registration.pardot', $data);
	}

	/**
	 * pardot -> 完了画面
	 *
	 * pardotからコールされる。
	 */
	public function thankyouGet(Request $request)
	{
		$handled = AnaRequest::forceSecureRequest();
		if ($handled) {
			return $handled;
		}
		$handled = $this->beforeAction($request);
		if ($handled) {
			return $handled;
		}
		
		$sSrv = App::make(\Ana\SessionService::class);
		
		// Facebook, Twitter以外のユーザーの直接アクセスの場合はトップへ戻す。
		if (!$sSrv->has(self::class, "input")) {
			if (!AnaRequest::isFacebookUserAgentAccess() && !AnaRequest::isTwitterUserAgentAccess()) {
				return redirect("/singapore25");
			}
		}

		$data = $request->all();

		$destinationLabel = "";
		if (!isset($data["destination"])) {
			return redirect("/singapore25/registration");
		} else {
			$destinationLabel = array_get($this->naDestinationList, $data["destination"], "");
			if (empty($destinationLabel)) {
				foreach ($this->japanDestinationGroupList as $grpValue => $grpLabel) {
					$destinationLabel = array_get($this->japanDestinationList[$grpValue], $data["destination"], "");
					if (!empty($destinationLabel)) {
						break;
					}
				}
			}
			if (empty($destinationLabel)) {
				return redirect("/singapore25/registration");
			}
		}

		$data["destinationLabel"] = $destinationLabel;
		$data["urlEncodedDestination"] = rawurlencode($destinationLabel);
		$data["fbOgpImageName"] = $this->destinationOgpImageMap[$data["destination"]];
		$data["twitterOgpImageName"] = $this->destinationTwitterImageMap[$data["destination"]];

		$sSrv->clearSectionData(self::class);

		$pageSrv = new PageOpenStatusService();
		$data['isClosed'] = (false === $pageSrv->isOpen25thCampaignEntry());
		return view('singapore25.registration.thankyou', $data);
	}

	/**
	 * pardotエラー画面
	 *
	 * pardotからコールされる。
	 */
	public function registrationErrorGet(Request $request)
	{
		throw new \Exception("raise pardot error. info=" . print_r($request->all(), true));
	}

}
