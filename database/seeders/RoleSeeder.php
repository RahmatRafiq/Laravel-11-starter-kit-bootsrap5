<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Define roles and their associated permissions
        $roles = [
            'admin' => ['manage_users', 'create_item', 'read_item', 'update_item', 'delete_item'],
            'editor' => ['create_item', 'read_item', 'update_item'],
            'viewer' => ['read_item'],
        ];

        // Create roles and assign permissions
        foreach ($roles as $roleName => $rolePermissions) {
            $role = Role::create(['name' => $roleName]);
            $role->givePermissionTo($rolePermissions);
        }
    }
}
