<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Attendance;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::where('role', 'CLIENT')->get();

        foreach ($users as $user) {
            Attendance::create([
                'user_id' => $user->id,
            ]);
        }
    }
}
