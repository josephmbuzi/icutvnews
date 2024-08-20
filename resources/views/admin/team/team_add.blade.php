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

                    <h4 class="card-title">Add Team Page Section</h4> <br><br>

                    <form method="post" action="{{ route('store.team') }}" enctype="multipart/form-data">
                        @csrf

                        {{-- <input type="hidden" name="id" value="{{ $aboutpage->id }}"> --}}

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Select User</label>
                            <div class="col-sm-10">
                                <select name="user_id" id="user_id" class="form-control">
                                    <option value="">Select User</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->username }}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- end row -->

                        

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Member Name</label>
                            <div class="col-sm-10">
                                <input name="team_name" class="form-control" type="text" value="" id="example-text-input">
                                @error('team_name')
                                <span class="text-danger">{{ $message }}</span>

                                @enderror
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Member Position</label>
                            <div class="col-sm-10">
                                <input name="team_position" class="form-control" type="text" value="" id="example-text-input">
                                @error('team_position')
                                <span class="text-danger">{{ $message }}</span>

                                @enderror
                            </div>
                        </div>
                        <!-- end row -->



                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Member Description</label>
                            <div class="col-sm-10">
                                <textarea id="elm1" name="team_desc"></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Member Skills</label>
                            <div class="col-sm-10">
                            <textarea name="team_skills" required="" class="form-control" rows="5">
                            </textarea>

                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Member Career Guide</label>
                            <div class="col-sm-10">
                            <textarea name="team_guide" required="" class="form-control" rows="5">
                            </textarea>

                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Member Experience</label>
                            <div class="col-sm-10">
                            <textarea name="team_exp" required="" class="form-control" rows="5">
                            </textarea>

                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Facebook URL</label>
                            <div class="col-sm-10">
                                <input name="team_fb" class="form-control" type="text" value="" id="example-text-input">

                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Twitter URL</label>
                            <div class="col-sm-10">
                                <input name="team_twitter" class="form-control" type="text" value="" id="example-text-input">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">LinkedIn URL</label>
                            <div class="col-sm-10">
                                <input name="team_linkedin" class="form-control" type="text" value="" id="example-text-input">
                            </div>
                        </div>
                        <!-- end row -->


                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Member Profile Image</label>
                            <div class="col-sm-10">
                                <input name="team_image" class="form-control" type="file" id="image">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                            <img id="showImage" class="rounded avatar-lg" src="{{ url('upload/no_image.jpg') }}" alt="Card image cap">
                            </div>
                        </div>
                        <input type="submit" class="btn btn-info waves-effect waves-light" value="Insert Member Data">
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
