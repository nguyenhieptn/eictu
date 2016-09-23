<?php

Route::group(['prefix' => 'LMS'], function () {

    Route::get('show', [
        'as'   => 'LMS.lmsshow',
        'uses' => 'LMSController@getshow'

    ]);
    Route::get('update', [
        'as'   => 'LMS.lmsupdate',
        'uses' => 'LMSController@getupdate'

    ]);
    
});
