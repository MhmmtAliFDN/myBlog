// Setup module

const DatatableButtonsHtml5 = function() {

    // Setup module components

    // Basic Datatable examples
    const _componentDatatableButtonsHtml5 = function() {
        if (!$().DataTable) {
            console.warn('Warning - datatables.min.js is not loaded.');
            return;
        }

        // Setting datatable defaults
        $.extend( $.fn.dataTable.defaults, {
            autoWidth: false,
            columnDefs: [{
                orderable: false,
                width: 100,
                targets: [ 5 ]
            }],

            dom: '<"datatable-header justify-content-start"f<"ms-sm-auto"l><"ms-sm-3"B>><"datatable-scroll-wrap"t><"datatable-footer"ip>',
            language: {
                search: '<span class="me-3">Filtrele:</span> <div class="form-control-feedback form-control-feedback-end flex-fill">_INPUT_<div class="form-control-feedback-icon"><i class="ph-magnifying-glass opacity-50"></i></div></div>',
                searchPlaceholder: 'Filtreye göre ara...',
                lengthMenu: '<span class="me-3">Adet:</span> _MENU_',
                paginate: { 'first': 'First', 'last': 'Last', 'next': document.dir == "rtl" ? '&larr;' : '&rarr;', 'previous': document.dir == "rtl" ? '&rarr;' : '&larr;' }
            }
        });

        // Column selectors
        $('.my-datatable-extensions').DataTable({
            buttons: {
                buttons: [
                    {
                        extend: 'selectAll',
                        className: 'btn btn-light'
                    },
                    {
                        extend: 'selectNone',
                        className: 'btn btn-light'
                    },
                    {
                        extend: 'copyHtml5',
                        className: 'btn btn-light',
                        text: 'Kopyala',
                        exportOptions: {
                            columns: [ 0, ':visible' ]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        className: 'btn btn-light',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        className: 'btn btn-light',
                        exportOptions: {
                            columns: [0, 1, 2, 5]
                        }
                    },
                    {
                        extend: 'print',
                        className: 'btn btn-light',
                        text: 'Yazdır'
                    },
                    {
                        extend: 'colvis',
                        text: '<i class="ph-list"></i>',
                        className: 'btn btn-light btn-icon dropdown-toggle'
                    },
                ],
                stateSave: true,
            },

            columnDefs: [
                {
                    orderable: false,
                    className: 'select-checkbox',
                    targets: 0
                },
                {
                    orderable: false,
                    width: 100,
                    targets: 6
                },
                {
                    targets: [-3,-5,-7,-8],
                    visible: false
                }
            ],
            select: {
                style: 'multi',
                selector: 'td:first-child'
            },
            order: [[1, 'asc']]
        });
    };

    // Return objects assigned to module

    return {
        init: function() {
            _componentDatatableButtonsHtml5();
        }
    }
}();


// Initialize module

document.addEventListener('DOMContentLoaded', function() {
    DatatableButtonsHtml5.init();
});
