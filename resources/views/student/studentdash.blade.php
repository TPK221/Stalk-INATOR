@extends('layouts.HeaderFooter')

@section('content')
<div class="mdk-header-layout__content page-content pb-0">
    <div class="py-54pt bg-gradient-primary">
        <div class="container d-flex flex-column flex-md-row align-items-center text-center text-md-left">
            <div class="flex mb-32pt mb-md-0">
                <h1 class="text-white mb-8pt">Student Dashboard</h1>
            </div>
        </div>
    </div>
</div>
<br><br>
<div class="container page__container page-section p-0">
    <div class="card shadow-lg">
        <div class="card-body p-5">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <div class="text-center">
                        <img class="img-view-profile" src="/storage/images/{{auth()->user()->studentProfile->image ?? 'default-image.jpg'}}" alt="Profile Image">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="container pt-4">
                        @if(Auth::user()->hasRole('student'))
                            @if(isset(auth()->user()->studentProfile->fullName))
                            <span class="pl-5 font-weight-bold">Name : </span><span>{{ auth()->user()->studentProfile->fullName }}</span><br>
                        @else
                            <span class="pl-5 font-weight-bold">Name : </span><span>-</span><br>
                        @endif

                        <span class="pl-5 font-weight-bold ">Username : </span><span class="">{{ Auth::user()->name }}</span><br>
                        <span class="pl-5 font-weight-bold ">Email : </span><span class="">{{ Auth::user()->email }}</span><br>

                            @if(isset(auth()->user()->studentProfile->studentID))
                            <span class="pl-5 font-weight-bold">Student ID : </span><span>{{ auth()->user()->studentProfile->studentID }}</span><br> 
                            @else
                            <span class="pl-5 font-weight-bold">Lecturer ID : </span><span>-</span><br>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<br>
<br>
<br>
<br><br>

@endsection

@section('style')
<style>
    .img-view-profile {
        width: 200px;
        height: 200px;
        border-radius: 50%;
        object-fit: cover;
    }

    .font-weight-bold {
        font-weight: bold;
    }

    .card {
        border: none;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.08);
    }

    .card-body {
        padding: 40px;
    }
</style>
@endsection
