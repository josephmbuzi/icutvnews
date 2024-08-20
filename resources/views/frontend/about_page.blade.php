@extends('frontend.main_master')


@section('canonical')
    <link rel="canonical" href="{{ url('/about') }}">
    @endsection
@section('og:url')
    <link rel="og:url" href="{{ url('/about') }}">
@endsection
@section('title', 'About Yamfumu | Unleashing Digital Innovation - Website & App Design, Digital Marketing, Motion Graphics.')
@section('description','Discover the story behind Yamfumu Technologies – a team passionate about merging creativity with technology. Learn about our vision, values, and unwavering commitment to delivering digital excellence.')
@section('keywords','About Yamfumu, Digital Innovation, Website & App Design Expertise, Learn About Our Services, Digital Marketing Strategies, Motion Graphics Expertise, Shaping the Digital Landscape, Our Story, Expertise in Digital Services, Learn About Our Team')
@php
    $aboutpage = App\Models\About::find(1);
    $teams = App\Models\Team::oldest()->get();
    $allMultiImage = App\Models\MultiImage::all();
    $homeslide = App\Models\HomeSlide::find(1);
    $allfooter = App\Models\Footer::find(1);

@endphp
@section('image', $aboutpage->about_image)

@section('main')


    <div class="breadcumb-wrapper">
        <div class="container">
            <ul class="breadcumb-menu">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>About Us</li>
            </ul>
        </div>
    </div><!--==============================
About Area  
==============================-->
    <div class="space2" id="about-sec">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-7 mb-30 mb-xl-0">
                    <div class="img-box1">
                        <div class="img1">
                            <img src="{{ asset($aboutpage->about_image) }}" height="468" width="358" alt="About">
                        </div>
                        <div class="img2">
                            <img src="{{ asset('frontend/assets/img/normal/about_1_2.jpg')}}" alt="Image">
                        </div>
                        <a href="https://www.youtube.com/watch?v=_sI_Ps7JSEk" class="icon-btn popup-video"><i class="fas fa-play"></i></a>
                    </div>
                </div>
                <div class="col-xl-5">
                    <div class="title-area mb-32">
                        <span class="sub-title">About Us</span>
                        <h2 class="sec-title2">{{ $aboutpage->short_title }}</h2>
                        <p class="sec-text">{{ $aboutpage->short_description }}</p>
                    </div>
                    <div class="checklist mt-n2 mb-35">
                        <ul>
                            <li><i class="far fa-check-circle"></i> Business News</li>
                            <li><i class="far fa-check-circle"></i> Trending News</li>
                            <li><i class="far fa-check-circle"></i> Entertainment</li>
                        </ul>
                    </div>
                    <a href="about.html" class="th-btn">About More<i class="fas fa-arrow-up-right ms-2"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div>
      <div class="container">
          <div class="title-area text-center">
              <span class="sub-title">Our Team</span>
              <h2 class="sec-title2">Great Team To Keep You Updated</h2>
          </div>

      </div>
  </div>

  <section >
   <div class="container">
       <div class="row gy-30">
           <!-- Single Item -->
           @foreach ($teams as $item)
           <div class="col-sm-6 col-lg-4 col-xl-3">
            <div class="team-card">
                <div class="box-img">
                    <img src="{{ asset($item->team_image) }}" alt="Team">
                    <div class="th-social">
                        <a target="_blank" href="https://facebook.com/"><i class="fab fa-facebook-f"></i></a>
                        <a target="_blank" href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                        <a target="_blank" href="https://instagram.com/"><i class="fab fa-instagram"></i></a>
                        <a target="_blank" href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <h3 class="box-title"><a href="{{ route('team.details',$item->id)}}">{{ $item->team_name }}</a></h3>
                <p class="box-text">{{ $item->team_position }}</p>
            </div>
        </div>
           @endforeach
           
       </div>
   </div>
</section>
<!-- breadcrumb area start -->
{{-- <section class="breadcrumb__area breadcrumb-height include-bg p-relative"
data-background="{{ asset('frontend/assets/img/breadcrumb/breadcurmb.jpg') }}">
<div class="container">
   <div class="row">
      <div class="col-xxl-12">
         <div class="breadcrumb__content">
            <h3 class="breadcrumb__title wow tpfadeUp" data-wow-duration=".7s" data-wow-delay=".5s">About
               Yamfumu</h3>
            <div class="breadcrumb__list wow tpfadeUp" data-wow-duration=".9s">
               <span><a href="{{ route('home') }}">Home</a></span>
               <span class="dvdr"><i class="fa fa-angle-right"></i></span>
               <span>About us</span>
            </div>
         </div>
      </div>
   </div>
</div>
</section> --}}
<!-- breadcrumb area end -->

<!-- tp-about-area-start -->
{{-- <div class="tp-about-us-area pt-120 pb-120">
<div class="container">
   <div class="row">
      <div class="col-xl-5 col-lg-6 wow tpfadeLeft" data-wow-duration=".7s" data-wow-delay=".5s">
         <div class="ab-inner-content">
            <h4 class="ab-title-xs mb-25">{{ $aboutpage->short_title }}</h4>
            <p>{{ $aboutpage->short_description }}</p>
            <div class="tp-inner-list">
               <ul>

               </ul>
            </div>
         </div>
      </div>
      <div class="col-xl-7 col-lg-6 wow tpfadeRight" data-wow-duration=".7s" data-wow-delay=".8s">
         <div class="tp-img-inner text-end">
            <div class="row gx-3">
               <div class="col-xl-7 col-lg-6 col-md-7 col-7">
                  <div class="ab-inner-img">
                     <img src="{{ asset($aboutpage->about_image) }}" alt="">
                  </div>
               </div>
               <div class="col-xl-5 col-lg-6 col-md-5 col-5">
                  <div class="ab-inner-img mb-20">
                     <img src="{{ asset('frontend/assets/img/about/ab-inner-2.jpg') }}" alt="">
                  </div>
                  <div class="ab-inner-img">
                     <img src="{{ asset('frontend/assets/img/about/ab-inner-3.jpg') }}" alt="">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div> --}}
<!-- tp-about-area-end -->
{{-- @include('frontend.home_all.brand_area')
<!-- tp-counter-area-strat -->
<div class="tp-counter-area pb-50">
<div class="container">
   <div class="row">
      <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-30 wow tpfadeUp" data-wow-duration=".7s"
         data-wow-delay=".5s">
         <div class="counter-item text-center">
            <h4><span class="counter">250</span>+</h4>
            <h3>Projects deliverd</h3>
         </div>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-30 wow tpfadeUp" data-wow-duration=".7s"
         data-wow-delay=".7s">
         <div class="counter-item text-center">
            <h4><span class="counter">5</span>+</h4>
            <h3>Years of operation</h3>
         </div>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-30 wow tpfadeUp" data-wow-duration=".7s"
         data-wow-delay=".9s">
         <div class="counter-item text-center">
            <h4><span class="counter">6</span>+</h4>
            <h3>Specialist Member</h3>
         </div>
      </div>

   </div>
</div>
</div> --}}
<!-- tp-counter-area-end -->
{{-- <div class="am-about-area pt-50 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="sv-details-content case-sapce-top sv-details-md-space mb-60">
                <h5 class="sv-details-title-sm pb-20">{{ $aboutpage->short_title }}</h5>
                <p>
                    {!!  $aboutpage->long_description  !!}
                </p>

                </div>
            </div>
            <div class="col-xl-12">
                <div class="sv-details-content sv-details-md-space">
                <h5 class="sv-details-title-sm pb-20">{{ $aboutpage->whyus_title }}</h5>
                <p>
                    {!!  $aboutpage->whyus_short_description  !!}
                </p>

                </div>
            </div>
        </div>
    </div>
</div> --}}





