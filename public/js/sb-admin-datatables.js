// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
      language: {
          url: 'localisation/Spanish.json'
      }
  });
});
