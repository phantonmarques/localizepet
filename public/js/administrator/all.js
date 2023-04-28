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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/webpack/buildin/global.js":
/*!***********************************!*\
  !*** (webpack)/buildin/global.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

var g;

// This works in non-strict mode
g = (function() {
	return this;
})();

try {
	// This works if eval is allowed (see CSP)
	g = g || new Function("return this")();
} catch (e) {
	// This works if the window reference is available
	if (typeof window === "object") g = window;
}

// g can still be undefined, but nothing to do about it...
// We return undefined, instead of nothing here, so it's
// easier to handle this case. if(!global) { ...}

module.exports = g;


/***/ }),

/***/ "./resources/assets/js/administrator/all.js":
/*!**************************************************!*\
  !*** ./resources/assets/js/administrator/all.js ***!
  \**************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helpers_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../helpers.js */ "./resources/assets/js/helpers.js");
/* harmony import */ var _helpers_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_helpers_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _jquery_validate_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../jquery.validate.js */ "./resources/assets/js/jquery.validate.js");
/* harmony import */ var _jquery_validate_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_jquery_validate_js__WEBPACK_IMPORTED_MODULE_1__);


$(function () {
  'use strict';
  /** Forms */

  var petForm = $('#pet-form');

  if (petForm.get(0) && $.isFunction($.fn['validate'])) {
    petForm.validate({
      ignore: []
    });
  }
  /** Include mask phone */


  var behaviorPhone = function behaviorPhone(val) {
    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
  },
      options = {
    onKeyPress: function onKeyPress(val, e, field, options) {
      field.mask(behaviorPhone.apply({}, arguments), options);
    }
  };

  $('.phone-mask').mask(behaviorPhone, options);
  /**
   * Collects the data referring to the menu that must be active.
   *
   * @type {string[]}
   */

  var activeMenu = $.trim($('aside.sidebar-left ul.nav-main').data('active-menu')).split(' ');

  if (activeMenu.length && activeMenu[0] !== '') {
    var navParent = $('aside.sidebar-left ul.nav-main .' + activeMenu[0] + '.nav-parent');
    navParent = navParent.get(0) ? navParent : $('aside.sidebar-left ul.nav-main .' + activeMenu[0] + '.nav-without-children');

    if (navParent.get(0)) {
      /**
       * Adds the classes needed to expand the active menu and yours itens.
       */
      navParent.addClass('nav-expanded nav-active').find('li.' + activeMenu[1]).addClass('nav-expanded nav-active').find('li.' + activeMenu[2]).addClass('nav-expanded nav-active').find('li.' + activeMenu[3]).addClass('nav-active');
    }
  }
});

/***/ }),

