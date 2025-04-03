<div class="page-header">
    <h1 class="page-title"><?php echo lang('transactions'); ?></h1>
    <ol class="breadcrumb">
      	<li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      	<li class="breadcrumb-item active"><a href="#"><?php echo lang('transactions'); ?></a></li>
    </ol>
    <div class="page-header-actions">
      	
		<a href="javascript::void(0)" id="create-Transaction-button" class="btn btn-sm btn-primary btn-outline btn-round"  title="<?php echo lang('general_create'); ?>">
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
	          	<table style="width: 100% !important" class="table table-hover dataTable table-striped" id="Transaction-table">
	                <thead>
	                  	<th>SN</th>
						<th ><?php echo lang('id')?></th>
<th ><?php echo lang('created_at')?></th>
<th ><?php echo lang('updated_at')?></th>
<th ><?php echo lang('deleted_at')?></th>
<th ><?php echo lang('created_by')?></th>
<th ><?php echo lang('updated_by')?></th>
<th ><?php echo lang('deleted_by')?></th>
<th ><?php echo lang('gateway')?></th>
<th ><?php echo lang('ru')?></th>
<th ><?php echo lang('pid')?></th>
<th ><?php echo lang('prn')?></th>
<th ><?php echo lang('amt')?></th>
<th ><?php echo lang('currency')?></th>
<th ><?php echo lang('date')?></th>
<th ><?php echo lang('time')?></th>
<th ><?php echo lang('R1')?></th>
<th ><?php echo lang('R2')?></th>
<th ><?php echo lang('md')?></th>
<th ><?php echo lang('dv')?></th>
<th ><?php echo lang('bc')?></th>
<th ><?php echo lang('ini')?></th>
<th ><?php echo lang('uid')?></th>
<th ><?php echo lang('bid')?></th>
<th ><?php echo lang('status')?></th>

						<th>Action</th>
	                </thead>
	              	<tbody></tbody>
	          	</table>
	        </div>
			</div>
	</div>
</div>
<div id="Transaction-modal" class="modal fade" role="dialog">
  	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add/Edit Transaction</h4>
			</div>
			<div class="modal-body">
				<?php echo form_open('', array('id' =>'form-transactions', 'onsubmit' => 'return false')); ?>
		        	<input type = "hidden" name = "id" id = "id"/>
		            
				<div class='form-group'>
				<label for='created_at'><?php echo lang('created_at')?></label>
				<input id='created_at' class='form-control datetimepicker' name='created_at'>
				</div>
				<div class='form-group'>
				<label for='updated_at'><?php echo lang('updated_at')?></label>
				<input id='updated_at' class='form-control datetimepicker' name='updated_at'>
				</div>
				<div class='form-group'>
				<label for='deleted_at'><?php echo lang('deleted_at')?></label>
				<input id='deleted_at' class='form-control datetimepicker' name='deleted_at'>
				</div>
				<div class='form-group'>
				<label for='created_by'><?php echo lang('created_by')?></label>
				<input id='created_by' type='number' class='form-control' name='created_by'>
				</div>
				<div class='form-group'>
				<label for='updated_by'><?php echo lang('updated_by')?></label>
				<input id='updated_by' type='number' class='form-control' name='updated_by'>
				</div>
				<div class='form-group'>
				<label for='deleted_by'><?php echo lang('deleted_by')?></label>
				<input id='deleted_by' type='number' class='form-control' name='deleted_by'>
				</div>
				<div class='form-group'>
				<label for='gateway'><?php echo lang('gateway')?></label>
				<input id='gateway' type='text' class='form-control' name='gateway'>
				</div>
				<div class='form-group'>
				<label for='ru'><?php echo lang('ru')?></label>
				<input id='ru' type='text' class='form-control' name='ru'>
				</div>
				<div class='form-group'>
				<label for='pid'><?php echo lang('pid')?></label>
				<input id='pid' type='text' class='form-control' name='pid'>
				</div>
				<div class='form-group'>
				<label for='prn'><?php echo lang('prn')?></label>
				<input id='prn' type='text' class='form-control' name='prn'>
				</div>
				<div class='form-group'>
				<label for='amt'><?php echo lang('amt')?></label>
				<input id='amt' type='text' class='form-control' name='amt'>
				</div>
				<div class='form-group'>
				<label for='currency'><?php echo lang('currency')?></label>
				<input id='currency' type='text' class='form-control' name='currency'>
				</div>
				<div class='form-group'>
				<label for='date'><?php echo lang('date')?></label>
				<input id='date' class='form-control datepicker' name='date'>
				</div>
				<div class='form-group'>
				<label for='time'><?php echo lang('time')?></label>
				<input id='time' type='text' class='form-control' name='time'>
				</div>
				<div class='form-group'>
				<label for='R1'><?php echo lang('R1')?></label>
				<input id='R1' type='text' class='form-control' name='R1'>
				</div>
				<div class='form-group'>
				<label for='R2'><?php echo lang('R2')?></label>
				<input id='R2' type='text' class='form-control' name='R2'>
				</div>
				<div class='form-group'>
				<label for='md'><?php echo lang('md')?></label>
				<input id='md' type='text' class='form-control' name='md'>
				</div>
				<div class='form-group'>
				<label for='dv'><?php echo lang('dv')?></label>
				<input id='dv' type='text' class='form-control' name='dv'>
				</div>
				<div class='form-group'>
				<label for='bc'><?php echo lang('bc')?></label>
				<input id='bc' type='text' class='form-control' name='bc'>
				</div>
				<div class='form-group'>
				<label for='ini'><?php echo lang('ini')?></label>
				<input id='ini' type='text' class='form-control' name='ini'>
				</div>
				<div class='form-group'>
				<label for='uid'><?php echo lang('uid')?></label>
				<input id='uid' type='text' class='form-control' name='uid'>
				</div>
				<div class='form-group'>
				<label for='bid'><?php echo lang('bid')?></label>
				<input id='bid' type='text' class='form-control' name='bid'>
				</div>
				<div class='form-group'>
				<label for='status'><?php echo lang('status')?></label>
				<input id='status' type='text' class='form-control' name='status'>
				</div>
		        <?php echo form_close(); ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn bg-green waves-effect" onClick="save()"><?php echo lang('general_save'); ?></button>			
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('general_cancel'); ?></button>
			</div>
		</div>

  	</div>
