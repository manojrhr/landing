<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
	'prefix' => 'auth'
], function () {
	Route::post('login', 'Api\AuthController@login');
	Route::post('signup', 'Api\AuthController@signup');

	Route::group([
		'middleware' => 'auth:api'
	], function() {
		Route::get('logout', 'Api\AuthController@logout');
		Route::get('profile', 'Api\AuthController@profile');
	});
});

Route::group(['middleware' => 'auth:api'], function() {
	Route::post('update_profile', 'Api\UserController@update_profile');
});