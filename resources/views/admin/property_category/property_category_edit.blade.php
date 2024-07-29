@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Property Category Edit</h4> <br><br>

                    <form method="post" action="{{ route('update.property.category') }}">
                        @csrf

                        <input type="hidden" name="id" value="{{ $propertycategory->id }}">
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Category Name</label>
                            <div class="col-sm-10">
                                <input name="property_category" class="form-control" type="text" value="{{ $propertycategory->property_category }}" id="example-text-input">
                                @error('property_category')
                                <span class="text-danger">{{ $message }}</span>

                                @enderror
                            </div>
                        </div>
                        <!-- end row -->

                        
                        <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Property Category">
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
