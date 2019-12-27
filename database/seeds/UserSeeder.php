<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for($i = 1; $i <= 9; $i++){
            $name = $faker->firstName;
            if( $i == 1 ){
                $user = user::create([
                    'name'=> $name,
                    'email'=>'superadmin@mail.com',
                    'password'=>Hash::make('admin123')
                ]);
                $user->assignRole('superadmin');
            }else{
                $user = user::create([
                    'name'=> $name,
                    'email'=>$name.'@mail.com',
                    'password'=>Hash::make('admin123')
                ]);
                $user->assignRole('writer');
            }
        }

    }
}
