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

    {{-- Content --}}
    <div class="max-w-4xl mx-auto py-8 px-4">
        <h1 class="text-3xl font-bold mb-8">Transaction Details</h1>

        <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <h2 class="text-2xl font-semibold mb-4">Field Information</h2>
                    <div class="mb-4">
                        <img src="{{ asset('storage/' . $field->fieldImages[0]->path) }}" 
                             alt="{{ $field->fieldImages[0]->img_alt }}"
                             class="w-full h-48 object-cover rounded-lg">
                    </div>
                    <h3 class="text-xl font-medium">{{ $field->name }}</h3>
                    <p class="text-gray-600">{{ $field->location }}</p>
                </div>

                <div>
                    <h2 class="text-2xl font-semibold mb-4">Booking Details</h2>
                    <div class="space-y-3">
                        <div>
                            <span class="font-medium">Order ID:</span>
                            <span class="text-gray-700">{{ $payment->order_id }}</span>
                        </div>
                        <div>
                            <span class="font-medium">Date:</span>
                            <span class="text-gray-700">{{ \Carbon\Carbon::parse($booking->date)->format('l, F j, Y') }}</span>
                        </div>
                        <div>
                            <span class="font-medium">Booked Hours:</span>
                            <ul class="mt-2 space-y-1">
                                @foreach($bookedHours as $hour)
                                    <li class="text-gray-700">{{ \Carbon\Carbon::parse($hour->schedule->start_time)->format('H:i') }} - 
                                        {{ \Carbon\Carbon::parse($hour->schedule->end_time)->format('H:i') }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div>
                            <span class="font-medium">Total Amount:</span>
                            <span class="text-gray-700">Rp {{ number_format($payment->amount, 0, ',', '.') }}</span>
                        </div>
                        <div>
                            <span class="font-medium">Status:</span>
                            <span class="px-3 py-1 rounded-full text-sm 
                                {{ $payment->status === 'paid' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                {{ ucfirst($payment->status) }}
                            </span>
                        </div>
                    </div>

                    @if($payment->status === 'unpaid')
                        <div class="mt-6">
                            <button class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition">
                                Proceed to Payment
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <x-footer />

</body>

</html>
