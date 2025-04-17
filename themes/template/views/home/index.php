<?php
  $contact_detail_data = setting();
  $contact_detail = $contact_detail_data['setting'];
?>
<?php $news = featured_news(3,'DESC')?>
<?php foreach (array_reverse($news) as $value) {?>
  <div class="modal fade notice-modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
      <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h5 class="modal-title" id="exampleModalLabel"><?php echo $value->name?></h5>
              <span style="max-width: 100%; overflow: scroll;">
                  <a href="<?php echo site_url()?>/news/detail/<?php echo $value->id?>"><span class="date"></span><?php echo $value->description?></a>
              </span>
            </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<?php }?>
<section id="main-banner-slider-updates">
    <div class="d-flex justify-content-between">
      <div class="banner-slider">
        <div class="update-slider">
          <?php
              foreach($banners as $k=>$v)
              {
          ?>
          <div class="slide">
            <div class="contains">
              <img src="<?php echo base_url('uploads/banners/'.$v->image);?>" style="height:90vh;" alt="">
              <div class="slide-text">
                <div class="container">
                  <div class="slide-heading" >
                    <h1 style="font-family:'Times New Roman', Times, serif; letter-spacing:0.5rem"><?php echo $v->name; ?></h1>
                     <h1 style="font-family:'Times New Roman', Times, serif; letter-spacing:0.2rem"><?php echo $v->description; ?></h1>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php
                }
          ?>
        </div>
      </div>
      <!-- <div class="news-updates">
        <div class="heading">
          <h4>Recent Updates</h4>
          <p>Stay updated with our recently addded news</p>
        </div>
        <div class="list-updates">
          <div class="list-group">
            <div class="list-group-item">
              <div class="d-flex ">
                <div class="date">
                  <span class="month">OCT</span>
                  <span>12</span>
                </div>
                <div class="news-link">
                  <a href="news-inner.html">Health certificates issued as per the decision of the council </a>
                </div>
              </div>
            </div>
            <div class="list-group-item">
              <div class="d-flex">
                <div class="date">
                  <span class="month">OCT</span>
                  <span>12</span>
                </div>
                <div class="news-link">
                  <a href="news-inner.html">Health certificates issued as per the decision of the council </a>
                </div>
              </div>
            </div>
            <div class="list-group-item">
              <div class="d-flex">
                <div class="date">
                  <span class="month">OCT</span>
                  <span>12</span>
                </div>
                <div class="news-link">
                  <a href="news-inner.html">Health certificates issued as per the decision of the council </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="news-redirects">
          <a href="news.html">See More News <i class="ri-arrow-right-s-line ri-lg"></i>
          </a>
        </div>
      </div> -->
    </div>
  </section>
  <!-- <section id="announcement">
    <div class="announcement-wrapper">
      <div class="container">
        <div class="d-flex justify-content-between">
          <div class="heading">
            <h5>
              <i class="ri-flag-2-fill ri-1x"></i>
              <?php
                      echo $contact_detail[3]->value;
                  ?>
            </h5>
            <p><?php
                      echo $contact_detail[4]->value;
                  ?></p>
          </div>
          <div class="action-btn">
            <a href="<?php echo $contact_detail[5]->value; ?>" class="btn btn-custom-blue">Apply Now</a>
          </div>
        </div>
      </div>
    </div>
  </section> -->
