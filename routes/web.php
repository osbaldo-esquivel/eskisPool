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

Route::get('/index', 'IndexController@index')->name('index');

Route::get('/picks', 'PicksController@index')->name('picks');
Route::get('/pool', 'PoolController@index')->name('pool');
Route::post('savePicks', 'PoolController@savePicks')->name('savePicks');
Route::get('/admin', 'AdminController@index')->name('admin');
Route::post('/saveWins', "AdminController@saveWins")->name('saveWins');

Route::get('/posoy_dos', 'PosoyDosController@index')->name('posoy_dos');
Route::get('/kings_cup', 'KingsCupController@index')->name('kings_cup');
