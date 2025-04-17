<div class="page-header">
    <h1 class="page-title"><?php echo lang('boardmembers'); ?></h1>
    <ol class="breadcrumb">
      	<li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      	<li class="breadcrumb-item active"><a href="#"><?php echo lang('boardmembers'); ?></a></li>
    </ol>
    <div class="page-header-actions">
      	
		<a href="javascript::void(0)" id="create-Boardmember-button" class="btn btn-sm btn-primary btn-outline btn-round"  title="<?php echo lang('general_create'); ?>">
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
	          	<table style="width: 100% !important" class="table table-hover dataTable table-striped" id="Boardmember-table">
	                <thead>
	                  	<th>SN</th>
						<th ><?php echo lang('name')?></th>
						<th ><?php echo lang('designation')?></th>
						<th>Action</th>
	                </thead>
	              	<tbody></tbody>
	          	</table>
	        </div>
			</div>
	</div>
</div>
<div id="Boardmember-modal" class="modal fade" role="dialog">
  	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add/Edit Boardmember</h4>
			</div>
			<div class="modal-body">
				<?php echo form_open('', array('id' =>'form-boardmembers', 'onsubmit' => 'return false')); ?>
		        	<input type = "hidden" name = "id" id = "id"/>
				<div class='form-group'>
				<label for='boardmembers_name'><?php echo lang('name')?><span class='mandatory'>*</span></label>
				<input id='boardmembers_name' type='text' class='form-control' name='name'>
				</div>
				<div class='form-group'>
				<label for='image'><?php echo lang('image')?></label>
					<div id="image_upload_name" style="display:none"></div>
					<input name="image" id="image" class='text_input' style="display:none"/>
					<input type="file" id="image_upload" name="userfile" style="display:block"/>
				</div>
				<div class='form-group'>
				<label for='designation'><?php echo lang('designation')?></label>
				<input id='designation' type='text' class='form-control' name='designation'>
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

	$(document).on('click','#create-Boardmember-button', function () { 
		uploadReady('image_upload','image','image_upload_name','change-image',"<?php  echo site_url('admin/Boardmembers/do_upload')?>","<?php echo site_url('uploads/boardmembers/thumbs/')?>","remove_doc");
		$('#image_upload').show();
		$('#image_upload_name').hide();
		$('#image').val('');
		$('#id').val('');
		$('#form-boardmembers').trigger('reset');
		$('#Boardmember-modal').modal('show');
    });

	var dataTable; 
	$(function(){
		dataTable = $('#Boardmember-table').DataTable({
			dom: 'Bfrtip',
			// scrollX: true,
			"serverSide": true,
			buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
			],
			'ajax' : { url: "<?php  echo site_url('admin/Boardmembers/json'); ?>",type: 'POST' },
				columns: [
					{ data: function (data, type, row, meta) {
				        return meta.row + meta.settings._iDisplayStart + 1;
			      	},name: "sn", searchable: false },
					{ data: "name",name: "name"},
					{ data: "designation",name: "designation"},
						
					{ data: function(data,b,c,table) { 
						var buttons = '';

						buttons += "<a href='javascript::void(0)' data-toggle='modal' data-target='#Boardmember-modal' class='btn btn-sm btn-success btn-outline'  title='Edit' onclick='edit("+table.row+")'><i class='icon wb-pencil' aria-hidden='true'></i></a>&nbsp;&nbsp"; 

						buttons += "<a onclick='removeboardmember("+data.id+")' href='javascript::void(0)' class='btn btn-sm btn-danger btn-outline'  title='Delete' ><i class='icon wb-trash' aria-hidden='true'></i></a>";

						return buttons;
					}, name:'action',searchable: false},	
				],
			});
	});


	function edit(index)
	{
		var row = dataTable.row(index).data();
		uploadReady('image_upload','image','image_upload_name','change-image',"<?php  echo site_url('admin/Boardmembers/do_upload')?>","<?php echo site_url('uploads/boardmembers/thumbs/')?>","remove_doc");
		$('#image_upload').hide();
		$('#image').val(row.image);
		$('#image_upload_name').html('<img src="<?php echo site_url()?>uploads/boardmembers/thumbs/'+row.image+'" height="100px" width="100px"> <buttton type="button" onclick="remove_doc()" class="btn btn-danger"><i class="fa fa-trash"></i></button>');
		$('#image_upload_name').show();
		$('#id').val(row.id);
		$("#form-boardmembers").find('input:checkbox').prop('checked',false);
		$("#form-boardmembers").find('input:text,select,textarea').val(function(i,v){

			/*if(row.gender == 'M')
			{
				$('input:radio[name=gender][id=radio_1]').prop('checked',true);
			}else{
				$('input:radio[name=gender][id=radio_2]').prop('checked',true);
			}*/
			return row[this.name];
		});
		// $('select').selectpicker('render');

		$("#form-boardmembers").find('input:checkbox').prop('checked',function(){
			// if($.inArray(this.value,row.array) >= 0)
			// { 
				return true; 
			// }

		});	
	}

	function removeboardmember(index)
	{
		if(confirm("Are you sure you want to delete?") == true){
		$.post("<?php   echo site_url('admin/Boardmembers/delete_json')?>", {id:[index]}, function(){
			dataTable.ajax.reload( null, false );
		});
		}
	}

	function save()
	{
		$.ajax({
			url: "<?php   echo site_url('admin/Boardmembers/save')?>",
			data: $('#form-boardmembers').serialize(),
			dataType: 'json',
			success: function(result){
				if(result.success)
				{
					$('#Boardmember-modal').modal('hide');
					$('#form-boardmembers')[0].reset();
					dataTable.ajax.reload( null, false );
				}
			},
			type: 'POST'
		});
	}
	
	function remove_doc(argument) {
		$('#image_upload').show();
		$('#image_upload_name').hide();
		$('#image').val('');
	}

	
</script>				