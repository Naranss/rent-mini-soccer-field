<!DOCTYPE html>
<html lang="en" class="scroll-smooth" x-data="rentPage()" x-init="init()" xmlns:x="http://www.w3.org/1999/xhtml">

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

    <x-navbar />

    <!-- Search Section -->
    <section class="bg-white py-12 shadow-md">
        <div class="container mx-auto px-6 max-w-4xl">
            <input
                type="text"
                placeholder="Search fields by name or feature..."
                x-model="searchTerm"
                @input="filterFields()"
                class="w-full rounded-lg border border-gray-300 px-4 py-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>
    </section>

    <!-- Fields Grid with Pagination -->
    <section class="py-12">
        <div class="container mx-auto px-6 max-w-6xl">

            <h2 class="text-3xl font-bold mb-6">Our Mini Soccer Fields</h2>

            <!-- Cards grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mb-6">
                <template x-for="field in pagedFields" :key="field.id">
                    <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition duration-300">
                        <img :src="field.image" :alt="field.name" class="rounded-t-2xl w-full h-48 object-cover" />
                        <div class="p-6 space-y-3">
                            <h3 class="text-xl font-semibold text-gray-800" x-text="field.name"></h3>
                            <p class="text-blue-600 font-semibold" x-text="field.price"></p>
                            <a :href="field.bookingLink"
                                class="inline-block bg-blue-600 text-white font-medium py-2 px-4 rounded-lg hover:bg-blue-700 transition">Book Now</a>
                        </div>
                    </div>
                </template>

                <template x-if="pagedFields.length === 0">
                    <p class="text-gray-500 col-span-full text-center">No fields found matching your search.</p>
                </template>
            </div>

            <!-- Pagination Buttons -->
            <div class="flex justify-center space-x-2">
                <template x-for="page in totalPages" :key="page">
                    <button 
                        @click="currentPage = page" 
                        x-text="page" 
                        :class="currentPage === page ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-blue-500 hover:text-white'" 
                        class="px-4 py-2 rounded-lg font-semibold transition"
                    ></button>
                </template>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="bg-white py-12 border-t border-gray-200">
        <div class="container mx-auto px-6 max-w-4xl">
            <h2 class="text-3xl font-bold mb-8 text-center">FAQ</h2>

            <div class="space-y-6" x-data="faqAccordion()">

                <template x-for="(item, index) in faqs" :key="index">
                    <div class="border rounded-lg shadow-sm">
                        <button
                            @click="toggle(index)"
                            class="w-full text-left px-6 py-4 font-semibold text-gray-800 focus:outline-none flex justify-between items-center">
                            <span x-text="item.question"></span>
                            <svg :class="{'rotate-180': openIndex === index}" class="w-5 h-5 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="openIndex === index" x-transition class="px-6 pb-4 text-gray-600">
                            <p x-text="item.answer"></p>
                        </div>
                    </div>
                </template>

            </div>
        </div>
    </section>

    <x-footer />

    <script>
        function rentPage() {
            return {
                searchTerm: '',
                fields: [
                    {
                        id: 1,
                        name: 'Indoor Mini Soccer',
                        price: 'Rp 250.000 / hour',
                        image: '{{ asset("assets/images/minisoccer-indoor.jpg") }}',
                        bookingLink: '/booking/minisoccer/indoor',
                        features: ['roofed', 'air circulation', 'locker', 'shower']
                    },
                    {
                        id: 2,
                        name: 'Outdoor Mini Soccer',
                        price: 'Rp 200.000 / hour',
                        image: '{{ asset("assets/images/minisoccer-outdoor.jpg") }}',
                        bookingLink: '/booking/minisoccer/outdoor',
                        features: ['natural breeze', 'LED lamps', 'parking', 'benches']
                    },
                    {
                        id: 3,
                        name: 'Weekend Package',
                        price: 'Rp 600.000 / 3 hours',
                        image: '{{ asset("assets/images/minisoccer-weekend.jpg") }}',
                        bookingLink: '/booking/minisoccer/weekend',
                        features: ['weekend only', 'free drinks', 'referee']
                    },
                    {
                        id: 4,
                        name: 'Rooftop Mini Soccer',
                        price: 'Rp 300.000 / hour',
                        image: '{{ asset("assets/images/minisoccer-rooftop.jpg") }}',
                        bookingLink: '/booking/minisoccer/rooftop',
                        features: ['open air', 'city view', 'night lighting']
                    },
                    {
                        id: 5,
                        name: 'Beachside Mini Soccer',
                        price: 'Rp 280.000 / hour',
                        image: '{{ asset("assets/images/minisoccer-beachside.jpg") }}',
                        bookingLink: '/booking/minisoccer/beachside',
                        features: ['sea breeze', 'sand surface', 'sunset view']
                    },
                    {
                        id: 6,
                        name: 'School Mini Soccer',
                        price: 'Rp 150.000 / hour',
                        image: '{{ asset("assets/images/minisoccer-school.jpg") }}',
                        bookingLink: '/booking/minisoccer/school',
                        features: ['outdoor', 'youth friendly', 'lighting']
                    },
                    {
                        id: 7,
                        name: 'Community Mini Soccer',
                        price: 'Rp 180.000 / hour',
                        image: '{{ asset("assets/images/minisoccer-community.jpg") }}',
                        bookingLink: '/booking/minisoccer/community',
                        features: ['local', 'parking', 'locker']
                    },
                    {
                        id: 8,
                        name: 'City Center Mini Soccer',
                        price: 'Rp 350.000 / hour',
                        image: '{{ asset("assets/images/minisoccer-citycenter.jpg") }}',
                        bookingLink: '/booking/minisoccer/citycenter',
                        features: ['central location', 'lighting', 'locker']
                    },
                    {
                        id: 9,
                        name: 'Suburban Mini Soccer',
                        price: 'Rp 220.000 / hour',
                        image: '{{ asset("assets/images/minisoccer-suburban.jpg") }}',
                        bookingLink: '/booking/minisoccer/suburban',
                        features: ['quiet area', 'parking', 'lighting']
                    }
                ],
                currentPage: 1,
                itemsPerPage: 3,
                get totalPages() {
                    return Math.ceil(this.filteredFields.length / this.itemsPerPage);
                },
                get pagedFields() {
                    const start = (this.currentPage - 1) * this.itemsPerPage;
                    return this.filteredFields.slice(start, start + this.itemsPerPage);
                },
                filteredFields: [],
                init() {
                    this.filteredFields = this.fields;
                },
                filterFields() {
                    const term = this.searchTerm.toLowerCase();
                    this.filteredFields = this.fields.filter(f =>
                        f.name.toLowerCase().includes(term) ||
                        f.features.some(feat => feat.toLowerCase().includes(term))
                    );
                    this.currentPage = 1; // reset ke halaman 1 kalau search berubah
                }
            }
        }

        function faqAccordion() {
            return {
                openIndex: null,
                faqs: [
                    {
                        question: 'How to book a field?',
                        answer: 'Click on the "Book Now" button on your preferred field, then choose your date and time slot to confirm the booking.'
                    },
                    {
                        question: 'What is the cancellation policy?',
                        answer: 'You can cancel your booking up to 24 hours before your scheduled time for a full refund.'
                    },
                    {
                        question: 'Are there any additional fees?',
                        answer: 'No hidden fees. The price displayed is the total cost for renting the field.'
                    }
                ],
                toggle(index) {
                    this.openIndex = this.openIndex === index ? null : index;
                }
            }
        }
    </script>
</body>

</html>
