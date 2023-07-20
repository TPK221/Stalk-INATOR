@extends('layouts.HeaderFooter')

@section('content')
<div class="mdk-header-layout__content page-content">
    <div class="py-54pt bg-gradient-primary">
        <div class="container d-flex flex-column flex-md-row align-items-center text-center text-md-left">
            <div class="flex mb-32pt mb-md-0">
                <h1 class="text-white mb-8pt"> Add Missions</h1>
            </div>
        </div>
    </div>
    <div class="container page__container">
        <form action="{{ route('missions.savemissions') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="row">
                <div class="col-lg-9 align-items-center">
                    <div class="page-section">

                        <form method="POST" action="{{ route('missions.savemissions') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="list-group-item">
                                <label class="form-label" for="missionInstruction">Mission Instruction</label>
                                <textarea class="form-control" name="missionInstruction" rows="5" placeholder="Mission Instructions goes here..."></textarea>
                            </div>
                            <div class="list-group-item">
                                <label class="form-label" for="difficulty">Difficulty</label>
                                <select id="difficulty" name="difficulty" class="form-control custom-select" required>
                                    <option value="Easy">Easy</option>
                                    <option value="Medium">Medium</option>
                                    <option value="Hard">Hard</option>
                                </select>
                            </div>
                            <div class="list-group-item">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label" for="start_date">Start Date</label>
                                        <input type="date" class="form-control" name="start_date" id="start_date">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="due_date">Due Date</label>
                                        <input type="date" class="form-control" name="due_date" id="due_date">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <br>
                                <button type="submit" class="btn btn-primary">Save Mission</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </form>

    </div>

</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {

        $('button[type="submit"]').click(function() {

            Swal.fire({
                icon: 'success',
                title: 'Mission Added',
                showConfirmButton: false,
                timer: 1600
            })

        });

    });
</script>

@endsection