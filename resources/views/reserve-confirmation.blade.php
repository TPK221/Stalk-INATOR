@extends('layouts.HeaderFooter')

@section('content')
<div class="mdk-header-layout__content page-content">
    <div class="py-32pt bg-gradient-primary">
        <div class="container d-flex flex-column flex-md-row align-items-center text-center text-md-left">
            <div class="flex mb-32pt mb-md-0">
                <h1 class="text-white mb-8pt">Reserve Missions</h1>
            </div>
        </div>
    </div>
    <div class="container my-5">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header badge-success py-20pt">You have successfully reserved this mission!</div>
                    <div class="card-header "><strong>Mission {{ $mission->id }}</strong></div>
                    

                    <div class="card-body">
                        <h5 class="card-title">Mission Instructions: {{ $mission->mission_instruction }}</h5>
                        <p class="card-text"><strong>Reserved By:</strong> {{ $reservedBy->name }}</p>
                        <p class="card-text"><strong>Due By:</strong> {{ \Carbon\Carbon::parse($mission->due_date)->format('jS F Y') }}</p>
                        <br>
                        <a href="{{ route('missions', $mission->id) }}" class="btn btn-primary">Back to Mission Details</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @endsection