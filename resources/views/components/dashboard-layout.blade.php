<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title') - Yapping Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <!-- Tambah font awesome jika perlu untuk icon sidebar -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>
<body>

<div class="dashboard-wrapper">

    <aside class="sidebar">
        <div class="sidebar-header">
            <h2>Yapping Dashboard</h2>
        </div>

        <ul class="sidebar-menu">

            @php
                $role = auth()->user()->role ?? 'guest';
            @endphp

            @if(in_array($role, ['owner', 'admin']))
                <li><a href="{{ route('fields.index') }}"><i class="fas fa-list"></i> Field List</a></li>
                <li><a href="{{ route('fields.images') }}"><i class="fas fa-image"></i> Field Images</a></li>
            @endif

            @if(in_array($role, ['customer', 'owner', 'admin']))
                <li><a href="{{ route('bookings.index') }}"><i class="fas fa-table"></i> Booking Table</a></li>
                <li><a href="{{ route('payments.index') }}"><i class="fas fa-money-check-dollar"></i> Payment Table</a></li>
            @endif

            @if($role === 'admin')
                <li><a href="{{ route('users.index') }}"><i class="fas fa-users"></i> User Table</a></li>
            @endif

        </ul>

        <div class="sidebar-footer">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</button>
            </form>
        </div>
    </aside>

    <main class="main-content">
        @yield('content')
    </main>

</div>

</body>
</html>
