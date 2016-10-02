<?php 

    Route::group(['prefix' => 'iwant'], function () {

    Route::get('eICTuStudentDemandUpdate', [
        "uses" => "IWantController@getStatus",
        "as"   => "iwant.status",
    ]);
    Route::post('eICTuStudentDemandUpdate', [
        "uses" => "IWantController@postStatus",
    ]);

    Route::get('eICTuStudentDemandSearch', [
        "uses" => "IWantController@search",
        "as"   => "iwant.search",
    ]);

    Route::get('eICTuStudentDemandDetail/{id}', [
        "uses" => "IWantController@detail",
        "as"   => "iwant.detail",
    ]);

    Route::get('delete/{id}', [
        "uses" => "IWantController@delete",
        "as"   => "iwant.delete",
    ]);

    Route::get('edit/{id}', [
        "uses" => "IWantController@get_edit",
        "as"   => "iwant.edit",
    ]);
    Route::post('edit/{id}', [
        "uses" => "IWantController@post_edit",
    ]);


});
 ?>