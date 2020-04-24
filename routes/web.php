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

// Route::get('/', 'GmapsController@GMaps'); 
Route::get('/', 'GmapsController@Gmaps'); 

Route::get('/register','RegisterController@__construct');
Route::get('/login','LoginController@__construct');
Route::get('/home',function(){
    return view('home');
});
Route::get('/{car}','GmapsController@showCar');

Auth::routes(); //artisan created this

Route::get('/traker',function() {
    return view('traker');
});

Route::get('/addMarker','GmapsController@addMarker');


Route::get('/addCar','CarController@addCar');

