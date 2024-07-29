@extends('frontend.main_master')



@section('title', '404 Error')




@section('main')

<section class="space2">
   <div class="container">
       <div class="error-img">
         
           <img class="light-img" src="{{ asset('frontend/assets/img/theme-img/error.svg')}}" alt="404 image">
           <img class="dark-img" src="{{ asset('frontend/assets/img/theme-img/error-dark.svg')}}" alt="404 image">
       </div>
       <div class="error-content">
           <h2 class="error-title"><span class="text-theme">OooPs!</span> Page Not Found</h2>
           <p class="error-text">Oops! The page you are looking for does not exist. It might have been moved or deleted. Please check and try again.</p>
           <a href="{{ route('home') }}" class="th-btn"><i class="fal fa-home me-2"></i>Back To Home</a>
       </div>
   </div>
</section>

@endsection
