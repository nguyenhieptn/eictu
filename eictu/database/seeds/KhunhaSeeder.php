<?php

use Illuminate\Database\Seeder;

class KhunhaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i = 1; $i <= 11; $i++){
        	DB::table('tbl_khunha_ktx')->insert([
        		'name' => 'A'.$i]);
        }
    }
}
