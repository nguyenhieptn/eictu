<?php
/**
 * Created by PhpStorm.
 * User: Nguyen Hiep
 * Date: 9/21/2016
 * Time: 4:55 PM
 */

/* school section */
Route::get('/schools','SchoolController@index');
Route::get('/schools/eICTuSchoolRegister','SchoolController@eICTuSchoolRegister');
Route::post('schools/rgm','SchoolController@newstore');
Route::get('schools/login','SchoolController@vLogin');
Route::post('schools/login','SchoolController@login');
Route::get('schools/eICTuSchoolAdminLogin','SchoolController@eICTuSchoolAdminLogin');
Route::get('schools/eICTuMajorList','SchoolController@eICTuMajorList');
Route::get('schools/eICTuMajorRegister','SchoolController@eICTuMajorRegister');
Route::get('schools/eICTuClassList','SchoolController@eICTuClassList');
Route::get('schools/eICTuClassRegister','SchoolController@eICTuClassRegister');
Route::post('schools/dangkynganh','SchoolController@dangkynganh');
Route::post('schools/dangkylop','SchoolController@dangkylop');

Route::get('major/subjects/{subid}', 'MajorController@subject');
Route::get('major/createsubject/{majorid}', 'MajorController@createsubject');
Route::post('major/createsubject/data/{majorid}', 'MajorController@createsubjectpost');


/* end school section */
Route::get('indexmajor/subjects/{subid}', 'MajorController@indexsubject');
Route::get('indexmajor', 'MajorController@indexmajor');

