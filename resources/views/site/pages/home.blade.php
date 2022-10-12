@extends('site.templates.master')

@section('body-main')

    <main class="content">

        <body class="@yield('classes_body')" @yield('body_data')>

            {{-- Body Content --}}
            <div class="container-fluid px-0">
                {{-- Banner rotative 1 --}}
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('images/default/banner1.jpg') }}" class="d-block w-100" alt="banner1">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/default/banner2.jpg') }}" class="d-block w-100" alt="banner2">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

                {{-- Filters --}}
                <div class="row mx-0 mb-5 mt-3 mt-md-0 justify-content-center">
                    <div class="col-12 col-md-10 col-lg-8  col-xl-6">
                        <div class="card search-filters shadow">
                            <div class="card-body">
                                <h5 class="card-title">Encontre um animal</h5>
                                <p class="card-text">
                                    <form>
                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <input type="text" class="form-control" id="keywords" placeholder="Palavras chave">
                                            </div>
                                            <div class="form-group mt-4 mt-md-0 col-md-4">
                                                <input type="text" class="form-control" id="city" placeholder="Cidade">
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="form-group col-md-4">
                                                <select id="input-state" class="form-control">
                                                    <option selected>Todas as espécies</option>
                                                    <option>...</option>
                                                </select>
                                            </div>
                                            <div class="form-group mt-4 mt-md-0 col-md-4">
                                                <select id="input-state" class="form-control">
                                                    <option selected>Todos os animais</option>
                                                    <option>...</option>
                                                </select>
                                            </div>
                                            <div class="d-grid mt-4 mt-md-0 col-md-4">
                                                <button type="submit" class="btn btn-dark">Pesquisar</button>
                                            </div>
                                        </div>
                                    </form>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="container px-0">

                {{-- Pet lost and found --}}
                <h4 class="font-monospace ps-3">Animais perdidos e encontrados</h4>
                <div class="row row-cols-1 row-cols-md-2 row-cols-xxl-4 g-4 mx-0">
                    <div class="col">
                        <div class="card rounded-3">
                            <div class="card-tag-lost">
                                PERDIDO
                            </div>
                            <img src="{{ asset('images/default/card-pet.jpg') }}" class="card-img-top" alt="">
                            <div class="card-body">
                                <p class="card-text mb-0"><b>Identificação</b>: Não Informada</p>
                                <p class="card-text"><b>Perdido em</b>: Curitiba, Cristo Rei</p>
                            </div>
                            <div class="card-footer d-grid">
                                <a href="#" class="btn btn-dark btn-lg btn-block">Mais detalhes</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card rounded-3">
                            <div class="card-tag-found">
                                ENCONTRADO
                            </div>
                            <img src="{{ asset('images/default/card-pet.jpg') }}" class="card-img-top" alt="">
                            <div class="card-body">
                                <p class="card-text mb-0"><b>Identificação</b>: Não Informada</p>
                                <p class="card-text"><b>Encontrado em</b>: Curitiba, Cristo Rei</p>
                            </div>
                            <div class="card-footer d-grid">
                                <a href="#" class="btn btn-dark btn-lg btn-block">Mais detalhes</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card rounded-3">
                            <div class="card-tag-lost">
                                PERDIDO
                            </div>
                            <img src="{{ asset('images/default/card-pet.jpg') }}" class="card-img-top" alt="">
                            <div class="card-body">
                                <p class="card-text mb-0"><b>Identificação</b>: Não Informada</p>
                                <p class="card-text"><b>Perdido em</b>: Curitiba, Cristo Rei</p>
                            </div>
                            <div class="card-footer d-grid">
                                <a href="#" class="btn btn-dark btn-lg btn-block">Mais detalhes</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card rounded-3">
                            <div class="card-tag-found">
                                ENCONTRADO
                            </div>
                            <img src="{{ asset('images/default/card-pet.jpg') }}" class="card-img-top" alt="">
                            <div class="card-body">
                                <p class="card-text mb-0"><b>Identificação</b>: Não Informada</p>
                                <p class="card-text"><b>Encontrado em</b>: Curitiba, Cristo Rei</p>
                            </div>
                            <div class="card-footer d-grid">
                                <a href="#" class="btn btn-dark btn-lg btn-block">Mais detalhes</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mb-4 mt-4">
                    <div class="col-10 col-md-6 col-xxl-3 d-grid">
                        <span class="btn btn-outline-dark">
                            Mais animais perdidos e encontrados
                        </span>
                    </div>
                </div>

                {{-- Pet donate--}}
                <h4 class="font-monospace ps-3">Animais para doação</h4>
                <div class="row row-cols-1 row-cols-md-2 row-cols-xxl-4 g-4 mx-0">
                    <div class="col">
                        <div class="card rounded-3">
                            <img src="{{ asset('images/default/card-pet-doacao.jpg') }}" class="card-img-top" alt="">
                            <div class="card-body">
                                <p class="card-text mb-0"><b>Identificação</b>: Não Informada</p>
                                <p class="card-text mb-0"><b>Doador</b>: Guilherme Medeiros</p>
                                <p class="card-text mb-0"><b>Raça</b>: Não definida</p>
                                <p class="card-text"><b>Idade</b>: 2 anos</p>
                            </div>
                            <div class="card-footer d-grid">
                                <a href="#" class="btn btn-dark btn-lg btn-block">Mais detalhes</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card rounded-3">
                            <img src="{{ asset('images/default/card-pet-doacao.jpg') }}" class="card-img-top" alt="">
                            <div class="card-body">
                                <p class="card-text mb-0"><b>Identificação</b>: Não Informada</p>
                                <p class="card-text mb-0"><b>Doador</b>: Guilherme Medeiros</p>
                                <p class="card-text mb-0"><b>Raça</b>: Não definida</p>
                                <p class="card-text"><b>Idade</b>: 2 anos</p>
                            </div>
                            <div class="card-footer d-grid">
                                <a href="#" class="btn btn-dark btn-lg btn-block">Mais detalhes</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card rounded-3">
                            <img src="{{ asset('images/default/card-pet-doacao.jpg') }}" class="card-img-top" alt="">
                            <div class="card-body">
                                <p class="card-text mb-0"><b>Identificação</b>: Não Informada</p>
                                <p class="card-text mb-0"><b>Doador</b>: Guilherme Medeiros</p>
                                <p class="card-text mb-0"><b>Raça</b>: Não definida</p>
                                <p class="card-text"><b>Idade</b>: 2 anos</p>
                            </div>
                            <div class="card-footer d-grid">
                                <a href="#" class="btn btn-dark btn-lg btn-block">Mais detalhes</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card rounded-3">
                            <img src="{{ asset('images/default/card-pet-doacao.jpg') }}" class="card-img-top" alt="">
                            <div class="card-body">
                                <p class="card-text mb-0"><b>Identificação</b>: Não Informada</p>
                                <p class="card-text mb-0"><b>Doador</b>: Guilherme Medeiros</p>
                                <p class="card-text mb-0"><b>Raça</b>: Não definida</p>
                                <p class="card-text"><b>Idade</b>: 2 anos</p>
                            </div>
                            <div class="card-footer d-grid">
                                <a href="#" class="btn btn-dark btn-lg btn-block">Mais detalhes</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center mb-4 mt-4">
                    <div class="col-10 col-md-6 col-xxl-3 d-grid">
                        <span class="btn btn-outline-dark">
                            Mais animais para doação
                        </span>
                    </div>
                </div>
            </div>

            {{-- Banner rotative 2 --}}
            <div class="container-fluid px-0 pt-4 pb-4">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('images/default/banner1.jpg') }}" class="d-block w-100" alt="banner1">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/default/banner2.jpg') }}" class="d-block w-100" alt="banner2">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            {{-- Contributors --}}
            <div class="container px-0 pt-4">

                <h4 class="font-monospace ps-3">Contribuidores</h4>
                <div class="row row-cols-1 row-cols-md-2 row-cols-xxl-4 g-4 mx-0">
                    <div class="col">
                        <div class="card rounded-3">
                            <div class="card-header text-center fw-bold">
                                <a href="/perfil-usuario">
                                    José Marques
                                </a>
                            </div>
                            <div class="card-body">
                                <p class="card-text mb-0">Contribuinte desde 01/01/2020</p>
                                <p class="card-text">Curitiba, PR</p>
                                <p class="card-text text-center">Selo</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card rounded-3">
                            <div class="card-header text-center fw-bold">
                                <a href="/perfil-usuario">
                                    José Marques
                                </a>
                            </div>
                            <div class="card-body">
                                <p class="card-text mb-0">Contribuinte desde 01/01/2020</p>
                                <p class="card-text">Curitiba, PR</p>
                                <p class="card-text text-center">Selo</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card rounded-3">
                            <div class="card-header text-center fw-bold">
                                <a href="/perfil-usuario">
                                    José Marques
                                </a>
                            </div>
                            <div class="card-body">
                                <p class="card-text mb-0">Contribuinte desde 01/01/2020</p>
                                <p class="card-text">Curitiba, PR</p>
                                <p class="card-text text-center">Selo</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card rounded-3">
                            <div class="card-header text-center fw-bold">
                                <a href="/perfil-usuario">
                                    José Marques
                                </a>
                            </div>
                            <div class="card-body">
                                <p class="card-text mb-0">Contribuinte desde 01/01/2020</p>
                                <p class="card-text">Curitiba, PR</p>
                                <p class="card-text text-center">Selo</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card rounded-3">
                            <div class="card-header text-center fw-bold">
                                <a href="/perfil-usuario">
                                    José Marques
                                </a>
                            </div>
                            <div class="card-body">
                                <p class="card-text mb-0">Contribuinte desde 01/01/2020</p>
                                <p class="card-text">Curitiba, PR</p>
                                <p class="card-text text-center">Selo</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card rounded-3">
                            <div class="card-header text-center fw-bold">
                                <a href="/perfil-usuario">
                                    José Marques
                                </a>
                            </div>
                            <div class="card-body">
                                <p class="card-text mb-0">Contribuinte desde 01/01/2020</p>
                                <p class="card-text">Curitiba, PR</p>
                                <p class="card-text text-center">Selo</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card rounded-3">
                            <div class="card-header text-center fw-bold">
                                <a href="/perfil-usuario">
                                    José Marques
                                </a>
                            </div>
                            <div class="card-body">
                                <p class="card-text mb-0">Contribuinte desde 01/01/2020</p>
                                <p class="card-text">Curitiba, PR</p>
                                <p class="card-text text-center">Selo</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card rounded-3">
                            <div class="card-header text-center fw-bold">
                                <a href="/perfil-usuario">
                                    José Marques
                                </a>
                            </div>
                            <div class="card-body">
                                <p class="card-text mb-0">Contribuinte desde 01/01/2020</p>
                                <p class="card-text">Curitiba, PR</p>
                                <p class="card-text text-center">Selo</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mb-4 mt-4">
                    <div class="col-10 col-md-6 col-xxl-3 d-grid">
                        <span class="btn btn-outline-dark">
                            Seja um contribuidor
                        </span>
                    </div>
                </div>
            </div>
        </body>
    </main>

@endsection