<!-- tp-team-area-start -->
{{-- <div class="tp-team-area pt-120 pb-70">
    <div class="container">
        <div class="row wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
            <div class="tp-team-section-area text-center mb-60">
               <h3 class="tp-section-subtitle">Our Team</h3>
               <h4 class="tp-section-title-sm">Meet with our team</h4>
            </div>
         </div>
       <div class="row">
        @foreach ($teams as $item)@endforeach
            <div class="col-xl-3 col-lg-3 col-md-6 mb-60 wow tpfadeUp" data-wow-duration=".7s" data-wow-delay=".3s">
                <div class="tp-team team-inner text-center">
                <div class="tp-team-thumb p-relative">
                    <img src="{{ asset($item->team_image) }}" alt="">
                    <div class="tp-team-thumb-icon">
                        <a href="{{ route('team.details',$item->id)}}"><i class="far fa-long-arrow-right"></i></a>
                    </div>
                </div>
                <div class="tp-team-content">
                    <h4 class="tp-team-title"><a href="{{ route('team.details',$item->id)}}">{{ $item->team_name }}</a></h4>
                    <span>{{ $item->team_position }}</span>
                </div>
                <div class="tp-team-social">
                    <a href="{{ $item->team_fb }}"><i class="fab fa-facebook-f"></i></a>
                    <a href="{{ $item->team_twitter }}"><i class="fab fa-twitter"></i></a>
                    <a href="{{ $item->team_linkedin }}"><i class="fab fa-linkedin"></i></a>
                </div>
                </div>
            </div>
        @endforeach


       </div>
    </div>
 </div> --}}
<!-- tp-team-area-end -->

