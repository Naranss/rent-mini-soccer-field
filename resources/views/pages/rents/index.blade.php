<!DOCTYPE html>
<html lang="en" class="scroll-smooth" x-data="rentPage()" x-init="init()"
    xmlns:x="http://www.w3.org/1999/xhtml">

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
            <form action="{{ route('rent.index') }}" method="GET">
                <input type="text" name="search" value="{{ old('search', request('search')) }}" placeholder="Search fields by name"
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </form>
        </div>
    </section>

    <!-- Fields Grid with Pagination -->
    <section class="py-12">
        <div class="container mx-auto px-6 max-w-6xl">

            <h2 class="text-3xl font-bold mb-6">Our Mini Soccer Fields</h2>

            <!-- Cards grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mb-6">
                @foreach ($fields as $field)
                    <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition duration-300">
                        <img src="{{ asset('storage/' . $field->fieldImages[0]->path) }}"
                            alt="{{ $field->fieldImages[0]->img_alt }}"
                            class="rounded-t-2xl w-full h-48 object-cover" />
                        <div class="p-6 space-y-3">
                            <h3 class="text-xl font-semibold text-gray-800">{{ $field->name }}</h3>
                            <p class="text-blue-600 font-semibold">Rp
                                {{ number_format($field->price, 0, ',', '.') }} / hour</p>
                            <a href="{{ route('rent.field', $field) }}"
                                class="inline-block bg-blue-600 text-white font-medium py-2 px-4 rounded-lg hover:bg-blue-700 transition">
                                Book Now
                            </a>
                        </div>
                    </div>
                @endforeach

                @if (count($fields) === 0)
                    <p class="text-gray-500 col-span-full text-center">No fields found.</p>
                @endif

            </div>
            {{ $fields->withQueryString()->links() }}
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="bg-white py-12 border-t border-gray-200">
        <div class="container mx-auto px-6 max-w-4xl">
            <h2 class="text-3xl font-bold mb-8 text-center">FAQ</h2>

            <div class="space-y-6" x-data="faqAccordion()">

                <template x-for="(item, index) in faqs" :key="index">
                    <div class="border rounded-lg shadow-sm">
                        <button @click="toggle(index)"
                            class="w-full text-left px-6 py-4 font-semibold text-gray-800 focus:outline-none flex justify-between items-center">
                            <span x-text="item.question"></span>
                            <svg :class="{ 'rotate-180': openIndex === index }" class="w-5 h-5 transition-transform"
                                fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
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
        function faqAccordion() {
            return {
                openIndex: null,
                faqs: [{
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
