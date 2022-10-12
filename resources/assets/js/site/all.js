import '../helpers.js'
import '../jquery.validate.js'

$( document ).ready(function() {

     /* No Paste in input class */
     $('input.without-paste').bind('copy paste', function (e) {
          e.preventDefault();
     });

     /* Include input value only letters and numbers */
     $('.mask-letters-numbers').keypress(function (e) {

          let regex = new RegExp("^[a-zA-Z0-9._\b]+$");
          let str = String.fromCharCode(!e.charCode ? e.which : e.charCode);

          if (regex.test(str)) {
               return true;
          }

          e.preventDefault();

          return false;
     });

     /* Include mask phone */
     const behaviorPhone = function (val) {
          return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
     }, options = {
          onKeyPress: function (val, e, field, options) {
               field.mask(behaviorPhone.apply({}, arguments), options);
          }
     };

     $('.phone-mask').mask(behaviorPhone, options);

     /* Include Select2 in classes */
     $('.select2').select2();

     /* Messages temporary */
     if ( document.getElementById('message-error') !== null ) { // Message error display with 8 seconds
          setTimeout( function() {
               document.getElementById('message-error').style.display = 'none';
          }, 10000 );
     } else if ( document.getElementById('message-success') !== null ) { // Message success display with 8 seconds
          setTimeout( function() {
               document.getElementById('message-success').style.display = 'none';
          }, 10000 );
     }

     /* Logout user */
     $('.logout').on('click', function () {

          $('#logout').submit();
     });
});