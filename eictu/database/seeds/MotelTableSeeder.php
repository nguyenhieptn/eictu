<?php

use Illuminate\Database\Seeder;

class MotelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Motel::class, 50)->create();
    }
}
