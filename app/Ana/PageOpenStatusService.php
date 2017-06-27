<?php namespace Ana;

/** ページの表示制御.
 *
 */
class PageOpenStatusService
{
	/**
	 *
	 */
	function __construct($env = array())
	{
	}
	/**
	 * ninja wifi キャンペーンの開催期間かどうか.
	 */
	public function isOpenAnausaCampaignEntry()
	{
		// JST+9を基準。
		$closeDatetime = env("ANA_Anausa_CLOSE_DATETIME", "30000731150000");
		$open = date("YmdHis") < $closeDatetime;
		return $open;
	}

	/**
	 * ninja wifi キャンペーンの開催期間かどうか.
	 */
	public function isOpenNinjaWifiCampaignEntry()
	{
		// JST+9を基準。
		$closeDatetime = env("ANA_NINJAWIFI_CLOSE_DATETIME", "30000731150000");
		$open = date("YmdHis") < $closeDatetime;
		return $open;
	}


	/**
	 * 25thキャンペーンの開催期間かどうか.
	 */
	public function isOpen25thCampaignEntry()
	{
		// シンガポール時間2016/11/1 00:00:00に終了。
		$closeDatetime = env("ANA_25TH_CLOSE_DATETIME", "20161031160000");
		$open = date("YmdHis") < $closeDatetime;
		return $open;
	}

	/**
	 * タイ・バンコクキャンペーンの開催期間かどうか.
	 */
	public function isOpenBangkok16bCampaignEntry()
	{
		// JST 12/31 a.m.2:00終了。
		$ymd = "20161230";
		$his = "170000";
		$closeDatetime = env("ANA_BANGKOK16B_CLOSE_DATETIME", $ymd . $his);
		$open = date("YmdHis") < $closeDatetime;
		return $open;
	}

}
