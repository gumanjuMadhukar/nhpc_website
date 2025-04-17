<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?php echo lang('district_mvs'); ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('admin'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      				<li class="breadcrumb-item active"><a href="#"><?php echo lang('district_mvs'); ?></a></li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><?php echo lang('District_mv'); ?></h3>
	            <a href="javascript::void(0)" id="create-District_mv-button" class="btn btn-sm btn-primary btn-outline btn-round"  title="<?php echo lang('general_create'); ?>">
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
	          	<table style="width: 100% !important" class="table table-hover dataTable table-striped" id="District_mv-table">
	                <thead>
	                  	<th>SN</th>
						<th ><?php echo lang('id')?></th>
<th ><?php echo lang('created_by')?></th>
<th ><?php echo lang('updated_by')?></th>
<th ><?php echo lang('deleted_by')?></th>
<th ><?php echo lang('created_at')?></th>
<th ><?php echo lang('updated_at')?></th>
<th ><?php echo lang('deleted_at')?></th>
<th ><?php echo lang('code')?></th>
<th ><?php echo lang('name')?></th>
<th ><?php echo lang('parent_id')?></th>
<th ><?php echo lang('type')?></th>
<th ><?php echo lang('boundary_coordinates')?></th>

						<th>Action</th>
	                </thead>
	              	<tbody></tbody>
	          	</table>
	        </div>
        </div>
    </div>
</section>
<div id="District_mv-modal" class="modal fade" role="dialog">
  	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add/Edit District_mv</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<?php echo form_open('', array('id' =>'form-district_mvs', 'onsubmit' => 'return false')); ?>
		        	<input type = "hidden" name = "id" id = "id"/>
		            
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
				<label for='created_at'><?php echo lang('created_at')?></label>
				<input id='created_at' type='text' class='form-control' name='created_at'>
				</div>
				<div class='form-group'>
				<label for='updated_at'><?php echo lang('updated_at')?></label>
				<input id='updated_at' type='text' class='form-control' name='updated_at'>
				</div>
				<div class='form-group'>
				<label for='deleted_at'><?php echo lang('deleted_at')?></label>
				<input id='deleted_at' type='text' class='form-control' name='deleted_at'>
				</div>
				<div class='form-group'>
				<label for='code'><?php echo lang('code')?></label>
				<input id='code' type='text' class='form-control' name='code'>
				</div>
				<div class='form-group'>
				<label for='district_mvs_name'><?php echo lang('name')?><span class='mandatory'>*</span></label>
				<input id='district_mvs_name' type='text' class='form-control' name='name'>
				</div>
				<div class='form-group'>
				<label for='parent_id'><?php echo lang('parent_id')?></label>
				<input id='parent_id' type='number' class='form-control' name='parent_id'>
				</div>
				<div class='form-group'>
				<label for='type'><?php echo lang('type')?></label>
				<input id='type' type='text' class='form-control' name='type'>
				</div>
				<div class='form-group'>
				<label for='boundary_coordinates'><?php echo lang('boundary_coordinates')?></label>
				<textarea name='boundary_coordinates' id='boundary_coordinates' class='form-control' ></textarea>
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

	$(document).on('click','#create-District_mv-button', function () { 
		$('#id').val('');
		$('#form-district_mvs').trigger('reset');
		$('#District_mv-modal').modal('show');
    });

	var dataTable; 
	$(function(){
		dataTable = $('#District_mv-table').DataTable({
			dom: 'frtip',
			// scrollX: true,
			"serverSide": true,
			buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
			],
			'ajax' : { url: "<?php  echo site_url('admin/District_mvs/json'); ?>",type: 'POST' },
				columns: [
					{ data: function (data, type, row, meta) {
				        return meta.row + meta.settings._iDisplayStart + 1;
			      	},name: "sn", searchable: false },
					{ data: "id",name: "id"},
				{ data: "created_by",name: "created_by"},
				{ data: "updated_by",name: "updated_by"},
				{ data: "deleted_by",name: "deleted_by"},
				{ data: "created_at",name: "created_at"},
				{ data: "updated_at",name: "updated_at"},
				{ data: "deleted_at",name: "deleted_at"},
				{ data: "code",name: "code"},
				{ data: "name",name: "name"},
				{ data: "parent_id",name: "parent_id"},
				{ data: "type",name: "type"},
				{ data: "boundary_coordinates",name: "boundary_coordinates"},
					
					{ data: function(data,b,c,table) { 
						var buttons = '';

						buttons += "<a href='javascript::void(0)' data-toggle='modal' data-target='#District_mv-modal' class='btn btn-sm btn-success btn-outline'  title='Edit' onclick='edit("+table.row+")'><i class='icon wb-pencil' aria-hidden='true'></i></a>&nbsp;&nbsp"; 

						buttons += "<a onclick='removedistrict_mv("+data.id+")' href='javascript::void(0)' class='btn btn-sm btn-danger btn-outline'  title='Delete' ><i class='icon wb-trash' aria-hidden='true'></i></a>";

						return buttons;
					}, name:'action',searchable: false},	
				],
			});
	});


	function edit(index)
	{
		var row = dataTable.row(index).data();

		$('#id').val(row.id);
		$("#form-district_mvs").find('input:checkbox').prop('checked',false);
		$("#form-district_mvs").find('input:text,select,textarea').val(function(i,v){

			/*if(row.gender == 'M')
			{
				$('input:radio[name=gender][id=radio_1]').prop('checked',true);
			}else{
				$('input:radio[name=gender][id=radio_2]').prop('checked',true);
			}*/
			return row[this.name];
		});
		// $('select').selectpicker('render');

		$("#form-district_mvs").find('input:checkbox').prop('checked',function(){
			// if($.inArray(this.value,row.array) >= 0)
			// { 
				return true; 
			// }

		});	
	}

	function removedistrict_mv(index)
	{
		$.post("<?php   echo site_url('admin/District_mvs/delete_json')?>", {id:[index]}, function(){
			dataTable.ajax.reload( null, false );
		});
	}

	function save()
	{
		$.ajax({
			url: "<?php   echo site_url('admin/District_mvs/save')?>",
			data: $('#form-district_mvs').serialize(),
			dataType: 'json',
			success: function(result){
				if(result.success)
				{
					$('#District_mv-modal').modal('hide');
					$('#form-district_mvs')[0].reset();
					dataTable.ajax.reload( null, false );
				}
			},
			type: 'POST'
		});
	}
	

	
</script>				