@php
$allfooter = App\Models\Footer::find(1);
$categories = App\Models\BlogCategory::orderBy('blog_category','ASC')->get();
@endphp


<footer class="footer-wrapper footer-layout1" data-bg-src="{{ asset('frontend/assets/img/bg/1.jpg')}}">
   <div class="widget-area">
       <div class="container">
           <div class="row justify-content-between">
               <div class="col-md-6 col-xl-3">
                   <div class="widget footer-widget">
                       <div class="th-widget-about">
                           <div class="about-logo">
                               <a href="home-newspaper.html"><img src="{{ asset('frontend/assets/img/logo-white.png')}}" height="200" width="200" alt="Tnews"></a>
                           </div>
                           <p class="about-text">{{ $allfooter->short_description }}</p>
                           <div class="th-social style-black">
                               <a href="{{ $allfooter->facebook }}"><i class="fab fa-facebook-f"></i></a>
                               <a href="{{ $allfooter->youtube }}"><i class="fab fa-youtube"></i></a>
                               <a href="{{ $allfooter->instagram }}"><i class="fab fa-instagram"></i></a>
                               <a href="{{ $allfooter->linkedin }}"><i class="fab fa-linkedin-in"></i></a>
                               <a href="{{ $allfooter->twitter }}"><i class="fab fa-twitter"></i></a>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="col-md-6 col-xl-auto">
                   <div class="widget widget_nav_menu footer-widget">
                       <h3 class="widget_title">News Category</h3>
                       <div class="menu-all-pages-container">
                           <ul class="menu">
                              @foreach ($categories as $cat)
                               <li><a href="{{ route('category.blog',$cat->id) }}">{{ $cat->blog_category }}</a></li>
                              @endforeach
                           </ul>
                       </div>
                   </div>
               </div>
               <div class="col-md-6 col-xl-auto">
                  <div class="widget widget_nav_menu footer-widget">
                      <h3 class="widget_title">Our Partners</h3>
                      <div class="menu-all-pages-container">
                              <li><a href="blog.html">ICUZamba</a></li>
                              <li><a href="blog.html">ZRDC</a></li>
                      </div>
                  </div>
              </div>
               <div class="col-md-6 col-xl-3">
                   <div class="widget widget_tag_cloud footer-widget">
                       <h3 class="widget_title">Popular Tags</h3>
                       <div class="tagcloud">
                           <a href="blog.html">Sports</a>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <div class="copyright-wrap">
       <div class="container">
           <div class="row jusity-content-between align-items-center">
               <div class="col-lg-5">
                   <p class="copyright-text">©Copyright <script>document.write( new Date().getFullYear() );</script> All Rights Reserved - ICUTV News</a>.</p>
               </div>
               <div class="col-lg-auto ms-auto d-none d-lg-block">
                   <div class="footer-links">
                       <ul>
                           <li><a href="{{ route('home')}}">Home</a></li>
                           <li><a href="{{ route('home.about')}}">About Us</a></li>
                           <li><a href="{{ route('contact.us')}}">Contact Us</a></li>
                       </ul>
                   </div>
               </div>
           </div>
       </div>
   </div>
</footer>