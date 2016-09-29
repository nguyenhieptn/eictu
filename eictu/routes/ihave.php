<?php
Route::get('/iHave', 'IHaveController@search');
Route::get('/iHave/update/{id}', 'IHaveController@status','id');
Route::get('/iHave/detail/{id}', 'IHaveController@detail','id');
Route::post('iHave', 'IHaveController@store');
Route::get('iHave/action','IHaveController@action');
?>