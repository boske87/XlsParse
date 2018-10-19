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


Route::group(['prefix' => 'parse', ], function () {


    Route::get('/upload', ['as' => 'parse.upload', 'uses' => 'Parse\IndexController@index']);

    Route::post('/upload', ['as' => 'parse.upload', 'uses' => 'Parse\IndexController@uploadFile']);

    Route::get('/view-table', ['as' => 'parse.view-table', 'uses' => 'Parse\IndexController@viewTable']);


});