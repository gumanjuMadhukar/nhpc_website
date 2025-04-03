<section id="inner-banner" class="faq-banner">
    <div class="inner-banner-wrapper">
      <div class="image-wrapper">
        <img src="https://images.unsplash.com/photo-1541829070764-84a7d30dd3f3?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1949&q=80" alt="">
      </div>
      <div class="image-overlay"></div>
      <div class="crum-page-title">
        <div class="container">
          <div class="d-flex justify-content-between">
            <div class="heading">
              <h3>Frequently Asked Question</h3>
            </div>
            <!-- <div class="bread-crum">
              <span><a href="">HOME </a> / FAQ</span>
            </div> -->
          </div>

        </div>
      </div>
    </div>
  </section>
  <section id="faq">
    <div class="section-wrapper">
      <div class="container">
        <div class="col-md-12 offset-md-1">
          <div class="faq-group">
            <div id="accordion">
                <?php
                foreach($faqs as $k=>$v)
                {
              ?>
              <div class="card">
                <div class="card-header" id="heading<?php echo $v->id; ?>">
                  <a class="" data-toggle="collapse" data-target="#collapse<?php echo $v->id; ?>" aria-expanded="true" aria-controls="collapse<?php echo $v->id; ?>">
                    <h5 class="mb-0">
                      <i class="ri-arrow-right-s-line"></i>
                      <?php echo $v->question; ?></h5>
                  </a>
                </div>
                <div id="collapse<?php echo $v->id; ?>" class="collapse show" aria-labelledby="heading<?php echo $v->id; ?>" data-parent="#accordion">
                  <div class="card-body">
                    <?php echo $v->answer; ?>
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
    </div>
  </section>