@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Portfolio Page Section</h4>

                    <form method="post" action="{{ route('store.portfolio') }}" enctype="multipart/form-data">
                        @csrf
                        {{-- <input type="hidden" name="id" value="{{ $aboutpage->id }}"> --}}
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Select Service</label>
                            <div class="col-sm-10">
                                <select name="service_name_id" class="form-select" aria-label="Default select example">
                                    <option selected=""></option>
                                    @foreach($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->service_name }}</option>
                                    @endforeach
                                    </select>
                                    @error('service_name_id')
                                <span class="text-danger">{{ $message }}</span>

                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Name</label>
                            <div class="col-sm-10">
                                <input name="portfolio_name" class="form-control" type="text" value="" id="example-text-input">
                                @error('portfolio_name')
                                <span class="text-danger">{{ $message }}</span>

                                @enderror
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Title</label>
                            <div class="col-sm-10">
                                <input name="portfolio_title" class="form-control" type="text" value="" id="example-text-input">
                                @error('portfolio_title')
                                <span class="text-danger">{{ $message }}</span>

                                @enderror
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Client Name</label>
                            <div class="col-sm-10">
                                <input name="client" class="form-control" type="text" value="" id="example-text-input">
                                @error('client')
                                <span class="text-danger">{{ $message }}</span>

                                @enderror
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Client Industry</label>
                            <div class="col-sm-10">
                                <input name="industry" class="form-control" type="text" value="" id="example-text-input">
                                @error('industry')
                                <span class="text-danger">{{ $message }}</span>

                                @enderror
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Project link</label>
                            <div class="col-sm-10">
                                <input name="link" class="form-control" type="text" value="" id="example-text-input">
                                @error('link')
                                <span class="text-danger">{{ $message }}</span>

                                @enderror
                            </div>
                        </div>
                        <!-- end row -->


                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Short Description</label>
                            <div class="col-sm-10">
                            <textarea name="portfolio_short_description" required="" class="form-control" rows="5">
                            </textarea>

                            </div>
                        </div>
                        <!-- end row -->


                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Meta Keywords</label>
                            <div class="col-sm-10">
                                <input name="meta_keyword" class="form-control" type="text"  data-role="tagsinput">

                            </div>
                        </div>
                        <!-- end row -->



                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Meta Description</label>
                            <div class="col-sm-10">
                                <input name="meta_description" class="form-control" type="text" value="" id="example-text-input">

                            </div>
                        </div>
                        <!-- end row -->

                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Description</label>
                            <div class="col-sm-10">
                                <textarea id="elm1" name="portfolio_description"></textarea>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Image</label>
                            <div class="col-sm-10">
                                <input name="portfolio_image" class="form-control" type="file" id="image">
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
                            <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Multi Image</label>
                            <div class="col-sm-10">
                                <input name="portfolio_images[]" class="form-control" type="file" multiple="" id="multi_images">
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
                        <!-- end row -->
                        <input type="submit" class="btn btn-info waves-effect waves-light" value="Insert Portfolio Data">
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
