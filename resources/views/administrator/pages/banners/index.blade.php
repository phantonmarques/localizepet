@extends('administrator.templates.master', [
    'activeMenu' => "banners banner-type-{$type}",
    'title'      => 'Banners do site'
])

@section('content')
    <div class="row">
        <div class="col">
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>
                    <h2 class="card-title">Banner do {{ trans("words.{$type}") }}</h2>
                </header>

                <form action="{{ route('administrator.banners.store') }}" method="POST">
                    <div class="card-body">

                        @csrf

                        <input type="hidden" id="load" name="load" value="{{ route('administrator.banners.load') }}">
                        <input type="hidden" id="upload" name="upload" value="{{ route('administrator.banners.upload') }}">
                        <input type="hidden" id="type" name="type" value="{{ $type }}">

                        <div class="dropzone dz-square" id="dropzone-banner">
                            <div class="dz-message" data-dz-message>
                                <span>Solte os arquivos aqui para enviar</span>
                            </div>
                        </div>
                    </div>
                    <footer class="card-footer text-end">
                        <input type="submit" class="btn btn-primary" value="Salvar">
                    </footer>
                </form>
            </section>
        </div>
    </div>
@stop

@push('page-css')
    <link rel="stylesheet" href="{{ asset('vendor/dropzone/min/basic.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/dropzone/min/dropzone.min.css') }}" />
@endpush

@push('page-js')
    <script src="{{ asset('vendor/dropzone/min/dropzone.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="{{ asset('js/administrator/banner/photos.js') }}"></script>
@endpush