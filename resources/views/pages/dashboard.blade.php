@extends('components.dashboard-layout')

@section('title', 'Dashboard')

@section('content')
    <!-- Judul & Deskripsi -->
    <section class="mb-10">
        <h2 class="text-2xl font-bold mb-2">Welcome to your Dashboard</h2>
        <p class="text-gray-600">Here you can manage your bookings, view field availability, and explore more about Yapping Sport Center.</p>
    </section>

    <!-- Informasi Singkat (Info Cards) -->
    <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
        <!-- Booking Card -->
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-md transition">
            <h3 class="text-lg font-semibold text-indigo-600">Bookings</h3>
            <p class="text-3xl font-bold mt-2">12</p>
            <p class="text-sm text-gray-500 mt-1">Total active field bookings</p>
        </div>

        <!-- Fields Card -->
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-md transition">
            <h3 class="text-lg font-semibold text-indigo-600">Fields</h3>
            <p class="text-3xl font-bold mt-2">5</p>
            <p class="text-sm text-gray-500 mt-1">Total mini soccer fields available</p>
        </div>

        <!-- Upcoming Matches Card -->
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-md transition">
            <h3 class="text-lg font-semibold text-indigo-600">Upcoming Matches</h3>
            <p class="text-3xl font-bold mt-2">3</p>
            <p class="text-sm text-gray-500 mt-1">Scheduled this week</p>
        </div>
    </section>

    <!-- Tentang Yapping Sport Center -->
    <section class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-xl font-semibold mb-2 text-indigo-600">About Yapping Sport Center</h3>
        <p class="text-gray-700 leading-relaxed">
            Yapping Sport Center is a premier mini soccer facility designed to bring sports lovers together in a fun and energetic environment. 
            With well-maintained fields, a user-friendly booking system, and a vibrant community, our goal is to provide the best space for recreation, training, and friendly matches. 
            Whether you're an amateur player or a local team, our platform supports all your scheduling and management needs.
        </p>
    </section>
@endsection
