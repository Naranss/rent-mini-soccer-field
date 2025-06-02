<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Yapping Mini Soccer' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black flex items-center justify-center min-h-screen">
    <div class="flex w-full max-w-6xl mx-auto">
        <!-- Background Image -->
        <div class="w-1/2 hidden md:block">
            <img src="{{ asset('images/44.png') }}" class="object-cover h-full w-full" alt="soccer net">
        </div>

        <!-- Content -->
        <div class="w-full md:w-1/2 flex items-center justify-center bg-gray-800 p-10 rounded-md">
            {{ $slot }}
        </div>
    </div>
</body>
</html>
