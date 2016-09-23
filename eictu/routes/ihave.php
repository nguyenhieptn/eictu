<?php
Route::get('/iHave', 'IHaveController@search');
Route::get('/iHave/update', 'IHaveController@update');
Route::get('/iHave/detail/{id}', 'IHaveController@detail','id');
Route::post('iHave/update', 'IHaveController@store');

?>