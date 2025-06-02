
<x-layout :title="'Register'">
    <form method="POST" action="" class="w-full max-w-sm">
        @csrf
        <h2 class="text-white text-3xl font-bold mb-6">Register</h2>

        <input name="username" type="text" placeholder="Username" class="w-full mb-4 p-3 rounded bg-gray-700 text-white focus:outline-none">
        <input name="email" type="email" placeholder="Email" class="w-full mb-4 p-3 rounded bg-gray-700 text-white focus:outline-none">
        <input name="password" type="password" placeholder="Password" class="w-full mb-4 p-3 rounded bg-gray-700 text-white focus:outline-none">
        <input name="phone" type="text" placeholder="Phone Number" class="w-full mb-4 p-3 rounded bg-gray-700 text-white focus:outline-none">
        
        <select name="role" class="w-full mb-4 p-3 rounded bg-gray-700 text-white focus:outline-none">
            <option value="" disabled selected>Select Role</option>
            <option value="user">User</option>
            <option value="admin">Admin</option>
            <option value="manager">Owner</option>
        </select>

        <button type="submit" class="w-full bg-red-500 text-white font-bold py-2 rounded hover:bg-red-600">Register</button>
    </form>
</x-layout>
