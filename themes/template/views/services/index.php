<?php
  $contact_detail_data = setting();
  $contact_detail = $contact_detail_data['setting'];
?>
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
              <h3>Coming Soon</h3>
            </div>
            <div class="bread-crum">
              <span><a href="">HOME </a> / Online Traning</span>
            </div>
          </div>

        </div>
      </div>
    </div>
</section>
<?php /*
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
              <h3>Online Traning</h3>
            </div>
            <div class="bread-crum">
              <span><a href="">HOME </a> / Online Traning</span>
            </div>
          </div>

        </div>
      </div>
    </div>
</section>
   <?php
  $temp_class = 1;
      foreach($services as $k=>$v)
      {
  ?>
  <section class="service-block">
    <div class="section-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-md-6 <?php echo ($temp_class == 2)?'order-md-2':''?>">
            <div class="image-wrapper">
              <img src="<?php echo base_url('uploads/services/'.$v->image);?>" alt="">
            </div>
          </div>
          <div class="col-md-6 <?php echo ($temp_class == 2)?'order-md-1':''?>">
            <div class="service-content-wrapper">
              <h4><?php echo $v->name;?></h4>
              <p><?php echo $v->description;?></p>
              <div class="action-wrapper">
                <?php 
                if($v->name == 'Health Professional Information')
                {
                ?>
                <a href="" class="btn btn-outline-custom">Read More</a>
                <?php } else { ?>
                <a href="<?php echo site_url('degrees'); ?>" class="btn btn-custom">
                  <i class="ri-search-2-line"></i>
                  Search Now</a>
                <?php
                }
                ?>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
   <?php
        if($temp_class == 1){
          $temp_class = 2;
        }else{
          $temp_class = 1;
        }

      }
  ?>
  <section id="covidAlert">
    <div class="alert-wrapper">
      <div class="container">
        <div class="d-flex justify-content-between">
          <div class="alert">
            <div class="d-flex">
              <div class="alert-icon">
                <i class="ri-virus-fill ri-4x"></i>
              </div>
              <div class="alert-heading">
                <h4>
                  <?php
                      echo $contact_detail[6]->value;
                  ?>
                </h4>
                <p>
                  <?php
                      echo $contact_detail[7]->value;
                  ?>
                </h4>
                </p>
              </div>

            </div>
          </div>
          <div class="alert-action">
            <a href="<?php echo base_url('uploads/covid_pdf/'.$contact_detail[8]->value); ?>" download="" class="btn btn-custom"><i class="ri-download-2-line"></i> Attachment </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  */?>