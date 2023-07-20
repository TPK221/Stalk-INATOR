@extends('layouts.HeaderFooter')

@section('content')
<div class="mdk-header-layout__content page-content">
    <div class="py-32pt bg-gradient-primary">
        <div class="container d-flex flex-column flex-md-row align-items-center text-center text-md-left">
            <div class="flex mb-32pt mb-md-0">
                <h1 class="text-white mb-8pt">All Missions</h1>
            </div>
        </div>
    </div>

    <div class="container page__container page-section">
        <div class="row">
            @forelse ($missions as $mission )

            <div class="col-sm-6 col-md-4 col-xl-3">
                <div class="card card--elevated card-course overlay js-overlay mdk-reveal js-mdk-reveal " data-partial-height="40" data-trigger="click">

                    <img src="{{ asset('assets/images/Hacker.gif') }}" alt="course" style="width:250px; height:200px">

                    </img>
                    <div class="mdk-reveal__content">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex">
                                    <a class="card-title mb-4pt" href="#">Mission {{ $mission->id }}</a>
                                    @if ($mission->difficulty == 'Easy' )
                                    <span class="badge badge-success">{{ $mission->difficulty }}</span>
                                    @elseif ($mission->difficulty == 'Medium')
                                    <span class="badge badge-warning">{{ $mission->difficulty }}</span>
                                    @elseif ($mission->difficulty == 'Hard')
                                    <span class="badge badge-accent">{{ $mission->difficulty }}</span>
                                    @endif
                                    @if (Auth:: user()->hasRole('student'))
                                    @if ($mission->is_reserved == '1')
                                    <p class="text-center">This mission has been reserved.</p>
                                    @else
                                    <a href="{{ route('reservemissions', ['id' => $mission->id]) }}" class="btn btn-primary btn-sm float-right">Reserve Mission</a>
                                    @endif
                                    <!-- <a href="{{ route('student.submitFindings', $mission) }}" class="btn btn-primary btn-sm">Submit Findings</a> -->
                                    {{-- @if ($submissionStatus->status == 'Submitted')
                                            <span class="badge badge-success">{{ $submissionStatus->status }}</span>
                                    @endif --}}
                                    @elseif (Auth:: user()->hasRole('lecturer'))
                                    <a href="{{ route('lecturer.editMission', $mission) }}" class="btn btn-primary float-right">
                                        <i class="material-icons font-size-small">edit</i>
                                    </a>
                                    <a href="{{ route('lecturer.deleteMission', [$mission->id]) }}" class="btn btn-accent del float-right mr-1">
                                        <i class="material-icons">delete</i>
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            @if (Auth::user()->hasRole('student'))
            <h4 class="flex m-0">All missions have been reserved. Please check back later.</h4>
            @else
            <h4 class="flex m-0 text-danger">Please add a mission!</h4>
            @endif
            @endforelse

        </div>
    </div>
    <!-- Pagination -->
    <ul class="pagination justify-content-center pagination-sm">
        {{$missions->links()}}

    </ul>

    <br><br>
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