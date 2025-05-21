<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            LookupTableSeeder::class,
        ]);

        $this->call([
            ModuleSeeder::class,
        ]);

        // Seed roles
        $roles = include database_path('data/LookupRoleTable.php');
        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

        // Seed dummy users with valid role IDs
        $users = include database_path('data/DummyUsersData.php');
        foreach ($users as $user) {
            User::factory()->create($user);
        }

        $this->call([
            VehicleSeeder::class,
        ]);
    }
}
