<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create admin user
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // Replace 'password' with your desired password
            'role' => 'admin', // Ensure 'admin' matches ENUM definition
        ]);

        // Create staff user
        DB::table('users')->insert([
            'name' => 'Staff',
            'email' => 'staff@example.com',
            'password' => Hash::make('password'), // Replace 'password' with your desired password
            'role' => 'staff', // Ensure 'staff' matches ENUM definition
        ]);
    }
}
