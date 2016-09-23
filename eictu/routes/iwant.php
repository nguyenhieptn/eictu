<?php 

    Route::group(['prefix' => 'iwant', 'middleware'=>'auth'], function () {

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
});
 ?>