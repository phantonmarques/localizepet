$(function() {
     $('#edit').tooltip({ boundary: 'window' });

     $('#view').tooltip({ boundary: 'window' });

     $('#destroy').tooltip({ boundary: 'window' });

     $('#destroy').click(function () {

          let id = $(this).data('id');

          $(`#delete-${id}`).click();
     });

     $('#tb_roles').dataTable({
          language: {
               lengthMenu: "Exibição _MENU_",
               zeroRecords: "Nenhum registro encontrado.",
               info: "Mostrando página _PAGE_ de _PAGES_",
               infoEmpty: "Nenhum resultado encontrado",
               infoFiltered: "(filtrado de _MAX_ resultados totais)",
               search: "<i class='fa-solid fa-magnifying-glass'></i>",
               searchPlaceholder: "Buscar...",
               decimal: ",",
               thousands: ".",
               paginate: {
                    "previous": '<i class="fas fa-chevron-left"></i>',
                    "next": '<i class="fas fa-chevron-right"></i>',
               },
          }
     });
});