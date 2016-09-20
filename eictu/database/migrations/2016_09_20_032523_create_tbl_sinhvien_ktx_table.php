<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblSinhvienKtxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tbl_sinhvien_ktx', function(Blueprint $table){
            $table->increments('id');
            $table->string('student_id');
            $table->integer('room_id')->unsigned();
            $table->foreign('room_id')->references('id')->on('tbl_phong_ktx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('tbl_sinhvien_ktx');
    }
}
