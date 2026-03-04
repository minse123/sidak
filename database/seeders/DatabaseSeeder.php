<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);

        $superAdminRole = Role::query()->firstWhere('role_name', 'superadmin');
        $userRole = Role::query()->firstWhere('role_name', 'user');

        if ($superAdminRole !== null) {
            User::factory()->create([
                'name' => 'Super Admin',
                'email' => 'superadmin@example.com',
                'role_id' => $superAdminRole->id,
            ]);
        }

        if ($userRole !== null) {
            User::factory()->create([
                'name' => 'Sample User',
                'email' => 'user@example.com',
                'role_id' => $userRole->id,
            ]);
        }
    }
}
