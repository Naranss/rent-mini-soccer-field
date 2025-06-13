<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Dashboard') - Yapping Sport Center</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-gray-800 text-white min-h-screen flex flex-col justify-between">
        <div>
            <div class="p-6 text-2xl font-bold border-b border-gray-700">
                Yapping Dashboard
            </div>
            <ul class="mt-6 space-y-2 px-4 text-sm">
                @php $role = auth()->user()->role ?? 'guest'; @endphp

                @if(in_array($role, ['owner', 'admin']))
                    <li>
                        <a href="{{ route('fields.index') }}" class="flex items-center gap-2 p-2 rounded hover:bg-gray-700">
                            <i class="fas fa-list"></i> Field List
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('fields.images') }}" class="flex items-center gap-2 p-2 rounded hover:bg-gray-700">
                            <i class="fas fa-image"></i> Field Images
                        </a>
                    </li>
                @endif

                @if(in_array($role, ['customer', 'owner', 'admin']))
                    <li>
                        <a href="{{ route('bookings.index') }}" class="flex items-center gap-2 p-2 rounded hover:bg-gray-700">
                            <i class="fas fa-table"></i> Booking Table
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('payments.index') }}" class="flex items-center gap-2 p-2 rounded hover:bg-gray-700">
                            <i class="fas fa-money-check-dollar"></i> Payment Table
                        </a>
                    </li>
                @endif

                @if($role === 'admin')
                    <li>
                        <a href="{{ route('users.index') }}" class="flex items-center gap-2 p-2 rounded hover:bg-gray-700">
                            <i class="fas fa-users"></i> User Table
                        </a>
                    </li>
                @endif
            </ul>
        </div>

        <div class="p-4 border-t border-gray-700 space-y-2">
            <!-- Logout Button -->
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="flex items-center gap-2 w-full text-left p-2 rounded hover:bg-gray-700">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>

            <!-- Back to Landing Page -->
            <a href="{{ url('/') }}" class="flex items-center gap-2 w-full text-left p-2 rounded hover:bg-gray-700">
                <i class="fas fa-arrow-left"></i> Back to Landing Page
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Dynamic Page Content -->
        <main class="p-6 flex-1 overflow-y-auto">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-gray-200 text-center py-4 text-sm text-gray-600">
            &copy; {{ date('Y') }} Yapping Sport Center. All rights reserved.
        </footer>
    </div>

</body>
</html>