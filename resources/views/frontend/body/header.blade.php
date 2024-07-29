@php
    $route = Route::current()->getName();
    $allfooter = App\Models\Footer::find(1);
    $categories = App\Models\BlogCategory::orderBy('blog_category','ASC')->get();
@endphp






<div class="popup-search-box">
   <button class="searchClose"><i class="fal fa-times"></i></button>
   <form action="{{ route('search.blogs') }}" method="GET">
    @csrf
       <input name="keyword" type="search" placeholder="What are you looking for?">
       <button type="submit"><i class="fal fa-search"></i></button>
   </form>
</div><!--==============================
Mobile Menu
============================== -->
<div class="th-menu-wrapper">
   <div class="th-menu-area text-center">
       <button class="th-menu-toggle"><i class="fal fa-times"></i></button>
       <div class="mobile-logo">
           <a href="{{ route('home') }}"><img src="{{ asset('frontend/assets/img/logo-blue.png')}}" width="150" height="150" alt="Tnews"></a>
       </div>
       <div class="th-mobile-menu">
           <ul>
               <li >
                   <a href="{{ route('home') }}">Home</a>
               </li>
               <li><a href="{{ route('home.about') }}">About Us</a></li>
               <li class="menu-item-has-children">
                   <a href="#">News</a>
                   <ul class="sub-menu">
                    @foreach ($categories as $cat)
                        <li><a href="{{ route('category.blog',$cat->id) }}">{{ $cat->blog_category }}</a></li>
                    @endforeach
                       
                   </ul>
               </li>
               <li>
                   <a href="{{ route('contact.us')}}">Contact</a>
               </li>
           </ul>
       </div>
   </div>
</div><!--==============================
Header Area
==============================-->
<header class="th-header header-layout1">
   <div class="header-top">
       <div class="container">
           <div class="row justify-content-center justify-content-lg-between align-items-center gy-2">
               <div class="col-auto d-none d-lg-block">
                   <div class="header-links">
                       <ul>
                           <li>
                               <a class="theme-toggler" href="#">
                                   <span class="dark"><i class="fas fa-moon"></i>Dark Mode</span>
                                   <span class="light"><i class="fas fa-sun-bright"></i>Light Mode</span>
                               </a>
                           </li>
                       </ul>
                   </div>
               </div>
               <div class="col-auto">
                   <div class="header-links">
                       <ul>
                           <li>
                               <div class="social-links">
                                <a href="{{ $allfooter->facebook }}"><i class="fab fa-facebook-f"></i></a>
                                <a href="{{ $allfooter->youtube }}"><i class="fab fa-youtube"></i></a>
                                <a href="{{ $allfooter->instagram }}"><i class="fab fa-instagram"></i></a>
                                <a href="{{ $allfooter->linkedin }}"><i class="fab fa-linkedin-in"></i></a>
                                <a href="{{ $allfooter->twitter }}"><i class="fab fa-twitter"></i></a>
                               </div>
                           </li>
                       </ul>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <div class="header-middle">
       <div class="container">
           <div class="row justify-content-center justify-content-lg-between align-items-center">
               <div class="col-auto d-none d-lg-block">
                   <div class="col-auto">
                       <div class="header-logo">
                           <a href="{{ route('home')}}"><img class="light-img" src="{{ asset('frontend/assets/img/logo-blue.png')}}" width="150" height="150" alt="Tnews"></a>
                           <a href="{{ route('home')}}"><img class="dark-img" src="{{ asset('frontend/assets/img/logo-white.png')}}" width="150" height="150" alt="Tnews"></a>
                       </div>
                   </div>
               </div>
               <div class="col-lg-8 text-end">
                   <div class="header-ads">
                       <a href="https://www.icuzambia.net/">
                           <img class="light-img" src="{{ asset('frontend/assets/img/ads/icu.png')}}" alt="ads">
                           <img class="dark-img" src="{{ asset('frontend/assets/img/ads/icu.png')}}" alt="ads">
                       </a>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <div class="sticky-wrapper">
       <!-- Main Menu Area -->
       <div class="menu-area">
           <div class="container">
               <div class="row align-items-center justify-content-between">
                   <div class="col-auto d-lg-none d-block">
                       <div class="header-logo">
                           <a href="{{ route('home') }}"><img src="{{ asset('frontend/assets/img/logo-white.png')}}" width="100" height="100" alt="Tnews"></a>
                       </div>
                   </div>
                   <div class="col-auto">
                       <nav class="main-menu d-none d-lg-inline-block">
                           <ul>
                               <li >
                                   <a href="{{ route('home') }}">Home</a>
                               </li>
                               <li><a href="{{ route('home.about') }}">About Us</a></li>

                               <li class="menu-item-has-children">
                                   <a href="#">News</a>
                                   <ul class="sub-menu">
                                    @foreach ($categories as $cat)
                                        <li><a href="{{ route('category.blog',$cat->id) }}">{{ $cat->blog_category }}</a></li>
                                    @endforeach
                                   </ul>
                               </li>
                               <li>
                                <a href="{{ route('contact.us')}}">Contact</a>
                            </li>
                            <li>
                            </li>
                           </ul>
                       </nav>
                   </div>
                   <div class="col-auto">
                       <div class="header-button">
                           <button type="button" class="simple-icon searchBoxToggler"><i class="far fa-search"></i></button>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
</header>