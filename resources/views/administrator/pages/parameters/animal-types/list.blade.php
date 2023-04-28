@extends('administrator.templates.master', [
    'activeMenu' => 'parameters animal-types list',
    'title'      => 'Listagem Tipos de Animais'
])

@section('content')
    <div class="row">
        <div class="col">
            <section class="card">
                <header class="card-header">
                    <div class="pull-right">
                        <a href="{{ route('administrator.parameters.animal-types.create') }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-sm fa-plus"></i>
                            Novo Tipo de Animal
                        </a>
                    </div>
                </header>
                <div class="card-body">

                    <table class="table table-bordered table-hover table-striped mb-0" id="tb_list">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Operações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($animalTypes ?? [] as $animalType)
                                <tr>
                                    <td>
                                        {{ $animalType->id }}
                                    </td>
                                    <td>
                                        {{ $animalType->name }}
                                    </td>
                                    <td class="actions d-flex justify-content-center">
                                        <a href="{{ route('administrator.parameters.animal-types.edit', $animalType->id) }}" id="edit"
                                            class="mx-2" data-toggle="tooltip" data-placement="bottom"
                                            title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="#" id="destroy" class="mx-2" data-id="{{ $animalType->id }}"
                                            data-toggle="tooltip" data-placement="bottom" title="Excluir">
                                            <form action="{{ route('administrator.parameters.animal-types.destroy', $animalType->id) }}"
                                                    method="post">

                                                @method('delete')
                                                @csrf

                                                <input id="delete-item-{{ $animalType->id }}" class="hidden"
                                                        type="submit">
                                                <span class="delete-item" data-id="{{ $animalType->id }}">
                                                    <i class="far fa-trash-alt"></i>
                                                </span>
                                            </form>

                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
@stop

@push('page-js')
    <script src="{{ asset('vendor/datatables/extras/TableTools/Buttons-1.4.2/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/extras/TableTools/JSZip-2.5.0/jszip.min.js') }}"></script>
    <script src="{{ asset('js/administrator/list-tables.js') }}"></script>
@endpush