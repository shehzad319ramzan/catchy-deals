<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User permissions
        Permission::firstOrCreate(['name' => 'all_user'], ['title' => 'View all users']);
        Permission::firstOrCreate(['name' => 'add_user'], ['title' => 'Add new user']);
        Permission::firstOrCreate(['name' => 'view_user'], ['title' => 'View user detail']);
        Permission::firstOrCreate(['name' => 'edit_user'], ['title' => 'Edit user']);
        Permission::firstOrCreate(['name' => 'delete_user'], ['title' => 'Delete user']);

        // Product permissions
        Permission::firstOrCreate(['name' => 'all_product'], ['title' => 'View all products']);
        Permission::firstOrCreate(['name' => 'add_product'], ['title' => 'Add new product']);
        Permission::firstOrCreate(['name' => 'view_product'], ['title' => 'View product detail']);
        Permission::firstOrCreate(['name' => 'edit_product'], ['title' => 'Edit product']);
        Permission::firstOrCreate(['name' => 'delete_product'], ['title' => 'Delete product']);

        // Role permissions
        Permission::firstOrCreate(['name' => 'all_role'], ['title' => 'View all roles']);
        Permission::firstOrCreate(['name' => 'add_role'], ['title' => 'Add new role']);
        Permission::firstOrCreate(['name' => 'edit_role'], ['title' => 'Edit role']);
        Permission::firstOrCreate(['name' => 'delete_role'], ['title' => 'Delete role']);
        Permission::firstOrCreate(['name' => 'assign_permission'], ['title' => 'Assign permissions']);

        // Settings permissions
        Permission::firstOrCreate(['name' => 'site_setting'], ['title' => 'Manage site settings']);
    }
}
