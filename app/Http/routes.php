<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/system-error', 'SystemErrorController@index');

if ('staging' == env('APP_ENV')) {
	Route::get('/system-error-test7yr2', function () {
		throw new Exception('test:called system-error-test.');
	});
}

// --------------------------------------------------------
// 共通
//Route::get("/", "HomeController@index");

// --------------------------------------------------------
// bangkok16b
Route::get("bangkok16b","Bangkok16bController@index");
Route::get("bangkok16b/thai","Bangkok16bController@index_thai");
Route::get("bangkok16b/registration", "Bangkok16bController@registrationGet");
Route::post("bangkok16b/confirm", "Bangkok16bController@confirmPost");
Route::get("bangkok16b/thankyou", "Bangkok16bController@thankyouGet");
Route::post("bangkok16b/thankyou", "Bangkok16bController@thankyouPost");
Route::get("bangkok16b/registration-error", "Bangkok16bController@registrationErrorGet");
Route::get("bangkok16b/{dummy}","Bangkok16bController@index");
Route::get("bangkok16b/thai/{dummy}","Bangkok16bController@index_thai");


// --------------------------------------------------------
// 25th-Campaign
Route::get("singapore25", "Campaign25thController@indexGet");
Route::get("singapore25/japan", "Campaign25thController@japanGet");
Route::get("singapore25/na", "Campaign25thController@naGet");
Route::post("singapore25/registration", "Campaign25thController@registrationPost");
Route::get("singapore25/registration", "Campaign25thController@registrationGet");
Route::post("singapore25/confirm", "Campaign25thController@confirmPost");
Route::get("singapore25/thankyou", "Campaign25thController@thankyouGet");
Route::post("singapore25/thankyou", "Campaign25thController@thankyouPost");
Route::get("singapore25/registration-error", "Campaign25thController@registrationErrorGet");
Route::get("singapore25/tncs", "Campaign25thController@tncsGet");
Route::any("singapore25/{dummy?}", "Campaign25thController@indexGet");

// --------------------------------------------------------
// NinjaWifi-Campaign ～2016/7/31
// 顕在マーケット向けフォーム
Route::get('/ninjawifi', 'EntryController@indexJpAm');
Route::get('/ninjawifi/english', 'EntryController@indexEnAm');
Route::get('/ninjawifi/hkch', 'EntryController@indexHkAm');
Route::get('/ninjawifi/form', 'EntryController@input');
Route::post('/ninjawifi/form/input', 'EntryController@input');
Route::post('/ninjawifi/form/confirm', 'EntryController@confirm');
Route::post('/ninjawifi/form/complete', 'EntryController@complete');
Route::get('/ninjawifi/thanks', 'EntryController@thanks');
Route::post('/ninjawifi/thanks', 'EntryController@thanks');
Route::get('/ninjawifi/pardoterror', 'EntryController@pardoterror');
Route::get('/ninjawifi/error', 'EntryController@error');

// 潜在マーケット向けフォーム
Route::get('/ninjawifi/japanese-po', 'EntryController@indexJpPm');
Route::get('/ninjawifi/english-po', 'EntryController@indexEnPm');
Route::get('/ninjawifi/thai-po', 'EntryController@indexThPm');
Route::get('/ninjawifi/form-po', 'EntryController@input');
Route::post('/ninjawifi/form-po/input', 'EntryController@input');
Route::post('/ninjawifi/form-po/confirm', 'EntryController@confirm');
Route::post('/ninjawifi/form-po/complete', 'EntryController@complete');
Route::get('/ninjawifi/thanks-po', 'EntryController@thanks');
Route::post('/ninjawifi/thanks-po', 'EntryController@thanks');
Route::get('/ninjawifi/pardoterror-po', 'EntryController@pardoterror');
Route::get('/ninjawifi/error-po', 'EntryController@error');


// --------------------------------------------------------
// anausa-Campaign
/*
Route::get('/anausa', 'UsaEntryController@indexJp');
Route::get('/anausa/english', 'UsaEntryController@indexEn');
Route::get('/anausa/form', 'UsaEntryController@input');
Route::post('/anausa/form/input', 'UsaEntryController@input');
Route::post('/anausa/form/confirm', 'UsaEntryController@confirm');
Route::post('/anausa/form/complete', 'UsaEntryController@complete');
Route::get('/anausa/thanks', 'UsaEntryController@thanks');
Route::post('/anausa/thanks', 'UsaEntryController@thanks');
Route::get('/anausa/pardoterror', 'UsaEntryController@pardoterror');
Route::get('/anausa/error', 'UsaEntryController@error');
*/
//Route::get('/anausa', 'UsaEntryController@indexEn');
//Route::get('/anausa/jp', 'UsaEntryController@indexJp');
Route::get('/anausa/application', 'UsaEntryController@inputEn');
Route::post('/anausa/application/input', 'UsaEntryController@inputEn');
Route::post('/anausa/confirm', 'UsaEntryController@confirmEn');
Route::post('/anausa/complete', 'UsaEntryController@completeEn');
Route::get('/anausa/thankyou', 'UsaEntryController@thanks');
Route::post('/anausa/thankyou', 'UsaEntryController@thanks');

Route::get('/anausa/jp/application', 'UsaEntryController@inputJp');
Route::post('/anausa/jp/application/input', 'UsaEntryController@inputJp');
Route::post('/anausa/jp/confirm', 'UsaEntryController@confirmJp');
Route::post('/anausa/jp/complete', 'UsaEntryController@completeJp');
Route::get('/anausa/jp/thankyou', 'UsaEntryController@thanks');
Route::post('/anausa/jp/thankyou', 'UsaEntryController@thanks');

Route::get('/anausa/pardoterror', 'UsaEntryController@pardoterror');
Route::get('/anausa/error', 'UsaEntryController@error');


// --------------------------------------------------------
// anayose2017manila-Campaign
Route::get("anayose2017manila","Anayose2017manilaController@registrationGet");
Route::get("anayose2017manila/registration","Anayose2017manilaController@registrationGet");
Route::post("anayose2017manila/confirm","Anayose2017manilaController@confirmPost");
Route::post("anayose2017manila/thankyou","Anayose2017manilaController@thankyouPost");
Route::get("anayose2017manila/thankyou","Anayose2017manilaController@thankyouGet");


// --------------------------------------------------------
// kor-cpn-event1701-Campaign
Route::get("kor-cpn-event1701","KorCpnEvent1701Controller@registrationGet");
Route::get("kor-cpn-event1701/registration","KorCpnEvent1701Controller@registrationGet");
Route::post("kor-cpn-event1701/confirm","KorCpnEvent1701Controller@confirmPost");
Route::post("kor-cpn-event1701/thankyou","KorCpnEvent1701Controller@thankyouPost");
Route::get("kor-cpn-event1701/thankyou","KorCpnEvent1701Controller@thankyouGet");

// --------------------------------------------------------
// ph-email
Route::get("ph-email", "PhEmailController@registrationGet");
Route::get("ph-email/registration", "PhEmailController@registrationGet");
Route::post("ph-email/confirm", "PhEmailController@confirmPost");
Route::post("ph-email/thankyou", "PhEmailController@thankyouPost");
