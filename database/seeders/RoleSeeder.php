<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Estudiante']);
    
        
        Permission::create(['name' => 'dashboard'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'validation.examen'])->syncRoles($role2);
        Permission::create(['name' => 'validation.crud'])->syncRoles($role1);
        Permission::create(['name' => 'encuesta'])->syncRoles($role1);
        Permission::create(['name' => 'examen'])->syncRoles($role2);
        Permission::create(['name' => 'reporte'])->syncRoles($role2);
        
        
    }   
}
