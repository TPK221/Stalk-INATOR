@extends('layouts.HeaderFooter')

@section('content')
<div class="mdk-header-layout__content page-content pb-0">
    <div class="py-54pt bg-gradient-primary">
        <div class="container d-flex flex-column flex-md-row align-items-center text-center text-md-left">
            <div class="flex mb-32pt mb-md-0">
                <h1 class="text-white mb-8pt">Submit Findings</h1>
            </div>
        </div>
    </div>
    <br><br>
    <div class= "container page__container">
        <h2 class="flex m-0">Mission Instruction: {{ $mission->mission_instruction }}</h2>
        <br><br>
        
        <p>You can upload images file such as png and jpg, pdf file and word document. Max upload size: 2MB </p>
            <form action="{{ route('student.storeFindings', $mission->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="form-group m-0">
                    <div class="custom-file">
                        <input type="file" id="submissionFile" name="submissionFile" class="custom-file-input">
                        <label for="submissionFile" class="custom-file-label">Choose file</label>
                    </div>
                </div>
                <br>   
                <button type="submit" id="submit-findings" class="btn btn-primary">Submit Findings</button>
            </form>
    </div>
</div>

@endsection

@section('script')

    <script>
        $(document).ready(function() {

            $('#submit-findings').click(function() {

                Swal.fire({
                    icon: 'success',
                    title: 'Mission Completed',
                    showConfirmButton: false,
                    timer: 1600
                })

            });
            
            $('#submissionFile').on('change',function(){
                var fileName = $(this).val();
                $(this).next('.custom-file-label').html(fileName);
            })
        });
    </script>


@endsection
