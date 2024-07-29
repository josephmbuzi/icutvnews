@extends('frontend.main_master')
@section('main')

@section('title', $blogs->blog_tags . ' ICU TV News')
@section('description','ICU TV News')
@section('keywords','ICU TV News')

@php
    $popularBlogs = App\Models\Blog::with('editorChoice') // Include editor's choice relationship if you have one
        ->orderBy('views_count', 'desc') // Order by views_count in descending order
        ->take(5) // Get the top 5 popular blogs
        ->get();
@endphp



<div class="breadcumb-wrapper">
   <div class="container">
       <ul class="breadcumb-menu">
           <li><a href="{{ route('home')}}">Home</a></li>
           <li>{{ $blogs->blog_tags }}</li>
       </ul>
   </div>
</div>

<section class="space-top space-extra-bottom">
   <div class="container">
       <div class="row">
           <div class="col-xxl-9 col-lg-12">
               <div class="mb-30">
                  @foreach ($relatedPosts as $item)
                   <div class="border-blog2">
                       <div class="blog-style4">
                           <div class="blog-img w-386">
                               <img src="{{ asset($item->blog_image)}}" alt="blog image">
                           </div>
                           <div class="blog-content">
                               <a data-theme-color="#092AA5" href="{{ route('blog.details',$item->id)}}" class="category">Politics</a>
                               <h3 class="box-title-30"><a class="hover-line" href="{{ route('blog.details',$item->id)}}">{{ $item->blog_title }}</a></h3>
                               <p class="blog-text">{!! Str::limit($item->blog_description, 200) !!}</p>
                               <div class="blog-meta">
                                   <a href="#"><i class="far fa-user"></i>By - Tnews</a>
                                   <a href="{{ route('blog.details',$item->id)}}"><i class="fal fa-calendar-days"></i>{{ Carbon\Carbon::parse($item->created_at)->format('F j, Y')}}</a>
                               </div>
                               <a href="{{ route('blog.details',$item->id)}}" class="th-btn style2">Read More<i class="fas fa-arrow-up-right ms-2"></i></a>
                           </div>

                       </div>
                   </div>
                  @endforeach

               </div>
           </div>
       </div>
   </div>
</section>


<!-- breadcrumb area start -->
{{-- <section class="breadcrumb__area breadcrumb-height include-bg p-relative" data-background="{{ asset('frontend/assets/img/breadcrumb/breadcurmb.jpg') }}">
    <div class="container">
       <div class="row">
          <div class="col-xxl-12">
             <div class="breadcrumb__content">
                <h3 class="breadcrumb__title">Blog & News</h3>
                <div class="breadcrumb__list wow tpfadeUp" data-wow-duration=".9s">
                   <span><a href="{{ route('home') }}">Home</a></span>
                   <span class="dvdr"><i class="fa fa-angle-right"></i></span>
                   <span>{{ $blogs->blog_tags }}</span>
                 </div>
             </div>
          </div>
       </div>
    </div>
    </section> --}}
    <!-- breadcrumb area end -->


    <!-- postbox area start -->
    {{-- <div class="postbox__area pt-120 pb-120">
       <div class="container">
          <div class="row">
             <div class="col-xxl-8 col-xl-8 col-lg-8">
                <div class="postbox__wrapper pr-20">
                    @foreach ($relatedPosts as $item)
                    <article class="postbox__item format-image mb-50 transition-3">
                        <div class="postbox__thumb w-img">
                           <a href="{{ route('blog.details',$item->id)}}">
                              <img src="{{ asset($item->blog_image)}}" alt="">
                           </a>
                        </div>
                        <div class="postbox__content">
                           <div class="postbox__meta">
                              <span><a href="#"><i class="fal fa-user-circle"></i> Yamfumu </a></span>
                              <span><a href="#"><i class="fal fa-clock"></i> {{ Carbon\Carbon::parse($item->created_at)->format('F j, Y')}}</a></span>

                           </div>
                           <h3 class="postbox__title">
                              <a href="{{ route('blog.details',$item->id)}}">{{ $item->blog_title }}</a>
                           </h3>
                           <div class="postbox__text">
                              <p>{!! Str::limit($item->blog_description, 200) !!}</p>
                           </div>
                           <div class="post__button">
                              <a class="tp-btn-sm" href="{{ route('blog.details',$item->id)}}"> READ MORE</a>
                           </div>
                        </div>
                     </article>
                    @endforeach




                   <div class="basic-pagination">
                    {{ $allblogs->links('vendor.pagination.custom') }}
                   </div>
                </div>
             </div>
             <div class="col-xxl-4 col-xl-4 col-lg-4">
                <div class="sidebar__wrapper">
                   <div class="sidebar__widget mb-40">
                      <h3 class="sidebar__widget-title">Search Here</h3>
                      <div class="sidebar__widget-content">
                         <div class="sidebar__search">
                            <form action="{{ route('search.blogs') }}" method="GET">
                                @csrf
                               <div class="sidebar__search-input-2">
                                  <input name="keyword" type="search" placeholder="Search your keyword...">
                                  <button type="submit"><i class="far fa-search"></i></button>
                               </div>
                            </form>
                         </div>
                      </div>
                   </div>
                   <div class="sidebar__widget mb-40">
                      <h3 class="sidebar__widget-title">Top Post</h3>
                      <div class="sidebar__widget-content">
                         <div class="sidebar__post rc__post">
                            @foreach ($popularBlogs as $popularItem)
                                <div class="rc__post mb-20 d-flex">
                                    <div class="rc__post-thumb mr-20">
                                    <a href="{{ route('blog.details',$popularItem->id)}}"><img src="{{ asset($popularItem->blog_image)}}" alt=""></a>
                                    </div>
                                    <div class="rc__post-content">
                                    <div class="rc__meta">
                                        <span>{{ Carbon\Carbon::parse($popularItem->created_at)->format('F j, Y')}}</span>
                                    </div>
                                    <h3 class="rc__post-title">
                                        <a href="blog-details.html">{{$popularItem->blog_title}}</a>
                                    </h3>
                                    </div>
                                </div>
                            @endforeach


                         </div>
                      </div>
                   </div>
                   <div class="sidebar__widget mb-40">
                      <h3 class="sidebar__widget-title">Categories</h3>
                      <div class="sidebar__widget-content">
                         <ul>
                            @foreach ($categories as $cat)
                            <li><a href="{{ route('category.blog',$cat->id) }}">{{ $cat->blog_category }}<span><i class="fal fa-angle-right"></i></span></a></li>
                            @endforeach


                         </ul>
                      </div>
                   </div>

                </div>
             </div>
          </div>
       </div>
    </div> --}}
    <!-- postbox area end -->

    <!-- tp-social-area-start -->
    {{-- @include('frontend.home_all.link_scroll') --}}
    <!-- tp-social-area-end -->

@endsection
