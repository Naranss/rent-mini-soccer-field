@extends('components.dashboard-layout')

@section('title', 'Dashboard')

@section('content')
    <section class="p-6 font-[Poppins]">
        <!-- Header Section -->
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Edit User: {{ $user->name }}</h1>
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

        <!-- Edit User Form -->
        <form action="{{ route('users.update', $user) }}" method="POST"
            class="bg-white rounded-lg shadow-md p-6 w-full max-w-4xl mx-auto">
            @csrf
            @method('PUT')

            <div class="grid md:grid-cols-2 gap-5">
                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                    <input type="text" id="name" name="name" required value="{{ old('name', $user->name) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" id="email" name="email" required value="{{ old('email', $user->email) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Role -->
                <div>
                    <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                    <select name="role" id="role" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="member" {{ old('role', $user->role) == 'member' ? 'selected' : '' }}>Member</option>
                        <option value="guest" {{ old('role', $user->role) == 'guest' ? 'selected' : '' }}>Guest</option>
                    </select>
                    @error('role')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password (Optional) -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">New Password <span class="text-xs text-gray-500">(Leave blank to keep current)</span></label>
                    <input type="password" id="password" name="password"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Submit Button -->
            <div class="text-right mt-6">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition font-medium">
                    Update User
                </button>
            </div>
        </form>
    </section>
@endsection