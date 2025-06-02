<header class="navbar">
    <div class="container header-content">
        <div class="logo">
            <a href="/">
                <img src="{{ asset('assets/logo/logo.png') }}" alt="Yapping Logo" class="logo-img">
                <span class="logo-text">Yapping Sport Center</span>
            </a>
        </div>
        <button class="mobile-menu-btn" id="menuToggle">☰</button>
        <nav id="mainNav" class="nav-menu">
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/about">About Us</a></li>
                <li><a href="/rent">Rent Field</a></li>
                <li><a href="/location">Location</a></li>
                @guest
                    <li><a href="{{ route('register') }}">Register</a></li>
                    <li><a href="{{ route('login') }}">Login</a></li>
                @else
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                           class="logout-btn">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
        </nav>
    </div>
</header>
