<?php
	
/*===Quan ly ky tuc xa======*/
Route::group(['prefix' => 'dormitory'], function () {
	Route::get('/', function(){
		return redirect('dormitory/search');
	});
	Route::get('/update', 'DormitoryController@getUpdate');
	Route::post('/update', 'DormitoryController@postUpdate');
    Route::get('/search', ['as' => 'dormitory.getSearch', 'uses' => 'DormitoryController@getSearch']);
    Route::get('/query', ['as' => 'dormitory.postSearch', 'uses' => 'DormitoryController@postSearch']);

    Route::get('/logout', ['as' => 'dormitory.postSearch', 'uses' => 'DormitoryController@logout']);

});
/*=== het Quan ly ky tuc xa======*/

//Kakarot

Route::get('/searchDorm', 'DormitoryController@getSearch');