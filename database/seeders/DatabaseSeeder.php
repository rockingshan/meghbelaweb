<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create or update admin user
        $user = User::updateOrCreate(
            ['email' => 'admin@meghbeladigital.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('password123'),
            ]
        );

        // Create admin role
        $role = Role::firstOrCreate(['name' => 'admin']);

        // Create access-admin permission
        $permission = Permission::firstOrCreate(['name' => 'access-admin']);

        // Assign permission to role
        $role->givePermissionTo($permission);

        // Assign role to user
        $user->assignRole('admin');
    }
}