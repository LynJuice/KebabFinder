<?php

namespace Database\Seeders;

use App\Models\User;
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

        $admin = Role::create(['name' => 'svetaines administratorius']);
        $kebadmin = Role::create(['name' => 'kebabines administratorius']);
        $vartotojas = Role::create(['name' => 'vartotojas']);

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
        $admin->givePermissionTo('delete review');
        $admin->givePermissionTo('change review');

        $vartotojas->givePermissionTo('write review');

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@kebab.lt'
        ])->assignRole('svetaines administratorius');

        User::factory()->create([
            'name' => 'Pas Ibo',
            'email' => 'pasibo@kebab.lt'
        ])->assignRole('kebabines administratorius');

        for ($i = 0; $i < 10; $i++) {
            User::factory()->create()->assignRole('kebabines administratorius');
        }
        for ($i = 0; $i < 10; $i++) {
            User::factory()->create()->assignRole('vartotojas');
        }


    }
}
