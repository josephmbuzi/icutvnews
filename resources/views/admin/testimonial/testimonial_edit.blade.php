@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<style type="text/css">
    .bootstrap-tagsinput .tag{
        margin-right: 2px;
        color: #b70000;
        font-weight: 700px;
    } 
</style>

<div class="page-content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Edit Testimonial Data</h4> <br><br>

                    <form method="post" action="{{ route('update.testimonial') }}" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" value="{{ $testimonials->id }}">
                        
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Client Name</label>
                            <div class="col-sm-10">
                                <input name="client_name" class="form-control" type="text" value="{{ $testimonials->client_name }}" id="example-text-input">
                                @error('client_name')
                                <span class="text-danger">{{ $message }}</span>

                                @enderror
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Client Position</label>
                            <div class="col-sm-10">
                                <input name="client_position" class="form-control" type="text" value="{{ $testimonials->client_position }}" id="example-text-input">
                                @error('client_position')
                                <span class="text-danger">{{ $message }}</span>

                                @enderror
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Client Testimonial</label>
                            <div class="col-sm-10">
                                <input name="testimonial" class="form-control" type="text" value="{{ $testimonials->testimonial }}" id="example-text-input">
                                @error('testimonial')
                                <span class="text-danger">{{ $message }}</span>

                                @enderror
                            </div>
                        </div>
                        <!-- end row -->


                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Client Profile Image</label>
                            <div class="col-sm-10">
                                <input name="client_image" class="form-control" type="file" id="image">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                            <img id="showImage" class="rounded avatar-lg" src="{{ asset( $testimonials->client_image ) }}" alt="Card image cap">
                            </div>
                        </div>
                        <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Testimonial Data">
                    </form>
                    
                    
                </div>
            </div>
        </div> <!-- end col -->
    </div>
    </div>

</div>

<script type="text/javascript">

    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#service_image').change(function(e){
            $('#selectedImages').empty(); // Clear any previous images

            // Loop through selected files and display their thumbnails
            for (let i = 0; i < e.target.files.length; i++) {
                let reader = new FileReader();
                reader.onload = function(event){
                    let img = document.createElement('img');
                    img.src = event.target.result;
                    img.className = 'rounded avatar-lg';
                    $('#selectedImages').append(img);
                }
                reader.readAsDataURL(e.target.files[i]);
            }
        });
    });
</script>

@endsection
