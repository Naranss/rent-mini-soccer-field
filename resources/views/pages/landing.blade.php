<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Rent Mini Soccer Field | Yapping Sport Center</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .hero-bg {
            background-image: url('{{ asset("assets/field/field.jpg") }}');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800">

    <x-navbar />

    <!-- Hero Jumbotron -->
    <section class="hero-bg relative text-white py-28">
        <div class="bg-black bg-opacity-50 absolute inset-0"></div>
        <div class="relative z-10 container mx-auto px-6 flex flex-col md:flex-row items-center gap-10">
            <div class="md:w-2/3 text-center md:text-left space-y-6">
                <h1 class="text-4xl md:text-5xl font-extrabold leading-tight drop-shadow-lg">
                    Rent the Best Mini Soccer Field in Sleman
                </h1>
                <p class="text-lg md:text-xl max-w-xl drop-shadow-md">
                    Play anytime with professional-quality fields, easy booking, and great facilities.
                </p>
                <a href="/rent" class="inline-block bg-white text-gray-800 font-semibold px-8 py-3 rounded-full shadow-lg hover:bg-gray-200 transition">
                    Book Your Slot Now
                </a>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section class="container mx-auto px-6 py-20">
        <h2 class="text-3xl font-extrabold text-gray-800 text-center mb-12">
            Why Choose Yapping Sport Center?
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-10">
            <!-- Feature Cards -->
            @foreach ([
            ['icon' => 'online-booking.png', 'title' => 'Online Booking', 'desc' => 'Book your preferred slot in just a few clicks, anytime and anywhere.'],
            ['icon' => 'quality-badge.png', 'title' => 'Professional Quality', 'desc' => 'Our mini soccer fields are maintained to provide the best playing experience.'],
            ['icon' => 'location.png', 'title' => 'Easy Location', 'desc' => 'Located strategically in Sleman with easy access and parking space.'],
            ['icon' => 'locker.png', 'title' => 'Clean Locker Rooms', 'desc' => 'Changing rooms and showers to freshen up before and after the game.']
            ] as $feature)
            <div class="bg-white p-6 rounded-xl shadow-md text-center hover:shadow-lg transition">
                <img src="{{ asset('assets/icons/' . $feature['icon']) }}" alt="{{ $feature['title'] }}" class="mx-auto mb-4 w-14 h-14" loading="lazy" />
                <h4 class="text-lg font-semibold text-gray-800 mb-2">{{ $feature['title'] }}</h4>
                <p class="text-gray-600 text-sm">{{ $feature['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </section>

    <!-- How it Works -->
    <section class="bg-white py-20">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-extrabold text-gray-800 mb-12">How to Rent a Field</h2>
            <div class="flex flex-col md:flex-row justify-center gap-8 max-w-5xl mx-auto">
                @foreach ([
                ['step' => 1, 'title' => 'Choose Your Slot', 'desc' => 'Select date and time for your game through our online system.'],
                ['step' => 2, 'title' => 'Confirm Booking', 'desc' => 'Review your details and confirm your reservation instantly.'],
                ['step' => 3, 'title' => 'Enjoy Playing', 'desc' => 'Show up and enjoy the game in our professional mini soccer fields.']
                ] as $step)
                <div class="bg-gray-100 rounded-xl p-8 shadow hover:shadow-lg transition flex-1">
                    <div class="w-12 h-12 rounded-full bg-gray-800 text-white font-bold flex items-center justify-center mx-auto mb-4 text-xl">
                        {{ $step['step'] }}
                    </div>
                    <h4 class="text-xl font-semibold text-gray-800 mb-2">{{ $step['title'] }}</h4>
                    <p class="text-gray-600">{{ $step['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Location Section -->
    <section class="bg-gray-100 py-20">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-3xl font-extrabold text-gray-800 mb-12">Find Us</h2>
        <div class="mx-auto rounded-xl overflow-hidden shadow-lg max-w-6xl">
            <iframe
                src="https://www.google.com/maps?q=Yapping%20Sport%20Center&output=embed"
                class="w-full h-60 border-0"
                allowfullscreen
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
        </div>
    </div>
</section>


    <x-footer />

</body>

</html>