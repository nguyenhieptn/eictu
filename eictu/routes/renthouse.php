<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 21/09/2016
 * Time: 6:56 CH
 */

/*RentHouse section*/
Route::get('/rentHouse', 'RentHouseController@index');
Route::get('/rentHouse/create', 'RentHouseController@create');
Route::post('rentHouse/create', 'RentHouseController@store');
Route::post('rentHouse', 'RentHouseController@index');

/*end RentHouse section*/
?>