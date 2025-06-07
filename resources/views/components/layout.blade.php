<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>{{ $title ?? 'Yapping Mini Soccer' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-cover bg-center flex items-center justify-center relative"
      style="background-image: url({{ asset('assets/background/bg-1.png') }})">
>

    <!-- Overlay Gelap -->
    <div class="absolute inset-0 bg-black bg-opacity-70 z-0"></div>

    <!-- Box Login/Register -->
    <div class="relative z-10 w-full max-w-md bg-gray-800 bg-opacity-90 text-white p-10 rounded-lg shadow-xl">

        <!-- Alert Gagal Login -->
        @if(session('login_failed'))
            <div class="mb-4 px-4 py-3 bg-red-400 text-white text-center font-medium rounded-md shadow-md animate-fade-in">
                {{ session('login_failed') }}
            </div>
        @endif

        <!-- Slot Konten (Form Login/Register) -->
        {{ $slot }}
    </div>

    <!-- Animasi Fade In -->
    <style>
        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(-4px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fade-in 0.3s ease-in-out;
        }
    </style>

</body>
</html>