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
              <h3>Registered Colleges</h3>
            </div>
            <div class="bread-crum">
              <span><a href="">HOME </a> / Education</span>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
<section id="partner">
    <div class="section-wrapper">
      <div class="container">
        <div class="col-md-8 offset-md-2">
          <div class="heading">
            <h2>List of Registered Colleges</h2>
            <p>Here are more than hundred colleges registered at NHPC. NHPC registered colleges possess the minimum
              requirements that is needed for the production of quality health professional. Candidates from registered
              colleges are only eligible for applying for registration at NHPC.

            </p>
          </div>
          <div class="partner-group">
            <div class="list-group">
              <?php
              foreach($colleges as $k=>$v){
              ?>
              <hr />
              <h3 style="color:#1363aa"><?php echo $k?></h3>
              <?php 
                foreach($v as $k1=>$v1){
              ?>
              <div class="list-group-item">
                <a href="<?php echo $v1->link; ?>">
                  <div class="d-flex justify-content-between">
                    <div class="name"><?php echo $v1->name; ?></div>
                    <!-- <div class="programe-code"><?php //echo $v->code; ?></div> -->
                  </div>
                  <!-- <span><?php //echo $v->address; ?></span> -->
                </a>
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