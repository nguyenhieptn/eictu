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

Route::get('findjob/index', 'FindJobController@getIndex');
Route::get('/', function () {
    return view('schools.eICTuHomePage');
});

Route::get('/welcomeschool', function () {
    return view('welcome');
});
/*===Quan ly ky tuc xa======*/

Route::group(['prefix' => 'ktx'], function(){
	Route::get('searchStudent', ['as'=> 'ktx.getSearch','uses' => 'QLKTX\SinhvienKtxController@getSearch']);
});
/*=== het Quan ly ky tuc xa======*/

Auth::routes();
Route::get('/home', 'HomeController@index');



require_once("iwant.php");
require_once("classes.php");
require_once("school.php");
require_once("findjob.php");
require_once("renthouse.php");
require_once ("student.php");
require_once("teacher.php");
require_once("dormitory.php");
require_once("lms.php");
require_once("ihave.php");
require_once("chat.php");