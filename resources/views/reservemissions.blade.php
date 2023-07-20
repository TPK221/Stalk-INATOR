@extends('layouts.HeaderFooter')

@section('content')
<div class="mdk-header-layout__content page-content">
    <div class="py-32pt bg-gradient-primary">
        <div class="container d-flex flex-column flex-md-row align-items-center text-center text-md-left">
            <div class="flex mb-32pt mb-md-0">
                <h1 class="text-white mb-8pt"> Reserve Missions</h1>
            </div>
        </div>
    </div>



    <h2>{{ $mission->title }}</h2>
    <p>{{ $mission->instructions }}</p>

    @if ($isReserved)
    <p>This mission has been successfully reserved by {{ $reservedBy->name }} for {{ $reservationPeriod }}.</p>
    @else
    <p>This mission is currently available for reservation.</p>
    <form method="POST" action="{{ route('missions.reserve', $mission->id) }}">
        @csrf
        <button type="submit">Reserve Mission</button>
    </form>
    @endif



    <div class="js-fix-footer bg-white border-top-5 footer-h">
        <div class="bg-footer page-section py-lg-50pt">
            <p class="text-white-50 mb-0" style="text-align:center">&copy; 2022 Copyright: Stalk-INATOR.com</p>
        </div>
    </div>
</div>

@endsection