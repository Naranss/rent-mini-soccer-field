@extends('components.dashboard-layout')

@section('title', 'Edit Payment')

@section('content')
    <section class="p-6 font-[Poppins]">
        <!-- Header Section -->
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Edit Payment: #{{ $payment->id }}</h1>
            <a href="{{ route('payments.index') }}"
                class="inline-block bg-gray-300 hover:bg-gray-400 text-gray-800 text-sm font-medium px-4 py-2 rounded-md transition">
                ← Back to Payment List
            </a>
        </div>

        <!-- Success Message -->
        @if (session()->has('success'))
            <div class="mb-6 p-4 rounded-lg bg-green-100 text-green-800 text-sm">
                {{ session('success') }}
            </div>
        @endif

        <!-- Edit Payment Form -->
        <form action="{{ route('payments.update', $payment) }}" method="POST"
            class="bg-white rounded-lg shadow-md p-6 w-full max-w-4xl mx-auto">
            @csrf
            @method('PUT')

            <div class="grid md:grid-cols-2 gap-5">
                <!-- Amount -->
                <div>
                    <label for="amount" class="block text-sm font-medium text-gray-700 mb-1">Amount</label>
                    <input type="number" id="amount" name="amount" required value="{{ $payment->amount }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                    <select name="status" id="status" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="paid" {{ $payment->status == 'paid' ? 'selected' : '' }}>Paid</option>
                        <option value="unpaid" {{ $payment->status == 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                        <option value="canceled" {{ $payment->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
                    </select>
                </div>

                <!-- Payment Method -->
                <div class="md:col-span-2">
                    <label for="payment_method" class="block text-sm font-medium text-gray-700 mb-1">Payment Method
                    </label>
                    <input type="text" id="payment_method" name="payment_method" required
                        value="{{ $payment->payment_method }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>

                <!-- Hidden Fields -->
                <input type="hidden" name="booking_id" value="{{ $payment->booking_id }}">
                <input type="hidden" name="customer_id" value="{{ $payment->customer_id }}">
                <input type="hidden" name="rentee_id" value="{{ $payment->rentee_id }}">
                <input type="hidden" name="payment_date" value="{{ $payment->payment_date }}">
            </div>

            <!-- Submit Button -->
            <div class="text-right mt-6">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition font-medium">
                    Update Payment
                </button>
            </div>
        </form>
    </section>
@endsection
