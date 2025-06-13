<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin 1
        User::create([
            'name' => 'Admin',
            'username' => 'Admin',
            'phone_number' => '088775612265',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin_p4ss'),
            'role' => 'ADMIN'
        ]);

        // Admin 2
        User::create([
            'name' => 'Coki Jangan Tidur',
            'username' => 'Cokids',
            'phone_number' => '088237572185',
            'email' => 'Cokids@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'ADMIN'
        ]);

        // Customer 1
        User::create([
            'name' => 'Eugenius',
            'username' => 'eugeniuskris',
            'email' => 'kris@gmail.com',
            'phone_number' => '081234567890',
            'password' => Hash::make('password123'),
            'role' => 'CUSTOMER',
            'remember_token' => Str::random(10),
        ]);

        // Customer 2
        User::create([
            'name' => 'Sisko',
            'username' => 'siskonarans',
            'email' => 'sisko@gmail.com',
            'phone_number' => '081234567891',
            'password' => Hash::make('password123'),
            'role' => 'CUSTOMER',
            'remember_token' => Str::random(10),
        ]);

        // Owner 1
        User::create([
            'name' => 'Coki Pardede',
            'username' => 'cokidparde',
            'email' => 'coki@gmail.com',
            'phone_number' => '081234567892',
            'password' => Hash::make('password123'),
            'role' => 'OWNER',
            'remember_token' => Str::random(10),
        ]);

        // Owner 2
        User::create([
            'name' => 'I Dewa Krisna',
            'username' => 'krisna',
            'email' => 'krisna@gmail.com',
            'phone_number' => '081234567893',
            'password' => Hash::make('password123'),
            'role' => 'OWNER',
            'remember_token' => Str::random(10),
        ]);
    }
}
