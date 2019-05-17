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
    return view('home');
});

Route::get('/rules', function () {
    return view('rules');
});

Route::get('/schedule/{divisionId?}/{locationId?}/{teamId?}', 'IndexController@getSchedule');

Route::get('/standings', 'IndexController@getStandings');

Route::get('/contact', function () {
    return view('contact');
});

Auth::routes();

Route::get('/admin', 'AdminController@getIndex')->name('admin');