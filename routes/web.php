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

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'AdminController@index')->name('home');
Route::get('/', 'AdminController@index');
Route::get('/admin', 'AdminController@index');
Route::get('/error/{message}', 'HomeController@error')->name('error');

Route::any('/messagetest', 'BarionController@messagetest');

//all 'm' prefix route to BaseMoController
Route::group(['prefix' => 'm'],function () {
  
Route::any('/{route}', 'BaseMoController@baseWithRoute');
Route::any('/{route}/{task}', 'BaseMoController@baseWithRoute');
Route::any('/{route}/{task}/{id}', 'BaseMoController@baseWithRoute');
Route::any('/{route}/{task}/{id}/{id1}', 'BaseMoController@baseWithRoute');

});
Route::get('/pdf/{id}', 'HomeController@pdf')->name('pdf');

Route::group(['prefix' => 'a'],function () {
    Route::any('/postStoredsData', 'StoredController@postStoredsData');
    Route::any('/getStoreds/{year}/{month}/{cegid}', 'StoredController@getStoreds');
    Route::any('/refreshStoreds/{year}/{month}/{cegid}', 'StoredController@refreshStoreds');  
    Route::any('/zarStoreds/{year}/{month}/{cegid}/{id}', 'StoredController@zarStoreds'); 
    Route::any('/nyitStoreds/{year}/{month}/{cegid}/{id}', 'StoredController@nyitStoreds'); 
    Route::any('/timeframes', 'StoredController@timeframes');
});