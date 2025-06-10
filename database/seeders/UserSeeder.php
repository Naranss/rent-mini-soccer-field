<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run()
    {
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
            'username' => 'cokids',
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
