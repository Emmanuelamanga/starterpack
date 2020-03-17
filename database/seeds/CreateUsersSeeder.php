<?php

use Illuminate\Database\Seeder;
use App\user;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $user = [
            [
               'name'=>'Admin',
               'email'=>'admin@starterpack.com',
                'is_admin'=>'1',
               'password'=> bcrypt('54321'),
            ],
            [
               'name'=>'User',
               'email'=>'user@starterpack.com',
                'is_admin'=>'0',
               'password'=> bcrypt('54321'),

            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);

        }
    }
}
