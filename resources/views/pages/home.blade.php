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
    <section class="bg-[url('{{ asset('assets/field/field2.jpg') }}')] bg-cover bg-center relative py-32 text-white text-center">
        <div class="bg-black bg-opacity-50 absolute inset-0"></div>
        <div class="relative z-10 container mx-auto px-6 max-w-4xl">
            <h1 class="text-5xl font-extrabold drop-shadow-md">Play on the Best Mini Soccer Fields</h1>
            <p class="mt-4 text-xl drop-shadow max-w-2xl mx-auto">Choose from various mini soccer field types at Yapping Sport Center – built for fun, training, and tournaments in Sleman.</p>
        </div>
    </section>

    <!-- Mini Soccer Field Categories -->
    <section class="py-20 px-6 bg-white">
        <div class="container mx-auto max-w-7xl">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Mini Soccer Field Categories</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
                @foreach ([
                    ['img' => 'field_synthetic.jpg', 'title' => 'Synthetic Turf Field', 'addr' => 'Jl. Sportiva No. 10, Sleman', 'stars' => 5, 'reviews' => 90],
                    ['img' => 'field_natural.jpg', 'title' => 'Natural Grass Field', 'addr' => 'Jl. Hijau Abadi No. 3, Sleman', 'stars' => 4, 'reviews' => 60],
                    ['img' => 'field_indoor.jpg', 'title' => 'Indoor Mini Soccer', 'addr' => 'Jl. Indoor Arena No. 5, Sleman', 'stars' => 4, 'reviews' => 75]
                ] as $venue)
                <article class="bg-gray-50 rounded-xl shadow hover:shadow-lg transition overflow-hidden">
                    <img src="{{ asset('assets/images/' . $venue['img']) }}" alt="{{ $venue['title'] }}" class="w-full h-44 object-cover" />
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-1">{{ $venue['title'] }}</h3>
                        <p class="text-gray-600 text-sm mb-3">{{ $venue['addr'] }}</p>
                        <div class="flex items-center gap-2 text-yellow-400 text-lg mb-4">
                            {{ str_repeat('⭐', $venue['stars']) }}{{ $venue['stars'] < 5 ? '☆' : '' }}
                            <span class="text-sm text-gray-500">({{ $venue['reviews'] }} reviews)</span>
                        </div>
                        <a href="/rent" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded transition">
                            Book Now
                        </a>
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
                    ['img' => 'event1.jpg', 'title' => 'Community League 2024', 'desc' => '20 teams from local communities competed in a friendly tournament.'],
                    ['img' => 'event2.jpg', 'title' => 'Company Cup', 'desc' => 'An annual soccer match between local companies for team bonding.'],
                    ['img' => 'event3.jpg', 'title' => 'Youth Training Program', 'desc' => 'Training sessions for kids aged 10–15 every weekend.']
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
            <p class="text-gray-600 text-lg">We offer a professional mini soccer experience with well-maintained fields, easy online booking, and various field types to fit your needs. Whether for friendly matches, training, or serious competition, Yapping is the place to play.</p>
        </div>
    </section>

    <x-footer />

</body>
</html>