<x-layout :title="'Register'">
    <form method="POST" action="/register" class="w-full">
        @csrf
        <h2 class="text-white text-3xl font-bold mb-6 text-center">Register</h2>

        <!-- Full Name -->
        <div class="mb-4">
            <input name="name" type="text" placeholder="Full Name" value="{{ old('name') }}"
                class="w-full p-3 rounded bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-red-500">
            @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Username -->
        <div class="mb-4">
            <input name="username" type="text" placeholder="Username" value="{{ old('username') }}"
                class="w-full p-3 rounded bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-red-500">
            @error('username')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email -->
        <div class="mb-4">
            <input name="email" type="email" placeholder="Email" value="{{ old('email') }}"
                class="w-full p-3 rounded bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-red-500">
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-4">
            <input name="password" type="password" placeholder="Password"
                class="w-full p-3 rounded bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-red-500">
            @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mb-4">
            <input name="password_confirmation" type="password" placeholder="Confirm Password"
                class="w-full p-3 rounded bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-red-500">
        </div>

        <!-- Phone Number -->
        <div class="mb-4">
            <input name="phone_number" type="text" placeholder="Phone Number" value="{{ old('phone_number') }}"
                class="w-full p-3 rounded bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-red-500">
            @error('phone_number')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Role Select -->
        <div class="mb-6">
            <select name="role"
                class="w-full p-3 rounded bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-red-500">
                <option value="" disabled {{ old('role') ? '' : 'selected' }}>Select Role</option>
                <option value="CUSTOMER" {{ old('role') == 'CUSTOMER' ? 'selected' : '' }}>Customer</option>
                <option value="OWNER" {{ old('role') == 'OWNER' ? 'selected' : '' }}>Owner</option>
            </select>
            @error('role')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit"
            class="w-full bg-red-500 text-white font-bold py-2 rounded hover:bg-red-600 transition duration-300">
            Register
        </button>
    </form>
</x-layout>