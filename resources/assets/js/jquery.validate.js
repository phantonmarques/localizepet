/**
 * @developer Daniel Marques Cabredo
 * @email dnl.flow@hotmail.com
 * @created 18/03/2022
 */

if ($.isFunction($.fn['validate'])) {
    $.extend( $.validator.messages, {
        required : 'Este campo é obrigatório.',
        remote : 'Por favor corrija este campo.',
        email : 'Por favor insira um endereço de email válido.',
        url : 'Por favor, insira um URL válido.',
        date : 'Por favor insira uma data válida.',
        dateISO : 'Por favor insira uma data válida (ISO).',
        number : 'Por favor, digite um número válido.',
        digits : 'Por favor, digite apenas dígitos.',
        equalTo : 'Por favor digite o mesmo valor novamente.',
        maxlength : $.validator.format( 'Por favor, digite mais de {0} caracteres.' ),
        minlength : $.validator.format( 'Por favor, insira pelo menos {0} caracteres.' ),
        rangelength : $.validator.format( 'Por favor digite um valor entre {0} e {1} caracteres de comprimento.' ),
        range : $.validator.format( 'Por favor digite um valor entre {0} e {1}.' ),
        max : $.validator.format( 'Por favor digite um valor menor ou igual a {0}.' ),
        min : $.validator.format( 'Por favor digite um valor maior ou igual a {0}.' ),
        step : $.validator.format( 'Por favor digite um múltiplo de {0}.' )
    } );

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

            _btn.html('<i class="fa fa-refresh fa-spin"></i> &nbsp; Enviando...')
                .attr('disabled', 'disabled');
        }

        setTimeout(
            function () {
                form.submit();
            },
            300
        );
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
    $.validator.addClassRules('nickName', {nickName: true, required: true, minlength: 6});

    // Nome e seobrenome
    $.validator.addMethod('firstAndLastName', function (value, element) {

        return this.optional(element) || /( )/.test($.trim(value));

    }, $.validator.format('Informe o nome e sobrenome.'));
    $.validator.addClassRules('firstAndLastName', {firstAndLastName: true, required: true});

    // Endereço
    $.validator.addMethod('address', function (value, element) {

        return this.optional(element) || /( )/.test($.trim(value));

    }, $.validator.format('Informe o tipo e o nome do logradouro.'));
    $.validator.addClassRules('address', {address: true, required: true});

    // Summernote Required
    $.validator.addMethod('summernoteRequired', function (value, element) {

        return $.trim(value || '').length >= 1;

    }, $.validator.format('Este campo é obrigatório..'));
    $.validator.addClassRules('summernoteRequired', {summernoteRequired: true});

    // Summernote MinLength
    $.validator.addMethod(
        'summernoteMinLength',
        $.validator.methods.minlength,
        $.validator.format('Por favor, insira pelo menos {0} caracteres.')
    );
    $.validator.addClassRules('summernoteMinLength', {summernoteMinLength: true});

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

            return true
        }
        else {
            $label.append(
                '<div class="error">Por favor, selecione pelo menos ' + $min + ' ite' + ($min > 1 ? 'ns' : 'm') + '.</div>'
            );

            return false;
        }

    }, null);
    $.validator.addClassRules('checkboxMin', {checkboxMin: true});

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

            return true
        }
        else {

            $label.append(
                '<div class="error">' +
                'Por favor, informe pelo menos ' + $min + ' ' + ($min > 1 ? $fieldName[1] : $fieldName[0]) + '.' +
                '</div>'
            );

            return false;
        }

    }, null);
    $.validator.addClassRules('inputArrayMin', {inputArrayMin: true});

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

                $this.addClass('error')
            }
        });

        if ($selectedCount >= $min) {

            return true
        }
        else {

            $label.append(
                '<div class="error">' +
                'Por favor, selecione pelo menos ' + $min + ' ' + ($min > 1 ? $fieldName[1] : $fieldName[0]) + '.' +
                '</div>'
            );

            return false;
        }

    }, null);
    $.validator.addClassRules('selectArrayMin', {selectArrayMin: true});

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

        if (!(/(\d{2}\/\d{2}\/\d{4})/.test(value)))
            return false;

        value = value.split('/');

        var day = parseInt(value[0]),
            month = parseInt(value[1]),
            year = parseInt(value[2]);

        if (day <= 0 || day > 31)
            return false;

        if (month <= 0 || month > 12)
            return false;

        return year >= 1000;

    }, $.validator.format('Informe uma data válida.'));
    $.validator.addClassRules('dateBr', {dateBr: true, required: true});

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

        if (!(/(\d{1,2}\:\d{2})/.test(value)))
            return false;

        value = value.split(':');

        var hour = parseInt(value[0]),
            minute = parseInt(value[1]);

        if (hour < 0 || hour > 23)
            return false;

        if (minute < 0 || minute > 59)
            return false;

        return true;

    }, $.validator.format('Informe um horário válido.'));
    $.validator.addClassRules('hourAndMinute', {hourAndMinute: true, required: true});

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
    $.validator.addClassRules('requiredMoney', {requiredMoney: true, required: true});
}