/***/ "./resources/assets/js/helpers.js":
/*!****************************************!*\
  !*** ./resources/assets/js/helpers.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(global) {function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

var logDebug = function logDebug(message) {
  try {
    if ((typeof console === "undefined" ? "undefined" : _typeof(console)) == 'object') {
      if (typeof console.log == 'function') {
        console.log(message);
      }
    }
  } catch (e) {}
};

var usdToBrl = function usdToBrl(val, empty) {
  if (!val) {
    return empty ? '' : '0,00';
  }

  val = $.trim(val);
  val = val.replace(/[^\d\.]/g, '');
  val = number_format(val, 2, ',', '.');
  return val;
};

var brlToUsd = function brlToUsd(val, empty, string) {
  if (!val) {
    return empty ? '' : string ? '0.00' : 0.00;
  }

  val = $.trim(val);
  val = val.replace(/[^\d\,]/g, '');
  val = val.replace(',', '.');
  val = string ? number_format(val, 2, '.', '') : parseFloat(val);
  return val;
};

var getCsrfToken = function getCsrfToken() {
  return $.trim($('meta[name="csrf-token"]').attr('content') || '');
};

var number_format = function number_format(number, decimals, decPoint, thousandsSep) {
  // http://locutus.io/php/number_format/
  number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
  var n = !isFinite(+number) ? 0 : +number;
  var prec = !isFinite(+decimals) ? 0 : Math.abs(decimals);
  var sep = typeof thousandsSep === 'undefined' ? ',' : thousandsSep;
  var dec = typeof decPoint === 'undefined' ? '.' : decPoint;
  var s = '';

  var toFixedFix = function toFixedFix(n, prec) {
    var k = Math.pow(10, prec);
    return '' + (Math.round(n * k) / k).toFixed(prec);
  }; // @todo: for IE parseFloat(0.55).toFixed(0) = 0;


  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');

  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }

  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }

  return s.join(dec);
};

var str_replace = function str_replace(search, replace, subject, countObj) {
  //  http://locutus.io/php/str_replace/
  var i = 0;
  var j = 0;
  var temp = '';
  var repl = '';
  var sl = 0;
  var fl = 0;
  var f = [].concat(search);
  var r = [].concat(replace);
  var s = subject;
  var ra = Object.prototype.toString.call(r) === '[object Array]';
  var sa = Object.prototype.toString.call(s) === '[object Array]';
  s = [].concat(s);
  var $global = typeof window !== 'undefined' ? window : global;
  $global.$locutus = $global.$locutus || {};
  var $locutus = $global.$locutus;
  $locutus.php = $locutus.php || {};

  if (_typeof(search) === 'object' && typeof replace === 'string') {
    temp = replace;
    replace = [];

    for (i = 0; i < search.length; i += 1) {
      replace[i] = temp;
    }

    temp = '';
    r = [].concat(replace);
    ra = Object.prototype.toString.call(r) === '[object Array]';
  }

  if (typeof countObj !== 'undefined') {
    countObj.value = 0;
  }

  for (i = 0, sl = s.length; i < sl; i++) {
    if (s[i] === '') {
      continue;
    }

    for (j = 0, fl = f.length; j < fl; j++) {
      temp = s[i] + '';
      repl = ra ? r[j] !== undefined ? r[j] : '' : r[0];
      s[i] = temp.split(f[j]).join(repl);

      if (typeof countObj !== 'undefined') {
        countObj.value += temp.split(f[j]).length - 1;
      }
    }
  }

  return sa ? s : s[0];
};

var array_merge = function array_merge() {
  //  discuss at: http://locutus.io/php/array_merge/
  var args = Array.prototype.slice.call(arguments);
  var argl = args.length;
  var arg;
  var retObj = {};
  var k = '';
  var argil = 0;
  var j = 0;
  var i = 0;
  var ct = 0;
  var toStr = Object.prototype.toString;
  var retArr = true;

  for (i = 0; i < argl; i++) {
    if (toStr.call(args[i]) !== '[object Array]') {
      retArr = false;
      break;
    }
  }

  if (retArr) {
    retArr = [];

    for (i = 0; i < argl; i++) {
      retArr = retArr.concat(args[i]);
    }

    return retArr;
  }

  for (i = 0, ct = 0; i < argl; i++) {
    arg = args[i];

    if (toStr.call(arg) === '[object Array]') {
      for (j = 0, argil = arg.length; j < argil; j++) {
        retObj[ct++] = arg[j];
      }
    } else {
      for (k in arg) {
        if (arg.hasOwnProperty(k)) {
          if (parseInt(k, 10) + '' === k) {
            retObj[ct++] = arg[k];
          } else {
            retObj[k] = arg[k];
          }
        }
      }
    }
  }

  return retObj;
};

var cleanPlaceholder = function cleanPlaceholder(value) {
  return typeof value == 'string' ? value.replace(/[_]/g, '') : '';
};

var fillSelect = function fillSelect(data, select, trigger) {
  data = data ? data : [];
  select = _typeof(select) == 'object' ? select : $(select);

  if (data.length) {
    select.html(select_option.select + select_option.empty);
    data.forEach(function (item) {
      select.append(select_option["default"].replace('_VALUE_', item.id).replace('_TEXT_', item.name).replace('_ATTRIBUTES_', item.attributes || ''));
    });
  } else {
    select.html(select_option["void"]);
  }

  if (trigger) {
    setTimeout(function () {
      select.trigger('change');
    }, 100);
  }
};

var getAjax = function getAjax(route, callback, something) {
  logDebug('getAjax start');
  route = $.trim(route);

  if (typeof callback != 'function') {
    callback = function callback(a, b, c) {
      logDebug('callback function not reported');
    };
  }

  if (route.length) {
    $.ajax({
      url: route,
      type: 'GET',
      dataType: 'JSON',
      success: function success(result) {
        callback(true, result, something);
      },
      error: function error(jqXHR, textStatus, errorThrown) {
        logDebug(jqXHR);
        logDebug(textStatus);
        logDebug(errorThrown);
        callback(false, [], something);
      },
      complete: function complete() {
        logDebug('getAjax end');
      }
    });
  } else {
    callback(false, [], something);
  }
};

var isValidEmail = function isValidEmail(email) {
  return /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($.trim(email));
};
/**
 * Remove acentos.
 * Exemplo: Troca á por a, ó por o, ...
 *
 * @param {string} string
 */


