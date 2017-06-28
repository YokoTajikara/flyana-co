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
// ph-email
Route::get("ph-email", "PhEmailController@registrationGet");
Route::get("ph-email/registration", "PhEmailController@registrationGet");
Route::post("ph-email/confirm", "PhEmailController@confirmPost");
Route::post("ph-email/thankyou", "PhEmailController@thankyouPost");
