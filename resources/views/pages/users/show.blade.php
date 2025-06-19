@extends('components.dashboard-layout')

@section('title', 'Dashboard')

@section('content')
    <div class="max-w-6xl mx-auto bg-white p-6 md:p-8 rounded-lg shadow-md font-[Poppins]">
        <!-- Header -->
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">View Payment: {{ $payment->customer_id}}</h1>
            <a href="{{ route('payments.index') }}"
                class="px-4 py-2 text-sm font-medium bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-md transition">
                Back
            </a>
        </div>

        <!-- Info Grid -->
        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <p class="text-sm text-gray-500">Customer Name</p>
                <p class="text-lg font-medium text-gray-900">{{ $payment->customer_id }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Field Name</p>
                <p class="text-lg font-medium text-gray-900">{{ $payment->booking_id }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Booking Date</p>
                <p class="text-lg text-gray-900">{{ \Carbon\Carbon::parse($booking->date)->format('d M Y') }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Booking Time</p>
                <p class="text-lg text-gray-900">{{ $booking->time }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Amount Paid</p>
                <p class="text-lg text-gray-900">Rp{{ number_format($payment->amount, 0, ',', '.') }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Payment Method</p>
                <p class="text-lg text-gray-900">{{ ucfirst($payment->method) }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Payment Status</p>
                <p class="text-lg text-gray-900">
                    <span class="inline-block px-3 py-1 rounded-full text-sm font-semibold
                        {{ $payment->status === 'paid' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                        {{ ucfirst($payment->status) }}
                    </span>
                </p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Paid At</p>
                <p class="text-lg text-gray-900">{{ $payment->created_at->format('d M Y, H:i') }}</p>
            </div>
        </div>
    </div>
@endsection