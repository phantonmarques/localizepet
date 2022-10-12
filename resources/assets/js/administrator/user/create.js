$(function () {

    const baseUrl = $('html').data('base-url'),
          mainPhones = $('.main_phones'),
          selectCities = $('select#cities'),
          selectState = $('select#states'),
          switchOnly = $('.switch-only .ios-switch');

    /* Stated selected Event */
    selectState.on('change', function () {

         fillCities(this.value);
    });

    if (selectCities.data('initial') && selectState.data('initial')) {

        fillCities(selectState.data('initial'), selectCities.data('initial'));
    } else {

        console.log('cai aqui')

        selectState.val('');
    }

    function fillCities(stateId, cityId = null) {

        selectCities.empty().append(
            $('<option>', {
                text: 'Necessário selecionar antes um estado!',
                value: '',
                selected: !stateId
            })
        );

        if (stateId) {

            $.get( baseUrl + '/search-cities/' + stateId, null, function(response) {

                $.each(response, function (key, value) {

                    selectCities.append(
                        $('<option>', {
                            value: key,
                            text: value,
                            selected: (cityId !== null && cityId === parseInt(key))
                        })
                    );
                });
            });
        }
    }

    /* Only checked */
    switchOnly.on('click', function () {

        let active = $(this).hasClass('on');

        $('.switch-only .ios-switch.on').removeClass('on').addClass('off');

        if (active) {
            $(this).addClass('on');
        } else {
            $(this).removeClass('off');
        }
    });

    mainPhones.on('change', function () {

        let inputCheck = this.checked;
        let inputNumber = $(this).data('attribute-number');

        mainPhones.prop('checked', false);

        if (inputCheck) {

            mainPhones.removeAttr('required');
            $('.phone-mask').removeAttr('required');
            $('#' + inputNumber).attr('required', '');

            this.checked = true;
            this.required = true;
        }
    });
});