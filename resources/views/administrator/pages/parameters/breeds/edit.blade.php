@extends('administrator.templates.master', [
    'activeMenu'    => 'parameters breeds create',
    'titleError'    => trans('message_alert.error.update'),
    'titleHead'     => 'Editar Raça de Animal',
])

@section('content')
    <div class="row">
        <div class="col">
            <form id="pet-form" action="{{ route('administrator.parameters.breeds.update', $breed->id) }}" method="POST"
                    class="form-horizontal">

                @csrf
                @method('PUT')

                <section class="card">
                    <header class="card-header">
                        <h2 class="card-title pt-2">
                            Editar Raça de Animal
                        </h2>
                    </header>
                    <div class="card-body">
                        @include('administrator.pages.parameters.breeds.inputs.form')
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