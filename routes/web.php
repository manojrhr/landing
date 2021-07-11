<?php

use Illuminate\Support\Facades\Route;
use App\JetSki;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('coming');
// })->name('root');
Route::get('/', 'Web\HomeController@index')->name('home');

Auth::routes(['verify' => true]);

//Route for Static Pages
Route::get('/page/{slug}', 'Web\PageController@show')->name('page');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::group(['prefix' => 'user' , 'as' => 'user.'], function(){
	Route::get('/profile', 'Web\UserController@show_profile')->name('profile');
	Route::get('/update-profile', 'Web\UserController@edit_profile')->name('edit_profile');
	Route::post('/update-profile', 'Web\UserController@update_profile')->name('update_profile');
	
	Route::get('/verify-otp', 'Web\UserController@show_otp_form')->name('show_otp_form');
	Route::post('/verify-otp', 'Web\UserController@verify_otp')->name('verify_otp');
});

Route::group(['prefix' => 'admin' , 'as' => 'admin.'], function(){
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('login.submit');
	Route::get('/', 'Web\Admin\AdminController@index')->name('dashboard');
	Route::get('/logout', 'Auth\AdminLoginController@logout')->name('logout');

	Route::get('/users', 'Web\Admin\UserController@index')->name('users');
	Route::get('/delivery-guy', 'Web\Admin\UserController@dlivery_guy')->name('delivery_guy');
	Route::get('/user/{id}', 'Web\Admin\UserController@single')->name('user.single');
	Route::post('/user-update/{id}', 'Web\Admin\UserController@updateDetails')->name('user.update');
	Route::post('/user-password-update/{id}', 'Web\Admin\UserController@updatePassword')->name('user.password.update');
	Route::get('/user/change_status/{id}', 'Web\Admin\UserController@change_status')->name('user.change_status');
	Route::get('/user/delete/{id}', 'Web\Admin\UserController@delete')->name('user.delete');
});


Route::get('/testmail', function () {
	Mail::send([], [], function ($message) {
		$message->to('manojrhr@gmail.com')
		->subject('Testing email from skiski')
    ->setBody('<h1>Hi, welcome user!</h1>', 'text/html'); // for HTML rich messages
});
})->name('testmail');

Route::get('/testsms', function () {
	sendSms();
})->name('testsms');