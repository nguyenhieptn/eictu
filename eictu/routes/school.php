<?php
/**
 * Created by PhpStorm.
 * User: Nguyen Hiep
 * Date: 9/21/2016
 * Time: 4:55 PM
 */

/* school section */
Route::get('/schools','SchoolController@index');
Route::get('schools/create','SchoolController@create');
Route::post('schools','SchoolController@store');
/* end school section */
