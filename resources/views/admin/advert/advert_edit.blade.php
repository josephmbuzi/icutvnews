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

                    <h4 class="card-title">Change Advert</h4> <br><br>

                    <form method="post" action="{{ route('update.advert') }}" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" value="{{ $advert->id }}">


                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Advert Link</label>
                            <div class="col-sm-10">
                                <input name="advert_link" class="form-control" type="text" value="{{ $advert->advert_link }}" id="example-text-input">
                                @error('advert_link')
                                <span class="text-danger">{{ $message }}</span>

                                @enderror
                            </div>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Advert Image</label>
                            <div class="col-sm-10">
                                <input name="advert_img" class="form-control" type="file" id="image">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                            <img id="showImage" class="rounded avatar-lg" src="{{ asset($advert->advert_img) }}" alt="Card image cap">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Advert Sidebar Image</label>
                            <div class="col-sm-10">
                                <input name="advert_side_img" class="form-control" type="file" id="thumbimage">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                            <img id="showThumbImage" class="rounded avatar-lg" src="{{ asset($advert->advert_side_img) }}" alt="Card image cap">
                            </div>
                        </div>
                        <!-- end row -->
                        <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Advert">
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
