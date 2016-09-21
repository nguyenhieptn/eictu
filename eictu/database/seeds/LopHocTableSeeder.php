<?php

use Illuminate\Database\Seeder;

class LopHocTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		DB::table('tbl_lophoc')->insert(['tenlop' => 'CNTTK11A']);
		DB::table('tbl_lophoc')->insert(['tenlop' => 'CNTTK11B']);
		DB::table('tbl_lophoc')->insert(['tenlop' => 'CNTTK11C']);
		DB::table('tbl_lophoc')->insert(['tenlop' => 'KTPMK11A']);
    }
}
