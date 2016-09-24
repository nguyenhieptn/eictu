<?php 
//, 'middleware'=>'auth'
    Route::group(['prefix' => 'teacher'], function () {

    Route::get('eICTuTeacherHomePage', [
        "uses" => "TeacherController@index",
        "as"   => "teacher.index",
    ]);

    Route::get('eICTuTeacherAddNew', [
        "uses" => "TeacherController@getAdd",
        "as"   => "teacher.add",
    ]);
    Route::post('eICTuTeacherAddNew', [
        "uses" => "TeacherController@postAdd",
    ]);

    Route::get('eICTuTeacherList', [
        "uses" => "TeacherController@getList",
        "as"   => "teacher.list",
    ]);

    Route::get('eICTuTeacherLogin', [
        "uses" => "TeacherController@getLogin",
        "as"   => "teacher.login",
    ]);

});
 ?>
