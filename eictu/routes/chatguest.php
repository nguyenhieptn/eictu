<?php
/**
 * Created by PhpStorm.
 * User: Tungfpm
 * Date: 9/23/2016
 * Time: 4:51 PM
 */
//
//Route::get('/', function () {
//    return view('layouts/app');
//});


Route::get('guest/{student_id}',

    ['as' => '.guest',
        'uses' => 'ChatGuestController@guest']);


Route::get('chat/{slug}','ChatController@page');