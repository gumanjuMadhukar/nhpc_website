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
              <h3>News & Updates</h3>
            </div>
            <div class="bread-crum">
              <span><a href="">HOME </a> / About Us</span>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
  <div id="news">
    <div class="section-wrapper">
      <div class="container">
        <div class="recent-news">
          <h3>Recent Highlights</h3>
          <div class="news-slider">
            <?php
                foreach($news_recent as $k=>$v)
                {
            ?>
            <div class="news">
              <div class="box">
                <div class="news-card">
                  <div class="image-wrapper">
                    <img src="<?php echo base_url('uploads/news/'.$v->image);?>" alt="">
                  </div>
                  <div class="news-title">
                    <span><?php echo $v->month_name; ?> <?php echo $v->day; ?> , <?php echo $v->year; ?></span>
                    <h6><?php echo $v->name; ?>
                    </h6>
                    <a href="<?php echo site_url('news/detail/'.$v->id); ?>">Read More</a>
                  </div>

                </div>
              </div>
            </div>
            <?php
                }
            ?>
          </div>
        </div>
        <div class="older-news ">
          <div class="older-news-wrapper">
            <div class="row">
              <div class="col-md-8 offset-md-2">
                <h3>More News & Highlights</h3>
                <?php
                    foreach($news as $k=>$v)
                    {
                ?>
                <div class="news-card">
                  <div class="d-flex justify-content-between">
                    <div class="news-image">
                      <img src="<?php echo base_url('uploads/news/'.$v->image);?>" alt="">
                    </div>
                    <div class="news-content">
                      <a href="<?php echo site_url('news/detail/'.$v->id); ?>">
                        <span><?php echo $v->month_name; ?> <?php echo $v->day; ?> , <?php echo $v->year; ?></span>
                        <h5><?php echo $v->name; ?>
                        </h5>
                      </a>
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
    </div>
  </div>
  <script>$(document).ready(function () {
  $('.news-slider').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    dots: false,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 5000
  });
});</script>