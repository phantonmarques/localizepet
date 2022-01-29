<header class="@yield('classes_topnav')">
    {{--    @yield('header')--}}
    <div class="row mg-sides-0">
        <div class="col-6 pl-5">
            <img class="img-nav" src="{{ asset('assets/general/imgs/projetopet.png') }}" />
        </div>
        <div class="col-6 login-btn text-right">
            @if (Route::has('site.auth.login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ route('administrator.home') }}">Home</a>
                    @else
                        <a href="{{ route('site.auth.login') }}" class="btn btn-light">
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
                    <a class="nav-link" href="{{ route('site.index') }}"><span class="fas fa-home"></span></a>
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