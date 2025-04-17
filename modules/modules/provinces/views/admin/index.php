<?php /* <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?php echo lang('provinces'); ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('admin'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      				<li class="breadcrumb-item active"><a href="#"><?php echo lang('provinces'); ?></a></li>
                </ol>
            </div>
        </div>
    </div>
</section>
*/?>
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><?php echo lang('Province'); ?></h3>
	            <a href="javascript::void(0)" id="create-Province-button" class="btn btn-sm btn-primary btn-outline btn-round"  title="<?php echo lang('general_create'); ?>">
				<i class="icon wb-plus" aria-hidden="true"></i>
	        	<span class="hidden-sm-down">Create</span>
			</a>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body">
           <div class="table-responsive">
	          	<table style="width: 100% !important" class="table table-hover dataTable table-striped" id="Province-table">
	                <thead>
	                  	<th>SN</th>
						<th ><?php echo lang('id')?></th>
<th ><?php echo lang('created_at')?></th>
<th ><?php echo lang('updated_at')?></th>
<th ><?php echo lang('deleted_at')?></th>
<th ><?php echo lang('created_by')?></th>
<th ><?php echo lang('updated_by')?></th>
<th ><?php echo lang('deleted_by')?></th>
<th ><?php echo lang('name')?></th>

						<th>Action</th>
	                </thead>
	              	<tbody></tbody>
	          	</table>
	        </div>
        </div>
    </div>
</section>
<div id="Province-modal" class="modal fade" role="dialog">
  	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add/Edit Province</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<?php echo form_open('', array('id' =>'form-provinces', 'onsubmit' => 'return false')); ?>
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
				<label for='provinces_name'><?php echo lang('name')?><span class='mandatory'>*</span></label>
				<input id='provinces_name' type='text' class='form-control' name='name'>
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

	$(document).on('click','#create-Province-button', function () { 
		$('#id').val('');
		$('#form-provinces').trigger('reset');
		$('#Province-modal').modal('show');
    });

	var dataTable; 
	$(function(){
		dataTable = $('#Province-table').DataTable({
			dom: 'frtip',
			// scrollX: true,
			"serverSide": true,
			buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
			],
			'ajax' : { url: "<?php  echo site_url('admin/Provinces/json'); ?>",type: 'POST' },
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
				{ data: "name",name: "name"},
					
					{ data: function(data,b,c,table) { 
						var buttons = '';

						buttons += "<a href='javascript::void(0)' data-toggle='modal' data-target='#Province-modal' class='btn btn-sm btn-success btn-outline'  title='Edit' onclick='edit("+table.row+")'><i class='icon wb-pencil' aria-hidden='true'></i></a>&nbsp;&nbsp"; 

						buttons += "<a onclick='removeprovince("+data.id+")' href='javascript::void(0)' class='btn btn-sm btn-danger btn-outline'  title='Delete' ><i class='icon wb-trash' aria-hidden='true'></i></a>";

						return buttons;
					}, name:'action',searchable: false},	
				],
			});
	});


	function edit(index)
	{
		var row = dataTable.row(index).data();

		$('#id').val(row.id);
		$("#form-provinces").find('input:checkbox').prop('checked',false);
		$("#form-provinces").find('input:text,select,textarea').val(function(i,v){

			/*if(row.gender == 'M')
			{
				$('input:radio[name=gender][id=radio_1]').prop('checked',true);
			}else{
				$('input:radio[name=gender][id=radio_2]').prop('checked',true);
			}*/
			return row[this.name];
		});
		// $('select').selectpicker('render');

		$("#form-provinces").find('input:checkbox').prop('checked',function(){
			// if($.inArray(this.value,row.array) >= 0)
			// { 
				return true; 
			// }

		});	
	}

	function removeprovince(index)
	{
		$.post("<?php   echo site_url('admin/Provinces/delete_json')?>", {id:[index]}, function(){
			dataTable.ajax.reload( null, false );
		});
	}

	function save()
	{
		$.ajax({
			url: "<?php   echo site_url('admin/Provinces/save')?>",
			data: $('#form-provinces').serialize(),
			dataType: 'json',
			success: function(result){
				if(result.success)
				{
					$('#Province-modal').modal('hide');
					$('#form-provinces')[0].reset();
					dataTable.ajax.reload( null, false );
				}
			},
			type: 'POST'
		});
	}
	

	
</script>				