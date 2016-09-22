<?php
	
/*===Quan ly ky tuc xa======*/
Route::group(['prefix' => 'dormitory'], function () {
    Route::get('searchStudent', ['as' => 'dormitory.getSearch', 'uses' => 'DormitoryController@getSearch']);
});
/*=== het Quan ly ky tuc xa======*/