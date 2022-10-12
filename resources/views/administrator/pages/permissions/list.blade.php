@extends('administrator.templates.master', [
    'activeMenu' => 'permissions list',
    'title'      => 'Listagem de Permissões'
])

@section('content')
    <div class="row">
        <div class="col">
            <section class="card">
                <header class="card-header">
                    <div class="pull-right">
                        <a href="{{ route('administrator.permissions.create') }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-sm fa-plus"></i>
                            Nova Permissão
                        </a>
                    </div>

                    <h2 class="card-title pt-2">
                        Permissões
                    </h2>
                </header>
                <div class="card-body">

                    <table class="table table-bordered table-hover table-striped mb-0" id="tb_permissions">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Operações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($permissions->count() > 0)

                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td>
                                            {{ $permission->id }}
                                        </td>
                                        <td>
                                            {{ $permission->name ?? null }}
                                        </td>
                                        <td class="actions d-flex justify-content-center">
                                            <a href="{{ route('administrator.permissions.edit', $permission->id) }}" id="edit"
                                               class="mx-2" data-toggle="tooltip" data-placement="bottom"
                                               title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" id="destroy" class="mx-2" data-id="{{ $permission->id }}"
                                               data-toggle="tooltip" data-placement="bottom" title="Excluir">
                                                <form action="{{ route('administrator.permissions.destroy', $permission->id) }}"
                                                      method="post">

                                                    @method('delete')
                                                    @csrf

                                                    <input id="delete-item-{{ $permission->id }}" class="hidden"
                                                           type="submit">
                                                    <span class="delete-item" data-id="{{ $permission->id }}">
                                                        <i class="far fa-trash-alt"></i>
                                                    </span>
                                                </form>

                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
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
    <script src="{{ asset('js/administrator/permission/list.js') }}"></script>
@endpush