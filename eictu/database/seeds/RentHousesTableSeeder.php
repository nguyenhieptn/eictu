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
        foreach (range(1,10) as $index) {
            DB::table('renthouse')->insert([
                'id_sinhvien'=>'1',
                'hotenchunha' => $faker->name,
                'diachinhatro' => $faker->address,
                'ngayvaotro' => $faker->date,
            ]);
        }
    }
}
