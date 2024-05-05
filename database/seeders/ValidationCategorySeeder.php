<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ValidationCategory;
class ValidationCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ValidationCategory::create([
            'description' => 'Utilidad percibida (PU)',
            'weight_validation_category' => '25',
        ]);
        ValidationCategory::create([
            'description' => 'Facilidad de uso percibida (PEOU)',
            'weight_validation_category' => '25',
        ]);
        ValidationCategory::create([
            'description' => 'Actitud por el uso (AU)',
            'weight_validation_category' => '25',
        ]);
        ValidationCategory::create([
            'description' => 'Intención de uso (IU)',
            'weight_validation_category' => '25',
        ]);
    }
}
