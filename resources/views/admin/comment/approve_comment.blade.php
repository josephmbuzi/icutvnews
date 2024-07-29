 
@extends('admin.admin_master')
@section('admin')

<div class="page-content">
<div class="container-fluid">

<!-- start page title -->
<div class="row">
<div class="col-12">
<div class="page-title-box d-sm-flex align-items-center justify-content-between">
<h4 class="mb-sm-0">Comments</h4>



</div>
</div>
</div>
<!-- end page title -->

<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">

    <h4 class="card-title">Approve Comments</h4>
    
    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        <thead>
        <tr>
            <th>SN</th>
            <th>Name</th>
            <th>Email</th>
            <th>Comment</th>
            <th>Date</th>
            <th>Action </th>
            
        </tr>
        </thead>


        <tbody>
            @php($i = 1)
            @foreach($unapprovedComments as $item)
        <tr>
            <td> {{  $i++ }} </td>
            <td> {{  $item->commenter_name }} </td>
            <td> {{  $item->commenter_email }} </td>
            <td> {{  $item->comment }} </td>
            <td> {{ Carbon\Carbon::parse($item->created_at)->diffforHumans() }} </td>
            
            <td>
                <form action="{{ route('approve.commenter.comment', ['id' => $item->id]) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit"><i class="fas fa-eye"></i></button>
                </form>
                
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