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

Route::get('/user', 'UserController@index')->name('user.index');

Route::get('/user/{id}/edit', 'UserController@edit')->name('user.edit');

Route::put('/user/{id}', 'UserController@update')->name('user.update');

Route::delete('/user/{id}/delete', 'UserController@destroy')->name('user.destroy');

Route::resource('/airplane', 'AirplaneController');

Route::resource('/airport', 'AirportController');

Route::resource('/city', 'CityController');

Route::resource('/train', 'TrainController');

Route::resource('/train_station', 'TrainStationController');

Route::resource('/airline', 'AirlineController');

Route::resource('/flight', 'FlightController');