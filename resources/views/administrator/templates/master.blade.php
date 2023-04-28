<!doctype html>
<html class="fixed panel" lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      data-base-url="{{ url('/') }}">
    <head>
        <!-- Basic -->
        <meta charset="UTF-8">

        <title>
            {{ config('localizepet.title', '') . ( isset($title) ? " - {$title}" : ( isset($titleHead) ? " - {$titleHead}" : '' ) ) }}
        </title>

        <meta name="robots" content="noindex, nofollow">
        <meta name="AdsBot-Google" content="noindex, nofollow">
        <meta name="googlebot" content="noindex, nofollow">
        <meta name="googlebot-news" content="noindex, nofollow">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

        <!-- Web Fonts  -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800|Shadows+Into+Light"
              rel="stylesheet" type="text/css">

        <!-- Specific Page CSS -->
        @stack('page-css')

        <!-- Vendor CSS -->
        <link rel="stylesheet" href="{{ asset('css/administrator/vendor.css') }}"/>
        <link rel="stylesheet" href="{{ asset('vendor/font-awesome-administrator/css/all.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}"/>

        <!-- All Pages -->
        <link rel="stylesheet" href="{{ asset('css/administrator/all.css') }}"/>

    </head>
    <body>
        <section class="body">

            @include('administrator.templates.components.header')

            <div class="inner-wrapper">
                @component('administrator.templates.components.sidebar-start', [ 'activeMenu' => $activeMenu ?? null ])
                    @include('administrator.templates.components.sidebar-menu')
                @endcomponent

                <section role="main" class="content-body">
                    <header class="page-header">
                        <h2>{{ $title ?? '' }}</h2>
                    </header>

                    @include('administrator.templates.components.alert')

                    <!-- start: page -->
                        @yield('content')
                    <!-- end: page -->
                </section>
            </div>
        </section>

        <!-- Vendor -->
        <script src="{{ asset('js/administrator/vendor.js') }}"></script>

        <!-- Specific Page JS -->
        @stack('page-js')

        <!-- All Pages -->
        <script src="{{ asset('js/administrator/all.js') }}"></script>

    </body>
</html>