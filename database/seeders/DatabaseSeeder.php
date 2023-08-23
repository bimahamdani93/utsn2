<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\EmployeeSeeder;
use Database\Seeders\PositionSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Employee::factory(5)->create();
        $this->call([
            CategorySeeder::class,
            PositionSeeder::class,
            EmployeeSeeder::class,
            UserSeeder::class,
        ]);
    }
}
