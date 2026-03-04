<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['superadmin', 'user'];

        foreach ($roles as $roleName) {
            Role::query()->firstOrCreate([
                'role_name' => $roleName,
            ]);
        }
    }
}
