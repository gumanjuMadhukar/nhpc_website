<?php /* <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?php echo lang('colleges'); ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('admin'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      				<li class="breadcrumb-item active"><a href="#"><?php echo lang('colleges'); ?></a></li>
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
            <h3 class="card-title"><?php echo lang('College'); ?></h3>
	            <a href="javascript::void(0)" id="create-College-button" class="btn btn-sm btn-primary btn-outline btn-round"  title="<?php echo lang('general_create'); ?>">
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
	          	<table style="width: 100% !important" class="table table-hover dataTable table-striped" id="College-table">
	                <thead>
	                  	<th>SN</th>
<th ><?php echo lang('name')?></th>
<!-- <th ><?php echo lang('code')?></th> -->
<!-- <th ><?php echo lang('address')?></th> -->

						<th>Action</th>
	                </thead>
	              	<tbody></tbody>
	          	</table>
	        </div>
        </div>
    </div>
</section>
<div id="College-modal" class="modal fade" role="dialog">
  	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add/Edit College</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<?php echo form_open('', array('id' =>'form-colleges', 'onsubmit' => 'return false')); ?>
		        	<input type = "hidden" name = "id" id = "id"/>
				<div class='form-group'>
				<label for='colleges_name'><?php echo lang('name')?><span class='mandatory'>*</span></label>
				<input id='colleges_name' type='text' class='form-control' name='name'>
				</div>
				<div class='form-group'>
				<label for='code'><?php echo lang('code')?></label>
				<input id='code' type='text' class='form-control' name='code'>
				</div>
				<div class='form-group'>
				<label for='address'><?php echo lang('address')?></label>
				<input id='address' type='text' class='form-control' name='address'>
				</div>
				<div class='form-group'>
				<label for='link'><?php echo lang('link')?></label>
				<input id='link' type='text' class='form-control' name='link'>
				<label for='province_id'><?php echo lang('province_id')?></label>
				<select id='province_id' class='form-control' name='province_id'>
					<<?php foreach ($provinces as $key => $value): ?>
						<option value="<?php echo $value->id?>"><?php echo $value->name?></option>
					<?php endforeach ?>
				</select>
				<!-- <input id='province_id' type='text' class='form-control' name='province_id'> -->
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

	$(document).on('click','#create-College-button', function () { 
		$('#id').val('');
		$('#form-colleges').trigger('reset');
		$('#College-modal').modal('show');
    });

	var dataTable; 
	$(function(){
		dataTable = $('#College-table').DataTable({
			dom: 'frtip',
			// scrollX: true,
			"serverSide": true,
			buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
			],
			'ajax' : { url: "<?php  echo site_url('admin/Colleges/json'); ?>",type: 'POST' },
				columns: [
					{ data: function (data, type, row, meta) {
				        return meta.row + meta.settings._iDisplayStart + 1;
			      	},name: "sn", searchable: false },
				{ data: "name",name: "name"},
				// { data: "code",name: "code"},
				// { data: "address",name: "address"},
					
					{ data: function(data,b,c,table) { 
						var buttons = '';

						buttons += "<a href='javascript::void(0)' data-toggle='modal' data-target='#College-modal' class='btn btn-sm btn-success btn-outline'  title='Edit' onclick='edit("+table.row+")'><i class='icon wb-pencil' aria-hidden='true'></i></a>&nbsp;&nbsp"; 

						buttons += "<a onclick='removecollege("+data.id+")' href='javascript::void(0)' class='btn btn-sm btn-danger btn-outline'  title='Delete' ><i class='icon wb-trash' aria-hidden='true'></i></a>";

						return buttons;
					}, name:'action',searchable: false},	
				],
			});
	});


	function edit(index)
	{
		var row = dataTable.row(index).data();

		$('#id').val(row.id);
		$("#form-colleges").find('input:checkbox').prop('checked',false);
		$("#form-colleges").find('input:text,select,textarea').val(function(i,v){

			/*if(row.gender == 'M')
			{
				$('input:radio[name=gender][id=radio_1]').prop('checked',true);
			}else{
				$('input:radio[name=gender][id=radio_2]').prop('checked',true);
			}*/
			return row[this.name];
		});
		// $('select').selectpicker('render');

		$("#form-colleges").find('input:checkbox').prop('checked',function(){
			// if($.inArray(this.value,row.array) >= 0)
			// { 
				return true; 
			// }

		});	
		$('#province_id').val(row['province_id']);
		$("#select option[value=" + row['province_id'] + "]").attr('selected', 'selected');
		console.log(row['province_id']);
	}

	function removecollege(index)
	{
		if(confirm("Are you sure you want to delete?") == true){
		$.post("<?php   echo site_url('admin/Colleges/delete_json')?>", {id:[index]}, function(){
			dataTable.ajax.reload( null, false );
		});
		}
	}

	function save()
	{
		$.ajax({
			url: "<?php   echo site_url('admin/Colleges/save')?>",
			data: $('#form-colleges').serialize(),
			dataType: 'json',
			success: function(result){
				if(result.success)
				{
					$('#College-modal').modal('hide');
					$('#form-colleges')[0].reset();
					dataTable.ajax.reload( null, false );
				}
			},
			type: 'POST'
		});
	}
	

	
</script>				