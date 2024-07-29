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

                    <h4 class="card-title">Add Property Data</h4> <br><br>

                    <form method="post" action="{{ route('store.property') }}" enctype="multipart/form-data">
                        @csrf

                        {{-- <input type="hidden" name="id" value="{{ $aboutpage->id }}"> --}}
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Select Property Category</label>
                            <div class="col-sm-10">
                                <select name="property_category_id" class="form-select" aria-label="Default select example">
                                    <option selected="">Open this select menu</option>
                                    @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->property_category }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Property Name</label>
                            <div class="col-sm-10">
                                <input name="property_name" class="form-control" type="text" value="" id="example-text-input">
                                @error('property_name')
                                <span class="text-danger">{{ $message }}</span>

                                @enderror
                            </div>
                        </div> 
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Property Tag</label>
                            <div class="col-sm-10">
                                <input name="property_tag" class="form-control" type="text" value="" data-role="tagsinput">
                                
                            </div>
                        </div><br>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Select Property Location</label>
                            <div class="col-sm-10">
                                <select name="property_location" class="form-select" aria-label="Default select example">
                                    <option selected="">Open this select menu</option>
                                    @foreach($locations as $loc)
                                    <option value="{{ $loc->id }}">{{ $loc->property_location_id }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div><br>
                        

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Property Location URL</label>
                            <div class="col-sm-10">
                                <input name="property_location_url" class="form-control" type="text" value="" id="example-text-input">
                                
                        </div><br>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Property Price</label>
                            <div class="col-sm-10">
                                <input name="property_price" class="form-control" type="text" value="" id="example-text-input">
                                
                        </div><br><br>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Property Video URL</label>
                            <div class="col-sm-10">
                                <input name="property_video" class="form-control" type="text" value="" id="example-text-input">
                                
                        </div><br><br>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Property Description</label>
                            <div class="col-sm-10">
                                <textarea id="elm1" name="property_desc"></textarea>
                            </div>
                        </div><br><br>
                        <!-- end row -->

                        

                 

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Property Image</label>
                            <div class="col-sm-10">
                                <input name="property_main_image" class="form-control" type="file" id="image">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                            <img id="showImage" class="rounded avatar-lg" src="{{ url('upload/no_image.jpg') }}" alt="Card image cap">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Property Multi Image</label>
                            <div class="col-sm-10">
                                <input name="property_images[]" class="form-control" type="file" multiple="" id="multi_images">
                            </div>
                        </div>
                        <!-- end row -->
                        
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <!-- Display the selected images -->
                                <div id="selectedImages"></div>
                            </div>
                        </div>
                        <!-- end row -->
                        <input type="submit" class="btn btn-info waves-effect waves-light" value="Insert Property Data">
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
        $('#multi_images').change(function(e){
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
