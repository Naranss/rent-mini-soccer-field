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

    <section class="bg-white py-16">
        <div class="container mx-auto max-w-3xl px-6 text-center">
            <h1 class="text-4xl font-bold mb-4 text-gray-900">Our Location</h1>
            <p class="text-lg text-gray-700 mb-6">
                Temukan pusat olahraga favorit Anda di Yapping Sport Center, 
                tempat sempurna untuk menikmati aktivitas mini soccer dengan fasilitas lengkap dan lingkungan yang mendukung.
            </p>
            <p class="text-md text-gray-600">
                Berlokasi strategis di Sleman, kami menyediakan akses mudah serta kenyamanan bagi para pengunjung dari berbagai penjuru kota.
            </p>
        </div>
    </section>

    <section class="bg-white py-12">
        <div class="container mx-auto max-w-4xl px-6 text-center text-gray-900">
            <h2 class="text-3xl font-semibold mb-3">Yapping Sport Center</h2>
            <p class="mb-1">Jl. Kepuhsari No. 10, Maguwoharjo, Sleman, Yogyakarta</p>
            <p class="mb-1">Phone: (0274) 456-7890 | Email: yappingcenter@gmail.com</p>
        </div>
    </section>

    <section class="py-12">
        <div class="container mx-auto max-w-6xl px-6 flex flex-wrap gap-10 justify-center items-center">

            <!-- Embed Google Maps -->
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