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
    	 
        for($i = 680; $i <= 750; $i+=2){
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
<<<<<<< HEAD

    Route::get('/removeAll',function(){
    	DB::table('areas')->all()->delete();
    	DB::table('dormitories')->all()->delete();
=======
<<<<<<< HEAD
    Route::get('/addST', function(){
    	$id = DB::table('students')->where('code', 'DTC125D4802010011')->first();
    	DB::table('dormitories')->where('id', 7)->update(['student_id' =>$id->id]);
=======
    
    Route::get('/removeAll',function(){
    	DB::table('areas')->all()->delete();
    	DB::table('dormitories')->all()->delete();
>>>>>>> 8b8427bff0a45ccc34ad4f360cbae4832ad0c74f
>>>>>>> cbb458f48b6ab8f5f3cf2b7ab970acdae6ca02e8
    });

    Route::get('/addST', function(){
    	$st = DB::table('students')->where('code','DTC125D4802010082')->first();
	    DB::table('dormitories')->where('id', 51)->update(['student_id'=>$st->id]);
	 return $st->id;
    });
	Route::get('/lcd', function(){
	    $c = DB::table('dormitories')->get();
	 return $c;
    });
});
/*=== het Quan ly ky tuc xa======*/

//Kakarot

Route::get('/searchDorm', 'DormitoryController@getSearch');
