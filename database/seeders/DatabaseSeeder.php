<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->admin()->create([
            'name'     => 'Admin User',
            'email'    => 'admin@admin.com',
            'password' => bcrypt('password1234'),
        ]);

        User::factory()->user()->create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt('password1234'),
        ]);
    }
}
