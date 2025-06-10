<?php

namespace Database\Seeders;

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
        User::create([
            'name' => 'Admin',
            'username' => 'Admin',
            'phone_number' => '088775612265',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin_p4ss'),
            'role' => 'ADMIN'
        ]);

        User::create([
            'name' => 'Coki Jangan Tidur',
            'username' => 'Cokids',
            'phone_number' => '088237572185',
            'email' => 'Cokids@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'ADMIN'
        ]);
    }
}
