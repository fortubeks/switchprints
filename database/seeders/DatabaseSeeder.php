<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Design;
use App\Models\Machine;
use App\Models\Shift;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'phone' => '07030632041',
            'address' => 'address',
            'gender' => 'male',
            'role_id' => 1,
            'branch_id' => 1
        ]);
        Branch::create(['name' => 'Main Branch']);
        Machine::create([
            'name' => 'Main Machine',
            'stitches_per_shift'=>400000,
            'required_maintenance_per_year'=>4,
            'branch_id' => 1
        ]);
        Design::create([
            'name' => 'Agbada Design',
            'stitches' => 500000,
            'price' => 30000
        ]);
        Shift::create([
            'name' => 'Day Shift',
            'start_time' => '07:00',
            'end_time' => '16:00'
        ]);
        Shift::create([
            'name' => 'Night Shift',
            'start_time' => '17:00',
            'end_time' => '06:00'
        ]);
        
        $this->call(RoleSeeder::class);
    }
}
