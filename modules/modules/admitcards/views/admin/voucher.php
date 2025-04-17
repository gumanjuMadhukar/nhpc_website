<?php /*<section class="content-header">
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
*/?>
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><?php echo lang('Admitcard'); ?></h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body">
           <div class="table-responsive">
	          	<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                    <th>REG ID</th>
                    <th>First Name </th>
                    <th>Middle Name </th>
                    <th>Last Name</th>
                    <th>Voucher Image</th>
                    <th>Valid</th>
                    <th>Send Message</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>REG ID</th>
                    <th>First Name </th>
                    <th>Middle Name </th>
                    <th>Last Name</th>
                    <th>Voucher Image</th>
                    <th>Valid</th>
                    <th>Send Message</th>
                </tr>
            </tfoot>
            <tbody>
            <?php foreach($students as $s){ ?>
                <tr>
                    <td><?php echo $s['id']; ?></td>
                    <td><?php echo $s['first_name']; ?> </td>
                    <td><?php echo $s['middle_name']; ?> </td>
                    <td><?php echo $s['last_name']; ?> </td>
                    <td><a href="https://nhpc.gov.np/beta/uploads/re_exam_voucher/<?php echo $s['re_exam_voucher_image']; ?>" target="_blank" ><img src="https://nhpc.gov.np/beta/uploads/re_exam_voucher/<?php echo $s['re_exam_voucher_image']; ?>" width="100" height="100" alt=""></a></td>
                    <!-- <td></td> -->
                    <td><?php if($s['re_exam_voucher_accept'] == '1'): ?>
                            <div id="<?php echo $s['id']; ?>">
                            <button onclick="status_active($user_id = <?php echo $s['id']; ?>)" name="aid" class="btn btn-success"  data-cid="1">Accepted</button>
                            </div>
        
                            <?php else:?>
                                <div id="<?php echo $s['id']; ?>">                
                                <button onclick="status_deactive($user_id = <?php echo $s['id']; ?>)" name="did" class="btn btn-danger"  data-cid="0">UnAccepted</button>
                                </div>
                                    
                        <?php endif; ?>
                    </td>
                    <td>
                    <div id="sm-<?php echo $s['id']; ?>">                
                      <button onclick="unaccept_message($user_id = <?php echo $s['id']; ?>)" name="sm-aid" class="btn btn-primary"  data-mid="0">Send Voucher not uploded</button>
                      

                    </div>



                    <?php if($s['voucher_uploaded'] == '0'): ?>
                          <div id="vsm-<?php echo $s['id']; ?>">                
                          
                            <button onclick="accept_message($user_id = <?php echo $s['id']; ?>)" name="vsm-aid" class="btn btn-success mt-2 "  data-smaid="0">Send Voucher uploded</button>

                          </div>
                          <?php else:?>
                            <div id="vsm-<?php echo $s['id']; ?>">                
                          
                          <button onclick="accept_message($user_id = <?php echo $s['id']; ?>)" name="vsm-aid" class="btn btn-success mt-2 "  data-smaid="0">Message Sent</button>

                        </div>

                      <?php endif; ?>



                        <!-- <?php if($s['re_exam_voucher_accept'] == '1'): ?>
                            <div id="<?php echo $s['id']; ?>">
                            <button onclick="status_active($user_id = <?php echo $s['id']; ?>)" name="aid" class="btn btn-success"  data-cid="1">Message sent</button>
                            </div>
        
                            <?php else:?>
                                <div id="<?php echo $s['id']; ?>">                
                                <button onclick="status_deactive($user_id = <?php echo $s['id']; ?>)" name="did" class="btn btn-primary"  data-cid="0">Send Message</button>
                                </div>
                                    
                        <?php endif; ?> -->
                    </td>
                    
                </tr>
                
             
                <?php } ?>
            </tbody>
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

<div id="result-modal" class="modal fade" role="dialog">
  	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Upload Result</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<?php echo form_open_multipart(site_url('admin/Admitcards/result'), array('id' =>'form-result')); ?>
			<div class="modal-body">
		        	<input type="file" name="result">
			</div>
			<div class="modal-footer">
				<button class="btn bg-green waves-effect" onClick="save()"><?php echo lang('general_save'); ?></button>			
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('general_cancel'); ?></button>
			</div>
		    <?php echo form_close(); ?>
		</div>

  	</div>
</div>

<script language="javascript" type="text/javascript">

	$(document).on('click','#create-Admitcard-button', function () { 
		$('#id').val('');
		$('#form-admitcards').trigger('reset');
		$('#Admitcard-modal').modal('show');
    });

    $('#result_upload').click(function(){
    	$('#result-modal').modal('show');
    })

	var dataTable; 
	$(function(){
		dataTable = $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
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

	// function removeadmitcard(index)
	// {
	// 	$.post("<?php   echo site_url('admin/Admitcards/delete_json')?>", {id:[index]}, function(){
	// 		dataTable.ajax.reload( null, false );
	// 	});
	// }

	// function save()
	// {
	// 	$.ajax({
	// 		url: "<?php   echo site_url('admin/Admitcards/save')?>",
	// 		data: $('#form-admitcards').serialize(),
	// 		dataType: 'json',
	// 		success: function(result){
	// 			if(result.success)
	// 			{
	// 				$('#Admitcard-modal').modal('hide');
	// 				$('#form-admitcards')[0].reset();
	// 				dataTable.ajax.reload( null, false );
	// 			}
	// 		},
	// 		type: 'POST'
	// 	});
	// }
	

	
</script>				