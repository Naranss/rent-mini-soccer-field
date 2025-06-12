<!DOCTYPE html>
<html lang="en" class="scroll-smooth" x-data="rentPage()" x-init="init()">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Yapping Mini Soccer | Rent a Field</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-800">
    <!-- Navbar -->
    <x-navbar />

    <!-- Venue Info and Carousel -->
    <section class="bg-white shadow py-6 px-6 mb-6">
        <div class="max-w-6xl mx-auto flex flex-col md:flex-row gap-8">
            <div class="w-full md:w-2/3">
                <div class="relative overflow-hidden rounded-xl">
                    <div class="flex transition-transform duration-500" x-ref="carouselContainer" :style="{ transform: `translateX(-${activeIndex * 100}%)` }">
                        <template x-for="(img, index) in images" :key="index">
                            <img :src="img" class="w-full object-cover h-64 md:h-96" alt="Venue Image" />
                        </template>
                    </div>
                    <button @click="prevImage" class="absolute top-1/2 left-2 -translate-y-1/2 bg-black bg-opacity-50 text-white px-2 py-1 rounded">‹</button>
                    <button @click="nextImage" class="absolute top-1/2 right-2 -translate-y-1/2 bg-black bg-opacity-50 text-white px-2 py-1 rounded">›</button>
                </div>
            </div>
            <div class="w-full md:w-1/3 space-y-3">
                <h2 class="text-2xl font-bold">Grand Central Sport Center</h2>
                <p class="text-gray-600">Jl. Contoh No.123, Jakarta</p>
                <p class="text-gray-500">Fasilitas: Locker, Shower, LED, Parking</p>
                <div class="text-yellow-500">★★★★☆ (4.5)</div>
                <a href="#bookingSection" class="block bg-blue-600 text-white text-center py-2 rounded hover:bg-blue-700">Book Now</a>
            </div>
        </div>
    </section>

    <!-- Booking Section -->
    <section id="bookingSection" class="max-w-6xl mx-auto bg-white rounded-xl shadow p-6 mb-12" x-data="bookingSection()">
        <h3 class="text-xl font-bold mb-4">Check Availability</h3>
        <label class="block mb-2 font-medium text-gray-700">Select Date</label>
        <input type="date" x-model="selectedDate" @change="fetchSlots()" class="border px-4 py-2 rounded w-full mb-4" />
        <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-6 gap-4">
            <template x-for="slot in availableSlots" :key="slot.time">
                <button
                    :class="slot.available ? 'bg-green-100 hover:bg-green-200' : 'bg-gray-200 cursor-not-allowed'"
                    class="px-3 py-2 rounded text-sm text-center font-medium"
                    :disabled="!slot.available"
                    @click="selectSlot(slot)"
                    x-text="slot.time">
                </button>
            </template>
        </div>
        <div class="mt-6">
            <button
                :disabled="!selectedSlot"
                class="bg-blue-600 text-white px-6 py-2 rounded disabled:opacity-50"
                @click="submitBooking">
                Continue Booking
            </button>
        </div>
    </section>

    <!-- Footer -->
    <x-footer />

    <!-- Alpine.js logic -->
    <script>
        function rentPage() {
            return {
                images: [
                    '{{ asset("assets/images/minisoccer-indoor.jpg") }}',
                    '{{ asset("assets/images/minisoccer-outdoor.jpg") }}',
                    '{{ asset("assets/images/minisoccer-weekend.jpg") }}'
                ],
                activeIndex: 0,
                prevImage() {
                    this.activeIndex = (this.activeIndex === 0) ? this.images.length - 1 : this.activeIndex - 1;
                },
                nextImage() {
                    this.activeIndex = (this.activeIndex + 1) % this.images.length;
                }
            }
        }

        function bookingSection() {
            return {
                selectedDate: '',
                availableSlots: [],
                selectedSlot: null,
                fetchSlots() {
                    this.availableSlots = [
                        { time: '08:00', available: true },
                        { time: '09:00', available: false },
                        { time: '10:00', available: true },
                        { time: '11:00', available: true },
                        { time: '12:00', available: false },
                        { time: '13:00', available: true },
                    ];
                },
                selectSlot(slot) {
                    this.selectedSlot = slot;
                },
                submitBooking() {
                    if (this.selectedSlot) {
                        alert(`Booking confirmed at ${this.selectedSlot.time} on ${this.selectedDate}`);
                    }
                }
            }
        }
    </script>
</body>

</html>
