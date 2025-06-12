<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Yapping Mini Soccer | Location</title>
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

    <!-- Heading Section -->
    <section class="bg-white py-16">
        <div class="container mx-auto max-w-3xl px-6 text-center">
            <h1 class="text-4xl font-bold mb-4 text-gray-900">Our Location</h1>
            <p class="text-lg text-gray-700 mb-6">
                Welcome to <strong>Yapping Sport Center</strong>, your go-to destination for mini soccer in Yogyakarta! Strategically located in a bustling area, we offer top-tier accessibility, excellent facilities, and a vibrant atmosphere for athletes and sports lovers alike.
            </p>
            <p class="text-md text-gray-600">
                Find us easily from major landmarks and transport hubs across Sleman, Yogyakarta.
            </p>
        </div>
    </section>

    <!-- Detailed Location & Access Info -->
    <section class="bg-white py-12">
        <div class="container mx-auto max-w-5xl px-6 text-gray-900">
            <h2 class="text-3xl font-semibold text-center mb-6">Where to Find Us</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Address & Contact -->
                <div>
                    <h3 class="text-xl font-semibold mb-2 text-indigo-600">📍 Address</h3>
                    <p class="mb-1">Jl. Kepuhsari No. 10, Maguwoharjo, Sleman, Yogyakarta</p>
                    <p class="mb-1">📞 Phone: (0274) 456-7890</p>
                    <p class="mb-1">✉️ Email: yappingcenter@gmail.com</p>
                    
                    <h3 class="text-xl font-semibold mt-6 mb-2 text-indigo-600">⏰ Opening Hours</h3>
                    <ul class="text-gray-700 space-y-1">
                        <li>Monday - Friday: 08:00 AM – 09:00 PM</li>
                        <li>Saturday - Sunday: 08:00 AM – 12:00 PM</li>
                    </ul>
                </div>

                <!-- Access Info -->
                <div>
                    <h3 class="text-xl font-semibold mb-2 text-indigo-600">🚗 Access & Nearby Landmarks</h3>
                    <ul class="space-y-2 text-gray-700">
                        <li><strong>10 minutes</strong> from Adisutjipto International Airport (JOG)</li>
                        <li><strong>5 minutes</strong> from Stadion Maguwoharjo</li>
                        <li><strong>15 minutes</strong> from Universitas Gadjah Mada (UGM)</li>
                        <li><strong>Close to:</strong> Cafés, mini markets, parking areas, and public transport stops</li>
                        <li><strong>Parking:</strong> Spacious lot available for cars & motorcycles</li>
                    </ul>

                    <a href="https://www.google.com/maps/dir//Jl.+Kepuhsari+No.+10,+Maguwoharjo,+Sleman,+Yogyakarta"
                       target="_blank"
                       class="inline-block mt-6 bg-indigo-600 text-white px-6 py-2 rounded-full shadow hover:bg-indigo-700 transition">
                        📍 View on Google Maps
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Google Maps Embed -->
    <section class="py-12">
        <div class="container mx-auto max-w-6xl px-6 flex justify-center items-center">
            <div class="w-full max-w-4xl rounded-xl shadow-lg overflow-hidden">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.8902788805727!2d110.35362771478126!3d-7.767231594351394!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5caeb99d46b3%3A0x8d6c9367ec9f7d9a!2sJl.%20Sportiva%20No.%2010%2C%20Maguwoharjo%2C%20Sleman%2C%20Yogyakarta!5e0!3m2!1sen!2sid!4v1694231838567!5m2!1sen!2sid"
                    width="100%"
                    height="450"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                ></iframe>
            </div>
        </div>
    </section>

    <x-footer />
</body>
</html>