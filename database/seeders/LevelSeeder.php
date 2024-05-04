<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Level;
class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Level::create([
            'name' => 'A1',
            'weight' => '10'
        ]);
        Level::create([
            'name' => 'A2',
            'weight' => '10'
        ]);
        Level::create([
            'name' => 'B1',
            'weight' => '10'
        ]);
        Level::create([
            'name' => 'B2',
            'weight' => '10'
        ]);
        Level::create([
            'name' => 'C1',
            'weight' => '10'
        ]);
        Level::create([
            'name' => 'C2',
            'weight' => '10'
        ]);
    }
}
