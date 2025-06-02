<x-layout :title="'Login'">
    <form method="POST" action="" class="w-full max-w-sm">
        @csrf
        <h2 class="text-white text-3xl font-bold mb-6">Login</h2>

        <input name="username" type="text" placeholder="Username" class="w-full mb-4 p-3 rounded bg-gray-700 text-white focus:outline-none">
        <input name="password" type="password" placeholder="Password" class="w-full mb-4 p-3 rounded bg-gray-700 text-white focus:outline-none">

        <button type="submit" class="w-full bg-red-500 text-white font-bold py-2 rounded hover:bg-red-600">Login</button>

        <div class="text-white mt-4 text-sm text-center">
            <a href="#" class="hover:underline">Forgot Password ?</a><br>
            Don’t have an account? <a href="/register" class="font-bold hover:underline">Register Now.</a>
        </div>
    </form>
</x-layout>
