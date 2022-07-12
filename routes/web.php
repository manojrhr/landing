<?php

use App\Tour;
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

// Route::get('/', function () {
//     return view('coming');
// })->name('root');
Route::get('/', 'Web\HomeController@index')->name('home');
Route::get('/home', 'Web\HomeController@index')->name('homePage');

Auth::routes(['verify' => true]);

Route::get('pages/{slug}', 'Web\PageController@view_page')->name('viewPages');

Route::post('api', 'Web\PageController@api')->name('api');
//TOURS
// Route::get('/tour/{slug}', 'Web\TourController@single')->name('tour.single');
// Route::post('/tour/get_prices', 'Web\TourController@get_prices')->name('tour.get_prices');
// Route::post('/airport_transfer/get_prices', 'Web\AirportTransferController@get_prices')->name('get_airTransferPrice');

// Route::post('/transfer/get_hotel_list', 'Web\TransferController@get_hotels')->name('get_hotels');
// Route::post('/private_transfer/get_prices', 'Web\TransferController@get_private_price')->name('get_private_price');

//TRANSFERS
// Route::get('/transfers', 'Web\TransferController@index')->name('transfers');
// Route::get('/transfers/{slug}', 'Web\TransferController@transfers')->name('transfers.type');
// Route::view('/transfers/airport-transfers', 'web.transfers.airport');

//TRANSFERS
Route::get('/promotions', 'Web\PromotionController@index')->name('promotions');

Route::get('/blog', 'Web\BlogController@index')->name('blog');
Route::get('/blog/{slug}', 'Web\BlogController@single')->name('blog.single');

// Route::post('booking/save/{slug}', 'Web\BookingController@save')->name('booking.save');
// Route::get('booking/checkout/{slug}', 'Web\BookingController@checkout')->name('checkout');
// Route::get('booking/paymentSuccess', 'Web\BookingController@paymentSuccess')->name('paymentSuccess');

// Route::post('booking/transfer/{slug}', 'Web\BookingController@transfer')->name('booking.transfer.save');

// PAYPAL ROUTES
Route::get('paywithpaypal', array('as' => 'paywithpaypal','uses' => 'PaypalController@payWithPaypal',));
Route::post('paypal', array('as' => 'paypal','uses' => 'PaypalController@postPaymentWithpaypal',));
Route::get('paypal', array('as' => 'status','uses' => 'PaypalController@getPaymentStatus',));

//Route for Static Pages
// Route::view('terms', 'pages.terms')->name('terms');
// Route::view('contact-us', 'web.pages.contact')->name('contact_us');
// Route::view('about', 'web.pages.about')->name('about');


Route::group(['prefix' => 'admin' , 'as' => 'admin.'], function(){
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('login.submit');
	Route::get('/', 'Web\Admin\AdminController@index')->name('dashboard');
	Route::get('/logout', 'Auth\AdminLoginController@logout')->name('logout');
	
	Route::get('update-email', 'Web\Admin\SettingController@getEmailUpdate')->name('getUpdateEmailForm');
	Route::post('update-email', 'Web\Admin\SettingController@updateAdminEmail')->name('updateEmail');
	Route::get('MaintenanceMode', 'Web\Admin\SettingController@MaintenanceMode')->name('MaintenanceMode');
	Route::get('maintenance-mode', 'Web\Admin\SettingController@maintenance')->name('maintenance');

	Route::get('change-password', 'Web\Admin\SettingController@getChangePassword')->name('getChangePassword');
	Route::post('change-password', 'Web\Admin\SettingController@changePassword')->name('changePassword');

	Route::get('landing', 'Web\Admin\LandingController@index')->name('landing');
	Route::get('create/landing', 'Web\Admin\LandingController@create')->name('newlanding');
	Route::post('create/landing', 'Web\Admin\LandingController@add')->name('addLanding');
});