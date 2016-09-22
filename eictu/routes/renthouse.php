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
Route::get('/rentHouse/update', 'RentHouseController@update');
Route::get('/rentHouse/delete', 'RentHouseController@delete');
Route::get('/rentHouse/search', 'RentHouseController@search');
Route::post('rentHouse', 'RentHouseController@store');
Route::post('rentHouse/search', 'RentHouseController@search');

/*end RentHouse section*/
?>