@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Property Location Edit</h4> <br><br>

                    <form method="post" action="{{ route('update.property.location') }}">
                        @csrf

                        <input type="hidden" name="id" value="{{ $propertylocation->id }}">
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Property Location Name</label>
                            <div class="col-sm-10">
                                <input name="property_location_id" class="form-control" type="text" value="{{ $propertylocation->property_location_id }}" id="example-text-input">
                                @error('property_location_id')
                                <span class="text-danger">{{ $message }}</span>

                                @enderror
                            </div>
                        </div>
                        <!-- end row -->

                        
                        <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Property Location">
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
