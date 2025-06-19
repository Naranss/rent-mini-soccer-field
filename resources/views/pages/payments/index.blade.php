@extends('components.dashboard-layout')

@section('title', 'Payment Table')

@section('content')
<section class="p-6">
    <!-- Heading -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Payment Table</h1>
    </div>

    <!-- Success Message -->
    @if (session()->has('success'))
    <div class="mb-6 p-4 rounded-lg bg-green-100 text-green-800 text-sm">
        {{ session('success') }}
    </div>
    @endif

    <!-- Search Bar -->
    <form action="{{ route('payments.index') }}" method="GET" class="mb-6">
        <div class="flex items-center space-x-2">
            <input type="text" name="search" placeholder="Search by customer or method"
                value="{{ old('search', request('search')) }}"
                class="w-full md:w-80 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">
                Search
            </button>
        </div>
    </form>

    <!-- Table -->
    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="min-w-full text-sm text-left">
            <thead class="bg-gray-100 text-gray-700 uppercase">
                <tr>
                    <th class="px-6 py-3">Customer</th>
                    <th class="px-6 py-3">Booking</th>
                    <th class="px-6 py-3">Amount</th>
                    <th class="px-6 py-3">Method</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3">Paid At</th>
                    <th class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($payments as $payment)
                <tr>
                    <td class="px-6 py-4">{{ $payment->customer?->name ?? '-' }}</td>
                    <td class="px-6 py-4">{{ $payment->booking?->field?->name ?? '-' }} ({{ $payment->booking?->date ?? '-' }})</td>
                    <td class="px-6 py-4">Rp{{ number_format($payment->amount, 0, ',', '.') }}</td>
                    <td class="px-6 py-4">{{ ucfirst($payment->payment_method ?? '-') }}</td>
                    <td class="px-6 py-4">
                        <span
                            class="px-2 py-1 text-xs font-semibold rounded-full
                                {{ $payment->status === 'paid' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                            {{ ucfirst($payment->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4">{{ $payment->payment_date ? \Carbon\Carbon::parse($payment->payment_date)->format('d M Y, H:i') : '-' }}</td>
                    <td class="px-6 py-4">
                        <!-- Dropdown -->
                        <div x-data="{ open: false }" class="relative">
                            <button @click="open = !open"
                                class="bg-gray-200 px-3 py-1 rounded hover:bg-gray-300 transition">
                                ⋮
                            </button>
                            <div x-show="open" @click.outside="open = false" x-cloak
                                class="absolute right-0 mt-2 w-44 bg-white rounded shadow z-10 divide-y">

                                <!-- Edit -->
                                <a href="{{ route('payments.edit', $payment) }}"
                                    class="flex items-center gap-2 px-4 py-2 hover:bg-blue-100 text-sm text-blue-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M16.862 3.487a2.25 2.25 0 113.182 3.182L7.5 19.5H3v-4.5L16.862 3.487z" />
                                    </svg> Edit
                                </a>
                                <!-- Show -->
                                <a href="{{ route('payments.show', $payment) }}"
                                    class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100 text-sm text-gray-700">
                                    <i class="fas fa-eye text-indigo-500 w-4"></i> Show
                                </a>
                                @can('payment_booking')
                                <!-- Delete -->
                                <form action="{{ route('payments.destroy', $payment) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this payment?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="w-full flex items-center gap-2 px-4 py-2 hover:bg-red-100 text-sm text-red-600">
                                        <i class="fas fa-trash-alt text-red-600 w-4"></i> Delete
                                    </button>
                                </form>
                                @endcan

                            </div>
                        </div>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection