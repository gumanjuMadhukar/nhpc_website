<!DOCTYPE html>
<html lang="en">
<?php $version = '1.0';?>
<head>

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--====== Title ======-->
    <title><?php echo config_item('site_name');?></title>

    <!--====== Favicon Icon ======-->
    <!-- <link rel="shortcut icon" href="<?php echo site_url(config_item('favicon'))?>" type="image/png"> -->
    <link href="<?php echo theme_url()?>template/assets/css/main.07544d9b.css" rel="stylesheet">
    <link href="<?php echo theme_url()?>template/assets/css/styles/theStyles.css" rel="stylesheet">
    <!-- <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.3.11/slick.css"> -->
    <!--====== Bootstrap css ======-->
    <!-- <link rel="stylesheet" href="<?php echo theme_url()?>template/assets/css/bootstrap.min.css?v=<?php echo $version?>"> -->

    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="<?php echo theme_url()?>template/assets/css/font-awesome.min.css?v=<?php echo $version?>">

    <!--====== Line Icons css ======-->
    <!-- <link rel="stylesheet" href="<?php echo theme_url()?>template/assets/css/LineIcons.css?v=<?php echo $version?>"> -->

    <!--====== Animate css ======-->
    <!-- <link rel="stylesheet" href="<?php echo theme_url()?>template/assets/css/animate.css?v=<?php echo $version?>"> -->

    <!--====== Aos css ======-->
    <!-- <link rel="stylesheet" href="<?php echo theme_url()?>template/assets/css/aos.css?v=<?php echo $version?>"> -->

    <!--====== Slick css ======-->
    <!-- <link rel="stylesheet" href="<?php echo theme_url()?>template/assets/css/slick.css?v=<?php echo $version?>"> -->

    <!--====== Default css ======-->
    <!-- <link rel="stylesheet" href="<?php echo theme_url()?>template/assets/css/default.css?v=<?php echo $version?>"> -->

    <!--====== Style css ======-->
    <!-- <link rel="stylesheet" href="<?php echo theme_url()?>template/assets/css/style.css?v=<?php echo $version?>"> -->

    <!-- Fonts -->
    <!-- <link rel="stylesheet" href="<?php echo base_url('assets') ?>/fonts/web-icons/web-icons.min.css?v=<?php echo $version?>"> -->
    <!-- <link rel="stylesheet" href="<?php echo base_url('assets') ?>/fonts/font-awesome/font-awesome.min.css?v=<?php echo $version?>"> -->
    
    <!-- <link rel="stylesheet" href="<?php echo base_url('assets') ?>/fonts/material-design/material-design.min.css?v=<?php echo $version?>"> -->
    <!-- <link rel="stylesheet" href="<?php echo base_url('assets') ?>/fonts/brand-icons/brand-icons.min.css?v=<?php echo $version?>"> -->
    <!-- <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'> -->

    <!--====== jquery js ======-->
    <!-- <script src="<?php echo theme_url()?>template/assets/js/vendor/modernizr-3.6.0.min.js?v=<?php echo $version?>"></script> -->
    <!-- <script src="<?php echo theme_url()?>template/assets/js/vendor/jquery.js?v=<?php echo $version?>"></script> -->
    

    <!-- custom js -->

    <!-- <script src="<?php echo base_url('assets') ?>/js/project.js?v=<?php echo $version?>"></script> -->
    
  <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.3.11/slick.min.js"></script>

</head>

<body>
    
		<?php print $this->load->view($this->config->item('template_public') . 'header');?>
		
      <div class="page">
		    	<?php print $this->load->view($this->config->item('template_public') . 'content');?>
	    		<!-- /.container-fluid --> 
			</div>
  		<!-- /#page-wrapper --> 
		<!-- /#wrapper --> 
		<?php print $this->load->view($this->config->item('template_public') . 'footer');?>
    


    <!--====== Bootstrap js ======-->
    <script src="<?php echo theme_url()?>template/assets/js/bootstrap.min.js?v=<?php echo $version?>"></script>

    <!--====== WOW js ======-->
    <!-- <script src="<?php echo theme_url()?>template/assets/js/wow.min.js?v=<?php echo $version?>"></script> -->

    <!--====== Slick js ======-->
    <!-- <script src="<?php echo theme_url()?>template/assets/js/slick.min.js?v=<?php echo $version?>"></script> -->

    <!--====== Scrolling Nav js ======-->
    <!-- <script src="<?php echo theme_url()?>template/assets/js/scrolling-nav.js?v=<?php echo $version?>"></script> -->
    <!-- <script src="<?php echo theme_url()?>template/assets/js/jquery.easing.min.js?v=<?php echo $version?>"></script> -->

    <!--====== Aos js ======-->
    <!-- <script src="<?php echo theme_url()?>template/assets/js/aos.js?v=<?php echo $version?>"></script> -->


    <!--====== Main js ======-->
    <!-- <script src="<?php echo theme_url()?>template/assets/js/main.js?v=<?php echo $version?>"></script> -->

    <!-- <script src="<?php echo theme_url()?>template/assets/js/src.e31bb0bc.js"></script> -->
    <!-- <script src="<?php echo base_url('assets') ?>/jquery-datatable/extensions/export/vfs_fonts.js?v=<?php echo $version?>"></script> -->

    <div class="modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Modal body text goes here.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- <script>
      $('#myModal').modal()
    </script> -->

</body>

</html>