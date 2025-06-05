{{-- @extends('layouts.app')

@section('content') --}}
<x-navbar>
</x-navbar>
<section class="rent-header" style="background: #e8f1f8; padding: 60px 0; text-align: center;">
    <div class="container">
        <h1>Rent Mini Soccer Field</h1>
        <p>Pick the field and time slot that suits you best!</p>
    </div>
</section>

<section class="mini-soccer-cards" style="padding: 60px 20px;">
    <div class="container" style="display: flex; flex-wrap: wrap; gap: 30px; justify-content: center;">

        {{-- Card 1: Indoor Mini Soccer --}}
        <div class="field-card" style="background: #fff; border-radius: 10px; box-shadow: 0 0 10px #ccc; padding: 20px; width: 300px;">
            <img src="{{ asset('assets/images/minisoccer-indoor.jpg') }}" alt="Indoor Mini Soccer" style="width: 100%; border-radius: 10px;">
            <h3 style="margin-top: 15px;">Indoor Mini Soccer</h3>
            <p>Rp 250.000 / hour</p>
            <ul style="text-align: left; padding-left: 20px;">
                <li>✔ Full roofed arena</li>
                <li>✔ Air-circulation system</li>
                <li>✔ Locker & shower rooms</li>
            </ul>
            <a href="/booking/minisoccer/indoor" class="btn-primary">Book Now</a>
        </div>

        {{-- Card 2: Outdoor Mini Soccer --}}
        <div class="field-card" style="background: #fff; border-radius: 10px; box-shadow: 0 0 10px #ccc; padding: 20px; width: 300px;">
            <img src="{{ asset('assets/images/minisoccer-outdoor.jpg') }}" alt="Outdoor Mini Soccer" style="width: 100%; border-radius: 10px;">
            <h3 style="margin-top: 15px;">Outdoor Mini Soccer</h3>
            <p>Rp 200.000 / hour</p>
            <ul style="text-align: left; padding-left: 20px;">
                <li>✔ Natural breeze & lighting</li>
                <li>✔ LED night lamps</li>
                <li>✔ Free parking & benches</li>
            </ul>
            <a href="/booking/minisoccer/outdoor" class="btn-primary">Book Now</a>
        </div>

        {{-- Card 3: Weekend Package --}}
        <div class="field-card" style="background: #fff; border-radius: 10px; box-shadow: 0 0 10px #ccc; padding: 20px; width: 300px;">
            <img src="{{ asset('assets/images/minisoccer-weekend.jpg') }}" alt="Weekend Package" style="width: 100%; border-radius: 10px;">
            <h3 style="margin-top: 15px;">Weekend Package</h3>
            <p>Rp 600.000 / 3 hours</p>
            <ul style="text-align: left; padding-left: 20px;">
                <li>✔ Saturday & Sunday only</li>
                <li>✔ Free drinks for team</li>
                <li>✔ Optional referee service</li>
            </ul>
            <a href="/booking/minisoccer/weekend" class="btn-primary">Book Now</a>
        </div>

    </div>
</section>
{{-- 
@endsection --}}


<x-footer>
</x-footer>
