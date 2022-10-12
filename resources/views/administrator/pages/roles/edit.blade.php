@extends('administrator.templates.master', [
    'activeMenu'    => 'roles create',
    'title'         => 'Editar Função',
    'titleError'    => trans('message_alert.error.update')
])

@section('content')
    <div class="row">
        <div class="col">
            <form id="pet-form" class="form-horizontal" action="{{ route('administrator.roles.update', $role->id) }}"
            method="POST">

                @csrf
                @method('PUT')

                <section class="card">
                    <header class="card-header">
                        <h2 class="card-title pt-2">
                            Editar Função
                        </h2>
                        <p class="card-subtitle">
                            É possível selecionar uma ou mais permissões para a função.
                        </p>
                    </header>
                    <div class="card-body pb-5">

                        @include('administrator.pages.roles.inputs.form')

                    </div>
                    <footer class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </footer>
                </section>
            </form>
        </div>
    </div>
@endsection

@push('page-js')
    <script src="{{ asset('vendor/jquery-validation/jquery.validate.js') }}"></script>
@endpush