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
/* 
	Routes nhóm quản lý lớp học 
*/
Route::group(['prefix'=>'qllh'],function(){
	Route::get('/', ['as'=> 'qllh.trangchu','uses' => 'QLLopHoc@trangchu']);
	Route::get('dssv/{idlop}', ['as'=> 'qllh.dssvtronglop','uses' => 'QLLopHoc@dssv']);
	Route::get('phanlop/{idlop}', ['as'=> 'qllh.trangphanlop','uses' => 'QLLopHoc@trangphanlop']);
	Route::get('phanlop/table/{idlop}', ['as'=> 'qllh.trangphanlop','uses' => 'QLLopHoc@bangsvmoi']);
	Route::post('phanlop/{idlop}', ['as'=> 'qllh.phanlop','uses' => 'QLLopHoc@phanlop']);
	Route::get('sinhnhat/{idlop}', ['as'=> 'qllh.sinhnhat','uses' => 'QLLopHoc@sinhnhatbancunglop']);
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


/**
*  I WANT
**/
Route::group(['prefix' => 'iwant'], function(){
	
	Route::get('iWant/eICTuStudentDemandUpdate',[
	"uses"=>"IWantController@index", 
	"as"=>"iwant.index", 
	]);

	Route::get('iWant/eICTuStudentDemandSearch',[
	"uses"=>"IWantController@search", 
	"as"=>"iwant.search", 
	]);

	Route::get('iWant/eICTuStudentDemandDetail',[
	"uses"=>"IWantController@detail", 
	"as"=>"iwant.detail", 
	]);
});

/*FIND JOB*/
Route::group(['prefix' => 'findjob'], function(){

	Route::get('index', [
		'as'=>'findjob.index',
		'uses'=>'FindJob\FindJobControler@getIndex'

	]);
	Route::get('post', [
		'as'=>'findjob.post',
		'uses'=>'FindJob\FindJobControler@getPost'

	]);

	Route::get('detail', [
		'as'=>'findjob.detail',
		'uses'=>'FindJob\FindJobControler@getDetail'

	]);
});


