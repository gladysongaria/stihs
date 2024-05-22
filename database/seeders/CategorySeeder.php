<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'category_name' => 'Machinery&Equipment',
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Furnitures,Fixtures & Books',
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Communication Equipment',
        ]);
    }
}
