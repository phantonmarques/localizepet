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
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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

<header class="@yield('classes_topnav')">
{{--    @yield('header')--}}
    <div class="row mg-sides-0">
        <div class="col-6">
            <img class="img-nav" src="{{ asset('assets/general/imgs/projetopet.png') }}" />
        </div>
        <div class="col-6 login-btn text-right">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-light">
                            <span class="fas fa-sign-in-alt"></span> Entrar
                        </a>
                    @endauth
                </div>
            @endif
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark color-default mg-sides-0">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <a class="navbar-brand" href="#">Menu</a>
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto navbar-center">
                <li class="nav-item active">
                    <a class="nav-link" href="#"><span class="fas fa-home"></span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Animais
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Achei um animal</a>
                        <a class="dropdown-item" href="#">Perdi um animal</a>
                        <a class="dropdown-item" href="#">Quero doar um animal</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contribuidores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Parceiros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Produtos e serviços</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Quem somos</a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<main>
    <body class="@yield('classes_body')" @yield('body_data')>

    {{-- Body Content --}}
    @yield('body')

    <div class="container-fluid mg-sides-0 pd-sides-0">
        <div class="row mg-sides-0">  
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('assets/general/imgs/banner1.jpg') }}" class="d-block w-100" alt="banner1">
                        <!-- 
                            <div class="carousel-caption d-none d-md-block">
                                <h5>First slide label</h5>
                                <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                            </div>
                        -->
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('assets/general/imgs/banner1.jpg') }}" class="d-block w-100" alt="banner2">
                        <!--
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Second slide label</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        -->
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('assets/general/imgs/banner1.jpg') }}" class="d-block w-100" alt="banner3">
                        <!--
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Third slide label</h5>
                                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                            </div>
                        -->
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        
        <div class="row mg-sides-0 justify-content-center">
            <div class="col-md-6 box-search">
                <h2>Encontre um animal</h2>
                <form>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <input type="text" class="form-control" id="keywords" placeholder="Palavras chave">
                      </div>
                      <div class="form-group col-md-4">
                        <input type="text" class="form-control" id="city" placeholder="Cidade">
                      </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <select id="inputState" class="form-control">
                              <option selected>Choose...</option>
                              <option>...</option>
                            </select>
                          </div>
                      <div class="form-group col-md-3">
                        <select id="inputState" class="form-control">
                          <option selected>Choose...</option>
                          <option>...</option>
                        </select>
                      </div>
                      <div class="form-group col-md-4">
                        <button type="submit" class="btn btn-primary full-btn">Pesquisar</button>
                      </div>
                    </div>
                  </form>
            </div>
        </div>

    </div>

    {{-- Base Scripts --}}
    @if(!config('adminlte.enabled_laravel_mix'))
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

        {{-- Configured Scripts --}}
        @include('adminlte::plugins', ['type' => 'js'])

        <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
    @else
        <script src="{{ mix(config('adminlte.laravel_mix_js_path', 'js/app.js')) }}"></script>
    @endif

    {{-- Custom Scripts --}}
    @yield('adminlte_js')

    </body>
</main>

</html>