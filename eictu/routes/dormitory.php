<?php
	
/*===Quan ly ky tuc xa======*/
Route::group(['prefix' => 'dormitory'], function () {
	Route::get('/', function(){
		return redirect('dormitory/search');
	});
	Route::get('/update', 'DormitoryController@getUpdate');
    Route::get('/search', ['as' => 'dormitory.getSearch', 'uses' => 'DormitoryController@getSearch']);
    Route::get('/query', ['as' => 'dormitory.postSearch', 'uses' => 'DormitoryController@postSearch']);
});
/*=== het Quan ly ky tuc xa======*/