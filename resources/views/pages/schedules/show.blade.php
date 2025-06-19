@extends('components.dashboard-layout')

@section('title', 'Dashboard')

@section('content')
    <div class="max-w-6xl mx-auto bg-white p-6 md:p-8 rounded-lg shadow-md font-[Poppins]">
        <!-- Header -->
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">
                View Schedule for: {{ $schedule->field->name ?? 'Unknown Field' }}
            </h1>
            <div class="flex gap-2">
                <a href="{{ route('schedules.edit', $schedule) }}"
                    class="px-4 py-2 text-sm font-medium bg-blue-600 hover:bg-blue-700 text-white rounded-md transition">
                    Edit
                </a>
                <a href="{{ route('schedules.index') }}"
                    class="px-4 py-2 text-sm font-medium bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-md transition">
                    Back
                </a>
            </div>
        </div>

        <!-- Info Grid -->
        <div class="grid md:grid-cols-3 gap-4">
            <div>
                <p class="text-sm text-gray-500">Field</p>
                <p class="text-lg font-medium text-gray-900">{{ $schedule->field->name ?? '-' }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Weekday</p>
                <p class="text-lg font-medium text-gray-900">{{ $schedule->hari ?? '-' }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Created At</p>
                <p class="text-lg text-gray-900">{{ $schedule->created_at->format('d M Y, H:i') }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Start Time</p>
                <p class="text-lg text-gray-900">{{ $schedule->start_time }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">End Time</p>
                <p class="text-lg text-gray-900">{{ $schedule->end_time }}</p>
            </div>
        </div>

        <!-- Notes or Description (optional) -->
        @if (!empty($schedule->notes))
            <div class="mt-8">
                <h3 class="text-lg font-semibold text-gray-800 mb-1">Notes</h3>
                <p class="text-gray-700 leading-relaxed">{{ $schedule->notes }}</p>
            </div>
        @endif
    </div>
@endsection
