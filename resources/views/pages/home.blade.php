@extends('layouts.app')

@section('content')

<!-- <section class="hero-section" style="background: url('{{ asset('assets/images/venue-hero.jpg') }}') center/cover no-repeat; padding: 120px 20px; color: white; text-align: center;"> -->
    <div class="container">
        <h1 style="font-size: 3rem; font-weight: 700;">Find & Book Your Sport Venue</h1>
        <p style="font-size: 1.25rem; margin-top: 15px;">Easy booking for football, futsal, badminton & more near you.</p>
    </div>
</section>

<section class="venues-list" style="padding: 60px 20px;">
    <div class="container">
        <h2 style="text-align: center; margin-bottom: 40px;">Popular Venues</h2>

        <div class="cards-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 30px;">

            {{-- Venue Card 1 --}}
            <div class="venue-card" style="background: white; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); overflow: hidden;">
                <img src="{{ asset('assets/images/venue1.jpg') }}" alt="Yapping Mini Soccer" style="width: 100%; height: 180px; object-fit: cover;">
                <div style="padding: 20px;">
                    <h3>Yapping Mini Soccer</h3>
                    <p style="color: #555; margin: 8px 0;">Jl. Sportiva No. 10, Sleman</p>
                    <div style="display: flex; align-items: center; gap: 8px; color: #f5a623;">
                        <span>⭐⭐⭐⭐☆</span>
                        <span style="color: #777;">(120 reviews)</span>
                    </div>
                    <a href="/rent" class="btn-primary" style="margin-top: 15px; display: inline-block;">Book Now</a>
                </div>
            </div>

            {{-- Venue Card 2 --}}
            <div class="venue-card" style="background: white; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); overflow: hidden;">
                <img src="{{ asset('assets/images/venue2.jpg') }}" alt="Yapping Futsal Arena" style="width: 100%; height: 180px; object-fit: cover;">
                <div style="padding: 20px;">
                    <h3>Yapping Futsal Arena</h3>
                    <p style="color: #555; margin: 8px 0;">Jl. Merpati No. 15, Sleman</p>
                    <div style="display: flex; align-items: center; gap: 8px; color: #f5a623;">
                        <span>⭐⭐⭐⭐⭐</span>
                        <span style="color: #777;">(89 reviews)</span>
                    </div>
                    <a href="/rent" class="btn-primary" style="margin-top: 15px; display: inline-block;">Book Now</a>
                </div>
            </div>

            {{-- Venue Card 3 --}}
            <div class="venue-card" style="background: white; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); overflow: hidden;">
                <img src="{{ asset('assets/images/venue3.jpg') }}" alt="Yapping Badminton Court" style="width: 100%; height: 180px; object-fit: cover;">
                <div style="padding: 20px;">
                    <h3>Yapping Badminton Court</h3>
                    <p style="color: #555; margin: 8px 0;">Jl. Cendrawasih No. 5, Sleman</p>
                    <div style="display: flex; align-items: center; gap: 8px; color: #f5a623;">
                        <span>⭐⭐⭐⭐☆</span>
                        <span style="color: #777;">(75 reviews)</span>
                    </div>
                    <a href="/rent" class="btn-primary" style="margin-top: 15px; display: inline-block;">Book Now</a>
                </div>
            </div>

            {{-- Tambah venue lain sesuai kebutuhan --}}
        </div>
    </div>
</section>

@endsection
