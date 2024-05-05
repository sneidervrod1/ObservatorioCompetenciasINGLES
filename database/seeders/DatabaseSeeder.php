<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Contracts\Role;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;
 
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            LevelSeeder::class,
            CategoryLevelSeeder::class,
            SubcategorySeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            ValidationCategorySeeder::class,
            ValidationQuestionSeeder::class,

        ]);

        
    }
}
