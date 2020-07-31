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
Auth::routes();

Route::view('/', 'welcome')->name('welcome');
Route::prefix('room')->middleware('auth')->group(function () {
    Route::get('/', 'RoomController@index')->name('room.index');
    Route::post('/create', 'RoomController@create')->name('room.create');
    Route::get('/join/{secret}', 'RoomController@join')->name('room.join');
});
Route::post('/conversation', 'ConversationController@storeMessage');
Route::get('/home', 'HomeController@index')->name('home');
