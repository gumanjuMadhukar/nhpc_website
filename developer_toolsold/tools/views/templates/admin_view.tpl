<div class="page-header">
    <h1 class="page-title">{PHP_START}echo lang('{BREADCRUMB}'); {PHP_END}</h1>
    <ol class="breadcrumb">
      	<li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      	<li class="breadcrumb-item active"><a href="#">{PHP_START}echo lang('{BREADCRUMB}'); {PHP_END}</a></li>
    </ol>
    <div class="page-header-actions">
      	
		<a href="javascript::void(0)" id="create-{MODULE_TITLE}-button" class="btn btn-sm btn-primary btn-outline btn-round"  title="{PHP_START}echo lang('general_create'); {PHP_END}">
			<i class="icon wb-plus" aria-hidden="true"></i>
        	<span class="hidden-sm-down">Create</span>
		</a>

    </div>
</div>
<!-- Main content -->
<div class="page-content">
	<div class="panel">
		<header class="panel-heading">
		</header>
	  	<div class="panel-body">
	        <div class="table-responsive">
	          	<table style="width: 100% !important" class="table table-hover dataTable table-striped" id="{MODULE_TITLE}-table">
	                <thead>
	                  	<th>SN</th>
						{TABLE_FIELDS}
						<th>Action</th>
	                </thead>
	              	<tbody></tbody>
	          	</table>
	        </div>
			</div>
	</div>
</div>
<div id="{MODULE_TITLE}-modal" class="modal fade" role="dialog">
  	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add/Edit {MODULE_TITLE}</h4>
			</div>
			<div class="modal-body">
				{PHP_START}echo form_open('', array('id' =>'form-{MODULE}', 'onsubmit' => 'return false')); {PHP_END}
		        	<input type = "hidden" name = "id" id = "id"/>
		            {FORMFIELDS}
		        {PHP_START}echo form_close(); {PHP_END}
			</div>
			<div class="modal-footer">
				<button type="button" class="btn bg-green waves-effect" onClick="save()">{PHP_START}echo lang('general_save'); {PHP_END}</button>			
				<button type="button" class="btn btn-default" data-dismiss="modal">{PHP_START}echo lang('general_cancel'); {PHP_END}</button>
			</div>
		</div>

  	</div>
</div>

<script language="javascript" type="text/javascript">

	$(document).on('click','#create-{MODULE_TITLE}-button', function () { 
		$('#id').val('');
		$('#form-{MODULE}').trigger('reset');
		$('#{MODULE_TITLE}-modal').modal('show');
    });

	var dataTable; 
	$(function(){
		dataTable = $('#{MODULE_TITLE}-table').DataTable({
			dom: 'Bfrtip',
			// scrollX: true,
			"serverSide": true,
			buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
			],
			'ajax' : { url: "{PHP_START} echo site_url('admin/{MODULE_URL}/json'); {PHP_END}",type: 'POST' },
				columns: [
					{ data: function (data, type, row, meta) {
				        return meta.row + meta.settings._iDisplayStart + 1;
			      	},name: "sn", searchable: false },
					{COLUMN_FIELDS}	
					{ data: function(data,b,c,table) { 
						var buttons = '';

						buttons += "<a href='javascript::void(0)' data-toggle='modal' data-target='#{MODULE_TITLE}-modal' class='btn btn-sm btn-success btn-outline'  title='Edit' onclick='edit("+table.row+")'><i class='icon wb-pencil' aria-hidden='true'></i></a>&nbsp;&nbsp"; 

						buttons += "<a onclick='remove{VIEWTABLE}("+data.id+")' href='javascript::void(0)' class='btn btn-sm btn-danger btn-outline'  title='Delete' ><i class='icon wb-trash' aria-hidden='true'></i></a>";

						return buttons;
					}, name:'action',searchable: false},	
				],
			});
	});


	function edit(index)
	{
		var row = dataTable.row(index).data();

		$('#{PRIMARY_KEY}').val(row.{PRIMARY_KEY});
		$("#form-{MODULE}").find('input:checkbox').prop('checked',false);
		$("#form-{MODULE}").find('input:text,select,textarea').val(function(i,v){

			/*if(row.gender == 'M')
			{
				$('input:radio[name=gender][id=radio_1]').prop('checked',true);
			}else{
				$('input:radio[name=gender][id=radio_2]').prop('checked',true);
			}*/
			return row[this.name];
		});
		// $('select').selectpicker('render');

		$("#form-{MODULE}").find('input:checkbox').prop('checked',function(){
			// if($.inArray(this.value,row.array) >= 0)
			// { 
				return true; 
			// }

		});	
	}

	function remove{VIEWTABLE}(index)
	{
		$.post("{PHP_START}  echo site_url('admin/{MODULE_URL}/delete_json'){PHP_END}", {id:[index]}, function(){
			dataTable.ajax.reload( null, false );
		});
	}

	function save()
	{
		$.ajax({
			url: "{PHP_START}  echo site_url('admin/{MODULE_URL}/save'){PHP_END}",
			data: $('#form-{MODULE}').serialize(),
			dataType: 'json',
			success: function(result){
				if(result.success)
				{
					$('#{MODULE_TITLE}-modal').modal('hide');
					$('#form-{MODULE}')[0].reset();
					dataTable.ajax.reload( null, false );
				}
			},
			type: 'POST'
		});
	}
	

	
</script>				