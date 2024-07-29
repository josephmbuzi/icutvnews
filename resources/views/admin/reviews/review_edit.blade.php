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

                    <h4 class="card-title">Edit Review Page</h4> <br><br>

                    <form method="post" action="{{ route('update.review') }}" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" value="{{ $reviews->id }}">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Select Review Category</label>
                            <div class="col-sm-10">
                                <select name="review_category_id" class="form-select" aria-label="Default select example">
                                    <option selected=""></option>
                                    @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ $cat->id == $reviews->review_category_id ? 'selected' : '' }}>{{ $cat->review_category }}</option>
                                    @endforeach
                                    </select>
                                    @error('review_category_id')
                                <span class="text-danger">{{ $message }}</span>

                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Review Title</label>
                            <div class="col-sm-10">
                                <input name="review_title" class="form-control" type="text" value="{{ $reviews->review_title }}" id="example-text-input">
                                @error('review_title')
                                <span class="text-danger">{{ $message }}</span>

                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Review Video Url</label>
                            <div class="col-sm-10">
                                <input name="review_video_url" class="form-control" type="text" value="{{ $reviews->review_video_url }}" id="example-text-input">

                            </div>
                        </div>

                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="review_rating" class="col-sm-2 col-form-label">Review Rating</label>
                            <div class="col-sm-10">
                                <input name="review_rating" class="form-control" type="number" min="1" max="5" step="1" value="{{ $reviews->review_rating }}">
                                @error('review_rating')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Review Tags</label>
                            <div class="col-sm-10">
                                <input name="review_tags" class="form-control" type="text" value="{{ $reviews->review_tags }}" data-role="tagsinput">

                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Meta Keywords</label>
                            <div class="col-sm-10">
                                <input name="meta_keyword" class="form-control" type="text" value="{{ $reviews->meta_keyword }}" data-role="tagsinput">

                            </div>
                        </div>
                        <!-- end row -->



                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Meta Description</label>
                            <div class="col-sm-10">
                                <input name="meta_description" type="text" value="{{ $reviews->meta_description }}" id="example-text-input">

                            </div>
                        </div>
                        <!-- end row -->


                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Review Description</label>
                            <div class="col-sm-10">
                                <textarea id="elm1" name="review_description">{{ $reviews->review_description }}</textarea>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Review Image</label>
                            <div class="col-sm-10">
                                <input name="review_image" class="form-control" type="file" id="image">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                            <img id="showImage" class="rounded avatar-lg" src="{{ asset($reviews->review_image) }}" alt="Card image cap">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Review Thumbnail</label>
                            <div class="col-sm-10">
                                <input name="review_thumb" class="form-control" type="file" id="thumbimage">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                            <img id="showThumbImage" class="rounded avatar-lg" src="{{ asset($reviews->review_thumb) }}" alt="Card image cap">
                            </div>
                        </div>
                        <!-- end row -->
                        <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Review Data">
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
        $('#thumbimage').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showThumbImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>

@endsection
