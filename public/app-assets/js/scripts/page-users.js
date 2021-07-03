$(document).ready(function () {

  // variable declaration
  var usersTable;
  var usersDataArray = [];
  // datatable initialization
  if ($("#users-list-datatable").length > 0) {
    usersTable = $("#users-list-datatable").DataTable({
      responsive: true,
      'columnDefs': [{
        "orderable": false,
        "targets": [0, 8, 9]
      }]
    });
  };
  });
  