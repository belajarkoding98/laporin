$('#example2').DataTable({
    lengthMenu: [
        [10, 25, 50, 100, 250, -1],
        ['10', '25', '50', '100', '250', 'Show all']
    ],
    "order": [
        [0, 'asc']
    ],
    dom: 'Blfrtip',
    buttons: ['copyHtml5', 'excelHtml5', 'pdfHtml5', 'csvHtml5']
});