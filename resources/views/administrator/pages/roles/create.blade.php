@extends('administrator.templates.master', [
    'activeMenu'    => 'roles create',
    'title'         => 'Cadastrar Função',
    'titleError'    => trans('message_alert.error.create')
])

@section('content')
    <div class="row">
        <div class="col">
            <form id="pet-form" class="form-horizontal" method="POST" action="{{ route('administrator.roles.store') }}">

                @csrf

                <section class="card">
                    <header class="card-header">
                        <h2 class="card-title pt-2">
                            Nova Função
                        </h2>
                        <p class="card-subtitle">
                            É possível selecionar uma ou mais permissões para a função.
                        </p>
                    </header>
                    <div class="card-body pb-5">

                        @include('administrator.pages.roles.inputs.form')

                    </div>
                    <footer class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </footer>
                </section>
            </form>
        </div>
    </div>
@endsection

@push('page-js')
    <script src="{{ asset('vendor/jquery-validation/jquery.validate.js') }}"></script>
@endpush