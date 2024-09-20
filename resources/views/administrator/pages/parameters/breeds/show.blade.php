@extends('administrator.templates.master', [
    'activeMenu' => 'parameters breeds list',
    'title'      => 'Visualizar Raça de Animal'
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

                         <h2 class="card-title">{{ $breed->name }}</h2>
                    </header>
                    <div class="card-body">
                         <div class="row ps-md-5">
                              <div class="col-12 col-md-6">
                                   <div class="form-group">
                                        <label class="form-label font-weight-bold">Nome</label>
                                        <p>{{ $breed->name }}</p>
                                   </div>
                              </div>
                             <div class="col-12 col-md-6">
                                 <div class="form-group">
                                     <label class="form-label font-weight-bold">Espécie</label>
                                     <p>
                                         <a href="{{ route('administrator.parameters.species.edit', $breed->specie->id) }}"
                                            target="_blank">
                                             {{ $breed->specie->name }}
                                             &nbsp;<i class="fas fa-xs fa-external-link-alt"></i>
                                         </a>
                                     </p>
                                 </div>
                             </div>
                              <div class="col-12 col-md-6">
                                   <div class="form-group">
                                        <label class="form-label font-weight-bold">Tipo de Animal</label>
                                        <p>
                                             <a href="{{ route('administrator.parameters.animal-types.edit', $breed->specie->animal_type->id) }}"
                                                target="_blank">
                                                  {{ $breed->specie->animal_type->name }}
                                                  &nbsp;<i class="fas fa-xs fa-external-link-alt"></i>
                                             </a>
                                        </p>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <footer class="card-footer text-end">
                         <a href="{{ route('administrator.parameters.species.edit', $breed->id) }}" class="btn btn-primary">
                              Editar
                         </a>
                    </footer>

               </section>
          </div>
     </div>
@stop
