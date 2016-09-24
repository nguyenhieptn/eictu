<?php
/**
 * Created by PhpStorm.
 * User: Nguyen Hiep
 * Date: 9/21/2016
 * Time: 4:55 PM
 */

/* school section */
Route::get('schools','SchoolController@eICTuHomePage');
Route::get('schools/eICTuSchoolRegister','SchoolController@eICTuSchoolRegister');
Route::post('schools/rgm','SchoolController@add');
Route::post('schools/login','SchoolController@dangnhap');
Route::get('schools/eICTuSchoolAdminLogin','SchoolController@eICTuSchoolAdminLogin');
Route::get('schools/eICTuMajorList','SchoolController@eICTuMajorList');
Route::get('schools/eICTuMajorRegister','SchoolController@eICTuMajorRegister');
Route::get('schools/eICTuClassList','SchoolController@eICTuClassList');
Route::get('schools/eICTuClassRegister','SchoolController@eICTuClassRegister');
Route::post('schools/dangkynganh','SchoolController@dangkynganh');
Route::post('schools/dangkylop','SchoolController@dangkylop');

/* end school section */
