<?php

namespace Database\Seeders;

use App\Models\User;
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
            'email' => 'admin@gmail.com',
            'password' => Hash::make("password"),
            'role' => "ADMIN",
            'email_verified_at' => now(),
        ]);

        User::factory()->create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make("password"),
            'role' => "CLIENT",
            'email_verified_at' => now(),
            'nib' => '1234'
        ]);

        // $this->call(AttendanceSeeder::class);
    }
}
