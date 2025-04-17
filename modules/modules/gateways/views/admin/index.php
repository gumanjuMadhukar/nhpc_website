<div class="page-header">
    <h1 class="page-title"><?php echo lang('gateways'); ?></h1>
    <ol class="breadcrumb">
      	<li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      	<li class="breadcrumb-item active"><a href="#"><?php echo lang('gateways'); ?></a></li>
    </ol>
    <div class="page-header-actions">
      	
		<a href="#" id="create-Gateway-button" class="btn btn-sm btn-primary btn-outline btn-round"  title="<?php echo lang('general_create'); ?>">
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
	          	<table style="width: 100% !important" class="table table-hover dataTable table-striped" id="Gateway-table">
	                <thead>
	                  	<th>SN</th>
						
						<th ><?php echo lang('name')?></th>
						<th ><?php echo lang('image')?></th>
						<th ><?php echo lang('live_merchant_id')?></th>
						<th ><?php echo lang('test_merchant_id')?></th>
						<th ><?php echo lang('live_secretkey')?></th>
						<th ><?php echo lang('test_secretkey')?></th>
						<th ><?php echo lang('status')?></th>

						<th>Action</th>
	                </thead>
	              	<tbody></tbody>
	          	</table>
	        </div>
		</div>
	</div>
</div>
<div id="Gateway-modal" class="modal fade" role="dialog">
  	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add/Edit Gateway</h4>
			</div>
			<div class="modal-body">
				<?php echo form_open('', array('id' =>'form-gateways', 'onsubmit' => 'return false')); ?>
		        	<input type = "hidden" name = "id" id = "id"/>
		            
				
				<div class='form-group'>
				<label for='gateways_name'><?php echo lang('name')?><span class='mandatory'>*</span></label>
				<input id='gateways_name' type='text' class='form-control' name='name'>
				</div>
				<div class='form-group'>
				<label for='image'><?php echo lang('image')?></label>
					<div id="image_upload_name" style="display:none"></div>
					<input name="image" id="image" class='text_input' style="display:none"/>
					<input type="file" id="image_upload" name="userfile" style="display:block"/>
				</div>
				<div class='form-group'>
				<label for='live_merchant_id'><?php echo lang('live_merchant_id')?></label>
				<input id='live_merchant_id' type='text' class='form-control' name='live_merchant_id'>
				</div>
				<div class='form-group'>
				<label for='test_merchant_id'><?php echo lang('test_merchant_id')?></label>
				<input id='test_merchant_id' type='text' class='form-control' name='test_merchant_id'>
				</div>
				<div class='form-group'>
				<label for='live_secretkey'><?php echo lang('live_secretkey')?></label>
				<input id='live_secretkey' type='text' class='form-control' name='live_secretkey'>
				</div>
				<div class='form-group'>
				<label for='test_secretkey'><?php echo lang('test_secretkey')?></label>
				<input id='test_secretkey' type='text' class='form-control' name='test_secretkey'>
				</div>
				<div class='form-group'>
				<label for='status'><?php echo lang('status')?></label>
				<br>
				<input type="checkbox" name='status' data-plugin="switchery" id='status' checked class='form-control' value="1" />
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

	$(document).on('click','#create-Gateway-button', function () { 
		$('#id').val('');
		$('#form-gateways').trigger('reset');
		$('#Gateway-modal').modal('show');
		uploadReady('image_upload','image','image_upload_name','change-image','<?php echo site_url("admin/gateways/upload")?>',"<?php echo site_url('uploads/gateways/')?>");
		$('#image_upload').show();
		$('#image_upload_name').hide();

		if (! $('#status')[0].checked){
			$('#status').trigger('click').attr("checked", "checked");
		}
    });

	var dataTable; 
	$(function(){
		dataTable = $('#Gateway-table').DataTable({
			dom: 'Bfrtip',
			// scrollX: true,
			"serverSide": true,
			buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
			],
			"columnDefs": [
	            {
	                // The `data` parameter refers to the data for the cell (defined by the
	                // `data` option, which defaults to the column being worked with, in
	                // this case `data: 0`.
	                "render": function ( data, type, row ) {
	                    return '<img src="<?php echo site_url('uploads/gateways/thumbs')?>/' + data + '" >' ;
	                },
	                "targets": 2
	            },
	            {
	                "render": function ( data, type, row ) {
	                	if(data == 1){
	                		return '<i class="icon wb-check" aria-hidden="true"></i>'
	                	}else{
	                		return '<i class="icon wb-close" aria-hidden="true"></i>'
	                	}
	                },
	                "targets": 7
	            },
	        ],
			'ajax' : { url: "<?php  echo site_url('admin/Gateways/json'); ?>",type: 'POST' },
				columns: [
					{ data: function (data, type, row, meta) {
				        return meta.row + meta.settings._iDisplayStart + 1;
			      	},name: "sn", searchable: false },
					{ data: "name",name: "name"},
					{ data: "image",name: "image"},
					{ data: "live_merchant_id",name: "live_merchant_id"},
					{ data: "test_merchant_id",name: "test_merchant_id"},
					{ data: "live_secretkey",name: "live_secretkey"},
					{ data: "test_secretkey",name: "test_secretkey"},
					{ data: "status",name: "status"},
					
					{ data: function(data,b,c,table) { 
						var buttons = '';

						buttons += "<a href='javascript::void(0)' data-toggle='modal' data-target='#Gateway-modal' class='btn btn-sm btn-success btn-outline'  title='Edit' onclick='edit("+table.row+")'><i class='icon wb-pencil' aria-hidden='true'></i></a>&nbsp;&nbsp"; 

						buttons += "<a onclick='removegateway("+data.id+")' href='javascript::void(0)' class='btn btn-sm btn-danger btn-outline'  title='Delete' ><i class='icon wb-trash' aria-hidden='true'></i></a>";

						return buttons;
					}, name:'action',searchable: false},	
				],
			});
	});


	function edit(index)
	{
		uploadReady('image_upload','image','image_upload_name','change-image','<?php echo site_url("admin/gateways/upload")?>',"<?php echo site_url('uploads/gateways/')?>");
		var row = dataTable.row(index).data();

		$('#id').val(row.id);
		$("#form-gateways").find('input:checkbox').prop('checked',false);
		$("#form-gateways").find('input:text,select,textarea').val(function(i,v){

			/*if(row.gender == 'M')
			{
				$('input:radio[name=gender][id=radio_1]').prop('checked',true);
			}else{
				$('input:radio[name=gender][id=radio_2]').prop('checked',true);
			}*/
			return row[this.name];
		});

		$('#image').val(row.image);
		$('#image_upload_name').html('<img src="<?php echo site_url()?>uploads/gateways/thumbs/'+row.image+'" height="100px" width="100px"> <button type="button" onclick="remove_doc()" class="btn btn-danger"><i class="fa fa-trash"></i></button>');
		$('#image_upload_name').show();
		$('#change-image').show();

		// $('select').selectpicker('render');

		toggleSwitch("#status", row.status);

		/*$("#form-gateways").find('input:checkbox').prop('checked',function(){
			// if($.inArray(this.value,row.array) >= 0)
			// { 
				return true; 
			// }

		});	*/
	}

	function removegateway(index)
	{
		$.post("<?php   echo site_url('admin/Gateways/delete_json')?>", {id:[index]}, function(){
			dataTable.ajax.reload( null, false );
		});
	}

	function save()
	{
		$.ajax({
			url: "<?php   echo site_url('admin/Gateways/save')?>",
			data: $('#form-gateways').serialize(),
			dataType: 'json',
			success: function(result){
				if(result.success)
				{
					$('#Gateway-modal').modal('hide');
					$('#form-gateways')[0].reset();
					dataTable.ajax.reload( null, false );
				}
			},
			type: 'POST'
		});
	}
</script>		
<script type="text/javascript">
	function remove_doc(argument) {
		$('#image_upload').show();
		$('#image_upload_name').hide();
		$('#document').val('');
	}
</script>		
<script type="text/javascript">
	function toggleSwitch(switch_elem, on) {
		$(switch_elem).trigger('click').attr("checked", "checked");
	    if (on == 1){ // turn it on
	        if ($(switch_elem)[0].checked){ // it already is so do 
	            // nothing
	        }else{
	            $(switch_elem).trigger('click').attr("checked", "checked"); // it was off, turn it on
	        }
	    }else{ // turn it off
	        if ($(switch_elem)[0].checked){ // it's already on so 
	            $(switch_elem).trigger('click').removeAttr("checked"); // turn it off
	        }else{ // otherwise 
	            // nothing, already off
	        }
	    }
	}
</script>