var removeAcents = function removeAcents(string) {
  try {
    string = $.trim(string);
    var result = '',
        count = string.length;

    if (count) {
      var acentos = 'ÁÈôÇáèÒçÂËòâëÑÀñàðÕÅõÝåÍÖýÃíöãÎÄîÚäÌúìÛÏûïÙÉùéÓÜÊóüêÔ';
      string = string.split('');
      var semacentosArray = 'AEoCaeOcAEoaeNAnaoOAoYaIOyAioaIAiUaIuiUIuiUEueOUEoueO'.split(''),
          index = 0;

      for (var i = 0; i < count; i++) {
        index = acentos.indexOf(string[i]);
        result += index >= 0 ? semacentosArray[index] : string[i];
      }
    }

    return result;
  } catch (e) {
    logDebug('removeAcents: Excpetion');
    return '';
  }
};
/**
 * Quando o Laravel detecta algum erro na Request Validation ele renorna as mensagens de erro no elemento 'errors'.
 * O que está função faz é tratar o retorno caso ele exista e retornar uma string contendo todos os erros.
 *
 * @param {object} jqXHR
 * @param {string} glue [ Default: <br/> | String utilizada na junção das mensagens de erro ]
 *
 * @returns {string}
 */


var ajaxRequestValidationErrors = function ajaxRequestValidationErrors(jqXHR, glue) {
  var errors = {},
      result = [];

  try {
    errors = jqXHR.responseJSON.errors || {};
  } catch (e) {
    errors = {};
  }

  try {
    // Caso exista um retorno negativo emitido pela validação na Request...
    if (Object.keys(errors).length) {
      for (var i in errors) {
        result.push(errors[i].join('<br/>'));
      }
    }
  } catch (e) {}

  return result.join(glue || '<br/>');
};

var dateBr = function dateBr(value, separator, year2digits) {
  value = $.trim(value);
  separator = separator ? separator : '/';
  if (separator == '/' && /(\d{2}\/\d{2}\/\d{4})/.test(value)) return value;
  if (separator == '-' && /(\d{2}\-\d{2}\-\d{4})/.test(value)) return value;
  if (!/(\d{4}\-\d{2}\-\d{2})/.test(value)) return value;
  value = value.split('-');
  var year = parseInt(value[0]),
      month = parseInt(value[1]),
      day = parseInt(value[2]),
      result = [];
  year = year2digits ? $.trim(year).substr(2) : year;
  result.push(day <= 9 ? '0' + day : day);
  result.push(month <= 9 ? '0' + month : month);
  result.push(year);
  return result.join(separator);
}; // Funcao utilizada para atilet os plugins nos campos após adiciona-lo


var activePlugins = function activePlugins(container) {
  setTimeout(function () {
    container = container && _typeof(container) == 'object' ? container : $('body');
    activePluginMaskMoney(container);
    activePluginMaskMoneyVMasker(container);
    activePluginDatePicker(container);
    activePluginSelect2(container);
    activePluginMaskedInput(container);
    activePluginIOS7Switch(container);
    activePluginPopover(container);
  }, 200);
};

