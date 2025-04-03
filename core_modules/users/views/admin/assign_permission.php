<!-- Content Wrapper. Contains page content -->
<div class="page-header">
    <h1 class="page-title">Assign Permission</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url('admin/home') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        
        <li class="breadcrumb-item active"><a href="#">Assign Permission</a></li>
    </ol>
</div>

<div class="panel">
    <header class="panel-heading">
    </header>
	<form action="<?php echo site_url('admin/Users/save_group_or_user_permission_custom') ?>" method="post">
		<input type="hidden" name="type" value="<?php echo $permission_type ?>">
		<input type="hidden" name="user_id" value="<?php echo $user_id ?>">
		<input type="hidden" name="group_id" value="<?php echo $group_id ?>">
	    <div class="panel-body">
	        <div class="row flex-row">
				<?php foreach ($permissions as $k => $permission) : ?>
					<div class="col-md-2">
						<input type="checkbox"  value="<?php echo $permission->id; ?>" name="permissions[]" id="permission-<?php echo $permission->id; ?>" <?php echo (in_array($permission->id, $selected))?'checked':'' ?>>
						<label for="permission-<?php echo $permission->id; ?>"><?php echo $permission->name ?></label>
					</div>			
				<?php endforeach; ?>
			</div>
	        <!-- /.box-body -->
	    </div>
	    <div class="panel-body">
	        <div class="row flex-row">
				<button class="btn btn-success btn-flat" type="submit">Save</button>
				<a class="btn btn-default btn-flat" href="<?php echo site_url('permissions') ?>">Cancel</a>
			</div>
		</div>
	</form>
    <!-- /.box -->
</div>

