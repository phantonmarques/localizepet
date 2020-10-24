$( document ).ready(function() {
     let path = $('html').data('base-url') + '/search-city';
     
     $('input.typeahead').typeahead({
          source: function(terms, process) {
               return $.get(path, {terms:terms}, function(data) {
                    return process(data);
               })
          }
     });    

     let behaviorPhone = function (val) {
          return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
     }, options = {
          onKeyPress: function (val, e, field, options) {
               field.mask(behaviorPhone.apply({}, arguments), options);
          }
     };

     $('.contact').mask(behaviorPhone, options);

 });