$(document).ready(function() {
    // DataTable initialization
    var table = $('.datatables-permissions').DataTable({
        // Your DataTable configurations
        order: [
            [1, 'asc']
        ],
        dom: '<"d-flex justify-content-between align-items-center header-actions text-nowrap mx-1 row mt-75"' +
            '<"col-sm-12 col-lg-4 d-flex justify-content-center justify-content-lg-start" l>' +
            '<"col-sm-12 col-lg-8"<"dt-action-buttons d-flex align-items-center justify-content-lg-end justify-content-center flex-md-nowrap flex-wrap"<"me-1"f>B>>' +
            '><"text-nowrap" t>' +
            '<"d-flex justify-content-between mx-2 row mb-1"' +
            '<"col-sm-12 col-md-6"i>' +
            '<"col-sm-12 col-md-6"p>' +
            '>',
        language: {
            sLengthMenu: 'Show _MENU_',
            search: 'Search:',
            searchPlaceholder: 'Enter keyword...',
            paginate: {
                // remove previous & next text from pagination
                previous: '&nbsp;',
                next: '&nbsp;'
            }
        },
        searching: true, // Enable search functionality
        // Buttons with Dropdown
        buttons: [{
            text: 'Add Permission',
            className: 'add-new btn btn-primary mt-50',
            attr: {
                'data-bs-toggle': 'modal',
                'data-bs-target': '#addPermissionModal'
            },
            init: function(api, node, config) {
                $(node).removeClass('btn-secondary');
            }
        }]
    });
});
