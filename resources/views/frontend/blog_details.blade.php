@extends('frontend.main_master')

@section('schema')
<script type="application/ld+json">
    {!! $schema !!}
</script>
@endsection
@section('canonical')
    <link rel="canonical" href="{{ url('blog/details' . $blog->id) }}">
@endsection
@section('og:url')
    <link rel="og:url" href="{{ url('blog/details' . $blog->id) }}">
@endsection

@section('title', $blogs->blog_title . ' ICU TV News')
@section('description', $blogs->meta_description)
@section('keywords', $blogs->meta_keyword .', ICU TV News.')




@section('image', asset($blogs->blog_image))

@section('main')

@php
     $categories = App\Models\BlogCategory::orderBy('blog_category','ASC')->get();
     $allfooter = App\Models\Footer::find(1);
@endphp




<div class="breadcumb-wrapper">
   <div class="container">
       <ul class="breadcumb-menu">
           <li><a href="{{ route('home')}}">Home</a></li>
           <li>Blog Details</li>
       </ul>
   </div>
</div><!--==============================
   Blog Area
==============================-->
<section class="th-blog-wrapper blog-details space-top space-extra-bottom">
   <div class="container">
       <div class="row">
           <div class="col-xxl-9 col-lg-8">
               <div class="th-blog blog-single">
                   <h2 class="blog-title">{{ $blog->blog_title }}</h2>
                   <div class="blog-meta">
                       <a class="author" href="{{ route('author.blogs', $blog->author->id) }}"><i class="far fa-user"></i>By - {{ $blog->author->name }}</a>
                       <a href="blog.html"><i class="fal fa-calendar-days"></i>{{ Carbon\Carbon::parse($blog->created_at)->format('F j, Y')}}</a>
                       <span><i class="far fa-book-open"></i>5 Mins Read</span>
                   </div>
                   <div class="blog-img">
                       <img src="{{ asset($blog->blog_image) }}" alt="Blog Image">
                   </div>
                   <div class="blog-content-wrap">
                       <div class="share-links-wrap">
                           <div class="share-links">
                               <span class="share-links-title">Share Post:</span>
                               <div class="multi-social">
                                   <a href="https://facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                   <a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
                                   <a href="https://linkedin.com/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                               </div><!-- End Social Share -->
                           </div>
                       </div>
                       <div class="blog-content">
                           <div class="blog-info-wrap">
                               <button class="blog-info print_btn">
                                   Print :
                                   <i class="fas fa-print"></i>
                               </button>
                               <a class="blog-info" href="mailto:">
                                   Email :
                                   <i class="fas fa-envelope"></i>
                               </a>
                               <button class="blog-info ms-sm-auto" data-blog-id="{{ $blog->id }}">{{ $blog->likes_count }} <i class="fas fa-thumbs-up"></i></button>
                           </div>
                           <div class="content">
                               <p>{!! $blog->blog_description !!}</p>
                           </div>
                           <div class="blog-tag">
                               <h6 class="title">Related Tag :</h6>
                               <div class="tagcloud">
                                 @foreach(explode(',', $blog->blog_tags) as $tag)
                                 <a href="{{ route('related.posts',$blogs->id) }}">{{ $tag }}</a>
                                 @endforeach  
                                   
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="blog-author">
                   <div class="auhtor-img">
                    @if($blog->author && $blog->author->profile_image)
                       <img src="{{ asset($blog->author->profile_image) }}" alt="Blog Author Image">
                    @endif
                   </div>
                   <div class="media-body">
                       <div class="author-top">
                           <div>
                               <h3 class="author-name"><a class="text-inherit" href="team-details.html">{{ $blog->author->name }}</a></h3>
                               <span class="author-desig">Founder & CEO</span>
                           </div>
                           <div class="social-links">
                               <a href="https://facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                               <a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
                               <a href="https://linkedin.com/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                               <a href="https://instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
                           </div>
                       </div>
                       <p class="author-text">Adventurer and passionate travel blogger. With a backpack full of stories and a camera in hand, she takes her readers on exhilarating journeys around the world.</p>
                   </div>
               </div>
               <div class="th-comments-wrap ">
                <h2 class="blog-inner-title h3">Comments ({{ $blog->comments->count() }})</h2>
                <ul class="comment-list">
                    @foreach($blog->comments as $comment)
                    <li class="th-comment-item">
                        <div class="th-post-comment">
                            <div class="comment-avater">
                                <img src="assets/img/blog/comment-author-1.jpg" alt="Comment Author">
                            </div>
                            <div class="comment-content">
                                <span class="commented-on"><i class="fas fa-calendar-alt"></i>{{ Carbon\Carbon::parse($comment->created_at)->format('F j, Y')}}</span>
                                <h3 class="name">{{ $comment->name }}</h3>
                                <p class="text">{{ $comment->comment }}</p>
                                <div class="reply_and_edit">
                                    <a href="blog-details.html" class="reply-btn"><i class="fas fa-reply"></i>Reply</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div> <!-- Comment end --> <!-- Comment Form -->
            <form action="{{ route('comments.store', $blog->id) }}" method="POST">
                @csrf
                <div class="th-comment-form ">
                    <div class="form-title">
                        <h3 class="blog-inner-title mb-2">Leave a Comment</h3>
                        <p class="form-text">Your email address will not be published. Required fields are marked *</p>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="text" name="name" placeholder="Your Name*" class="form-control" required>
                            <i class="far fa-user"></i>
                        </div>
                        <div class="col-12 form-group">
                            <textarea name="comment" placeholder="Write a Comment*" class="form-control" required></textarea>
                            <i class="far fa-pencil"></i>
                        </div>
                        <div class="col-12 form-group mb-0">
                            <button class="th-btn">Post Comment</button>
                        </div>
                    </div>
                </div>
            </form>
            
           </div>
           <div class="col-xxl-3 col-lg-4 sidebar-wrap">
               <aside class="sidebar-area">
                   <div class="widget  ">
                       <h3 class="widget_title">Recent Posts</h3>
                       <div class="recent-post-wrap">
                        @foreach ($popularBlogs as $popularItem)
                        <div class="recent-post">
                            <div class="media-img">
                                <a href="{{ route('blog.details',$popularItem->id)}}"><img src="{{ asset($popularItem->blog_image)}}" alt="Blog Image"></a>
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
                       <div class="widget newsletter-widget2 mb-30" data-bg-src="assets/img/bg/particle_bg_1.png">
                        <h3 class="box-title-24">Subscribe Our Newsletter</h3>
                        <form action="{{ route('store.subscriber') }}" method="post" class="newsletter-form">
                            @csrf
                            <input class="form-control" type="email" name="email" placeholder="Enter Email" required="">
                            <button type="submit" class="th-btn btn-fw">Subscribe Now</button>
                        </form>
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
                        @foreach(explode(',', $blog->blog_tags) as $tag)
                           <a href="{{ route('related.posts',$blogs->id) }}">{{ $tag }}</a>
                        @endforeach
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
                    <h3 class="breadcrumb__title">What we have to share</h3>
                    <div class="breadcrumb__list wow tpfadeUp" data-wow-duration=".9s">
                       <span><a href="{{ route('home') }}">Home</a></span>
                       <span class="dvdr"><i class="fa fa-angle-right"></i></span>
                       <span>{{ $blog->blog_title }}</span>
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
                 <div class="col-xxl-8 col-xl-8 col-lg-8 col-12">
                    <div class="postbox__wrapper">
                       <article class="postbox__item format-image transition-3">
                          <div class="postbox__content">
                             <p><img class="w-100" src="{{ asset($blog->blog_image) }}" alt=""></p>
                             <div class="postbox__meta">
                                <span><a href="#"><i class="fal fa-user-circle"></i> Yamfumu </a></span>
                                <span><a href="#"><i class="fal fa-clock"></i> {{ Carbon\Carbon::parse($blog->created_at)->format('F j, Y')}}</a></span>

                             </div>
                             <h3 class="postbox__title">
                                {{ $blog->blog_title }}
                             </h3>
                             <div class="postbox__text">
                                <p>
                                    {!! $blog->blog_description !!}
                                </p>

                             </div>


                             <div class="postbox__social-wrapper">
                                <div class="row">
                                   <div class="col-xl-8 col-lg-12">
                                      <div class="postbox__tag tagcloud">
                                         <span>Tag</span>
                                         @foreach(explode(',', $blog->blog_tags) as $tag)@endforeach {{ route('related.posts',$blogs->id) }} {{ $tag }}
                                         <a href="{{ route('related.posts',$blogs->id) }}">{{ $tag }}</a>
                                         @endforeach
                                      </div>
                                   </div>
                                   <div class="col-xl-4 col-lg-12">

                                   </div>
                                </div>
                             </div>
                          </div>
                       </article>

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
        <!-- tp-social-area-end -->
@endsection


