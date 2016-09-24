<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SinhVienTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,100) as $index) {
            DB::table('students')->insert([
                'code'=>'DTC125D480'.$faker->numberBetween(2010000,2020000),
                'name' => $faker->name,
                'gender' => $faker->numberBetween(1,2),
                'birthday' => $faker->date,
                'major_id' => 1,
                'class_id' => 1,
                'school_id' => 1,
            ]);
        }
    }
}
