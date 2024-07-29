@extends('frontend.main_master')
@section('main')

@section('canonical')
    <link rel="canonical" href="{{ url('search/blog') }}">
@endsection
@section('og:url')
    <link rel="canonical" href="{{ url('search/blog') }}">
@endsection
@section('title', 'ICU TV News')
@section('description','ICU TV News')
@section('keywords','ICU TV News')
@php
    $aboutpage = App\Models\About::find(1);
@endphp

@section('image', $aboutpage->about_image)

 @php
 $searchblogs = $searchblogs ?? [];
 $popularBlogs = App\Models\Blog::with('editorChoice') // Include editor's choice relationship if you have one
        ->orderBy('views_count', 'desc') // Order by views_count in descending order
        ->take(5) // Get the top 5 popular blogs
        ->get();
@endphp

<div class="breadcumb-wrapper">
   <div class="container">
       <ul class="breadcumb-menu">
           <li><a href="home-newspaper.html">Home</a></li>
           <li>NEWS SEARCH RESULTS</li>
       </ul>
   </div>
</div>

<section class="space-top space-extra-bottom">
   <div class="container">
       <div class="row">
           <div class="col-xxl-9 col-lg-8">
               <div class="mb-30">
                  @foreach ($searchblogs as $item)
                  <div class="border-blog2">
                     <div class="blog-style4">
                         <div class="blog-img w-386">
                             <img src="{{ asset($item->blog_image)}}" alt="blog image">
                         </div>
                         <div class="blog-content">
                             <h3 class="box-title-30"><a class="hover-line" href="{{ route('blog.details',$item->id)}}">{{ $item->blog_title }}</a></h3>
                             <div class="blog-meta">
                                 <a href="author.html"><i class="far fa-user"></i>By - Tnews</a>
                                 <a href="blog.html"><i class="fal fa-calendar-days"></i>15 Mar, 2023</a>
                             </div>
                             <a href="blog-details.html" class="th-btn style2">Read More<i class="fas fa-arrow-up-right ms-2"></i></a>
                         </div>

                     </div>
                 </div>
                  @endforeach
                   


               </div>
               <div class="th-pagination mt-40">
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
                       <form class="search-form">
                           <input type="text" placeholder="Enter Keyword">
                           <button type="submit"><i class="far fa-search"></i></button>
                       </form>
                   </div>
                   <div class="widget widget_categories  ">
                       <h3 class="widget_title">Categories</h3>
                       <ul>
                           <li>
                               <a data-bg-src="assets/img/bg/category_bg_1_1.jpg" href="blog.html">Sports</a>
                           </li>
                           <li>
                               <a data-bg-src="assets/img/bg/category_bg_1_2.jpg" href="blog.html">Business</a>
                           </li>
                           <li>
                               <a data-bg-src="assets/img/bg/category_bg_1_3.jpg" href="blog.html">Politics</a>
                           </li>
                           <li>
                               <a data-bg-src="assets/img/bg/category_bg_1_4.jpg" href="blog.html">Health</a>
                           </li>
                           <li>
                               <a data-bg-src="assets/img/bg/category_bg_1_5.jpg" href="blog.html">Technology</a>
                           </li>
                           <li>
                               <a data-bg-src="assets/img/bg/category_bg_1_6.jpg" href="blog.html">Entertainment</a>
                           </li>
                       </ul>
                   </div>
                   <div class="widget  ">
                       <h3 class="widget_title">Recent Posts</h3>
                       <div class="recent-post-wrap">
                           <div class="recent-post">
                               <div class="media-img">
                                   <a href="blog-details.html"><img src="assets/img/blog/recent-post-1-1.jpg" alt="Blog Image"></a>
                               </div>
                               <div class="media-body">
                                   <h4 class="post-title"><a class="hover-line" href="blog-details.html">Fitness: Your journey to Better, stronger you.</a></h4>
                                   <div class="recent-post-meta">
                                       <a href="blog.html"><i class="fal fa-calendar-days"></i>21 June, 2023</a>
                                   </div>
                               </div>
                           </div>
                           <div class="recent-post">
                               <div class="media-img">
                                   <a href="blog-details.html"><img src="assets/img/blog/recent-post-1-2.jpg" alt="Blog Image"></a>
                               </div>
                               <div class="media-body">
                                   <h4 class="post-title"><a class="hover-line" href="blog-details.html">Embrace the game Ignite your sporting</a></h4>
                                   <div class="recent-post-meta">
                                       <a href="blog.html"><i class="fal fa-calendar-days"></i>22 June, 2023</a>
                                   </div>
                               </div>
                           </div>
                           <div class="recent-post">
                               <div class="media-img">
                                   <a href="blog-details.html"><img src="assets/img/blog/recent-post-1-3.jpg" alt="Blog Image"></a>
                               </div>
                               <div class="media-body">
                                   <h4 class="post-title"><a class="hover-line" href="blog-details.html">Revolutionizing lives Through technology</a></h4>
                                   <div class="recent-post-meta">
                                       <a href="blog.html"><i class="fal fa-calendar-days"></i>23 June, 2023</a>
                                   </div>
                               </div>
                           </div>
                           <div class="recent-post">
                               <div class="media-img">
                                   <a href="blog-details.html"><img src="assets/img/blog/recent-post-1-4.jpg" alt="Blog Image"></a>
                               </div>
                               <div class="media-body">
                                   <h4 class="post-title"><a class="hover-line" href="blog-details.html">Enjoy the Virtual Reality embrace the</a></h4>
                                   <div class="recent-post-meta">
                                       <a href="blog.html"><i class="fal fa-calendar-days"></i>25 June, 2023</a>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="widget  ">
                       <div class="widget-ads">
                           <a href="https://themeforest.net/user/themeholy/portfolio">
                               <img class="w-100" src="assets/img/ads/siderbar_ads_1.jpg" alt="ads">
                           </a>
                       </div>
                   </div>
                   <div class="widget widget_tag_cloud  ">
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
                   </div>
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
                <h3 class="breadcrumb__title">Search results</h3>
                <div class="breadcrumb__list wow tpfadeUp" data-wow-duration=".9s">
                   <span><a href="{{ route('home') }}">Home</a></span>
                   <span class="dvdr"><i class="fa fa-angle-right"></i></span>
                   <span>Blog & News</span>
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
                    @foreach ($searchblogs as $item)@endforeach
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
