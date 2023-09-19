<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $kebadmin = Role::create(['name' => 'kebabines administratorius']);
        $vartotojas = Role::create(['name' => 'vartotojas']);
        $admin = Role::create(['name' => 'svetaines administratorius']);

        // create permissions
        Permission::create(['name' => 'write review']);
        Permission::create(['name' => 'manage reviews']);
        Permission::create(['name' => 'delete review']);
        Permission::create(['name' => 'change review']);

        Permission::create(['name' => 'manage kebab']);
        Permission::create(['name' => 'add kebab']);
        Permission::create(['name' => 'delete kebab']);

        // and assign existing permissions
        $kebadmin->givePermissionTo('manage kebab');
        $kebadmin->givePermissionTo('add kebab');
        $kebadmin->givePermissionTo('delete kebab');

        $admin->givePermissionTo('manage kebab');
        $admin->givePermissionTo('add kebab');
        $admin->givePermissionTo('delete kebab');
        $admin->givePermissionTo('manage reviews');
        $admin->givePermissionTo('delete reviews');
        $admin->givePermissionTo('change reviews');

        $vartotojas->givePermissionTo('write review');

    }
}
