@php
    $homeslide = App\Models\HomeSlide::find(1);
    $categories = App\Models\BlogCategory::orderBy('blog_category','ASC')->get();

    $blogs = App\Models\Blog::latest()->get();
    $popularBlogs = App\Models\Blog::with('editorChoice') // Include editor's choice relationship if you have one
        ->orderBy('views_count', 'desc') // Order by views_count in descending order
        ->take(5) // Get the top 5 popular blogs
        ->get();
        $editorChoiceBlogs = App\Models\EditorChoice::with('blog')->latest()->get()->take(4);
@endphp


    <div>
        <div class="container">
            <div class="news-area">
                <div class="title">Breaking News :</div>
                <div class="news-wrap">
                    <div class="row slick-marquee">
                     @foreach ($editorChoiceBlogs as $editorchoice)
                        <div class="col-auto">
                            <a href="{{ route('blog.details',$editorchoice->blog->id)}}" class="breaking-news">{{ $editorchoice->blog->blog_title }}</a>
                        </div>
                     @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div><!--==============================
Blog Area  
==============================-->

<div  class="space" class="">
   <div class="container">
       <div class="row align-items-center">
           <div class="col">
               <h2 class="sec-title has-line">Trending News</h2>
           </div>
           <div class="col-auto">
               <div class="sec-btn">
                   <div class="icon-box">
                       <button data-slick-prev="#blog-slide1" class="slick-arrow default"><i class="far fa-arrow-left"></i></button>
                       <button data-slick-next="#blog-slide1" class="slick-arrow default"><i class="far fa-arrow-right"></i></button>
                   </div>
               </div>
           </div>
       </div>
       <div class="row th-carousel" id="blog-slide1" data-slide-show="4" data-lg-slide-show="3" data-md-slide-show="2" data-sm-slide-show="2">
         @foreach ($popularBlogs as $popularItem)
           <div class="col-sm-6 col-xl-4">
               <div class="blog-style1">
                   <div class="blog-img">
                       <img src="{{ asset($popularItem->blog_image)}}" alt="blog image">
                     
                   </div>
                   <h3 class="box-title-22"><a class="hover-line" href="{{ route('blog.details',$popularItem->id)}}">{{$popularItem->blog_title}}</a></h3>
                   <div class="blog-meta">
                       <a href="{{ route('blog.details',$popularItem->id)}}"><i class="far fa-user"></i>By - Tnews</a>
                       <a href="{{ route('blog.details',$popularItem->id)}}"><i class="fal fa-calendar-days"></i>{{ Carbon\Carbon::parse($popularItem->created_at)->format('F j, Y')}}</a>
                   </div>
               </div>
           </div>
           @endforeach
       </div>
   </div>
</div>



