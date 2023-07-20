@extends('layouts.HeaderFooter')

@section('content')
<div class="mdk-header-layout__content page-content ">
    <div class="bg-gradient-primary border-bottom-white py-32pt">
        <div class="container d-flex flex-column flex-md-row align-items-center text-center text-md-left">
            <div class="flex mb-32pt mb-md-0">
                <h1 class="text-white mb-0">Student Profile</h1>
            </div>
        </div>
    </div>
    <div class="container page__container">
        @if (session()-> get('studentProfile_id'))
            <form action="{{ route('student.saveAndUpdateProfile', [$user->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col-lg-9">
                        <div class="page-section">
                            <h4>Basic Information</h4>
                            <div class="list-group-item">
                                <div class="form-group row mb-0">
                                    <label class="col-form-label col-sm-3">Profile photo</label>
                                    <div class="col-sm-9 media align-items-center">
                                        <span class="media-left mr-16pt">
                                            <img src="/storage/images/{{$student->image ?? 'default-image.jpg'}}" alt="people" width="56" class="rounded-circle" />
                                        </span>
                                        <div class="media-body">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="image" id="image">
                                                <label class="custom-file-label" for="image">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group list-group-form">
                                <div class="list-group-item">
                                    <div class="form-group row mb-0">
                                        <label class="col-form-label col-sm-3">Full Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name = "fullName" class="form-control" value="{{ $student->fullName ?? 'None' }}" placeholder="Your first name ...">
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item">
                                    <div class="form-group row mb-0">
                                        <label class="col-form-label col-sm-3">Student ID</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="studentID" class="form-control" value="{{ $student->studentID ?? 'None' }}" placeholder="Your student ID">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" id="save-changes" class="btn btn-accent">Save changes</button>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        @else
            <form action="{{ route('student.saveAndUpdateProfile') }}" method="POST" enctype = "multipart/form-data">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col-lg-9">
                        <div class="page-section">
                            <h4>Basic Information</h4>
                            <div class="list-group-item">
                                <div class="form-group row mb-0">
                                    <label class="col-form-label col-sm-3">Profile photo</label>
                                    <div class="col-sm-9 media align-items-center">
                                        <spam class="media-left mr-16pt">
                                            <img src="/storage/images/default-image.jpg" alt="people" width="56" class="rounded-circle" />
                                        <spam>
                                        <div class="media-body">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="image" id="image">
                                                <label class="custom-file-label" for="image">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group list-group-form">
                                <div class="list-group-item">
                                    <div class="form-group row mb-0">
                                        <label class="col-form-label col-sm-3">Full Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name = "fullName" class="form-control"  placeholder="Your first name ..." required>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item">
                                    <div class="form-group row mb-0">
                                        <label class="col-form-label col-sm-3">Student ID</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="studentID" class="form-control" placeholder="Your student ID" required>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" id="save-changes" class="btn btn-accent">Save changes</button>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        @endif
    </div>
</div>
@endsection

@section('script')

    <script>
        $(document).ready(function() {

            $('#save-changes').click(function() {

                Swal.fire({
                    icon: 'success',
                    title: 'Changes Saved',
                    showConfirmButton: false,
                    timer: 1600
                })

            });
            $('#image').on('change',function(){
                var fileName = $(this).val();
                $(this).next('.custom-file-label').html(fileName);
            })
        });
    </script>


@endsection