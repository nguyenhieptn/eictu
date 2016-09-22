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
	Routes nhóm quản lý lớp h�?c
*/
Route::group(['prefix' => 'qllh'], function () {
    Route::get('/', ['as' => 'qllh.trangchu', 'uses' => 'QLLopHoc@trangchu']);
    Route::get('dssv/{idlop}', ['as' => 'qllh.dssvtronglop', 'uses' => 'QLLopHoc@dssv']);
    Route::get('phanlop/{idlop}', ['as' => 'qllh.trangphanlop', 'uses' => 'QLLopHoc@trangphanlop']);
    Route::get('phanlop/table/{idlop}', ['as' => 'qllh.trangphanlop', 'uses' => 'QLLopHoc@bangsvmoi']);
    Route::post('phanlop/{idlop}', ['as' => 'qllh.phanlop', 'uses' => 'QLLopHoc@phanlop']);
    Route::get('sinhnhat/{idlop}', ['as' => 'qllh.sinhnhat', 'uses' => 'QLLopHoc@sinhnhatbancunglop']);
});

Auth::routes();

Route::get('/home', 'HomeController@index');



/**
 *  I WANT
 **/
require_once("iwant.php");
require_once("classes.php");
require_once("school.php");
require_once("findjob.php");
require_once("renthouse.php");
require_once("teacher.php");
require_once("dormitory.php");
