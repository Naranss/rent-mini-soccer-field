@extends('components.dashboard-layout')

@section('title', 'Dashboard')

@section('content')
    <section class="p-6">
        <!-- Heading and Add Button -->
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Schedules</h1>
            <a href="{{ route('schedules.create') }}"
                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                + Add Schedule
            </a>
        </div>

        <!-- Success or Error Message -->
        @if (session()->has('success'))
            <div class="mb-6 p-4 rounded-lg bg-green-100 text-green-800 text-sm">
                {{ session('success') }}
            </div>
        @elseif (session()->has('error'))
            <div class="mb-6 p-4 rounded-lg bg-red-100 text-red-800 text-sm">
                {{ session('error') }}
            </div>
        @endif

        <!-- Search Bar -->
        <form action="{{ route('schedules.index') }}" method="GET" class="mb-6">
            <div class="flex items-center space-x-2">
                <input type="text" name="search" placeholder="Search by field name or day"
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
                        <th class="px-6 py-3">Field</th>
                        <th class="px-6 py-3">Weekday</th>
                        <th class="px-6 py-3">Start Time</th>
                        <th class="px-6 py-3">End Time</th>
                        <th class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($schedules as $schedule)
                        <tr>
                            <td class="px-6 py-4">{{ $schedule->field->name ?? 'Unknown Field' }}</td>
                            <td class="px-6 py-4">{{ $schedule->hari }}</td>
                            <td class="px-6 py-4">{{ $schedule->start_time }}</td>
                            <td class="px-6 py-4">{{ $schedule->end_time }}</td>
                            <td class="px-6 py-4">
                                <!-- Dropdown -->
                                <div x-data="{ open: false }" class="static">
                                    <button @click="open = !open"
                                        class="bg-gray-200 px-3 py-1 rounded hover:bg-gray-300 transition">
                                        ⋮
                                    </button>
                                    <div x-show="open" @click.outside="open = false" x-cloak
                                        class="absolute right-0 mt-2 w-44 bg-white rounded shadow z-10 divide-y">

                                        <!-- Edit -->
                                        <a href="{{ route('schedules.edit', $schedule) }}"
                                            class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100 text-sm text-gray-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                    d="M16.862 3.487a2.25 2.25 0 113.182 3.182L7.5 19.5H3v-4.5L16.862 3.487z" />
                                            </svg>
                                            Edit
                                        </a>

                                        <!-- Show -->
                                        <a href="{{ route('schedules.show', $schedule) }}"
                                            class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100 text-sm text-gray-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7s-8.268-2.943-9.542-7z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            Show
                                        </a>

                                        <!-- Delete -->
                                        <form action="{{ route('schedules.destroy', $schedule) }}" method="POST"
                                            onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="w-full flex items-center gap-2 px-4 py-2 hover:bg-red-100 text-sm text-red-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                        d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-gray-500">No schedules found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div style="margin-top: 15px">
            {{ $schedules->withQueryString()->links() }}
        </div>
    </section>
@endsection
