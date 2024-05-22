<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dashboard;
class DashboardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a new dashboard
        Dashboard::create([
            'title' => 'My Dashboard',
            'description' => 'This is my dashboard',
            // Add more fields as needed
        ]);
    }
}
