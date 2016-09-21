<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(seedUserTable::class);
         $this->call(seedUserTable::class);

		//$this->call(NganhHocTableSeeder::class);
		
	//	$this->call(LopHocTableSeeder::class);
		
	//	$this->call(SinhVienTableSeeder::class);
    }
}