<section id="intro">
    <div class="intro-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <div class="heading text-center">
              <h1>Nepal Health Professional Council</h1>
              <p style=" text-align: justify; text-justify: inter-word;">Nepal Health Professional Council (NHPC) is an autonomous body established under the Nepal Health
                Professional Council Act 2053. The aim of this council is to register all the "Health professionals"
                other
                than Medical doctors , Nurses , Pharmacists, and Ayurveda according to their qualification; and bring them into a legal system as
                to
                make their services effective with quality and  timely in a scientific manner.</p>
            </div>
            <!-- <div class="stats">
              <div class="stats-wrapper">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Total registered professionals</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Studied in Nepal </td>
                      <td class="total">23,146 </td>
                    </tr>
                    <tr>
                      <td>Studied Abroad </td>
                      <td class="total">3200 </td>
                    </tr>
                    <tr>
                      <td>Total Male Professional </td>
                      <td class="total">16,603</td>
                    </tr>
                    <tr>
                      <td>Total Female Professional </td>
                      <td class="total">9,743</td>
                    </tr>

                  </tbody>
                </table>
              </div>
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- <section id="notice">
    <div class="section-wrapper">
      <div class="container">
        <h4 class="text-center">Upcoming Events</h4>
        <div class="notice-slider">
          <?php
                foreach($events as $k=>$v)
                {
            ?>
          <div class="notice">
            <div class="link">
              <span> <i class="ri-calendar-line"></i>
                <?php if($v->day) {?>
                  <?php echo $v->day; ?> <?php echo $v->month_name; ?> , <?php echo $v->year; ?></span>
                <?php }else{ ?>
                  Coming Soon
                <?php }?>
              <p><?php echo $v->description; ?></p>
            </div>
          </div>
          <?php
                }
            ?>
        </div>
      </div>
    </div>
  </section> -->
  <?php if (!empty($events)) { ?>
<section id="notice">
  <div class="section-wrapper">
    <div class="container">
      <h4 class="text-center">Upcoming Events</h4>
      <div class="notice-slider">
        <?php foreach($events as $k => $v) { ?>
          <div class="notice">
            <div class="link">
              <span><i class="ri-calendar-line"></i>
                <?php if ($v->day) { ?>
                  <?php echo $v->day; ?> <?php echo $v->month_name; ?>, <?php echo $v->year; ?>
                <?php } else { ?>
                  Coming Soon
                <?php } ?>
              </span>
              <p><?php echo $v->description; ?></p>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>
<?php } ?>

  <section id="messages">
    <div class="messages-wrapper">
      <div class="d-flex justify-content-center">
        <?php
            foreach($messages as $k=>$v)
            {
        ?>
        <div class="all-messages message-from-chairman">
          <div class="container">
            <h4><?php echo $v->subject; ?></h4>
            <div class="message-quote">
              <div class="d-flex">
                <div class="image">
                  <img src="<?php echo base_url('uploads/messages/'.$v->image);?>" alt="">
                </div>
                <div class="quote-content">
                  <i class="ri ri-double-quotes-l ri-3x"></i>
                  <div class="quote">
                    <?php echo substr($v->description, 0, 200); ?>
                    ....
                    <a href="<?php echo site_url('messages?id='.$v->id)?>" class="btn btn-custom">Read More</a>
                  </div>
                  <div class="name-social">
                    <p><?php echo $v->name; ?></p>
                    <div class="social-links">
                      <ul class="list-inline">
                        <li class="list-inline-item">
                          <a href="mailto:admin@nhpc.org.np">
                            <i class="ri-mail-fill ri-lg"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
                }
            ?>
      </div>
    </div>
  </section>
  <section id="services">
    <div class="services-wrapper">
      <div class="container">
        <div class="col-md-8 offset-md-2">
          <div class="heading text-center">
            <h1>Our Services</h1>
            <!-- <p>The services we have been providing has allowed us the deep investigation of our research on medical
              fields as well as our medical professionals</p> -->
          </div>
        </div>
        <div class="service-slider">
          <?php
              foreach($services as $k=>$v)
              {
          ?>
          <div class="slide">
            <div class="service-box">
              <div class="service-image">
                <img src="<?php echo base_url('uploads/services/'.$v->image);?>" alt="">
                <div class="image-overlay"></div>
              </div>
              <div class="service-heading">
                <h6><?php echo $v->name; ?></h6>
                <p><?php echo $v->description; ?></p>
                <!-- <div class="service-link">
                  <a href="<?php echo site_url('degrees'); ?>">
                    Search Now
                    <i class="ri-search-2-line"></i>
                  </a>
                </div> -->
              </div>
            </div>
          </div>
          <?php
              }
          ?>
        </div>
      </div>
    </div>
  </section>
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
            <!-- <a href="<?php echo base_url('uploads/covid_pdf/'.$contact_detail[8]->value); ?>" target="_blank" class="btn btn-custom"><i class="ri-download-2-line"></i> Attachment </a> -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php $this->load->view($this->config->item('template_public') . 'partners/index');?>
  <?php $this->load->view($this->config->item('template_public') . 'faqs/index',$faqs);?>

  <script>
    $('document').ready(function() {
      $('.notice-modal').modal()
    });
  </script>

