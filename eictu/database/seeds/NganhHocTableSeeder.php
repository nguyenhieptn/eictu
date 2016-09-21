<?php

use Illuminate\Database\Seeder;

class NganhHocTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		DB::table('tbl_nganhhoc')->insert(['manganh' => 'CNTT','tennganh' => 'Công nghệ thông tin']);
		DB::table('tbl_nganhhoc')->insert(['manganh' => 'HTTT KT','tennganh' => 'Hệ thống thông tin KT']);
		DB::table('tbl_nganhhoc')->insert(['manganh' => 'ĐKTĐ','tennganh' => 'Điều khiển tự động']);
    }
}
