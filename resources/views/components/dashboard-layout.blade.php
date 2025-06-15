<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Dashboard') - Yapping Sport Center</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen flex">

    <!-- Sidebar -->
    <aside id="sidebar" class="w-64 bg-gray-800 text-white min-h-screen flex flex-col justify-between transition-all duration-300">
        <div>
            <!-- Sidebar Header -->
            <div class="flex items-center justify-between p-6 border-b border-gray-700">
                <span id="sidebarTitle" class="text-xl font-bold">Yapping</span>
                <button id="toggleSidebar" class="text-white focus:outline-none">
                    <i class="fas fa-bars"></i>
                </button>
            </div>

            <!-- Sidebar Menu -->
            <ul class="mt-6 space-y-2 px-4 text-sm">
                {{-- @php $role = auth()->user()->role ?? 'guest'; @endphp --}}

                <li>
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-2 p-2 rounded hover:bg-gray-700">
                        <i class="fas fa-home"></i> <span class="sidebar-label">Dashboard</span>
                    </a>
                </li>

                {{-- @if(in_array($role, ['OWNER', 'ADMIN'])) --}}
                <li>
                    <a href="{{ route('fields.index') }}" class="flex items-center gap-2 p-2 rounded hover:bg-gray-700">
                        <i class="fas fa-list"></i> <span class="sidebar-label">Field List</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('field-images.index') }}" class="flex items-center gap-2 p-2 rounded hover:bg-gray-700">
                        <i class="fas fa-image"></i> <span class="sidebar-label">Field Images</span>
                    </a>
                </li>
                {{-- @endif --}}

                {{-- @if(in_array($role, ['CUSTOMER', 'OWNER', 'ADMIN']))  --}}
                <li>
                    <a href="{{ route('bookings.index') }}" class="flex items-center gap-2 p-2 rounded hover:bg-gray-700">
                        <i class="fas fa-table"></i> <span class="sidebar-label">Booking Table</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('payments.index') }}" class="flex items-center gap-2 p-2 rounded hover:bg-gray-700">
                        <i class="fas fa-money-check-dollar"></i> <span class="sidebar-label">Payment Table</span>
                    </a>
                </li>
                {{-- @endif --}}

                {{--@if($role === 'ADMIN') --}}
                <li>
                    <a href="{{ route('users.index') }}" class="flex items-center gap-2 p-2 rounded hover:bg-gray-700">
                        <i class="fas fa-users"></i> <span class="sidebar-label">User Table</span>
                    </a>
                </li>
                {{-- @endif --}}
            </ul>
        </div>

        <!-- Sidebar Footer -->
        <div class="p-4 border-t border-gray-700 space-y-2">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="flex items-center gap-2 w-full text-left p-2 rounded hover:bg-gray-700">
                    <i class="fas fa-sign-out-alt"></i> <span class="sidebar-label">Logout</span>
                </button>
            </form>
            <a href="{{ url('/') }}" class="flex items-center gap-2 w-full text-left p-2 rounded hover:bg-gray-700">
                <i class="fas fa-arrow-left"></i> <span class="sidebar-label">Back to Landing Page</span>
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <main class="p-6 flex-1 overflow-y-auto">
            @yield('content')
        </main>
    </div>

    <!-- Sidebar Toggle Script -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const toggleBtn = document.getElementById('toggleSidebar');
        const labels = document.querySelectorAll('.sidebar-label');
        const title = document.getElementById('sidebarTitle');

        let collapsed = false;

        toggleBtn.addEventListener('click', () => {
            collapsed = !collapsed;

            if (collapsed) {
                sidebar.classList.remove('w-64');
                sidebar.classList.add('w-20');
                labels.forEach(label => label.classList.add('hidden'));
                title.classList.add('hidden');
            } else {
                sidebar.classList.remove('w-20');
                sidebar.classList.add('w-64');
                labels.forEach(label => label.classList.remove('hidden'));
                title.classList.remove('hidden');
            }
        });
    </script>

</body>
</html>