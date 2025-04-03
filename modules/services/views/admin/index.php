<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?php echo lang('services'); ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('admin'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      				<li class="breadcrumb-item active"><a href="#"><?php echo lang('services'); ?></a></li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><?php echo lang('Service'); ?></h3>
	            <a href="javascript::void(0)" id="create-Service-button" class="btn btn-sm btn-primary btn-outline btn-round"  title="<?php echo lang('general_create'); ?>">
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
	          	<table style="width: 100% !important" class="table table-hover dataTable table-striped" id="Service-table">
	                <thead>
	                  	<th>SN</th>
<th ><?php echo lang('name')?></th>
<th ><?php echo lang('image')?></th>

						<th>Action</th>
	                </thead>
	              	<tbody></tbody>
	          	</table>
	        </div>
        </div>
    </div>
</section>
<div id="Service-modal" class="modal fade" role="dialog">
  	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add/Edit Service</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<?php echo form_open('', array('id' =>'form-services', 'onsubmit' => 'return false')); ?>
		        	<input type = "hidden" name = "id" id = "id"/>
				<div class='form-group'>
				<label for='services_name'><?php echo lang('name')?><span class='mandatory'>*</span></label>
				<input id='services_name' type='text' class='form-control' name='name'>
				</div>
				<div class='form-group'>
				<label for='image'><?php echo lang('image')?></label>
					<div id="image_upload_name" style="display:none"></div>
					<input name="image" id="image" class='text_input' style="display:none"/>
					<input type="file" id="image_upload" name="userfile" style="display:block"/>
				</div>
				<div class='form-group'>
				<label for='description'><?php echo lang('description')?></label>
				<textarea name='description' id='description' class='form-control' ></textarea>
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

	$(document).on('click','#create-Service-button', function () { 
		uploadReady('image_upload','image','image_upload_name','change-image',"<?php  echo site_url('admin/Services/do_upload')?>","<?php echo site_url('uploads/services/thumbs/')?>","remove_doc");
		$('#image_upload').show();
		$('#image_upload_name').hide();
		$('#image').val('');
		$('#id').val('');
		$('#form-services').trigger('reset');
		$('#Service-modal').modal('show');
    });

	var dataTable; 
	$(function(){
		dataTable = $('#Service-table').DataTable({
			dom: 'frtip',
			// scrollX: true,
			"serverSide": true,
			buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
			],
			'ajax' : { url: "<?php  echo site_url('admin/Services/json'); ?>",type: 'POST' },
				columns: [
					{ data: function (data, type, row, meta) {
				        return meta.row + meta.settings._iDisplayStart + 1;
			      	},name: "sn", searchable: false },
				{ data: "name",name: "name"},
				{ data: function(data,b,c,table){
					var image = (data.image)?'<img src="<?php echo base_url()?>uploads/services/thumbs/'+data.image+'" class="table_image">':'';
					return image;
				},name: "image",
				},
					
					{ data: function(data,b,c,table) { 
						var buttons = '';

						buttons += "<a href='javascript::void(0)' data-toggle='modal' data-target='#Service-modal' class='btn btn-sm btn-success btn-outline'  title='Edit' onclick='edit("+table.row+")'><i class='icon wb-pencil' aria-hidden='true'></i></a>&nbsp;&nbsp"; 

						buttons += "<a onclick='removeservice("+data.id+")' href='javascript::void(0)' class='btn btn-sm btn-danger btn-outline'  title='Delete' ><i class='icon wb-trash' aria-hidden='true'></i></a>";

						return buttons;
					}, name:'action',searchable: false},	
				],
			});
	});


	function edit(index)
	{
		var row = dataTable.row(index).data();
		uploadReady('image_upload','image','image_upload_name','change-image',"<?php  echo site_url('admin/Services/do_upload')?>","<?php echo site_url('uploads/services/thumbs/')?>","remove_doc");
		$('#image_upload').hide();
		$('#image').val(row.image);
		$('#image_upload_name').html('<img src="<?php echo site_url()?>uploads/services/thumbs/'+row.image+'" height="100px" width="100px"> <buttton type="button" onclick="remove_doc()" class="btn btn-danger"><i class="fa fa-trash"></i></button>');
		$('#image_upload_name').show();
		$('#id').val(row.id);
		$("#form-services").find('input:checkbox').prop('checked',false);
		$("#form-services").find('input:text,select,textarea').val(function(i,v){

			/*if(row.gender == 'M')
			{
				$('input:radio[name=gender][id=radio_1]').prop('checked',true);
			}else{
				$('input:radio[name=gender][id=radio_2]').prop('checked',true);
			}*/
			return row[this.name];
		});
		// $('select').selectpicker('render');

		$("#form-services").find('input:checkbox').prop('checked',function(){
			// if($.inArray(this.value,row.array) >= 0)
			// { 
				return true; 
			// }

		});	
	}

	function removeservice(index)
	{
		if(confirm("Are you sure you want to delete?") == true){

		$.post("<?php   echo site_url('admin/Services/delete_json')?>", {id:[index]}, function(){
			dataTable.ajax.reload( null, false );
		});
		}
	}

	function save()
	{
		$.ajax({
			url: "<?php   echo site_url('admin/Services/save')?>",
			data: $('#form-services').serialize(),
			dataType: 'json',
			success: function(result){
				if(result.success)
				{
					$('#Service-modal').modal('hide');
					$('#form-services')[0].reset();
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