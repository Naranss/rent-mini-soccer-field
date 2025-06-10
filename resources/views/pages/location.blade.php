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
                Discover the home of your favorite sport at <strong>Yapping Sport Center</strong> — the ultimate destination for mini soccer enthusiasts.
                With top-class facilities, easy access, and a vibrant atmosphere, it’s the perfect place to play, practice, and connect.
            </p>
            <p class="text-md text-gray-600">
                Strategically located in Sleman, Yogyakarta, we provide convenient access and an exciting space for athletes from all around the city.
            </p>
        </div>
    </section>

    <!-- Contact Info & Opening Hours -->
    <section class="bg-white py-12">
        <div class="container mx-auto max-w-4xl px-6 text-center text-gray-900">
            <h2 class="text-3xl font-semibold mb-3">Yapping Sport Center</h2>
            <p class="mb-1">Jl. Kepuhsari No. 10, Maguwoharjo, Sleman, Yogyakarta</p>
            <p class="mb-1">Phone: (0274) 456-7890 | Email: yappingcenter@gmail.com</p>

            <div class="mt-6 text-left bg-gray-100 p-6 rounded-lg shadow-md inline-block">
                <h3 class="text-lg font-semibold mb-2 text-indigo-600">Opening Hours</h3>
                <ul class="text-gray-700 space-y-1">
                    <li>Monday - Friday: 08:00 AM – 10:00 PM</li>
                    <li>Saturday - Sunday: 07:00 AM – 11:00 PM</li>
                    <li>Public Holidays: Open as usual</li>
                </ul>
            </div>

            <a href="https://www.google.com/maps/dir//Jl.+Kepuhsari+No.+10,+Maguwoharjo,+Sleman,+Yogyakarta"
               target="_blank"
               class="inline-block mt-6 bg-indigo-600 text-white px-6 py-2 rounded-full shadow hover:bg-indigo-700 transition">
                📍 Get Directions
            </a>
        </div>
    </section>

    <!-- Google Maps Embed -->
    <section class="py-12">
        <div class="container mx-auto max-w-6xl px-6 flex flex-wrap gap-10 justify-center items-center">
            <div class="flex-1 min-w-[300px] max-w-2xl rounded-xl shadow-lg overflow-hidden">
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