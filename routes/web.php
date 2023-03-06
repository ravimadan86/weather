<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::any('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::any('/next24', 'App\Http\Controllers\HomeController@next24')->name('next24');

Route::any('/next5days', 'App\Http\Controllers\HomeController@next5days')->name('next5days');
