<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Sneider Admin',
            'email' => 'sovacar@udistrital.edu.co',
            'password' => bcrypt('12345678')
        ])->assignRole('Admin');

        User::create([
            'name' => 'Shalom Admin',
            'email' => 'sacristanchoi@udistrital.edu.co',
            'password' => bcrypt('12345678')
        ])->assignRole('Admin');
    }
}