<!-- tp-slider-area-start -->
{{-- <div class="tp-hero-area hero-grideant-bg" data-background="{{ asset('frontend/assets/img/slider/slider-grident-bg.png') }}">
    <div class="container">
       <div class="row align-items-center hero-space">
          <div class="col-xl-6 col-lg-6">
             <div class="tp-hero">
                <div class="tp-hero__section-box">
                   <h4 class="tp-section-subtitle  wow tpfadeUp" data-wow-duration=".7s" data-wow-delay=".3s">We offer the best solutions</h4>
                   <h1 class="tp-slider-title wow tpfadeUp" data-wow-duration=".7s" data-wow-delay=".6s">{{ $homeslide->title }}</h1>
                   <p class="wow tpfadeUp" data-wow-duration=".7s" data-wow-delay=".8s">{{ $homeslide->short_title }}</p>
                </div>
                <div class="tp-hero__wrapper d-flex align-items-center wow tpfadeUp" data-wow-duration=".7s" data-wow-delay="1s">
                   <div class="tp-hero__button">
                      <a class="tp-btn" href="{{ route('home.portfolio') }}">Case Studies</a>
                   </div>
                   <div class="tp-hero__play-button">
                      <a class="popup-video" href="{{ $homeslide->video_url }}"><i
                            class="fas fa-play"></i></a>
                      <span>See Inside</span>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-xl-6 col-lg-6">
             <div class="tp-hero__wrapper-thumb p-relative"> --}}
                {{-- <div class="tp-hero-shape-one">
                   <img src="{{ asset('frontend/assets/img/slider/hero-star-shape.png') }} "  alt="">
                </div>
                <div class="tp-hero-shape-two">
                   <img src="{{ asset('frontend/assets/img/slider/hero-circle-shape.png ') }}" alt="">
                </div>
                <div class="tp-hero-shape-three">
                   <img src="{{ asset('frontend/assets/img/slider/hero-angel-shape.png') }} "  alt="">
                </div>
                <div class="tp-hero-shape-four">
                   <img src="{{ asset('frontend/assets/img/slider/hero-star-sm-shape.png') }}" alt="">
                </div> --}}
                {{-- <div class="tp-hero__thumb text-start text-lg-end wow tpfadeRight"  data-wow-duration=".9s" data-wow-delay="1.2s">
                   <img src="{{ asset($homeslide->home_slide) }}" alt="">
                </div>
             </div>
          </div>
       </div>
       <div class="row">
          <div class="col-xl-5 col-lg-5 wow tpfadeUp" data-wow-duration=".7s" data-wow-delay=".3s">
             <div class="tp-slider-exprience">
                <div class="tp-slider-exprience__content">
                   <h4 class="tp-slider-exp-title">Half a Decade of Experience</h4>
                   <p>“We believe every brand can gain a competitive advantage in this digital world, it doesn't matter where you are”</p>
                </div>
                <div class="tp-slider-exprience__client-info d-flex align-items-center">
                   <div class="tp-slider-exprience__img">
                      <img style="height: 70px;" src="{{ asset('frontend/assets/img/slider/Danny.jpg') }}" alt="">
                   </div>
                   <div class="tp-slider-exprience__meta">
                      <h5 class="tp-client-name">Danny Mulyansalu</h5>
                      <span>Founder of (Yamfumu <i class="fas fa-star"></i> - 5 star Agency)</span>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-xl-7 col-lg-7">
             <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 wow tpfadeUp" data-wow-duration=".7s" data-wow-delay=".5s">
                   <div class="tp-slider-exp-item mb-30">
                      <div class="tp-slider-exp-item__icon icon-bg-green">
                         <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_289_84)">
                               <path
                                  d="M23.2969 0H20.4375C20.0489 0 19.7344 0.314484 19.7344 0.703125V1.40625H13.9799C13.6886 0.589594 12.9155 0 12 0C11.0845 0 10.3114 0.589594 10.0201 1.40625H4.26562V0.703125C4.26562 0.314484 3.95114 0 3.5625 0H0.703125C0.314484 0 0 0.314484 0 0.703125V3.51562C0 3.90427 0.314484 4.21875 0.703125 4.21875H3.5625C3.95114 4.21875 4.26562 3.90427 4.26562 3.51562V2.80312H7.15331C4.71314 4.32755 3.10416 7.005 2.91183 10.0038C2.06817 10.28 1.45312 11.0653 1.45312 12C1.45312 13.1632 2.39934 14.1094 3.5625 14.1094C4.72566 14.1094 5.67188 13.1632 5.67188 12C5.67188 11.1028 5.10652 10.34 4.31531 10.0356C4.55522 6.69225 6.88809 3.87431 10.1331 3.07031C10.4841 3.74892 11.1847 4.21875 12 4.21875C12.8153 4.21875 13.5159 3.74892 13.8669 3.07031C17.1119 3.87427 19.4448 6.6922 19.6847 10.0356C18.8935 10.34 18.3281 11.1028 18.3281 12C18.3281 13.1632 19.2743 14.1094 20.4375 14.1094C21.6007 14.1094 22.5469 13.1632 22.5469 12C22.5469 11.0653 21.9318 10.28 21.0882 10.0038C20.8958 7.005 19.2869 4.33692 16.8467 2.8125H19.7344V3.51562C19.7344 3.90427 20.0489 4.21875 20.4375 4.21875H23.2969C23.6855 4.21875 24 3.90427 24 3.51562V0.703125C24 0.314484 23.6855 0 23.2969 0Z"
                                  fill="currentColor" />
                               <path
                                  d="M16.7835 23.1279C16.4157 22.0025 15.3561 21.1406 14.1093 21.1406H9.89052C8.64365 21.1406 7.58408 22.0025 7.2163 23.1279C7.07451 23.5618 7.44365 24 7.90021 24H16.0996C16.5561 24 16.9253 23.5618 16.7835 23.1279Z"
                                  fill="currentColor" />
                               <path
                                  d="M18.21 14.4225L12.7031 6.16217V12.8327C13.5198 13.1239 14.1094 13.8971 14.1094 14.8125C14.1094 15.9757 13.1632 16.9219 12 16.9219C10.8369 16.9219 9.89063 15.9757 9.89063 14.8125C9.89063 13.8971 10.4802 13.1239 11.2969 12.8327V6.16217L5.79001 14.4225C5.60391 14.7013 5.64099 15.0728 5.8779 15.3097C7.16869 16.6005 7.99379 18.2634 8.31221 20.0471C8.80065 19.849 9.33188 19.7344 9.89063 19.7344H14.1094C14.6681 19.7344 15.1994 19.8489 15.6878 20.047C16.0062 18.2632 16.8313 16.6005 18.1221 15.3097C18.359 15.0728 18.3961 14.7013 18.21 14.4225Z"
                                  fill="currentColor" />
                               <path
                                  d="M12 14.1094C11.6121 14.1094 11.2969 14.4246 11.2969 14.8125C11.2969 15.2004 11.6121 15.5156 12 15.5156C12.3879 15.5156 12.7031 15.2004 12.7031 14.8125C12.7031 14.4246 12.3879 14.1094 12 14.1094Z"
                                  fill="currentColor" />
                            </g>
                            <defs>
                               <clipPath id="clip0_289_84">
                                  <rect width="24" height="24" fill="currentColor" />
                               </clipPath>
                            </defs>
                         </svg>
                      </div>
                      <div class="tp-slider-exp-item__content">
                         <h4 class="tp-exp-sm-title">Service we can <br> help you with</h4>
                      </div>
                      <div class="tp-slider-exp-item__service-link">
                         <div class="tp-link tp-link-green">
                            <a href="{{ route('home.services') }}">
                               <svg width="34" height="16" viewBox="0 0 34 16" fill="none"
                                  xmlns="http://www.w3.org/2000/svg">
                                  <path
                                     d="M33.7071 8.70711C34.0976 8.31659 34.0976 7.68342 33.7071 7.2929L27.3431 0.928935C26.9526 0.53841 26.3195 0.53841 25.9289 0.928934C25.5384 1.31946 25.5384 1.95262 25.9289 2.34315L31.5858 8L25.9289 13.6569C25.5384 14.0474 25.5384 14.6805 25.9289 15.0711C26.3195 15.4616 26.9526 15.4616 27.3431 15.0711L33.7071 8.70711ZM-8.74228e-08 9L33 9L33 7L8.74228e-08 7L-8.74228e-08 9Z"
                                     fill="#202026" />
                               </svg>
                               <span>Our Service</span>
                            </a>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 wow tpfadeUp" data-wow-duration=".7s" data-wow-delay=".7s">
                   <div class="tp-slider-exp-item mb-30">
                      <div class="tp-slider-exp-item__icon">
                         <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_289_84)">
                               <path
                                  d="M23.2969 0H20.4375C20.0489 0 19.7344 0.314484 19.7344 0.703125V1.40625H13.9799C13.6886 0.589594 12.9155 0 12 0C11.0845 0 10.3114 0.589594 10.0201 1.40625H4.26562V0.703125C4.26562 0.314484 3.95114 0 3.5625 0H0.703125C0.314484 0 0 0.314484 0 0.703125V3.51562C0 3.90427 0.314484 4.21875 0.703125 4.21875H3.5625C3.95114 4.21875 4.26562 3.90427 4.26562 3.51562V2.80312H7.15331C4.71314 4.32755 3.10416 7.005 2.91183 10.0038C2.06817 10.28 1.45312 11.0653 1.45312 12C1.45312 13.1632 2.39934 14.1094 3.5625 14.1094C4.72566 14.1094 5.67188 13.1632 5.67188 12C5.67188 11.1028 5.10652 10.34 4.31531 10.0356C4.55522 6.69225 6.88809 3.87431 10.1331 3.07031C10.4841 3.74892 11.1847 4.21875 12 4.21875C12.8153 4.21875 13.5159 3.74892 13.8669 3.07031C17.1119 3.87427 19.4448 6.6922 19.6847 10.0356C18.8935 10.34 18.3281 11.1028 18.3281 12C18.3281 13.1632 19.2743 14.1094 20.4375 14.1094C21.6007 14.1094 22.5469 13.1632 22.5469 12C22.5469 11.0653 21.9318 10.28 21.0882 10.0038C20.8958 7.005 19.2869 4.33692 16.8467 2.8125H19.7344V3.51562C19.7344 3.90427 20.0489 4.21875 20.4375 4.21875H23.2969C23.6855 4.21875 24 3.90427 24 3.51562V0.703125C24 0.314484 23.6855 0 23.2969 0Z"
                                  fill="currentColor" />
                               <path
                                  d="M16.7835 23.1279C16.4157 22.0025 15.3561 21.1406 14.1093 21.1406H9.89052C8.64365 21.1406 7.58408 22.0025 7.2163 23.1279C7.07451 23.5618 7.44365 24 7.90021 24H16.0996C16.5561 24 16.9253 23.5618 16.7835 23.1279Z"
                                  fill="currentColor" />
                               <path
                                  d="M18.21 14.4225L12.7031 6.16217V12.8327C13.5198 13.1239 14.1094 13.8971 14.1094 14.8125C14.1094 15.9757 13.1632 16.9219 12 16.9219C10.8369 16.9219 9.89063 15.9757 9.89063 14.8125C9.89063 13.8971 10.4802 13.1239 11.2969 12.8327V6.16217L5.79001 14.4225C5.60391 14.7013 5.64099 15.0728 5.8779 15.3097C7.16869 16.6005 7.99379 18.2634 8.31221 20.0471C8.80065 19.849 9.33188 19.7344 9.89063 19.7344H14.1094C14.6681 19.7344 15.1994 19.8489 15.6878 20.047C16.0062 18.2632 16.8313 16.6005 18.1221 15.3097C18.359 15.0728 18.3961 14.7013 18.21 14.4225Z"
                                  fill="currentColor" />
                               <path
                                  d="M12 14.1094C11.6121 14.1094 11.2969 14.4246 11.2969 14.8125C11.2969 15.2004 11.6121 15.5156 12 15.5156C12.3879 15.5156 12.7031 15.2004 12.7031 14.8125C12.7031 14.4246 12.3879 14.1094 12 14.1094Z"
                                  fill="currentColor" />
                            </g>
                            <defs>
                               <clipPath>
                                  <rect width="24" height="24" fill="currentColor" />
                               </clipPath>
                            </defs>
                         </svg>
                      </div>
                      <div class="tp-slider-exp-item__content">
                         <h4 class="tp-exp-sm-title">Why you should choose us </h4>
                      </div>
                      <div class="tp-slider-exp-item__service-link">
                         <div class="tp-link">
                            <a href="{{ route('home.about') }}">
                               <svg width="34" height="16" viewBox="0 0 34 16" fill="none"
                                  xmlns="http://www.w3.org/2000/svg">
                                  <path
                                     d="M33.7071 8.70711C34.0976 8.31659 34.0976 7.68342 33.7071 7.2929L27.3431 0.928935C26.9526 0.53841 26.3195 0.53841 25.9289 0.928934C25.5384 1.31946 25.5384 1.95262 25.9289 2.34315L31.5858 8L25.9289 13.6569C25.5384 14.0474 25.5384 14.6805 25.9289 15.0711C26.3195 15.4616 26.9526 15.4616 27.3431 15.0711L33.7071 8.70711ZM-8.74228e-08 9L33 9L33 7L8.74228e-08 7L-8.74228e-08 9Z"
                                     fill="#202026" />
                               </svg>
                               <span>About us</span>
                            </a>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div> --}}
 <!-- tp-slider-area-end -->
