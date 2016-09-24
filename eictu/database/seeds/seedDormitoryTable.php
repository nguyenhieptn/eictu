<?php

use Illuminate\Database\Seeder;

class seedDormitoryTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*//
        factory(App\Area::class, 10)->create();
        factory(App\Dormitory::class, 10)->create();*/
        for($i = 30; $i <= 100; $i+=3){
        	DB::table('dormitories')->insert([
        		'student_id' => $i,
        		'room' => rand(20, 100),
        		'building' => 'A'.rand(1, 11),
        		'area_id' => rand(1, 2),
        		'start_on'=> '2016-0'.rand(7,9).'-01'
        		]);
        }
    }
}
