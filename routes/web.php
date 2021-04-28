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

Route::view('/', 'welcome');

Auth::routes();

Route::get('/index', 'IndexController@index')->name('index');

Route::get('/pool', 'PoolController@index')->name('pool');
Route::get('/picks', 'PicksController@index')->name('picks');
Route::post('/picks/save', 'PoolController@save');

Route::get('/posoy-dos', 'PosoyDosController@index')->name('posoy-dos');

Route::get('/kings-cup', 'KingsCupController@index')->name('kings-cup');

Route::get('/hiit', 'HiitController@index')->name('hiit');
Route::get('/hiit/start', 'HiitController@start')->name('start-hiit');

Route::get('/power-hour', 'PowerHourController@index')->name('power-hour');
