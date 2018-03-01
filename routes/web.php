<?php

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

Route::get('/', 'HomeController@index');

Auth::routes();

use App\City;

Route::get('/coba', function ()
{
    $cities = City::where('island', 'Jawa')->orWhere('island', 'Sumatera')->get();

    dd($cities);
});

Route::group(['prefix' => 'user'], function () {
    Route::get('/', 'UserController@index')->name('user.index');
    Route::get('/{id}/edit', 'UserController@edit')->name('user.edit');
    Route::put('/{id}', 'UserController@update')->name('user.update');
    Route::delete('/{id}/delete', 'UserController@destroy')->name('user.destroy');
    Route::get('/{id}/booking_history', 'UserController@bookingHistory')->name('user.booking_history');
    Route::get('/{id}/history_detail', 'BookingController@historyDetail')->name('user.history_detail');
    Route::get('/{id}/train_history_detail', 'BookingController@trainHistoryDetail')->name('user.train_history_detail');
    Route::get('/{id}/account', 'UserController@account')->name('user.account');
    Route::get('/{id}/reset_password', 'UserController@resetPassword')->name('user.reset_password');
    Route::post('update_profile/{id}', 'UserController@updateProfile')->name('user.update_profile');
    Route::post('{id}/reset', 'UserController@reset')->name('user.reset');
});

Route::resource('/airplane', 'AirplaneController');

Route::resource('/airport', 'AirportController');

Route::resource('/city', 'CityController');

Route::resource('/train', 'TrainController');

Route::resource('/train_station', 'TrainStationController');

Route::resource('/airline', 'AirlineController');

Route::resource('/flight', 'FlightController');

Route::group(['prefix' => 'flight_fare'], function () {
    Route::get('/', 'FlightFareController@index')->name('flight_fare.index');
    Route::get('/{id}/create', 'FlightFareController@create')->name('flight_fare.create');
    Route::post('/store', 'FlightFareController@store')->name('flight_fare.store');
    Route::get('/{id}/edit', 'FlightFareController@edit')->name('flight_fare.edit');
    Route::put('/{id}', 'FlightFareController@update')->name('flight_fare.update');
    Route::delete('/{id}', 'FlightFareController@destroy')->name('flight_fare.destroy');
});

Route::group(['prefix' => 'train_fare'], function () {
    Route::get('/', 'TrainFareController@index')->name('train_fare.index');
    Route::get('/create/{id}', 'TrainFareController@create')->name('train_fare.create');
    Route::post('/store', 'TrainFareController@store')->name('train_fare.store');
    Route::get('/{id}/edit', 'TrainFareController@edit')->name('train_fare.edit');
    Route::put('/{id}', 'TrainFareController@update')->name('train_fare.update');
    Route::delete('/{id}', 'TrainFareController@destroy')->name('train_fare.destroy');
});

Route::get('/booking/detail', 'BookingDetailController@index')->name('booking.detail');

Route::group(['prefix' => 'admin'], function () {
	Route::get('/register', 'Auth\AdminRegisterController@index')->name('admin.register');
	Route::post('/register', 'Auth\AdminRegisterController@register');
	Route::get('/home', 'AdminHomeController@index')->name('admin.home');
	Route::get('/login', 'Auth\AdminLoginController@index')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login');
	Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});

Route::group(['prefix' => 'booking', 'middleware' => 'auth:admin'], function () {
    Route::get('/', 'BookingController@index')->name('booking.index');
    Route::get('/{id}/create', 'BookingController@create')->name('booking.create');
    Route::get('/{id}/payment', 'BookingController@payment')->name('booking.payment')->middleware('web');
    Route::get('/{id}/train_payment', 'BookingController@trainPayment')->name('booking.train_payment')->middleware('web');
    Route::get('/{id}/bank_account', 'BookingController@getBankAccount')->name('booking.bank_account')->middleware('web');
    Route::get('/{id}/train_bank_account', 'BookingController@getTrainBankAccount')->name('booking.train_bank_account')->middleware('web');
    Route::put('/{id}/update_payment', 'BookingController@updatePaymentStatus')->name('booking.update_payment');
    Route::get('/{id}', 'BookingController@delete')->name('booking.delete')->middleware('web');
    Route::delete('/{id}', 'BookingController@destroy')->name('booking.destroy');
    Route::post('/{id}/confirm_payment', 'BookingController@confirmPayment')->name('booking.confirm_payment');
    Route::post('/{id}/unconfirm_payment', 'BookingController@unconfirmPayment')->name('booking.unconfirm_payment');
    Route::get('/{id}/cetak_tiket', 'BookingController@cetakTiket')->name('booking.cetak_tiket')->middleware('web');
    Route::get('/{id}/train_cetak_tiket', 'BookingController@trainCetakTiket')->name('booking.train_cetak_tiket')->middleware('web');
    Route::get('/{id}/upload_pembayaran', 'BookingController@uploadPembayaran')->name('booking.upload_pembayaran');
    Route::get('/{id}/train_upload_pembayaran', 'BookingController@trainUploadPembayaran')->name('booking.train_upload_pembayaran')->middleware('web');
    Route::post('/{id}/simpan_file', 'BookingController@simpanFileBuktiPembayaran')->name('booking.simpan_file')->middleware('web');
});

