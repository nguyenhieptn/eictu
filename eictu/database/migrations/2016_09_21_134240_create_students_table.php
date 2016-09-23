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
            $table->integer('major_id')->nullable();
            $table->integer('class_id')->nullable();
            $table->date('birthday');
=======
            $table->dateTime('birthday');
            $table->integer('major_id')->nullable();
            $table->integer('class_id')->nullable();
            $table->date('birthday');
            $table->integer('major_id');
            $table->integer('class_id')->nullable();
            $table->integer('major_id')->nullable();
            $table->integer('class_id')->nullable();
            $table->date('birthday');
>>>>>>> db5c98ef3bf46b5013d1d933d0b062a36718fdc7
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
