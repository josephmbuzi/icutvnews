@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Footer Section</h4>

                    <form method="post" action="{{ route('update.footer') }}" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" value="{{ $allfooter->id }}">
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Contact Number</label>
                            <div class="col-sm-10">
                                <input name="number" class="form-control" type="phone" value="{{ $allfooter->number }}" id="example-text-input">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <input name="address" class="form-control" type="text" value="{{ $allfooter->address }}" id="example-text-input">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input name="email" class="form-control" type="email" value="{{ $allfooter->email }}" id="example-text-input">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Facebook URL</label>
                            <div class="col-sm-10">
                                <input name="facebook" class="form-control" type="text" value="{{ $allfooter->facebook }}" id="example-text-input">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Twitter URL</label>
                            <div class="col-sm-10">
                                <input name="twitter" class="form-control" type="text" value="{{ $allfooter->twitter }}" id="example-text-input">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Youtube URL</label>
                            <div class="col-sm-10">
                                <input name="youtube" class="form-control" type="text" value="{{ $allfooter->youtube }}" id="example-text-input">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Linkedin URL</label>
                            <div class="col-sm-10">
                                <input name="linkedin" class="form-control" type="text" value="{{ $allfooter->linkedin }}" id="example-text-input">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Instagram URL</label>
                            <div class="col-sm-10">
                                <input name="instagram" class="form-control" type="text" value="{{ $allfooter->instagram }}" id="example-text-input">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Behance URL</label>
                            <div class="col-sm-10">
                                <input name="behance" class="form-control" type="text" value="{{ $allfooter->behance }}" id="example-text-input">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Copyright</label>
                            <div class="col-sm-10">
                                <input name="copyright" class="form-control" type="text" value="{{ $allfooter->copyright }}" id="example-text-input">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Short Description</label>
                            <div class="col-sm-10">
                            <textarea name="short_description" required="" class="form-control" rows="5">
                            {{ $allfooter->short_description }}
                            </textarea>

                            </div>
                        </div>
                        <!-- end row -->



                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Footer Logo</label>
                            <div class="col-sm-10">
                                <input name="footer_logo" class="form-control" type="file" id="image">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                            <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($allfooter->footer_logo))? url($allfooter->footer_logo):url('upload/no_image.jpg') }}" alt="Card image cap">
                            </div>
                        </div>
                        <!-- end row -->
                        <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Footer Section">
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

@endsection
