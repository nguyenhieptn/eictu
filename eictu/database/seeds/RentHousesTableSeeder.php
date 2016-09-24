<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class RentHousesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,1000) as $index) {
            DB::table('motels')->insert([
                'student_id'=>$faker->numberBetween(1,100),
                'hostess' => $faker->name,
                'address' => $faker->address,
                'date_join' => $faker->date,
            ]);
        }
    }
}
