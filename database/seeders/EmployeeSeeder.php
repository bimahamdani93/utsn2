<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employees')->insert([
            [
                'name' => 'Purnama',
                'email'=> 'purnama.anaking@gmail.com',
                'nohp' => '081234567890',
            ],
            [
                'name' => 'Adzanil',
                'email'=> 'adzanil.rachmadhi@gmail.com',
                'nohp' => '081234567890',
            ],
            [
                'name' => 'Berlian',
                'email'=> 'berlian.rahmy@gmail.com',
                'nohp' => '081234567890',
            ],
        ]);
    }
}

