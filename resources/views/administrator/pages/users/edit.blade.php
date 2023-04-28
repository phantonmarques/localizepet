@extends('administrator.templates.master', [
    'activeMenu'    => 'users create',
    'titleError'    => trans('message_alert.error.update'),
    'titleHead'     => 'Editar Usuário',
])

@section('content')
    <div class="row">
        <div class="col">
            <form id="pet-form" class="form-horizontal" action="{{ route('administrator.users.update', $user->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <section class="card card-info-custom">
                    <header class="card-header">
                        <h2 class="card-title pt-2">
                            Editar Usuário
                        </h2>
                    </header>
                    <div class="card-body">
                        @include('administrator.pages.users.inputs.form')
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
    <script src="{{ asset('js/administrator/user/create.js') }}"></script>
@endpush