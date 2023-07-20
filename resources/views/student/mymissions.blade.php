@extends('layouts.HeaderFooter')

@section('content')
<div class="mdk-header-layout__content page-content">
    <div class="py-54pt bg-gradient-primary">
        <div class="container d-flex flex-column flex-md-row align-items-center text-center text-md-left">
            <div class="flex mb-32pt mb-md-0">
                <h1 class="text-white mb-8pt">My Missions</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br>
                @if($reservations->isEmpty())
                <h4 class="flex m-0 text-info">No missions have been reserved.</h4>
                @else
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">Mission Number</th>
                                <th class="text-center">Mission Instructions</th>
                                <th class="text-center">Start Date</th>
                                <th class="text-center">Due Date</th>
                                <th class="text-center">Submit Findings</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">File Submitted</th>
                                <th class="text-center">Points</th>
                                <th class="text-center">Feedback</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reservations as $reservation)
                            <tr>
                                <td class="text-center">{{ $reservation->mission->id }}</td>
                                <td class="text-center">{{ $reservation->mission->mission_instruction }}</td>
                                <td class="text-center">{{ $reservation->mission->start_date }}</td>
                                <td class="text-center">{{ $reservation->mission->due_date }}</td>
                                <td class="text-center">
                                    <a href="{{ route('student.submitFindings', $reservation) }}" class="btn btn-primary">Submit</a>
                                </td>
                                <td class="text-center">
                                    @if ($reservation->submission && $reservation->submission->status)
                                    {{ $reservation->submission->status }}
                                    @else
                                    Not Submitted
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($reservation->submission && $reservation->submission->submissionFile)
                                    {{ $reservation->submission->submissionFile }}
                                    @else
                                    Not Submitted
                                    @endif
                                </td>
                                <td class="text-center">{{ $reservation->points }}</td>
                                <td class="text-center">{{ $reservation->feedback }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
