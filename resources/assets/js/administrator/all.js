import '../helpers.js'
import '../jquery.validate.js'

$(function() {

    'use strict';

    const colorBtnSave = '#0088CC';
    const colorBtnReject = '#dc3741';

    /** Forms */
    let petForm = $('#pet-form');

    if (petForm.get(0) && $.isFunction($.fn['validate'])) {

        petForm.validate({ ignore: [] });
    }

    /** Include mask phone */
    const behaviorPhone = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    }, options = {
        onKeyPress: function (val, e, field, options) {
            field.mask(behaviorPhone.apply({}, arguments), options);
        }
    };

    $('.phone-mask').mask(behaviorPhone, options);

    /**
     * Collects the data referring to the menu that must be active.
     *
     * @type {string[]}
     */
    let activeMenu = ($.trim( $('aside.sidebar-left ul.nav-main').data('active-menu') )).split(' ');

    if (activeMenu.length && activeMenu[0] !== '') {

        let navParent = $('aside.sidebar-left ul.nav-main .' + activeMenu[0] + '.nav-parent');

        navParent = navParent.get(0) ? navParent : $('aside.sidebar-left ul.nav-main .' + activeMenu[0] + '.nav-without-children');

        if (navParent.get(0)) {
            /**
             * Adds the classes needed to expand the active menu and yours itens.
             */
            navParent.addClass( 'nav-expanded nav-active' )
                .find( 'li.' + activeMenu[1] ).addClass( 'nav-expanded nav-active' )
                .find( 'li.' + activeMenu[2] ).addClass( 'nav-expanded nav-active' )
                .find( 'li.' + activeMenu[3] ).addClass( 'nav-active' );

        }
    }

    /**
     * Delete item
     */
    $('.delete-item').on('click', function () {

        let itemId = $(this).data('id');

        Swal.fire({
            title: 'Deseja continuar a exclusão?',
            icon: 'question',
            showCancelButton: true,
            showConfirmButton: true,
            cancelButtonColor: colorBtnReject,
            confirmButtonColor: colorBtnSave,
            confirmButtonText: 'Sim',
            cancelButtonText: 'Não',
        }).then((result) => {
            if (result.isConfirmed) {
                $('#delete-item-' + itemId).click();
            }
        })


    });
});
