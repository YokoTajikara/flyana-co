<?php

namespace Ana;

require_once __DIR__ . '/Force.com-OAuth-Toolkit-for-PHP/oauth.php';

/**
 * セールスフォース関連処理
 * sf_rest.phpを参考
 *
 * Class SalesforceService
 * @package Ana
 */
class SalesforceService
{

    private $sf_oauth    = null;
    private $isDebugMode = false;

    private static $SF_CLIENT_ID     = "";
    private static $SF_CLIENT_SECRET = "";
    private static $SF_LOGIN_URL     = "";
    private static $SF_USER          = "";
    private static $SF_USER_PASSWORD = "";
    private static $SF_CACHE_DIR     = "";
    private static $SF_CALLBACK_URL  = "";

    /**
     * SalesforceService constructor.
     *
     * @param array $env
     *
     * @throws \Exception
     */
    function __construct($env = array())
    {
        $env     = array_merge($_SERVER, $env);//todo 本番では$_ENV
        $envKeys = array("SF_CLIENT_ID", "SF_CLIENT_SECRET", "SF_USERNAME", "SF_PASSWORD", "SF_LOGIN_URL");

        foreach ($envKeys as $env_key) {
            if ( ! isset($env[$env_key])) {
                throw new \Exception("should be env set " . $env_key);
            }
        }

        self::$SF_CACHE_DIR     = dirname(__FILE__) . "/cache";
        self::$SF_CLIENT_ID     = $env["SF_CLIENT_ID"];
        self::$SF_CLIENT_SECRET = $env["SF_CLIENT_SECRET"];
        self::$SF_USER          = $env["SF_USERNAME"];
        self::$SF_USER_PASSWORD = $env["SF_PASSWORD"];
        self::$SF_LOGIN_URL     = $env["SF_LOGIN_URL"];
        if (array_key_exists("SF_CALLBACK_URL", $env)) {
            self::$SF_CALLBACK_URL = $env["SF_CALLBACK_URL"];
        } else {
            self::$SF_CALLBACK_URL = array_key_exists("HTTP_HOST", $_SERVER) ? $_SERVER["HTTP_HOST"] : null;
        }

        if (array_key_exists('debug', $env)) {
            $this->isDebugMode = $env['debug'];
        }
    }

    /**
     * デバッグ状態に設定.
     *
     * @param bool $isDebug
     */
    public function setDebugMode($isDebug = true)
    {
        $this->isDebugMode = $isDebug;
    }

    /**
     * RestAPIのURLの元パスを取得.
     * @return string
     */
    private function getBaseRestApiUrl()
    {
        $url = '/v1';
        if ($this->isDebugMode) {
            $url .= '/debug';
        }

        return $url;
    }

    /**
     * @param $msg
     */
    private function log($msg)
    {
        fputs(fopen('php://stdout', 'w'), $msg . "\n");
    }

    /**
     * 初期化
     *
     * @param null $callback_url
     *
     * @return bool
     * @throws \Exception
     */
    public function init($callback_url = null)
    {
        $this->sf_oauth = new \oauth(self::$SF_CLIENT_ID, self::$SF_CLIENT_SECRET, self::$SF_CALLBACK_URL, self::$SF_LOGIN_URL, self::$SF_CACHE_DIR);
        $auth_success   = $this->sf_oauth->auth_with_password(self::$SF_USER, self::$SF_USER_PASSWORD);
        if ( ! $auth_success) {
            throw new \Exception("sales force service init failed. error=" . print_r($this->sf_oauth->error_msg, true));
        }

        return $auth_success;
    }

    /**
     * @param $curl
     *
     * @return mixed
     */
    private function setTlsCurlOption($curl)
    {
        // 2016/6/26: tls1.0 is disabled.
        curl_setopt($curl, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);

        return $curl;
    }

    /**
     * @param $v
     *
     * @return array|string
     */
    private function sanitizeValue($v)
    {
        if (is_array($v)) {
            return array_map(array("sanitizeValue", $this), $v);
        }
        if (is_object($v)) {
            // オブジェクトは無視
            return "";
        }

        if (get_magic_quotes_gpc()) {
            $v = stripslashes($v);
        }
        $v = htmlentities($v, ENT_QUOTES, mb_internal_encoding());

        return $v;
    }

