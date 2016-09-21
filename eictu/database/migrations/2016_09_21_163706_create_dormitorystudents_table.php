<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDormitorystudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dormitorystudents', function(Blueprint $table){
            $table->increments('id');
            $table->integer('student_id');
            $table->integer('room_id')->unsigned();
            $table->foreign('room_id')->references('id')->on('dormitoryareas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('dormitorystudents');
    }
}
