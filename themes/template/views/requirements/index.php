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
              <h3>Requirements</h3>
            </div>
            <div class="bread-crum">
              <span><a href="">HOME </a> / Requirements</span>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
  <section id="requirements">
    <div class="section-wrapper">
      <div class="container">
        <div class="col-md-8 offset-md-2">
          <div class="requirement-group">
            <div class="list-group">
              <?php /*
                foreach($requirements as $k=>$v)
                {
              ?>
              <div class="list-group-item">
                <div class="d-flex justify-content-between">
                  <div class="name"><?php echo $v->name; ?></div>
                  <div class="attachments">
                    <a href="<?php echo base_url('uploads/requirements_pdf/'.$v->document); ?>" target="_blank" class="btn btn-custom-blue">
                      Download</a>
                  </div>
                </div>
              </div>
              <?php
                }*/
              ?>

              <?php
                foreach($requirements as $key=>$value)
                {
                ?>
                  <hr>
                  <h3 style="color:#1363aa">Requirements for <?php echo $key?> Level</h3>
                  <?php 
                  foreach($value as $k=>$v){
                  ?>
                <div class="list-group-item">
                  <div class="d-flex justify-content-between">
                    <div class="name"><?php echo $k+1 . '. ' .$v->name; ?></div>
                    <div class="attachments">
                      <?php if($v->document){?>
                        <a href="<?php echo base_url('uploads/requirements_pdf/'.$v->document); ?>" target="blank" class="btn btn-custom-blue">
                          Download Requirements</a>
                        <?php }?>
                    </div>
                  </div>
                </div>
              <?php
                  }
                }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>