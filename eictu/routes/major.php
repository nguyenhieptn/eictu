<?php
/**
 * Created by PhpStorm.
 * User: Optimus
 * Date: 16/09/21
 * Time: 18:47
 */
Route::get('/major', 'MajorController@index');
Route::get('major/create', 'MajorController@create');
Route::post('major/data', 'MajorController@createmajor');

Route::get('major/subjects/{subid}', 'MajorController@subject');

//Route::get('major/subjects', 'MajorController@createsubject');
Route::get('major/createsubject/{majorid}', 'MajorController@createsubject');
Route::post('major/createsubject/data/{majorid}', 'MajorController@createsubjectpost');
Route::post('/major', 'MajorController@createmajor');



