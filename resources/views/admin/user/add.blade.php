@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
                    <h4 class="card-title">Add New User</h4> <br> <br>

                    <form method="post" id="myForm" action="" >
                        @csrf

                      
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                            <div class="form-group col-sm-10">
                                <input name="name" required class="form-control" type="text" value="" id="example-text-input">                      
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Username</label>
                            <div class="form-group col-sm-10">
                                <input name="username" required class="form-control" type="text" value="" id="example-text-input">
                                {{-- @error('username')
            <span class="text-danger">{{ $message }}</span>
        @enderror                       --}}
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                            <div class="form-group col-sm-10">
                                <input name="email" required class="form-control" type="text" value="" id="example-text-input">
                                {{-- @error('email')
            <span class="text-danger">{{ $message }}</span>
        @enderror                       --}}
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Password</label>
                            <div class="form-group col-sm-10">
                                <input name="password" required class="form-control" type="text" value="" id="example-text-input">                      
                            </div>
                        </div>
                        <!-- end row -->

                        
                        <input type="submit" class="btn btn-info waves-effect waves-light" value="Add User">
                    </form>
                    
                    
                </div>
            </div>
        </div> <!-- end col -->
    </div>
    </div>

</div>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {  // Corrected "ruels" to "rules"
                blog_category: {
                    required: true,
                },
            },
            messages: {
                blog_category: {
                    required: 'Please Enter Blog Category', // Corrected "Blog Ctegory" to "Blog Category"
                },
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
        });
    });
</script>


@endsection
