<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Student;

class seedUserTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        // following line retrieve all the user_ids from DB
        $users=array();
        $data = DB::table('students')->select('code','name')->get();
        foreach(range(1,100) as $index){
            $user=$data[$index]->code;
            $name=$data[$index]->name;
            DB::table('users')->insert([
                'username' => $user,
                'password' => bcrypt($user),
                'email'=>$faker->email,
                'name'=>$name,
                'type'=>3,
            ]);
        }
    }

}
