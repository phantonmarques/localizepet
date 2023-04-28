@extends('administrator.templates.master', [
    'activeMenu'    => 'parameters animal-types create',
    'titleError'    => trans('message_alert.error.create'),
    'titleHead'     => 'Novo Tipo de Animal',
])

@section('content')
    <div class="row">
        <div class="col">
            <form id="pet-form" method="POST" action="{{ route('administrator.parameters.animal-types.store') }}"
                    class="form-horizontal">

                @csrf

                <section class="card">
                    <header class="card-header">
                        <h2 class="card-title pt-2">
                            Novo Tipo de Animal
                        </h2>
                    </header>
                    <div class="card-body">
                        @include('administrator.pages.parameters.animal-types.inputs.form')
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