Route::post('/flight/search', 'FlightController@search')->name('flight.search');

Route::post('/flight/get_flight_number/{id}', 'FlightController@getFlightNumber');

Route::group(['prefix' => 'passenger'], function () {
    Route::get('/', 'PassengerController@index')->name('passenger.index');
    Route::get('/{id}/create', 'PassengerController@create')->name('passenger.create');
    Route::get('/{id}/train_create', 'PassengerController@trainCreate')->name('passenger.train_create');
    Route::get('/{id}/edit', 'PassengerController@edit')->name('passenger.edit');
    Route::delete('/{id}', 'PassengerController@destroy')->name('passenger.destroy');
    Route::post('/store', 'PassengerController@store')->name('passenger.store');
    Route::post('/train_store', 'PassengerController@trainStore')->name('passenger.train_store');
});

Route::group(['prefix' => 'bank_account'], function () {
    Route::get('/', 'BankAccountController@index')->name('bank_account.index');
    Route::get('/create', 'BankAccountController@create')->name('bank_account.create');
    Route::post('/store', 'BankAccountController@store')->name('bank_account.store');
    Route::get('/{id}/edit', 'BankAccountController@edit')->name('bank_account.edit');
    Route::delete('/{id}', 'BankAccountController@destroy')->name('bank_account.destroy');
    Route::put('/{id}', 'BankAccountController@update')->name('bank_account.update');
});

Route::group(['prefix' => 'train_journey'], function () {
    Route::get('/search', 'TrainJourneyController@searchIndex')->name('train_journey.search_index');
    Route::post('/search', 'TrainJourneyController@search')->name('train_journey.search');
    Route::post('/search2', 'TrainJourneyController@search')->name('train_journey.search2');
    Route::get('/', 'TrainJourneyController@index')->name('train_journey.index');
    Route::get('/create', 'TrainJourneyController@create')->name('train_journey.create');
    Route::post('/', 'TrainJourneyController@store')->name('train_journey.store');
    Route::delete('/{id}', 'TrainJourneyController@destroy')->name('train_journey.destroy');
    Route::post('/get_station/{id}', 'TrainJourneyController@getStation')->name('train_journey.get_station');
    Route::get('/{id}/edit', 'TrainJourneyController@edit')->name('train_journey.edit');
    Route::post('/get_end_station/{id}', 'TrainJourneyController@getEndStation')->name('train_journey.get_end_station');
    Route::post('/edit_end_station/{id}', 'TrainJourneyController@editEndStation')->name('train_journey.edit_end_station');
    Route::post('/get_route_station/{id}', 'TrainJourneyController@getRouteStation')->name('train_journey.get_route_station');
    Route::post('/get_route/{id}', 'TrainJourneyController@getRoute')->name('train_journey.get_route');
    Route::post('/get_start_station/{id}', 'TrainJourneyController@getStartStation')->name('train_journey.get_start_station');
    Route::post('/edit_start_station/{id}', 'TrainJourneyController@editStartStation')->name('train_journey.edit_start_station');
    Route::put('/{id}', 'TrainJourneyController@update')->name('train_journey.update');
    Route::post('/get_train_seat_number/{id}', 'TrainJourneyController@getTrainSeatNumber')->name('train_journey.get_train_seat_number');
});

Route::resource('/train_route', 'TrainRouteController');

Route::group(['prefix' => 'train_route'], function () {
    Route::get('/create', 'TrainRouteController@create')->name('train_route.create');
    Route::post('/', 'TrainRouteController@store')->name('train_route.store');
    Route::get('/{id}/edit', 'TrainRouteController@edit')->name('train_route.edit');
    Route::put('/{id}', 'TrainRouteController@update')->name('train_route.update');
    Route::delete('/{id}', 'TrainRouteController@destroy')->name('train_route.destroy');
    Route::post('/get_station', 'TrainRouteController@getStation')->name('train_route.get_station');
    Route::post('/get_train_number/{id}', 'TrainRouteController@getTrainNumber')->name('train_route.get_train_number');
});