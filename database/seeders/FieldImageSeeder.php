<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FieldImage;
use App\Models\Field;

class FieldImageSeeder extends Seeder
{
    public function run()
    {

        $fields = Field::all();

        foreach ($fields as $field) {
            // Jumlah gambar acak antara 1-3 per field
            $imageCount = rand(1, 3);

            for ($i = 1; $i <= $imageCount; $i++) {
                FieldImage::create([
                    'field_id' => $field->id,
                    'owner_id' => $field->owner_id,
                    'path' => 'fields/' . strtolower(str_replace(' ', '_', $field->name)) . '_' . $i . '.jpg',
                    'img_alt' => 'Image of ' . $field->name . ' - View ' . $i,
                ]);
            }
        }
    }
}
