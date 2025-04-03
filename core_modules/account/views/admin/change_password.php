<!-- Content Wrapper. Contains page content -->
<div class="page-header">
    <h1 class="page-title">Change Password</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo site_url('admin/home') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        
        <li class="breadcrumb-item active"><a href="#">Change Password</a></li>
    </ol>
</div>

<div class="page-content">
    <div class="panel">
        <header class="panel-heading">
        </header>
        <div class="panel-body">
            <div class="table-responsive">
                <?php print displayStatus();?>

                    <div class="box box-solid">
                        <?php echo form_open('admin/Account/change_password', array('id' =>'login')); ?>
                        <!-- <form action="https://nhpc.gov.np/admin/Account/change_password" id="login"> -->
                        <div class="box-body">
                            <div class="form-group">
                                <label for="general_current_password"><?php echo lang('general_current_password')?></label>
                                <input type="password" name="password" id="password" class="form-control" style="width:300px" />
                            </div>
                            <div class="form-group">
                                <label for="general_new_password"><?php echo lang('general_new_password')?></label>
                                <input type="password" name="new_password" id="new_password" class="form-control" style="width:300px" />
                            </div>
                            <div class="form-group">
                                <label for="general_conf_password"><?php echo lang('general_conf_password')?></label>
                                <input type="password" name="conf_password" id="conf_password" class="form-control" style="width:300px" />
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn bg-green waves-effect" name="submit">Submit</button>
                        </div>
                    <?php echo form_close(); ?>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</div>