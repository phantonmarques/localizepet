@extends('administrator.templates.master', [
    'activeMenu' => 'banners banners',
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

                    <h2 class="card-title">Banner do Cabeçalho</h2>
                </header>
                <div class="card-body">
                    <form action="{{ route('administrator.banners.upload') }}" class="dropzone dz-square" id="dropzone-header">
                        @csrf

                        <input type="hidden" id="load" name="load" value="{{ route('administrator.banners.types', ['header']) }}">

                        <div class="dz-message" data-dz-message>
                            <span>Solte os arquivos aqui para enviar</span>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>

                    <h2 class="card-title">Banner do Rodapé</h2>
                </header>
                <div class="card-body">
                    <form action="{{ route('administrator.banners.upload') }}" class="dropzone dz-square" id="dropzone-footer">
                        @csrf

                        <input type="hidden" id="type" name="type" value="footer">

                        <div class="dz-message" data-dz-message>
                            <span>Solte os arquivos aqui para enviar</span>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
@stop

@push('page-css')
    <link rel="stylesheet" href="{{ asset('vendor/dropzone/basic.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/dropzone/dropzone.css') }}" />
@endpush

@push('page-js')
    <script src="{{ asset('vendor/dropzone/dropzone.js') }}"></script>
    <script>

        Dropzone.autoDiscover = false;

        Dropzone.options.myDropzone = {
            paramName: "files", // The name that will be used to transfer the file
            uploadMultiple: true,
            parallelUploads: 1,
            maxFilesize: 10,
            addRemoveLinks: true,
            acceptedFiles: 'image/*',
            timeout: 300000,
            resizeMethod: 'contain',
            resizeQuality: 1,
            dictFileTooBig: 'Seu arquivo atingiu o limite de 10mb',
            dictInvalidFileType: 'Arquivo não correspode a uma imagem!',
            dictCancelUpload: '<i class="fa fa-ban fa-lg">',
            dictUploadCanceled: 'cancelado',
            dictCancelUploadConfirmation: 'Tem certeza que deseja cancelar o upload?',
            dictRemoveFile: '<i class="fa fa-trash-o fa-lg">',
            dictResponseError: 500,
            autoProcessQueue: true,
            removedfile: function removedfile(file) {

                var ref;
                if (file.previewElement) {
                    if ((ref = file.previewElement) != null) {
                        ref.parentNode.removeChild(file.previewElement);
                    }
                }

                getPercentageImagesQuantity();
                return this._updateMaxFilesReachedClass();
            },
            init: function () {

                let route_photos = $("input#route_photos").val();

                $.ajax({
                    url: route_photos,
                    type: 'POST',
                    dataType: 'JSON',
                    success: function (result) {

                        Array.prototype.slice.call(result.files).forEach(function (value) {

                            var mockFile = {
                                name: '',
                                size: '',
                                url: value.url,
                                alteracao: value.alteracao,
                                cadastro: value.cadastro,
                                thumb: value.thumb
                            };

                            myDropzone.emit("addedfile", mockFile);

                            myDropzone.emit("thumbnail", mockFile, value.thumb);

                        });

                    },
                    error: function (jqXHR, textStatus, errorThrown) {

                        console.log(jqXHR);
                        console.log(textStatus);
                        console.log(errorThrown);

                    }
                });

                this.on("addedfile", function (file) {

                    if (file.url) {

                        file.previewElement.querySelector(".dz-size").remove();
                        file.previewElement.querySelector(".dz-filename").remove();
                        file.previewElement.querySelector(".dz-progress").remove();

                        $(file.previewElement).append(`

                        <input type="hidden" name="urls[]" value="` + file.url + `" />

                        <div class="hidden">
                            <a class="ag-ligthbox-trigger"
                            href="#"
                            rel="` + file.url + `"
                            title="Adicionada em: ` + (file.cadastro || '') + `"></a>
                            <button type="button"
                                    class="btn btn-link btn-xs pull-left text-danger ag-delete-image">
                            <i class="fa fa-trash-o fa-lg">` + (file.alteracao ? '' : ' &nbsp; <b>Excluir</b>') + `</i>
                            </button>
                            <small class="pull-right text-muted">` + (file.alteracao || '') + `</small>
                        </div>

                    `)

                    }

                });

                this.on('successmultiple', function (file, response, e) {

                    file[0].previewElement.querySelector(".dz-size").remove();
                    file[0].previewElement.querySelector(".dz-filename").remove();
                    file[0].previewElement.querySelector(".dz-progress").remove();

                    $(file[0].previewElement).append(`

                <input type="hidden" name="urls[]" value="` + response.files[0].url + `" />
                <div class="hidden">
                    <a class="ag-ligthbox-trigger"
                    href="#"
                    rel="` + response.files[0].url + `"
                    title="Adicionada em: "></a>
                    <button type="button"
                            class="btn btn-link btn-xs pull-left text-danger ag-delete-image">
                    <i class="fa fa-trash-o fa-lg"></i>
                    </button>
                    <small class="pull-right text-muted"></small>
                </div>

                `);

                });

                this.on('errormultiple', function (file, response) {

                    file[0].previewElement.classList.remove("dz-processing")

                    $(file[0].previewElement).find('.dz-error-message').text(response.message);
                });

                this.on('complete', function (file) {

                    file.previewElement.classList.remove("dz-processing")
                });

                $(function () {
                    $("#myDropzone").sortable({
                        items: '.dz-preview',
                        cursor: 'move',
                        opacity: 0.5,
                        containment: '#myDropzone',
                        distance: 20,
                        tolerance: 'pointer'
                    });
                })
            }
        };

        var myDropzone = new Dropzone("div#myDropzone", {url: route_upload});
    </script>
@endpush