<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRenthouseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('renthouse', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_sinhvien');
            $table->string('hotenchunha');
            $table->string('diachinhatro');
            $table->date('ngayvaotro');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('renthouse');
    }
}
