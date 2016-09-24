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
    Route::get('/addDB', function(){
    	 for($i= 1; $i <= 5; $i++)
                DB::table('areas')->insert([
                'name'=> 'Khu '.$i,
            ]);
        for($i = 1; $i <= 100; $i+=3){
        	DB::table('dormitories')->insert([
        		'student_id' => $i,
        		'room' => rand(20, 100),
        		'building' => 'A'.rand(1, 11),
        		'area_id' => rand(1, 5),
        		'start_on'=> '2016-0'.rand(7,9).'-01'
        		]);
        }

        return 'ok';
    });

});
/*=== het Quan ly ky tuc xa======*/

//Kakarot

Route::get('/searchDorm', 'DormitoryController@getSearch');