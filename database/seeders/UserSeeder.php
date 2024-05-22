<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'id' => (time() - 999999999),
            'last_name' => 'Admin',
            'first_name' => 'Admin',
            'middle_initial' => 'A',
            'email' => 'admin@gmail.com',
            'usertype' => 'Admin',
            'department_id' => 1,
            'email_verified_at' => now(),
            'password' => Hash::make('admin'),
        ]);

        DB::table('users')->insert([
            'id' => (time() - 999999998),
            'last_name' => 'Clores',
            'first_name' => 'Janeth',
            'middle_initial' => 'D',
            'usertype' => 'Property Custodian',
            'department_id' => 2,
            'email' => 'janeth@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('janeth'),
        ]);

        DB::table('users')->insert([
            'id' => (time() - 999999997),
            'last_name' => 'Ongaria',
            'first_name' => 'Gladys',
            'middle_initial' => 'B',
            'usertype' => 'Teacher',
            'department_id' => 2,
            'email' => 'gladys@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('gladys'),
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
}
