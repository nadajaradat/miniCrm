<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        DB::table('users')->insert([
            'email' => 'admin@brocali.com',
            'password' => Hash::make('password'),
        ]);

        // Create admin record
        DB::table('admins')->insert([
            // Add other admin-specific fields if needed
            'user_id' => 1, // Assuming the ID of the created user is 1
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
