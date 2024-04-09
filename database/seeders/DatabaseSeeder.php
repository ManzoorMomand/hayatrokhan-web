<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Call the UsersTableSeeder

        // Call the AdminSeeder
        $this->call(AdminSeeder::class);

        // You can call other seeder classes here if needed
    }
}
