<?php

namespace App\Http\Controllers;

use App\Models\FieldImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FieldImagesController extends Controller
{
    public function index()
    {
        $fieldImages = FieldImage::all();
        return view('pages.imagesdashboard', compact('fieldImages'));
    }

    public function create()
    {
        return view('pages.imagedashboardform');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'img_alt' => 'required|string|max:255',
            'type' => 'required|in:futsal,minisoccer',
            'image' => 'required|image|mimes:jpg,png|max:2048',
        ]);
        $validated['path'] = $request->file('image')->store('fields', 'public');

        FieldImage::create($validated);
        return redirect()->route('pages.imagedashboard')->with('success', 'Gambar berhasil ditambahkan!');
    }

    public function edit(FieldImage $fieldImage)
    {
        return view('fields.edit', compact('fieldImage'));
    }


    public function update(Request $request, FieldImage $fieldImage)
    {
        $validated = $request->validate([
            'img_alt' => 'required|string|max:255',
            'type' => 'required|in:futsal,minisoccer',
            'image' => 'nullable|image|mimes:jpg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $oldImage = $fieldImage->path;
            $validated['path'] = $request->file('image')->store('fields', 'public');
            Storage::delete($oldImage);
        }

        $fieldImage->update($validated);
        return redirect()->route('fields.index')->with('success', 'Field berhasil diupdate!');
    }

    public function destroy(FieldImage $fieldImage)
    {
        Storage::delete($fieldImage->path);
        $fieldImage->delete();

        return redirect()->route('dashboard.field.images')->with('success', 'Gambar lapangan berhasil dihapus!');
    }
}
