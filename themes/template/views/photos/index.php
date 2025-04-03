<section id="inner-banner">
    <div class="inner-banner-wrapper">
      <div class="image-wrapper">
        <img src="https://images.unsplash.com/photo-1541829070764-84a7d30dd3f3?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1949&q=80" alt="">
      </div>
      <div class="image-overlay"></div>
      <div class="crum-page-title">
        <div class="container">
          <div class="d-flex justify-content-between">
            <div class="heading">
              <h3>Photos & Media</h3>
            </div>
            <div class="bread-crum">
              <span><a href="">HOME </a> / About Us</span>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
<section id="media">
    <div class="section-wrapper">
      <div class="container">
        <div class="media-wrapper">
          <div class="row">
             <?php
              foreach($photos as $k=>$v)
              {
            ?>
            <a href="<?php echo base_url('uploads/photos/'.$v->image);?>" data-toggle="lightbox" data-lightbox="gallery" class="col-md-4">
              <img src="<?php echo base_url('uploads/photos/'.$v->image);?>" class="img-fluid rounded img-responsive">
            </a>
            <?php
                }
            ?>
          </div>
        </div>
      </div>
  </div></section>