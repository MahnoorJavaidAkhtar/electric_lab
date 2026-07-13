<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed Roles and Permissions
        $role = Role::firstOrCreate(
            ['slug' => 'administrator'],
            [
                'name' => 'Administrator',
                'description' => 'System administrator',
                'is_active' => true,
                'hierarchy_level' => 100,
            ]
        );

        Permission::firstOrCreate(
            ['slug' => 'access-dashboard'],
            [
                'name' => 'Access Dashboard',
                'module' => 'dashboard',
                'description' => 'Allows access to the dashboard',
                'is_active' => true,
            ]
        );

        $role->permissions()->syncWithoutDetaching([1]);

        // Create Admin User
        User::factory()->create([
            'name' => 'Administrator User',
            'email' => 'admin@example.com',
            'password' => Hash::make('Password123!'),
            'role_id' => $role->id,
            'is_active' => true,
        ]);

        // Seed Laboratories, Clients, and Products data
        $this->call([
            LaboratorySeeder::class,
            ClientSeeder::class,
            ManufacturerSeeder::class,
            ProductCategorySeeder::class,
            ProductSeeder::class,
        ]);
    }
}
