<?php

use Illuminate\Database\Seeder;

use Illuminate\Database\Eloquent\Model;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // $this->call(seedUserTable::class);
         // $this->call(seedSchoolTable::class);
         // $this->call(MajorTableSeeder::class);
        // $this->call(ClassTableSeeder::class);
        // $this->call(StudentTableSeeder::class);
        $this->call(MotelTableSeeder::class);

         //    DB::table('users')->insert([
         // 'code' => str_random(10),
         // 'name' => str_random(10).'@gmail.com',
         // 'user_id' => rand(0, 80),
         // ]);
		//$this->call(NganhHocTableSeeder::class);
		
	//	$this->call(LopHocTableSeeder::class);
		
	//	$this->call(SinhVienTableSeeder::class);
    }
}
