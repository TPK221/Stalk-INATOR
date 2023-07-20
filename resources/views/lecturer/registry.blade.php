@extends('layouts.HeaderFooter')

@section('content')
<div class="mdk-header-layout__content page-content">
    <div class="py-54pt bg-gradient-primary">
        <div class="container d-flex flex-column flex-md-row align-items-center text-center text-md-left">
            <div class="flex mb-32pt mb-md-0">
                <h1 class="text-white mb-8pt registryheader">Registry</h1>
            </div>
        </div>
    </div>
    <br>
    <div class="container-fluid page__container">
        <div class="card card-form">
            <div class="table-responsive p-5">
                <h4 class="textt">Lecturers</h4>
                <table class="custom-table mx-auto">
                    <thead class="thead-light">
                        <tr>
                            <th style="text-align: center">Username</th>
                            <th style="text-align: center">Email</th>
                            <th style="text-align: center">Full Name</th>
                            <th style="text-align: center">Lecturer ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lecturers as $lecturer)
                        <tr>
                            <td style="text-align: center">{{ $lecturer->name }}</td>
                            <td style="text-align: center">{{ $lecturer->email }}</td>
                            @if ($lecturer->lecturerProfile)
                            <td style="text-align: center">{{ $lecturer->lecturerProfile->lecturerName }}</td>
                            <td style="text-align: center">{{ $lecturer->lecturerProfile->lecturerID }}</td>
                            @else
                            <td></td>
                            <td></td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <br><br>
                <h4 class="textt">Students</h4>
                <table class="custom-table mx-auto ">
                    <thead class="thead-light">
                        <tr>
                            <th style="text-align: center">Username</th>
                            <th style="text-align: center">Email</th>
                            <th style="text-align: center">Full Name</th>
                            <th style="text-align: center">Student ID</th>
                            <th style="text-align: center">Reserved Missions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                        <tr>
                            <td style="text-align: center">{{ $student->name }}</td>
                            <td style="text-align: center">{{ $student->email }}</td>
                            @if ($student->studentProfile)
                            <td style="text-align: center">{{ $student->studentProfile->fullName }}</td>
                            <td style="text-align: center">{{ $student->studentProfile->studentID }}</td>
                            @else
                            <td></td>
                            <td></td>
                            <td></td>
                            @endif
                            <td>
                                <table class="custom-table inner-table mx-auto">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">Mission ID</th>
                                            <th style="text-align: center">Mission Instructions</th>
                                            <th style="text-align: center">Difficulty</th>
                                            <th style="text-align: center">Start Date</th>
                                            <th style="text-align: center">Due Date</th>
                                            <th style="text-align: center">Points</th>
                                            <th style="text-align: center">Feedback</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($student->reservations as $reservation)
                                        <tr>
                                            <td style="text-align: center">{{ $reservation->mission_id }}</td>
                                            @if ($reservation->mission)
                                            <td style="text-align: center">{{ $reservation->mission->mission_instruction }}</td>
                                            <td style="text-align: center">{{ $reservation->mission->difficulty }}</td>
                                            <td style="text-align: center">{{ $reservation->mission->start_date }}</td>
                                            <td style="text-align: center">{{ $reservation->mission->due_date }}</td>
                                            @endif
                                            <td style="text-align: center">{{ $reservation->points }}</td>
                                            <td style="text-align: center">{{ $reservation->feedback }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>  
        <br>
    </div>
</div>



@endsection

<style>
    .custom-table,
    .inner-table {
        border-collapse: collapse;
        width: 100%;
    }

    .custom-table th,
    .inner-table th {
        background-color: #f2f2f2; 
        padding: 10px;
        border: 1px solid #ccc; 
    }

    .custom-table td,
    .inner-table td {
        padding: 10px;
        border: 1px solid #ccc; 
    }

    .custom-table tr:nth-child(even),
    .inner-table tr:nth-child(even) {
        background-color: #f9f9f9; 
    }

    .custom-table tr:hover,
    .inner-table tr:hover {
        background-color: #e6e6e6; 
    }
</style>








