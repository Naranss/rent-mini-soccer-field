<x-layout :title="'Login'">
    @if (session()->has('success'))
        <div class="mb-4 p-3 rounded bg-green-500 text-white text-sm text-center">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('loginError'))
        <div class="mb-4 p-3 rounded bg-red-600 text-white text-sm text-center">
            {{ session('loginError') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login-auth') }}" class="w-full">
        @csrf
        <h2 class="text-white text-3xl font-bold mb-6 text-center">Login</h2>

        <input name="username" type="text" placeholder="Username"
            class="w-full mb-4 p-3 rounded bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-red-500">
        <input name="password" type="password" placeholder="Password"
            class="w-full mb-4 p-3 rounded bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-red-500">

        <button type="submit"
            class="w-full bg-red-500 text-white font-bold py-2 rounded hover:bg-red-600 transition duration-300">Login</button>

        <div class="text-white mt-4 text-sm text-center space-y-1">
            <a href="#" class="hover:underline">Forgot Password?</a><br>
            Don’t have an account? 
            <a href="{{ route('register') }}" class="font-bold hover:underline text-red-400">Register Now.</a>
        </div>
    </form>
</x-layout>