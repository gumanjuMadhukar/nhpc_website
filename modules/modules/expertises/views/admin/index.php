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
        	<div class="row">
				<div class="col-md-1">
					<label>Program</label>
				</div>
				<div class="col-md-2">
					<select class="form-control search_field" id="search-program">
						<option value="">All</option>
						<option>M.Sc. MLT/Medical/Clinical Bio-Chemistry</option>
						<option>M.Sc. MLT/Medical/Clinical (Hematology & Transfusion Medicine)</option>
						<option>M.Sc. MLT/Medical/Clinical Microbiology</option>
						<option>Master In Homeopathy (MD)</option>
						<option>M.Sc. Perfusion Technology</option>
						<option>Master In Clinical Yoga/Yoga And Rehabilitation(MD)</option>
						<option>Master In Optometry/Master Of Optometry/ Master Of Clinical Optometry/M.Sc. In Optometry/M.Phil In O</option>
						<option>M.Sc. In Medical Imaging Technology/M.Sc. In Radiology Technology (M.Sc. MIT)</option>
						<option>M.Phil. In Clinical Psychology</option>
						<option>Master Of Public Health (MPH)</option>
						<option>Master Of Physiotherapy (MPT)</option>
						<option>Master Of Audiology & Speech Language Pathology (MASLP)</option>
						<option>Master Of Science Immunology</option>
						<option>MPT (Obstetrics And Gynecology)</option>
						<option>M.Sc. Anesthesia Technology</option>
						<option>MD Clinical Naturopathy</option>
						<option>Master In Health Promotion And Education (MHPE)</option>
						<option>Master in Dentel Surgery (MDS)</option>
						<option>Msc Medical Physics</option>
						<option>B.Sc. Anaesthesia Technology</option>
						<option>Bachelor Of Science In MLT (B.Sc. MLT/ BMLT)</option>
						<option>Bachelor In Optometry / D. Optometry</option>
						<option>B.Sc. Medical Microbiology</option>
						<option>B.Sc. Medical Imaging Technology</option>
						<option>Bachelor Of Physiotherapy (BPT)</option>
						<option>Bachelor In Homoeopathic Medicine And Surgery (BHMS)</option>
						<option>Bachelor In Naturopathy & Yogic Sciences (BNYS)</option>
						<option>Bachelor In Audiology And Speech Language Pathology (BASLP)</option>
						<option>Bachelor Of Public Health (BPH)</option>
						<option>B.Sc. Cardiac Technology</option>
						<option>B.Sc. Radiotherapy Technology</option>
						<option>Bachelor In Perfusion Technology</option>
						<option>B.Sc. Renal Dialysis Techonology</option>
						<option>Bachelor Of Prosthetics And Orthotics</option>
						<option>B.Sc. Medical Biochemistry</option>
						<option>Bachelor Of Occupational Therapy</option>
						<option>Bachelor in Sowa-Rigpa</option>
						<option>Post Graduate Diploma In Health Promotion & Education</option>
						<option>B.Sc. Operation Theatre Technology</option>
						<option>Bacholer in dentel surgery (BDS)</option>
						<option>PCL In Radiography/Diploma In X-Ray Technology</option>
						<option>PCL in Dental Science (Dental Hygiene)</option>
						<option>PCL In Ophthalmic Science/Diploma In Ophthalmic Technique</option>
						<option>PCL In Medical Laboratory Technology (CMLT/ DMLT)</option>
						<option>PCL In General Medicine (HA)</option>
						<option>PCL In Physiotherapy</option>
						<option>Diploma In Operation Theatre Technology</option>
						<option>Diploma In Dialysis Technology</option>
						<option>PCL In Acupuncture, Acupressure And Moxibustion</option>
						<option>Dental science (DH)</option>
						<option>PCL in Sowa-Rigpa</option>
					</select>
				</div>
				<div class="col-md-1">
					<label>Level</label>
				</div>
				<div class="col-md-2">
					<select class="form-control search_field" id="search-level">
						<option value="">All</option>
						<option>Bachelor</option>
						<option value="master">Masters</option>
						<option>MPHIL</option>
						<option>P.HD</option>
					</select>
				</div>
				<!-- <div class="col-md-1">
					<label>Status</label>
				</div>
				<div class="col-md-2">
					<select class="form-control search_field" id="search-status">
						<option value="">All</option>
						<option value="pending">Pending</option>
						<option value="level1_approve">Level 1 Approve</option>
						<option value="level2_approve">Level 2 Approve</option>
						<option value="REJECT">REJECT</option>
					</select>
				</div> -->
				<!-- <div class="col-md-3"><label></label></div> -->
				<div class="col-md-2">
			        <div class="form-group">
			            <a href="<?php echo site_url('admin/Expertises')?>" class="btn btn-icon btn-danger btn-outline btn-round" title="Clear" id="clear-btn"><i class="fas fa-times"></i> </a>
			        </div>
			    </div>
			</div>
           	<div class="table-responsive">
	          	<table style="width: 100% !important" class="table table-hover dataTable table-striped" id="Expertise-table">
	                <thead>
	                  	<th>SN</th>
						<th>Action</th>
						<th ><?php echo lang('id')?></th>
						<th ><?php echo lang('full_name')?></th>
						<th><?php echo lang('qualification')?></th>
						<th ><?php echo lang('registration_no')?></th>
						<th ><?php echo lang('area_of_expertise')?></th>
						<th ><?php echo lang('experiance')?></th>
						<th ><?php echo lang('institutional_affilation')?></th>
						<th ><?php echo lang('mobile')?></th>
						<th ><?php echo lang('email')?></th>
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
		$('select').select2();

		dataTable = $('#Expertise-table').DataTable({
			dom: 'Blfrtip', // 'B' enables buttons
			// scrollX: true,
			"serverSide": true,
			buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
			],
			'ajax' : { 
				url: "<?php  echo site_url('admin/Expertises/json'); ?>",
				type: 'POST',
				data: function (d) {
			        d.program = $('#search-program').val();
			        d.level = $('#search-level').val();
			        // d.status = $('#search-status').val();
			    },
			},
			lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
			columns: [
				{ data: function (data, type, row, meta) {
			        return meta.row + meta.settings._iDisplayStart + 1;
		      	},name: "sn", searchable: false, sortable:false },
				{ data: function(data,b,c,table) { 
					var buttons = '<div class="btn-group">';

					// buttons += "<a href='javascript::void(0)' data-toggle='modal' data-target='#Expertise-modal' class='btn btn-sm btn-success btn-outline'  title='Edit' onclick='edit("+table.row+")'><i class='icon wb-pencil' aria-hidden='true'></i></a>&nbsp;&nbsp"; 
					buttons += "<a href='<?php echo site_url()?>/admin/Expertises/profile/"+data.id+"' class='btn btn-sm btn-success btn-outline' title='Profile' target='_blank'><i class='icon fa fa-user' aria-hidden='true'></i></a>"; 

					buttons += "<a onclick='removeexpertise("+data.id+")' href='javascript::void(0)' class='btn btn-sm btn-danger btn-outline'  title='Delete' ><i class='icon fa fa-trash' aria-hidden='true'></i></a>";
					buttons += "</div>";

					return buttons;
				}, name:'action',searchable: false, sortable:false},	

				{ data: "id",name: "id"},
				{ data: "full_name",name: "full_name"},
				{ data: "level",name: "level"},
				{ data: "registration_no",name: "registration_no"},
				{ data: "subject",name: "subject"},
				{ data: "experiance",name: "experiance"},
				{ data: "institutional_affilation",name: "institutional_affilation"},
				{ data: "mobile",name: "mobile"},
				{ data: "email",name: "email"},
				
			],
		});
	});

	function removeexpertise(index)
	{
		if(confirm('Do you want to delete this data?'))
		{
			$.post("<?php   echo site_url('admin/Expertises/delete_json')?>", {id:index}, function(){
				dataTable.ajax.reload( null, false );
			});
		}
	}

	
</script>	

<script>
    $('.search_field').on('change',function(e){
        dataTable.ajax.reload()
    })
</script>			