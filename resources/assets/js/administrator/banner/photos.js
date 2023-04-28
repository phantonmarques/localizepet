if (typeof Dropzone === 'function') {

    Dropzone.autoDiscover = false;

    $(function () {
        
        myDropzone = new Dropzone('div#dropzone-banner', {
            url: $('#upload').val(),
            uploadMultiple: false,
            parallelUploads: 50,
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
            dictRemoveFile: '<i class="far fa-trash-alt"></i>',
            dictResponseError: 500,
            autoProcessQueue: true,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            removedfile: function removedfile(file) {

                let ref;
                if (file.previewElement) {
                    if ((ref = file.previewElement) != null) {
                        ref.parentNode.removeChild(file.previewElement);
                    }
                }

                return this._updateMaxFilesReachedClass();
            },
            init: function () {

                $.ajax({
                    url: $('#load').val(),
                    data: {
                        type: $('#type').val()
                    },
                    dataType: 'JSON',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    success: function (result) {

                        Array.prototype.slice.call(result.files).forEach(function (value) {

                            let mockFile = {
                                name: '',
                                size: value.size,
                                image: value.image,
                                dateUpdate: value.dateUpdate,
                                dateCreate: value.dateCreate,
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

                    if (file.image) {

                        file.previewElement.querySelector(".dz-size").remove();
                        file.previewElement.querySelector(".dz-filename").remove();
                        file.previewElement.querySelector(".dz-progress").remove();

                        $(file.previewElement).append(`
                            <input type="hidden" name="images[]" value="` + file.image + `" />

                            <div class="hidden">
                                <a class="ag-ligthbox-trigger" href="#" rel="` + file.image + `" 
                                    title="Adicionada em: ` + (file.dateCreate || '') + `"></a>
                                <button type="button" class="btn btn-link btn-xs pull-left text-danger ag-delete-image">
                                    <i class="fa fa-trash-o fa-lg">` + (file.dateUpdate ? '' : ' &nbsp; <b>Excluir</b>') + `</i>
                                </button>
                                <small class="pull-right text-muted">` + (file.dateUpdate || '') + `</small>
                            </div>
                        `)
                    }
                });

                this.on('success', function (file, response, e) {

                    file.previewElement.querySelector(".dz-size").remove();
                    file.previewElement.querySelector(".dz-filename").remove();
                    file.previewElement.querySelector(".dz-progress").remove();

                    $(file.previewElement).append(`
                        <input type="hidden" name="images[]" value="` + response.image + `" />
                        <div class="hidden">
                            <a class="ag-ligthbox-trigger" href="#" rel="` + response.image + `"></a>
                            <button type="button" class="btn btn-link btn-xs pull-left text-danger ag-delete-image">
                                <i class="fa fa-trash-o fa-lg">&nbsp; <b>Excluir</b></i>
                                </button>
                            <small class="pull-right text-muted"></small>
                        </div>
                    `);

                });

                this.on('errormultiple', function (file, response) {

                    file[0].previewElement.classList.remove("dz-processing");

                    $(file[0].previewElement).find('.dz-error-message').text(response.message);
                });

                this.on('complete', function (file) {

                    file.previewElement.classList.remove("dz-processing");
                });

                $(function () {
                    $(".dz-message").sortable({
                        items: '.dz-preview',
                        cursor: 'move',
                        opacity: 0.5,
                        containment: '#myDropzone',
                        distance: 20,
                        tolerance: 'pointer'
                    });
                })
            }
        });

        let photosContainer = $('div#dropzone-banner');

        photosContainer.on('click', '.dz-preview', function (e) {

            e.preventDefault();

            showPhoto($(this).index() - 1);

        });

        let showPhoto = function (fotoIndex) {

            let items = [],
                imageBase64 = '',
                imageTitle = '',
                $image = null;

            // Obtem os dados das fotos existentes para uso no magnificPopup.

            photosContainer.find('.ag-ligthbox-trigger').each(function () {

                $image = $(this);
                imageBase64 = $image.attr('rel') + '';
                imageTitle = '';

                if ($image.attr('title')) {
                    imageTitle = $image.attr('title') + '<br>Modificado em: ' + $image.parent().find('small').text();
                }

                if (imageBase64.length) {

                    items.push({
                        src: imageBase64,
                        title: imageTitle
                    });
                }
            });

            if (items.length) {

                // Inicia o lightbox já na foto clicada: fotoIndex.

                $.magnificPopup.open({
                    items: items,
                    type: 'image',
                    image: {
                        verticalFit: true
                    },
                    gallery: {
                        enabled: true
                    }
                }, fotoIndex);
            }

            return 0;
        };
    });
}
