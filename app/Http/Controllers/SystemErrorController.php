<?php namespace App\Http\Controllers;

use Ana\SalesforceService;
use Ana\Logger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Session;
use Crypt;
use App;

/**
 * システムエラー画面.
 */
class SystemErrorController extends Controller {

	/**
	 */
	public function __construct()
	{
	}

	/**
	 */
	public function index(Request $request)
	{
		$params = array();
		if (Input::has('code')) {
			$params['errorCode'] = Input::get('code', '');
		}
		return view('errors.500', $params);
	}

}
