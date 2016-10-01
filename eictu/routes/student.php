<?php
/**
 * Created by PhpStorm.
 * User: Kakarot
 * Date: 9/22/2016
 * Time: 4:55 PM
 */

/* student section */
Route::get('/student','StudentController@index');
Route::get('student/create','StudentController@create');
Route::post('students','StudentController@store');
Route::get('student/login','StudentController@vLogin');
Route::post('student/login','StudentController@login');
Route::get('student/impost','StudentController@impost');
Route::get('student/deleteall','StudentController@deleteall');
Route::get('student/adding','StudentController@AddingColum');
Route::get('student/newsfeed','StudentController@NewFeeds');
Route::get('student/profile','StudentController@profile');
Route::post('profile','StudentController@EditStudent');
/* end student section */


?>