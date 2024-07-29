@extends('frontend.main_master')
@section('main')


@section('canonical')
    <link rel="canonical" href="{{ url('/contact') }}">
@endsection
@section('og:url')
    <link rel="og:url" href="{{ url('/contact') }}">
@endsection
@section('title', 'ICU TV News')
@section('description','ICU TV News')
@section('keywords','ICU TV News')
@php
    $aboutpage = App\Models\About::find(1);
    $allfooter = App\Models\Footer::find(1);

@endphp
@section('image', asset($aboutpage->about_image))




<div class="breadcumb-wrapper">
   <div class="container">
       <ul class="breadcumb-menu">
           <li><a href="{{ route('home')}}">Home</a></li>
           <li>Contact Us</li>
       </ul>
   </div>
</div>

<div class="space2">
   <div class="container">
       <div class="row">
           <div class="col-xl-5">
               <div class="pe-xxl-4 me-xl-3 text-center text-xl-start mb-40 mb-lg-0">
                   <div class="title-area mb-32">
                       <h2 class="sec-title2">Get in Touch</h2>
                       <p class="sec-text">With information and communications university news team.</p>
                   </div>
                   <div class="contact-feature-wrap">
                       <div class="contact-feature">
                           <div class="box-content">
                               <h3 class="box-title-22">Our Address</h3>
                               <p class="box-text">{{ $allfooter->address }} </p>
                           </div>
                       </div>
                       <div class="contact-feature">
                           <div class="box-content">
                               <h3 class="box-title-22">Email Address</h3>
                               <p class="box-text">
                                   <a href="mailto:{{ $allfooter->email }}">{{ $allfooter->email }}</a>
                               </p>
                           </div>
                       </div>
                       <div class="contact-feature">
                           <div class="box-content">
                               <h3 class="box-title-22">Phone Number</h3>
                               <p class="box-text">
                                   <a href="tel:{{ $allfooter->number }}">{{ $allfooter->number }}</a>
                               </p>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <div class="col-xl-7">
               <div class="quote-form-box">
                   <h4 class="form-title">Send Message</h4>
                   <form action="{{ route('store.message') }}" method="post" class="contact-form ajax-contact">
                     @csrf
                       <div class="row">
                           <div class="form-group col-md-6">
                               <input name="name" type="name" class="form-control"  placeholder="Your Name">
                           </div>
                           <div class="form-group col-md-6">
                               <input name="email" type="email" class="form-control" placeholder="Email Address">
                           </div>
                           
                           <div class="form-group col-md-6">
                               <input nname="phone" type="phone" class="form-control" placeholder="Phone Number">
                           </div>
                           <div class="form-group col-md-6">
                              <input name="service" type="text" class="form-control" placeholder="Subject">
                          </div>
                           <div class="form-group col-12">
                               <textarea name="message" cols="30" rows="3" class="form-control" placeholder="Your Message"></textarea>
                           </div>
                           <div class="form-btn col-12">
                               <button class="th-btn" type="submit">Submit Now</i></button>
                           </div>
                       </div>
                       {{-- <button class="tp-btn" type="submit">Send Message</button> --}}
                   </form>
               </div>
           </div>
       </div>
   </div>
</div>

      <!-- breadcrumb area start -->
      {{-- <section class="breadcrumb__area breadcrumb-height include-bg p-relative" data-background="{{ asset('frontend/assets/img/breadcrumb/breadcurmb.jpg') }}">
        <div class="container">
           <div class="row">
              <div class="col-xxl-12">
                 <div class="breadcrumb__content">
                    <h3 class="breadcrumb__title">Contact us</h3>

                    <div class="breadcrumb__list wow tpfadeUp" data-wow-duration=".9s">
                       <span><a href="{{ route('home') }}">Home</a></span>
                       <span class="dvdr"><i class="fa fa-angle-right"></i></span>
                       <span>Contact Us</span>
                     </div>
                 </div>
              </div>
           </div>
        </div>
     </section> --}}
     <!-- breadcrumb area end -->


     <!-- contact area start -->
     {{-- <div class="tp-contact-area pt-130 pb-130">
        <div class="container">
           <div class="row g-0 align-items-center justify-content-center">
              <div class="col-xl-4 col-lg-4 col-md-5 col-12">
                 <div class="contact-box">
                    <div class="contact-box-circle">
                       <span>O</span>
                       <span>R</span>
                    </div>
                    <h3 class="contact-box__title">Contact <br> Directly</h3>
                    <div class="contact-box__info-list">
                       <ul>
                          <li><a href="tel:{{ $allfooter->number }}"><i class="fal fa-phone-alt"></i> {{ $allfooter->number }}</a></li>
                          <li><a href="https://maps.app.goo.gl/cZnGZx1bxr7u2r3y5" target="_blank"><i class="fal fa-map-marker-alt"></i></a></li>
                          <li><a href="mailto:{{ $allfooter->email }}"><i class="fal fa-globe"></i>{{ $allfooter->email }}</a></li>
                       </ul>
                    </div>
                    <div class="contact-box__social">
                       <ul>
                          <li><a href="{{ $allfooter->instagram }}"><i class="fab fa-instagram"></i></a></li>
                          <li><a href="{{ $allfooter->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                          <li><a href="{{ $allfooter->behance }}"><i class="fab fa-behance"></i></a></li>
                          <li><a href="{{ $allfooter->linkedin }}"><i class="fab fa-linkedin"></i></a></li>
                          <li><a href="{{ $allfooter->twitter }}"><i class="fab fa-twitter"></i></a></li>

                       </ul>
                    </div>
                 </div>
              </div>
              <div class="col-xl-8 col-lg-8 col-md-7 col-12">
                 <div class="postbox__comment-form contact-wrapper">
                    <h3 class="postbox__comment-form-title">Send us a
                       Message</h3>
                       <form action="{{ route('store.message') }}" method="post">
                        @csrf
                       <div class="row">
                          <div class="col-12">
                             <div class="postbox__comment-input">
                                <input name="name" type="name" placeholder="Enter your name">
                             </div>
                          </div>
                          <div class="col-12">
                             <div class="postbox__comment-input">
                                <input name="email" type="email" placeholder="Enter you mail">
                             </div>
                          </div>
                          <div class="col-12">
                            <div class="postbox__comment-input">
                                <input nname="phone" type="phone" placeholder="Enter you phone number">
                            </div>
                         </div>
                         <div class="col-12">
                            <div class="postbox__comment-input">
                                <input name="service" type="text" placeholder="Subject">
                            </div>
                         </div>

                          <div class="col-12">
                             <div class="postbox__comment-input">
                                <textarea name="message" placeholder="Enter your message"></textarea>
                             </div>
                          </div>
                          <div class="col-12">
                             <div class="postbox__comment-btn">
                                <button type="submit" class="tp-btn">Let,s Talk</button>
                             </div>
                          </div>
                       </div>
                    </form>
                 </div>
              </div>
           </div>
        </div>
     </div> --}}
     <!-- contact area end -->



     <!-- tp-social-area-start -->
     {{-- @include('frontend.home_all.link_scroll') --}}
     <!-- tp-social-area-end -->

@endsection
