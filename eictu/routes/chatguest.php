<?php
/**
 * Created by PhpStorm.
 * User: Tungfpm
 * Date: 9/23/2016
 * Time: 4:51 PM
 */

Route::post('chatguest/guestroom', 'ChatGuestController@guestroom');


Route::get('chatguest/{slug}','ChatGuestController@page');
