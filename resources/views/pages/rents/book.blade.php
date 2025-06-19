<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Yapping Mini Soccer | Rent a Field</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
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
                <div class="relative overflow-hidden rounded-xl" x-data="carousel()">
                    <div class="flex transition-transform duration-500" x-ref="carouselContainer"
                        :style="{ transform: `translateX(-${activeIndex * 100}%)` }">
                        @foreach ($field->fieldImages as $image)
                            <img src="{{ asset('storage/' . $image->path) }}" class="w-full object-cover h-64 md:h-96"
                                alt="{{ $image->img_alt }}" />
                        @endforeach
                    </div>
                    <button @click="prevImage"
                        class="absolute top-1/2 left-2 -translate-y-1/2 bg-black bg-opacity-50 text-white px-2 py-1 rounded">‹</button>
                    <button @click="nextImage"
                        class="absolute top-1/2 right-2 -translate-y-1/2 bg-black bg-opacity-50 text-white px-2 py-1 rounded">›</button>
                </div>
            </div>
            <div class="w-full md:w-1/3 space-y-3">
                <h2 class="text-2xl font-bold">{{ $field->name }}</h2>
                <p class="text-gray-600">{{ $field->location }}</p>
                <p class="text-gray-500">{{ $field->description }}</p>
                <div class="text-yellow-500">★★★★☆ (4.5)</div>
                <a href="#bookingSection"
                    class="block bg-blue-600 text-white text-center py-2 rounded hover:bg-blue-700">Book Now</a>
            </div>
        </div>
    </section>

    <!-- Booking Section -->
    @if ($errors->any())
        <div class="max-w-6xl mx-auto mb-6">
            <div class="p-4 rounded-lg bg-red-100 text-red-800 text-sm">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    @if (session()->has('error'))
        <div class="max-w-6xl mx-auto mb-6">
            <div class="p-4 rounded-lg bg-red-100 text-red-800 text-sm">
                {{ session('error') }}
            </div>
        </div>
    @endif
    @if (session()->has('success'))
        <div class="max-w-6xl mx-auto mb-6">
            <div class="p-4 rounded-lg bg-green-100 text-green-800 text-sm">
                {{ session('success') }}
            </div>
        </div>
    @endif
    <section id="bookingSection" class="max-w-6xl mx-auto bg-white rounded-xl shadow p-6 mb-12" x-data="booking()">
        <h3 class="text-xl font-bold mb-4">Select Date</h3>
        <div class="mb-6">
            <input type="date" x-model="selectedDate" @change="selectedDay = getDayName($event.target.value)"
                class="w-full md:w-64 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                :min="new Date().toISOString().split('T')[0]" :max="maxDate">
        </div>

        <template x-if="selectedDate">
            <div>
                <h4 class="text-lg font-semibold mb-3" x-text="'Available Times for ' + selectedDay"></h4>
                <form action="{{ route('rent.book', $field) }}" method="POST">
                    @csrf
                    <input type="hidden" name="selected_date" x-model="selectedDate">
                    
                    <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-6 gap-4 mb-6">
                        @foreach ($field->schedules as $schedule)
                            <template x-if="'{{ $schedule->hari }}' === selectedDay">
                                <div class="flex items-center space-x-2 p-2 border rounded hover:bg-gray-50">
                                    <input type="checkbox" 
                                        name="schedules[]" 
                                        id="schedule_{{ $schedule->id }}"
                                        value="{{ $schedule->id }}"
                                        class="rounded border-gray-300 text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:cursor-not-allowed"
                                        :checked="isScheduleSelected({{ $schedule->id }})"
                                        @change="toggleSchedule({{ $schedule->id }})"
                                        :disabled="isTimeSlotDisabled({{ $schedule->id }}, '{{ $schedule->start_time }}')"
                                    >
                                    <label for="schedule_{{ $schedule->id }}" 
                                        class="text-sm cursor-pointer"
                                        :class="{
                                            'text-gray-400': isTimeSlotDisabled({{ $schedule->id }}, '{{ $schedule->start_time }}')
                                        }"
                                    >
                                        {{ $schedule->start_time }} - {{ $schedule->end_time }}
                                    </label>
                                </div>
                            </template>
                        @endforeach
                    </div>

                    <div class="mt-6">
                        <button type="submit"
                            class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 disabled:opacity-50 transition-colors"
                            :disabled="!selectedDate || selectedSchedules.length === 0"
                            @click="if (selectedSchedules.length === 0) { 
                                alert('Please select at least one time slot');
                                $event.preventDefault();
                             }"
                        >
                            Continue Booking
                        </button>
                    </div>
                </form>
            </div>
        </template>

        <template x-if="!selectedDate">
            <div class="text-center text-gray-500 py-8">
                Please select a date to view available time slots
            </div>
        </template>
    </section>

    <!-- Footer -->
    <x-footer />

    <script>
        function carousel() {
            return {
                activeIndex: 0,
                prevImage() {
                    // Add your carousel logic here
                },
                nextImage() {
                    // Add your carousel logic here
                }
            }
        }

        function booking() {
            return {
                selectedDate: '',
                selectedDay: '',
                selectedSchedules: [],
                bookedHours: @json($bookedHours),

                maxDate: (() => {
                    const maxDate = new Date();
                    maxDate.setMonth(maxDate.getMonth() + 1);
                    return maxDate.toISOString().split('T')[0];
                })(),

                getDayName(date) {
                    const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                    return days[new Date(date).getDay()];
                },

                toggleSchedule(scheduleId) {
                    const index = this.selectedSchedules.indexOf(scheduleId);
                    if (index === -1) {
                        this.selectedSchedules.push(scheduleId);
                    } else {
                        this.selectedSchedules.splice(index, 1);
                    }
                },

                isScheduleSelected(scheduleId) {
                    return this.selectedSchedules.includes(scheduleId);
                },

                isTimeSlotDisabled(scheduleId, startTime) {
                    if (!this.selectedDate) return true;

                    const today = new Date();
                    const selectedDate = new Date(this.selectedDate);

                    // Check if slot is booked for the selected date
                    const isBooked = this.bookedHours.some(booking =>
                        parseInt(booking.schedule_id) === parseInt(scheduleId) &&
                        booking.schedule_date === this.selectedDate
                    );

                    if (isBooked) return true;

                    // If selected date is today, check the time
                    if (selectedDate.toDateString() === today.toDateString()) {
                        const [hours, minutes] = startTime.split(':');
                        const slotTime = new Date(selectedDate);
                        slotTime.setHours(parseInt(hours), parseInt(minutes), 0);

                        return slotTime <= today;
                    }

                    return false;
                }
            }
        }
    </script>
</body>

</html>
