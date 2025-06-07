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
                <a href="/home" class="hover:text-indigo-400 transition">Home</a>
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
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit"
                                class="px-4 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition text-sm">
                            Logout
                        </button>
                    </form>
                @endguest
            </nav>
        </div>

        <!-- Mobile Nav -->
        <div id="mobileMenu" class="md:hidden hidden px-6 pb-4">
            <div class="flex flex-col space-y-3">
                <a href="/home" class="hover:text-indigo-400">Home</a>
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
        document.getElementById('menuToggle').addEventListener('click', () => {
            document.getElementById('mobileMenu').classList.toggle('hidden');
        });
    </script>

</body>
</html>