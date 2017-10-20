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



// --------------------------------------------------------
// email-en
Route::get("", "EmailController@registrationGet");
Route::get("/registration", "EmailController@registrationGet");
Route::post("/confirm", "EmailController@confirmPost");
Route::post("/thankyou", "EmailController@thankyouPost");
Route::get("/thankyou", "EmailController@thankyouget");

// email-kr
Route::get("/kr/", "KREmailController@registrationGet");
Route::get("/kr/registration", "KREmailController@registrationGet");
Route::post("/kr/confirm", "KREmailController@confirmPost");
Route::post("/kr/thankyou", "KREmailController@thankyouPost");
Route::get("/kr/thankyou", "KREmailController@thankyouget");

// email-hk
Route::get("/hk/", "HKEmailController@registrationGet");
Route::get("/hk/registration", "HKEmailController@registrationGet");
Route::post("/hk/confirm", "HKEmailController@confirmPost");
Route::post("/hk/thankyou", "HKEmailController@thankyouPost");
Route::get("/hk/thankyou", "HKEmailController@thankyouget");

// email-tw
Route::get("/tw/", "TWEmailController@registrationGet");
Route::get("/tw/registration", "TWEmailController@registrationGet");
Route::post("/tw/confirm", "TWEmailController@confirmPost");
Route::post("/tw/thankyou", "TWEmailController@thankyouPost");
Route::get("/tw/thankyou", "TWEmailController@thankyouget");

// email-th
Route::get("/th/", "THEmailController@registrationGet");
Route::get("/th/registration", "THEmailController@registrationGet");
Route::post("/th/confirm", "THEmailController@confirmPost");
Route::post("/th/thankyou", "THEmailController@thankyouPost");
Route::get("/th/thankyou", "THEmailController@thankyouget");

// email-id
Route::get("/id/", "IDEmailController@registrationGet");
Route::get("/id/registration", "IDEmailController@registrationGet");
Route::post("/id/confirm", "IDEmailController@confirmPost");
Route::post("/id/thankyou", "IDEmailController@thankyouPost");
Route::get("/id/thankyou", "IDEmailController@thankyouget");

// email-vn
Route::get("/vn/", "VNEmailController@registrationGet");
Route::get("/vn/registration", "VNEmailController@registrationGet");
Route::post("/vn/confirm", "VNEmailController@confirmPost");
Route::post("/vn/thankyou", "VNEmailController@thankyouPost");
Route::get("/vn/thankyou", "VNEmailController@thankyouget");


Route::get("/test", "TestController@test");