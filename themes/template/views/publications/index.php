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
              <h3>Publications</h3>
            </div>
            <div class="bread-crum">
              <span><a href="">HOME </a> / Publications</span>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
  <section id="publications">
    <div class="section-wrapper">
      <div class="container">
        <div class="col-md-8 offset-md-2">
          <div class="heading">
            <h2 style="color:#1363aa">List of Publication</h2>
            <p></p>
          </div>
          <div class="publication-group">
            <div class="list-group">
               <?php
                foreach($publications as $k=>$v)
                {
              ?>
              <div class="list-group-item">
                <a href="<?php echo $v->link; ?>">
                  <div class="d-flex justify-content-between">
                    <div class="name"><?php echo $v->name; ?></div>
                    <div class="icon"><i class="ri-external-link-fill"></i></div>
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