<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblSinhVienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		Schema::create('tbl_SinhVien', function (Blueprint $table) {
            $table->increments('id');
            $table->string('MaSV')->unique();
            $table->string('HoTen');
            $table->string('GioiTinh')->nullable();
			$table->date('NgaySinh')->nullable();
			$table->integer('id_Nganh')->nullable();
			$table->integer('id_Lop')->nullable();
			$table->integer('id_Truong')->nullable();
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
		Schema::drop('tbl_SinhVien');
    }
}
