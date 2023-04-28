/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 5);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/administrator/banner/photos.js":
/*!************************************************************!*\
  !*** ./resources/assets/js/administrator/banner/photos.js ***!
  \************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

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
        var ref;

        if (file.previewElement) {
          if ((ref = file.previewElement) != null) {
            ref.parentNode.removeChild(file.previewElement);
          }
        }

        return this._updateMaxFilesReachedClass();
      },
      init: function init() {
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
          success: function success(result) {
            Array.prototype.slice.call(result.files).forEach(function (value) {
              var mockFile = {
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
          error: function error(jqXHR, textStatus, errorThrown) {
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
            $(file.previewElement).append("\n                            <input type=\"hidden\" name=\"images[]\" value=\"" + file.image + "\" />\n\n                            <div class=\"hidden\">\n                                <a class=\"ag-ligthbox-trigger\" href=\"#\" rel=\"" + file.image + "\" \n                                    title=\"Adicionada em: " + (file.dateCreate || '') + "\"></a>\n                                <button type=\"button\" class=\"btn btn-link btn-xs pull-left text-danger ag-delete-image\">\n                                    <i class=\"fa fa-trash-o fa-lg\">" + (file.dateUpdate ? '' : ' &nbsp; <b>Excluir</b>') + "</i>\n                                </button>\n                                <small class=\"pull-right text-muted\">" + (file.dateUpdate || '') + "</small>\n                            </div>\n                        ");
          }
        });
        this.on('success', function (file, response, e) {
          file.previewElement.querySelector(".dz-size").remove();
          file.previewElement.querySelector(".dz-filename").remove();
          file.previewElement.querySelector(".dz-progress").remove();
          $(file.previewElement).append("\n                        <input type=\"hidden\" name=\"images[]\" value=\"" + response.image + "\" />\n                        <div class=\"hidden\">\n                            <a class=\"ag-ligthbox-trigger\" href=\"#\" rel=\"" + response.image + "\"></a>\n                            <button type=\"button\" class=\"btn btn-link btn-xs pull-left text-danger ag-delete-image\">\n                                <i class=\"fa fa-trash-o fa-lg\">&nbsp; <b>Excluir</b></i>\n                                </button>\n                            <small class=\"pull-right text-muted\"></small>\n                        </div>\n                    ");
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
        });
      }
    });
    var photosContainer = $('div#dropzone-banner');
    photosContainer.on('click', '.dz-preview', function (e) {
      e.preventDefault();
      showPhoto($(this).index() - 1);
    });

    var showPhoto = function showPhoto(fotoIndex) {
      var items = [],
          imageBase64 = '',
          imageTitle = '',
          $image = null; // Obtem os dados das fotos existentes para uso no magnificPopup.

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

/***/ }),

/***/ 5:
/*!******************************************************************!*\
  !*** multi ./resources/assets/js/administrator/banner/photos.js ***!
  \******************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\dnlfl\Projects\Localizepet\resources\assets\js\administrator\banner\photos.js */"./resources/assets/js/administrator/banner/photos.js");


/***/ })

/******/ });