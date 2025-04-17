<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?php echo lang('expertises'); ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('admin'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      				<li class="breadcrumb-item active"><a href="#"><?php echo lang('expertises'); ?></a></li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><?php echo lang('Expertise'); ?></h3>
            <!-- <a href="javascript::void(0)" id="create-Expertise-button" class="btn btn-sm btn-primary btn-outline btn-round"  title="<?php echo lang('general_create'); ?>">
				<i class="icon wb-plus" aria-hidden="true"></i>
	        	<span class="hidden-sm-down">Create</span>
			</a> -->
			<a href="<?php echo site_url('admin/Expertises/export_excel')?>" id="create-Expertise-button" class="btn btn-sm btn-primary btn-outline btn-round"  title="Excel">
				<i class="icon fa-file-excel-o" aria-hidden="true"></i>
	        	<span class="hidden-sm-down">Excel</span>
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
	          	<table style="width: 100% !important" class="table table-hover dataTable table-striped" id="Expertise-table">
	                <thead>
	                  	<th>SN</th>
						<th>Action</th>
						<th ><?php echo lang('id')?></th>
						<th ><?php echo lang('first_name')?></th>
						<th ><?php echo lang('middle_name')?></th>
						<th ><?php echo lang('last_name')?></th>
						<th ><?php echo lang('verified_position')?></th>
						<th ><?php echo lang('institutional_affilation')?></th>
						<th ><?php echo lang('area_of_expertise')?></th>
						<th ><?php echo lang('mobile')?></th>
						<th ><?php echo lang('email')?></th>
						<!-- <th ><?php echo lang('first_name_np')?></th>
						<th ><?php echo lang('middle_name_np')?></th>
						<th ><?php echo lang('last_name_np')?></th> -->
						<!-- <th ><?php echo lang('level')?></th>
						<th ><?php echo lang('qualification')?></th>
						<th ><?php echo lang('registration_no')?></th>
						<th ><?php echo lang('subject')?></th>
						<th ><?php echo lang('experiance')?></th> -->

	                </thead>
	              	<tbody></tbody>
	          	</table>
	        </div>
        </div>
    </div>
</section>

<script language="javascript" type="text/javascript">

	

	var dataTable; 
	$(function(){
		dataTable = $('#Expertise-table').DataTable({
			dom: 'lfrtip',
			// scrollX: true,
			"serverSide": true,
			buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
			],
			'ajax' : { url: "<?php  echo site_url('admin/Expertises/json'); ?>",type: 'POST' },
				columns: [
					{ data: function (data, type, row, meta) {
				        return meta.row + meta.settings._iDisplayStart + 1;
			      	},name: "sn", searchable: false, sortable:false },
					{ data: function(data,b,c,table) { 
						var buttons = '<div class="btn-group">';

						// buttons += "<a href='javascript::void(0)' data-toggle='modal' data-target='#Expertise-modal' class='btn btn-sm btn-success btn-outline'  title='Edit' onclick='edit("+table.row+")'><i class='icon wb-pencil' aria-hidden='true'></i></a>&nbsp;&nbsp"; 
						buttons += "<a href='<?php echo site_url()?>/admin/Expertises/profile/"+data.id+"' class='btn btn-sm btn-success btn-outline' title='Profile' target='_blank'><i class='icon fa fa-user' aria-hidden='true'></i></a>"; 

						// buttons += "<a onclick='removeexpertise("+data.id+")' href='javascript::void(0)' class='btn btn-sm btn-danger btn-outline'  title='Delete' ><i class='icon fa fa-trash' aria-hidden='true'></i></a>";
						buttons += "</div>";

						return buttons;
					}, name:'action',searchable: false, sortable:false},	

					{ data: "id",name: "id"},
					{ data: "first_name",name: "first_name"},
					{ data: "middle_name",name: "middle_name"},
					{ data: "last_name",name: "last_name"},
					{ data: "verified_position",name: "verified_position"},
					{ data: "institutional_affilation",name: "institutional_affilation"},
					{ data: "area_of_expertise",name: "area_of_expertise"},
					{ data: "mobile",name: "mobile"},
					{ data: "email",name: "email"},
					// { data: "first_name_np",name: "first_name_np"},
					// { data: "middle_name_np",name: "middle_name_np"},
					// { data: "last_name_np",name: "last_name_np"},
					
					// { data: "level",name: "level"},
					// { data: "qualification",name: "qualification"},
					// { data: "registration_no",name: "registration_no"},
					// { data: "subject",name: "subject"},
					// { data: "experiance",name: "experiance"},
					// { data: "phone",name: "phone"},
					
				],
			});
	});


	

	function removeexpertise(index)
	{
		$.post("<?php   echo site_url('admin/Expertises/delete_json')?>", {id:[index]}, function(){
			dataTable.ajax.reload( null, false );
		});
	}

	
</script>				