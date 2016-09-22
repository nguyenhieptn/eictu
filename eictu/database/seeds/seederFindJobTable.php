<?php

use Illuminate\Database\Seeder;

class seederFindJobTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\FindJob::class, 50)->create();
    }
}
