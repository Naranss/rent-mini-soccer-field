@extends('components.dashboard-layout')

@section('title', 'Dashboard')

@section('content')
    <div class="max-w-4xl mx-auto bg-white p-6 md:p-8 rounded-lg shadow-md font-[Poppins]">
        <!-- Header -->
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">View User: {{ $user->name }}</h1>
            <a href="{{ route('users.index') }}"
                class="px-4 py-2 text-sm font-medium bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-md transition">
                Back
            </a>
        </div>

        <!-- Info Grid -->
        <div class="grid md:grid-cols-2 gap-6">
            <!-- Name -->
            <div>
                <p class="text-sm text-gray-500">Name</p>
                <p class="text-lg font-medium text-gray-900">{{ $user->name }}</p>
            </div>

            <!-- Email -->
            <div>
                <p class="text-sm text-gray-500">Email</p>
                <p class="text-lg font-medium text-gray-900">{{ $user->email }}</p>
            </div>

            <!-- Role -->
            <div>
                <p class="text-sm text-gray-500">Role</p>
                <p class="text-lg font-medium text-gray-900 capitalize">{{ $user->role }}</p>
            </div>

            <!-- Created At -->
            <div>
                <p class="text-sm text-gray-500">Created At</p>
                <p class="text-lg font-medium text-gray-900">{{ $user->created_at->format('d M Y, H:i') }}</p>
            </div>

            <!-- Updated At -->
            <div>
                <p class="text-sm text-gray-500">Last Updated</p>
                <p class="text-lg font-medium text-gray-900">{{ $user->updated_at->format('d M Y, H:i') }}</p>
            </div>
        </div>
    </div>
@endsection