<!-- tp-testimonial-area-start -->
{{-- <div class="tp-testimonial-area grey-bg pt-120 pb-120 fix">
<div class="container-fluid">
   <div class="row g-0 justify-content-center">
      <div class="col-xl-4 wow tpfadeUp" data-wow-duration=".7s" data-wow-delay=".5s">
         <div class="tp-testtimonial-title-box mb-60 text-center">
            <h3 class="tp-section-subtitle">Testimonial</h3>
            <h3 class="tp-section-title-sm">Trusted by Clients.</h3>
         </div>
      </div>
   </div>
   <div class="testimonial-slide-wrapper">
      <div class="testimonial-active-three">
        @foreach ($testimonials as $item)

        @endforeach
            <div class="tp-testimonial-three text-center wow tpfadeUp" data-wow-duration=".7s"
                data-wow-delay=".6s">
                <div class="tp-testimonial-three__content">
                <div class="tp-testimonial-three__content-icon">
                    <i class="fas fa-quote-right"></i>
                </div>
                <div class="tp-testimonial-three__content-text">
                    <p>"{{ $item->testimonial }}"</p>
                </div>
                </div>
                <div class="tp-testimonial-three__user">
                <div class="tp-testimonial-three__user-img">
                    <img style="height: 100px; border-radius:50%;" src="{{ asset($item->client_image) }}" alt="">
                </div>
                <div class="tp-testimonial-three__user-content">
                    <h4 class="user-title">{{ $item->client_name }}</h4>
                    <span>{{ $item->client_position }}</span>
                </div>
                </div>
            </div>

      </div>
   </div>
</div>
</div> --}}
<!-- tp-testimonial-area-end -->

 <!-- tp-contact-area-start -->
 {{-- <div class="tp-contact-area grey-bg pb-120 wow tpfadeUp" data-wow-duration=".7s" data-wow-delay=".5s">
    <div class="container">
       <div class="tp-contact-wrapper p-relative">
          <div class="tp-contact-shape d-none d-xl-block">
             <img src="{{ asset('frontend/assets/img/cta/cta-1.png') }}" alt="">
          </div>
          <div class="row">
             <div class="col-xl-6 col-lg-6">
                <div class="contact-us-sction-box mb-60">
                   <h4 class="tp-section-subtitle">Contact me</h4>
                   <h3 class="tp-section-title-xs">Let’s Work <br> Together.</h3>
                </div>
                <div class="contact-info">
                   <div class="contact-info-item d-flex align-items-center">
                      <div class="contact-icon">
                         <img src="{{ asset('frontend/assets/img/contact/contact-1.png') }}" alt="">
                      </div>
                      <div class="contact-loaction">
                         <a href="https://maps.app.goo.gl/cZnGZx1bxr7u2r3y5"
                            target="_blank">{{ $allfooter->address }}</a>
                      </div>
                   </div>
                   <div class="contact-info-item d-flex align-items-center">
                      <div class="contact-icon">
                         <img src="{{ asset('frontend/assets/img/contact/contact-2.png') }}" alt="">
                      </div>
                      <div class="contact-loaction">
                         <a href="mailto:{{ $allfooter->email }}">{{ $allfooter->email }}</a>
                      </div>
                   </div>
                   <div class="contact-info-item d-flex align-items-center">
                      <div class="contact-icon">
                         <img src="{{ asset('frontend/assets/img/contact/contact-3.png') }}" alt="">
                      </div>
                      <div class="contact-loaction">
                         <a href="tel:{{ $allfooter->number }}">{{ $allfooter->number }}</a>
                      </div>
                   </div>
                </div>
             </div>
             <div class="col-xl-6 col-lg-6">
                <div class="tpcontact">
                   <div class="tpcontact__heading">
                      <h4 class="tp-contact-title mb-20">
                         <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                               d="M22.9201 9.11169C22.8196 9.00949 22.6998 8.92831 22.5678 8.87286C22.4355 8.81732 22.2936 8.78872 22.1502 8.78872C22.0068 8.78872 21.8649 8.81732 21.7326 8.87286C21.6005 8.92835 21.4806 9.0096 21.38 9.1119C21.3799 9.11199 21.3798 9.11209 21.3797 9.11219L13.2476 17.2717L13.2281 17.2913L13.2214 17.3182L12.7524 19.2026L12.7121 19.3644L12.8738 19.3238L14.7499 18.8526L14.7768 18.8459L14.7964 18.8262L22.9197 10.6577C22.9198 10.6577 22.9198 10.6576 22.9199 10.6575C23.0218 10.5565 23.1027 10.4361 23.1579 10.3035C23.2131 10.1708 23.2415 10.0283 23.2415 9.88451C23.2415 9.74067 23.2131 9.59826 23.1579 9.46552C23.1027 9.33298 23.0219 9.2127 22.9201 9.11169ZM22.9201 9.11169C22.92 9.11154 22.9198 9.11141 22.9197 9.11127L22.8493 9.18228L22.9206 9.11219C22.9204 9.11202 22.9203 9.11186 22.9201 9.11169ZM15.1768 0.100017L15.1774 0.100013C15.2807 0.0994136 15.383 0.11929 15.4786 0.158513C15.5742 0.197727 15.6612 0.255516 15.7345 0.328588C15.7345 0.328604 15.7345 0.328619 15.7346 0.328635L19.2738 3.88363C19.2738 3.88364 19.2738 3.88364 19.2738 3.88365C19.3465 3.95734 19.4041 4.04475 19.4432 4.1409C19.4823 4.23705 19.5021 4.34002 19.5015 4.4439V4.44448V6.22227C19.5015 6.43164 19.4187 6.63234 19.2715 6.78026C19.1242 6.92815 18.9246 7.01116 18.7166 7.01116C18.5086 7.01116 18.309 6.92815 18.1617 6.78026C18.0145 6.63234 17.9317 6.43164 17.9317 6.22227V4.80893V4.76764L17.9025 4.73837L14.8849 1.70725L14.8556 1.6778H14.814H2.78764C2.52627 1.6778 2.2757 1.7821 2.09102 1.9676C1.90636 2.15309 1.8027 2.40457 1.8027 2.66669V22.2223C1.8027 22.4845 1.90636 22.736 2.09102 22.9214C2.2757 23.1069 2.52627 23.2112 2.78764 23.2112H16.9467C17.2081 23.2112 17.4587 23.1069 17.6433 22.9214C17.828 22.736 17.9317 22.4845 17.9317 22.2223V20.4446C17.9317 20.2352 18.0145 20.0345 18.1617 19.8866C18.309 19.7387 18.5086 19.6557 18.7166 19.6557C18.9246 19.6557 19.1242 19.7387 19.2715 19.8866C19.4187 20.0345 19.5015 20.2352 19.5015 20.4446V22.2223C19.5015 22.9032 19.2323 23.5561 18.7531 24.0374C18.2739 24.5187 17.6242 24.789 16.9467 24.789H2.78764C2.1102 24.789 1.46042 24.5187 0.981261 24.0374C0.502089 23.5561 0.232813 22.9032 0.232813 22.2223V2.66669C0.232813 1.98583 0.502089 1.33293 0.981262 0.85162C1.46042 0.370323 2.1102 0.100015 2.78764 0.100015L15.1768 0.100017ZM23.819 11.949H23.8652L15.7349 20.1156C15.7348 20.1157 15.7347 20.1158 15.7346 20.1159C15.6326 20.2166 15.5051 20.2874 15.366 20.3206L15.3649 20.3209L11.8251 21.2098L11.8251 21.2098L11.8222 21.2106C11.6896 21.2481 11.5495 21.2499 11.416 21.2157C11.2825 21.1816 11.1602 21.1127 11.0615 21.016C10.9628 20.9192 10.8912 20.798 10.8539 20.6646C10.8166 20.5311 10.8149 20.3902 10.849 20.2559L10.8492 20.2554L11.7341 16.6998L11.7344 16.6987C11.7675 16.5587 11.8381 16.4306 11.9384 16.3281C11.9384 16.328 11.9385 16.3279 11.9386 16.3278L20.2388 7.99061L20.2389 7.99071L20.2425 7.98667C20.4848 7.7154 20.7795 7.4966 21.1088 7.34361C21.438 7.19062 21.7948 7.10664 22.1574 7.09677C22.52 7.08691 22.8807 7.15137 23.2177 7.28624C23.5547 7.4211 23.8608 7.62355 24.1174 7.88124C24.3739 8.13893 24.5755 8.44646 24.7098 8.78508C24.8441 9.12369 24.9084 9.48626 24.8985 9.85065C24.8887 10.215 24.8051 10.5736 24.6527 10.9044C24.5003 11.2352 24.2825 11.5313 24.0124 11.7747L23.819 11.949ZM4.00264 16.331C4.14988 16.1831 4.34949 16.1001 4.55752 16.1001H8.09729C8.30533 16.1001 8.50494 16.1831 8.65217 16.331C8.79943 16.4789 8.88224 16.6796 8.88224 16.889C8.88224 17.0984 8.79943 17.2991 8.65218 17.447C8.50494 17.5949 8.30533 17.6779 8.09729 17.6779H4.55752C4.34949 17.6779 4.14988 17.5949 4.00264 17.447C3.85539 17.2991 3.77258 17.0984 3.77258 16.889C3.77258 16.6796 3.85539 16.4789 4.00264 16.331ZM4.55752 5.43337H12.522C12.73 5.43337 12.9296 5.51638 13.0769 5.66428C13.2241 5.81219 13.3069 6.0129 13.3069 6.22227C13.3069 6.43164 13.2241 6.63234 13.0769 6.78026C12.9296 6.92815 12.73 7.01116 12.522 7.01116H4.55752C4.34949 7.01116 4.14988 6.92815 4.00264 6.78026C3.85539 6.63234 3.77258 6.43164 3.77258 6.22227C3.77258 6.0129 3.85539 5.81219 4.00264 5.66428C4.14988 5.51638 4.34949 5.43337 4.55752 5.43337ZM13.0769 10.9976C13.2241 11.1455 13.3069 11.3463 13.3069 11.5556C13.3069 11.765 13.2241 11.9657 13.0769 12.1136C12.9296 12.2615 12.73 12.3445 12.522 12.3445H4.55752C4.34949 12.3445 4.14988 12.2615 4.00264 12.1136C3.85539 11.9657 3.77258 11.765 3.77258 11.5556C3.77258 11.3463 3.85539 11.1455 4.00264 10.9976C4.14988 10.8497 4.34949 10.7667 4.55752 10.7667H12.522C12.73 10.7667 12.9296 10.8497 13.0769 10.9976Z"
                               fill="#171717" stroke="#0F0F0F" stroke-width="0.2" />
                         </svg>
                         Fill the form
                      </h4>
                   </div>
                   <div class="tpcontact__form">
                    <form action="{{ route('store.message') }}" method="post">
                        @csrf
                        <input name="name" type="name" placeholder="Enter your name">
                        <input name="email" type="email" placeholder="Enter you mail">
                        <input nname="phone" type="phone" placeholder="Enter you phone number">
                        <input name="service" type="text" placeholder="Subject">
                        <textarea name="message" placeholder="Enter your message"></textarea>
                      </form>
                      <button class="tp-btn" type="submit">Let,s Talk</button>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div> --}}
 <!-- tp-contact-area-end -->
<!-- tp-social-area-start -->
{{-- @include('frontend.home_all.link_scroll') --}}
<!-- tp-social-area-end -->
@endsection
