@extends('layouts.HeaderFooter')

@section('content')
@include('sweetalert::alert')

<div class="mdk-header-layout__content page-content">
    <div class="py-54pt bg-gradient-primary">
        <div class="container d-flex flex-column flex-md-row align-items-center text-center text-md-left">
            <div class="flex mb-32pt mb-md-0">
                <h1 class="text-white mb-8pt">Missions</h1>
            </div>
            @if (Auth:: user()->hasRole('lecturer'))
            <a href="{{ route('missions.addmissions') }}" class="btn btn--raised bg-success text-dark font-weight-bold btn-outline-success">Add Missions</a>
            @endif
        </div>
    </div>
    <br><br>
    <div class="container page__container page-section mt-0 pt-0 pb-0">
        <h2 class="flex m-0">Instructions</h2><br>
        <p class="flex m-0">1. Students are required to select 1 mission per week.</p>
        <p class="flex m-0">2. Each mission can only be reserved for one week.</p>
        <p class="flex m-0">3. When selecting a mission, students are able to choose a difficulty level of their choice. Levels include easy, medium and hard.</p>
        <p class="flex m-0">4. Students are required to edit their profile by adding their full name and student ID before submitting their findings.</p>
        <p class="flex m-0">5. Findings should be submitted by the due date under "My Missions" tab.</p>
        <p class="flex m-0">6. Points and feedback will be given. Students with the most points will be awarded a prize.</p>

    </div>
    <br>
    <div class="container page__container page-section">
        <div class="mb-heading d-flex align-items-center ">
            <div class="row w-50">
                <div class="col-sm-4 p-0">
                    <h4 class="flex m-0">Choose difficulty:</h4>
                </div>
                <div class="col-sm-4 p-0">
                    <div class="dropdown pt-0 ">
                        <button class="dropbtn dropdown-toggle" data-toggle="dropdown">Select Difficulty</button>
                        <div class="dropdown-content">
                        @if (Auth::user()->hasRole('lecturer'))
                            <a href="{{ route('allmissions', $missions) }}"><b>All</b></a>
                            @endif
                            <a href="{{ route('easymissions', $missions) }}">Easy</a>
                            <a href="{{ route('mediummissions', $missions) }}">Medium</a>
                            <a href="{{ route('hardmissions', $missions) }}">Hard</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br><br>
        
    </div>
</div>

@endsection

@section('script')
<script>
    $('.del').on('click', function(event) {
        event.preventDefault();
        const url = $(this).attr('href');
        Swal.fire({
            title: 'Are you sure you want to delete this mission?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(function(value) {
            if (value.isConfirmed) {
                window.location.href = url;
                Swal.fire(
                    'Deleted!',
                    'Mission has been deleted.',
                    'success'
                )
            }
        });
    });
</script>

@endsection