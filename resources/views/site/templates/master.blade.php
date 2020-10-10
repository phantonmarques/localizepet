<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        {{-- Base Meta Tags --}}
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- Custom Meta Tags --}}
        @yield('meta_tags')

        {{-- Title --}}
        <title>
            @yield('title_prefix', config('adminlte.title_prefix', ''))
            @yield('title', config('adminlte.title', 'AdminLTE 3'))
            @yield('title_postfix', config('adminlte.title_postfix', ''))
        </title>

        {{-- Custom stylesheets (pre AdminLTE) --}}
        @yield('adminlte_css_pre')

        {{-- Base Stylesheets --}}
        @if(!config('adminlte.enabled_laravel_mix'))
            <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
            <link rel="stylesheet" href="{{ asset('vendor/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

            {{-- Configured Stylesheets --}}
            @include('adminlte::plugins', ['type' => 'css'])

            <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
            <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet"> 
        @else
            <link rel="stylesheet" href="{{ mix(config('adminlte.laravel_mix_css_path', 'css/app.css')) }}">
        @endif

        <link rel="stylesheet" href="{{ asset('assets/general/css/style.css') }}">

        {{-- Custom Stylesheets (post AdminLTE) --}}
        @yield('adminlte_css')

        {{-- Favicon --}}
        @if(config('adminlte.use_ico_only'))
            <link rel="shortcut icon" href="{{ asset('assets/general/imgs/logo.png') }}" />
        @endif

    </head>

    @include('site.templates.header')

    {{-- Body Content --}}
    @yield('body-main')

    @include('site.templates.footer')

    {{-- Base Scripts --}}
    @if(!config('adminlte.enabled_laravel_mix'))
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

        {{-- Configured Scripts --}}
        @include('adminlte::plugins', ['type' => 'js'])

        <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
        <script src="{{ asset('assets/general/js/all.js') }}"></script>

        @stack('script-js')
    @else
        <script src="{{ mix(config('adminlte.laravel_mix_js_path', 'js/app.js')) }}"></script>
    @endif

</html>