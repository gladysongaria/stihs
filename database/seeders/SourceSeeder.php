<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sources')->insert([
            [
                'source' => 'DEPED Donations',
                'description' => 'Donations from DepEd',
            ],

            [
                'source' => 'DepEd Procurement',
                'description' => 'Procurement from DepEd',
            ],

            [
                'source' => 'LGU Donations',
                'description' => 'Donations from LGU',
            ],

            [
                'source' => 'Private Donations',
                'description' => 'Private Donations',
            ],


        ]);
    }
}
