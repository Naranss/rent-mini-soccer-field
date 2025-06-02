@extends('layouts.app')

@section('content')

<section class="rent-header" style="background: #e8f1f8; padding: 60px 0; text-align: center;">
    <div class="container">
        <h1>Rent a Field</h1>
        <p>Fill out the form below to book your slot!</p>
    </div>
</section>

<section class="rent-form-section" style="padding: 40px 20px;">
    <div class="container" style="max-width: 600px; margin: auto; background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px #ccc;">
        
        {{-- Show validation errors --}}
        @if ($errors->any())
            <div style="background: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 15px; border-radius: 5px;">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Success message --}}
        @if(session('success'))
            <div style="background: #d4edda; color: #155724; padding: 10px; margin-bottom: 15px; border-radius: 5px;">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('rent.book') }}" method="POST">
            @csrf

            <div class="form-group" style="margin-bottom: 15px;">
                <label for="name">Full Name</label>
                <input type="text" name="name" id="name" required value="{{ old('name') }}"
                    style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid #ccc;">
            </div>

            <div class="form-group" style="margin-bottom: 15px;">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" required value="{{ old('email') }}"
                    style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid #ccc;">
            </div>

            <div class="form-group" style="margin-bottom: 15px;">
                <label for="phone">Phone Number</label>
                <input type="tel" name="phone" id="phone" required value="{{ old('phone') }}"
                    style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid #ccc;">
            </div>

            <div class="form-group" style="margin-bottom: 15px;">
                <label for="field_type">Field Type</label>
                <select name="field_type" id="field_type" required
                    style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid #ccc;">
                    <option value="">-- Select Field --</option>
                    <option value="mini_soccer" {{ old('field_type') == 'mini_soccer' ? 'selected' : '' }}>Mini Soccer</option>
                    <option value="futsal">Futsal</option>
                    <option value="badminton">Badminton</option>
                    <option value="football">Football</option>
                </select>
            </div>

            <div class="form-group" style="margin-bottom: 15px;">
                <label for="date">Date</label>
                <input type="date" name="date" id="date" required value="{{ old('date') }}"
                    style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid #ccc;">
            </div>

            <div class="form-group" style="margin-bottom: 15px;">
                <label for="start_time">Start Time</label>
                <input type="time" name="start_time" id="start_time" required value="{{ old('start_time') }}"
                    style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid #ccc;">
            </div>

            <div class="form-group" style="margin-bottom: 25px;">
                <label for="end_time">End Time</label>
                <input type="time" name="end_time" id="end_time" required value="{{ old('end_time') }}"
                    style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid #ccc;">
            </div>

            <button type="submit" style="background: #28a745; color: white; padding: 12px 25px; border: none; border-radius: 6px; cursor: pointer;">
                Book Now
            </button>
        </form>
    </div>
</section>

@endsection
