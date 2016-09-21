<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 21/09/2016
 * Time: 6:56 CH
 */

/*RentHouse section*/
Route::get('/rentHouse', 'RentHousesController@index');
Route::get('/rentHouse/create', 'RentHousesController@create');
Route::get('/rentHouse/update', 'RentHousesController@update');
Route::get('/rentHouse/delete', 'RentHousesController@delete');
Route::get('/rentHouse/search', 'RentHousesController@search');
Route::post('rentHouse', 'RentHousesController@store');
Route::post('rentHouse_search', 'RentHousesController@search');

/*end RentHouse section*/
?>