    /** query送信先urlを取得
     *
     */
    private function getQueryUrl()
    {
        $url = $this->sf_oauth->instance_url . "/services/data/v24.0/query?q=";

        return $url;
    }


    /** apex restのurlを取得
     *
     */
    private function getApexRestUrl()
    {
        $url = $this->sf_oauth->instance_url . "/services/apexrest";

        return $url;
    }

    /** ApexRESTApi用postリクエスト送信
     *
     * @param string $url 送信先URL
     * @param string $arg 送信する値
     */
    private function sendRestPostRequest($url, $arg)
    {
        $postdata = json_encode($arg);
        $curl     = curl_init($url);
        $curl     = $this->setTlsCurlOption($curl);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER,
            array(
                "Authorization: OAuth " . $this->sf_oauth->access_token,
                "Content-type: application/json"
            ));
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
        $json_response = curl_exec($curl);

        $r = array(
            "json_response" => $json_response,
            "status"        => curl_getinfo($curl, CURLINFO_HTTP_CODE),
            "curl"          => $curl
        );

        return $r;
    }


    /** patchリクエスト送信
     *
     * @param string $url 送信先URL
     * @param string $arg 送信する値
     */
    private function sendPatchRequest($url, $arg)
    {
        $curl = curl_init($url);
        $curl = $this->setTlsCurlOption($curl);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_HTTPHEADER,
            array(
                "Authorization: OAuth " . $this->sf_oauth->access_token,
                "Content-type: application/json"
            ));
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PATCH");
        curl_setopt($curl, CURLOPT_POSTFIELDS, $arg);
        $json_response = curl_exec($curl);

        $r = array(
            "json_response" => $json_response,
            "status"        => curl_getinfo($curl, CURLINFO_HTTP_CODE),
            "curl"          => $curl
        );

        return $r;
    }


    /** クエリリクエスト送信
     *
     * @param string $url クエリを含む送信先URL
     */
    private function sendQueryRequest($url)
    {
        $curl = curl_init($url);
        $curl = $this->setTlsCurlOption($curl);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER,
            array(
                "Authorization: OAuth " . $this->sf_oauth->access_token,
                "Content-type: application/json"
            ));
        $json_response = curl_exec($curl);

        $r = array(
            "json_response" => $json_response,
            "status"        => curl_getinfo($curl, CURLINFO_HTTP_CODE),
            "curl"          => $curl
        );

        return $r;
    }

    /**
     * クエリリクエスト送信
     *
     * @param string $url クエリを含む送信先URL
     */
    private function sendSoqlRequest($urlSoql)
    {
        $url  = $this->getQueryUrl() . $urlSoql;
        $curl = curl_init($url);
        $curl = $this->setTlsCurlOption($curl);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER,
            array(
                "Authorization: OAuth " . $this->sf_oauth->access_token,
                "Content-type: application/json"
            ));
        $jsonResponse = curl_exec($curl);

        $r = array(
            "jsonResponse" => $jsonResponse,
            "status"       => curl_getinfo($curl, CURLINFO_HTTP_CODE),
            "curl"         => $curl
        );

        return $r;
    }

    /**
     * ph-emailのリードデータをSFのLeadに登録する
     *
     * @param $data
     *
     * @return array|mixed
     * @throws \Exception
     */
    public function phEmailInsertLead($data)
    {
        $keys = array(
            "First_Name__c",
            "Last_Name__c",
            "Gender__c",
            "Email__c",
            "Residence_Region__c",
            "e_newsletter__c",
        );

        $args = array();
        foreach ($keys as $key => $val) {
            if ( ! array_key_exists($val, $data)) {
                throw new \Exception("ph-emailInsertLead: argument error. ${val} is not found.");
            }
            $args[$val] = $data[$val];
        }

        $this->log("ph-emailInsertLead: newRecord=" . print_r($args, true));

        // リクエスト
        $leadUrl = $this->sf_oauth->instance_url . "/services/data/v24.0/sobjects/EDMmember__c";
        $res     = $this->sendRestPostRequest($leadUrl, $args);
        $this->log("ph-emailInsertLead: res=" . print_r($res, true));
        curl_close($res["curl"]);
        $jsonResponse = $res["json_response"];
        $response     = json_decode($jsonResponse, true);
        if ( ! is_array($response) || ! array_key_exists('success', $response) || ! $response["success"]) {
            // duplicate alertは無視

            // TODO: 確認
            // DuplicateAlertが出たとき、SFに重複レコードは登録されなかった。1個のみ。

            $isDuplicateAlertError = (isset($response[0])) && (false !== strpos($response[0]["message"], "duplicate ")) && ($response[0]["errorCode"] == "UNKNOWN_EXCEPTION");
            if ( ! $isDuplicateAlertError) {
                throw new \Exception("ph-emailInsertLead: response error. response=" . print_r($response, true));
            } else {
                $response["success"] = true;
            }

        }

        return $response;
    }

    // ----------------------------------------------------
    // kor-cnp-event1701
    /**
     * @param $data
     *
     * @return mixed
     * @throws \Exception
     */
    public function kor_cpn_event1701GetLeadByETicketNumber($data)
    {
        // 実装時点ではデータの存在の確認だけできればOKのため、Countを取得している。
        $soql = "SELECT Count(Name) FROM Lead";
        $soql .= " WHERE E_ticket_number__c ='{$data['E_ticket_number__c']}' AND X2017DonKorea__c=true";
        $soql = str_replace(' ', '+', $soql);

        $res = $this->sendSoqlRequest($soql);
        curl_close($res["curl"]);
        $jsonResponse = $res["jsonResponse"];
        $response     = json_decode($jsonResponse, true);
        if ( ! array_key_exists("done", $response) || ! array_key_exists("records", $response)
             || (0 == count($response['records'])) || ! array_key_exists("expr0", $response['records'][0])
        ) {
            throw new \Exception("getExistActiveChangingRequest: response=" . print_r($response, true));
        }

        $cnt = $response['records'][0]['expr0'];

        return $cnt;
    }

    /**
     * anayose2017manilaのリードデータをSFのLeadに登録する
     *
     * @param $data
     *
     * @return array|mixed
     * @throws \Exception
     */
    public function kor_cpn_event1701InsertLead($data)
    {
        $keys = array(
            "E_ticket_number__c",
            "DepartureDate__c",
            "FirstName",
            "LastName",
            "Email",
            "e_newsletter__c",
            "X2017DonKorea__c",
            "Applied_Date__c",
            "status",
            "Origin__c",
            "Company"
        );

        $args = array();
        foreach ($keys as $key => $val) {
            if ( ! array_key_exists($val, $data)) {
                throw new \Exception("kor_cpn_event1701InsertLead: argument error. ${val} is not found.");
            }
            $args[$val] = $data[$val];
        }

        $this->log("kor_cpn_event1701InsertLead: newRecord=" . print_r($args, true));

        // リクエスト
        $leadUrl = $this->sf_oauth->instance_url . "/services/data/v24.0/sobjects/Lead";
        $res     = $this->sendRestPostRequest($leadUrl, $args);
        $this->log("kor_cpn_event1701InsertLead: res=" . print_r($res, true));
        curl_close($res["curl"]);
        $jsonResponse = $res["json_response"];
        $response     = json_decode($jsonResponse, true);
        if ( ! is_array($response) || ! array_key_exists('success', $response) || ! $response["success"]) {
            // duplicate alertは無視

            // TODO: 確認
            // DuplicateAlertが出たとき、SFに重複レコードは登録されなかった。1個のみ。

            $isDuplicateAlertError = (isset($response[0])) && (false !== strpos($response[0]["message"], "duplicate ")) && ($response[0]["errorCode"] == "UNKNOWN_EXCEPTION");
            if ( ! $isDuplicateAlertError) {
                throw new \Exception("kor_cpn_event1701InsertLead: response error. response=" . print_r($response, true));
            } else {
                $response["success"] = true;
            }

        }

        return $response;
    }

    // ----------------------------------------------------
    // anayose2017manila
    /**
     * @param $data
     *
     * @return mixed
     */
    public function anayose2017manilaGetLeadByEmail($data)
    {
        // 実装時点ではデータの存在の確認だけできればOKのため、Countを取得している。
        $soql = "SELECT Count(Name) FROM Lead";
        $soql .= " WHERE Email ='{$data['Email']}' AND X2017YoseManila__c=true";
        $soql = str_replace(' ', '+', $soql);

        $res = $this->sendSoqlRequest($soql);
        curl_close($res["curl"]);
        $jsonResponse = $res["jsonResponse"];
        $response     = json_decode($jsonResponse, true);
        if ( ! array_key_exists("done", $response) || ! array_key_exists("records", $response)
             || (0 == count($response['records'])) || ! array_key_exists("expr0", $response['records'][0])
        ) {
            throw new \Exception("getExistActiveChangingRequest: response=" . print_r($response, true));
        }

        $cnt = $response['records'][0]['expr0'];

        return $cnt;
    }

    /**
     * anayose2017manilaのリードデータをSFのLeadに登録する
     *
     * @param $data
     *
     * @return array|mixed
     * @throws \Exception
     */
    public function anayose2017manilaInsertLead($data)
    {
        $keys = array(
            "Title__c",
            "FirstName",
            "LastName",
            "sex__c",
            "Birthday__c",
            "Occupation__c",
            "Mobile_phone__c",
            "Email",
            "How_many_will_attend_YOSE_event__c",
            "How_often_do_you_travel_overseas_p_year__c",
            "Country_of_residence__c",
            "How_do_you_know_this_event__c",
            "amc__c",
            "e_newsletter__c",
            "Person2_Title__c",
            "Person2_First_Name__c",
            "Person2_Last_Name__c",
            "Person2_Gender__c",
            "Person2_Mobile_Phone__c",
            "X2017YoseManila__c",
            "Applied_Date__c",
            "language__c",
            "status",
            "Origin__c",
            "Company"
        );
        if ( ! empty($data["Person2_Date_of_Birthday__c"])) {
            array_push($keys, "Person2_Date_of_Birthday__c");
        }
        $args = array();
        foreach ($keys as $key => $val) {
            if ( ! array_key_exists($val, $data)) {
                throw new \Exception("anayose2017manilaInsertLead: argument error. ${val} is not found.");
            }
            $args[$val] = $data[$val];
        }

        $this->log("anayose2017manilaInsertLead: newRecord=" . print_r($args, true));
        // リクエスト
        $leadUrl = $this->sf_oauth->instance_url . "/services/data/v24.0/sobjects/Lead";
        $res     = $this->sendRestPostRequest($leadUrl, $args);
        $this->log("anayose2017manilaInsertLead: res=" . print_r($res, true));
        curl_close($res["curl"]);
        $jsonResponse = $res["json_response"];
        $response     = json_decode($jsonResponse, true);
        if ( ! is_array($response) || ! array_key_exists('success', $response) || ! $response["success"]) {
            // duplicate alertは無視

            // TODO: 確認
            // DuplicateAlertが出たとき、SFに重複レコードは登録されなかった。1個のみ。

            $isDuplicateAlertError = (isset($response[0])) && (false !== strpos($response[0]["message"], "duplicate ")) && ($response[0]["errorCode"] == "UNKNOWN_EXCEPTION");
            if ( ! $isDuplicateAlertError) {
                throw new \Exception("anayose2017manilaInsertLead: response error. response=" . print_r($response, true));
            } else {
                $response["success"] = true;
            }

        }

        return $response;
    }

    // ----------------------------------------------------
    // bangkok16b

    /**
     * @param $data
     *
     * @return mixed
     */
    public function bangkok16bGetLeadByTicketNumber($data)
    {
        // 実装時点ではデータの存在の確認だけできればOKのため、Countを取得している。
        $soql = "SELECT Count(Name) FROM Lead";
        $soql .= " WHERE E_ticket_number__c ='205-{$data['eticket_number']}' AND Bangkok16b__c=true";
        $soql = str_replace(' ', '+', $soql);

        $res = $this->sendSoqlRequest($soql);
        curl_close($res["curl"]);
        $jsonResponse = $res["jsonResponse"];
        $response     = json_decode($jsonResponse, true);
        if ( ! array_key_exists("done", $response) || ! array_key_exists("records", $response)
             || (0 == count($response['records'])) || ! array_key_exists("expr0", $response['records'][0])
        ) {
            throw new Exception("getExistActiveChangingRequest: response=" . print_r($response, true));
        }

        $cnt = $response['records'][0]['expr0'];

        return $cnt;
    }


    /**
     * bangkok16bのリードデータをSFのLeadに登録する
     *
     * @param $data
     *
     * @return array|mixed
     * @throws \Exception
     */
    public function bangkok16bInsertLead($data)
    {
        $keys = array(
            'reservation_number__c'                       => 'reservation_number',
            'E_ticket_number__c'                          => 'eticket_number',
            'DepartureDate__c'                            => 'boarding_date',
            'sex__c'                                      => 'gender',
            'FirstName'                                   => 'first_name',
            'LastName'                                    => 'last_name',
            'Age__c'                                      => 'age',
            'Mobile_phone__c'                             => 'mobile',
            'Email'                                       => 'email',
            'Holder_of_airline_frequent_flyer_program__c' => 'holder_of_airline',
            'Motive_for_your_ticket_purchase_through__c'  => 'motive_for_your_ticket',
            'Motive_for_your_ticket_purchase_TEXT__c'     => 'motive_for_your_ticket_text',
            'Any_suggestion_or_feedback__c'               => 'any_suggestion',
            'e_newsletter__c'                             => 'agree_newsletter',
            'Bangkok16b__c'                               => 'Bangkok16b__c',
            'Applied_Date__c'                             => 'Applied_Date__c',
            'Company'                                     => 'company'
        );
        $args = array();
        foreach ($keys as $sfKey => $key) {
            if ( ! array_key_exists($key, $data)) {
                throw new \Exception("bangkok16bInsertLead: argument error. ${key} is not found.");
            }
            $args[$sfKey] = $data[$key];
        }

        $this->log("bangkok16bInsertLead: newRecord=" . print_r($args, true));

        // リクエスト
        $leadUrl = $this->sf_oauth->instance_url . "/services/data/v24.0/sobjects/Lead";
        $res     = $this->sendRestPostRequest($leadUrl, $args);
        $this->log("bangkok16bInsertLead: res=" . print_r($res, true));
        curl_close($res["curl"]);
        $jsonResponse = $res["json_response"];
        $response     = json_decode($jsonResponse, true);
        if ( ! is_array($response) || ! array_key_exists('success', $response) || ! $response["success"]) {
            // duplicate alertは無視

            // TODO: 確認
            // DuplicateAlertが出たとき、SFに重複レコードは登録されなかった。1個のみ。

            $isDuplicateAlertError = (isset($response[0])) && (false !== strpos($response[0]["message"], "duplicate ")) && ($response[0]["errorCode"] == "UNKNOWN_EXCEPTION");
            if ( ! $isDuplicateAlertError) {
                throw new \Exception("bangkok16bInsertLead: response error. response=" . print_r($response, true));
            } else {
                $response["success"] = true;
            }

        }

        return $response;
    }


    // ----------------------------------------------------
    // 25th

    /**
     * 25thキャンペーンのリードデータをSFのLeadに登録する
     */
    public function s25GetLeadByNricFin($data)
    {
        // 実装時点ではデータの存在の確認だけできればOKのため、Countを取得している。
        $soql = "SELECT Count(Name) FROM Lead";
        $soql .= " WHERE NRIC_FIN__c ='{$data['nric_fin']}'";
        $soql = str_replace(' ', '+', $soql);

        $res = $this->sendSoqlRequest($soql);
        curl_close($res["curl"]);
        $jsonResponse = $res["jsonResponse"];
        $response     = json_decode($jsonResponse, true);
        if ( ! array_key_exists("done", $response) || ! array_key_exists("records", $response)
             || (0 == count($response['records'])) || ! array_key_exists("expr0", $response['records'][0])
        ) {
            throw new Exception("getExistActiveChangingRequest: response=" . print_r($response, true));
        }

        $cnt = $response['records'][0]['expr0'];

        return $cnt;
    }

    /**
     * 25thキャンペーンのリードデータをSFのLeadに登録する
     */
    public function s25InsertLead($data)
    {
        $keys = array(
            "E_ticket_number__c" => "eticket_number",
            "Title__c"           => "name_title",
            "FirstName"          => "first_name",
            "LastName"           => "last_name",
            "sex__c"             => "gender",
            "NRIC_FIN__c"        => "nric_fin",
            "Birthday__c"        => "birth_day",
            "Occupation__c"      => "occupation",
            // TODO: Tel__cでなくてOK？前回はTel__cに入れた
            "Mobile_phone__c"    => "tel",
            "Email"              => "email",
            "e_newsletter__c"    => "agree_newsletter",
            "Destination__c"     => "destination",
            'Company'            => 'company',
            'Status'             => 'status',
        );

        $args = array();
        foreach ($keys as $sfKey => $key) {
            if ( ! array_key_exists($key, $data)) {
                throw new \Exception("s25InsertLead: argument error. ${key} is not found.");
            }
            $args[$sfKey] = $data[$key];
        }

        $this->log("s25InsertLead: newRecord=" . print_r($args, true));

        // リクエスト
        $leadUrl = $this->sf_oauth->instance_url . "/services/data/v24.0/sobjects/Lead";
        $res     = $this->sendRestPostRequest($leadUrl, $args);
        $this->log("s25InsertLead: res=" . print_r($res, true));
        curl_close($res["curl"]);
        $jsonResponse = $res["json_response"];
        $response     = json_decode($jsonResponse, true);
        if ( ! is_array($response) || ! array_key_exists('success', $response) || ! $response["success"]) {
            // duplicate alertは無視

            // TODO: 確認
            // DuplicateAlertが出たとき、SFに重複レコードは登録されなかった。1個のみ。

            $isDuplicateAlertError = (isset($response[0])) && (false !== strpos($response[0]["message"], "duplicate ")) && ($response[0]["errorCode"] == "UNKNOWN_EXCEPTION");
            if ( ! $isDuplicateAlertError) {
                throw new \Exception("s25InsertLead: response error. response=" . print_r($response, true));
            } else {
                $response["success"] = true;
            }

        }

        return $response;
    }


    // ----------------------------------------------------
    // ninja wifi
    // 成田キャンペーン追加　2016/11/10

    /**
     * クーポンコードを取得.
     */
    public function getCouponCode($country, $reservationNumber, $market)
    {
        $args = array(
            'couponType'        => '',
            'reservationNumber' => $reservationNumber
        );

        $couponType = '3days';
        if ($market == 'am') {
            $couponType = '3days';
        } elseif ($market == 'pm') {
            $couponType = '4days';
        } elseif ($market == 'narita') {
            // 成田キャンペーン追加　2016/11/10
            $couponType = 'narita';
        } else {
            // 無効な国の場合
            throw new \Exception('argument error: unknwon country type.');
        }
        $args['couponType'] = $couponType;

        $this->log("getCouponCode: args=" . print_r($args, true));

        $url = $this->getApexRestUrl() . $this->getBaseRestApiUrl() . '/couponcode/tentativeassign';
        $res = $this->sendRestPostRequest($url, $args);
        curl_close($res["curl"]);
        $this->log(print_r($res, true));
        $jsonResponse = $res["json_response"];
        $response     = json_decode($jsonResponse, true);
        if ( ! array_key_exists("result", $response)) {
            throw new \Exception("request_error: getCounponCode. " . print_r($response, true));
        }
        $responseData = json_decode($response["resultData"], true);
        $couponCode   = ($response["result"] == "success") ? $responseData["couponCode"] : false;

        return $couponCode;
    }

    /**
     * リードにクーポン情報を入れる
     */
    public function insertLead($leadObj)
    {
        $keys = array(
            'AMC'                  => 'amc__c',
            'coupon_code'          => 'coupon_code__c',
            'Country_code'         => 'country_code__c',
            'E_newsletter'         => 'e_newsletter__c',
            'language'             => 'language__c',
            'origin'               => 'origin__c',
            'Reservation_number'   => 'reservation_number__c',
            'Sex'                  => 'sex__c',
            'Tel'                  => 'tel__c', // 標準項目には入れない仕様
            'Email'                => 'Email',
            'First_Name'           => 'FirstName',
            'Last_Name'            => 'LastName',
            'Country'              => 'residence_country__c', // 標準項目には入れない仕様
            'Company'              => 'Company',
            'status'               => 'Status',
            'Salutation_for_email' => 'Salutation_for_email__c',
            'DepartureDate'        => 'DepartureDate__c',
            'FlightNo'             => 'FlightNo__c',
        );

        $args = array();
        foreach ($keys as $key => $sfKey) {
            if ( ! array_key_exists($key, $leadObj)) {
                throw new \Exception("insert_lead: argument error.");
            }
            $args[$sfKey] = $leadObj[$key];
        }

        $this->log("insert_lead: newRecord=" . print_r($args, true));
        // リクエスト
        $leadUrl = $this->sf_oauth->instance_url . "/services/data/v24.0/sobjects/Lead";
        $res     = $this->sendRestPostRequest($leadUrl, $args);
        $this->log("insert_lead: res=" . print_r($res, true));
        curl_close($res["curl"]);
        $jsonResponse = $res["json_response"];
        $response     = json_decode($jsonResponse, true);
        if ( ! array_key_exists('success', $response) || ! $response["success"]) {
            throw new \Exception("insert_lead: response error. response=" . print_r($response, true));
        }

        return $response["success"];
    }

    /**
     * Naritaリードにクーポン情報を入れる
     */
    public function NaritainsertLead($leadObj)
    {
        $keys = array(
            'AMC'                  => 'amc__c',
            'coupon_code'          => 'coupon_code__c',
            'Country_code'         => 'country_code__c',
            'E_newsletter'         => 'e_newsletter__c',
            'language'             => 'language__c',
            'origin'               => 'origin__c',
            'Reservation_number'   => 'E_ticket_number__c',
            'Sex'                  => 'sex__c',
            'Tel'                  => 'tel__c', // 標準項目には入れない仕様
            'Email'                => 'Email',
            'First_Name'           => 'FirstName',
            'Last_Name'            => 'LastName',
            'Country'              => 'residence_country__c', // 標準項目には入れない仕様
            'Company'              => 'Company',
            'status'               => 'Status',
            'Salutation_for_email' => 'Salutation_for_email__c',
            'DepartureDate'        => 'DepartureDate__c',
            'FlightNo'             => 'FlightNo__c',
            'X2016_ANAUSA'         => 'X2016_ANAUSA__c',
            'Applied_Date'         => 'Applied_Date__c',
            'FlightNoUSA'          => 'FlightNoUSA__c',
        );

        $args = array();
        foreach ($keys as $key => $sfKey) {
            if ( ! array_key_exists($key, $leadObj)) {
                throw new \Exception("insert_lead: argument error.");
            }
            $args[$sfKey] = $leadObj[$key];
        }

        $this->log("insert_lead: newRecord=" . print_r($args, true));
        // リクエスト
        $leadUrl = $this->sf_oauth->instance_url . "/services/data/v24.0/sobjects/Lead";
        $res     = $this->sendRestPostRequest($leadUrl, $args);
        $this->log("insert_lead: res=" . print_r($res, true));
        curl_close($res["curl"]);
        $jsonResponse = $res["json_response"];
        $response     = json_decode($jsonResponse, true);
        if ( ! array_key_exists('success', $response) || ! $response["success"]) {
            throw new \Exception("insert_lead: response error. response=" . print_r($response, true));
        }

        return $response["success"];
    }

    /**
     * Naritaキャンペーンで登録されているリードをチケットナンバーで取得
     */
    public function NaritaGetLeadByTicketNumber($data)
    {
        // 実装時点ではデータの存在の確認だけできればOKのため、Countを取得している。
        $soql = "SELECT Count(Name) FROM Lead";
        $soql .= " WHERE E_ticket_number__c='{$data['Reservation_number']}' AND X2016_ANAUSA__c=True";
        $soql = str_replace(' ', '+', $soql);

        $res = $this->sendSoqlRequest($soql);
        curl_close($res["curl"]);
        $jsonResponse = $res["jsonResponse"];
        $response     = json_decode($jsonResponse, true);
        if ( ! array_key_exists("done", $response) || ! array_key_exists("records", $response)
             || (0 == count($response['records'])) || ! array_key_exists("expr0", $response['records'][0])
        ) {
            throw new Exception("getExistActiveChangingRequest: response=" . print_r($response, true));
        }

        $cnt = $response['records'][0]['expr0'];

        return $cnt;
    }


}
