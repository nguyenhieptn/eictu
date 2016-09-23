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


Route::get('chat/friend','ChatController@friend');

Route::post('/search', function(){
    var_dump($_POST);
});

Route::get('chat/{slug}','ChatController@page');