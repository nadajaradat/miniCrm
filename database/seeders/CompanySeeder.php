<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('companies')->insert([
            'name' => 'testCompany',
            'email' => 'testCompany@testCompany.com',
            'logo'=>"",
            'website_link'=>"www.testCompany.com", 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
