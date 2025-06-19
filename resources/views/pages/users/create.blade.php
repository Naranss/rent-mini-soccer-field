@extends('components.dashboard-layout')

@section('title', 'Dashboard')

@section('content')
    <section class="p-6 font-[Poppins]">
        <!-- Header Section -->
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Add New User</h1>
            <a href="{{ route('users.index') }}"
                class="inline-block bg-gray-300 hover:bg-gray-400 text-gray-800 text-sm font-medium px-4 py-2 rounded-md transition">
                ← Back to User List
            </a>
        </div>

        <!-- Success Message -->
        @if (session()->has('success'))
            <div class="mb-6 p-4 rounded-lg bg-green-100 text-green-800 text-sm">
                {{ session('success') }}
            </div>
        @endif

        <!-- Create User Form -->
        <form action="{{ route('users.store') }}" method="POST"
            class="bg-white rounded-lg shadow-md p-6 w-full max-w-4xl mx-auto">
            @csrf

            <!-- Grid layout -->
            <div class="grid md:grid-cols-2 gap-5">
                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Role -->
                <div>
                    <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                    <select name="role" id="role" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="" disabled {{ old('role') ? '' : 'selected' }}>Select Role</option>
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="member" {{ old('role') == 'member' ? 'selected' : '' }}>Member</option>
                        <option value="guest" {{ old('role') == 'guest' ? 'selected' : '' }}>Guest</option>
                    </select>
                    @error('role')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" id="password" name="password" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Submit Button -->
            <div class="text-right mt-6">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition font-medium">
                    Create User
                </button>
            </div>
        </form>
    </section>
@endsection