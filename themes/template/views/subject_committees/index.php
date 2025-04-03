<style>
	.auto-width{
		width: auto !important;
	}
</style>
<section id="inner-banner">
    <div class="inner-banner-wrapper">
      <div class="image-wrapper">
        <img src="https://images.unsplash.com/photo-1579684453377-48ec05c6b30a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1968&q=80" alt="">
      </div>
      <div class="image-overlay"></div>
      <div class="crum-page-title">
        <div class="container">
          <div class="d-flex justify-content-between">
            <div class="heading">
              <h3>Subject Commitee Member</h3>
            </div>
            <div class="bread-crum">
              <span><a href="">HOME </a> / About Us</span>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
  <section id="board-member" class="subject-commeete-member">
  <?php
      foreach($subject_committees as $key=>$value)
      {
  ?>
    <div class="section-wrapper">
      <div class="container">
        <div class="heading">
          <h4 style="color:#069;  text-decoration: underline;"> <?php echo $key; ?> </h4>
        </div>
        <div class="members-block">
          <div class="row row-eq-height">
             <?php
                foreach($value as $k=>$v)
                {
            ?>
            <?php if($k == 0){?>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="member">
                <!-- <div class="member-image"> -->
                  <!-- <img src="<?php //echo base_url('uploads/subject_committees/'.$v->image);?>" alt="chairman"> -->
                <!-- </div> -->
              		<div class="member-image">
	              		<?php if($v->image){?>
	                  		<img src="<?php echo site_url('uploads/subject_committees/'.$v->image)?>" class="auto-width">
	              		<?php }else{?>
	                  		<img src="<?php echo site_url('assets/img/default_images/default_user.png')?>" class="auto-width">
	                  	<?php }?>
                  	</div>
                  <div class="member-name">
                    <p><?php echo $v->name; ?></p>
                    <p><?php echo $v->designation; ?></p>
                  </div>
                </div>
              </div>
            <?php }else{?>
              <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="member">
                <div class="member-image">
                	<?php if($v->image){?>
                  		<img src="<?php echo base_url('uploads/subject_committees/'.$v->image);?>" alt="chairman">
                  	<?php }else{?>
	                  		<img src="<?php echo site_url('assets/img/default_images/default_user.png')?>">
                  	<?php }?>
                </div>
                  <div class="member-name">
                    <p><?php echo $v->name; ?>
                    <p><?php echo $v->designation; ?></p>
                    </p>
                  </div>
                </div>
              </div>
            
            <?php }?>
              
            <?php
                }
            ?>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
  </section>