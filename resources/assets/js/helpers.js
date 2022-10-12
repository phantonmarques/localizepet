let logDebug = function (message) {

    try {
        if (typeof (console) == 'object') {

            if (typeof (console.log) == 'function') {

                console.log(message);
            }
        }
    } catch (e) { }
};

let usdToBrl = function (val, empty) {
    if (!val) {
        return empty ? '' : '0,00';
    }

    val = $.trim(val);
    val = val.replace(/[^\d\.]/g, '');
    val = number_format(val, 2, ',', '.');
    return val;
};

let brlToUsd = function (val, empty, string) {

    if (!val) {
        return empty ? '' : (string ? '0.00' : 0.00);
    }

    val = $.trim(val);
    val = val.replace(/[^\d\,]/g, '');
    val = val.replace(',', '.');
    val = string ? number_format(val, 2, '.', '') : parseFloat(val);

    return val;
};

let getCsrfToken = function () {

    return $.trim($('meta[name="csrf-token"]').attr('content') || '');
};

let number_format = function (number, decimals, decPoint, thousandsSep) {

    // http://locutus.io/php/number_format/

    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    let n = !isFinite(+number) ? 0 : +number;
    let prec = !isFinite(+decimals) ? 0 : Math.abs(decimals);
    let sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep;
    let dec = (typeof decPoint === 'undefined') ? '.' : decPoint;
    let s = '';

    let toFixedFix = function (n, prec) {
        let k = Math.pow(10, prec);
        return '' + (Math.round(n * k) / k)
            .toFixed(prec)
    };

    // @todo: for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep)
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0')
    }

    return s.join(dec)
};

let str_replace = function (search, replace, subject, countObj) {

    //  http://locutus.io/php/str_replace/

    let i = 0;
    let j = 0;
    let temp = '';
    let repl = '';
    let sl = 0;
    let fl = 0;
    let f = [].concat(search);
    let r = [].concat(replace);
    let s = subject;
    let ra = Object.prototype.toString.call(r) === '[object Array]';
    let sa = Object.prototype.toString.call(s) === '[object Array]';
    s = [].concat(s);

    let $global = (typeof window !== 'undefined' ? window : global);
    $global.$locutus = $global.$locutus || {};
    let $locutus = $global.$locutus;
    $locutus.php = $locutus.php || {};

    if (typeof (search) === 'object' && typeof (replace) === 'string') {
        temp = replace;
        replace = [];
        for (i = 0; i < search.length; i += 1) {
            replace[i] = temp
        }
        temp = '';
        r = [].concat(replace);
        ra = Object.prototype.toString.call(r) === '[object Array]'
    }

    if (typeof countObj !== 'undefined') {
        countObj.value = 0
    }

    for (i = 0, sl = s.length; i < sl; i++) {
        if (s[i] === '') {
            continue
        }
        for (j = 0, fl = f.length; j < fl; j++) {
            temp = s[i] + '';
            repl = ra ? (r[j] !== undefined ? r[j] : '') : r[0];
            s[i] = (temp).split(f[j]).join(repl);
            if (typeof countObj !== 'undefined') {
                countObj.value += ((temp.split(f[j])).length - 1)
            }
        }
    }
    return sa ? s : s[0]
};

let array_merge = function () {
    //  discuss at: http://locutus.io/php/array_merge/

    let args = Array.prototype.slice.call(arguments);
    let argl = args.length;
    let arg;
    let retObj = {};
    let k = '';
    let argil = 0;
    let j = 0;
    let i = 0;
    let ct = 0;
    let toStr = Object.prototype.toString;
    let retArr = true;

    for (i = 0; i < argl; i++) {
        if (toStr.call(args[i]) !== '[object Array]') {
            retArr = false;
            break
        }
    }

    if (retArr) {
        retArr = [];
        for (i = 0; i < argl; i++) {
            retArr = retArr.concat(args[i])
        }
        return retArr
    }

    for (i = 0, ct = 0; i < argl; i++) {
        arg = args[i];
        if (toStr.call(arg) === '[object Array]') {
            for (j = 0, argil = arg.length; j < argil; j++) {
                retObj[ct++] = arg[j]
            }
        } else {
            for (k in arg) {
                if (arg.hasOwnProperty(k)) {
                    if (parseInt(k, 10) + '' === k) {
                        retObj[ct++] = arg[k]
                    } else {
                        retObj[k] = arg[k]
                    }
                }
            }
        }
    }

    return retObj
};

