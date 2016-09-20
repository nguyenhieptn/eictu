<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');


/*RentHouse section*/
Route::get('/renthouses','RentHousesController@index');
Route::get('/renthouses/create','RentHousesController@create');
Route::get('/renthouses/update','RentHousesController@update');
Route::get('/renthouses/delete','RentHousesController@delete');
Route::get('/renthouses/search','RentHousesController@search');
Route::post('/renthouses','RentHousesController@store');
Route::post('/renthouses_search','RentHousesController@search');

/*end RentHouse section*/

/* school section */
Route::get('/schools','SchoolController@index');
Route::get('schools/create','SchoolController@create');
Route::post('schools','SchoolController@store');
/* end school section */



