<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Facility;
use App\Models\Department;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            CategorySeeder::class,
            FacilitySeeder::class,
            DepartmentSeeder::class,
            UserSeeder::class,
            SourceSeeder::class,

        ]);
    }
}
