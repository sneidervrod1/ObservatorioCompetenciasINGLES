<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Laravel\Prompts\Table;
use Illuminate\Support\Facades\DB;

class CategoryLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('category_level')->insert([
            'level_id' => '1',
            'category_id' => '1',	
            'weight_category' => '35'
        ]);
        DB::table('category_level')->insert([
            'level_id' => '1',
            'category_id' => '2',	
            'weight_category' => '35'
        ]);
        DB::table('category_level')->insert([
            'level_id' => '1',
            'category_id' => '3',	
            'weight_category' => '30'
        ]);
        
        DB::table('category_level')->insert([
            'level_id' => '2',
            'category_id' => '1',	
            'weight_category' => '35'
        ]);
        DB::table('category_level')->insert([
            'level_id' => '2',
            'category_id' => '2',	
            'weight_category' => '35'
        ]);
        DB::table('category_level')->insert([
            'level_id' => '2',
            'category_id' => '3',	
            'weight_category' => '30'
        ]);
        
        DB::table('category_level')->insert([
            'level_id' => '3',
            'category_id' => '1',	
            'weight_category' => '35'
        ]);
        DB::table('category_level')->insert([
            'level_id' => '3',
            'category_id' => '2',	
            'weight_category' => '35'
        ]);
        DB::table('category_level')->insert([
            'level_id' => '3',
            'category_id' => '3',	
            'weight_category' => '30'
        ]);
        
        DB::table('category_level')->insert([
            'level_id' => '4',
            'category_id' => '1',	
            'weight_category' => '35'
        ]);
        DB::table('category_level')->insert([
            'level_id' => '4',
            'category_id' => '2',	
            'weight_category' => '35'
        ]);
        DB::table('category_level')->insert([
            'level_id' => '4',
            'category_id' => '3',	
            'weight_category' => '30'
        ]);

        DB::table('category_level')->insert([
            'level_id' => '5',
            'category_id' => '1',	
            'weight_category' => '35'
        ]);
        DB::table('category_level')->insert([
            'level_id' => '5',
            'category_id' => '2',	
            'weight_category' => '35'
        ]);
        DB::table('category_level')->insert([
            'level_id' => '5',
            'category_id' => '3',	
            'weight_category' => '30'
        ]);

        DB::table('category_level')->insert([
            'level_id' => '6',
            'category_id' => '1',	
            'weight_category' => '35'
        ]);
        DB::table('category_level')->insert([
            'level_id' => '6',
            'category_id' => '2',	
            'weight_category' => '35'
        ]);
        DB::table('category_level')->insert([
            'level_id' => '6',
            'category_id' => '3',	
            'weight_category' => '30'
        ]);


    }
}
