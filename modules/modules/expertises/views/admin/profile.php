<!-- <section class="content-header">
    <div class="container-fluid">
    	<?php //echo $form; ?> 
    </div>
</section> -->
<!-- <pre>
	<?php //print_r($edit_data);?>
</pre> -->
<style type="text/css">
	.profile-image{
		width: 100%; 
		border-radius: 10% 10% 0% 0%; 
		/*box-shadow: 20px 0px 10px grey;*/
	}
	.profile-detail{
		border-radius: 0% 0% 10% 10%; 
		box-shadow: 0px 20px 10px grey;
	}
	.detail-box{
		background-color: #484954 !important;
		color: white !important;
		padding: 2%;
		box-shadow: 10px 20px 10px grey;
		min-height: 95%;
		padding: 20px;
	}

	.profile-header {
	    font-weight: 300;
	    display: inline-block;
	    padding-bottom: 5px;
	    position: relative;
		color: orange;
	}
	.profile-header:before{
	    content: "";
	    position: absolute;
	    width: 10%;
	    height: 1px;
	    bottom: 0;
	    /*left: 25%;*/
	    border-bottom: 4px solid orange;
	}
	dd:hover {
	  	background-color: grey;
	}
</style>

<script src="<?php echo base_url('assets') ?>/js/MFS100/mfs100-9.0.2.6.js"></script>

<?php /* <section class="content-header">
  	<div class="container-fluid">
        <div class="row mb-2">
          	<div class="col-sm-6">
            	<h1>Expert Detail</h1>
          	</div>
          	<div class="col-sm-6">
            	<ol class="breadcrumb float-sm-right">
              		<li class="breadcrumb-item"><a href="#">Home</a></li>
              		<li class="breadcrumb-item active">Expertiese</li>
            	</ol>
          	</div>
        </div>
  	</div><!-- /.container-fluid -->
</section>
*/?>
<section class="content">
  	
      	<div class="row">
        	<div class="col-12 col-sm-12 col-md-12 d-flex align-items-stretch flex-column">
          		
            		<div class="card-header text-muted border-bottom-0">
              			<!-- Symbol no.: <?php echo $row->id?> -->
            		</div>
            	
              		<div class="row">
                		<div class="col-5 text-center" style=" padding: 0% 2% 0% 2%;">
                			<div>
                  			<img class="profile-image" src="<?php echo site_url('/uploads/experties/profile_image/'.$row->profile_image)?>" style="">
                  			</div>
                    		<div class="card bg-light d-flex flex-fill profile-detail">
                    		<div class="card-body pt-10">
                      		<h2 class="lead">
                      			<b>
                      				<?php echo $row->first_name; ?> <?php echo ($row->middle_name)?$row->middle_name:'';?><?php echo $row->last_name; ?>
                      				(
                      				<?php echo $row->first_name_np; ?> <?php echo ($row->middle_name_np)?$row->middle_name_np:'';?><?php echo $row->last_name_np; ?>
                      				)
                  				</b>
                  			</h2>
                  			<h5 class="lead">Registration Number:<?php echo $row->registration_no?></h5>
                      		<ul class="ml-4 mb-0 fa-ul text-muted">

                        		<li class="small"><span class=""><i class="fas fa-lg fa-phone"></i></span> Phone #: <?php echo $row->phone?></li>
                        		<li class="small"><span class=""><i class="fas fa-lg fa-mobile"></i></span> Mobile #: <?php echo $row->mobile?></li>
                        		<li class="small"><span class=""><i class="fas fa-lg fa-at"></i></span> email #: <?php echo $row->email?></li>
                      		</ul>
            				</div>

                			</div>
                    	</div>
                    	<div class="col-md-7">
                    		<div class="card bg-light d-flex flex-fill detail-box">
                    			<h4 class="profile-header"><i class="fas fa-map-marker"></i> Address</h4>
                    			<dl class="row">
									<dt class="col-sm-4">Province</dt>
									<dd class="col-sm-8"><?php echo $row->province?></dd>
									<dt class="col-sm-4">District</dt>
									<dd class="col-sm-8"><?php echo $row->district?></dd>
									<dt class="col-sm-4">Mnu/VDC</dt>
									<dd class="col-sm-8"><?php echo $row->mnu_vdc?></dd>

									<dt class="col-sm-4">Ward</dt>
									<dd class="col-sm-8"><?php echo $row->ward?></dd>
									<dt class="col-sm-4">Address</dt>
									<dd class="col-sm-8"><?php echo $row->address?></dd>
								</dl>
								<h4 class="profile-header"><i class="fas fa-map-marker"></i> Temporary Address</h4>
                    			<dl class="row">
									<dt class="col-sm-4">Province</dt>
									<dd class="col-sm-8"><?php echo $row->temp_province?></dd>
									<dt class="col-sm-4">District</dt>
									<dd class="col-sm-8"><?php echo $row->temp_district?></dd>
									<dt class="col-sm-4">Mnu/VDC</dt>
									<dd class="col-sm-8"><?php echo $row->temp_mnu_vdc?></dd>
									<dt class="col-sm-4">Ward</dt>
									<dd class="col-sm-8"><?php echo $row->temp_ward?></dd>
									<dt class="col-sm-4">Address</dt>
									<dd class="col-sm-8"><?php echo $row->temp_address?></dd>
								</dl>

								<h4 class="profile-header"><i class="fas fa-map-marker"></i> Contact Detail</h4>
                    			<dl class="row">
									<dt class="col-sm-4">Phone</dt>
									<dd class="col-sm-8"><?php echo $row->phone?></dd>
									<dt class="col-sm-4">Mobile</dt>
									<dd class="col-sm-8"><?php echo $row->mobile?></dd>
									<dt class="col-sm-4">Email</dt>
									<dd class="col-sm-8"><?php echo $row->email?></dd>
								</dl>

								<h4 class="profile-header"><i class="fas fa-book"></i> Qualification And Experience</h4>
                    			<dl class="row">
									<dt class="col-sm-4">Level</dt>
									<dd class="col-sm-8"><?php echo $level['name']?></dd>
									<dt class="col-sm-4">Subject</dt>
									<dd class="col-sm-8"><?php echo $subject['name']?></dd>
									<dt class="col-sm-4">Qualification</dt>
									<dd class="col-sm-8"><?php echo $qualification['qualification']?></dd>
									<dt class="col-sm-4">Experiance</dt>
									<dd class="col-sm-8"><?php echo $row->experiance?> Year</dd>
								</dl>

								<h4 class="profile-header"><i class="fas fa-book"></i> Documents</h4>
                    			<dl class="row">
									<dt class="col-sm-4">CV</dt>
									<dd class="col-sm-8"><a href="<?php echo site_url()?>uploads/experties/profile_image/<?php echo $row->doc_cv?>" target="_blank">view cv</a></dd>
									<dt class="col-sm-4">Certificate(Front)</dt>
									<dd class="col-sm-8"><a href="<?php echo site_url()?>uploads/experties/profile_image/<?php echo $row->doc_certificate?>" target="_blank">view doc</a></dd>
									<dt class="col-sm-4">Certificate(Back)</dt>
									<dd class="col-sm-8"><a href="<?php echo site_url()?>uploads/experties/profile_image/<?php echo $row->certificate_back?>" target="_blank">view doc</a></dd>
								</dl>
                    		</div>
                    		
                    	</div>
                  	</div>
            
		</div>
		<!-- form detail -->
		
    </div>

</section>

