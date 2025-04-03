<section id="inner-banner" class="news-banner">
    <div class="inner-banner-wrapper">
      <div class="image-wrapper">
        <img src="<?php echo base_url('uploads/news/'.$detail->image);?>" alt="">
      </div>
      <div class="image-overlay"></div>
      <div class="crum-page-title">
        <div class="container">
          <div class="row">
            <div class="col-md-8 offset-md-2">
              <span><?php echo $detail->month_name; ?> <?php echo $detail->day; ?> , <?php echo $detail->year; ?></span>
              <h3><?php echo $detail->name; ?></h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div id="news-inner-content">
    <div class="container">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="news-content">

            <p><?php echo $detail->description; ?>
            </p>
            <?php if($detail->id == 187){?>
              <embed src="https://nhpc.gov.np/beta/uploads/notice/STANDARD BIDDING DOCUMENT SEALED QUOTATION FOR EXAM CENTER.pdf" width="800px" height="2100px" />
            <?php }?>
            <?php if($detail->id == 164){?>
              <embed src="https://nhpc.gov.np/beta/uploads/notice/tender_notice.pdf" width="800px" height="2100px" />
            <?php }?>
          </div>
        </div>
      </div>
    </div>
  </div>