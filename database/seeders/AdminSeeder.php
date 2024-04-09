<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert sample admin data
        Admin::create([
            'name' => 'Admin Name',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('asdfasdf'),
            'photo' => null, // Replace null with the path to the admin's photo if needed
            'token' => '', // Add logic to generate token if needed
        ]);
    }
}
