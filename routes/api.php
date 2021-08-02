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

Route::group(['prefix' => 'auth'], function () {
	Route::post('login', 'Api\AuthController@login');
	Route::post('signup', 'Api\AuthController@signup');
	Route::post('verify_otp', 'Api\AuthController@verify_otp');
	Route::post('resend_otp', 'Api\AuthController@resend_otp');
	Route::post('forgot_password', 'Api\AuthController@forgot');

	Route::group(['middleware' => 'auth:api'], function() {
		Route::get('logout', 'Api\AuthController@logout');
	});
});

Route::group(['middleware' => 'auth:api'], function() {
	Route::get('profile', 'Api\UserController@profile');
	Route::post('update_profile', 'Api\UserController@update_profile');
	Route::post('add_address', 'Api\UserController@add_address');
	Route::post('delete_address', 'Api\UserController@delete_address');
	Route::post('change_password', 'Api\UserController@change_password');
	
	Route::post('create_ticket', 'Api\TicketController@create_ticket');
	Route::post('accept_ticket', 'Api\TicketController@accept_ticket');
	Route::post('cancel_ticket', 'Api\TicketController@cancel_ticket');

	Route::get('open_ticket', 'Api\TicketController@getOpenTicket');
	Route::get('closed_ticket', 'Api\TicketController@getClosedTickets');
	Route::get('active_ticket', 'Api\TicketController@getActiveTickets');
});