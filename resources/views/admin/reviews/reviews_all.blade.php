@extends('admin.admin_master')
@section('admin')

<div class="page-content">
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Blogs All</h4>



            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Blogs All Data</h4>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>SN</th>
                            <th>Review Category</th>
                            <th>Review Title</th>
                            <th>Review Rating</th>
                            <th>Review Views</th>
                            <th>Review Image</th>

                            <th>Action</th>

                        </tr>
                        </thead>


                        <tbody>
                            @php($i = 1)
                            @foreach($reviews as $item)
                        <tr>
                            <td> {{  $i++ }} </td>
                            <td> {{  $item['category']['review_category'] }} </td>
                            <td> {{  $item->review_title }} </td>
                            <td>  @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $item->review_rating)
                                    <i class="fas fa-star"></i> <!-- Filled star -->
                                @else
                                    <i class="far fa-star"></i> <!-- Empty star -->
                                @endif
                            @endfor </td>
                            <td> {{ $item->views_count }} </td>

                            <td><img src="{{ asset($item->review_thumb) }}" style="width: 60px; height: 60px"></td>
                            <td>
                                <a href="{{ route('edit.review',$item->id) }}" class="btn btn-info sm" title="Edit Data"> <i class="fas fa-edit"></i></a>
                                <a href="{{ route('delete.review',$item->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete"> <i class="fas fa-trash-alt"></i></a>
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
