@extends('admin.admin_master')
@section('admin')

<div class="page-content">
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">All FAQ</h4>



            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">All FAQ</h4>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>SN</th>
                            <th>FAQ</th>
                            <th>FAQ ANSWER</th>
                            <th>Action</th>

                        </tr>
                        </thead>


                        <tbody>
                             @php($i = 1) {{-- second method you remove this line --}}
                            @foreach($service_faq as $item) {{-- @foreach($blogcategory as $key => $item)--}}
                        <tr>
                            <td> {{  $i++ }} </td> {{-- {{  $key+1 }}--}}
                            <td> {{  $item->faq }} </td>
                            td> {{  $item->faq_answer }} </td>
                           <td>
                                <a href="{{ route('edit.faq',$item->id) }}" class="btn btn-info sm" title="Edit Data"> <i class="fas fa-edit"></i></a>
                                <a href="{{ route('delete.faq',$item->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete"> <i class="fas fa-trash-alt"></i></a>
                            </td>

                        </tr>
                        @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->



</div> <!-- container-fluid -->
</div>


@endsection
