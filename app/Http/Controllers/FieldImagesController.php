<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\FieldImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FieldImagesController extends Controller
{
    public function index()
    {
        $fieldImages = FieldImage::all();
        return view('pages.field-images.index', compact('fieldImages'));
    }

    public function create()
    {
        $fields = Field::get();
        return view('pages.field-images.create', compact('fields'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'field_id' => 'required|exists:fields,id',
            'img_alt' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,png|max:2048',
        ]);
        $validated['path'] = $request->file('image')->store('fields', 'public');
        $validated['owner_id'] = Auth::id();

        FieldImage::create($validated);
        return redirect()->route('field-images.create')->with('success', 'Gambar berhasil ditambahkan!');
    }

    public function show(FieldImage $fieldImage)
    {
        return view('pages.field-images.show', compact('fieldImage'));
    }
    public function edit(FieldImage $fieldImage)
    {
        $fields = Field::get();
        return view('pages.field-images.edit', compact('fieldImage', 'fields'));
    }


    public function update(Request $request, FieldImage $fieldImage)
    {
        $validated = $request->validate([
            'field_id' => 'required|exists:fields,id',
            'img_alt' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $oldImage = $fieldImage->path;
            $validated['path'] = $request->file('image')->store('fields', 'public');
            Storage::disk('public')->delete($oldImage);
        }

        $fieldImage->update($validated);
        return redirect()->route('field-images.edit', $fieldImage)->with('success', 'Field berhasil diupdate!');
    }

    public function destroy(FieldImage $fieldImage)
    {
        Storage::disk('public')->delete($fieldImage->path);
        $fieldImage->delete();

        return redirect()->route('field-images.index')->with('success', 'Gambar lapangan berhasil dihapus!');
    }
}
