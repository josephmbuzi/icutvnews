@extends('admin.admin_master')
@section('admin')

<div class="page-content">
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Properties All</h4>

                

            </div>
        </div>
    </div>
    <!-- end page title -->
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Properties All Data</h4>
                    
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>SN</th>
                            <th>Properties Category</th>
                            <th>Properties Name</th>
                            <th>Properties Location</th>
                            <th>Properties Image</th>
                            <th>Action</th>
                            
                        </tr>
                        </thead>


                        <tbody>
                            @php($i = 1)
                            @foreach($properties as $item)
                        <tr>
                            <td> {{  $i++ }} </td>
                            <td> {{  $item['category']['property_category'] }} </td>
                            <td> {{  $item->property_name }} </td>
                            <td> {{  $item['location']['property_location_id'] }} </td>
                            <td><img src="{{ asset($item->property_main_image) }}" style="width: 60px; height: 60px"></td>
                            <td>
                                <a href="{{ route('edit.property',$item->id) }}" class="btn btn-info sm" title="Edit Data"> <i class="fas fa-edit"></i></a>
                                <a href="{{ route('delete.property',$item->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete"> <i class="fas fa-trash-alt"></i></a>
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