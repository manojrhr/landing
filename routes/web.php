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

// Route::get('/', function () {
//     return view('coming');
// })->name('root');
Route::get('/', 'Web\HomeController@index')->name('home');
Route::get('/home', 'Web\HomeController@index')->name('homePage');

Auth::routes(['verify' => true]);

//TOURS
Route::get('/tours', 'Web\TourController@tours')->name('tours');
Route::get('/tour/{slug}', 'Web\TourController@single')->name('tour.single');
Route::post('/tour/get_prices', 'Web\TourController@get_prices')->name('tour.get_prices');
Route::post('/airport_transfer/get_prices', 'Web\AirportTransferController@get_prices')->name('get_airTransferPrice');

Route::post('/transfer/get_hotel_list', 'Web\TransferController@get_hotels')->name('get_hotels');
Route::post('/private_transfer/get_prices', 'Web\TransferController@get_private_price')->name('get_private_price');

//TRANSFERS
Route::get('/transfers', 'Web\TransferController@index')->name('transfers');
Route::get('/transfers/{slug}', 'Web\TransferController@transfers')->name('transfers.type');
// Route::view('/transfers/airport-transfers', 'web.transfers.airport');
//TRANSFERS
Route::get('/promotions', 'Web\PromotionController@index')->name('promotions');

Route::get('/blog', 'Web\BlogController@index')->name('blog');
Route::get('/blog/{slug}', 'Web\BlogController@single')->name('blog.single');

Route::post('booking/save/{slug}', 'Web\BookingController@save')->name('booking.save');
Route::get('booking/checkout/{slug}', 'Web\BookingController@checkout')->name('checkout');
Route::get('booking/paymentSuccess', 'Web\BookingController@paymentSuccess')->name('paymentSuccess');

Route::post('booking/transfer/{slug}', 'Web\BookingController@transfer')->name('booking.transfer.save');

// PAYPAL ROUTES
Route::get('paywithpaypal', array('as' => 'paywithpaypal','uses' => 'PaypalController@payWithPaypal',));
Route::post('paypal', array('as' => 'paypal','uses' => 'PaypalController@postPaymentWithpaypal',));
Route::get('paypal', array('as' => 'status','uses' => 'PaypalController@getPaymentStatus',));

//Route for Static Pages
Route::view('terms', 'pages.terms')->name('terms');
Route::view('contact-us', 'web.pages.contact')->name('contact_us');
Route::view('about', 'web.pages.about')->name('about');


