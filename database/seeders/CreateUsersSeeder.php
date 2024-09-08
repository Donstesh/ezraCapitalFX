<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $users = [
            [
               'f_name'=>'Admin User',
               'm_name'=>'Middle Name',
               'l_name'=>'User',
               'email'=>'admin@ezra.com',
               'type'=>1,
               'password'=> bcrypt('123456'),
            ],
            [
               'f_name'=>'Manager User',
               'm_name'=>'Middle Name',
               'l_name'=>'User',
               'email'=>'manager@ezra.com',
               'type'=> 2,
               'password'=> bcrypt('123456'),
            ],
            [
               'f_name'=>'Nomarl User',
               'm_name'=>'Middle Name',
               'l_name'=>'User',
               'email'=>'user@ezra.com',
               'type'=>0,
               'password'=> bcrypt('123456'),
            ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
