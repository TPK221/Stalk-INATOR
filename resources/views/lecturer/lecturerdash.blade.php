@extends('layouts.HeaderFooter')

@section('content')
<div class="mdk-header-layout__content page-content pb-0">
    <div class="py-32pt bg-gradient-primary">
        <div class="container d-flex flex-column flex-md-row align-items-center text-center text-md-left">
            <div class="flex mb-32pt mb-md-0">
                <h1 class="text-white mb-8pt">Lecturer Dashboard</h1>
            </div>
        </div>
    </div>
</div>

<br><br>
<div class="container page__container page-section border border-dark rounded shadow-lg p-5 mb-5 bg-white ">

    <img class="img-view-profile" src="/storage/images/{{auth()->user()->lecturerProfile->image ?? 'default-image.jpg'}}">
    <div class="container pt-5 container-text-student">
        @if(Auth::user()->hasRole('lecturer'))

        @if(isset(auth()->user()->lecturerProfile->lecturerName))
        <span class="pl-5 font-weight-bold">Name : </span><span>{{ auth()->user()->lecturerProfile->lecturerName }}</span><br>
        @else
        <span class="pl-5 font-weight-bold">Name : </span><span>-</span><br>
        @endif

        <span class="pl-5 font-weight-bold ">Username : </span><span class="">{{ Auth::user()->name }}</span><br>
        <span class="pl-5 font-weight-bold ">Email : </span><span class="">{{ Auth::user()->email }}</span><br>

        @if(isset(auth()->user()->lecturerProfile->lecturerID))
        <span class="pl-5 font-weight-bold">Lecturer ID : </span><span>{{ auth()->user()->lecturerProfile->lecturerID }}</span><br>
        @else
        <span class="pl-5 font-weight-bold">Lecturer ID : </span><span>-</span><br>
        @endif

        @endif
        <br>
    </div>

</div>

<br>
<br>
<br>


@endsection