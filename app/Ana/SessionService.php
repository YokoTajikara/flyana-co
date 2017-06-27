<?php
namespace Ana;

use Illuminate\Http\Request;


/**
 * セッションサービス.
 */
class SessionService
{
    private $request = null;

    function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * セクションに対応するデータを取得.
     */
    public function getSectionData($section, $default = null)
    {
        $v = $this->request->session()->get($section, $default);
        return $v;
    }

    /**
     * セクションに対応するデータを保存.
     */
    public function putSectionData($section, $data)
    {
        $this->request->session()->put($section, $data);
    }

    /**
     * 値を保存.
     */
    public function put($section, $key, $value)
    {
        $sectionData = $this->getSectionData($section, array());
        if (is_null($sectionData)) {
            $sectionData = [];
        }
        $sectionData[$key] = $value;
        $this->putSectionData($section, $sectionData);
    }

    /**
     * 値を取得.
     */
    public function get($section, $key, $default = "")
    {
        $sectionData = $this->getSectionData($section, array());
        if (is_null($sectionData)) {
            $sectionData = [];
        }
        $v = array_key_exists($key, $sectionData) && !is_null($sectionData[$key]) ? $sectionData[$key] : $default;
        return $v;
    }

    /**
     * 指定した名前の値を保持しているか.
     */
    public function has($section, $key) {
        $v = $this->get($section, $key, null);
        $has = !is_null($v);
        return $has;
    }

    /**
     * 値を削除.
     */
    public function clear($section, $key)
    {
        $this->put($section, $key, null);
    }

    /**
     * 値を削除.
     */
    public function clearSectionData($section)
    {
        $this->putSectionData($section, null);
    }

    /**
     * セッションを破棄する.
     */
    public function clearAll()
    {
        $this->request->session()->flush();
        $this->request->session()->regenerate(true);
    }
}
