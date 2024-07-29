@extends('admin.admin_master')
@section('admin')

<div class="page-content">
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Property Location All</h4>

                

            </div>
        </div>
    </div>
    <!-- end page title -->
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Property Location All Data</h4>
                    
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>SN</th>
                            <th>Property Location Name</th>
                            <th>Action</th>
                            
                        </tr>
                        </thead>


                        <tbody>
                             @php($i = 1) {{-- second method you remove this line --}}
                            @foreach($propertylocation as $item) {{-- @foreach($blogcategory as $key => $item)--}}
                        <tr>
                            <td> {{  $i++ }} </td> {{-- {{  $key+1 }}--}}
                            <td> {{  $item->property_location_id }} </td>
                           <td>
                                <a href="{{ route('edit.property.location',$item->id) }}" class="btn btn-info sm" title="Edit Data"> <i class="fas fa-edit"></i></a>
                                {{-- <a href="{{ route('delete.property.location',$item->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete"> <i class="fas fa-trash-alt"></i></a> --}}
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