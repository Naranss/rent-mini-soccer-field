<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>{{ $title ?? 'Yapping Sport Center' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Lucide Icons CDN -->
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-gray-50 text-gray-800">

<!-- Navbar -->
<header class="bg-gray-900 text-white">
    <div class="container mx-auto px-6 py-4 flex items-center justify-between">
        <!-- Logo -->
        <a href="/">
            <img src="{{ asset('assets/logo/logo.png') }}" alt="Yapping Logo" class="h-10 w-auto">
        </a>

        <!-- Mobile Toggle -->
        <button class="md:hidden" id="menuToggle">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>

        <!-- Desktop Nav -->
        <nav id="mainNav" class="hidden md:flex items-center space-x-6">
            <a href="/about" class="hover:text-indigo-400">About Us</a>
            <a href="{{ route('rent.index') }}" class="hover:text-indigo-400">Rent Field</a>
            <a href="/location" class="hover:text-indigo-400">Location</a>

            @guest
                <a href="{{ route('register') }}"
                   class="px-4 py-1 border border-white rounded hover:bg-white hover:text-gray-900 text-sm">Register</a>
                <a href="{{ route('login') }}"
                   class="px-4 py-1 bg-indigo-500 text-white rounded hover:bg-indigo-600 text-sm">Login</a>
            @else
                <!-- User Icon and Dropdown -->
                <div class="relative">
                    <button id="userMenuToggle" class="flex items-center gap-2">
                        <!-- User icon -->
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M5.121 17.804A4 4 0 017 16h10a4 4 0 011.879.804M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <!-- Down arrow -->
                        <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <!-- Dropdown -->
                    <div id="userDropdown"
                         class="absolute right-0 mt-2 w-44 bg-white text-gray-800 rounded-md shadow-lg hidden z-50">
                        <a href="{{ route('dashboard') }}"
                           class="flex items-center px-4 py-2 hover:bg-gray-100 transition">
                            <i data-lucide="layout-dashboard" class="w-5 h-5 text-indigo-500 mr-2"></i>
                            Dashboard
                        </a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                    class="flex items-center w-full px-4 py-2 text-left hover:bg-gray-100 transition">
                                <i data-lucide="log-out" class="w-5 h-5 text-red-500 mr-2"></i>
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            @endguest
        </nav>
    </div>

    <!-- Mobile Nav -->
    <div id="mobileMenu" class="md:hidden hidden px-6 pb-4">
        <div class="flex flex-col space-y-3">
            <a href="/about" class="hover:text-indigo-400">About Us</a>
            <a href="/rent" class="hover:text-indigo-400">Rent Field</a>
            <a href="/location" class="hover:text-indigo-400">Location</a>

            @guest
                <a href="{{ route('register') }}"
                   class="px-4 py-2 border border-white rounded text-center text-sm hover:bg-white hover:text-gray-900">Register</a>
                <a href="{{ route('login') }}"
                   class="px-4 py-2 bg-indigo-500 text-white rounded text-center text-sm hover:bg-indigo-600">Login</a>
            @else
                <a href="{{ route('dashboard') }}"
                   class="px-4 py-2 text-center text-sm hover:text-indigo-400">Dashboard</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                            class="px-4 py-2 bg-red-500 text-white rounded text-sm w-full text-center hover:bg-red-600">
                        Logout
                    </button>
                </form>
            @endguest
        </div>
    </div>
</header>

<!-- Toggle Scripts -->
<script>
    // Mobile menu toggle
    document.getElementById('menuToggle').addEventListener('click', () => {
        document.getElementById('mobileMenu').classList.toggle('hidden');
    });

    // User dropdown toggle
    const userToggle = document.getElementById('userMenuToggle');
    const userDropdown = document.getElementById('userDropdown');

    userToggle?.addEventListener('click', (e) => {
        e.stopPropagation();
        userDropdown.classList.toggle('hidden');
    });

    window.addEventListener('click', function (e) {
        if (!userToggle.contains(e.target) && !userDropdown.contains(e.target)) {
            userDropdown.classList.add('hidden');
        }
    });

    // Activate Lucide icons
    lucide.createIcons();
</script>

</body>
</html>