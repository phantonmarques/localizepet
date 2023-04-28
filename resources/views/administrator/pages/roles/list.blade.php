@extends('administrator.templates.master', [
    'activeMenu' => 'roles list',
    'title'      => 'Listagem de Funções'
])

@section('content')
    <div class="row">
        <div class="col">
            <section class="card">
                <header class="card-header">
                    <div class="pull-right">
                        <a href="{{ route('administrator.roles.create') }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-sm fa-plus"></i>
                            Nova Função
                        </a>
                    </div>
                </header>
                <div class="card-body">

                    <table class="table table-bordered table-hover table-striped mb-0" id="tb_list">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Permissões</th>
                                <th>Operações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>
                                        {{ $role->id }}
                                    </td>
                                    <td>
                                        {{ $role->name }}
                                    </td>
                                    <td>
                                        @if ($role->isAdmin())

                                            <span class="badge badge badge-info">Permissão total</span>
                                        @else

                                            @foreach($role->permissions()->pluck('name') as $permission)
                                                <span class="badge badge badge-info">{{ $permission }}</span>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td class="actions d-flex justify-content-center">
                                        @if ($role->isAdmin())

                                            <a href="{{ route('administrator.roles.show', $role->id) }}" id="view"
                                                class="mx-2" data-toggle="tooltip" data-placement="bottom"
                                                title="Visualizar">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                        @else

                                            <a href="{{ route('administrator.roles.edit', $role->id) }}" id="edit"
                                                class="mx-2" data-toggle="tooltip" data-placement="bottom"
                                                title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ route('administrator.roles.show', $role->id) }}" id="view"
                                                class="mx-2" data-toggle="tooltip" data-placement="bottom"
                                                title="Visualizar">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                            <a href="#" id="destroy" class="mx-2" data-id="{{ $role->id }}"
                                                data-toggle="tooltip" data-placement="bottom" title="Excluir">
                                                <form action="{{ route('administrator.roles.destroy', $role->id) }}"
                                                        method="post">

                                                    @method('delete')
                                                    @csrf

                                                    <input id="delete-item-{{ $role->id }}" class="hidden"
                                                            type="submit">
                                                    <span class="delete-item" data-id="{{ $role->id }}">
                                                        <i class="far fa-trash-alt"></i>
                                                    </span>
                                                </form>

                                            </a>
                                        @endif
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