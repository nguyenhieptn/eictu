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

/* school section */
Route::get('/schools','SchoolController@index');
Route::get('schools/create','SchoolController@create');
Route::post('schools','SchoolController@store');
/* end school section */



