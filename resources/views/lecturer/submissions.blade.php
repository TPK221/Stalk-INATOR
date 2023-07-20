@extends('layouts.HeaderFooter')

@section('content')

<!-- Modal -->
<div class="modal fade" id="assignPointsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="assignPointsLabel">Assign Points & Feedback</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('lecturer.assignPoints', $studentNames) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="studentName">Student Name:</label>
                        <select id="studentName" name="studentName" class="form-control custom-select p-0">
                            <option value="Select Student">Select Student</option>
                            @foreach ($studentNames as $student)
                                <option value="{{ $student }}">{{ $student }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="missionId">Mission ID:</label>
                        <select id="missionId" name="missionId" class="form-control custom-select p-0">
                            <option value="Select Mission">Select Mission</option>
                            @foreach ($submissionData as $submission)
                                <option value="{{ $submission->mission_id }}">{{ $submission->mission_id }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="points">Points Allocation:</label>
                        <input id="points" type="text" name="points" class="form-control" placeholder="Points" required="Please fill in points">
                    </div>
                    <div class="form-group">
                        <label for="feedback">Feedback:</label>
                        <textarea id="feedback" name="feedback" class="form-control" placeholder="Feedback" required="Please fill in feedback"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="add-points" class="btn btn-primary">Add Points & Feedback</button>
                </div>
            </form>
        </div>
    </div>
</div>



<div class="mdk-header-layout__content page-content pb-0">
    <div class="py-54pt bg-gradient-primary">
        <div class="container d-flex flex-column flex-md-row align-items-center text-center text-md-left">
            <div class="flex mb-32pt mb-md-0">
                <h1 class="text-white mb-8pt">Submissions</h1>
            </div>
            <a href="#" class="btn btn--raised bg-success text-dark font-weight-bold btn-outline-success" data-toggle="modal" data-target="#assignPointsModal">Assign Points & Feedback</a>
        </div>
    </div>
    <br><br>
    <div class="container page__container">
        <div class="table-responsive" data-toggle="lists" data-lists-values='["studentName"]'>
            <div class="search-form search-form--light mb-3">

                <input type="text" class="form-control search" placeholder="Search">

                <button class="btn btn-sm" type="button" role="button"><i class="material-icons">search</i></button>
            </div>
            
            <table class="table custom-table">
                <thead class="thead-light">
                    <tr>
                        <th style="text-align: center">No.</th>
                        <th style="text-align: center">Student Name</th>
                        <th style="text-align: center">Student ID</th>
                        <th style="text-align: center">Mission ID</th>
                        <th style="text-align: center">Submission File</th>
                        <th style="text-align: center">Submitted At</th>
                        <th style="text-align: center">Download</th>
                    </tr>
                </thead>
                <tbody class="list">
                    @forelse ($submissionData as $row)
                    <tr>
                        <td style="text-align: center">{{ $loop->iteration }}</td>
                        <td class="studentName" style="text-align: center">{{ $row->fullName }}</td>
                        <td style="text-align: center">{{ $row->studentID }}</td>
                        <td style="text-align: center">{{ $row->mission_id }}</td>
                        <td style="text-align: center">{{ $row->submissionFile }}</td>
                        <td style="text-align: center">{{ $row->created_at }}</td>
                        <td><a href="{{ route('lecturer.downloadSubmissions', $row->submissionFile) }}" class="btn btn-primary btn-sm" style="text-align: center">Download Submission</a></td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">
                            <h4 class="flex m-0 text-danger">NO SUBMISSIONS YET</h4>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    .custom-table {
        width: 100%;
        border-collapse: collapse;
        border-top: 1px solid #ccc;
    }

    .custom-table th,
    .custom-table td {
        padding: 10px;
        border: 1px solid #ccc;
    }

    .custom-table th {
        background-color: #f2f2f2;
        border-top: 1px solid #ccc;
        border: 1px solid #ccc;
    }

    .custom-table tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .custom-table tbody tr:hover {
        background-color: #e6e6e6;
    }
</style>
@endsection

@section('script')

<script>
    $(document).ready(function() {

        $('#add-points').click(function() {

            Swal.fire({
                icon: 'success',
                title: 'Points and Feedback have been added',
                showConfirmButton: false,
                timer: 1600
            })

        });
    });
</script>


@endsection