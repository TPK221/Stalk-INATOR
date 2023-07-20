@extends('layouts.HeaderFooter')

@section('content')
<div class="mdk-header-layout__content page-content">
    <div class="py-32pt bg-gradient-primary">
        <div class="container d-flex flex-column flex-md-row align-items-center text-center text-md-left">
            <div class="flex mb-32pt mb-md-0">
                <h1 class="text-white mb-8pt">Rewards</h1>
            </div>
        </div>
    </div>
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm shadow-lg p-3 mb-5 bg-white rounded" style="height: 100%;">
                    <div class="card-body d-flex flex-column justify-content-between text-center">
                        <div class="">
                            <h5 class="card-title" style="font-size: 24px;">1st Place</h5>
                        </div>
                        <img src="{{ asset('assets/images/projector.jpg') }}" class="card-img-top reward-image" alt="Reward 1">
                        <p class="card-text">Mini Projector with WiFi Bluetooth</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm shadow-lg p-3 mb-5 bg-white rounded" style="height: 100%;">
                    <div class="card-body d-flex flex-column justify-content-between text-center">
                        <div class="">
                            <h5 class="card-title" style="font-size: 24px;">2nd Place</h5>
                        </div>
                        <img src="{{ asset('assets/images/shopping.webp') }}" class="card-img-top reward-image" alt="Reward 2">
                        <p class="card-text">LEGO 40460 Roses</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm shadow-lg p-3 mb-5 bg-white rounded" style="height: 100%;">
                    <div class="card-body d-flex flex-column justify-content-between text-center">
                        <div class="">
                            <h5 class="card-title" style="font-size: 24px;">3rd Place</h5>
                        </div>
                        <img src="{{ asset('assets/images/Hydro-Flask-20-oz-Wide-Flex-Cap-Dew-W20BTS441.jpg') }}" class="card-img-top reward-image" alt="Reward 3">
                        <p class="card-text">HYDRO FLASK - Water Bottle 946 ml</p>
                    </div>
                </div>
            </div>
      
            <div class="col-md-4 offset-md-2">
                <br><br>
                <div class="card border-0 shadow-sm shadow-lg p-3 mb-5 bg-white rounded" style="height: 100%;">
                    <div class="card-body d-flex flex-column justify-content-between text-center">
                        <div class="">
                            <h5 class="card-title" style="font-size: 24px;">4th Place</h5>
                        </div>
                        <img src="{{ asset('assets/images/candles.jpg') }}" class="card-img-top reward-image" alt="Reward 4">
                        <p class="card-text">LA Jolie Muse Jasmine & Ylang Ylang Scented Candle</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <br><br>
                <div class="card border-0 shadow-sm shadow-lg p-3 mb-5 bg-white rounded" style="height: 100%;">
                    <div class="card-body d-flex flex-column justify-content-between text-center">
                        <div class="">
                            <h5 class="card-title" style="font-size: 24px;">5th Place</h5>
                        </div>
                        <img src="{{ asset('assets/images/starbucks.png') }}" class="card-img-top reward-image" alt="Reward 5">
                        <p class="card-text">RM 20 Starbucks Gift Card</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br><br>
</div>

@push('styles')
<style>
    .reward-image {
        height: 100%; 
        object-fit: cover;
    }
    .card-text {
        margin-top: 8px;
        font-size: 14px;
        color: #6c757d;
    }
    
</style>
@endpush

@endsection
