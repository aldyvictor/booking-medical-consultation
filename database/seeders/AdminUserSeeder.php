<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Admin Clinic',
            'email' => 'admin123@gmail.com',
            'password' => bcrypt('admin123'),
            'role' => 'Admin',
        ]);
    }
}
