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
    if(auth()->user()== null)
    return view('schools.homepage');
    else
    {
        $type = auth()->user()->type;
        if ($type == 1) {
            $name = Auth::user()->name;
            return view("schools.eICTuSchoolHomePage", compact('name'));
        }
        if ($type == 2) return view('teacher.homepage');
        if ($type == 3) {
                $data = \App\Student::select('*')
                    ->where('code', '=', auth()->user()->username)
                    ->get()->first();
                $classid = $data == null ? 0 : $data->class_id;
                $name = auth()->user()->name ;
            $avatar = $data== null ? $data->avatar==null ? "/img/user-image01.png" : $data->avatar."" : "/img/user-image01.png";
            return view("students.newfeed", compact('name', 'classid','avatar'));
        }
    }
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
// Route::get('/logout','Auth\LoginController@inde');
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