@extends('administrator.templates.master', [
    'activeMenu' => 'parameters breeds list',
    'title'      => 'Listagem Raças Animais'
])

@section('content')
    <div class="row">
        <div class="col">
            <section class="card">
                <header class="card-header">
                    <div class="pull-right">
                        <a href="{{ route('administrator.parameters.breeds.create') }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-sm fa-plus"></i>
                            Nova Raça
                        </a>
                    </div>
                </header>
                <div class="card-body">

                    <table class="table table-bordered table-hover table-striped mb-0" id="tb_list">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Espécie</th>
                                <th>Tipo de animal</th>
                                <th>Operações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($breeds ?? [] as $breed)
                                <tr>
                                    <td>
                                        {{ $breed->id }}
                                    </td>
                                    <td>
                                        {{ $breed->name }}
                                    </td>
                                    <td>
                                        {{ $breed->specie->name ?? null }}
                                    </td>
                                    <td>
                                        {{ $breed->specie->animal_type->name ?? null }}
                                    </td>
                                    <td class="actions d-flex justify-content-center">
                                        <a href="{{ route('administrator.parameters.breeds.edit', $breed->id) }}" id="edit"
                                            class="mx-2" data-toggle="tooltip" data-placement="bottom" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('administrator.parameters.breeds.show', $breed->id) }}" id="view"
                                            class="mx-2" data-toggle="tooltip" data-placement="bottom" title="Visualizar">
                                            <i class="fas fa-info-circle"></i>
                                        </a>
                                        <a href="#" id="destroy" class="mx-2" data-id="{{ $breed->id }}"
                                            data-toggle="tooltip" data-placement="bottom" title="Excluir">
                                            <form action="{{ route('administrator.parameters.breeds.destroy', $breed->id) }}"
                                                    method="post">

                                                @method('delete')
                                                @csrf

                                                <input id="delete-item-{{ $breed->id }}" class="hidden"
                                                        type="submit">
                                                <span class="delete-item" data-id="{{ $breed->id }}">
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
