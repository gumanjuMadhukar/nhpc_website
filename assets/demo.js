
  var active_event;

  var dataTable; 
  $(function(){
      dataTable = $('#demoDatatable').DataTable({
          dom: 'Bfrtip',/*
          scrollX: true,*/
          "serverSide": true,
          "processing": true,

          buttons: [
          'copy', 'csv', 'excel', 'pdf', 'print'
          ],
          'ajax' : { url: _baseUrl +'admin/demo/json',type: 'POST' },
          columns: [
              { data: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
              },name: "sn", searchable: false },
              { data: "name",name: "name"},
              { data: "status",name: "status"},
              { data: function (data)  {
                    return 'Action'
              },name:'action', searchable: false},
          ],
      });
  });