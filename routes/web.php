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

Route::get('/', function () {
    return view('welcome');
});
Route::post('ajax/register', 'ColaController@create')->name('register');
Route::get('ajax/all', 'ColaController@getData')->name('allData');
Route::get('ajax/deleone', 'ColaController@deleteOne')->name('DeleteOne');
Route::get('ajax/deletetwo', 'ColaController@deleteTwo')->name('DeleteTwo');
