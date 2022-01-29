@extends('adminlte::page')

@section('title', 'Projeto Pet')

@section('content_header')
     <div class="row">
          <div class="col-sm-12">
               <nav aria-label="breadcrumb">
                    <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="{{ route('administrator.home') }}">Home</a></li>
                         <li class="breadcrumb-item active" aria-current="page">Users</li>
                    </ol>
               </nav>
          </div>
     </div>
     
@stop

@section('content')
     <div class="card">
          <div class="card-header">
               <h3 class="card-title">Lista de Usuários</h3>
               <span class="float-right"><a href="{{ route('administrator.user.create') }}" class="btn-default">Criar Usuário</a></span>
          </div>

          <div class="card-body">
               <div id="section_table" class="dataTables_wrapper">
                    <table id="tb_users" class="table table-bordered table-hover dataTable dtr-inline table-responsive-md">
                         <thead class="table-dark">
                              <tr role="row">
                                   <th>#</th>
                                   <th>Nome</th>
                                   <th>Função</th>
                                   <th>E-mail</th>
                                   <th>Contato</th>
                                   <th>Cidade</th>
                                   <th>Site</th>
                                   <th>Status</th>
                                   <th></th>
                              </tr>
                         </thead>
                         <tbody>
                              @if ($users->count() > 0)
                                   @foreach ($users as $user)
                                        <tr>
                                             <td>{{ $user->id }}</td>
                                             <td>{{ $user->name ?? null }}</td>
                                             <td>
                                                  @foreach ($user->roles as $role)
                                                       {{  $role->name }}
                                                  @endforeach     
                                             </td>
                                             <td>{{ $user->email ?? null }}</td>
                                             <td>{{ formatPhone($user->contact) ?? null }}</td>
                                             <td>{{ $user->city->name_visible ?? null }}</td>
                                             <td>{{ $user->site ?? null }}</td>
                                             <td>{{ $user->approved ? 'Aprovado' : 'Pendente' }}</td>
                                             <td class="text-center s-nwrap">
                                                  <a href="{{ route('administrator.user.edit', $user->id) }}" id="edit" data-toggle="tooltip" data-placement="bottom" title="Editar" class="mr-2">
                                                       <i class="fas fa-edit"></i>
                                                  </a>
                                                  <a href="{{ route('administrator.user.show', $user->id) }}" id="view" data-toggle="tooltip" data-placement="bottom" title="Visualizar" class="mr-2">
                                                       <i class="fas fa-info-circle"></i>
                                                  </a>
                                                  <a href="{{ route('administrator.user.destroy', $user->id) }}" id="destroy" data-toggle="tooltip" data-placement="bottom" title="Excluir">
                                                       <i class="far fa-trash-alt"></i>
                                                  </a>                                              
                                             </td>
                                        </tr>
                                   @endforeach
                              @endif
                         </tbody>
                    </table>
               </div>
          </div>
          
     </div>
@stop

@section('js')
     <script src="{{  asset('assets/panel/js/crud/list.js') }}"></script>
@stop

@section('css')
     <link rel="stylesheet" href="{{  asset('assets/panel/css/crud/list.css') }}">
@endsection

@section('footer')
     <strong>
          Copyright © 2021
     </strong>
     <div class="float-right d-none d-sm-inline-block">
          Desenvolvido por <b>@DanielMarques</b>
     </div>
@endsection