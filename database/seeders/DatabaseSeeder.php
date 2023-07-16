<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\EmployeeSeeder;
use Database\Seeders\PositionSeeder;
use Database\Seeders\UserSeeder;
use App\Models\Employee;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Employee::factory(5)->create();
        $this->call([
            PositionSeeder::class,
            EmployeeSeeder::class,
            UserSeeder::class
        ]);
    }
}
