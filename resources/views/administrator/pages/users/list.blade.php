@extends('administrator.templates.master', [
    'activeMenu' => 'users ' . ($filter ?? 'list'),
    'title'      => 'Listagem de usuários' . ($filter == 'trashed' ? ' excluídos' : '')
])

@section('content')
    <div class="row">
        <div class="col">
            <section class="card">
                <header class="card-header">
                    <div class="pull-right">
                        <a href="{{ route('administrator.users.create') }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-sm fa-plus"></i>
                            Novo Usuário
                        </a>
                    </div>
                </header>
                <div class="card-body">
                    <table class="table table-bordered table-hover table-striped mb-0" id="tb_list">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Função</th>
                                <th>E-mail</th>
                                <th>Contato</th>
                                <th>Cidade</th>
                                <th>Site</th>
                                <th>Operações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users ?? [] as $user)
                                <tr>
                                    <td>
                                        {{ $user->id }}
                                    </td>
                                    <td>
                                        {{ $user->name ?? null }}
                                    </td>
                                    <td>
                                        {{ $user->role->name ?? 'Usuário Comum' }}
                                    </td>
                                    <td>
                                        {{ $user->email ?? null }}
                                    </td>
                                    <td>
                                        {{ format_phone_br($user->contact ?? null) }}
                                    </td>
                                    <td>
                                        {{ $user->city->name ?? null }}
                                    </td>
                                    <td>
                                        {{ $user->site ?? null }}
                                    </td>
                                    <td class="actions d-flex justify-content-center">
                                        @if ($filter != 'trashed')
                                            <a href="{{ route('administrator.users.edit', $user->id) }}" id="edit"
                                                class="mx-2" data-toggle="tooltip" data-placement="bottom" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        @endif

                                        <a href="{{ route('administrator.users.show', $user->id) }}" id="view"
                                            class="mx-2" data-toggle="tooltip" data-placement="bottom" title="Visualizar">
                                            <i class="fas fa-info-circle"></i>
                                        </a>

                                        @if ($filter == 'trashed')
                                            <a href="{{ route('administrator.users.recover', $user->id) }}" id="recover"
                                                class="mx-2" data-toggle="tooltip" data-placement="bottom" title="Recuperar">
                                                <i class="fas fa-trash-restore"></i>
                                            </a>
                                        @else
                                            <a href="#" id="destroy" class="mx-2" data-id="{{ $user->id }}"
                                                data-toggle="tooltip" data-placement="bottom" title="Excluir">
                                                <form action="{{ route('administrator.users.destroy', $user->id) }}"
                                                        method="post">

                                                    @method('delete')
                                                    @csrf

                                                    <input id="delete-item-{{ $user->id }}" class="hidden"
                                                            type="submit">
                                                    <span class="delete-item" data-id="{{ $user->id }}">
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
@endsection

@push('page-js')
    <script src="{{ asset('vendor/datatables/extras/TableTools/Buttons-1.4.2/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/extras/TableTools/JSZip-2.5.0/jszip.min.js') }}"></script>
    <script src="{{ asset('js/administrator/list-tables.js') }}"></script>
@endpush