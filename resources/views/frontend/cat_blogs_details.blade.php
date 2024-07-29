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
           <li><a href="{{ route('home') }}">Home</a></li>
           <li>{{ $categoryname->blog_category }}</li>
       </ul>
   </div>
</div>


<section class="th-blog-wrapper space-top space-extra-bottom">
   <div class="container">
       <div class="row">
           <div class="col-xxl-9 col-lg-8">
            @foreach ($blogpost as $item)
            <div class="th-blog blog-single has-post-thumbnail">
               <div class="blog-img">
                   <a href="{{ route('blog.details',$item->id)}}"><img src="{{ asset($item->blog_image)}}" alt="Blog Image"></a>
                   <a data-theme-color="#4E4BD0" href="blog.html" class="category">Sports</a>
               </div>
               <div class="blog-content">
                   <div class="blog-meta">
                       <a class="author" href="blog.html"><i class="far fa-user"></i>By - Tnews</a>
                       <a href="blog.html"><i class="fal fa-calendar-days"></i>{{ Carbon\Carbon::parse($item->created_at)->format('F j, Y')}}</a>
                       <a href="{{ route('blog.details',$item->id)}}"><i class="far fa-comments"></i>Comments (3)</a>
                   </div>
                   <h2 class="blog-title box-title-30"><a href="{{ route('blog.details',$item->id)}}">{{ $item->blog_title }}</a>
                   </h2>
                   <p class="blog-text">Fuel your competitive spirit, chase victory, and let sports be your legacy encapsulates the essence of embracing sports as a means to challenge oneself, strive for success, and leave a lasting impact. This phrase urges individuals to tap motivation getting to improve your tour skill.</p>
                   <a href="{{ route('blog.details',$item->id)}}" class="th-btn style2">Read More<i class="fas fa-arrow-up-right ms-2"></i></a>
               </div>
           </div>
            @endforeach
               

               <div class="th-pagination ">
                   <ul>
                       <li><a href="blog.html">01</a></li>
                       <li><a href="blog.html">02</a></li>
                       <li><a href="blog.html">03</a></li>
                       <li><a href="blog.html"><i class="fas fa-arrow-right"></i></a></li>
                   </ul>
               </div>
           </div>
           <div class="col-xxl-3 col-lg-4 sidebar-wrap">
               <aside class="sidebar-area">
                   <div class="widget widget_search  ">
                       <form class="search-form" action="{{ route('search.blogs') }}" method="GET">
                        @csrf
                           <input ame="keyword" type="search" placeholder="Search Here">
                           <button type="submit"><i class="far fa-search"></i></button>
                       </form>
                   </div>
                   <div class="widget widget_categories  ">
                       <h3 class="widget_title">Categories</h3>
                       <ul>
                        @foreach ($categories as $cat)
                        <li>
                           <a data-bg-src="assets/img/bg/category_bg_1_1.jpg" href="{{ route('category.blog',$cat->id) }}">{{ $cat->blog_category }}</a>
                       </li>
                        @endforeach
                           
                       </ul>
                   </div>
                   <div class="widget  ">
                       <h3 class="widget_title">Recent Posts</h3>
                       <div class="recent-post-wrap">
                        @foreach ($popularBlogs as $popularItem)
                        <div class="recent-post">
                           <div class="media-img">
                               <a href="blog-details.html"><img src="{{ asset($popularItem->blog_image)}}" alt="Blog Image"></a>
                           </div>
                           <div class="media-body">
                               <h4 class="post-title"><a class="hover-line" href="{{ route('blog.details',$popularItem->id)}}">{{$popularItem->blog_title}}</a></h4>
                               <div class="recent-post-meta">
                                   <a href="blog.html"><i class="fal fa-calendar-days"></i>{{ Carbon\Carbon::parse($popularItem->created_at)->format('F j, Y')}}</a>
                               </div>
                           </div>
                       </div>
                        @endforeach
                           

                       </div>
                   </div>
                   <div class="widget  ">
                       <div class="widget-ads">
                           <a href="https://themeforest.net/user/themeholy/portfolio">
                               <img class="w-100" src="{{ asset('frontend/assets/img/ads/siderbar_ads_1.jpg')}}" alt="ads">
                               
                           </a>
                       </div>
                   </div>
                   {{-- <div class="widget widget_tag_cloud  ">
                       <h3 class="widget_title">Popular Tags</h3>
                       <div class="tagcloud">
                           <a href="blog.html">Sports</a>
                           <a href="blog.html">Politics</a>
                           <a href="blog.html">Business</a>
                           <a href="blog.html">Music</a>
                           <a href="blog.html">Food</a>
                           <a href="blog.html">Technology</a>
                           <a href="blog.html">Travels</a>
                           <a href="blog.html">Health</a>
                           <a href="blog.html">Fashions</a>
                           <a href="blog.html">Animal</a>
                           <a href="blog.html">Weather</a>
                           <a href="blog.html">Movies</a>
                       </div>
                   </div> --}}
               </aside>
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
                   <span>{{ $categoryname->blog_category }}</span>
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
                    @foreach ($blogpost as $item)@endforeach
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
                            @foreach ($popularBlogs as $popularItem)@endforeach
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
                            @foreach ($categories as $cat)@endforeach
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
