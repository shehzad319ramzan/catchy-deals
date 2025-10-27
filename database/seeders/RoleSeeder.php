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
        app()['cache']->forget('spatie.permission.cache');

        $admin = Role::firstOrCreate(['name' => 'admin'], ['title' => 'Admin']);

        $permissions = Permission::all();
        $admin->syncPermissions($permissions);

        $user = Role::firstOrCreate(['name' => 'user'], ['title' => 'User']);
    }
}
