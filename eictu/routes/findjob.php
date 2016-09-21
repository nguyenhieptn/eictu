<?php
/*FIND JOB*/
Route::group(['prefix' => 'findjob'], function () {

    Route::get('index', [
        'as'   => 'findjob.index',
        'uses' => 'FindJob\FindJobControler@getIndex'

    ]);
    Route::get('post', [
        'as'   => 'findjob.post',
        'uses' => 'FindJob\FindJobControler@getPost'

    ]);

    Route::get('detail', [
        'as'   => 'findjob.detail',
        'uses' => 'FindJob\FindJobControler@getDetail'

    ]);
});

