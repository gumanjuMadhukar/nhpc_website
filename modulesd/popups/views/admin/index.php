<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?php echo lang('popups'); ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('admin'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      				<li class="breadcrumb-item active"><a href="#"><?php echo lang('popups'); ?></a></li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><?php echo lang('Popup'); ?></h3>
	            <a href="javascript::void(0)" id="create-Popup-button" class="btn btn-sm btn-primary btn-outline btn-round"  title="<?php echo lang('general_create'); ?>">
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
	          	<table style="width: 100% !important" class="table table-hover dataTable table-striped" id="Popup-table">
	                <thead>
	                  	<th>SN</th>
<th ><?php echo lang('name')?></th>
<th ><?php echo lang('status')?></th>

						<th>Action</th>
	                </thead>
	              	<tbody></tbody>
	          	</table>
	        </div>
        </div>
    </div>
</section>
<div id="Popup-modal" class="modal fade" role="dialog">
  	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add/Edit Popup</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<?php echo form_open('', array('id' =>'form-popups', 'onsubmit' => 'return false')); ?>
		        	<input type = "hidden" name = "id" id = "id"/>
				<div class='form-group'>
				<label for='popups_name'><?php echo lang('name')?><span class='mandatory'>*</span></label>
				<input id='popups_name' type='text' class='form-control' name='name'>
				</div>
				<div class='form-group'>
				<label for='status'><?php echo lang('status')?></label>
				<input id='status' type='number' class='form-control' name='status'>
				</div>
				<div class='form-group'>
				<label for='image'><?php echo lang('image')?></label>
				<input id='image' type='text' class='form-control' name='image'>
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

	$(document).on('click','#create-Popup-button', function () { 
		$('#id').val('');
		$('#form-popups').trigger('reset');
		$('#Popup-modal').modal('show');
    });

	var dataTable; 
	$(function(){
		dataTable = $('#Popup-table').DataTable({
			dom: 'frtip',
			// scrollX: true,
			"serverSide": true,
			buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
			],
			'ajax' : { url: "<?php  echo site_url('admin/Popups/json'); ?>",type: 'POST' },
				columns: [
					{ data: function (data, type, row, meta) {
				        return meta.row + meta.settings._iDisplayStart + 1;
			      	},name: "sn", searchable: false },
				{ data: "name",name: "name"},
				{ data: "status",name: "status"},
				{ data: "image",name: "image"},
					
					{ data: function(data,b,c,table) { 
						var buttons = '';

						buttons += "<a href='javascript::void(0)' data-toggle='modal' data-target='#Popup-modal' class='btn btn-sm btn-success btn-outline'  title='Edit' onclick='edit("+table.row+")'><i class='icon wb-pencil' aria-hidden='true'></i></a>&nbsp;&nbsp"; 

						buttons += "<a onclick='removepopup("+data.id+")' href='javascript::void(0)' class='btn btn-sm btn-danger btn-outline'  title='Delete' ><i class='icon wb-trash' aria-hidden='true'></i></a>";

						return buttons;
					}, name:'action',searchable: false},	
				],
			});
	});


	function edit(index)
	{
		var row = dataTable.row(index).data();

		$('#id').val(row.id);
		$("#form-popups").find('input:checkbox').prop('checked',false);
		$("#form-popups").find('input:text,select,textarea').val(function(i,v){

			/*if(row.gender == 'M')
			{
				$('input:radio[name=gender][id=radio_1]').prop('checked',true);
			}else{
				$('input:radio[name=gender][id=radio_2]').prop('checked',true);
			}*/
			return row[this.name];
		});
		// $('select').selectpicker('render');

		$("#form-popups").find('input:checkbox').prop('checked',function(){
			// if($.inArray(this.value,row.array) >= 0)
			// { 
				return true; 
			// }

		});	
	}

	function removepopup(index)
	{
		$.post("<?php   echo site_url('admin/Popups/delete_json')?>", {id:[index]}, function(){
			dataTable.ajax.reload( null, false );
		});
	}

	function save()
	{
		$.ajax({
			url: "<?php   echo site_url('admin/Popups/save')?>",
			data: $('#form-popups').serialize(),
			dataType: 'json',
			success: function(result){
				if(result.success)
				{
					$('#Popup-modal').modal('hide');
					$('#form-popups')[0].reset();
					dataTable.ajax.reload( null, false );
				}
			},
			type: 'POST'
		});
	}
	

	
</script>				