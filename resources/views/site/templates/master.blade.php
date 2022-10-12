<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    data-base-url="{{ url('/') }}">
  
    <head>
        {{-- Base Meta Tags --}}
        <meta charset="UTF-8">
        <meta name="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
        <meta name="AdsBot-Google" content="noindex, nofollow">
        <meta name="googlebot" content="noindex, nofollow">
        <meta name="googlebot-news" content="noindex, nofollow">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

        {{-- Custom Meta Tags --}}
        @yield('meta_tags')

        {{-- Title --}}
        <title>
            @yield('title', config('localizepet.title', ''))
        </title>

        {{-- Vendor Stylesheets --}}
        <link rel="stylesheet" href="{{ asset('css/site/vendors.css') }}" />

        {{--  All Site Stylesheets --}}
        <link rel="stylesheet" href="{{ asset('css/site/all.css') }}" />

        {{-- Custom Stylesheets --}}
        @stack('style-css')

        {{-- Favicon --}}
        <link rel="shortcut icon" href="{{ asset('images/default/logo.png') }}" />

    </head>

    @include('site.templates.components.header')

    {{-- Body Content --}}
    @yield('body-main')

    @include('site.templates.components.footer')

    {{-- Vendor Scripts --}}
    <script src="{{ asset('js/site/vendors.js') }}"></script>

    {{-- Base Scripts --}}
    <script src="{{ asset('js/site/all.js') }}"></script>

    {{-- Custom Scripts--}}
    @stack('script-js')

</html>