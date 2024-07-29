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

                    <h4 class="card-title">Edit Service Page Section</h4> <br><br>

                    <form method="post" action="{{ route('update.service') }}" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" value="{{ $services->id }}">

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Service Name</label>
                            <div class="col-sm-10">
                                <input name="service_name" class="form-control" type="text" value="{{ $services->service_name }}" id="example-text-input">
                                @error('service_name')
                                <span class="text-danger">{{ $message }}</span>

                                @enderror
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Service Title</label>
                            <div class="col-sm-10">
                                <input name="service_title" class="form-control" type="text" value="{{ $services->service_title }}" id="example-text-input">
                                @error('service_title')
                                <span class="text-danger">{{ $message }}</span>

                                @enderror
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Service Short Description</label>
                            <div class="col-sm-10">
                                <input name="service_short_desc" class="form-control" type="text" value="{{ $services->service_short_desc }}" id="example-text-input">
                                @error('service_short_desc')
                                <span class="text-danger">{{ $message }}</span>

                                @enderror
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Service List </label>
                            <div class="col-sm-10">
                                <input name="service_list" class="form-control" type="text" value="{{ $services->service_list }}" data-role="tagsinput">

                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Service Meta Description</label>
                            <div class="col-sm-10">
                                <input name="meta_description" class="form-control" type="text" value="{{ $services->meta_description }}" id="example-text-input">

                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Service Meta Keyword </label>
                            <div class="col-sm-10">
                                <input name="meta_keyword" class="form-control" type="text" value="{{ $services->meta_keyword }}" data-role="tagsinput">

                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Service Description</label>
                            <div class="col-sm-10">
                                <textarea id="elm1" name="service_desc">
                                    {{ $services->service_desc }}
                                </textarea>
                            </div>
                        </div>
                        <!-- end row -->



                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Service Image</label>
                            <div class="col-sm-10">
                                <input name="service_image" class="form-control" type="file" id="image">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                            <img id="selectedImage" class="rounded avatar-lg" src="{{ asset($services->service_image) }}" alt="Card image cap">
                            </div>
                        </div>


                        <!-- end row -->
                        <input type="submit" class="btn btn-info waves-effect waves-light" value="Insert Service Data">
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
