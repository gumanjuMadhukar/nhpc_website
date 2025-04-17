<?php /* <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?php echo lang('health_professionals'); ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('admin'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      				<li class="breadcrumb-item active"><a href="#"><?php echo lang('health_professionals'); ?></a></li>
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
            <h3 class="card-title"><?php echo lang('Health_professional'); ?></h3>
	            <a href="javascript::void(0)" id="create-Health_professional-button" class="btn btn-sm btn-primary btn-outline btn-round"  title="<?php echo lang('general_create'); ?>">
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
	          	<table style="width: 100% !important" class="table table-hover dataTable table-striped" id="Health_professional-table">
	                <thead>
	                  	<th>SN</th>
<th ><?php echo lang('first_name')?></th>
<!-- <th ><?php echo lang('middle_name')?></th> -->
<th ><?php echo lang('last_name')?></th>
						<th>Action</th>
	                </thead>
	              	<tbody></tbody>
	          	</table>
	        </div>
        </div>
    </div>
</section>
<div id="Health_professional-modal" class="modal fade" role="dialog">
  	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add/Edit Health_professional</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<?php echo form_open('', array('id' =>'form-health_professionals', 'onsubmit' => 'return false')); ?>
		        	<input type = "hidden" name = "id" id = "id"/>
				<div class='form-group'>
				<label for='first_name'><?php echo lang('first_name')?></label>
				<input id='first_name' type='text' class='form-control' name='first_name'>
				</div>
				<div class='form-group'>
				<label for='middle_name'><?php echo lang('middle_name')?></label>
				<input id='middle_name' type='text' class='form-control' name='middle_name'>
				</div>
				<div class='form-group'>
				<label for='last_name'><?php echo lang('last_name')?></label>
				<input id='last_name' type='text' class='form-control' name='last_name'>
				</div>
				<div class='form-group'>
				<label for='first_name_nepali'><?php echo lang('first_name_nepali')?></label>
				<input id='first_name_nepali' type='text' class='form-control' name='first_name_nepali'>
				</div>
				<div class='form-group'>
				<label for='middle_name_nepali'><?php echo lang('middle_name_nepali')?></label>
				<input id='middle_name_nepali' type='text' class='form-control' name='middle_name_nepali'>
				</div>
				<div class='form-group'>
				<label for='last_name_nepali'><?php echo lang('last_name_nepali')?></label>
				<input id='last_name_nepali' type='text' class='form-control' name='last_name_nepali'>
				</div>
				<div class='form-group'>
				<label for='sex'><?php echo lang('sex')?></label>
				<input id='sex' type='text' class='form-control' name='sex'>
				</div>
				<div class='form-group'>
				<label for='father_name'><?php echo lang('father_name')?></label>
				<input id='father_name' type='text' class='form-control' name='father_name'>
				</div>
				<div class='form-group'>
				<label for='father_name_nepali'><?php echo lang('father_name_nepali')?></label>
				<input id='father_name_nepali' type='text' class='form-control' name='father_name_nepali'>
				</div>
				<div class='form-group'>
				<label for='mother_name'><?php echo lang('mother_name')?></label>
				<input id='mother_name' type='text' class='form-control' name='mother_name'>
				</div>
				<div class='form-group'>
				<label for='mother_name_nepali'><?php echo lang('mother_name_nepali')?></label>
				<input id='mother_name_nepali' type='text' class='form-control' name='mother_name_nepali'>
				</div>
				<div class='form-group'>
				<label for='grand_father_name_nepali'><?php echo lang('grand_father_name_nepali')?></label>
				<input id='grand_father_name_nepali' type='text' class='form-control' name='grand_father_name_nepali'>
				</div>
				<div class='form-group'>
				<label for='grand_father_name'><?php echo lang('grand_father_name')?></label>
				<input id='grand_father_name' type='text' class='form-control' name='grand_father_name'>
				</div>
				<div class='form-group'>
				<label for='DOB'><?php echo lang('DOB')?></label>
				<input id='DOB' class='form-control datepicker' name='DOB'>
				</div>
				<div class='form-group'>
				<label for='year_dob_nepali_date'><?php echo lang('year_dob_nepali_date')?></label>
				<input id='year_dob_nepali_date' type='number' class='form-control' name='year_dob_nepali_date'>
				</div>
				<div class='form-group'>
				<label for='month_dob_nepali_date'><?php echo lang('month_dob_nepali_date')?></label>
				<input id='month_dob_nepali_date' type='number' class='form-control' name='month_dob_nepali_date'>
				</div>
				<div class='form-group'>
				<label for='day_dob_nepali_date'><?php echo lang('day_dob_nepali_date')?></label>
				<input id='day_dob_nepali_date' type='number' class='form-control' name='day_dob_nepali_date'>
				</div>
				<div class='form-group'>
				<label for='marital_status'><?php echo lang('marital_status')?></label>
				<input id='marital_status' type='text' class='form-control' name='marital_status'>
				</div>
				<div class='form-group'>
				<label for='husband_wife_name'><?php echo lang('husband_wife_name')?></label>
				<input id='husband_wife_name' type='text' class='form-control' name='husband_wife_name'>
				</div>
				<div class='form-group'>
				<label for='email'><?php echo lang('email')?></label>
				<input id='email' type='text' class='form-control' name='email'>
				</div>
				<div class='form-group'>
				<label for='phone_id'><?php echo lang('phone_id')?></label>
				<input id='phone_id' type='number' class='form-control' name='phone_id'>
				</div>
				<div class='form-group'>
				<label for='development_region_id'><?php echo lang('development_region_id')?></label>
				<input id='development_region_id' type='number' class='form-control' name='development_region_id'>
				</div>
				<div class='form-group'>
				<label for='zone_id'><?php echo lang('zone_id')?></label>
				<input id='zone_id' type='number' class='form-control' name='zone_id'>
				</div>
				<div class='form-group'>
				<label for='district_id'><?php echo lang('district_id')?></label>
				<input id='district_id' type='number' class='form-control' name='district_id'>
				</div>
				<div class='form-group'>
				<label for='vdc_municipality_nepali'><?php echo lang('vdc_municipality_nepali')?></label>
				<input id='vdc_municipality_nepali' type='text' class='form-control' name='vdc_municipality_nepali'>
				</div>
				<div class='form-group'>
				<label for='vdc_municipality_english'><?php echo lang('vdc_municipality_english')?></label>
				<input id='vdc_municipality_english' type='text' class='form-control' name='vdc_municipality_english'>
				</div>
				<div class='form-group'>
				<label for='ward_number_nepali'><?php echo lang('ward_number_nepali')?></label>
				<input id='ward_number_nepali' type='text' class='form-control' name='ward_number_nepali'>
				</div>
				<div class='form-group'>
				<label for='ward_number'><?php echo lang('ward_number')?></label>
				<input id='ward_number' type='number' class='form-control' name='ward_number'>
				</div>
				<div class='form-group'>
				<label for='tol'><?php echo lang('tol')?></label>
				<input id='tol' type='number' class='form-control' name='tol'>
				</div>
				<div class='form-group'>
				<label for='photo_link'><?php echo lang('photo_link')?></label>
				<input id='photo_link' type='number' class='form-control' name='photo_link'>
				</div>
				<div class='form-group'>
				<label for='student_id'><?php echo lang('student_id')?></label>
				<input id='student_id' type='number' class='form-control' name='student_id'>
				</div>
				<div class='form-group'>
				<label for='level_id'><?php echo lang('level_id')?></label>
				<input id='level_id' type='number' class='form-control' name='level_id'>
				</div>
				<div class='form-group'>
				<label for='program_id'><?php echo lang('program_id')?></label>
				<input id='program_id' type='number' class='form-control' name='program_id'>
				</div>
				<div class='form-group'>
				<label for='hospital'><?php echo lang('hospital')?></label>
				<input id='hospital' type='text' class='form-control' name='hospital'>
				</div>
				<div class='form-group'>
				<label for='academic_year'><?php echo lang('academic_year')?></label>
				<input id='academic_year' type='number' class='form-control' name='academic_year'>
				</div>
				<div class='form-group'>
				<label for='board_registration_number'><?php echo lang('board_registration_number')?></label>
				<input id='board_registration_number' type='text' class='form-control' name='board_registration_number'>
				</div>
				<div class='form-group'>
				<label for='college_id'><?php echo lang('college_id')?></label>
				<input id='college_id' type='number' class='form-control' name='college_id'>
				</div>
				<div class='form-group'>
				<label for='ethinic_id'><?php echo lang('ethinic_id')?></label>
				<input id='ethinic_id' type='number' class='form-control' name='ethinic_id'>
				</div>
				<div class='form-group'>
				<label for='cast_id'><?php echo lang('cast_id')?></label>
				<input id='cast_id' type='number' class='form-control' name='cast_id'>
				</div>
				<div class='form-group'>
				<label for='current_status'><?php echo lang('current_status')?></label>
				<input id='current_status' type='text' class='form-control' name='current_status'>
				</div>
				<div class='form-group'>
				<label for='applied_date'><?php echo lang('applied_date')?></label>
				<input id='applied_date' class='form-control datepicker' name='applied_date'>
				</div>
				<div class='form-group'>
				<label for='applied_date_nepali'><?php echo lang('applied_date_nepali')?></label>
				<input id='applied_date_nepali' type='text' class='form-control' name='applied_date_nepali'>
				</div>
				<div class='form-group'>
				<label for='crn'><?php echo lang('crn')?></label>
				<input id='crn' type='number' class='form-control' name='crn'>
				</div>
				<div class='form-group'>
				<label for='temp_registration_number'><?php echo lang('temp_registration_number')?></label>
				<input id='temp_registration_number' type='text' class='form-control' name='temp_registration_number'>
				</div>
				<div class='form-group'>
				<label for='registration_number'><?php echo lang('registration_number')?></label>
				<input id='registration_number' type='text' class='form-control' name='registration_number'>
				</div>
				<div class='form-group'>
				<label for='status'><?php echo lang('status')?></label>
				<input id='status' type='number' class='form-control' name='status'>
				</div>
				<div class='form-group'>
				<label for='created_date'><?php echo lang('created_date')?></label>
				<input id='created_date' class='form-control datetimepicker' name='created_date'>
				</div>
				<div class='form-group'>
				<label for='approved_level'><?php echo lang('approved_level')?></label>
				<input id='approved_level' type='number' class='form-control' name='approved_level'>
				</div>
				<div class='form-group'>
				<label for='international_college'><?php echo lang('international_college')?></label>
				<input id='international_college' type='text' class='form-control' name='international_college'>
				</div>
				<div class='form-group'>
				<label for='category_id'><?php echo lang('category_id')?></label>
				<input id='category_id' type='number' class='form-control' name='category_id'>
				</div>
				<div class='form-group'>
				<label for='citizenship_number'><?php echo lang('citizenship_number')?></label>
				<input id='citizenship_number' type='text' class='form-control' name='citizenship_number'>
				</div>
				<div class='form-group'>
				<label for='updated_date'><?php echo lang('updated_date')?></label>
				<input id='updated_date' class='form-control datetimepicker' name='updated_date'>
				</div>
				<div class='form-group'>
				<label for='date_'><?php echo lang('date_')?></label>
				<input id='date_' class='form-control datepicker' name='date_'>
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

	$(document).on('click','#create-Health_professional-button', function () { 
		$('#id').val('');
		$('#form-health_professionals').trigger('reset');
		$('#Health_professional-modal').modal('show');
    });

	var dataTable; 
	$(function(){
		dataTable = $('#Health_professional-table').DataTable({
			dom: 'frtip',
			// scrollX: true,
			"serverSide": true,
			buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
			],
			'ajax' : { url: "<?php  echo site_url('admin/Health_professionals/json'); ?>",type: 'POST' },
				columns: [
					{ data: function (data, type, row, meta) {
				        return meta.row + meta.settings._iDisplayStart + 1;
			      	},name: "sn", searchable: false },
				{ data: "first_name",name: "first_name"},
				// { data: "middle_name",name: "middle_name"},
				{ data: "last_name",name: "last_name"},
					
					{ data: function(data,b,c,table) { 
						var buttons = '';

						buttons += "<a href='javascript::void(0)' data-toggle='modal' data-target='#Health_professional-modal' class='btn btn-sm btn-success btn-outline'  title='Edit' onclick='edit("+table.row+")'><i class='icon wb-pencil' aria-hidden='true'></i></a>&nbsp;&nbsp"; 

						buttons += "<a onclick='removehealth_professional("+data.id+")' href='javascript::void(0)' class='btn btn-sm btn-danger btn-outline'  title='Delete' ><i class='icon wb-trash' aria-hidden='true'></i></a>";

						return buttons;
					}, name:'action',searchable: false},	
				],
			});
	});


	function edit(index)
	{
		var row = dataTable.row(index).data();

		$('#id').val(row.id);
		$("#form-health_professionals").find('input:checkbox').prop('checked',false);
		$("#form-health_professionals").find('input:text,select,textarea').val(function(i,v){

			/*if(row.gender == 'M')
			{
				$('input:radio[name=gender][id=radio_1]').prop('checked',true);
			}else{
				$('input:radio[name=gender][id=radio_2]').prop('checked',true);
			}*/
			return row[this.name];
		});
		// $('select').selectpicker('render');

		$("#form-health_professionals").find('input:checkbox').prop('checked',function(){
			// if($.inArray(this.value,row.array) >= 0)
			// { 
				return true; 
			// }

		});	
	}

	function removehealth_professional(index)
	{
		if(confirm("Are you sure you want to delete?") == true){
		$.post("<?php   echo site_url('admin/Health_professionals/delete_json')?>", {id:[index]}, function(){
			dataTable.ajax.reload( null, false );
		});
		}
	}

	function save()
	{
		$.ajax({
			url: "<?php   echo site_url('admin/Health_professionals/save')?>",
			data: $('#form-health_professionals').serialize(),
			dataType: 'json',
			success: function(result){
				if(result.success)
				{
					$('#Health_professional-modal').modal('hide');
					$('#form-health_professionals')[0].reset();
					dataTable.ajax.reload( null, false );
				}
			},
			type: 'POST'
		});
	}
	

	
</script>				