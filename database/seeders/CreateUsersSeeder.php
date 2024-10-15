<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Str;

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
               'country'=>'Kenya',
               'city'=>'NBO',
               'phone'=>'712345678',
               'email'=>'admin@ezrafxlive.com',
               'type'=>1,
               'password'=> bcrypt('Admin@128**'),
            ],
            [
               'f_name'=>'Manager User',
               'm_name'=>'Middle Name',
               'l_name'=>'User',
               'country'=>'Kenya',
               'city'=>'NBO',
               'phone'=>'712345678',
               'email'=>'manager@ezra.com',
               'type'=> 2,
               'password'=> bcrypt('123456'),
            ],
            [
               'f_name' => 'Normal User',
            'm_name' => 'Middle Name',
            'l_name' => 'User',
            'country' => 'Kenya',
            'city' => 'NBO',
            'phone' => '712345678',
            'email' => 'user@ezra.com',
            'otp' => mt_rand(100000, 999999),
            'otp_verified' => false,
            'otp_sent_at' => now(),
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
            'type' => 0,
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
            ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
