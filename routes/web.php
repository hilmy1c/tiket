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

Route::group(['prefix' => 'user'], function () {
    Route::get('/', 'UserController@index')->name('user.index');
    Route::get('/{id}/edit', 'UserController@edit')->name('user.edit');
    Route::put('/{id}', 'UserController@update')->name('user.update');
    Route::delete('/{id}/delete', 'UserController@destroy')->name('user.destroy');
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

Route::resource('/train_journey', 'TrainJourneyController');

Route::resource('/train_fare', 'TrainFareController');

Route::get('/booking/detail', 'BookingDetailController@index')->name('booking.detail');

Route::group(['prefix' => 'admin'], function() {
	Route::get('/register', 'Auth\AdminRegisterController@index')->name('admin.register');
	Route::post('/register', 'Auth\AdminRegisterController@register');
	Route::get('/home', 'AdminHomeController@index')->name('admin.home');
	Route::get('/login', 'Auth\AdminLoginController@index')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login');
	Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});

Route::group(['prefix' => 'booking'], function () {
    Route::get('/{id}/create', 'BookingController@create')->name('booking.create');
});

Route::post('/flight/search', 'FlightController@search')->name('flight.search');

Route::post('/flight/get_flight_number/{id}', 'FlightController@getFlightNumber');
