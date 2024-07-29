@extends('admin.admin_master')
@section('admin')


<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-10">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Dashboard</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">ICU TV News</a></li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            {{-- <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                @php
                                    $totalProperties = App\Models\Property::count();
                                @endphp
                                <p class="text-truncate font-size-14 mb-2">Total Properties</p>
                                <h4 class="mb-2">{{ $totalProperties }}</h4>

                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-primary rounded-3">
                                    <i class="fas fa-home font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col --> --}}
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            @php
                                $totalBlogs = App\Models\Blog::count();
                            @endphp
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2">Total Blogs</p>
                                <h4 class="mb-2">{{ $totalBlogs }}</h4>

                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-success rounded-3">
                                    <i class="fab fa-blogger-b font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            @php
                                $totalSubscribers = App\Models\Subscriber::count();
                            @endphp
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2">Total Subscribers</p>
                                <h4 class="mb-2">{{ $totalSubscribers }}</h4>

                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-success rounded-3">
                                    <i class="fab fa-blogger-b font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            @php
                                    $totalMessages = App\Models\Contact::count();
                                @endphp
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2">Total Messages</p>
                                <h4 class="mb-2">{{ $totalMessages }}</h4>

                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-success rounded-3">
                                    <i class="ri-mail-line font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->
            {{-- <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                                @php
                                    $unapprovedComments = App\Models\Comments::where('comment_approved', false)->get();
                                    $unapprovedCommentCount = $unapprovedComments->count();
                                @endphp
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2">New Comments</p>

                                @if ($unapprovedCommentCount > 0)
                                <h4 class="mb-2">{{ $unapprovedCommentCount }}</h4>
                                @endif

                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-primary rounded-3">
                                    <i class="ri-message-line font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col --> --}}



        </div><!-- end row -->


        <!-- end row -->


    </div>

</div>

@endsection
