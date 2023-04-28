@extends('administrator.templates.master', [
    'activeMenu' => 'parameters species list',
    'title'      => 'Visualizar Espécie de Animal'
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

                         <h2 class="card-title">{{ $specie->name }}</h2>
                    </header>
                    <div class="card-body">
                         <div class="row ps-md-5">
                              <div class="col-12 col-md-6">
                                   <div class="form-group">
                                        <label class="form-label font-weight-bold">Nome</label>
                                        <p>{{ $specie->name }}</p>
                                   </div>
                              </div>
                              <div class="col-12 col-md-6">
                                   <div class="form-group">
                                        <label class="form-label font-weight-bold">Tipo de Animal</label>
                                        <p>
                                             <a href="{{ route('administrator.parameters.animal-types.edit', $specie->animal_type->id) }}"
                                                target="_blank">
                                                  {{ $specie->animal_type->name }}
                                                  &nbsp;<i class="fas fa-xs fa-external-link-alt"></i>
                                             </a>
                                        </p>
                                   </div>
                              </div>
                         </div> 
                    </div>

                    <footer class="card-footer text-end">
                         <a href="{{ route('administrator.parameters.species.edit', $specie->id) }}" class="btn btn-primary">
                              Editar
                         </a>
                    </footer>

               </section>
          </div>
     </div>
@stop