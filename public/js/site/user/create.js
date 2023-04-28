$(document).ready(function() {

    let petForm = $('#pet-form');

    if (petForm.get(0) && $.isFunction($.fn['validate'])) {

        petForm.validate({ ignore: [] });
    }

    $('input[type=password]').keyup(function() {

        let password = $(this).val();

        if ($(this).attr('id') === 'password_confirmation') {

            // Validate confirmed password
            if (password !==  $('#password').val() || password.trim().length === 0) {
                $('#confirmed').removeClass('valid-check').addClass('invalid-check');
            } else {
                $('#confirmed').removeClass('invalid-check').addClass('valid-check');
            }

        } else {

            // Validate the length
            if (password.trim().length < 8) {
                $('#length').removeClass('valid-check').addClass('invalid-check');
            } else {
                $('#length').removeClass('invalid-check').addClass('valid-check');
            }

            // Validate letter lowercase
            if (password.match(/[a-z]/)) {
                $('#letter').removeClass('invalid-check').addClass('valid-check');
            } else {
                $('#letter').removeClass('valid-check').addClass('invalid-check');
            }

            // Validate letter uppercase
            if (password.match(/[A-Z]/)) {
                $('#capital').removeClass('invalid-check').addClass('valid-check');
            } else {
                $('#capital').removeClass('valid-check').addClass('invalid-check');
            }

            // Validate number
            if (password.match(/\d/)) {
                $('#number').removeClass('invalid-check').addClass('valid-check');
            } else {
                $('#number').removeClass('valid-check').addClass('invalid-check');
            }

        }

    }).focus(function() {

        $('#password-info').show();
    }).blur(function() {

        $('#password-info').hide();
    });
});

