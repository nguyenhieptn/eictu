<?php
/*FIND JOB*/
Route::group(['prefix' => 'findjob'], function () {

    Route::get('index', [
        'as' => 'findjob.index',
        'uses' => 'FindJobController@getIndex'
    ]);

    // Route::get('post', [
    //     'as' => 'findjob.post',
    //     'uses' => 'FindJobController@getPost'
    // ]);

    Route::post('post-add', [
        'as' => 'findjob.post.add',
        'uses' => 'FindJobController@addPost'
    ]);
    // ->middleware('auth');

    Route::get('detail/{id}', [
        'as' => 'findjob.detail',
        'uses' => 'FindJobController@getDetail'
    ]);

     Route::get('del', [
        'as' => 'findjob.index',
        'uses' => 'FindJobController@del'
    ]);


});

