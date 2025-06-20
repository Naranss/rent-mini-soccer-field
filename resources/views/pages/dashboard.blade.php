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
@endsection