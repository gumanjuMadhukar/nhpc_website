<?php echo form_open('', array('id' =>'form-new_table', 'onsubmit' => 'return false')); ?>
<div class="panel">
    <div class="panel-heading">
      	<h3 class="panel-title">New/Edit Table</h3>
    </div>
    <div class="panel-body">
			<label for='table_name'>Table Name</label>
			<input  type='text' class='form-control' name='table_name' value="<?php echo $table_name?>">
			<div class="table-responsive">
				<table class="table">
					<thead>
						<th>Name</th>
						<th>Type</th>
						<th>Length</th>
						<!-- <th>Not Null</th> -->
						<th>Primary Key</th>
						<!-- <th>Auto Increment</th> -->
						<th>Default</th>
						<th>As Defined Value</th>
					</thead>
					<tbody>
						<?php $i = (count($structures))?0:3;?>
						<?php $this->load->view('admin/table_form_content',$structures);?>
						<?php $this->load->view('admin/table_form_input',array('count'=>$i, 'start' => count($structures)-1));?>
						<tr></tr>
					</tbody>
				</table>
			</div>
    </div>
	<div class="panel-footer">
		<button type="button" id="submit-button" class="btn btn-success btn-outline">Save</button>
	</div>
</div>
<?php echo form_close(); ?>

<script type="text/javascript">
	$('#submit-button').click(function(argument) {
		$.post('<?php echo site_url("admin/Database/save_table")?>',$( "#form-new_table" ).serialize(),function(){},'json');
	})
</script>