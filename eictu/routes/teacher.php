<?php 
//, 'middleware'=>'auth'
    Route::group(['prefix' => 'teacher'], function () {

    Route::get('eICTuTeacherHomePage', [
        "uses" => "TeacherController@index",
        "as"   => "Teacher.index",
    ]);

    Route::get('eICTuTeacherAddNew', [
        "uses" => "TeacherController@getAdd",
        "as"   => "Teacher.add",
    ]);
    Route::post('eICTuTeacherAddNew', [
        "uses" => "TeacherController@postAdd",
    ]);

    Route::get('eICTuTeacherList', [
        "uses" => "TeacherController@getList",
        "as"   => "Teacher.list",
    ]);

    Route::get('eICTuTeacherLogin', [
        "uses" => "TeacherController@getLogin",
        "as"   => "Teacher.login",
    ]);

});
 ?>