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

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/pool', 'PoolController@index')->name('pool');
Route::post('savePicks', 'PoolController@savePicks')->name('savePicks');
Route::get('/admin', 'AdminController@index')->name('admin');
Route::post('/saveWins', "AdminController@saveWins")->name('saveWins');