Route::group(['prefix' => 'admin' , 'as' => 'admin.'], function(){
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('login.submit');
	Route::get('/', 'Web\Admin\AdminController@index')->name('dashboard');
	Route::get('/logout', 'Auth\AdminLoginController@logout')->name('logout');

	Route::get('/mar-all-as-read', 'Web\Admin\AdminController@markAllasRead')->name('markAllasRead');

	Route::get('/users', 'Web\Admin\UserController@index')->name('users');
	Route::get('/user/{id}', 'Web\Admin\UserController@single')->name('user.single');
	Route::post('/user-update/{id}', 'Web\Admin\UserController@updateDetails')->name('user.update');
	Route::post('/user-password-update/{id}', 'Web\Admin\UserController@updatePassword')->name('user.password.update');
	Route::get('/user/change_status/{id}', 'Web\Admin\UserController@change_status')->name('user.change_status');
    Route::get('/user/delete/{id}', 'Web\Admin\UserController@delete')->name('user.delete');

	Route::get('/category/create', 'Web\Admin\CategoryController@showForm')->name('category.create');
	Route::post('/category/create', 'Web\Admin\CategoryController@create')->name('category.create.post');
	Route::get('/category/{id}/edit', 'Web\Admin\CategoryController@edit')->name('category.edit');
	Route::post('/category/{id}/edit', 'Web\Admin\CategoryController@update')->name('category.edit.post');
	Route::get('/category/{id}/delete', 'Web\Admin\CategoryController@delete')->name('category.delete');
	Route::get('/category', 'Web\Admin\CategoryController@index')->name('category');
	Route::get('/category/delete/{id}', 'Web\Admin\CategoryController@delete')->name('category.delete');

	Route::get('/blogcategory/create', 'Web\Admin\BlogCategoryController@showForm')->name('blogcategory.create');
	Route::post('/blogcategory/create', 'Web\Admin\BlogCategoryController@create')->name('blogcategory.create.post');
	Route::get('/blogcategory/{id}/edit', 'Web\Admin\BlogCategoryController@edit')->name('blogcategory.edit');
	Route::post('/blogcategory/{id}/edit', 'Web\Admin\BlogCategoryController@update')->name('blogcategory.edit.post');
	Route::get('/blogcategory/{id}/delete', 'Web\Admin\BlogCategoryController@delete')->name('blogcategory.delete');
	Route::get('/blogcategory', 'Web\Admin\BlogCategoryController@index')->name('blogcategory');
	Route::get('/blogcategory/delete/{id}', 'Web\Admin\BlogCategoryController@delete')->name('blogcategory.delete');

	Route::get('/location/create', 'Web\Admin\LocationController@showform')->name('location.create');
	Route::get('/location', 'Web\Admin\LocationController@index')->name('location');
	Route::post('/location/save', 'Web\Admin\LocationController@create')->name('location.create.post');
	Route::post('/location/{id}/save', 'Web\Admin\LocationController@update')->name('location.update');
	Route::get('/location/{location}/edit', 'Web\Admin\LocationController@edit')->name('location.edit');
	Route::get('/location/{id}/delete', 'Web\Admin\LocationController@delete')->name('location.delete');
	Route::get('/location/delete/{id}', 'Web\Admin\LocationController@delete')->name('location.delete');
	Route::get('/location/status/{location}', 'Web\Admin\LocationController@toggleActive')->name('location_status');

	Route::get('/subcategory/create', 'Web\Admin\SubCategoryController@showForm')->name('subcategory.create');
	Route::post('/subcategory/create', 'Web\Admin\SubCategoryController@create')->name('subcategory.create.post');
	Route::get('/subcategory/{id}/edit', 'Web\Admin\SubCategoryController@edit')->name('subcategory.edit');
	Route::post('/subcategory/{id}/edit', 'Web\Admin\SubCategoryController@update')->name('subcategory.edit.post');
	Route::get('/subcategory/{id}/delete', 'Web\Admin\SubCategoryController@delete')->name('subcategory.delete');
	Route::get('/subcategory', 'Web\Admin\SubCategoryController@index')->name('subcategory');
	Route::get('/subcategory/delete/{id}', 'Web\Admin\SubCategoryController@delete')->name('subcategory.delete');
	
	Route::get('/tour', 'Web\Admin\TourController@index')->name('tour');
	Route::get('/tour/create', 'Web\Admin\TourController@showForm')->name('tour.create');
	Route::post('/tour/create', 'Web\Admin\TourController@create')->name('tour.create.post');
	Route::get('/tour/{id}/edit', 'Web\Admin\TourController@edit')->name('tour.edit');
	Route::post('/tour/{id}/edit', 'Web\Admin\TourController@update')->name('tour.edit.post');
	Route::get('/tour/delete/{id}', 'Web\Admin\TourController@delete')->name('tour.delete');
	Route::get('/tour/status/{tour}', 'Web\Admin\TourController@toggleActive')->name('tour_status');
	
	Route::post('/tour-option/{id}', 'Web\Admin\TourController@add_tour_options')->name('add_tour_options');
	Route::get('/tour-option/{id}/delete', 'Web\Admin\TourController@tour_option_delete')->name('tour_option_delete');
	Route::post('/get_option_details', 'Web\Admin\TourController@get_option_details')->name('getOptionDetails');
	Route::post('/update_tour_option', 'Web\Admin\TourController@update_tour_option')->name('update_tour_option');
	
	Route::get('update-email', 'Web\Admin\SettingController@getEmailUpdate')->name('getUpdateEmailForm');
	Route::post('update-email', 'Web\Admin\SettingController@updateAdminEmail')->name('updateEmail');
	Route::get('MaintenanceMode', 'Web\Admin\SettingController@MaintenanceMode')->name('MaintenanceMode');
	Route::get('maintenance-mode', 'Web\Admin\SettingController@maintenance')->name('maintenance');
	
	Route::get('/blog', 'Web\Admin\BlogController@index')->name('blog');
	Route::get('/blog/create', 'Web\Admin\BlogController@create')->name('blog.create');
	Route::post('/blog/create', 'Web\Admin\BlogController@store')->name('blog.store');
	Route::get('/blog/{id}/update', 'Web\Admin\BlogController@edit')->name('blog.edit');
	Route::post('/blog/{id}/update', 'Web\Admin\BlogController@update')->name('blog.update');
	Route::get('/blog/{id}/delete', 'Web\Admin\BlogController@delete')->name('blog.delete');

	Route::get('change-password', 'Web\Admin\SettingController@getChangePassword')->name('getChangePassword');
	Route::post('change-password', 'Web\Admin\SettingController@changePassword')->name('changePassword');

	Route::get('booking/{id?}', 'Web\Admin\BookingController@index')->name('bookings');
	Route::get('booking/single/{booking_id}', 'Web\Admin\BookingController@single')->name('booking.single');

	Route::get('airport-transfer', 'Web\Admin\TransferController@index')->name('airport.transfer');
	Route::post('add-shared', 'Web\Admin\TransferController@storeShared')->name('store.shared');

	Route::resource('page-component', 'Web\Admin\PageComponentController');
	Route::resource('gallery', 'Web\Admin\GalleryImagesController');
});

