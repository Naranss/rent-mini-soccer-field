<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>{{ $title ?? 'Yapping Sport Center' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">

    <!-- Navbar -->
    <header class="bg-gray-900 text-white">
        <div class="container mx-auto px-6 py-4 flex items-center justify-between">
            
            <!-- Logo -->
            <div class="flex items-center">
                <a href="/">
                    <img src="{{ asset('assets/logo/logo.png') }}" alt="Yapping Logo" class="h-10 w-auto">
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <button class="md:hidden text-white focus:outline-none" id="menuToggle">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <!-- Desktop Nav -->
            <nav id="mainNav" class="hidden md:flex space-x-6 items-center">
                <a href="/about" class="hover:text-indigo-400 transition">About Us</a>
                <a href="/rent" class="hover:text-indigo-400 transition">Rent Field</a>
                <a href="/location" class="hover:text-indigo-400 transition">Location</a>

                @guest
                    <a href="{{ route('register') }}"
                       class="px-4 py-1 border border-white rounded hover:bg-white hover:text-gray-900 transition text-sm">
                        Register
                    </a>
                    <a href="{{ route('login') }}"
                       class="px-4 py-1 bg-indigo-500 text-white rounded hover:bg-indigo-600 transition text-sm">
                        Login
                    </a>
                @else
                    <!-- User Icon with Dropdown -->
                    <div class="relative">
                        <button id="userMenuToggle" class="flex items-center gap-2 focus:outline-none">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" stroke-width="2"
                                 viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M5.121 17.804A4 4 0 017 16h10a4 4 0 011.879.804M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </button>

                        <div id="userDropdown"
                             class="absolute right-0 mt-2 w-40 bg-white text-gray-800 rounded-md shadow-lg hidden z-50">
                            <a href="{{ route('dashboard') }}"
                               class="block px-4 py-2 hover:bg-gray-100 transition">Dashboard</a>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit"
                                        class="w-full text-left px-4 py-2 hover:bg-gray-100 transition">
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
                       class="px-4 py-2 border border-white rounded hover:bg-white hover:text-gray-900 text-center text-sm">
                        Register
                    </a>
                    <a href="{{ route('login') }}"
                       class="px-4 py-2 bg-indigo-500 text-white rounded hover:bg-indigo-600 text-center text-sm">
                        Login
                    </a>
                @else
                    <a href="{{ route('dashboard') }}"
                       class="px-4 py-2 text-center hover:text-indigo-400 text-sm">
                        Dashboard
                    </a>
                    <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                                class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 text-sm w-full text-center">
                            Logout
                        </button>
                    </form>
                @endguest
            </div>
        </div>
    </header>

    <!-- Toggle Script -->
    <script>
        // Mobile menu toggle
        document.getElementById('menuToggle').addEventListener('click', () => {
            document.getElementById('mobileMenu').classList.toggle('hidden');
        });

        // User dropdown toggle
        const userToggle = document.getElementById('userMenuToggle');
        const userDropdown = document.getElementById('userDropdown');

        userToggle?.addEventListener('click', () => {
            userDropdown.classList.toggle('hidden');
        });

        // Hide dropdown when clicking outside
        window.addEventListener('click', function (e) {
            if (!userToggle.contains(e.target) && !userDropdown.contains(e.target)) {
                userDropdown.classList.add('hidden');
            }
        });
    </script>

</body>
</html>
