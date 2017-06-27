<?php namespace App\Http;

use Illuminate\Http\Request as HttpRequest;
use Request; // Facade

class AnaRequest extends HttpRequest
{

	//
	protected function prepareBaseUrl()
	{
		// 各サブディレクトリ内のindex.phpを配置してlaravelを利用できるように、
		// Routerのパス解決の基になるルートURLをindex.phpの場所ではなく、
		// public_pathとなるようにする
		$path = realpath(public_path());
		$url = str_replace($_SERVER["DOCUMENT_ROOT"], "/", $path);
		return $url;
	}

	/**
	 */
	public static function isHttps() {
		$https = false;
		if (('production' == env('APP_ENV', '')) || ('staging' == env('APP_ENV', ''))) {
			// heroku環境はRequest::secureで判定が不可
			$https = ("https" == array_get($_SERVER, 'HTTP_X_FORWARDED_PROTO', ""));
			if (false == $https) {
				$https = ("on" == array_get($_SERVER, 'HTTPS', ""));
			}
		} else {
			$https = Request::secure();
		}
		return $https;
	}

	// SSLにリダイレクト
	// ..呼び出し側Controllerは返り値がfalseでない場合、返り値をControllerメソッド内から返す
	public static function forceSecureRequest()
	{
		if (self::isHttps()) {
			return false;
		} else {
			$url = 'https://' . $_SERVER['HTTP_HOST'] . Request::getRequestUri();
			return redirect()->secure($url);
		}
	}

	/**
	 * Facebook自身のアクセスかどうか
	 */
	public static function isFacebookUserAgentAccess()
	{
		//$request->server('HTTP_USER_AGENT');
		$ua = $_SERVER["HTTP_USER_AGENT"];
		$isFb = (false !== strpos($ua, "facebookexternalhit"));
		return $isFb;
	}

	/**
	 * Twitter自身のアクセスかどうか
	 */
	public static function isTwitterUserAgentAccess()
	{
		//$request->server('HTTP_USER_AGENT');
		$ua = $_SERVER["HTTP_USER_AGENT"];
		$isTw = (false !== strpos($ua, "Twitterbot"));
		return $isTw;
	}
}
