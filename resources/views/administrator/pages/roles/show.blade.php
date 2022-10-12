@extends('administrator.templates.master', [
    'activeMenu' => 'roles list',
    'title'      => 'Visualizar Função'
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

                    <h2 class="card-title">{{ $role->name }}</h2>
                </header>
                <div class="card-body pb-5">
                    <h4>Permissões relacionadas a essa função</h4>
                    <table class="table table-responsive-md table-hover mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Permissão</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rolePermissions as $permission)
                                <tr>
                                    <td>{{ $permission['id'] }}</td>
                                    <td>

                                        <a href="{{ route('administrator.permissions.edit', $permission['id']) }}"
                                           target="_blank">
                                            {{ $permission['name'] }}
                                            &nbsp;<i class="fas fa-xs fa-external-link-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if (false == $role->isAdmin())

                    <footer class="card-footer text-end">
                        <a href="{{ route('administrator.roles.edit', $role->id) }}" class="btn btn-primary">
                            Editar
                        </a>
                    </footer>
                @endif

            </section>
        </div>
    </div>
@stop