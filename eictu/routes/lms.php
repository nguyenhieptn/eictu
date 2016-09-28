<?php

Route::group(['prefix' => 'LMS'], function () {

    Route::get('show', [
        'as'   => 'LMS.lmsshow',
        'uses' => 'LMSController@getshow'

    ]);

    Route::get('update/{id}', [
        'as'   => 'LMS.lmsupdate',
        'uses' => 'LMSController@getupdate'

    ]);
    
});

Route::post('update/{id}','LMSController@update');
Route::post('/drop','LMSController@droptable');
Route::post('/create','LMSController@createtable');


