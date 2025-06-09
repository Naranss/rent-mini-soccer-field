<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Field;

class FieldSeeder extends Seeder
{
    public function run()
    {
        // Ambil ID owner dari UserSeeder 
        $owner1Id = \App\Models\User::where('role', 'OWNER')->where('email', 'coki@gmail.com')->first()->id;
        $owner2Id = \App\Models\User::where('role', 'OWNER')->where('email', 'krisna@gmail.com')->first()->id;

        // Field 1 
        Field::create([
            'name' => 'Herman Arena',
            'owner_id' => $owner1Id,
            'type' => 'futsal',
            'description' => 'A modern futsal field with great lighting.',
            'price' => 150000,
            'status' => 'available',
            'location' => 'Paingan',
        ]);

        // Field 2 
        Field::create([
            'name' => 'Coki Suka Tidur Arena',
            'owner_id' => $owner2Id,
            'type' => 'minisoccer',
            'description' => 'Artificial Grass Fields FIFA Qualified',
            'price' => 100000,
            'status' => 'available',
            'location' => 'Paingan',
        ]);

        // Field 3 
        Field::create([
            'name' => 'Mbah Singo Arena',
            'owner_id' => $owner1Id,
            'type' => 'futsal',
            'description' => 'Another futsal field with synthetic turf.',
            'price' => 180000,
            'status' => 'available',
            'location' => 'Paingan',
        ]);
    }
}
