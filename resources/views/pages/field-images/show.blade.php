@extends('components.dashboard-layout')

@section('title', 'Dashboard')

@section('content')
    <div class="max-w-6xl mx-auto bg-white p-6 md:p-8 rounded-lg shadow-md font-[Poppins]">
        <!-- Header -->
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">View Field Image: {{ $fieldImage->img_alt }}</h1>
            <div class="flex gap-2">
                <a href="{{ route('field-images.edit', $fieldImage) }}"
                    class="px-4 py-2 text-sm font-medium bg-blue-600 hover:bg-blue-700 text-white rounded-md transition">
                    Edit
                </a>
                <a href="{{ route('field-images.index') }}"
                    class="px-4 py-2 text-sm font-medium bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-md transition">
                    Back
                </a>
            </div>
        </div>

        <!-- Info Grid -->
        <div class="grid md:grid-cols-3 gap-4">
            <div>
                <p class="text-sm text-gray-500">Field Name</p>
                <p class="text-lg font-medium text-gray-900">{{ $fieldImage->field->name }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Owner Name</p>
                <p class="text-lg font-medium text-gray-900">{{ $fieldImage->owner->name }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Added At</p>
                <p class="text-lg text-gray-900">{{ $fieldImage->created_at->format('d M Y, H:i') }}</p>
            </div>
        </div>

        <!-- Images -->
        <div class="mt-8">
            <img src="{{ asset('storage/' . $fieldImage->path) }}" alt="{{ $fieldImage->img_alt }}"
                class="rounded-lg w-full object-cover border border-gray-200 shadow-sm" />
        </div>

    </div>
    </div>
@endsection
