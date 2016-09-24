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
    	 
        for($i = 1; $i <= 100; $i+=3){
        	DB::table('dormitories')->insert([
        		'student_id' => $i,
        		'room' => rand(20, 100),
        		'building' => 'A'.rand(1, 11),
        		'school_id' => 1,
        		'start_on'=> '2016-0'.rand(7,9).'-01'
        		]);
        }

        return 'ok';
    });
    
    Route::get('/removeAll',function(){
    	DB::table('areas')->all()->delete();
    	DB::table('dormitoies')->all()->delete();
    });

    Route::get('/addST', function(){
    	$st = DB::table('students')->where('code','DTC125D4802010082')->first();
	    DB::table('student')->where('id', 7)->update(['student_id'=>$st->id]);
    });

});
/*=== het Quan ly ky tuc xa======*/

//Kakarot

Route::get('/searchDorm', 'DormitoryController@getSearch');
