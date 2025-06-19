@extends('components.dashboard-layout')

@section('title', 'Dashboard')

@section('content')
    <div class="max-w-6xl mx-auto bg-white p-6 md:p-8 rounded-lg shadow-md font-[Poppins]">
        <!-- Header -->
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">View Booking: {{ $booking->user->name }}</h1>
            <a href="{{ route('bookings.index') }}"
                class="px-4 py-2 text-sm font-medium bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-md transition">
                Back
            </a>
        </div>

        <!-- Info Grid -->
        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <p class="text-sm text-gray-500">Customer Name</p>
                <p class="text-lg font-medium text-gray-900">{{ $booking->user->name }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Field Name</p>
                <p class="text-lg font-medium text-gray-900">{{ $booking->field->name }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Date</p>
                <p class="text-lg text-gray-900">{{ \Carbon\Carbon::parse($booking->date)->format('d M Y') }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Booking Time</p>
                @foreach ($bookedHours as $hour)
                    <span class="inline-block bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded mb-1">
                        {{ $hour->schedule->start_time }} - {{ $hour->schedule->end_time }}
                    </span>
                @endforeach
            </div>
            <div>
                <p class="text-sm text-gray-500">Status</p>
                <p class="text-lg text-gray-900">
                    <span
                        class="inline-block px-3 py-1 rounded-full text-sm font-semibold
                        {{ $booking->status === 'confirmed' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                        {{ ucfirst($booking->status) }}
                    </span>
                </p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Booked At</p>
                <p class="text-lg text-gray-900">{{ $booking->created_at->format('d M Y, H:i') }}</p>
            </div>
        </div>
    </div>
@endsection