@php
    $blogs = App\Models\Blog::latest()->get();
    $allblogs = App\Models\Blog::latest()->paginate(3);
    $categories = App\Models\BlogCategory::orderBy('blog_category','ASC')->get();
    $youtubes = App\Models\Youtube::latest()->get();
@endphp




<div class="space">
    <div class="container">
        <a href="https://www.icuzambia.net/">
            <img src="{{ asset('frontend/assets/img/ads/icu.png')}}" alt="ads" class="w-100">
        </a>
    </div>
</div>

{{-- <section class="space-top space-extra-bottom">
    <div class="container">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="sec-title has-line">Recent News</h2>
            </div>
            <div class="col-auto">
                <div class="sec-btn">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xxl-9 col-lg-12">
                <div class="row gy-30 filter-active">
                    @foreach ($blogs as $item)
                    <div class="filter-item col-xl-4 col-sm-6">
                        <div class="blog-style1">
                            <div class="blog-img">
                                <img src="{{ asset($item->blog_image)}}" alt="blog image">
                                <a data-theme-color="#092AA5" href="{{ route('blog.details',$item->id)}}" class="category">{{$item['category']['blog_category']}}</a>
                            </div>
                            <h3 class="box-title-20"><a class="hover-line" href="{{ route('blog.details',$item->id)}}">{{ $item->blog_title }}</a></h3>
                            <div class="blog-meta">
                                <a href="author.html"><i class="far fa-user"></i>By - {{ $item->author->name }}</a>
                                <a href="{{ route('blog.details',$item->id)}}"><i class="fal fa-calendar-days"></i>{{ Carbon\Carbon::parse($item->created_at)->format('F j, Y')}}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</section> --}}


<div class="space dark-theme bg-title-dark">
    <div class="container">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="sec-title has-line">Latest Video</h2>
            </div>
            <div class="col-auto">
                <div class="sec-btn">
                    <div class="icon-box">
                        <button data-slick-prev="#blog-video-slide1" class="slick-arrow default"><i class="far fa-arrow-left"></i></button>
                        <button data-slick-next="#blog-video-slide1" class="slick-arrow default"><i class="far fa-arrow-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row th-carousel" id="blog-video-slide1" data-slide-show="3" data-lg-slide-show="3" data-md-slide-show="3" data-sm-slide-show="1" data-center-mode="true" data-xl-center-mode="true" data-ml-center-mode="true" data-lg-center-mode="true" data-md-center-mode="true" data-variable-width="true">
            @foreach ($youtubes as $item)
            <div class="col-auto video-center-mode">
                <div class="blog-style3">
                    <div class="blog-img">
                        @php
                            // Extract the YouTube video ID
                            preg_match('/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|[^v\n\s]+\/\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $item->youtube_link, $matches);
                            $video_id = $matches[1] ?? null;
                    
                            // Construct the thumbnail URL
                            $thumbnail_url = $video_id ? "https://img.youtube.com/vi/$video_id/hqdefault.jpg" : null;
                        @endphp
                    
                        @if ($thumbnail_url)
                            <img src="{{ $thumbnail_url }}" alt="blog image">
                        @else
                            <img src="{{ asset($item->youtube_image)}}" alt="blog image">
                        @endif
                    
                        <a href="https://www.youtube.com/watch?v={{ $item->link }}" class="play-btn popup-video"><i class="fas fa-play"></i></a>
                    </div>
                    <div class="blog-content">
                        <h3 class="box-title-30"><a class="hover-line" href="blog-details.html">{{ $item->link_title }}</a></h3>
                        <div class="blog-meta">
                            <a href="author.html"><i class="far fa-user"></i>By - {{ $item->author->name }}</a>
                            <a href="blog.html"><i class="fal fa-calendar-days"></i>{{ Carbon\Carbon::parse($item->created_at)->format('F j, Y')}}</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
