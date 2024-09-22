<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'super admin', 'description' => 'Super Administrator role']);
        $superAdminRole = Role::create(['name' => 'admin', 'description' => 'Administrator role']);
        $superRole = Role::create(['name' => 'supervisor', 'description' => 'Supervisor role']);
        $staffRole = Role::create(['name' => 'staff', 'description' => 'Staff role']);
    }
}
