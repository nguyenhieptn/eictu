<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

<<<<<<< HEAD:eictu/database/migrations/2016_09_22_030804_create_have_table.php
class CreateHaveTable extends Migration
=======
class CreateHavesTable extends Migration
>>>>>>> 91137ffff41eddf8a12d57da0787caa10b500908:eictu/database/migrations/2016_09_22_143417_CreateHavesTable.php
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('have', function (Blueprint $table) {
            $table->increments('id');
            $table->text('content');
            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('have');
    }
}
