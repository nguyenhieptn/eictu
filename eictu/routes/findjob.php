<?php
/*FIND JOB*/
Route::group(['prefix' => 'findjob'], function () {

    Route::get('index', [
        'as' => 'findjob.index',
        'uses' => 'FindJobController@getIndex'
    ]);

    Route::get('post', [
        'as' => 'findjob.post',
        'uses' => 'FindJobController@getPost'
    ])->middleware('auth');

    Route::post('post-add', [
        'as' => 'findjob.post.add',
        'uses' => 'FindJobController@addPost'
    ]);

    Route::get('detail/{id}', [
        'as' => 'findjob.detail',
        'uses' => 'FindJobController@getDetail'
    ]);
});

