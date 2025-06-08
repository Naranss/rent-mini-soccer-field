<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Yapping Mini Soccer | About Us</title>
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

    <!-- About Section -->
    <section class="py-24 bg-white text-gray-800">
        <div class="container mx-auto max-w-5xl px-6 space-y-16">

            <div class="text-center">
                <h1 class="text-4xl font-extrabold mb-4">Get to Know Yapping</h1>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    More than just a sports center — Yapping was born out of passion for community, health, and togetherness. 
                    We're here to create spaces where stories, sweat, and smiles are shared.
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-12 items-start">
                <div>
                    <h2 class="text-2xl font-bold mb-3">Our Roots</h2>
                    <p class="text-gray-600 text-lg leading-relaxed">
                        Started in a small neighborhood of Sleman in 2015, Yapping grew from a simple idea: make sports accessible to everyone.
                        What began as a single futsal court is now a multi-facility venue built by and for the local community.
                    </p>
                </div>

                <div>
                    <h2 class="text-2xl font-bold mb-3">What Drives Us</h2>
                    <p class="text-gray-600 text-lg leading-relaxed">
                        We believe sports can break barriers. At Yapping, every match, training, or gathering becomes a moment to 
                        build connection, character, and confidence. Our drive isn’t just to provide space — it’s to create impact.
                    </p>
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-12 items-start">
                <div>
                    <h2 class="text-2xl font-bold mb-3">We Champion Local Growth</h2>
                    <p class="text-gray-600 text-lg leading-relaxed">
                        We proudly host youth tournaments, partner with schools, and open doors for aspiring athletes. Every booking helps us
                        reinvest into the community — improving facilities, funding grassroots events, and supporting local talent.
                    </p>
                </div>

                <div>
                    <h2 class="text-2xl font-bold mb-3">Beyond the Field</h2>
                    <p class="text-gray-600 text-lg leading-relaxed">
                        Yapping isn’t just where you play — it’s where you belong. From weekend players to serious teams, our spaces welcome 
                        everyone who values respect, fun, and community spirit.
                    </p>
                </div>
            </div>

            <div class="text-center mt-10">
                <a href="/rent" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-xl transition shadow">
                    Start Your Game With Us
                </a>
            </div>

        </div>
    </section>

    <x-footer />

</body>
</html>