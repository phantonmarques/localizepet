<header class="@yield('classes_topnav')">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">

        <a class="navbar-brand ps-3" href="{{ route('site.index') }}">
            <img src="{{ asset('images/default/projetopet.png') }}" class="d-inline-block align-text-top icon-medium"
                 alt="{{ config('localizepet.title', '') }}">
        </a>

        <button class="navbar-toggler me-3" data-bs-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation"
                data-bs-target="#navbarContent" aria-controls="navbarContent" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">

            <ul class="navbar-nav me-auto ps-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        Animais
                    </a>
                    <ul class="dropdown-menu bg-dark" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item text-white" href="#">Achei um animal</a></li>
                        <li><a class="dropdown-item text-white" href="#">Perdi um animal</a></li>
                        <li><a class="dropdown-item text-white" href="#">Quero doar um animal</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Contribuidores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Quem somos</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto pe-4 ps-4">
                @auth
                    <li class="nav-item">
                        <a class="nav-link d-flex flex-column justify-content-center text-center"
                           href="{{ route('administrator.home') }}">
                            <i class="fa-solid fa-gear col-auto"></i>
                            <span class="text-white">Admin</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link d-flex flex-column justify-content-center text-center" href="#">
                            <i class="fa-solid fa-user-gear col-auto"></i>
                            <span class="text-white">Perfil</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link d-flex flex-column justify-content-center text-center logout" href="#">
                            <i class="fa-solid fa-right-from-bracket col-auto"></i>
                            <span class="text-white">Sair</span>
                        </a>
                        <form class="hidden" id="logout" action="{{ route('site.auth.logout') }}" method="POST">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('site.auth.show-register') }}">
                            Cadastre-se
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('site.auth.login') }}">
                            Entrar
                        </a>
                    </li>
                @endauth
            </ul>
        </div>


    </nav>
</header>