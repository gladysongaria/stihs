<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departments')->insert([
            [
                'department_name' => 'JSH-TLE Dept',
            ],
            [
                'department_name' => 'SHS-TVL Dept',
            ],
            [
                'department_name' => 'English Dept',
            ],
            [
                'department_name' => 'Science Dept',
            ],
            [
                'department_name' => 'AP/ESP Dept',
            ],
            [
                'department_name' => 'Math Dept',
            ],
            [
                'department_name' => 'MAPEH Dept',
            ],
            [
                'department_name' => 'Filipino Dept',
            ]

        ]
        );
    }
}
