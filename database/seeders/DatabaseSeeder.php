<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\CreateUsersSeeder; // Make sure to include the CreateUsersSeeder class

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call the CreateUsersSeeder to run it
        $this->call(CreateUsersSeeder::class);
    }
}
