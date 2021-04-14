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

// Route::get('/jetskies', function () {
// 	// $rows = array([],[],[],[],[],[]);
// 	$rows = \App\JetSki::all();
//     return view('web.listing', compact('rows'));
// })->name('listing');

// Route::get('/jetski-details', function () {
//     return view('web.details');
// })->name('details');

Auth::routes(['verify' => true]);

Route::post('/get/models', 'Web\JetskiController@models')->name('loadModels');

//Route for Static Pages
Route::get('/page/{slug}', 'Web\pageController@show')->name('page');

// Route::get('/profile', 'HomeController@index')->name('profile');
Route::get('/home', 'Web\HomeController@index')->name('home');
Route::get('/jetskies', 'Web\JetskiController@index')->name('listing');
Route::get('/jetski/{slug}', 'Web\JetskiController@details')->name('jetski_detail');
Route::get('/jetski/booking/{slug}', 'Web\BookingController@index')->name('booking');
Route::post('/jetski/booking/{slug}', 'Web\BookingController@save')->name('save.booking');

// Route::get('/admin', 'AdminController@index')->name('AdminHome');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::group(['middleware' => ['auth']], function() {
	Route::get('/add/jetski','Web\JetskiController@addJetSki')->name('add.jetski');
	Route::post('/add/jetski','Web\JetskiController@saveJetSki')->name('save.jetski');
});

Route::group(['prefix' => 'user' , 'as' => 'user.'], function(){
	Route::get('/profile', 'Web\UserController@show_profile')->name('profile');
	Route::get('/update-profile', 'Web\UserController@edit_profile')->name('edit_profile');
	Route::post('/update-profile', 'Web\UserController@update_profile')->name('update_profile');
	
	Route::get('stripe/{id}', 'Web\SellerController@redirectToStripe')->name('redirect_stripe');
	Route::get('connect/{token}', 'Web\SellerController@saveStripeAccount')->name('save_stripe');
});

Route::group(['prefix' => 'admin' , 'as' => 'admin.'], function(){
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('login.submit');
	Route::get('/', 'Web\Admin\AdminController@index')->name('dashboard');
	Route::get('/logout', 'Auth\AdminLoginController@logout')->name('logout');
	
	Route::get('/makes', 'Web\Admin\MakeController@index')->name('makes');
	Route::post('/makes', 'Web\Admin\MakeController@store')->name('make.create');
	Route::get('/make/single/{id}', 'Web\Admin\MakeController@single')->name('make.single');
	Route::get('/make/delete/{id}', 'Web\Admin\MakeController@delete')->name('make.delete');
	
	Route::post('/model/create/{id}', 'Web\Admin\MakeController@storeModel')->name('model.create');
	Route::get('/model/delete/{id}', 'Web\Admin\MakeController@deleteModel')->name('model.delete');

	Route::get('/users', 'Web\Admin\UserController@index')->name('users');
	Route::get('/user/delete/{id}', 'Web\Admin\UserController@delete')->name('user.delete');
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