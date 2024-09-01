<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'admin', 'description' => 'Administrator role']);
        $superAdminRole = Role::create(['name' => 'super', 'description' => 'Super Administrator role']);
        $staffRole = Role::create(['name' => 'staff', 'description' => 'Staff role']);
    }
}
