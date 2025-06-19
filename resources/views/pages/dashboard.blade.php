@extends('components.dashboard-layout')

@section('title', 'Dashboard')

@section('content')
    <!-- Judul & Deskripsi -->
    <section class="mb-10">
        @auth
            <h2 class="text-2xl font-bold mb-2">Welcome, {{ auth()->user()->name }}!</h2>
            <p class="text-gray-600">
                @php
                    $role = auth()->user()->role;
                @endphp

                @switch($role)
                    @case('ADMIN')
                        Here you can manage users, fields, and oversee the entire system efficiently.
                        @break
                    @case('OWNER')
                        You have full control over field listings, bookings, and payments.
                        @break
                    @case('CUSTOMER')
                        Manage your bookings, explore available fields, and enjoy the game!
                        @break
                    @default
                        Welcome to your personalized dashboard.
                @endswitch
            </p>
        @else
            <h2 class="text-2xl font-bold mb-2">Welcome to Yapping Sport Center</h2>
            <p class="text-gray-600">
                Discover mini soccer fields and join the game. Please log in to access booking and payment features.
            </p>
        @endauth
    </section>

    @auth
        @php
            $role = auth()->user()->role;
        @endphp

        @if ($role === 'ADMIN')
            <!-- Admin Dashboard -->
            <section class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                <div class="bg-white p-6 rounded-lg shadow hover:shadow-md transition">
                    <h3 class="text-lg font-semibold text-blue-600">Total Users</h3>
                    <p class="text-3xl font-bold mt-2">45</p>
                    <p class="text-sm text-gray-500 mt-1">Registered on the platform</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow hover:shadow-md transition">
                    <h3 class="text-lg font-semibold text-blue-600">Fields Managed</h3>
                    <p class="text-3xl font-bold mt-2">5</p>
                    <p class="text-sm text-gray-500 mt-1">Available for bookings</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow hover:shadow-md transition">
                    <h3 class="text-lg font-semibold text-blue-600">Total Bookings</h3>
                    <p class="text-3xl font-bold mt-2">120</p>
                    <p class="text-sm text-gray-500 mt-1">Across all users</p>
                </div>
            </section>

            <!-- Admin Activity Log -->
            <section class="bg-white p-6 rounded-lg shadow mb-10">
                <h3 class="text-xl font-semibold mb-2 text-indigo-600">Recent Activities</h3>
                <ul class="text-gray-700 list-disc pl-5 space-y-2">
                    <li>New user registered: John Doe</li>
                    <li>Payment confirmed for booking #124</li>
                    <li>New field added: Yapping Arena B</li>
                </ul>
            </section>

        @elseif ($role === 'OWNER')
            <!-- Owner Dashboard -->
            <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
                <div class="bg-white p-6 rounded-lg shadow hover:shadow-md transition">
                    <h3 class="text-lg font-semibold text-green-600">Your Fields</h3>
                    <p class="text-3xl font-bold mt-2">3</p>
                    <p class="text-sm text-gray-500 mt-1">Currently listed</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow hover:shadow-md transition">
                    <h3 class="text-lg font-semibold text-green-600">Bookings</h3>
                    <p class="text-3xl font-bold mt-2">40</p>
                    <p class="text-sm text-gray-500 mt-1">For your fields this month</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow hover:shadow-md transition">
                    <h3 class="text-lg font-semibold text-green-600">Income</h3>
                    <p class="text-3xl font-bold mt-2">Rp 3,200,000</p>
                    <p class="text-sm text-gray-500 mt-1">Estimated this month</p>
                </div>
            </section>


        @elseif ($role === 'CUSTOMER')
            <!-- Customer Dashboard -->
            <section class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
                <div class="bg-white p-6 rounded-lg shadow hover:shadow-md transition">
                    <h3 class="text-lg font-semibold text-purple-600">Your Bookings</h3>
                    <p class="text-3xl font-bold mt-2">2</p>
                    <p class="text-sm text-gray-500 mt-1">Active this week</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow hover:shadow-md transition">
                    <h3 class="text-lg font-semibold text-purple-600">Upcoming Matches</h3>
                    <p class="text-3xl font-bold mt-2">1</p>
                    <p class="text-sm text-gray-500 mt-1">On your schedule</p>
                </div>
            </section>
        @endif
    @endauth
@endsection