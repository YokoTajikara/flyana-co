<?php namespace Ana;

use Log;

/**
 */
class Logger
{

	/**
	 */
	private static function makeLogMessage($obj, $level)
	{
		$keys = array(
			"HTTP_USER_AGENT", "HTTP_HOST", "HTTP_REFERER", "REQUEST_METHOD", "REMOTE_ADDR",
			"REMOTE_HOST",
			"HTTP_X_FORWARDED_FOR", "HTTP_X_FORWARDED_PROTO", "HTTP_X_FORWARDED_PORT",
			"HTTP_X_REQUEST_START", "HTTP_X_REQUEST_ID", "HTTP_VIA"
		);
		$httpInfo = "";
		foreach ($keys as $key) {
			if (array_key_exists($key, $_SERVER)) {
				$httpInfo .= $key . ":" . $_SERVER[$key] . ', ';
			} else {
				$httpInfo .= $key . ": NO VALUE, ";
			}
		}
		$httpInfo = substr($httpInfo, 0, strlen($httpInfo) - 2);

		$levelTag = '[' . strtoupper($level) . ']';
		$info = $levelTag . '[' . $httpInfo . ']' . print_r($obj, true);
		return $info;
	}

	/**
	 */
	private static function writeLog($str)
	{
		fputs(fopen('php://stdout', 'w'), $str . PHP_EOL);
		Log::info($str . PHP_EOL);
	}

	/**
	 */
	public static function logInfo($obj)
	{
		$str = Logger::makeLogMessage($obj, 'info');
		$str .= PHP_EOL;
		Logger::writeLog($str);
	}

	/**
	 */
	public static function logDebug($obj)
	{
		$str = Logger::makeLogMessage($obj, 'debug');
		$str .= PHP_EOL;
		Logger::writeLog($str);
	}

	/**
	 */
	public static function logError($obj)
	{
		$str = Logger::makeLogMessage($obj, 'error');
		$str .= PHP_EOL;
		Logger::writeLog($str);
	}

}