Route::post('/contact', 'Web\HomeController@contact')->name('post.contact');
Route::get('/page/{slug}', 'Web\PageController@show')->name('page');
Route::post('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::group(['prefix' => 'user' , 'as' => 'user.'], function(){
	Route::get('/my-account', 'Web\UserController@show_profile')->name('profile');
	Route::get('/update-profile', 'Web\UserController@edit_profile')->name('edit_profile');
	Route::post('/update-profile', 'Web\UserController@update_profile')->name('update_profile');

	Route::get('/verify-otp', 'Web\UserController@show_otp_form')->name('show_otp_form');
	Route::post('/verify-otp', 'Web\UserController@verify_otp')->name('verify_otp');

	Route::get('/change-password', 'Web\UserController@get_password_form')->name('get_password_form');
	Route::post('/update-password', 'Web\UserController@change_password')->name('change_password');

	Route::get('/bookings', 'Web\UserController@bookings')->name('bookings');
	Route::get('/booking/details/{booking_id}', 'Web\UserController@bookingDetails')->name('bookingDetails');

	Route::get('/addresses', 'Web\UserController@addresses')->name('addresses');
	Route::get('/address/{id}', 'Web\UserController@editAddress')->name('editAddress');
	Route::post('/address/{id}', 'Web\UserController@updateAddress')->name('updateAddress');
});



Route::get('/testmail', function () {
	Mail::send([], [], function ($message) {
		$message->to('manojrhr@gmail.com')
		->subject('Testing email from Kiuki')
    	->setBody('<h1>Hi, welcome user!</h1>', 'text/html'); // for HTML rich messages
	});
})->name('testmail');

Route::get('testnot', function(){
	$url="https://api.openweathermap.org/data/2.5/weather?q=Kingston,JM&appid=28f6c380a7c1905b50a97e289869b2fe&units=metric";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL,$url);
	$result=curl_exec($ch);
	curl_close($ch);

	// Will dump a beauty json :3
	$data = (object)json_decode($result, true);
	dump($data);
	dump($data->main['temp']);
	dd(json_decode($result, true));
});
