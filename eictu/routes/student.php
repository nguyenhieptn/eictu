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
/* end student section */

?>