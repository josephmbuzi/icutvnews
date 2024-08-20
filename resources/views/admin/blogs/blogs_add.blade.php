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

                    <h4 class="card-title">Add Blog Page Section</h4> <br><br>

                    <form method="post" action="{{ route('store.blog') }}" enctype="multipart/form-data">
                        @csrf

                        {{-- <input type="hidden" name="id" value="{{ $aboutpage->id }}"> --}}
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Select Blog Category</label>
                            <div class="col-sm-10">
                                <select name="blog_category_id" class="form-select" aria-label="Default select example">
                                    <option selected=""></option>
                                    @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->blog_category }}</option>
                                    @endforeach
                                    </select>
                                    @error('blog_category_id')
                                <span class="text-danger">{{ $message }}</span>

                                @enderror
                            </div>
                        </div>
                        @if(Auth::user()->is_admin == 1)
                        <div class="row mb-3">
                            <label for="editor_choice" class="col-sm-2 col-form-label">Editor's Choice</label>
                            <div class="col-sm-10">
                                <input type="checkbox" id="editor_choice" name="editor_choice" value="1">
                            </div>
                        </div>
                        @endif
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Blog Title</label>
                            <div class="col-sm-10">
                                <input name="blog_title" class="form-control" type="text" value="" id="example-text-input">
                                @error('blog_title')
                                <span class="text-danger">{{ $message }}</span>

                                @enderror
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Blog Tags</label>
                            <div class="col-sm-10">
                                <input name="blog_tags" class="form-control" type="text" placeholder="home,tech" data-role="tagsinput">

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
                                <input name="meta_description" type="text" id="example-text-input">

                            </div>
                        </div>
                        <!-- end row -->


                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Blog Description</label>
                            <div class="col-sm-10">
                                <textarea id="elm1" name="blog_description"></textarea>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Blog Image</label>
                            <div class="col-sm-10">
                                <input name="blog_image" class="form-control" type="file" id="image">
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
                            <label for="example-text-input" class="col-sm-2 col-form-label">Blog Thumbnail</label>
                            <div class="col-sm-10">
                                <input name="blog_thumb" class="form-control" type="file" id="thumbimage">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                            <img id="showThumbImage" class="rounded avatar-lg" src="{{ url('upload/no_image.jpg') }}" alt="Card image cap">
                            </div>
                        </div>
                        <!-- end row -->
                        <input type="submit" class="btn btn-info waves-effect waves-light" value="Insert Blog Data">
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
