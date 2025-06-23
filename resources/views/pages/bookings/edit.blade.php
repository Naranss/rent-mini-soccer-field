@extends('components.dashboard-layout')

@section('title', 'Edit Booking')

@section('content')
    <section class="p-6 font-[Poppins]">
        <!-- Header Section -->
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Edit Booking: #{{ $booking->id }}</h1>
            <a href="{{ route('bookings.index') }}"
                class="inline-block bg-gray-300 hover:bg-gray-400 text-gray-800 text-sm font-medium px-4 py-2 rounded-md transition">
                ← Back to Booking List
            </a>
        </div>

        <!-- Success Message -->
        @if (session()->has('success'))
            <div class="mb-6 p-4 rounded-lg bg-green-100 text-green-800 text-sm">
                {{ session('success') }}
            </div>
        @endif

        <!-- Edit Booking Form -->
        <form action="{{ route('bookings.update', $booking) }}" method="POST"
            class="bg-white rounded-lg shadow-md p-6 w-full max-w-4xl mx-auto">
            @csrf
            @method('PUT')

            <div class="grid md:grid-cols-2 gap-5">
                <!-- Customer -->
                <div>
                    <label for="user_id" class="block text-sm font-medium text-gray-700 mb-1">Customer</label>
                    <input type="text" id="user_id" name="user_id" required value="{{ $booking->user->name ?? '-' }}"
                        disabled class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100" />
                </div>
                <!-- Field -->
                <div>
                    <label for="field_id" class="block text-sm font-medium text-gray-700 mb-1">Field</label>
                    <input type="text" id="field_id" name="field_id" required value="{{ $booking->field->name ?? '-' }}"
                        disabled class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100" />
                </div>
                <!-- Date -->
                <div>
                    <label for="date" class="block text-sm font-medium text-gray-700 mb-1">Date</label>
                    <input type="text" id="date" name="date" required value="{{ old('date', \Carbon\Carbon::parse($booking->date)->format('d M Y')) }}"
                        disabled class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>
                <!-- Start Time -->
                <div>
                    <label for="start_time" class="block text-sm font-medium text-gray-700 mb-1">Start Time</label>
                    <input type="time" id="start_time" name="start_time" required
                        value="{{ $booking->start_time ? date('H:i', strtotime($booking->start_time)) : '' }}"
                        disabled class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>
                <!-- Status -->
                <div class="md:col-span-2">
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                    <select name="status" id="status" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>Confirmed
                        </option>
                        <option value="canceled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>Canceled
                        </option>
                    </select>
                </div>
                <!-- Hidden Fields -->
                <input type="hidden" name="field_id" value="{{ $booking->field_id }}">
                <input type="hidden" name="user_id" value="{{ $booking->user_id }}">
            </div>
            <!-- Submit Button -->
            <div class="text-right mt-6">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition font-medium">
                    Update Booking
                </button>
            </div>
        </form>
    </section>
@endsection
