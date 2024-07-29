@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Add FAQ</h4> <br> <br>

                    <form method="post" id="myForm" action="{{ route('store.faq') }}" >
                        @csrf


                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">FAQ</label>
                            <div class="form-group col-sm-10">
                                <input name="faq" class="form-control" type="text" id="example-text-input">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">FAQ Answer</label>
                            <div class="form-group col-sm-10">
                                <input name="faq_answer" class="form-control" type="text" id="example-text-input">
                            </div>
                        </div>
                        <!-- end row -->


                        <input type="submit" class="btn btn-info waves-effect waves-light" value="Add FAQ">
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
                property_category: {
                    required: true,
                },
            },
            messages: {
                property_category: {
                    required: 'Please Enter Property Category', // Corrected "Blog Ctegory" to "Blog Category"
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
