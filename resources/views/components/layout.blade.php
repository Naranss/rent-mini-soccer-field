<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Yapping Mini Soccer' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/layout-login.css') }}">
</head>
<body class="custom-bg">

    <!-- Overlay gelap agar form lebih terbaca -->
    <div class="overlay"></div>

    <!-- Form login/register muncul di tengah -->
    <div class="content-box">
        @if(session('login_failed'))
            <div class="login-failed">
                {{ session('login_failed') }}
            </div>
        @endif

        {{ $slot }}
    </div>

</body>
</html>