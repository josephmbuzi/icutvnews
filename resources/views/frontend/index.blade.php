@extends('frontend.main_master')
@section('main')

@section('canonical')
    <link rel="canonical" href="{{ url('/') }}">
@endsection
@section('og:url')
    <link rel="og:url" href="{{ url('/') }}">
@endsection
@section('title', 'ICU TV News')
@section('description','ICU TV News')
@section('keywords','ICU TV News')
@php
$aboutpage = App\Models\About::find(1);


@endphp
@section('image', asset($aboutpage->about_image))

 <!-- hero area start  -->
@include('frontend.home_all.home_hero')
<!-- hero area end  -->

{{-- @include('frontend.home_all.home_about') --}}

@include('frontend.home_all.blog')

{{-- @include('frontend.home_all.editors_choice.blade') --}}

{{-- @include('frontend.home_all.portfolio') --}}


{{-- @include('frontend.home_all.home_testimonial') --}}

{{-- @include('frontend.home_all.home_team') --}}

 {{-- @include('frontend.home_all.brand_area') --}}



{{-- @include('frontend.home_all.home_contact') --}}

{{-- @include('frontend.home_all.link_scroll') --}}


{{-- @include('frontend.home_all.counter_area')


@include('frontend.home_all.award_area')


@include('frontend.home_all.home_team')


@include('frontend.home_all.home_process')


@include('frontend.home_all.link_scroll') --}}





@endsection
