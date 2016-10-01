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

Route::get('chat_guest/guest','ChatController@guest');

Route::post('chat/friend', 'ChatController@search');

Route::post('chat_guest/guest', 'ChatGuestController@guest');

Route::post('chat/friendroom', 'ChatController@friendroom');

Route::get('chat/classrooms','ChatController@classroom');

Route::get('chat/classlist','ChatController@classlist');

Route::get('chat/{slug}','ChatController@page');