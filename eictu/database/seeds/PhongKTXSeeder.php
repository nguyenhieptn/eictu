<?php

use Illuminate\Database\Seeder;

class PhongKTXSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $t = 1;
        $x = 0;
        for($i = 199; $i < 216; $i++){

        	DB::table('tbl_phong_ktx')->insert(['building_id'=>11,'name'=>$i]);

        }
    }

}
