@extends('layouts.HeaderFooter')

@section('content')
<div class="mdk-header-layout__content page-content pb-0">
    <div class="py-32pt bg-gradient-primary">
        <div class="container d-flex flex-column flex-md-row align-items-center text-center text-md-left">
            <div class="flex mb-32pt mb-md-0">
                <h1 class="text-white mb-8pt">Student Dashboard</h1>
            </div>
        </div>
    </div>
</div>

<br><br>
<div class="container page__container page-section border border-dark rounded shadow-lg p-5 mb-5 bg-white ">

<img class="img-view-profile" src="/storage/images/{{auth()->user()->studentProfile->image ?? 'default-image.jpg'}}" alt="Profile Image">
    <div class="container pt-5 container-text-student">
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
        <span class="pl-5 font-weight-bold">Student ID : </span><span>-</span><br>
        @endif

        @endif
        <br>
    </div>

</div>

<br>
<br>
<br>


@endsection