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
<<<<<<< HEAD
        DB::table('schools')
		->insert(['code' =>'ICTU', 'name' => 'CNTT TT TN','user_id'=>'1']);
=======
        // $this->call(seedUserTable::class);
        // $this->call(NganhHocTableSeeder::class);
        // $this->call(LopHocTableSeeder::class);
        // $this->call(SinhVienTableSeeder::class);
        // $this->call(seedUserTable::class);
        // $this->call(seedSchoolTable::class);
        // $this->call(MajorTableSeeder::class);
        // $this->call(ClassTableSeeder::class);
        // $this->call(StudentTableSeeder::class);
        $this->call(MotelTableSeeder::class);
        // $this->call(TeacherTableSeeder::class);
>>>>>>> 7709b3511774adaf4e6fdf2a9bd9dc6b8d7a7790

		DB::table('majors')->insert(['code' =>'CNTT', 'name' => 'Công nghệ thông tin']);
		DB::table('majors')->insert(['code' =>'HTTTKT', 'name' => 'HTTT Kinh tế']);
		DB::table('majors')->insert(['code' =>'ĐKTĐ', 'name' => 'Điều khiển tự động']);
		DB::table('majors')->insert(['code' =>'CNOT', 'name' => 'Công nghệ ô tô']);

<<<<<<< HEAD
		DB::table('classes')->insert(['name' =>'CNTT K11A', 'major_id' => '1']);
		DB::table('classes')->insert(['name' =>'CNTT K11B', 'major_id' => '1']);
		DB::table('classes')->insert(['name' =>'CNTT K11C', 'major_id' => '1']);
		DB::table('classes')->insert(['name' =>'HTTTKT K11', 'major_id' => '2']);
		DB::table('classes')->insert(['name' =>'HTTTKT K12', 'major_id' => '2']);
		DB::table('classes')->insert(['name' =>'CNOT K12', 'major_id' => '4']);
		
		//sinh vien da colop
		for($i=0;$i<250;$i++)
		{
			//Generate a random year using mt_rand.
			$year= mt_rand(1000, date("Y"));
			 
			//Generate a random month.
			$month= mt_rand(1, 12);
			 
			//Generate a random day.
			$day= mt_rand(1, 28);
			 
			//Using the Y-M-D format.
			$randomDate = $year . "-" . $month . "-" . $day;
			 
			//Echo.
			 
			 DB::table('students')->insert([
			 'code' => str_random(10),
			'name' => str_random(6).' '+str_random(4).' '.str_random(7),
			'gender' => rand(0, 1),		
			'birthday' =>$randomDate,
			'major_id' => rand(1, 4),
			'school_id' => 1,
			 'class_id' => rand(1, 6),
			]);
		}
		for($i=0;$i<250;$i++)
		{
			//Generate a random year using mt_rand.
			$year= mt_rand(1000, date("Y"));
			 
			//Generate a random month.
			$month= mt_rand(1, 12);
			 
			//Generate a random day.
			$day= mt_rand(1, 28);
			 
			//Using the Y-M-D format.
			$randomDate = $year . "-" . $month . "-" . $day;
			 
			//Echo.
			 
			 DB::table('students')->insert([
			 'code' => str_random(10),
			'name' => str_random(6).' '+str_random(4).' '.str_random(7),
			'gender' => rand(0, 1),		
			'birthday' =>$randomDate,
			'major_id' => rand(1, 4),
			'school_id' => 1,
			 'class_id' => null,
			]);
		}
=======
        // $this->call(LopHocTableSeeder::class);

        // $this->call(SinhVienTableSeeder::class);
        // $this->call(seederFindJobTable::class);
>>>>>>> 7709b3511774adaf4e6fdf2a9bd9dc6b8d7a7790
    }
}
