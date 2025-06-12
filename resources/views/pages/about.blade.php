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
        <div class="container mx-auto max-w-4xl px-6 space-y-20">
            <div class="text-center">
                <h1 class="text-4xl font-extrabold mb-4">About Yapping</h1>
                <p class="text-lg text-gray-600">
                    More than just a sports center — Yapping was founded on the values of community, wellness, and unity.
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-12 items-start">
                <div>
                    <h2 class="text-2xl font-bold mb-3">Our Origins</h2>
                    <p class="text-gray-600 text-lg leading-relaxed">
                        Established in Sleman in 2015, Yapping started with a single mini soccer field and a vision: to make sports accessible to all.
                        Today, we operate a multi-purpose facility that continues to grow with the support of the local community.
                    </p>
                </div>
                <div>
                    <h2 class="text-2xl font-bold mb-3">Built for the People</h2>
                    <p class="text-gray-600 text-lg leading-relaxed">
                        Our facilities are created by the community, for the community — and we grow together. Every improvement comes from listening to our users and adapting to their evolving needs.
                    </p>
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-12 items-start">
                <div>
                    <h2 class="text-2xl font-bold mb-3">Creating Opportunities</h2>
                    <p class="text-gray-600 text-lg leading-relaxed">
                        We believe that sports break down barriers. At Yapping, every game is a chance to grow and connect. Through programs, leagues, and events, we give players of all levels a place to shine.
                    </p>
                </div>
                <div>
                    <h2 class="text-2xl font-bold mb-3">What Drives Us</h2>
                    <p class="text-gray-600 text-lg leading-relaxed">
                        We aim to do more than provide space — we strive to create meaningful impact. Through sports, we build character, connection, and community spirit, empowering individuals both on and off the field.
                    </p>
                </div>
            </div>

            <div class="text-center mt-10">
                <a href="/rent" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-xl transition shadow">
                    Book Your Field Today
                </a>
            </div>
        </div>
    </section>

    <!-- Reviews Section -->
    <section class="py-20 bg-gray-50 border-t border-gray-200">
        <div class="container mx-auto max-w-5xl px-6">
            <h2 class="text-3xl font-bold mb-10 text-center">What Our Guests Say</h2>

            <div id="review-list" class="grid md:grid-cols-3 gap-8">
                <!-- Review 1 -->
                <div class="bg-white p-6 rounded-xl shadow review-item">
                    <p class="text-gray-600 italic mb-4">"Clean and well-maintained facilities. The best place to play with friends!"</p>
                    <div class="text-blue-600 font-semibold">— Reza K.</div>
                </div>
                <!-- Review 2 -->
                <div class="bg-white p-6 rounded-xl shadow review-item">
                    <p class="text-gray-600 italic mb-4">"Easy booking process and very helpful staff. Highly recommended!"</p>
                    <div class="text-blue-600 font-semibold">— Mira S.</div>
                </div>
                <!-- Review 3 -->
                <div class="bg-white p-6 rounded-xl shadow review-item">
                    <p class="text-gray-600 italic mb-4">"Tournaments are always well-organized and the atmosphere is amazing!"</p>
                    <div class="text-blue-600 font-semibold">— Danu P.</div>
                </div>
                <!-- Hidden reviews -->
                <div class="bg-white p-6 rounded-xl shadow review-item hidden">
                    <p class="text-gray-600 italic mb-4">"Spacious and well-kept fields. Always our team’s top choice."</p>
                    <div class="text-blue-600 font-semibold">— Lestari A.</div>
                </div>
                <div class="bg-white p-6 rounded-xl shadow review-item hidden">
                    <p class="text-gray-600 italic mb-4">"Friendly, professional staff. Great prices too!"</p>
                    <div class="text-blue-600 font-semibold">— Bambang T.</div>
                </div>
                <div class="bg-white p-6 rounded-xl shadow review-item hidden">
                    <p class="text-gray-600 italic mb-4">"We play here every weekend. Excellent service and smooth experience."</p>
                    <div class="text-blue-600 font-semibold">— Siti N.</div>
                </div>
            </div>

            <!-- See More Button -->
            <div class="text-center mt-10">
                <button onclick="toggleReviews()" id="see-more-btn" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-xl transition shadow">
                    See More Reviews
                </button>
            </div>
        </div>
    </section>

    <x-footer />

    <!-- JavaScript for Toggle -->
    <script>
        function toggleReviews() {
            const hiddenItems = document.querySelectorAll('.review-item.hidden');
            const button = document.getElementById('see-more-btn');
            hiddenItems.forEach(item => item.classList.remove('hidden'));
            button.style.display = 'none';
        }
    </script>
</body>

</html>