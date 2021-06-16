(function ($) {
    'use strict';    

    $(document).ready(function () {
        $('.col-5-datatable').DataTable({
            language: {
                url: '/admin/vendors/datatables.net/js/french.json'
            },
            dom: 'Bfrtip',
            responsive: true,
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
            order: [0, "desc"],
            buttons: [
                {
                    extend: 'pdf',
                    text: '<i class="la la-file-export" data-toggle="popover" data-content="Enregistrer la liste en PDF." data-trigger="hover" data-original-title="PDF" />',
                    footer:true,
                    exportOptions: {
                        columns: [ 0, 1, 2, 3, 4, 5 ]
                    },
                },
                {
                    extend: 'excel',
                    text: '<i class="la la-file-excel" data-toggle="popover" data-content="Enregistrer la liste sur Excel." data-trigger="hover" data-original-title="Excel" />',
                    footer:true,
                    exportOptions: {
                        columns: [ 0, 1, 2, 3, 4, 5 ]
                    },
                },
                {
                    extend: 'print',
                    text: '<i class="la la-print" data-toggle="popover" data-content="Imprimer la liste sur papier." data-trigger="hover" data-original-title="Print" />',
                    footer:true,
                    exportOptions: {
                        columns: [ 0, 1, 2, 3, 4, 5 ]
                    },
                },
            ],

        });
        $('.col-4-datatable').DataTable({
            language: {
                url: '/admin/vendors/datatables.net/js/french.json'
            },
            dom: 'Bfrtip',
            responsive: true,
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
            order: [0, "desc"],
            buttons: [
                {
                    extend: 'pdf',
                    text: '<i class="la la-file-export" data-toggle="popover" data-content="Enregistrer la liste en PDF." data-trigger="hover" data-original-title="PDF" />',
                    footer:true,
                    exportOptions: {
                        columns: [ 0, 1, 2, 3, 4]
                    },
                },
                {
                    extend: 'excel',
                    text: '<i class="la la-file-excel" data-toggle="popover" data-content="Enregistrer la liste sur Excel." data-trigger="hover" data-original-title="Excel" />',
                    footer:true,
                    exportOptions: {
                        columns: [ 0, 1, 2, 3, 4]
                    },
                },
                {
                    extend: 'print',
                    text: '<i class="la la-print" data-toggle="popover" data-content="Imprimer la liste sur papier." data-trigger="hover" data-original-title="Print" />',
                    footer:true,
                    exportOptions: {
                        columns: [ 0, 1, 2, 3, 4]
                    },
                },
            ],

        });

        $('.right_col').css('min-height', 'auto');

    });


})(jQuery);