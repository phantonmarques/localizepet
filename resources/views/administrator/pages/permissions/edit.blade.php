@extends('administrator.templates.master', [
    'title'         => 'Editar Permissão',
    'activeMenu'    => 'permissions create',
    'titleError'    => trans('message_alert.error.update')
])

@section('content')
    <div class="row">
        <div class="col">
            <form id="pet-form" action="{{ route('administrator.permissions.update', $permission->id) }}" method="POST"
                class="form-horizontal">

                @csrf
                @method('PUT')

                <section class="card">
                    <header class="card-header">
                        <h2 class="card-title pt-2">
                            Editar Permissão
                        </h2>
                    </header>
                    <div class="card-body pb-5">

                        @include('administrator.pages.permissions.inputs.form')

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