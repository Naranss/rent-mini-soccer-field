<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Yapping Mini Soccer | Home</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-800">

    <x-navbar />

    <!-- Hero Section -->
    <section class="bg-[url('{{ asset('assets/field/venue1.jpeg') }}')] bg-cover bg-center relative py-32 text-white text-center">
        <div class="bg-black bg-opacity-50 absolute inset-0"></div>
        <div class="relative z-10 container mx-auto px-6 max-w-4xl">
            <h1 class="text-5xl font-extrabold drop-shadow-md">Play on the Best Mini Soccer Fields</h1>
            <p class="mt-4 text-xl drop-shadow max-w-2xl mx-auto">Choose from various mini soccer field types at Yapping Sport Center – built for fun, training, and tournaments in Sleman, Yogyakarta.</p>
        </div>
    </section>

    <!-- Mini Soccer Field Categories -->
    <section class="py-20 px-6 bg-white">
        <div class="container mx-auto max-w-7xl">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Mini Soccer Field Categories</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
                @foreach ([
                [
                'img' => 'venue2.jpg',
                'title' => 'Synthetic Turf Field',
                'addr' => '📍 Jl. Kaliurang Km 7.5, Sleman, Yogyakarta',
                'stars' => 5,
                'reviews' => 120,
                'desc' => 'Modern synthetic turf perfect for all-weather play and high durability, ideal for tournaments and fast-paced games.'
                ],
                [
                'img' => 'venue3.jpg',
                'title' => 'Natural Grass Field',
                'addr' => '📍 Jl. Magelang Km 6, Mlati, Sleman, Yogyakarta',
                'stars' => 4,
                'reviews' => 98,
                'desc' => 'Enjoy a classic football experience with natural grass, perfect for casual and community matches.'
                ],
                [
                'img' => 'venue4.jpg',
                'title' => 'Indoor Mini Soccer',
                'addr' => '📍 Jl. Laksda Adisucipto No.165, Sleman, Yogyakarta',
                'stars' => 4,
                'reviews' => 86,
                'desc' => 'Play regardless of weather in our indoor facility with excellent lighting and non-slip flooring for safe, skillful matches.'
                ]
                ] as $venue)
                <article class="bg-gray-50 rounded-xl shadow hover:shadow-lg transition overflow-hidden">
                    <img src="{{ asset('assets/field/' . $venue['img']) }}" alt="{{ $venue['title'] }}" class="w-full h-44 object-cover" />
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-1">{{ $venue['title'] }}</h3>
                        <p class="text-gray-600 text-sm mb-1">{{ $venue['addr'] }}</p>
                        <p class="text-gray-600 text-sm mb-3">{{ $venue['desc'] }}</p>
                        <div class="flex items-center gap-2 text-yellow-400 text-lg mb-4">
                            {{ str_repeat('⭐', $venue['stars']) }}{{ $venue['stars'] < 5 ? '☆' : '' }}
                            <span class="text-sm text-gray-500">({{ $venue['reviews'] }} reviews)</span>
                        </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Mini Soccer Events -->
    <section class="bg-gray-100 py-20 px-6">
        <div class="container mx-auto max-w-6xl">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Past Mini Soccer Events</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach ([
                [
                'img' => 'event2.jpg',
                'title' => 'Central Group Mini Soccer Tournament',
                'desc' => 'A regional tournament hosted by Central Group, featuring youth and amateur clubs from Yogyakarta.'
                ],
                [
                'img' => 'event1.jpg',
                'title' => 'Indomanutd Cup',
                'desc' => 'An annual cup held by Indomanutd community, gathering fans and futsal enthusiasts from across Jogja.'
                ],
                [
                'img' => 'event3.jpg',
                'title' => 'Buka Mini Soccer Media Cup 2022',
                'desc' => 'A Ramadan special tournament organized by local media for journalists and creatives in Sleman.'
                ]
                ] as $event)
                <div class="bg-white rounded-xl shadow hover:shadow-lg overflow-hidden transition">
                    <img src="{{ asset('assets/events/' . $event['img']) }}" alt="{{ $event['title'] }}" class="w-full h-40 object-cover" />
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-2 text-gray-800">{{ $event['title'] }}</h3>
                        <p class="text-gray-600 text-sm">{{ $event['desc'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- About Mini Soccer -->
    <section class="bg-white py-16 px-6">
        <div class="container mx-auto max-w-4xl text-center">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Why Play Mini Soccer at Yapping?</h2>
            <p class="text-gray-600 text-lg">
                We offer a professional mini soccer experience with well-maintained fields, easy online booking, and various field types to fit your needs. Whether for friendly matches, training, or serious competition, Yapping is the place to play.
            </p>
        </div>
    </section>

    <x-footer />

</body>

</html>