let cleanPlaceholder = function (value) {

    return typeof value == 'string' ? value.replace(/[_]/g, '') : '';
};

let fillSelect = function (data, select, trigger) {

    data = data ? data : [];

    select = typeof select == 'object' ? select : $(select);

    if (data.length) {

        select.html(select_option.select + select_option.empty);

        data.forEach(function (item) {

            select.append(
                select_option.default
                    .replace('_VALUE_', item.id)
                    .replace('_TEXT_', item.name)
                    .replace('_ATTRIBUTES_', item.attributes || '')
            );
        });

    } else {

        select.html(select_option.void);
    }

    if (trigger) {

        setTimeout(
            function () {
                select.trigger('change');
            },
            100
        );
    }
};

let getAjax = function (route, callback, something) {

    logDebug('getAjax start');

    route = $.trim(route);

    if (typeof callback != 'function') {

        callback = function (a, b, c) {

            logDebug('callback function not reported');
        }
    }

    if (route.length) {
        $.ajax({
            url: route,
            type: 'GET',
            dataType: 'JSON',
            success: function (result) {

                callback(true, result, something);
            },
            error: function (jqXHR, textStatus, errorThrown) {

                logDebug(jqXHR);
                logDebug(textStatus);
                logDebug(errorThrown);

                callback(false, [], something);
            },
            complete: function () {

                logDebug('getAjax end');
            }
        });
    } else {
        callback(false, [], something);
    }
};

let isValidEmail = function (email) {

    return (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($.trim(email)));
};

/**
 * Remove acentos.
 * Exemplo: Troca á por a, ó por o, ...
 *
 * @param {string} string
 */
