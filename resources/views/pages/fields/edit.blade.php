@extends('components.dashboard-layout')

@section('title', 'Dashboard')

@section('content')
<section class="p-6 font-[Poppins]">
    <!-- Header Section -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Edit Field</h1>
        <a href="{{ route('fields.index') }}"
           class="inline-block bg-gray-300 hover:bg-gray-400 text-gray-800 text-sm font-medium px-4 py-2 rounded-md transition">
            ← Back to Field List
        </a>
    </div>

    <!-- Success Message -->
    @if (session()->has('success'))
        <div class="mb-6 p-4 rounded-lg bg-green-100 text-green-800 text-sm">
            {{ session('success') }}
        </div>
    @endif

    <!-- Edit Field Form -->
    <form action="{{ route('fields.update', $field) }}" method="POST"
          class="bg-white rounded-lg shadow-md p-6 w-full max-w-4xl mx-auto">
        @csrf
        @method('PUT')

        <!-- Grid layout for form -->
        <div class="grid md:grid-cols-2 gap-5">
            <!-- Field Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Field Name</label>
                <input type="text" id="name" name="name" required value="{{ $field->name }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>

            <!-- Type -->
            <div>
                <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Type</label>
                <select name="type" id="type" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="futsal" {{ $field->type == 'futsal' ? 'selected' : '' }}>Futsal</option>
                    <option value="minisoccer" {{ $field->type == 'minisoccer' ? 'selected' : '' }}>Mini Soccer</option>
                </select>
            </div>

            <!-- Description (full width) -->
            <div class="md:col-span-2">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <input type="text" id="description" name="description" required value="{{ $field->description }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>

            <!-- Price -->
            <div>
                <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Price</label>
                <input type="number" id="price" name="price" required value="{{ $field->price }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>

            <!-- Status -->
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select name="status" id="status" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="available" {{ $field->status == 'available' ? 'selected' : '' }}>Available</option>
                    <option value="maintenance" {{ $field->status == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                </select>
            </div>

            <!-- Location (full width) -->
            <div class="md:col-span-2">
                <label for="location" class="block text-sm font-medium text-gray-700 mb-1">Location</label>
                <input type="text" id="location" name="location" required value="{{ $field->location }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>
        </div>

        <!-- Submit Button -->
        <div class="text-right mt-6">
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition font-medium">
                Update
            </button>
        </div>
    </form>
</section>
@endsection