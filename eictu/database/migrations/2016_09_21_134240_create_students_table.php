<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->string('name');
            $table->boolean('gender');
<<<<<<< HEAD
            $table->date('birthday');
            $table->integer('major_id');
            $table->integer('class_id')->nullable();;
=======
            $table->integer('major_id')->nullable();
            $table->integer('class_id')->nullable();
            $table->date('birthday');
>>>>>>> f6307246a8ca51ba32cd9bd1f502ef4376d01dce
            $table->integer('school_id')->unsigned();
            $table->foreign('school_id')->references('id')->on('schools');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('students');
    }
}
