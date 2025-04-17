<?php /* <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?php echo lang('subject_committees'); ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('admin'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      				<li class="breadcrumb-item active"><a href="#"><?php echo lang('subject_committees'); ?></a></li>
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
            <h3 class="card-title"><?php echo lang('Subject_committee'); ?></h3>
	            <a href="javascript::void(0)" id="create-Subject_committee-button" class="btn btn-sm btn-primary btn-outline btn-round"  title="<?php echo lang('general_create'); ?>">
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
	          	<table style="width: 100% !important" class="table table-hover dataTable table-striped" id="Subject_committee-table">
	                <thead>
	                  	<th>SN</th>
						<th ><?php echo lang('name')?></th>
						<th ><?php echo lang('designation')?></th>
						<th >Type</th>
						<th ><?php echo lang('rank')?></th>

						<th>Action</th>
	                </thead>
	              	<tbody></tbody>
	          	</table>
	        </div>
        </div>
    </div>
</section>
<div id="Subject_committee-modal" class="modal fade" role="dialog">
  	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add/Edit Subject_committee</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<?php echo form_open('', array('id' =>'form-subject_committees', 'onsubmit' => 'return false')); ?>
		        	<input type = "hidden" name = "id" id = "id"/>
				<div class='form-group'>
				<label for='subject_committees_name'><?php echo lang('name')?><span class='mandatory'>*</span></label>
				<input id='subject_committees_name' type='text' class='form-control' name='name'>
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
				<div class='form-group'>
				<label for='subject_committee_type_id'><?php echo lang('subject_committee_type_id')?></label>
				<select id='subject_committee_type_id' class='form-control' name='subject_committee_type_id'>
					<option value="">Select</option>
					<?php
						foreach ($subject_committee_types as $key => $value) 
						{
					?>
					<option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
					<?php
						}
					?>
				</select>
				</div>
				<div class='form-group'>
				<label for='rank'><?php echo lang('rank')?></label>
				<input id='rank' type='number' class='form-control' name='rank'>
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

	$(document).on('click','#create-Subject_committee-button', function () { 
		uploadReady('image_upload','image','image_upload_name','change-image',"<?php  echo site_url('admin/Subject_committees/do_upload')?>","<?php echo site_url('uploads/subject_committees/thumbs/')?>","remove_doc");
		$('#image_upload').show();
		$('#image_upload_name').hide();
		$('#image').val('');
		$('#id').val('');
		$('#form-subject_committees').trigger('reset');
		$('#Subject_committee-modal').modal('show');
    });

	var dataTable; 
	$(function(){
		dataTable = $('#Subject_committee-table').DataTable({
			dom: 'frtip',
			// scrollX: true,
			"serverSide": true,
			buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
			],
			'ajax' : { url: "<?php  echo site_url('admin/Subject_committees/json'); ?>",type: 'POST' },
				columns: [
					{ data: function (data, type, row, meta) {
				        return meta.row + meta.settings._iDisplayStart + 1;
			      	},name: "sn", searchable: false },
				{ data: "name",name: "name"},
				{ data: "designation",name: "designation"},
				{ data: "subject_committee_type_name",name: "subject_committee_type_name"},
				{ data: "rank",name: "rank"},
					
					{ data: function(data,b,c,table) { 
						var buttons = '';

						buttons += "<a href='javascript::void(0)' data-toggle='modal' data-target='#Subject_committee-modal' class='btn btn-sm btn-success btn-outline'  title='Edit' onclick='edit("+table.row+")'><i class='icon wb-pencil' aria-hidden='true'></i></a>&nbsp;&nbsp"; 

						buttons += "<a onclick='removesubject_committee("+data.id+")' href='javascript::void(0)' class='btn btn-sm btn-danger btn-outline'  title='Delete' ><i class='icon wb-trash' aria-hidden='true'></i></a>";

						return buttons;
					}, name:'action',searchable: false},	
				],
			});
	});


	function edit(index)
	{
		var row = dataTable.row(index).data();
		uploadReady('image_upload','image','image_upload_name','change-image',"<?php  echo site_url('admin/Subject_committees/do_upload')?>","<?php echo site_url('uploads/subject_committees/thumbs/')?>","remove_doc");
		$('#image_upload').hide();
		$('#image').val(row.image);
		$('#image_upload_name').html('<img src="<?php echo site_url()?>uploads/subject_committees/thumbs/'+row.image+'" height="100px" width="100px"> <buttton type="button" onclick="remove_doc()" class="btn btn-danger"><i class="fa fa-trash"></i></button>');
		$('#image_upload_name').show();
		$('#id').val(row.id);
		$('#rank').val(row.rank);
		$("#form-subject_committees").find('input:checkbox').prop('checked',false);
		$("#form-subject_committees").find('input:text,select,textarea').val(function(i,v){

			/*if(row.gender == 'M')
			{
				$('input:radio[name=gender][id=radio_1]').prop('checked',true);
			}else{
				$('input:radio[name=gender][id=radio_2]').prop('checked',true);
			}*/
			return row[this.name];
		});
		// $('select').selectpicker('render');

		$("#form-subject_committees").find('input:checkbox').prop('checked',function(){
			// if($.inArray(this.value,row.array) >= 0)
			// { 
				return true; 
			// }

		});	
	}

	function removesubject_committee(index)
	{
		if(confirm("Are you sure you want to delete?") == true){
		$.post("<?php   echo site_url('admin/Subject_committees/delete_json')?>", {id:[index]}, function(){
			dataTable.ajax.reload( null, false );
		});
		}
	}

	function save()
	{
		$.ajax({
			url: "<?php   echo site_url('admin/Subject_committees/save')?>",
			data: $('#form-subject_committees').serialize(),
			dataType: 'json',
			success: function(result){
				if(result.success)
				{
					$('#Subject_committee-modal').modal('hide');
					$('#form-subject_committees')[0].reset();
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