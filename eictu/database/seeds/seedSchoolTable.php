<?php

use Illuminate\Database\Seeder;
class seedSchoolTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\School::class, 10)->create();

    }
}
