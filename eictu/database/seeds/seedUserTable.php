<?php

use Illuminate\Database\Seeder;

class seedUserTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 2)->create();
    }
}
