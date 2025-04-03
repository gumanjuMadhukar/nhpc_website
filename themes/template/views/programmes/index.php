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
              <h3>Programmes</h3>
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
            <h2>List of Programmes</h2>
            <p>There are seventeen educational programmes that are recognized by NHPC. NHPC is on the way to recognize
              further more educational programmes that are conducted by recognized institutions. Our organization is
              further involved in developing programmes to fit according to current situation of Nepal like PCL
              Orthopedics.

            </p>
          </div>
          <div class="partner-group">
            <div class="list-group">
              <?php
                foreach($programmes as $k=>$v)
                {
              ?>
              <div class="list-group-item">
                <a href="<?php echo $v->link; ?>">
                  <div class="d-flex justify-content-between">
                    <div class="name" style="color:#1363aa"><?php echo $v->name; ?></div>
                  </div>
                </a>
              </div>
              <?php
                }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>