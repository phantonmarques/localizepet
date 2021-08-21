<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    data-base-url="{{ url('/') }}">


   <!-- <html class="fixed { isset($_COOKIE['ag-sidebar-left-collapsed']) ? 'sidebar-left-collapsed' : '' }} whitelabel-bradesco"
    lang="pt-br"
    data-logged-company-id="{ logged_company('id') }}"
    data-logged-user-id="{ logged_user('id') }}"
    data-environment="{ config('app.env') }}"
    data-base-url="{ url('/') }}"
    data-integration-url="{ config('autogestor.url.integration') }}"
    data-storage-url="{ storage_url() }}" 
    data-whitelabel="bradesco"> !-->
  
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
            @yield('title_prefix', config('projetopet.title_prefix', ''))
            @yield('title', config('projetopet.title', 'Projeto Pet'))
            @yield('title_postfix', config('projetopet.title_postfix', ''))
        </title>

        {{-- Custom stylesheets (pre projetopet) --}}
        @yield('projetopet_css_pre')

        {{-- Base Stylesheets --}}
        @if(!config('projetopet.enabled_laravel_mix'))
            <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
            <link rel="stylesheet" href="{{ asset('vendor/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

            {{-- Configured Stylesheets --}}
            @include('site.templates.plugins', ['type' => 'css'])

            <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
            <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet"> 
        @else
            <link rel="stylesheet" href="{{ mix(config('projetopet.laravel_mix_css_path', 'css/app.css')) }}">
        @endif

        <link rel="stylesheet" href="{{ asset('assets/general/css/style.css') }}">

        {{-- Custom Stylesheets (post projetopet) --}}
        @yield('projetopet_css')

        {{-- Favicon --}}
        @if(config('projetopet.use_ico_only'))
            <link rel="shortcut icon" href="{{ asset('assets/general/imgs/logo.png') }}" />
        @endif

    </head>

    @include('site.templates.header')

    {{-- Body Content --}}
    @yield('body-main')

    @include('site.templates.footer')

    {{-- Base Scripts --}}
    @if(!config('projetopet.enabled_laravel_mix'))
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

        {{-- Configured Scripts --}}
        @include('site.templates.plugins', ['type' => 'js'])

        <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
        <script src="{{ asset('assets/general/js/all.js') }}"></script>

        @stack('script-js')
    @else
        <script src="{{ mix(config('projetopet.laravel_mix_js_path', 'js/app.js')) }}"></script>
    @endif

</html>