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

        // $this->call(NganhHocTableSeeder::class);

        // $this->call(LopHocTableSeeder::class);

        // $this->call(SinhVienTableSeeder::class);
        // $this->call(seederFindJobTable::class);
    }
}
