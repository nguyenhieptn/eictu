<?php
/**
 * Created by PhpStorm.
 * User: Nguyen Hiep
 * Date: 9/21/2016
 * Time: 4:54 PM
 */

Route::group(['prefix' => 'classes'], function () {
	
    Route::get('/', 
	
		['as' => 'classes.home', 
		'uses' => 'ClassesController@index']
	);
    Route::get('studentlist/{classid}',
	
		['as' => 'classes.studentlist', 
		'uses' => 'ClassesController@studentlist']
	);
    Route::get('studentjoinclass/{classid}', 
		['as' => 'classes.studentjoinclass', 
		'uses' => 'ClassesController@studentjoinclasspage']
	);
    Route::get('studentjoinclass/waitingstudentlist/{classid}', 
	
		['as' => 'classes.waitingstudentlist', 
		'uses' => 'ClassesController@waitingstudentlist']
	);
    Route::post('studentjoinclass/{classid}', 
	
		['as' => 'classes.studentjoinclass', 
		'uses' => 'ClassesController@studentjoinclass']);
    Route::get('classmatersbirthday/{classid}', 
	
	['as' => 'classes.classmatersbirthday', 
	'uses' => 'ClassesController@classmatersbirthday']);
 	Route::get('logout', 
	
	['as' => 'classes.logout', 
	'uses' => 'ClassesController@logout']);
});
