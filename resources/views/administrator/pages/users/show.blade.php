@extends('administrator.templates.master', [
    'activeMenu' => 'users list',
    'title'      => 'Visualizar Usuário'
])

@section('content')
     <div class="row">
          <div class="col-12">
               <section class="card mb-4">
                    <header class="card-header">
                         <div class="card-actions">
                              <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                              <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                         </div>

                         <h2 class="card-title">{{ $user->name }}</h2>
                    </header>
                    <div class="card-body pb-5">
                         <div class="row ps-md-5">
                              <div class="col-12 col-md-6">
                                   <div class="form-group">
                                        <label class="form-label font-weight-bold">Nome</label>
                                        <p>{{ $user->name }}</p>
                                   </div>
                              </div>
                              <div class="col-12 col-md-6">
                                   <div class="form-group">
                                        <label class="form-label font-weight-bold">E-mail</label>
                                        <p>{{ $user->email }}</p>
                                   </div>
                              </div>
                         </div>
                         <div class="row ps-md-5">
                              <div class="col-12 col-md-6">
                                   <div class="form-group">
                                        <label class="form-label font-weight-bold">Status</label>
                                        <p>{{ $user->email_verified_at ? 'Ativo' : 'Inativo' }}</p>
                                   </div>
                              </div>
                              <div class="col-12 col-md-6">
                                   <div class="form-group">
                                        <label class="form-label font-weight-bold">Função</label>
                                        <p>
                                             <a href="{{ route('administrator.roles.edit', $user->role->id) }}"
                                                target="_blank">
                                                  {{ $user->role ? $user->role->name : 'Usuário Comum' }}
                                                  &nbsp;<i class="fas fa-xs fa-external-link-alt"></i>
                                             </a>
                                        </p>
                                   </div>
                              </div>
                         </div>
                         <div class="row ps-md-5">
                              <div class="col-12 col-md-6">
                                   <div class="form-group">
                                        <label class="form-label font-weight-bold">Cidade</label>
                                        <p>{{ $user->city ? $user->city->name : null }}</p>
                                   </div>
                              </div>
                              <div class="col-12 col-md-6">
                                   <div class="form-group">
                                        <label class="form-label font-weight-bold">Estado</label>
                                        <p>{{ $user->city && $user->city->state ? $user->city->state->name : null }}</p>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <footer class="card-footer text-end">
                         <a href="{{ route('administrator.users.edit', $user->id) }}" class="btn btn-primary">
                              Editar
                         </a>
                    </footer>

               </section>
          </div>
     </div>
@stop