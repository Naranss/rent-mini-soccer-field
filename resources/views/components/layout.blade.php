<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Yapping Mini Soccer' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-cover bg-center relative flex items-center justify-center"
      style="background-image: url('{{ asset('assets/background/bg-1.png') }}')">

    <!-- Overlay gelap agar form lebih terbaca -->
    <div class="absolute inset-0 bg-black bg-opacity-70 z-0"></div>

    <!-- Form login/register muncul di tengah -->
    <div class="relative z-10 bg-gray-800 bg-opacity-90 p-10 rounded-md shadow-lg w-full max-w-md">
        {{ $slot }}
    </div>

</body>
</html>
