<?php namespace App\Http\Controllers;

/**
 * トップ画面.
 */
class HomeController extends Controller {

	/**
	 */
	public function __construct()
	{
	}

	/**
	 */
	public function index()
	{
		return view('index');
	}

}