var activePluginMaskMoney = function activePluginMaskMoney(container) {
  setTimeout(function () {
    if (typeof $.fn['themePluginMaskMoney'] == 'function') {
      container.find('[data-plugin-mask-money]').themePluginMaskMoney();
    }
  }, 200);
};

var activePluginMaskMoneyVMasker = function activePluginMaskMoneyVMasker(container) {
  setTimeout(function () {
    if (typeof $.fn['maskMoney'] == 'function') {
      if (typeof VMasker == 'function') {
        $(function () {
          $('[data-vanilla-masker-mask-money]').each(function (i, e) {
            VMasker(document.getElementById($(e).attr('id'))).maskMoney();
          });
        });
      }
    }
  }, 200);
};

var activePluginDatePicker = function activePluginDatePicker(container) {
  setTimeout(function () {
    if (typeof $.fn['themePluginDatePicker'] == 'function') {
      container.find('[data-plugin-datepicker]').themePluginDatePicker();
    }
  }, 200);
};

var activePluginSelect2 = function activePluginSelect2(container) {
  setTimeout(function () {
    if (typeof $.fn['themePluginSelect2'] == 'function') {
      container.find('[data-plugin-selecttwo]').themePluginSelect2();
    }
  }, 200);
};

var activePluginMaskedInput = function activePluginMaskedInput(container) {
  setTimeout(function () {
    if (typeof $.fn['mask'] == 'function') {
      if (typeof $.fn['themePluginMaskedInput'] == 'function') {
        container.find('[data-plugin-masked-input]').each(function () {
          var $this = $(this);
          $this.themePluginMaskedInput($this.data('plugin-options') || {});
        });
      }
    }
  }, 200);
};

var activePluginIOS7Switch = function activePluginIOS7Switch(container) {
  setTimeout(function () {
    if (typeof $.fn['themePluginIOS7Switch'] == 'function') {
      container.find('[data-plugin-ios-switch]').themePluginIOS7Switch();
    }
  }, 200);
};

var activePluginPopover = function activePluginPopover(container) {
  setTimeout(function () {
    if (typeof $.fn['popover'] == 'function') {
      container.find('[data-toggle="popover"]').popover();
    }
  }, 200);
};

var reinitializeJqueryValidator = function reinitializeJqueryValidator(validator, form, options) {
  setTimeout(function () {
    if (validator && _typeof(validator) == 'object') {
      if (_typeof(validator.destroy) == 'object') {
        if (form && _typeof(form) == 'object') {
          options = options && _typeof(options) == 'object' ? options : {
            ignore: []
          };
          validator.destroy();
          form.validate(options);
        }
      }
    }
  }, 200);
};

$.fn.enterKey = function (fnc) {
  return this.each(function () {
    $(this).keypress(function (ev) {
      var keycode = ev.keyCode ? ev.keyCode : ev.which;

      if (keycode == '13') {
        fnc.call(this, ev);
      }
    });
  });
};

$.fn.serializeObject = function () {
  var data = {};

  function buildInputObject(arr, val) {
    if (arr.length < 1) {
      return val;
    }

    var objkey = arr[0];

    if (objkey.slice(-1) == "]") {
      objkey = objkey.slice(0, -1);
    }

    var result = {};

    if (arr.length == 1) {
      result[objkey] = val;
    } else {
      arr.shift();
      var nestedVal = buildInputObject(arr, val);
      result[objkey] = nestedVal;
    }

    return result;
  }

  function gatherMultipleValues(that) {
    var final_array = [];
    $.each(that.serializeArray(), function (key, field) {
      // Copy normal fields to final array without changes
      if (field.name.indexOf('[]') < 0) {
        final_array.push(field);
        return true; // That's it, jump to next iteration
      } // Remove "[]" from the field name


      var field_name = field.name.split('[]')[0]; // Add the field value in its array of values

      var has_value = false;
      $.each(final_array, function (final_key, final_field) {
        if (final_field.name === field_name) {
          has_value = true;
          final_array[final_key]['value'].push(field.value);
        }
      }); // If it doesn't exist yet, create the field's array of values

      if (!has_value) {
        final_array.push({
          'name': field_name,
          'value': [field.value]
        });
      }
    });
    return final_array;
  } // Manage fields allowing multiple values first (they contain "[]" in their name)


  var final_array = gatherMultipleValues(this); // Then, create the object

  $.each(final_array, function () {
    var val = this.value;
    var c = this.name.split('[');
    var a = buildInputObject(c, val);
    $.extend(true, data, a);
  });
  return data;
};
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! ./../../../node_modules/webpack/buildin/global.js */ "./node_modules/webpack/buildin/global.js")))

