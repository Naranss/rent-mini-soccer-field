@extends('components.dashboard-layout')

@section('title', 'Dashboard')

@section('content')
    <section class="p-6 font-[Poppins]">
        <!-- Header Section -->
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Edit Image: {{ $fieldImage->img_alt }}</h1>
            <a href="{{ route('field-images.index') }}"
                class="inline-block bg-gray-300 hover:bg-gray-400 text-gray-800 text-sm font-medium px-4 py-2 rounded-md transition">
                ← Back to Field Image List
            </a>
        </div>

        <!-- Success Message -->
        @if (session()->has('success'))
            <div class="mb-6 p-4 rounded-lg bg-green-100 text-green-800 text-sm">
                {{ session('success') }}
            </div>
        @endif

        <!-- Create Field Form -->
        <form action="{{ route('field-images.update', $fieldImage) }}" method="POST" enctype="multipart/form-data"
            class="bg-white rounded-lg shadow-md p-6 w-full max-w-4xl mx-auto">
            @csrf
            @method('PUT')

            <!-- Grid layout for form -->
            <div class="grid md:grid-cols-2 gap-5">
                <!-- Field -->
                <div>
                    <label for="field_id" class="block text-sm font-medium text-gray-700 mb-1">Field</label>
                    <select name="field_id" id="field_id" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="" disabled {{ old('type') ? '' : 'selected' }}>Select Field</option>
                        @foreach ($fields as $field)
                            <option value="{{ $field->id }}" {{ $field->id == $fieldImage->field_id ? 'selected' : '' }}>
                                {{ $field->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('field_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Image Name -->
                <div>
                    <label for="img_alt" class="block text-sm font-medium text-gray-700 mb-1">Image Name</label>
                    <input type="text" id="img_alt" name="img_alt" required value="{{ $fieldImage->img_alt }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    @error('')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <input name="image" type="file" accept="image/*">
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
