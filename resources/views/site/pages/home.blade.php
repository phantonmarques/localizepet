@extends('site.templates.master')

@section('body-main')
    <main>
        <body class="@yield('classes_body')" @yield('body_data')>
            {{-- Body Content --}}
            <div class="container-fluid mg-sides-0 pd-sides-0">
                <div class="row dblock mg-sides-0">  
                    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('assets/general/imgs/banner1.jpg') }}" class="d-block w-100" alt="banner1">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('assets/general/imgs/banner1.jpg') }}" class="d-block w-100" alt="banner2">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('assets/general/imgs/banner1.jpg') }}" class="d-block w-100" alt="banner3">
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
                
                <div class="row mg-sides-0 mg-bottom-18-md mg-bottom-28-xs justify-content-center">
                    <div class="col-md-8 col-lg-6 box-search">
                        <h2>Encontre um animal</h2>
                        <form>
                            <div class="form-row">
                            <div class="form-group col-md-8">
                                <input type="text" class="form-control" id="keywords" placeholder="Palavras chave">
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control" id="city" placeholder="Cidade">
                            </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <select id="inputState" class="form-control">
                                    <option selected>Todas as espécies</option>
                                    <option>...</option>
                                    </select>
                                </div>
                            <div class="form-group col-md-4">
                                <select id="inputState" class="form-control">
                                <option selected>Todos os animais</option>
                                <option>...</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <button type="submit" class="btn btn-dark full-btn">Pesquisar</button>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

            <div class="container pd-sides-0">
                <h4 class="title">Animais perdidos e encontrados</h4>
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 mg-sides-0">  
                    <div class="col mb-4 p-rel">
                        <div class="card">
                            <span class="situation-card-p"> 
                                PERDIDO
                            </span>
                            <img src="{{ asset('assets/general/imgs/card-pet.jpg') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text"><b>Identificação</b>: Não Informada</p>
                                <p class="card-text"><b>Perdido em</b>: Curitiba, Cristo Rei</p>
                            </div>
                            <div class="card-footer">
                                <a href="#" class="btn btn-dark btn-lg btn-block">Mais detalhes</a>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4 p-rel">
                        <div class="card">
                            <span class="situation-card-e"> 
                                ENCONTRADO
                            </span>
                            <img src="{{ asset('assets/general/imgs/card-pet.jpg') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text"><b>Identificação</b>: Não Informada</p>
                                <p class="card-text"><b>Perdido em</b>: Curitiba, Cristo Rei</p>
                            </div>
                            <div class="card-footer">
                                <a href="#" class="btn btn-dark btn-lg btn-block">Mais detalhes</a>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4 p-rel">
                        <div class="card">
                            <span class="situation-card-p"> 
                                PERDIDO
                            </span>
                            <img src="{{ asset('assets/general/imgs/card-pet.jpg') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text"><b>Identificação</b>: Não Informada</p>
                                <p class="card-text"><b>Perdido em</b>: Curitiba, Cristo Rei</p>
                            </div>
                            <div class="card-footer">
                                <a href="#" class="btn btn-dark btn-lg btn-block">Mais detalhes</a>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4 p-rel">
                        <div class="card">
                            <span class="situation-card-e"> 
                                ENCONTRADO
                            </span>
                            <img src="{{ asset('assets/general/imgs/card-pet.jpg') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text"><b>Identificação</b>: Não Informada</p>
                                <p class="card-text"><b>Perdido em</b>: Curitiba, Cristo Rei</p>
                            </div>
                            <div class="card-footer">
                                <a href="#" class="btn btn-dark btn-lg btn-block">Mais detalhes</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <span class="search-more">
                        Mais animais perdidos e encontrados
                    </span>
                </div>
            </div>

            <div class="container pd-sides-0 mg-top-7">
                <h4 class="title">Animais para doação</h4>
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 mg-sides-0">  
                    <div class="col mb-4 p-rel">
                        <div class="card">
                            <img src="{{ asset('assets/general/imgs/card-pet-doacao.jpg') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text"><b>Identificação</b>: Não Informada</p>
                                <p class="card-text"><b>Encontrado em</b>: Curitiba, Cristo Rei</p>
                                <p class="card-text"><b>Doador</b>: Guilherme Medeiros</p>
                                <p class="card-text"><b>Raça</b>: Não definida</p>
                                <p class="card-text"><b>Idade</b>: 2 anos</p>
                            </div>
                            <div class="card-footer">
                                <a href="#" class="btn btn-dark btn-lg btn-block">Mais detalhes</a>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4 p-rel">
                        <div class="card">
                            <img src="{{ asset('assets/general/imgs/card-pet-doacao.jpg') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text"><b>Identificação</b>: Não Informada</p>
                                <p class="card-text"><b>Encontrado em</b>: Curitiba, Cristo Rei</p>
                                <p class="card-text"><b>Doador</b>: Guilherme Medeiros</p>
                                <p class="card-text"><b>Raça</b>: Não definida</p>
                                <p class="card-text"><b>Idade</b>: 2 anos</p>
                            </div>
                            <div class="card-footer">
                                <a href="#" class="btn btn-dark btn-lg btn-block">Mais detalhes</a>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4 p-rel">
                        <div class="card">
                            <img src="{{ asset('assets/general/imgs/card-pet-doacao.jpg') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text"><b>Identificação</b>: Não Informada</p>
                                <p class="card-text"><b>Encontrado em</b>: Curitiba, Cristo Rei</p>
                                <p class="card-text"><b>Doador</b>: Guilherme Medeiros</p>
                                <p class="card-text"><b>Raça</b>: Não definida</p>
                                <p class="card-text"><b>Idade</b>: 2 anos</p>
                            </div>
                            <div class="card-footer">
                                <a href="#" class="btn btn-dark btn-lg btn-block">Mais detalhes</a>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4 p-rel">
                        <div class="card">
                            <img src="{{ asset('assets/general/imgs/card-pet-doacao.jpg') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text"><b>Identificação</b>: Não Informada</p>
                                <p class="card-text"><b>Encontrado em</b>: Curitiba, Cristo Rei</p>
                                <p class="card-text"><b>Doador</b>: Guilherme Medeiros</p>
                                <p class="card-text"><b>Raça</b>: Não definida</p>
                                <p class="card-text"><b>Idade</b>: 2 anos</p>
                            </div>
                            <div class="card-footer">
                                <a href="#" class="btn btn-dark btn-lg btn-block">Mais detalhes</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <span class="search-more">
                        Mais animais para doação
                    </span>
                </div>
            </div>

            <div class="container pd-sides-0 mg-top-7">
                <h4 class="title">Produtos e serviços</h4>
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 mg-sides-0">  
                    <div class="col mb-4 p-rel">
                        <div class="card">
                            <img src="{{ asset('assets/general/imgs/card-produtos-servicos.jpg') }}" class="card-img-top" alt="Ração dog">
                            <div class="card-body">
                                <p class="card-text text-center">Ração Seca Fórmula Natural Fresh</p>
                                <p class="card-text f-size-2 text-center"><b>R$19,00</b></p>
                            </div>
                            <div class="card-footer">
                                <a href="#" class="btn btn-dark btn-lg btn-block">Mais detalhes</a>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4 p-rel">
                        <div class="card">
                            <img src="{{ asset('assets/general/imgs/card-produtos-servicos.jpg') }}" class="card-img-top card-height" alt="Ração dog">
                            <div class="card-body">
                                <p class="card-text text-center">Ração Seca Fórmula Natural Fresh</p>
                                <p class="card-text f-size-2 text-center"><b>R$19,00</b></p>
                            </div>
                            <div class="card-footer">
                                <a href="#" class="btn btn-dark btn-lg btn-block">Mais detalhes</a>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4 p-rel">
                        <div class="card">
                            <img src="{{ asset('assets/general/imgs/card-produtos-servicos.jpg') }}" class="card-img-top" alt="Ração dog">
                            <div class="card-body">
                                <p class="card-text text-center">Ração Seca Fórmula Natural Fresh</p>
                                <p class="card-text f-size-2 text-center"><b>R$19,00</b></p>
                            </div>
                            <div class="card-footer">
                                <a href="#" class="btn btn-dark btn-lg btn-block">Mais detalhes</a>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4 p-rel">
                        <div class="card">
                            <img src="{{ asset('assets/general/imgs/card-produtos-servicos.jpg') }}" class="card-img-top" alt="Ração dog">
                            <div class="card-body">
                                <p class="card-text text-center">Ração Seca Fórmula Natural Fresh</p>
                                <p class="card-text f-size-2 text-center"><b>R$19,00</b></p>
                            </div>
                            <div class="card-footer">
                                <a href="#" class="btn btn-dark btn-lg btn-block">Mais detalhes</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <span class="search-more">
                        Mais produtos e serviços
                    </span>
                </div>
            </div>

            <div class="container-fluid mg-sides-0 pd-sides-0 mg-top-7">
                <div class="row dblock mg-sides-0">  
                    <div id="carouselExampleCaptions1" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleCaptions1" data-slide-to="3" class="active"></li>
                            <li data-target="#carouselExampleCaptions1" data-slide-to="4"></li>
                            <li data-target="#carouselExampleCaptions1" data-slide-to="5"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('assets/general/imgs/banner2.jpg') }}" class="d-block w-100" alt="banner4">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('assets/general/imgs/banner2.jpg') }}" class="d-block w-100" alt="banner5">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('assets/general/imgs/banner2.jpg') }}" class="d-block w-100" alt="banner6">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleCaptions1" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleCaptions1" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>

            </div>

            <div class="container pd-sides-0 mg-top-4">
                <h4 class="title">Parceiros</h4>
                <div class="row row-cols-xs-1 row-cols-md-2 mg-sides-0">  
                    <div class="card mb-4" style="max-width: 540px;">
                        <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset('assets/general/imgs/card-loja-pet.jpg') }}" class="card-img-top" alt="Ração dog">      
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                            <h5 class="card-title"><b>Pet Shop 100 animais</b></h5>
                            <p class="card-text">Curitiba, PR</p>
                            <p class="card-text"><small class="text-muted"><a href="#" class="btn btn-dark btn-lg btn-block">Mais detalhes</a></small></p>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="card mb-4" style="max-width: 540px;">
                        <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset('assets/general/imgs/card-loja-pet.jpg') }}" class="card-img-top" alt="Ração dog">      
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                            <h5 class="card-title"><b>Pet Shop 100 animais</b></h5>
                            <p class="card-text">Curitiba, PR</p>
                            <p class="card-text"><small class="text-muted"><a href="#" class="btn btn-dark btn-lg btn-block">Mais detalhes</a></small></p>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="card mb-4" style="max-width: 540px;">
                        <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset('assets/general/imgs/card-loja-pet.jpg') }}" class="card-img-top" alt="Ração dog">      
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                            <h5 class="card-title"><b>Pet Shop 100 animais</b></h5>
                            <p class="card-text">Curitiba, PR</p>
                            <p class="card-text"><small class="text-muted"><a href="#" class="btn btn-dark btn-lg btn-block">Mais detalhes</a></small></p>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- LINHA 2 -->
                    <div class="card mb-4" style="max-width: 540px;">
                        <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset('assets/general/imgs/card-loja-pet.jpg') }}" class="card-img-top" alt="Ração dog">      
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                            <h5 class="card-title"><b>Pet Shop 100 animais</b></h5>
                            <p class="card-text">Curitiba, PR</p>
                            <p class="card-text"><small class="text-muted"><a href="#" class="btn btn-dark btn-lg btn-block">Mais detalhes</a></small></p>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="card mb-4" style="max-width: 540px;">
                        <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset('assets/general/imgs/card-loja-pet.jpg') }}" class="card-img-top" alt="Ração dog">      
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                            <h5 class="card-title"><b>Pet Shop 100 animais</b></h5>
                            <p class="card-text">Curitiba, PR</p>
                            <p class="card-text"><small class="text-muted"><a href="#" class="btn btn-dark btn-lg btn-block">Mais detalhes</a></small></p>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="card mb-4" style="max-width: 540px;">
                        <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset('assets/general/imgs/card-loja-pet.jpg') }}" class="card-img-top" alt="Ração dog">      
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                            <h5 class="card-title"><b>Pet Shop 100 animais</b></h5>
                            <p class="card-text">Curitiba, PR</p>
                            <p class="card-text"><small class="text-muted"><a href="#" class="btn btn-dark btn-lg btn-block">Mais detalhes</a></small></p>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center mg-top-1">
                    <span class="search-more">
                        Seja um parceiro
                    </span>
                </div>
            </div>

            <div class="container pd-sides-0 mg-top-4">
                <h4 class="title">Contribuidores</h4>
                <div class="row row-cols-xs-1 row-cols-md-2 mg-sides-0">  
                    <div class="card mb-4" style="max-width: 540px;">
                        <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="card-body">
                            <h5 class="card-title f-ini"><b>José Marques</b></h5>
                            <p class="card-text">Colaborador desde 01/01/2020</p>
                            <p class="card-text">Curitiba, PR</p>
                            <p class="card-text"><small class="text-muted"><a href="#" class="btn btn-dark btn-lg btn-block">(41) 3333-3333</a></small></p>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="card mb-4" style="max-width: 540px;">
                        <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="card-body">
                            <h5 class="card-title f-ini"><b>José Marques</b></h5>
                            <p class="card-text">Colaborador desde 01/01/2020</p>
                            <p class="card-text">Curitiba, PR</p>
                            <p class="card-text"><small class="text-muted"><a href="#" class="btn btn-dark btn-lg btn-block">(41) 3333-3333</a></small></p>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="card mb-4" style="max-width: 540px;">
                        <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="card-body">
                            <h5 class="card-title f-ini"><b>José Marques</b></h5>
                            <p class="card-text">Colaborador desde 01/01/2020</p>
                            <p class="card-text">Curitiba, PR</p>
                            <p class="card-text"><small class="text-muted"><a href="#" class="btn btn-dark btn-lg btn-block">(41) 3333-3333</a></small></p>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- LINHA 2 -->
                    <div class="card mb-4" style="max-width: 540px;">
                        <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="card-body">
                            <h5 class="card-title f-ini"><b>José Marques</b></h5>
                            <p class="card-text">Colaborador desde 01/01/2020</p>
                            <p class="card-text">Curitiba, PR</p>
                            <p class="card-text"><small class="text-muted"><a href="#" class="btn btn-dark btn-lg btn-block">(41) 3333-3333</a></small></p>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="card mb-4" style="max-width: 540px;">
                        <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="card-body">
                            <h5 class="card-title f-ini"><b>José Marques</b></h5>
                            <p class="card-text">Colaborador desde 01/01/2020</p>
                            <p class="card-text">Curitiba, PR</p>
                            <p class="card-text"><small class="text-muted"><a href="#" class="btn btn-dark btn-lg btn-block">(41) 3333-3333</a></small></p>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="card mb-4" style="max-width: 540px;">
                        <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="card-body">
                            <h5 class="card-title f-ini"><b>José Marques</b></h5>
                            <p class="card-text">Colaborador desde 01/01/2020</p>
                            <p class="card-text">Curitiba, PR</p>
                            <p class="card-text"><small class="text-muted"><a href="#" class="btn btn-dark btn-lg btn-block">(41) 3333-3333</a></small></p>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 text-center mg-top-1 mg-bottom-7">
                    <span class="search-more">
                        Seja um contribuidor
                    </span>
                </div>
            </div>

        </body>
    </main>
@endsection