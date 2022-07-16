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

Route::get('/schedule','Saloon\ScheduleController@index')->name('schedule-index');
Route::post('/scheduleadd','Saloon\ScheduleController@store_schedule')->name('schedule-add');
Route::get('/booking','Booking\BookingController@index')->name('booking-index');
Route::post('/bookingadd','Booking\BookingController@store_book')->name('booking-add');
