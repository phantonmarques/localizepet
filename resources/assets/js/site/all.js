$( document ).ready(function() {
     if ( document.getElementById('message-error') !== null ) {
          setTimeout( function() {
               document.getElementById('message-error').style.display = 'none';
          }, 5000 );
     }
});