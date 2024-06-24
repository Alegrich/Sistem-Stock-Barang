<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::where('email', 'test@example.com')->first();

        if ($user) {
            // Update the existing user
            $user->update([
                'name' => 'Test User',
                'password' => bcrypt('password'), // Replace 'password' with the actual password
                'role' => 'admin', // Adjust this according to your ENUM definition for roles
            ]);
        } else {
            // Create a new user if not found
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => bcrypt('password'), // Replace 'password' with the actual password
                'role' => 'admin', // Adjust this according to your ENUM definition for roles
            ]);
        }
    }
}
