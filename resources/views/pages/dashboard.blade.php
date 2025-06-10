<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard | Yapping Sport Center</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen">

    <!-- Navbar / Header -->
    <header class="bg-indigo-600 text-white px-6 py-4 shadow">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-semibold">Yapping Sport Center</h1>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               class="text-sm bg-red-500 hover:bg-red-600 px-3 py-1 rounded">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-10">
        <h2 class="text-2xl font-bold mb-2">Welcome to your Dashboard</h2>
        <p class="text-gray-600 mb-6">Here you can manage your bookings, view field availability, and explore more about Yapping Sport Center.</p>

        <!-- Info Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-md transition">
                <h3 class="text-lg font-semibold text-indigo-600">Bookings</h3>
                <p class="text-3xl font-bold mt-2">12</p>
                <p class="text-sm text-gray-500 mt-1">Total active field bookings</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow hover:shadow-md transition">
                <h3 class="text-lg font-semibold text-indigo-600">Fields</h3>
                <p class="text-3xl font-bold mt-2">5</p>
                <p class="text-sm text-gray-500 mt-1">Total mini soccer fields available</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow hover:shadow-md transition">
                <h3 class="text-lg font-semibold text-indigo-600">Upcoming Matches</h3>
                <p class="text-3xl font-bold mt-2">3</p>
                <p class="text-sm text-gray-500 mt-1">Scheduled this week</p>
            </div>
        </div>

        <!-- Description Section -->
        <section class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-xl font-semibold mb-2 text-indigo-600">About Yapping Sport Center</h3>
            <p class="text-gray-700 leading-relaxed">
                Yapping Sport Center is a premier mini soccer facility designed to bring sports lovers together in a fun and energetic environment. 
                With well-maintained fields, a user-friendly booking system, and a vibrant community, our goal is to provide the best space for recreation, training, and friendly matches. 
                Whether you're an amateur player or a local team, our platform supports all your scheduling and management needs.
            </p>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-200 text-center py-4 mt-10 text-sm text-gray-600">
        &copy; {{ date('Y') }} Yapping Sport Center. All rights reserved.
    </footer>

</body>
</html>
