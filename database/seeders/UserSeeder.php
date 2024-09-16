<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Create 1 admin user with a specific email and password
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('admin@mail.com'),
        ]);
        $admin->assignRole('admin');

        // Create 99 other users for different roles
        $roles = ['admin', 'editor', 'viewer'];
        foreach ($roles as $role) {
            for ($i = 0; $i < 33; $i++) {
                $user = User::create([
                    'name' => ucfirst($role) . ' User ' . $i,
                    'email' => strtolower($role) . $i . '@mail.com',
                    'password' => bcrypt('password'),
                ]);
                $user->assignRole($role);
            }
        }
    }
}
