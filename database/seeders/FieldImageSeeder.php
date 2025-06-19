<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Field;
use App\Models\FieldImage;
use Illuminate\Support\Facades\Storage;

class FieldImageSeeder extends Seeder
{
    public function run()
    {
        $fields = Field::all();

        // Verifikasi jumlah field
        if ($fields->count() !== 3) {
            throw new \Exception("Expected 3 fields, but found " . $fields->count() . ".");
        }

        // Daftar Gambar
        $imageFiles = [
            'KRESNO4.jpg',
            'KRESNO5.jpg',
            'KRESNO6.jpg',
            'KRESNO8.jpg',
            'KRESNO9.jpg',
            'KRESNO10.jpg',
            'KRESNO14.jpg',
            'KRESNO15.jpg',
            'KRESNO16.jpg',
        ];

        // Indeks untuk melacak gambar
        $imageIndex = 0;

        // Loop melalui setiap field
        foreach ($fields as $field) {
            // Tambahkan 3 gambar untuk setiap field
            for ($index = 0; $index < 3; $index++) {
                $imageFile = $imageFiles[$imageIndex]; // Ambil file gambar berdasarkan indeks
                $destinationPath = 'fields/' . strtolower(str_replace(' ', '_', $field->name)) . '_' . ($index + 1) . '.jpg';
                $sourcePath = 'fieldseeds/' . $imageFile;

                if (Storage::disk('public')->exists($sourcePath)) {
                    Storage::disk('public')->copy($sourcePath, $destinationPath);
                }

                // Buat entri di tabel field_images
                FieldImage::create([
                    'field_id' => $field->id,
                    'owner_id' => $field->owner_id,
                    'path' => $destinationPath,
                    'img_alt' => 'Image of ' . $field->name . ' - View ' . ($index + 1),
                ]);

                $imageIndex++;
            }
        }
    }
}
