<x-layout :title="'Register'">
    <form method="POST" action='/register' class="w-full max-w-sm">
        @csrf
        <h2 class="text-white text-3xl font-bold mb-6">Register</h2>

        <input name="name" type="text" placeholder="Full Name" value="{{ old('name') }}"
            class="w-full mb-4 p-3 rounded bg-gray-700 text-white focus:outline-none">
        @error('name')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror

        <input name="username" type="text" placeholder="Username" value="{{ old('username') }}"
            class="w-full mb-4 p-3 rounded bg-gray-700 text-white focus:outline-none">
        @error('username')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror

        <input name="email" type="email" placeholder="Email" value="{{ old('email') }}"
            class="w-full mb-4 p-3 rounded bg-gray-700 text-white focus:outline-none">
        @error('email')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror

        <input name="password" type="password" placeholder="Password"
            class="w-full mb-4 p-3 rounded bg-gray-700 text-white focus:outline-none">
        @error('password')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror

        <input name="password_confirmation" type="password" placeholder="Confirm Password"
            class="w-full mb-4 p-3 rounded bg-gray-700 text-white focus:outline-none">

        <input name="phone_number" type="text" placeholder="Phone Number" value="{{ old('phone_number') }}"
            class="w-full mb-4 p-3 rounded bg-gray-700 text-white focus:outline-none">
        @error('phone_number')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror

        <select name="role" class="w-full mb-4 p-3 rounded bg-gray-700 text-white focus:outline-none">
            <option value="" disabled {{ old('role') ? '' : 'selected' }}>Select Role</option>
            <option value="CUSTOMER" {{ old('role') == 'CUSTOMER' ? 'selected' : '' }}>Customer</option>
            <option value="OWNER" {{ old('role') == 'OWNER' ? 'selected' : '' }}>Owner</option>
        </select>
        @error('role')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror

        <button type="submit"
            class="w-full bg-red-500 text-white font-bold py-2 rounded hover:bg-red-600">Register</button>
    </form>
</x-layout>
