<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'email' => 'employee@brocali.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('employees')->insert([
            'first_name' => 'test',
            'last_name' => 'Emp',
            'company_id'=>"1",
            'user_id'=>"2",
            'phone'=>"059851", 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
