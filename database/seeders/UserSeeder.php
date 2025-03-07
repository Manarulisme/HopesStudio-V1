<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Ujang Admin',
            'email' => 'admin1@gmail.com',
            'email_verified_at' => now(),
            'role' => 'admin',
            'password' => Hash::make('@Admin12345'), // password
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'User Biasa',
            'email' => 'user1@gmail.com',
            'email_verified_at' => now(),
            'role' => 'user',
            'password' => Hash::make('@User12345'), // password
            'remember_token' => Str::random(10),
        ]);

        // Add more users as needed
    }
}
