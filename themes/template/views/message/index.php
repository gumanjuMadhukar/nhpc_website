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
              <h3><?php echo $message_detail->subject ?></h3>
            </div>
            <div class="bread-crum">
              <span><a href="">HOME </a> / MESSAGE</span>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
    <section id="actFormations">
      <div class="section-wrapper">
        <div class="container">
          <div class="row">
            <div class="col-md-8 offset-md-2">
              <?php echo $message_detail->description; ?>
            </div>
            <div class="col-md-8 offset-md-2">
              <div class="image">
                <img src="<?php echo base_url('uploads/messages/'.$message_detail->image);?>" width=200px>
              </div>
              <?php echo $message_detail->name?>
            </div>
          </div>
        </div>
      </div>
    </section>
  