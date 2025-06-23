<?php

namespace App\Http\Controllers;

use App\Models\Field;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FieldsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role == "OWNER") {
            $fields = Field::with('owner')->ownerId(Auth::id())->filter(request(['search']))->paginate(6);
        } else {
            $fields = Field::with('owner')->filter(request(['search']))->paginate(6);
        }

        return view('pages.fields.index', compact('fields'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.fields.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:futsal,minisoccer',
            'owner_id' => 'required|exists:users,id',
            'description' => 'nullable|string',
            'price' => 'required|integer|min:0',
            'status' => 'required|in:available,maintenance',
            'location' => 'nullable|string|max:255',
        ]);
        Field::create($validated);
        return redirect()->route('fields.create')->with('success', 'Field berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Field $field)
    {
        if (Auth::user()->role == 'OWNER') {
            $fieldImages = $field->fieldImages;
        }
        return view('pages.fields.show', compact('field', 'fieldImages'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Field $field)
    {
        return view('pages.fields.edit', compact('field'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Field $field)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:futsal,minisoccer',
            'description' => 'nullable|string',
            'price' => 'required|integer|min:0',
            'status' => 'required|in:available,maintenance',
            'location' => 'nullable|string|max:255',
        ]);

        $field->update($validated);
        return redirect()->route('fields.edit', $field)->with('success', 'Field berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Field $field)
    {
        $field->delete();
        return redirect()->route('fields.index')->with('success', 'Field berhasil dihapus!');
    }
}
