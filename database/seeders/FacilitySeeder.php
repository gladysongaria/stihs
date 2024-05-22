<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('facilities')->insert([
            [
                'facility_name' => 'Classroom',
            ],
            [
                'facility_name' => 'Laboratory',
            ],
            [
                'facility_name' => 'Offices',
            ],
            [
                'facility_name' => 'Canteen',
            ],
            [
                'facility_name' => 'Library',
            ],
            [
                'facility_name' => 'Clinic',
            ]
        ]);
    }
}
