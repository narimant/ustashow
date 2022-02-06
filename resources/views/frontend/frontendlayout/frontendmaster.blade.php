<!DOCTYPE html>
@php

$dir=(app()->getLocale()=='fa') ? "rtl" :"ltr";
@endphp
<html lang="{{ app()->getLocale() }}" dir="{{ $dir }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    {!! SEO::generate() !!}
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

    <script src="{{ asset('js/sweetalert.min.js') }}"></script>



    <!-- CSS -->
    <link rel="stylesheet" href="{{  asset('frontend/css/all.min.css') }}" >
    <link rel="stylesheet" href="{{  asset('frontend/css/feather.css') }}" >
    <link rel="stylesheet" href="{{  asset('frontend/css/materialdesignicons.min.css') }}" >

    @if(app()->getLocale()=='fa')
        <link href="{{  asset('frontend/css/themertl.min.css') }}" rel="stylesheet" />
    @else
        <link rel="stylesheet" href="{{  asset('frontend/css/theme.min.css') }}" >
    @endif

    <link rel="stylesheet" href="{{  asset('frontend/css/customstyle.css') }}" >










@yield('style')
</head>
<body>

<!-- Navigation-->
@include('frontend.frontendlayout.menu')



@yield('content')



@yield('script')

@include('sweet::alert')
<script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>








<!-- footer-->
@include('frontend.frontendlayout.footer')
</body>
</html>
