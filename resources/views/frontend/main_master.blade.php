<!Doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">


      <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Poppins:400,600,700%7CRoboto:400,400i,700' rel='stylesheet'>

    <title>@yield('title')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="author" content="ICU TV News">
    @yield('canonical')
    <meta name="robots" content="index, follow">
    <meta name="language" content="English">
    <meta name="revisit-after" content="2 days">
    <meta http-equiv="Cache-control" content="public">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="distribution" content="global">
    <meta name="image" content="@yield('image')">
    <meta name="robots" content="noodp"> <!-- To prevent usage of Open Directory Project titles/descriptions -->
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:type" content="website">
    @yield('og:url')
    <meta property="og:image" content="@yield('image')"> <!-- URL to a representative image for sharing -->
    <meta property="og:image:alt" content="ICU TV News">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title')">
    <meta name="twitter:description" content="@yield('description')">
    <meta name="twitter:image" content="@yield('image')"> <!-- URL to a representative image for sharing -->

    @yield('schema')
    <!-- Favicons - Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('frontend/assets/img/favicons/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('frontend/assets/img/favicons/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('frontend/assets/img/favicons/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('frontend/assets/img/favicons/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('frontend/assets/img/favicons/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('frontend/assets/img/favicons/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('frontend/assets/img/favicons/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('frontend/assets/img/favicons/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('frontend/assets/img/favicons/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('frontend/assets/img/favicons/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('frontend/assets/img/favicons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('frontend/assets/img/favicons/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('frontend/assets/img/favicons/favicon-16x16.png')}}">
    <link rel="manifest" href="{{ asset('frontend/assets/img/favicons/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('frontend/assets/img/favicons/ms-icon-144x144.png')}}">
    <meta name="theme-color" content="#ffffff">

    <!--==============================
	  Google Fonts
	============================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300;400;500;600;700;800;900&family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!--==============================
	    All CSS File
	============================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css')}}">
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/fontawesome.min.css')}}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.min.css')}}">
    <!-- Slick Slider -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/slick.min.css')}}">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css')}}">

</head>

<body>



<!-- preloader -->
<div id="preloader">
    <div class="preloader">
          <span></span>
          <span></span>
    </div>
 </div>
 <!-- preloader end  -->


@include('frontend.body.header')


    <main>

        @yield('main')


    </main>
    <!-- Footer-area -->
    @include('frontend.body.footer')
    <!-- Footer-area-end -->






    <!-- Scroll To Top -->
    <div class="scroll-top">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>
        </svg>
    </div>

    <!--==============================
    All Js File
============================== -->
    <!-- Jquery -->
    <script src="{{ asset('frontend/assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
    <!-- Slick Slider -->
    <script src="{{ asset('frontend/assets/js/slick.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js')}}"></script>
    <!-- Magnific Popup -->
    <script src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.js')}}"></script>
    <!-- Counter Up -->
    <script src="{{ asset('frontend/assets/js/jquery.counterup.min.js')}}"></script>
    <!-- Range Slider -->
    <script src="{{ asset('frontend/assets/js/jquery-ui.min.js')}}"></script>
    <!-- Isotope Filter -->
    <script src="{{ asset('frontend/assets/js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/isotope.pkgd.min.js')}}"></script>
    <!-- Vimeo Player -->
    <script src="{{ asset('frontend/assets/js/vimeo_player.js')}}"></script>

    <!-- Main Js File -->
    <script src="{{ asset('frontend/assets/js/main.js')}}"></script>
    <script>
        const brandSliderInner = document.querySelector('.brand-slider-inner');
        const brandItems = brandSliderInner.querySelectorAll('.brand-item');
        const itemWidth = brandItems[0].offsetWidth; // Calculate item width dynamically

        let currentSlide = 0;
        let isAnimating = false;

        function slideToNext() {
            if (isAnimating) return;
            isAnimating = true;

            brandSliderInner.style.setProperty('--transform', `translateX(-${itemWidth * (currentSlide + 1)}px)`);

            setTimeout(() => {
                currentSlide = (currentSlide + 1) % brandItems.length;
                isAnimating = false;
            }, 1000); // Adjust timing as needed
        }

        setInterval(slideToNext, 1000); // Slide every second

        // Optional: Add controls for manual sliding (e.g., next/prev buttons)
        </script>

</body>
</html>
