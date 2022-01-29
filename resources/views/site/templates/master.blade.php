<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    data-base-url="{{ url('/') }}">

   <!-- <html class="fixed { isset($_COOKIE['ag-sidebar-left-collapsed']) ? 'sidebar-left-collapsed' : '' }} whitelabel-bradesco"
    lang="pt-br"
    data-logged-company-id="{ logged_company('id') }}"
    data-logged-user-id="{ logged_user('id') }}"
    data-storage-url="{ storage_url() }}"> !-->
  
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
            @yield('title', config('projetopet.title', 'Projeto Pet'))
        </title>

        {{-- Vendor Stylesheets --}}
        <link rel="stylesheet" href="{{ asset('css/vendors.css') }}">
        <link rel="stylesheet" href="{{ asset('css/site/all.min.css') }}">

        {{-- Custom Stylesheets --}}
        @yield('head_css')

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
    <script src="{{ asset('js/vendors.js') }}"></script>
    <script src="{{ asset('js/site/all.min.js') }}"></script>

    @stack('script-js')

</html>