$(function() {
     $('#edit').tooltip({ boundary: 'window' });

     $('#view').tooltip({ boundary: 'window' });

     $('#destroy').tooltip({ boundary: 'window' });

     /** Translate itens datatable */
     $('#tb_list').dataTable({
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

     /** Delete Action */
     const colorBtnSave = '#0088CC';
     const colorBtnReject = '#dc3741';

     $("#tb_list").on("click", ".delete-item", function() {
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