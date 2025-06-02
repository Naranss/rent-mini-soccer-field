@extends('layouts.app') {{-- atau sesuaikan layoutmu --}}

@section('content')

    {{-- Hero Section --}}
    <!-- <section class="hero" style="background: url('{{ asset('assets/images/field-bg.jpg') }}') center/cover no-repeat; padding: 100px 0; color: white; text-align: center;"> -->
        <div class="container">
            <h1>Welcome to Yapping Sport Center</h1>
            <p>Your #1 destination for sport field rentals in Sleman</p>
            <a href="/rent" class="btn-primary">Book a Field Now</a>
        </div>
    </section>

    {{-- About Us Section --}}
    <section class="about-us" style="padding: 60px 20px; background-color: #f9f9f9;">
        <div class="container">
            <h2>About Us</h2>
            <p>Yapping Sport Center has been providing high-quality sport fields and facilities since 2015. We offer football, futsal, and badminton courts with professional-grade lighting, clean locker rooms, and online reservation support.</p>
        </div>
    </section>

    {{-- Rent Field Features --}}
    <section class="features" style="padding: 60px 20px;">
        <div class="container">
            <h2>Why Rent With Us?</h2>
            <div class="feature-grid" style="display: flex; gap: 30px; flex-wrap: wrap;">
                <div class="feature-box" style="flex: 1; min-width: 250px;">
                    <h4>Online Booking</h4>
                    <p>Reserve your preferred slot anytime, anywhere using our online system.</p>
                </div>
                <div class="feature-box" style="flex: 1; min-width: 250px;">
                    <h4>Professional Facilities</h4>
                    <p>Enjoy clean, well-maintained fields and equipment that meet sports standards.</p>
                </div>
                <div class="feature-box" style="flex: 1; min-width: 250px;">
                    <h4>Strategic Location</h4>
                    <p>Located in Maguwoharjo, just minutes away from the stadium and major roads.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Location Section --}}
    <section class="location" style="padding: 60px 20px; background-color: #eef1f5;">
        <div class="container">
            <h2>Find Us</h2>
            <p>Jl. Sportiva No. 10, Maguwoharjo, Sleman, Yogyakarta</p>
            <div style="margin-top: 20px;">
                <iframe src="https://www.google.com/maps?q=Yapping%20Sport%20Center&output=embed" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </section>

@endsection