</div>

<script language="javascript" type="text/javascript">

	$(document).on('click','#create-Transaction-button', function () { 
		$('#id').val('');
		$('#form-transactions').trigger('reset');
		$('#Transaction-modal').modal('show');
    });

	var dataTable; 
	$(function(){
		dataTable = $('#Transaction-table').DataTable({
			dom: 'Bfrtip',
			// scrollX: true,
			"serverSide": true,
			buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
			],
			'ajax' : { url: "<?php  echo site_url('admin/Transactions/json'); ?>",type: 'POST' },
				columns: [
					{ data: function (data, type, row, meta) {
				        return meta.row + meta.settings._iDisplayStart + 1;
			      	},name: "sn", searchable: false },
					{ data: "id",name: "id"},
				{ data: "created_at",name: "created_at"},
				{ data: "updated_at",name: "updated_at"},
				{ data: "deleted_at",name: "deleted_at"},
				{ data: "created_by",name: "created_by"},
				{ data: "updated_by",name: "updated_by"},
				{ data: "deleted_by",name: "deleted_by"},
				{ data: "gateway",name: "gateway"},
				{ data: "ru",name: "ru"},
				{ data: "pid",name: "pid"},
				{ data: "prn",name: "prn"},
				{ data: "amt",name: "amt"},
				{ data: "currency",name: "currency"},
				{ data: "date",name: "date"},
				{ data: "time",name: "time"},
				{ data: "R1",name: "R1"},
				{ data: "R2",name: "R2"},
				{ data: "md",name: "md"},
				{ data: "dv",name: "dv"},
				{ data: "bc",name: "bc"},
				{ data: "ini",name: "ini"},
				{ data: "uid",name: "uid"},
				{ data: "bid",name: "bid"},
				{ data: "status",name: "status"},
					
					{ data: function(data,b,c,table) { 
						var buttons = '';

						buttons += "<a href='javascript::void(0)' data-toggle='modal' data-target='#Transaction-modal' class='btn btn-sm btn-success btn-outline'  title='Edit' onclick='edit("+table.row+")'><i class='icon wb-pencil' aria-hidden='true'></i></a>&nbsp;&nbsp"; 

						buttons += "<a onclick='removetransaction("+data.id+")' href='javascript::void(0)' class='btn btn-sm btn-danger btn-outline'  title='Delete' ><i class='icon wb-trash' aria-hidden='true'></i></a>";

						return buttons;
					}, name:'action',searchable: false},	
				],
			});
	});


	function edit(index)
	{
		var row = dataTable.row(index).data();

		$('#id').val(row.id);
		$("#form-transactions").find('input:checkbox').prop('checked',false);
		$("#form-transactions").find('input:text,select,textarea').val(function(i,v){

			/*if(row.gender == 'M')
			{
				$('input:radio[name=gender][id=radio_1]').prop('checked',true);
			}else{
				$('input:radio[name=gender][id=radio_2]').prop('checked',true);
			}*/
			return row[this.name];
		});
		// $('select').selectpicker('render');

		$("#form-transactions").find('input:checkbox').prop('checked',function(){
			// if($.inArray(this.value,row.array) >= 0)
			// { 
				return true; 
			// }

		});	
	}

	function removetransaction(index)
	{
		$.post("<?php   echo site_url('admin/Transactions/delete_json')?>", {id:[index]}, function(){
			dataTable.ajax.reload( null, false );
		});
	}

	function save()
	{
		$.ajax({
			url: "<?php   echo site_url('admin/Transactions/save')?>",
			data: $('#form-transactions').serialize(),
			dataType: 'json',
			success: function(result){
				if(result.success)
				{
					$('#Transaction-modal').modal('hide');
					$('#form-transactions')[0].reset();
					dataTable.ajax.reload( null, false );
				}
			},
			type: 'POST'
		});
	}
	

	
</script>				