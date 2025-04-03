<div class="panel">
    <div class="panel-heading">
      	<h3 class="panel-title"><?php echo $table?></h3>
		<div class="page-header-actions">
			<a href="#" id="create-Gateway-button" class="btn btn-sm btn-primary btn-outline btn-round"  title="<?php echo lang('general_create'); ?>">
				<i class="icon wb-plus" aria-hidden="true"></i>
				<span class="hidden-sm-down">Create</span>
			</a>
		</div>
    </div>
    <div class="panel-body">
		<div class="table-responsive">
		  	<table style="width: 100% !important" class="table table-hover dataTable table-striped" id="Database-table">
		        <thead>
		          	<!-- <th>SN</th> -->
					<th>Action</th>
		          	<?php foreach ($structures as $key => $value) {?>
						<th ><?php echo $value->name?></th>
		          	<?php }?>
					
		        </thead>
		      	<tbody></tbody>
		  	</table>
		</div>
    </div>
</div>

<div id="Database-modal" class="modal fade" role="dialog">
  	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add/Edit Database</h4>
			</div>
			<div class="modal-body">
				<?php echo form_open('', array('id' =>'form-database', 'onsubmit' => 'return false')); ?>
					<input type="hidden" name="database_table_name" value="<?php echo $table?>">
					<?php foreach ($structures as $key => $value) {?>
						<div class='form-group'>
							<label for='<?php echo $value->name?>'><?php echo $value->name?></label>
							<input id='<?php echo $value->name?>' type='text' class='form-control' name='<?php echo $value->name?>'>
							<?php if($value->primary_key == 1){?>
								<input type="hidden" name="database_primary_key" value="<?php echo $value->name;?>">
							<?php }?>
						</div>
					<?php }?>
				
		        <?php echo form_close(); ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn bg-green waves-effect" onClick="save()"><?php echo lang('general_save'); ?></button>			
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('general_cancel'); ?></button>
			</div>
		</div>

  	</div>
</div>

<script type="text/javascript">
	dataTable = $('#Database-table').DataTable({
		dom: 'Bfrtip',
		// scrollX: true,
		"serverSide": true,
		buttons: [
		'copy', 'csv', 'excel', 'pdf', 'print'
		],
		/*"columnDefs": [
            {
                // The `data` parameter refers to the data for the cell (defined by the
                // `data` option, which defaults to the column being worked with, in
                // this case `data: 0`.
                "render": function ( data, type, row ) {
                    return '<img src="<?php echo site_url('uploads/Databases/thumbs')?>/' + data + '" >' ;
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
        ],*/
		'ajax' : { url: "<?php  echo site_url('admin/Database/table_data_json/'.$table); ?>",type: 'POST' },
			columns: [
				// { data: function (data, type, row, meta) {
			 //        return meta.row + meta.settings._iDisplayStart + 1;
		  //     	},name: "sn", searchable: false },
				{ data: function(data,b,c,table) { 
					var buttons = '';

					buttons += "<a href='javascript::void(0)' data-toggle='modal' data-target='#Database-modal' class='btn btn-sm btn-success btn-outline'  title='Edit' onclick='edit("+table.row+")'><i class='icon wb-pencil' aria-hidden='true'></i></a>&nbsp;&nbsp"; 

					buttons += "<a onclick='removeData("+data.id+")' href='javascript::void(0)' class='btn btn-sm btn-danger btn-outline'  title='Delete' ><i class='icon wb-trash' aria-hidden='true'></i></a>";

					return buttons;
				}, name:'action',searchable: false},	
		      	<?php foreach ($structures as $key => $value) {?>
		      		// # code...
					{ data: "<?php echo $value->name?>",name: "<?php echo $value->name?>"},
		      	<?php }?>
				
			],
		});
</script>

<script type="text/javascript">
	$('#create-Gateway-button').click(function(){
		$('#form-database').trigger("reset");
		$('#Database-modal').modal('show');
	});
</script>
<script type="text/javascript">
	function edit(index) {
		var row = dataTable.row(index).data();
		$('#form-database').trigger("reset");

		$.each(row,function(key,value){
			$('#'+key).val(value);
		});
	}
</script>

<script type="text/javascript">
	function save() {
		data = $('#form-database').serializeArray();
		$.post("<?php echo site_url('admin/Database/save')?>",data,function(result){
			if(result.success
				){
				dataTable.ajax.reload( null, false );
				$('#Database-modal').modal('hide');
			}else{
				alert('Error occured');
			}
		},'json');
	}
</script>

<script type="text/javascript">
	function removeData(id) {
		if(confirm('Do you want to remove data?')){
			$.post('<?php echo site_url('admin/Database/delete_record')?>',{id:id,table: '<?php echo $table?>'},function(result){
				if(result.success
					){
					alert('Data deleted successfully');
					dataTable.ajax.reload( null, false );
				}else{
					alert('Error occured');
				}
			},'json')
		}
	}
</script>