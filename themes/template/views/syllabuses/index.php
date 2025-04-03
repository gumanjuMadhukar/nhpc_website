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
              <h3>Syllabus</h3>
            </div>
            <div class="bread-crum">
              <span><a href="">HOME </a> / Education</span>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
  <section id="syllabus">
    <!-- <div class="section-wrapper">
      <div class="container">
        <div class="col-md-8 offset-md-2">
          <div class="heading">
            <h2>Coming Soon</h2>
          </div>
        </div>
      </div>
    </div> -->
    <div class="section-wrapper">
      <div class="container">
        <div class="col-md-8 offset-md-2">
          <div class="heading">
            <h2 style="color:#1363aa">List of Subject and Syllabus</h2>
            <p></p>
          </div>
          <div class="syllabus-group">
            <div class="list-group">
              <?php
                foreach($syllabuses as $key=>$value)
                {
                ?>
                  <hr>
                  <h4 style="color:#1363aa">Syllabus for <?php echo $key?></h4>
                  <?php 
                  foreach($value as $k=>$v){
                  ?>
                <div class="list-group-item">
                  <div class="d-flex justify-content-between">
                    <div class="name"><?php echo $k+1 . '. ' .$v->name; ?></div>
                    <div class="attachments">
                      <a href="<?php echo base_url('uploads/syllabus_pdf/'.$v->document); ?>" target="blank" class="btn btn-custom-blue">
                        Download Syllabus</a>
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