@extends('frontend.main_master')
@section('main')

{{-- @section('canonical')
    <link rel="canonical" href="{{ url('category/blog' . $blog->id) }}">
@endsection
@section('og:url')
    <link rel="canonical" href="{{ url('category/blog' . $blog->id) }}">
@endsection --}}
@section('title', 'ICU TV News')
@section('description','ICU TV News')
@section('keywords','ICU TV News')
@php
    $aboutpage = App\Models\About::find(1);
@endphp

@section('image', asset($aboutpage->about_image))
@php
    $popularBlogs = App\Models\Blog::with('editorChoice') // Include editor's choice relationship if you have one
        ->orderBy('views_count', 'desc') // Order by views_count in descending order
        ->take(5) // Get the top 5 popular blogs
        ->get();
        $categories = App\Models\BlogCategory::orderBy('blog_category','ASC')->get();
@endphp
<div class="breadcumb-wrapper">
    <div class="container">
        <ul class="breadcumb-menu">
            <li><a href="home-newspaper.html">Home</a></li>
            <li><a href="category.html">Author</a></li>
            <li>{{ $author->name }}</li>
        </ul>
    </div>
</div>

<section class="space space-extra-bottom">
    <div class="container">
        <div class="row">
            <div class="col-xl-8">
                <div class="">
                    @foreach($blogs as $blog)
                    <div class="mb-4 border-blog ">
                        <div class="blog-style4">
                            <div class="blog-img w-270">
                                <img src="{{ asset($blog->blog_image) }}" alt="blog image">
                            </div>
                            <div class="blog-content">
                                <a data-theme-color="#6234AC" href="blog.html" class="category">Gadget</a>
                                <h3 class="box-title-22"><a class="hover-line" href="blog-details.html">{{ $blog->blog_title }}</a></h3>
                                <div class="blog-meta">
                                    <a href="author.html"><i class="far fa-user"></i>By - {{ $blog->author->name }}</a>
                                    <a href="blog.html"><i class="fal fa-calendar-days"></i>{{ Carbon\Carbon::parse($blog->created_at)->format('F j, Y')}}</a>
                                </div>
                                <a href="{{ route('blog.details', $blog->id) }}" class="th-btn style2">Read More<i class="fas fa-arrow-up-right ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="th-pagination pt-10">
                    <ul>
                        <li><a href="blog.html">01</a></li>
                        <li><a href="blog.html">02</a></li>
                        <li><a href="blog.html">03</a></li>
                        <li><a href="blog.html"><i class="fas fa-arrow-right"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-4 sidebar-wrap">
                <div class="sidebar-area mb-0">
                    <div class="widget  ">
                        <div class="author-details">
                            <div class="author-img">
                                <img src="assets/img/normal/author_details.jpg" alt="Image">
                            </div>
                            <div class="author-content">
                                <h3 class="box-title-24">Joshua Ricardo</h3>
                                <div class="info-wrap">
                                    <span class="info">Senior. Writer</span>
                                    <span class="info"><strong>Post: </strong>38</span>
                                </div>
                                <p class="author-bio">Fusce interdum lectus nec nibh blandit ultrices. Praesent quis tortor eu massa faucibus aliquam. Aenean ultrices tempus magna, ut ultrices eros pulvinar id.</p>
                                <div class="info-wrap top-border">
                                    <span class="info"><strong>Email : </strong></span>
                                    <span class="info"><a href="mailto:joshua.@gmail.com">joshua.@gmail.com</a></span>
                                </div>
                                <div class="info-wrap">
                                    <span class="info"><strong>Phone : </strong></span>
                                    <span class="info"><a href="tel:+1233025550107">+123 (302) 555-0107</a></span>
                                </div>
                                <h4 class="box-title-18">Social Media</h4>
                                <div class="th-social">
                                    <a href="https://facebook.com"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://twitter.com"><i class="fab fa-twitter"></i></a>
                                    <a href="https://pinterest.com"><i class="fab fa-pinterest-p"></i></a>
                                    <a href="https://linkedin.com"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="https://youtube.com"><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