/***/ }),

/***/ "./resources/assets/js/jquery.validate.js":
/*!************************************************!*\
  !*** ./resources/assets/js/jquery.validate.js ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * @developer Daniel Marques Cabredo
 * @email dnl.flow@hotmail.com
 * @created 18/03/2022
 */
if ($.isFunction($.fn['validate'])) {
  $.extend($.validator.messages, {
    required: 'Este campo é obrigatório.',
    remote: 'Por favor corrija este campo.',
    email: 'Por favor insira um endereço de email válido.',
    url: 'Por favor, insira um URL válido.',
    date: 'Por favor insira uma data válida.',
    dateISO: 'Por favor insira uma data válida (ISO).',
    number: 'Por favor, digite um número válido.',
    digits: 'Por favor, digite apenas dígitos.',
    equalTo: 'Por favor digite o mesmo valor novamente.',
    maxlength: $.validator.format('Por favor, digite mais de {0} caracteres.'),
    minlength: $.validator.format('Por favor, insira pelo menos {0} caracteres.'),
    rangelength: $.validator.format('Por favor digite um valor entre {0} e {1} caracteres de comprimento.'),
    range: $.validator.format('Por favor digite um valor entre {0} e {1}.'),
    max: $.validator.format('Por favor digite um valor menor ou igual a {0}.'),
    min: $.validator.format('Por favor digite um valor maior ou igual a {0}.'),
    step: $.validator.format('Por favor digite um múltiplo de {0}.')
  });
  $.validator.defaults.errorElement = 'div';
  /**
   * Adiciona a <div class="error"> dentro da tag <label>
   *
   * @param error
   * @param element
   */

  $.validator.defaults.errorPlacement = function (error, element) {
    if ($('html').hasClass('panel')) {
      $(element).parent().append(error);
    } else {
      $(element).closest('form').find("label[for='" + element.attr('id') + "']").append(error);
    }
  };
  /**
   * Adiciona uma mensagem abaixo do botão submit informando que existe(m) erros(s) no formulário.
   */


  $.validator.defaults.invalidHandler = function () {
    $('.form-erros-msg').remove();
  };
  /**
   * Modifica a aparência do botão submit e atrasa o envio do formulário.
   *
   * @param form
   */


  $.validator.defaults.submitHandler = function (form) {
    var _btn = $(form).find("button[type='submit']");

    if (_btn.get(0)) {
      _btn.html('<i class="fa fa-refresh fa-spin"></i> &nbsp; Enviando...').attr('disabled', 'disabled');
    }

    setTimeout(function () {
      form.submit();
    }, 300);
  };
  /**
   * Cria a regra de nome "nickname" com objetivo de validar os inputs "nick_names".
   *
   * Estes não podem conter @ para não correr o risco de permitir ao usuário de
   * cadastrar um nickname utilizando um e-mail, pois já existe um campo e-mail.
   *
   * Infelizmente as vezes não funciona utilizar 'rules:{}' no método 'validate' como no exemplo abaixo.
   * Então necessitamos criar uma 'classRule' para utilizar o método 'nickName' por nós criado.
   *
   * Exemplo de uso:
   *
   *  $( '#form_id' ).validate( {
   *      rules : {
   *          input_id : {
   *              required : true,
   *              nickname : true,
   *              minlength : 6
   *          }
   *      }
   * });
   */


  $.validator.addMethod('nickName', function (value, element) {
    return this.optional(element) || !/[\@]/.test(value);
  }, $.validator.format('O caractere @ não é permitido.'));
  $.validator.addClassRules('nickName', {
    nickName: true,
    required: true,
    minlength: 6
  }); // Nome e seobrenome

  $.validator.addMethod('firstAndLastName', function (value, element) {
    return this.optional(element) || /( )/.test($.trim(value));
  }, $.validator.format('Informe o nome e sobrenome.'));
  $.validator.addClassRules('firstAndLastName', {
    firstAndLastName: true,
    required: true
  }); // Endereço

  $.validator.addMethod('address', function (value, element) {
    return this.optional(element) || /( )/.test($.trim(value));
  }, $.validator.format('Informe o tipo e o nome do logradouro.'));
  $.validator.addClassRules('address', {
    address: true,
    required: true
  }); // Summernote Required

  $.validator.addMethod('summernoteRequired', function (value, element) {
    return $.trim(value || '').length >= 1;
  }, $.validator.format('Este campo é obrigatório..'));
  $.validator.addClassRules('summernoteRequired', {
    summernoteRequired: true
  }); // Summernote MinLength

  $.validator.addMethod('summernoteMinLength', $.validator.methods.minlength, $.validator.format('Por favor, insira pelo menos {0} caracteres.'));
  $.validator.addClassRules('summernoteMinLength', {
    summernoteMinLength: true
  });
  /**
   * checkboxMin
   *
   * Verifica se a quantidade de checkbox selecionados corresponde ao mínimo exigido.
   *
   * Necessário adicionar ao input:
   *      classe="checkboxMin"
   *      data-label="label#seletor" [ identifica o <label> que recebe a mensaem de erro. ]
   *      data-min="int" [ Quantidade mínima exigida | mínimo 1 ]
   */

  $.validator.addMethod('checkboxMin', function (value, element) {
    var $element = $(element);
    var $min = parseInt($element.data('min') || 1),
        $inputName = $element.attr('name'),
        $label = $($element.data('label') || '');
    $label.find('div.error').remove();

    if ($("input[name='" + $inputName + "']:checked").length >= $min) {
      $label.remove();
      return true;
    } else {
      $label.append('<div class="error">Por favor, selecione pelo menos ' + $min + ' ite' + ($min > 1 ? 'ns' : 'm') + '.</div>');
      return false;
    }
  }, null);
  $.validator.addClassRules('checkboxMin', {
    checkboxMin: true
  });
  /**
   * inputArrayMin
   *
   * Verifica se a quantidade de inputs populados corresponde ao mínimo exigido.
   *
   * Necessário adicionar ao input:
   *      classe="inputArrayMin"
   *      data-label="label#seletor" [ identifica o <label> que recebe a mensaem de erro. ]
   *      data-min="int" [ Quantidade mínima exigida | mínimo 1 ]
   *      data-field-name="singular|plural" [ Nome do campo no singular e no plural para uso na msg de erro ]
   *      name="something[]" [ Um imput Array deve obrigatóriamente possuri "[]" após o valor do attr "name" ]
   */

  $.validator.addMethod('inputArrayMin', function (value, element) {
    var $element = $(element);
    var $min = parseInt($element.data('min') || 1),
        $inputName = $element.attr('name').split('[')[0],
        $label = $($element.data('label') || ''),
        $fieldName = ($element.data('field-name') || 'item|itens').split('|'),
        $filled = 0;
    $label.find('div.error').remove();
    $("input[name^='" + $inputName + "[']").each(function () {
      if ($.trim($(this).val()).length) {
        $filled = $filled + 1;
      }
    });

    if ($filled >= $min) {
      $("input[name^='" + $inputName + "[']").removeClass('error');
      return true;
    } else {
      $label.append('<div class="error">' + 'Por favor, informe pelo menos ' + $min + ' ' + ($min > 1 ? $fieldName[1] : $fieldName[0]) + '.' + '</div>');
      return false;
    }
  }, null);
  $.validator.addClassRules('inputArrayMin', {
    inputArrayMin: true
  });
  /**
   * selectArrayMin
   *
   * Verifica se a quantidade de selects populados corresponde ao mínimo exigido.
   *
   * Necessário adicionar ao input:
   *      classe="selectArrayMin"
   *      data-label="label#seletor" [ identifica o <label> que recebe a mensaem de erro. ]
   *      data-min="int" [ Quantidade mínima exigida | mínimo 1 ]
   *      data-field-name="singular|plural" [ Nome do campo no singular e no plural para uso na msg de erro ]
   *      data-container="#container-dos-selects" [ Selects Array devem obrigatóriamente estar dentro do mesmo container ]
   */

  $.validator.addMethod('selectArrayMin', function (value, element) {
    var $element = $(element);
    var $min = parseInt($element.data('min') || 1),
        $selectContainer = $($element.data('container') || ''),
        $label = $($element.data('label') || ''),
        $fieldName = ($element.data('field-name') || 'item|itens').split('|'),
        $selectedCount = 0;
    $label.find('div.error').remove();
    $selectContainer.find('select').each(function () {
      var $this = $(this);
      $this.removeClass('error');

      if ($.trim($this.val()).length) {
        $selectedCount = $selectedCount + 1;
      } else {
        $this.addClass('error');
      }
    });

    if ($selectedCount >= $min) {
      return true;
    } else {
      $label.append('<div class="error">' + 'Por favor, selecione pelo menos ' + $min + ' ' + ($min > 1 ? $fieldName[1] : $fieldName[0]) + '.' + '</div>');
      return false;
    }
  }, null);
  $.validator.addClassRules('selectArrayMin', {
    selectArrayMin: true
  });
  /**
   * dateBr
   *
   * Verifica se a data está no formato brasileiro.
   * Validação super simples, sem validar ano bissexto e outros detalhes.
   *
   * Necessário adicionar ao input:
   *      classe="dateBr"
   */

  $.validator.addMethod('dateBr', function (value, element) {
    value = $.trim(value);
    if (!/(\d{2}\/\d{2}\/\d{4})/.test(value)) return false;
    value = value.split('/');
    var day = parseInt(value[0]),
        month = parseInt(value[1]),
        year = parseInt(value[2]);
    if (day <= 0 || day > 31) return false;
    if (month <= 0 || month > 12) return false;
    return year >= 1000;
  }, $.validator.format('Informe uma data válida.'));
  $.validator.addClassRules('dateBr', {
    dateBr: true,
    required: true
  });
  /**
   * hourAndMinute
   *
   * Verifica se a hora e minuto informados está correta.
   *
   * Necessário adicionar ao input:
   *      classe="hourAndMinute"
   */

  $.validator.addMethod('hourAndMinute', function (value, element) {
    value = $.trim(value);
    if (!/(\d{1,2}\:\d{2})/.test(value)) return false;
    value = value.split(':');
    var hour = parseInt(value[0]),
        minute = parseInt(value[1]);
    if (hour < 0 || hour > 23) return false;
    if (minute < 0 || minute > 59) return false;
    return true;
  }, $.validator.format('Informe um horário válido.'));
  $.validator.addClassRules('hourAndMinute', {
    hourAndMinute: true,
    required: true
  });
  /**
   * requiredMoney
   *
   * Verifica se o valor informado é maior ou igual a 0.01.
   *
   * Necessário adicionar ao input:
   *      class="requiredMoney" [Obrigatório]
   */

  $.validator.addMethod('requiredMoney', function (value, element) {
    return brlToUsd(value) >= 0.01;
  }, 'Este campo é obrigatório e deve conter um valor maior que zero.');
  $.validator.addClassRules('requiredMoney', {
    requiredMoney: true,
    required: true
  });
}

/***/ }),

/***/ 1:
/*!********************************************************!*\
  !*** multi ./resources/assets/js/administrator/all.js ***!
  \********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\dnlfl\Projects\Localizepet\resources\assets\js\administrator\all.js */"./resources/assets/js/administrator/all.js");


/***/ })

/******/ });