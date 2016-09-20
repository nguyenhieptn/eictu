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

/*===Quan ly ky tuc xa======*/
Route::group(['prefix' => 'ktx'], function(){
	Route::get('searchStudent', ['as'=> 'ktx.getSearch','uses' => 'QLKTX\SinhvienKtxController@getSearch']);
});
/*=== het Quan ly ky tuc xa======*/


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


/**
*  I WANT
**/
Route::get('iWant/eICTuStudentDemandUpdate',[
	"uses"=>"IWantController@index", 
	"as"=>"iWant.index", 
	]);

Route::get('iWant/eICTuStudentDemandSearch',[
	"uses"=>"IWantController@search", 
	"as"=>"iWant.search", 
	]);

Route::get('iWant/eICTuStudentDemandDetail',[
	"uses"=>"IWantController@detail", 
	"as"=>"iWant.detail", 
	]);

