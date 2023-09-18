<!DOCTYPE html>
<html class="no-js" lang="{{get_default_language()}}"dir="{{get_default_language_direction()}}">
<head>
    @include('frontend.partials.google-analytics')
    @include('layouts.app')
     <script>
       var scriptToRemove = document.querySelector('script[src="https://embed.xgenious.com/5e0b3e167e39ea1242a27b69.js"]');
        
        // Jika elemen ditemukan, hapus elemen tersebut
        if (scriptToRemove) {
            scriptToRemove.parentNode.removeChild(scriptToRemove);
        }
    </script>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @if(request()->routeIs('homepage'))
        <meta name="description" content="{{filter_static_option_value('site_meta_description',$global_static_field_data)}}">
        <meta name="tags" content="{{filter_static_option_value('site_meta_tags',$global_static_field_data)}}">
    @else
        @yield('page-meta-data')
    @endif
    {!! render_favicon_by_id(filter_static_option_value('site_favicon',$global_static_field_data)) !!}
    {!! load_google_fonts() !!}
    <link rel="stylesheet" href="{{asset('assets/frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/line-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/common/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets/common/css/toastr.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/style_02.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/jquery.ihavecookies.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/dynamic-style.css')}}">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>  

    @include('frontend.partials.css-variable')
    @yield('style')

    @if(!empty(filter_static_option_value('site_rtl_enabled',$global_static_field_data)) || get_user_lang_direction() == 'rtl')
         <link rel="stylesheet" href="{{asset('assets/frontend/css/rtl.css')}}">
     @endif
    @include('frontend.partials.og-meta')
    <script src="{{asset('assets/frontend/js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/jquery-migrate-3.1.0.min.js')}}"></script>
    <script>var siteurl = "{{url('/')}}"</script>
    {!! filter_static_option_value('site_third_party_tracking_code',$global_static_field_data) !!}
    

</head>
@php
    $home_page_variant = $home_page ?? filter_static_option_value('home_page_variant',$global_static_field_data);
@endphp
<body class="">
@include('frontend.partials.preloader')
