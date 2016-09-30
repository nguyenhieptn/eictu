<?php
/*FIND JOB*/
Route::group(['prefix' => 'findjob'], function () {

    Route::get('index', [
        'as' => 'findjob.index',
        'uses' => 'FindJobController@getIndex'
    ]);

    Route::post('post-add', [
        'as' => 'findjob.post.add',
        'uses' => 'FindJobController@addPost'
    ]);

    Route::get('detail/{id}', [
        'as' => 'findjob.detail',
        'uses' => 'FindJobController@getDetail'
    ]);

    Route::get('/data',[
        'as' => 'findjob.data',
        'uses' => 'FindJobController@data'
    ]);

    Route::get('/total',[
        'as' => 'findjob.total',
        'uses' => 'FindJobController@total'
    ]);

     Route::get('/del/{id}',[
        'as' => 'findjob.del',
        'uses' => 'FindJobController@del'
    ]);

    Route::get('/edit/{id}',[
        'as' => 'findjob.edit',
        'uses' => 'FindJobController@edit'
    ]);

    Route::post('/update/{id}',[
        'as' => 'findjob.update',
        'uses' => 'FindJobController@update'
    ]);


});

