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
Route::get("/kr/", "EmailController@registrationGetKR");
Route::get("/kr/registration", "EmailController@registrationGetKR");
Route::post("/kr/confirm", "EmailController@confirmPostKR");
Route::post("/kr/thankyou", "EmailController@thankyouPostKR");
Route::get("/kr/thankyou", "EmailController@thankyougetKR");

// email-hk
Route::get("/hk/", "EmailController@registrationGetHK");
Route::get("/hk/registration", "EmailController@registrationGetHK");
Route::post("/hk/confirm", "EmailController@confirmPostHK");
Route::post("/hk/thankyou", "EmailController@thankyouPostHK");
Route::get("/hk/thankyou", "EmailController@thankyougetHK");

// email-tw
Route::get("/tw/", "EmailController@registrationGetTW");
Route::get("/tw/registration", "EmailController@registrationGetTW");
Route::post("/tw/confirm", "EmailController@confirmPostTW");
Route::post("/tw/thankyou", "EmailController@thankyouPostTW");
Route::get("/tw/thankyou", "EmailController@thankyougetTW");

// email-th
Route::get("/th/", "EmailController@registrationGetTH");
Route::get("/th/registration", "EmailController@registrationGetTH");
Route::post("/th/confirm", "EmailController@confirmPostTH");
Route::post("/th/thankyou", "EmailController@thankyouPostTH");
Route::get("/th/thankyou", "EmailController@thankyougetTH");

// email-id
Route::get("/id/", "EmailController@registrationGetID");
Route::get("/id/registration", "EmailController@registrationGetID");
Route::post("/id/confirm", "EmailController@confirmPostID");
Route::post("/id/thankyou", "EmailController@thankyouPostID");
Route::get("/id/thankyou", "EmailController@thankyougetID");

// email-vn
Route::get("/vn/", "EmailController@registrationGetVN");
Route::get("/vn/registration", "EmailController@registrationGetVN");
Route::post("/vn/confirm", "EmailController@confirmPostVN");
Route::post("/vn/thankyou", "EmailController@thankyouPostVN");
Route::get("/vn/thankyou", "EmailController@thankyougetVN");
Route::get("/test", "TestController@test");