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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

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

Route::resource('/flight_fare', 'FlightFareController');

Route::resource('/train_journey', 'TrainJourneyController');

Route::resource('/train_fare', 'TrainFareController');

Route::resource('/booking_detail', 'BookingDetailController');

Route::resource('/booking', 'BookingController');

Route::group(['prefix' => 'admin'], function() {
	Route::get('/register', 'Auth\AdminRegisterController@index')->name('admin.register');
	Route::post('/register', 'Auth\AdminRegisterController@register');
	Route::get('/home', 'AdminHomeController@index')->name('admin.home');
	Route::get('/login', 'Auth\AdminLoginController@index')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login');
	Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});