<?php /* <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?php echo lang('requirements'); ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('admin'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      				<li class="breadcrumb-item active"><a href="#"><?php echo lang('requirements'); ?></a></li>
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
            <h3 class="card-title"><?php echo lang('Requirement'); ?></h3>
	            <a href="javascript::void(0)" id="create-Requirement-button" class="btn btn-sm btn-primary btn-outline btn-round"  title="<?php echo lang('general_create'); ?>">
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
	          	<table style="width: 100% !important" class="table table-hover dataTable table-striped" id="Requirement-table">
	                <thead>
	                  	<th>SN</th>
<th ><?php echo lang('name')?></th>

						<th>Action</th>
	                </thead>
	              	<tbody></tbody>
	          	</table>
	        </div>
        </div>
    </div>
</section>
<div id="Requirement-modal" class="modal fade" role="dialog">
  	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add/Edit Requirement</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<?php echo form_open('', array('id' =>'form-requirements', 'onsubmit' => 'return false')); ?>
		        	<input type = "hidden" name = "id" id = "id"/>
				<div class='form-group'>
				<label for='requirements_name'><?php echo lang('name')?><span class='mandatory'>*</span></label>
				<input id='requirements_name' type='text' class='form-control' name='name'>
				</div>
				<div class='form-group'>
				<label for='document'><?php echo lang('document')?></label>
				<div id="pdf_upload_name" style="display:none"></div>
				<input id="documents" style="display:none" name="documents">
				<input id='document' type='file' class='form-control' name='document'>
				<a href="#" id="change-pdf" title="Delete" style="display:none">Change PDF</a>
				</div>
				<div class='form-group'>
				<label for='rank'>Rank</label>
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

	$(document).ready(function(){
		uploader1=$('#document');
		new AjaxUpload(uploader1, {
			
			action: '<?php  echo site_url('admin/Requirements/upload_pdf')?>',
			name: 'document',
			responseType: "json",
			onSubmit: function(file, ext){
				if (! (ext && /^(pdf)$/.test(ext))){ 
            // extension is not allowed 
            $.messager.show({title: '<?php  echo lang('error')?>',msg: 'Only PDF files are allowed'});
            return false;
        }
        //status.text('Uploading...');
    },
    onComplete: function(file, response){
    	var filename = response.file_name;
        $('#pdf_upload_name').html('<label>'+filename+'</label>');
        $('#pdf_upload_name').show();
        $("#documents").val(filename);
        $('#document').hide();
        $('#change-pdf').show();
    }       
	});     
	});

	$(document).on('click','#create-Requirement-button', function () { 
		$('#document').show();
		$('#pdf_upload_name').hide();
		$('#change-pdf').hide();
		$('#documents').val('');
		$('#id').val('');
		$('#form-requirements').trigger('reset');
		$('#Requirement-modal').modal('show');
    });

	var dataTable; 
	$(function(){
		dataTable = $('#Requirement-table').DataTable({
			dom: 'frtip',
			// scrollX: true,
			"serverSide": true,
			buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
			],
			'ajax' : { url: "<?php  echo site_url('admin/Requirements/json'); ?>",type: 'POST' },
				columns: [
					{ data: function (data, type, row, meta) {
				        return meta.row + meta.settings._iDisplayStart + 1;
			      	},name: "sn", searchable: false },
				{ data: "name",name: "name"},					
					{ data: function(data,b,c,table) { 
						var buttons = '';

						buttons += "<a href='javascript::void(0)' data-toggle='modal' data-target='#Requirement-modal' class='btn btn-sm btn-success btn-outline'  title='Edit' onclick='edit("+table.row+")'><i class='icon wb-pencil' aria-hidden='true'></i></a>&nbsp;&nbsp"; 

						buttons += "<a onclick='removerequirement("+data.id+")' href='javascript::void(0)' class='btn btn-sm btn-danger btn-outline'  title='Delete' ><i class='icon wb-trash' aria-hidden='true'></i></a>";

						return buttons;
					}, name:'action',searchable: false},	
				],
			});
	});


	function edit(index)
	{
		var row = dataTable.row(index).data();
		if(row.document)
		{
			$('#document').hide();
			$('#documents').val(row.document);
			$('#pdf_upload_name').show();
        	$('#pdf_upload_name').html('<label>'+row.document+'</label>');
        	$('#change-pdf').show();

		}
		else
		{
			$('#document').show();
			$('#pdf_upload_name').html('');
			$('#documents').val('');
        	$('#change-pdf').hide();
		}
		$('#id').val(row.id);
		$('#rank').val(row.rank);
		$("#form-requirements").find('input:checkbox').prop('checked',false);
		$("#form-requirements").find('input:text,select,textarea').val(function(i,v){

			/*if(row.gender == 'M')
			{
				$('input:radio[name=gender][id=radio_1]').prop('checked',true);
			}else{
				$('input:radio[name=gender][id=radio_2]').prop('checked',true);
			}*/
			return row[this.name];
		});
		// $('select').selectpicker('render');

		$("#form-requirements").find('input:checkbox').prop('checked',function(){
			// if($.inArray(this.value,row.array) >= 0)
			// { 
				return true; 
			// }

		});	
	}

	function removerequirement(index)
	{
		if(confirm("Are you sure you want to delete?") == true){
		$.post("<?php   echo site_url('admin/Requirements/delete_json')?>", {id:[index]}, function(){
			dataTable.ajax.reload( null, false );
		});
		}
	}

	function save()
	{
		$.ajax({
			url: "<?php   echo site_url('admin/Requirements/save')?>",
			data: $('#form-requirements').serialize(),
			dataType: 'json',
			success: function(result){
				if(result.success)
				{
					$('#Requirement-modal').modal('hide');
					$('#form-requirements')[0].reset();
					dataTable.ajax.reload( null, false );
				}
			},
			type: 'POST'
		});
	}

	$('#change-pdf').click(function(){
		var filename = $('#documents').val();
		if(confirm('Are you sure you to want to delete this pdf?')){

			$.post('<?php echo site_url('admin/Requirements/upload_delete')?>',{ filename: filename },function(){

				$('#document').show();
				$('#pdf_upload_name').html('');
				$('#documents').val('');
	        	$('#change-pdf').hide();
			});
		}

	});
	

	
</script>				