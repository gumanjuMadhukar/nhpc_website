<?php
    foreach($pages as $k=>$v)
    {
?>
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
              <h3><?php echo $v->name; ?></h3>
            </div>
            <div class="bread-crum">
              <span><a href="">HOME </a> / <?php echo $v->parent; ?></span>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
  <?php if(!(strtoupper($v->name) == strtoupper("Code of Ethics"))){?>
    <section id="actFormations">
      <div class="section-wrapper">
        <div class="container">
          <div class="row">
            <div class="col-md-8 offset-md-2">
              <?php echo $v->description; ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php }else{?>
    <section id="requirements">
      <div class="section-wrapper">
        <div class="container">
          <div class="row">
            <div class="col-md-8 offset-md-2">
              <?php echo $v->description; ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php }?>
<?php
    }
?>