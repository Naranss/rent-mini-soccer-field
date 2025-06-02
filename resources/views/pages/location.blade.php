{{-- @extends('layouts.app')

@section('content') --}}
<x-navbar>
</x-navbar>
<!-- <section class="location-hero" style="background: url('{{ asset('assets/images/location-hero.jpg') }}') center/cover no-repeat; padding: 100px 20px; color: white; text-align: center;"> -->
    <div class="container">
        <h1>Our Location</h1>
        <p style="font-size: 1.2rem; margin-top: 10px;">Come visit us and enjoy our sports facilities</p>
    </div>
</section>

<section class="location-details" style="padding: 60px 20px;">
    <div class="container" style="max-width: 1000px; margin: auto; color: #333;">
        <h2 style="text-align: center;">Yapping Sport Center</h2>
        <p style="text-align: center;">Jl. Sportiva No. 10, Maguwoharjo, Sleman, Yogyakarta</p>
        <p style="text-align: center;">Phone: (0274) 456-7890 | Email: contact@yappingcenter.com</p>

        <div style="display: flex; flex-wrap: wrap; gap: 30px; margin-top: 40px; justify-content: center;">

            {{-- Gambar Google Maps --}}
            <div style="flex: 1 1 400px; max-width: 400px;">
                <img 
                    src="{{ asset('assets/images/google-maps-screenshot.jpg') }}" 
                    alt="Google Maps Location" 
                    style="width: 100%; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.2);"
                >
            </div>

            {{-- Embed Google Maps --}}
            <div style="flex: 2 1 500px; min-width: 300px; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.2);">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.8902788805727!2d110.35362771478126!3d-7.767231594351394!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5caeb99d46b3%3A0x8d6c9367ec9f7d9a!2sJl.%20Sportiva%20No.%2010%2C%20Maguwoharjo%2C%20Sleman%2C%20Yogyakarta!5e0!3m2!1sen!2sid!4v1694231838567!5m2!1sen!2sid"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

        </div>
    </div>
</section>
{{-- 
@endsection --}}


<x-footer>
</x-footer>
