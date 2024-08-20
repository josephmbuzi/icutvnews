@extends('admin.admin_master')
@section('admin')

<div class="page-content">
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">All Users</h4>

                

            </div>
        </div>
    </div>
    <!-- end page title -->
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Email Verified</th>
                            <th>Status</th>
                            <th>Created Date</th>
                            <th>Action</th>
                            
                        </tr>
                        </thead>


                        <tbody>
                            @php($i = 1)
                            @forelse ($getRecord as $value)
                            <tr>
                                <td>{{  $i++ }}</td>
                                <td> <p>{{ $value->name}}</p> </td>
                                <td> <p>{{ $value->email}}</p> </td>
                                <td> <p>{{ !empty($value->email_verified_at) ? 'Yes' : 'No' }}</p> </td>
                                <td> <p>{{ !empty($value->status) ? 'Verified' : 'No' }}</p> </td>
                                <td> <p>{{ $value->created_at}}</p> </td>
                               <td>
                                    <a href="{{ route('edit.user',$value->id) }}" class="btn btn-info sm" title="Edit Data"> <i class="fas fa-edit"></i></a>
                                    <a href="{{ route('delete.user',$value->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete"> <i class="fas fa-trash-alt"></i></a>
                                </td>
                                
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="100%">Record not found</td>
                                </tr>
                            @endforelse
                       
                        </tbody>
                    </table>
                    {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}


                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->


    
</div> <!-- container-fluid -->
</div>
    

@endsection