@extends('components.dashboard-layout')

@section('title', 'Dashboard')

@section('content')
    <section class="p-6 font-[Poppins]">
        <!-- Header Section -->
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Edit Schedule: {{ $schedule->field->name ?? 'Unknown Field' }}</h1>
            <a href="{{ route('schedules.index') }}"
                class="inline-block bg-gray-300 hover:bg-gray-400 text-gray-800 text-sm font-medium px-4 py-2 rounded-md transition">
                ← Back to Schedule List
            </a>
        </div>

        <!-- Success Message -->
        @if (session()->has('success'))
            <div class="mb-6 p-4 rounded-lg bg-green-100 text-green-800 text-sm">
                {{ session('success') }}
            </div>
        @endif
        <!-- Display all error messages -->
        @if ($errors->any())
            <div class="mb-6 p-4 rounded-lg bg-red-100 text-red-800 text-sm">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Edit Schedule Form -->
        <form action="{{ route('schedules.update', $schedule) }}" method="POST"
            class="bg-white rounded-lg shadow-md p-6 w-full max-w-4xl mx-auto">
            @csrf
            @method('PUT')

            <!-- Grid layout for form -->
            <div class="grid md:grid-cols-2 gap-5">
                <!-- Field -->
                <div>
                    <label for="field_id" class="block text-sm font-medium text-gray-700 mb-1">Field</label>
                    <select name="field_id" id="field_id" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="" disabled>Select Field</option>
                        @foreach ($fields as $field)
                            <option value="{{ $field->id }}" {{ $schedule->field_id == $field->id ? 'selected' : '' }}>
                                {{ $field->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Hari -->
                <div>
                    <label for="hari" class="block text-sm font-medium text-gray-700 mb-1">Hari</label>
                    <select name="hari" id="hari" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="" disabled {{ old('hari', $schedule->hari) ? '' : 'selected' }}>Pilih Hari</option>
                        <option value="Senin" {{ old('hari', $schedule->hari) == 'Senin' ? 'selected' : '' }}>Senin
                        </option>
                        <option value="Selasa" {{ old('hari', $schedule->hari) == 'Selasa' ? 'selected' : '' }}>Selasa
                        </option>
                        <option value="Rabu" {{ old('hari', $schedule->hari) == 'Rabu' ? 'selected' : '' }}>Rabu
                        </option>
                        <option value="Kamis" {{ old('hari', $schedule->hari) == 'Kamis' ? 'selected' : '' }}>Kamis
                        </option>
                        <option value="Jumat" {{ old('hari', $schedule->hari) == 'Jumat' ? 'selected' : '' }}>Jumat
                        </option>
                        <option value="Sabtu" {{ old('hari', $schedule->hari) == 'Sabtu' ? 'selected' : '' }}>Sabtu
                        </option>
                        <option value="Minggu" {{ old('hari', $schedule->hari) == 'Minggu' ? 'selected' : '' }}>Minggu
                        </option>
                    </select>
                    @error('hari')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Start Time -->
                <div>
                    <label for="start_time" class="block text-sm font-medium text-gray-700 mb-1">Start Time</label>
                    <input type="time" step="3600" name="start_time" id="start_time"
                        value="{{ old('start_time', $schedule->start_time) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        min="00:00" max="23:00" required oninput="this.value = this.value.split(':')[0] + ':00'">
                    @error('start_time')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- End Time -->
                <div>
                    <label for="end_time" class="block text-sm font-medium text-gray-700 mb-1">End Time</label>
                    <input type="time" step="3600" name="end_time" id="end_time"
                        value="{{ old('end_time', $schedule->end_time) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        min="00:00" max="23:00" required oninput="this.value = this.value.split(':')[0] + ':00'">
                    @error('end_time')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Submit Button -->
            <div class="text-right mt-6">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition font-medium">
                    Update Schedule
                </button>
            </div>
        </form>
    </section>
@endsection
