@extends('adminlte::page')

@section('title', 'Projeto Pet')

@section('content_header')
     <div class="row">
          <div class="col-sm-12">
               <nav aria-label="breadcrumb">
                    <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="#">Inicial</a></li>
                         <li class="breadcrumb-item"><a href="#">Usuários</a></li>
                         <li class="breadcrumb-item active" aria-current="page">Criar Usuário</li>
                    </ol>
               </nav>
          </div>
     </div>
     
@stop

@section('content')
     <div class="card">
          <div class="card-header"> 
               <h3 class="card-title">Criar Usuário</h3>
          </div>

          <div class="card-body">
               <div id="section">
                    <form autocomplete="off">

                         {{-- Start [Nome - E-mail] --}}

                         <div class="row justify-content-around">
                              <div class="form-group col-md-5">
                                   <label for="name" class="form-label">Nome <small class="required_icon">*</small></label>
                                   <input type="text" name="name" id="name" class="form-control" placeholder="Informar nome" required />
                              </div>
     
                              <div class="form-group col-md-5">
                                   <label for="name" class="form-label">E-mail <small class="required_icon">*</small></label>
                                   <input type="email" name="email" id="email" class="form-control" placeholder="Informar e-mail" required />
                              </div>
                         </div>

                         {{-- Start [Senha - Confirmar Senha] --}}

                         <div class="row justify-content-around">
                              <div class="form-group col-md-5">
                                   <label for="password" class="form-label">Senha <small class="required_icon">*</small></label>
                                   <div class="input-group">
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Informar senha" required />
                                        <div class="input-group-append">
                                             <span class="input-group-text">
                                                  <i class="fas fa-eye" id="viewPassword"></i>
                                              </span>
                                        </div>
                                   </div> 
                              </div>
     
                              <div class="form-group col-md-5">
                                   <label for="password" class="form-label">Confirmar Senha <small class="required_icon">*</small></label>
                                   <div class="input-group">
                                        <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Informar senha novamente" required />
                                        <div class="input-group-append">
                                             <span class="input-group-text">
                                                  <i class="fas fa-eye" id="viewConfirmPassword"></i>
                                              </span>
                                        </div>
                                   </div> 
                              </div>
                         </div>

                         {{-- End [Senha - Confirmar Senha] --}}

                         {{-- Start [Contato - Site] --}}

                         <div class="row justify-content-around">
                              <div class="form-group col-md-5">
                                   <label for="name" class="form-label">Contato</label>
                                   <input type="text" name="contact" id="contact" class="form-control" placeholder="Informar número telefone/celular" />
                              </div>
     
                              <div class="form-group col-md-5">
                                   <label for="name" class="form-label">Site</label>
                                   <input type="text" name="site" id="site" class="form-control" placeholder="Informar site" />
                              </div>
                         </div>

                         {{-- End [Contato - Site] --}}

                         {{-- Start [Buscar Cidade - Tipo Usuário] --}}

                         <div class="row justify-content-around">
                              <div class="form-group col-md-5">
                                   <label for="search" class="form-label">Buscar Cidade</label>
                                   <div class="input-group">
                                        <input type="text" class="form-control" name="search" id="search" placeholder="Informe o nome da cidade">
                                        <div class="input-group-append">
                                          <button class="btn btn-default" type="button" id="search-action">Buscar</button>
                                        </div>
                                   </div>
                              </div>
                              <div class="form-group col-md-5">
                                   <label for="name" class="form-label">Tipo Usuário</label>
                                   <select name="role_user" id="role_user" class="form-control">
                                        <option>Selecione</option>
                                        @foreach ($roles as $role)
                                             <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                   </select>
                              </div>   
                         </div>

                         {{-- End [Buscar Cidade - Tipo Usuário] --}}


                         {{-- Start [Estado - Cidade] --}}

                         <div class="row justify-content-around">
                              <div class="form-group col-md-5">
                                   <label for="name" class="form-label">Estado <small class="required_icon">*</small></label>
                                   <select name="states" id="states" class="form-control" required >
                                        <option>Selecione</option>

                                        @foreach ($states as $state)
                                             <option value="{{ $state->id }}">{{ $state->name_visible }}</option>
                                        @endforeach

                                   </select>
                              </div>

                              <div class="form-group col-md-5">
                                   <label for="name" class="form-label">Cidade <small class="required_icon">*</small></label>
                                   <select name="states" id="states" class="form-control" required >
                                        <option>Selecione</option>
                                   </select>
                              </div>
                         </div>

                         {{-- End [Estado - Cidade] --}}

                         {{-- Start [Estado - Cidade] --}}

                         <div class="row justify-content-around">
                              <div class="col-md-11 text-right mt-4">
                                   <button type="submit" class="btn btn-default fs-5">Salvar</button>
                              </div>
                         </div>

                         {{-- End [Estado - Cidade] --}}

                         <input type="hidden" name="approved" id="approved" value="1" />
                         @csrf

                    </form>

                    
               </div>
          </div>
          
     </div>
@stop

@section('js')
     <script src="{{  asset('assets/panel/js/crud/create.js') }}"></script>
@stop

@section('css')
     <link rel="stylesheet" href="{{  asset('assets/panel/css/crud/create.css') }}">
@endsection

@section('footer')
     <strong>
          Copyright © 2021
     </strong>
     <div class="float-right d-none d-sm-inline-block">
          Desenvolvido por <b>@DanielMarques</b>
     </div>
@endsection