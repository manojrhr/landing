<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('coming');
})->name('root');
Route::get('/jetskis', function () {
    return view('web.listing');
})->name('root');

Auth::routes(['verify' => true]);
Route::get('/testapi', 'Web\HomeController@api')->name('api');

Route::get('/profile', 'HomeController@index')->name('profile');
Route::get('/home', 'Web\HomeController@index')->name('home');
// Route::get('/admin', 'AdminController@index')->name('AdminHome');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::group(['prefix' => 'user' , 'as' => 'user.'], function(){
	Route::get('/profile', 'Web\UserController@show_profile')->name('profile');
});

Route::group(['prefix' => 'admin' , 'as' => 'admin.'], function(){
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('login.submit');
	Route::get('/', 'Web\Admin\AdminController@index')->name('dashboard');
	Route::get('/logout', 'Auth\AdminLoginController@logout')->name('logout');

	Route::get('/users', 'Web\Admin\UserController@index')->name('users');
});


Route::get('/testmail', function () {
	Mail::send([], [], function ($message) {
		$message->to('manojrhr@gmail.com')
		->subject('Testing email from skiski')
    // here comes what you want
    // ->setBody('Hi, welcome user!'); // assuming text/plain
    // or:
    ->setBody('<h1>Hi, welcome user!</h1>', 'text/html'); // for HTML rich messages
});
})->name('testmail');