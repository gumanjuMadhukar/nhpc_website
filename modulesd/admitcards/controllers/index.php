<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?php echo lang('admitcards'); ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('admin'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      				<li class="breadcrumb-item active"><a href="#"><?php echo lang('admitcards'); ?></a></li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><?php echo lang('Admitcard'); ?></h3>
	          <a href="<?php echo site_url('admin/Admitcards/generate_all_symbol_number')?>" class="btn btn-sm btn-primary btn-outline btn-round">
				<i class="icon wb-plus" aria-hidden="true"></i>
	        	<span class="hidden-sm-down">Generate Admit Card</span>
			</a>
			<a href="<?php echo site_url('admin/Admitcards/downloadExcel') ?>" class="btn btn-sm btn-primary btn-outline btn-round"  title="Download Excel">
			<i class="icon wb-plus" aria-hidden="true"></i>
        	<span class="hidden-sm-down">Download Excel</span>
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
	          	<table style="width: 100% !important" class="table table-hover dataTable table-striped" id="Admitcard-table">
	                <thead>
	                  	<th>SN</th>
<th ><?php echo lang('first_name')?></th>
<th ><?php echo lang('middle_name')?></th>
<th ><?php echo lang('last_name')?></th>
<th ><?php echo lang('symbol_number')?></th>
<!--<th >--><?php //echo lang('gender')?><!--</th>-->
<th ><?php echo lang('program')?></th>
<th ><?php echo lang('level')?></th>
<th >Photo</th>
<th>Action</th>
	                </thead>
	              	<tbody></tbody>
	          	</table>
	        </div>
        </div>
    </div>
</section>
<div id="Admitcard-modal" class="modal fade" role="dialog">
  	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit Admitcard</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<?php echo form_open('', array('id' =>'form-admitcards', 'onsubmit' => 'return false')); ?>
		        	<input type = "hidden" name = "id" id = "id"/>
		            <div class='form-group'>
						<label for='banners_name'>Wemcam Image<span class='mandatory'>*</span></label>
						<input id='banners_name' type='text' class='form-control' name='name'>
					</div>
					<div class='form-group'>
					<label for='banners_name'>Thumb <span class='mandatory'>*</span></label>
					<input id='banners_name' type='text' class='form-control' name='name'>
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

	$(document).on('click','#create-Admitcard-button', function () { 
		$('#id').val('');
		$('#form-admitcards').trigger('reset');
		$('#Admitcard-modal').modal('show');
    });

	var dataTable; 
	$(function(){
		dataTable = $('#Admitcard-table').DataTable({
			dom: 'frtip',
			// scrollX: true,
			"serverSide": true,
			// buttons: [
			// 'copy', 'csv', 'excel', 'pdf', 'print'
			// ],
			'ajax' : { url: "<?php  echo site_url('admin/Admitcards/json'); ?>",type: 'POST' },
				columns: [
					{ data: function (data, type, row, meta) {
				        return meta.row + meta.settings._iDisplayStart + 1;
			      	},name: "sn", searchable: false },
					
				{ data: "first_name",name: "first_name"},
				{ data: "middle_name",name: "middle_name"},
				{ data: "last_name",name: "last_name"},
				{ data: "symbol_number",name: "symbol_number"},
				{ data: "gender",name: "gender"},
				{ data: "program",name: "program"},
				{ data: "level",name: "level"},
				// { data: function(data,b,c,table){
				// 	var image = (data.photo_link)?'<img src="https://nhpc.gov.np/backend/web'+data.photo_link+'" class="table_image" height="100px" width="100px">':'';
				// 	return image;
				// },name: "image",
				},
				{ data: function(data,b,c,table) { 
						var buttons = '';
						var url = "admin/Admitcards/detail/"+data.id;
						buttons += "<a href='<?php echo site_url();?>/"+url+"' class='btn btn-sm btn-success btn-outline'  title='Edit'><i class='icon wb-pencil' aria-hidden='true'></i></a>&nbsp;&nbsp"; 

						// buttons += "<a onclick='removebanner("+data.id+")' href='javascript::void(0)' class='btn btn-sm btn-danger btn-outline'  title='Delete' ><i class='icon wb-trash' aria-hidden='true'></i></a>";

						return buttons;
					}, name:'action',searchable: false},
				],
			});
	});


	function edit(index)
	{
		var row = dataTable.row(index).data();

		$('#id').val(row.id);
		$("#form-admitcards").find('input:checkbox').prop('checked',false);
		$("#form-admitcards").find('input:text,select,textarea').val(function(i,v){

			/*if(row.gender == 'M')
			{
				$('input:radio[name=gender][id=radio_1]').prop('checked',true);
			}else{
				$('input:radio[name=gender][id=radio_2]').prop('checked',true);
			}*/
			return row[this.name];
		});
		// $('select').selectpicker('render');

		$("#form-admitcards").find('input:checkbox').prop('checked',function(){
			// if($.inArray(this.value,row.array) >= 0)
			// { 
				return true; 
			// }

		});	
	}

	function removeadmitcard(index)
	{
		$.post("<?php   echo site_url('admin/Admitcards/delete_json')?>", {id:[index]}, function(){
			dataTable.ajax.reload( null, false );
		});
	}

	function save()
	{
		$.ajax({
			url: "<?php   echo site_url('admin/Admitcards/save')?>",
			data: $('#form-admitcards').serialize(),
			dataType: 'json',
			success: function(result){
				if(result.success)
				{
					$('#Admitcard-modal').modal('hide');
					$('#form-admitcards')[0].reset();
					dataTable.ajax.reload( null, false );
				}
			},
			type: 'POST'
		});
	}
	

	
</script>				