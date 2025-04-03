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
              <h3 >Board Members & Office Staffs</h3>
            </div>
            <div class="bread-crum">
              <span><a href="">HOME </a> / About Us</span>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
<section id="board-member">
    <div class="section-wrapper">
      <div class="container text-center">
        <div class="heading">
          <h2 style="color:#069; text-decoration: underline;">Board Members</h2>
<!--          <p>Meet our board members team to deliver the Nepal health a to step ahead</p>-->
        </div>
        <div class="members-block">
          <div class="row row-eq-height">
            <?php
                foreach($boardmembers as $k=>$v)
                {
            ?>
            <div class="col-md-3 col-sm-6 col-xs-6">
              <div class="member">
                <div class="member-image">
                  <?php if($v->image){?>
                    <img src="<?php echo base_url('uploads/boardmembers/'.$v->image);?>" alt="chairman">
                  <?php }else{?>
                    <img src="<?php echo base_url('assets/img/default_images/default_user.png');?>" alt="chairman">
                  <?php }?>
                </div>
                <div class="member-name">
                  <p><?php echo $v->name; ?></p>
                  <span><?php echo $v->designation; ?></span>
                </div>
              </div>
            </div>
            <?php
                }
            ?>
        </div>
      </div>
    </div>
  </section>
  <section id="office-staff">
    <div class="section-wrapper">
      <div class="container text-center">
        <div class="heading">
          <h2>Office Staffs</h2>
          <p>Meet our office Staffs representing NHPC</p>
        </div>
        <div class="members-block">
          <!-- <div class="office-slider"> -->
          <div class="row row-eq-height">
            <?php
                foreach($staffs as $k=>$v)
                {
            ?>
            <div class="col-md-3 col-sm-6 col-xs-6">
              <div class="member">
                <div class="member-image">
                  <!-- <img src="<?php echo base_url('uploads/staffs/'.$v->image);?>" alt="chairman"> -->
                  <?php if($v->image){?>
                    <img src="<?php echo base_url('uploads/staffs/'.$v->image);?>" alt="chairman">
                  <?php }else{?>
                    <img src="<?php echo base_url('assets/img/default_images/default_user.png');?>" alt="chairman">
                  <?php }?>
                </div>
                <div class="member-name">
                  <p><?php echo $v->name; ?> (<?php echo $v->designation; ?>) </p>
                </div>
              </div>
            </div>
            <?php
                }
            ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <style>
    .members{
      .member-image{
        img{
          object-fit: contain;
          object-position: center;
        }
      }
    }
  </style>