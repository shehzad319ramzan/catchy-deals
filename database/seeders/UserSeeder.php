<?php

namespace Database\Seeders;

use App\Constants\Constants;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'username' => 'admin',
                'first_name' => 'admin',
                'last_name' => 'admin',
                'about' => "This is little bit more about my self. I'm the admin of this website.",
                'password' => Hash::make('admin123'),
                'email_verified_at' => now(),
                'created_at' => now(),
            ]
        );
        $user1->assignRole(Constants::SUPERADMIN);
        if (!$user1->file) {
            $user1->file()->create(['name' => 'profile.jpg', 'path' => 'users/profile.png', 'type' => 'profile']);
        }

        $user2 = User::firstOrCreate(
            ['email' => 'user@gmail.com'],
            [
                'username' => 'user',
                'first_name' => 'user',
                'last_name' => 'user',
                'about' => "This is little bit more about my self. I'm the user of this website.",
                'password' => Hash::make('test123'),
                'email_verified_at' => now(),
                'created_at' => now(),
            ]
        );
        $user2->assignRole(Constants::USER);
        if (!$user2->file) {
            $user2->file()->create(['name' => 'profile.jpg', 'path' => 'users/profile.png', 'type' => 'profile']);
        }
    }
}
