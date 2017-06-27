<?php

namespace App\Exceptions;

use Ana\Logger as Logger;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exception\HttpResponseException;
use Illuminate\Validation\ValidationException;

class Handler extends ExceptionHandler
{
	/**
	 * A list of the exception types that should not be reported.
	 *
	 * @var array
	 */
	protected $dontReport = [
		AuthorizationException::class,
//		HttpException::class,
		ModelNotFoundException::class,
		ValidationException::class,
	];

	/**
	 * Report or log an exception.
	 *
	 * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
	 *
	 * @param  \Exception $e
	 * @return void
	 */
	public function report(Exception $e)
	{
		$errCode = spl_object_hash($e);
		if ($this->isHttpException($e)) {
			$statusCode = intval($e->getStatusCode());
			if (404 !== $statusCode) {
				$msg = 'error-code:' . $errCode . ', Exception::getMessage:' . $e->getMessage() . ', Exception::traceAsString:' . $e->getTraceAsString();
				Logger::logInfo($msg);
			}
		} else {
			$msg = 'error-code:' . $errCode . ', Exception::getMessage:' . $e->getMessage() . ', Exception::traceAsString:' . $e->getTraceAsString();
			Logger::logInfo($msg);
		}
		parent::report($e);
	}

	/**
	 * Render an exception into an HTTP response.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \Exception $e
	 * @return \Illuminate\Http\Response
	 */
	public function render($request, Exception $e)
	{
		$errCode = spl_object_hash($e);
		if ($this->isHttpException($e)) {
			$statusCode = intval($e->getStatusCode());
			if (404 !== $statusCode) {
				if ("staging" == env("APP_ENV", "")) {
					dd($e);
				}
				return redirect('https://' . $_SERVER['HTTP_HOST'] . '/system-error?code=' . $errCode);
			}
		} else {
            if($e instanceof HttpResponseException) {
                if($e->getResponse()->getStatusCode()==302) {
                    return parent::render($request, $e);
                }
            }
			if ("staging" == env("APP_ENV", "")) {
                dd($e);
			}
			return redirect('https://' . $_SERVER['HTTP_HOST'] . '/system-error?code=' . $errCode);
		}
		return parent::render($request, $e);
	}
}
