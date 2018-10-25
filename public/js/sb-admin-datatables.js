// Call the dataTables jQuery plugin
$(document).ready(function() {
    $('#dataTable').DataTable({
        language: {
            url: 'localisation/Spanish.json'
        }
    });
    $('table.table-multi').DataTable({
        language: {
            url: 'localisation/Spanish.json'
        }
    });




});