let removeAcents = function (string) {

    try {

        string = $.trim(string);

        let result = '',
            count = string.length;

        if (count) {

            let acentos = 'ÁÈôÇáèÒçÂËòâëÑÀñàðÕÅõÝåÍÖýÃíöãÎÄîÚäÌúìÛÏûïÙÉùéÓÜÊóüêÔ';

            string = string.split('');

            let semacentosArray = 'AEoCaeOcAEoaeNAnaoOAoYaIOyAioaIAiUaIuiUIuiUEueOUEoueO'.split(''),
                index = 0;

            for (let i = 0; i < count; i++) {

                index = acentos.indexOf(string[i]);

                result += (index >= 0) ? semacentosArray[index] : string[i];
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
let ajaxRequestValidationErrors = function (jqXHR, glue) {

    let errors = {},
        result = [];

    try {
        errors = jqXHR.responseJSON.errors || {};
    } catch (e) {
        errors = {};
    }

    try {

        // Caso exista um retorno negativo emitido pela validação na Request...

        if (Object.keys(errors).length) {

            for (let i in errors) {

                result.push(errors[i].join('<br/>'));
            }

        }

    } catch (e) { }

    return result.join(glue || '<br/>');
};

let dateBr = function (value, separator, year2digits) {

    value = $.trim(value);
    separator = separator ? separator : '/';

    if (separator == '/' && (/(\d{2}\/\d{2}\/\d{4})/.test(value)))
        return value;

    if (separator == '-' && (/(\d{2}\-\d{2}\-\d{4})/.test(value)))
        return value;

    if (!(/(\d{4}\-\d{2}\-\d{2})/.test(value)))
        return value;

    value = value.split('-');

    let year = parseInt(value[0]),
        month = parseInt(value[1]),
        day = parseInt(value[2]),
        result = [];

    year = year2digits ? $.trim(year).substr(2) : year;

    result.push(day <= 9 ? '0' + day : day);
    result.push(month <= 9 ? '0' + month : month);
    result.push(year);

    return result.join(separator);
};

// Funcao utilizada para atilet os plugins nos campos após adiciona-lo
let activePlugins = function (container) {

    setTimeout(
        function () {

            container = (container && typeof container == 'object') ? container : $('body');

            activePluginMaskMoney(container);
            activePluginMaskMoneyVMasker(container);
            activePluginDatePicker(container);
            activePluginSelect2(container);
            activePluginMaskedInput(container);
            activePluginIOS7Switch(container);
            activePluginPopover(container);
        },
        200
    );
}

let activePluginMaskMoney = function (container) {
    setTimeout(
        function () {
            if (typeof $.fn['themePluginMaskMoney'] == 'function') {

                container.find('[data-plugin-mask-money]').themePluginMaskMoney();
            }
        },
        200
    );
}

let activePluginMaskMoneyVMasker = function (container) {
    setTimeout(
        function () {
            if (typeof $.fn['maskMoney'] == 'function') {

                if (typeof VMasker == 'function') {

                    $(function () {

                        $('[data-vanilla-masker-mask-money]').each(function (i, e) {

                            VMasker(document.getElementById($(e).attr('id'))).maskMoney();
                        });
                    });
                }
            }
        },
        200
    );
}

let activePluginDatePicker = function (container) {
    setTimeout(
        function () {
            if (typeof $.fn['themePluginDatePicker'] == 'function') {

                container.find('[data-plugin-datepicker]').themePluginDatePicker();
            }
        },
        200
    );
}

let activePluginSelect2 = function (container) {
    setTimeout(
        function () {
            if (typeof $.fn['themePluginSelect2'] == 'function') {

                container.find('[data-plugin-selecttwo]').themePluginSelect2();
            }
        },
        200
    );
}

let activePluginMaskedInput = function (container) {
    setTimeout(
        function () {
            if (typeof $.fn['mask'] == 'function') {

                if (typeof $.fn['themePluginMaskedInput'] == 'function') {

                    container.find('[data-plugin-masked-input]').each(function () {

                        let $this = $(this);

                        $this.themePluginMaskedInput($this.data('plugin-options') || {});
                    });
                }
            }
        },
        200
    );
}

let activePluginIOS7Switch = function (container) {
    setTimeout(
        function () {
            if (typeof $.fn['themePluginIOS7Switch'] == 'function') {

                container.find('[data-plugin-ios-switch]').themePluginIOS7Switch();
            }
        },
        200
    );
}

let activePluginPopover = function (container) {
    setTimeout(
        function () {
            if (typeof $.fn['popover'] == 'function') {

                container.find('[data-toggle="popover"]').popover();
            }
        },
        200
    );
}

let reinitializeJqueryValidator = function (validator, form, options) {

    setTimeout(
        function () {

            if (validator && typeof validator == 'object') {

                if (typeof validator.destroy == 'object') {

                    if (form && typeof form == 'object') {

                        options = (options && typeof options == 'object') ? options : { ignore: [] };

                        validator.destroy();

                        form.validate(options);
                    }
                }
            }
        },
        200
    );
}

$.fn.enterKey = function (fnc) {
    return this.each(function () {
        $(this).keypress(function (ev) {
            let keycode = (ev.keyCode ? ev.keyCode : ev.which);
            if (keycode == '13') {
                fnc.call(this, ev);
            }
        })
    })
}

$.fn.serializeObject = function () {
    let data = {};

    function buildInputObject(arr, val) {
        if (arr.length < 1) {
            return val;
        }
        let objkey = arr[0];
        if (objkey.slice(-1) == "]") {
            objkey = objkey.slice(0, -1);
        }
        let result = {};
        if (arr.length == 1) {
            result[objkey] = val;
        } else {
            arr.shift();
            let nestedVal = buildInputObject(arr, val);
            result[objkey] = nestedVal;
        }
        return result;
    }

    function gatherMultipleValues(that) {
        let final_array = [];
        $.each(that.serializeArray(), function (key, field) {
            // Copy normal fields to final array without changes
            if (field.name.indexOf('[]') < 0) {
                final_array.push(field);
                return true; // That's it, jump to next iteration
            }

            // Remove "[]" from the field name
            let field_name = field.name.split('[]')[0];

            // Add the field value in its array of values
            let has_value = false;
            $.each(final_array, function (final_key, final_field) {
                if (final_field.name === field_name) {
                    has_value = true;
                    final_array[final_key]['value'].push(field.value);
                }
            });
            // If it doesn't exist yet, create the field's array of values
            if (!has_value) {
                final_array.push({ 'name': field_name, 'value': [field.value] });
            }
        });
        return final_array;
    }

    // Manage fields allowing multiple values first (they contain "[]" in their name)
    let final_array = gatherMultipleValues(this);

    // Then, create the object
    $.each(final_array, function () {
        let val = this.value;
        let c = this.name.split('[');
        let a = buildInputObject(c, val);
        $.extend(true, data, a);
    });

    return data;
};