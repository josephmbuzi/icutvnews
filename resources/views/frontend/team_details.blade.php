@extends('frontend.main_master')


@section('canonical')
    <link rel="canonical" href="{{ url('team/details' . $teams->id) }}">
@endsection
@section('og:url')
    <link rel="og:url" href="{{ url('team/details' . $teams->id) }}">
@endsection

@section('title', $teams->team_name . ' | ICU TV News')
@section('description', 'ICU TV News')
@section('keywords', $teams->team_name .', ICU TV News')




@section('image', asset($teams->team_image))

@section('main')



<div class="breadcumb-wrapper">
   <div class="container">
       <ul class="breadcumb-menu">
           <li><a href="home-newspaper.html">Home</a></li>
           <li><a href="category.html">Team</a></li>
           <li>{{ $teams->team_name }}</li>
       </ul>
   </div>
</div><!--==============================
Blog Area  
==============================-->
<section class="space space-extra-bottom">
   <div class="container">
       <div class="row">
           <div class="col-xl-8">
               <div class="">
                   <div class="mb-4 border-blog ">
                       <div class="blog-style4">
                           <div class="blog-img w-270">
                               <img src="{{ asset('frontend/assets/img/blog/blog_6_3_1.jpg')}}" alt="blog image">
                           </div>
                           <div class="blog-content">
                               <a data-theme-color="#6234AC" href="blog.html" class="category">Gadget</a>
                               <h3 class="box-title-22"><a class="hover-line" href="blog-details.html">Tech brilliance, forging a path to a smarter connected universe.</a></h3>
                               <div class="blog-meta">
                                   <a href="author.html"><i class="far fa-user"></i>By - Tnews</a>
                                   <a href="blog.html"><i class="fal fa-calendar-days"></i>13 Mar, 2023</a>
                               </div>
                               <a href="blog-details.html" class="th-btn style2">Read More<i class="fas fa-arrow-up-right ms-2"></i></a>
                           </div>
                       </div>
                   </div>

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
                               <img src="{{ asset($teams->team_image) }}" alt="Image">
                           </div>
                           <div class="author-content">
                               <h3 class="box-title-24">{{ $teams->team_name }}</h3>
                               <div class="info-wrap">
                                   <span class="info">{{ $teams->team_position }}</span>
                                   <span class="info"><strong>Post: </strong>38</span>
                               </div>
                               <p class="author-bio">{!! $teams->team_desc !!}</p>
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
                                   <a href="{{ $teams->team_fb }}"><i class="fab fa-facebook-f"></i></a>
                                   <a href="{{ $teams->team_twitter }}"><i class="fab fa-twitter"></i></a>
                                   <a href="{{ $teams->team_linkedin }}"><i class="fab fa-linkedin-in"></i></a>
                               </div>
                           </div>
                       </div>
                   </div>
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
                    <h3 class="breadcrumb__title wow tpfadeUp" data-wow-duration=".7s" data-wow-delay=".5s">Yamfumu Team</h3>
                    <div class="breadcrumb__list wow tpfadeUp" data-wow-duration=".9s">
                       <span><a href="#">Home</a></span>
                       <span class="dvdr"><i class="fa fa-angle-right"></i></span>
                       <span>About {{ $teams->team_name }}</span>
                     </div>
                 </div>
              </div>
           </div>
        </div>
        </section> --}}
        <!-- breadcrumb area end -->

        <!-- tp-abou-me-area-start -->
        {{-- <div class="am-about-area pt-110 pb-80">
           <div class="container">
              <div class="row">
                 <div class="col-xl-12 wow tpfadeUp" data-wow-duration=".7s" data-wow-delay=".5s">
                    <div class="ac-ab-img p-relative fix">
                       <img src="{{ asset($teams->team_image) }}" alt="{{ $teams->team_name }}">
                       <div class="tp-inner-play-button">
                          <a class="popup-video" href="https://www.youtube.com/watch?v=wnlK41gHuMk"><i class="fas fa-play"></i></a>
                       </div>
                    </div>
                 </div>
              </div>
              <div class="row ab-info-space">
                 <div class="col-xl-4 col-lg-4 col-md-5 col-sm-12 mb-40 wow tpfadeUp" data-wow-duration=".7s" data-wow-delay=".7s">
                    <div class="amaboutinfo">
                       <div class="amaboutinfo__client-info">
                          <h4>{{ $teams->team_name }}</h4>
                          <span>{{ $teams->team_position }}</span>
                          <p><b>Experience:</b> {{ $teams->team_exp }} Years</p>
                       </div>
                    </div>
                 </div>

                 <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12 mb-40 wow tpfadeUp" data-wow-duration=".7s" data-wow-delay="1s">
                    <div class="amaboutsocial text-start text-md-end">
                       <div class="amaboutsocial__icon mb-30">
                          <a href="{{ $teams->team_fb }}" class="si-btn-link">
                             <div class="tp-si-wrapper d-flex justify-content-end">
                                <div class="tp-si__text"><span>Facebook</span></div>
                                <div class="tp-si__icon"><i class="fab fa-facebook-f"></i></div>
                             </div>
                          </a>
                       </div>
                       <div class="amaboutsocial__icon mb-30">
                          <a href="{{ $teams->team_twitter }}" class="si-btn-link">
                             <div class="tp-si-wrapper d-flex justify-content-end">
                                <div style="color: black;" class="tp-si__text "><span>Twitter (X)</span></div>
                                <div class="tp-si__icon "><i class="fab fa-twitter"></i></div>
                             </div>
                          </a>
                       </div>
                       <div class="amaboutsocial__icon mb-30">
                          <a href="{{ $teams->team_linkedin }}" class="si-btn-link">
                             <div class="tp-si-wrapper d-flex justify-content-end">
                                <div class="tp-si__text  tp-si-color-2"><span>LinkedIn</span></div>
                                <div class="tp-si__icon  tp-si-color-2"><i class="fab fa-linkedin"></i></div>
                             </div>
                          </a>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div> --}}
        <!-- tp-about-me-area-end -->

        <!-- exprience-area-start -->
        {{-- <div class="tp-skill-area wow tpfadeUp" data-wow-duration=".7s" data-wow-delay=".7s">
           <div class="container">
              <div class="row">
                 <div class="col-xl-12">
                    <div class="amskill">
                       <div class="amskill__title">
                          <h3 class="am-skill-title">Who is {{ $teams->team_name }}</h3>
                          <p class="pb-10"> {!! $teams->team_desc !!}
                          </p>

                       </div>
                    </div>
                 </div>
              </div>
              <div class="row feature-bottom-space">
                 <div class="col-xl-4 col-lg-4">
                    <div class="amfeature">
                       <div class="amfeature__item">
                          <h4 class="am-skill-sm-title">Skills</h4>
                          <p class=" am-p-space-1">{{ $teams->team_skills }}</p>
                       </div>

                    </div>
                 </div>
                 <div class="col-xl-4 col-lg-4">
                    <div class="amfeature am-fea-space">
                       <div class="amfeature__item">
                          <h4 class="am-skill-sm-title">Education</h4>
                          <p class=" am-p-space-2">{{ $teams->team_guide }}</p>
                       </div>

                    </div>
                 </div>

              </div>
           </div>
        </div> --}}
        <!-- exprience-area-end -->





        <!-- tp-social-area-start -->
        {{-- @include('frontend.home_all.link_scroll') --}}
        <!-- tp-social-area-end -->


@endsection
