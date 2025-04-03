<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description" content="bootstrap admin template">
        <meta name="author" content="">

        <title><?php echo  'Login | ' . config_item('site_name'); ?></title>

        <link rel="apple-touch-icon" href="<?php echo base_url('assets') ?>/assets/images/apple-touch-icon.png">
        <link rel="shortcut icon" href="<?php echo base_url('assets') ?>/assets/images/favicon.ico">

        <!-- Stylesheets -->
        <link rel="stylesheet" href="<?php echo base_url('assets') ?>/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets') ?>/css/bootstrap-extend.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets') ?>/assets/css/site.min.css">

        <!-- Plugins -->
        <link rel="stylesheet" href="<?php echo base_url('assets') ?>/vendor/animsition/animsition.css">
        <link rel="stylesheet" href="<?php echo base_url('assets') ?>/vendor/asscrollable/asScrollable.css">
        <link rel="stylesheet" href="<?php echo base_url('assets') ?>/vendor/switchery/switchery.css">
        <link rel="stylesheet" href="<?php echo base_url('assets') ?>/vendor/intro-js/introjs.css">
        <link rel="stylesheet" href="<?php echo base_url('assets') ?>/vendor/slidepanel/slidePanel.css">
        <link rel="stylesheet" href="<?php echo base_url('assets') ?>/vendor/jquery-mmenu/jquery-mmenu.css">
        <link rel="stylesheet" href="<?php echo base_url('assets') ?>/vendor/flag-icon-css/flag-icon.css">
        <link rel="stylesheet" href="<?php echo base_url('assets') ?>/assets/examples/css/pages/login.css">
        <!-- Fonts -->
        <link rel="stylesheet" href="<?php echo base_url('assets') ?>/fonts/web-icons/web-icons.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets') ?>/fonts/brand-icons/brand-icons.min.css">
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>

    <!--[if lt IE 9]>
    <script src="<?php echo base_url('assets') ?>/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->

    <!--[if lt IE 10]>
    <script src="<?php echo base_url('assets') ?>/vendor/media-match/media.match.min.js"></script>
    <script src="<?php echo base_url('assets') ?>/vendor/respond/respond.min.js"></script>
    <![endif]-->

    <!-- Scripts -->
    <script src="<?php echo base_url('assets') ?>/vendor/breakpoints/breakpoints.js"></script>
    <script>
        Breakpoints();
    </script>
    </head>
    <body class="animsition page-login layout-full page-dark">
        <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->


        <!-- Page -->
        <div class="page vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">>
            <div class="page-content vertical-align-middle animation-slide-top animation-duration-1">
                <div class="brand">
                    <img class="brand-img" src="<?php echo base_url('assets') ?>/assets//images/logo.png" alt="...">
                    <h2 class="brand-text"><?php echo config_item('site_name')?></h2>
                </div>
                <?php print displayStatus();?>

                <p>Sign into your pages account</p>
                <?php print form_open('auth')?>
                    <div class="form-group">
                        <label class="sr-only" for="inputName">Name</label>
                        <input type="text" name="email" id="email" class="form-control" autocomplete="off" placeholder="<?php echo lang('general_username');?>" value="<?php echo set_value('email');?>" />
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="inputPassword">Password</label>
                        <input type="password" id="pass" name="pass" class="form-control" placeholder="<?php echo lang('general_password');?>"/>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group clearfix">
                        <?php echo generate_recaptcha_field(); ?>
                        <!-- <a class="float-right" href="<?php echo site_url('forgot_password');?>">Forgot password?</a> -->
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                <?php print form_close()?>
                

                <footer class="page-copyright page-copyright-inverse">
                    <p>© <?php echo  date('Y') ?>. All RIGHT RESERVED.</p>
                    <div class="social">
                        <!-- <a class="btn btn-icon btn-pure" href="javascript:void(0)">
                            <i class="icon bd-twitter" aria-hidden="true"></i>
                        </a>
                        <a class="btn btn-icon btn-pure" href="javascript:void(0)">
                            <i class="icon bd-facebook" aria-hidden="true"></i>
                        </a>
                        <a class="btn btn-icon btn-pure" href="javascript:void(0)">
                            <i class="icon bd-dribbble" aria-hidden="true"></i>
                        </a> -->
                    </div>
                </footer>
            </div>
        </div>
        <!-- End Page -->


        <!-- Core  -->
        <script src="<?php echo base_url('assets') ?>/vendor/babel-external-helpers/babel-external-helpers.js"></script>
        <script src="<?php echo base_url('assets') ?>/vendor/jquery/jquery.js"></script>
        <script src="<?php echo base_url('assets') ?>/vendor/popper-js/umd/popper.min.js"></script>
        <script src="<?php echo base_url('assets') ?>/vendor/bootstrap/bootstrap.js"></script>
        <script src="<?php echo base_url('assets') ?>/vendor/animsition/animsition.js"></script>
        <script src="<?php echo base_url('assets') ?>/vendor/mousewheel/jquery.mousewheel.js"></script>
        <script src="<?php echo base_url('assets') ?>/vendor/asscrollbar/jquery-asScrollbar.js"></script>
        <script src="<?php echo base_url('assets') ?>/vendor/asscrollable/jquery-asScrollable.js"></script>

        <!-- Plugins -->
        <script src="<?php echo base_url('assets') ?>/vendor/jquery-mmenu/jquery.mmenu.min.all.js"></script>
        <script src="<?php echo base_url('assets') ?>/vendor/switchery/switchery.js"></script>
        <script src="<?php echo base_url('assets') ?>/vendor/intro-js/intro.js"></script>
        <script src="<?php echo base_url('assets') ?>/vendor/screenfull/screenfull.js"></script>
        <script src="<?php echo base_url('assets') ?>/vendor/slidepanel/jquery-slidePanel.js"></script>
        <script src="<?php echo base_url('assets') ?>/vendor/jquery-placeholder/jquery.placeholder.js"></script>

        <!-- Scripts -->
        <script src="<?php echo base_url('assets') ?>/js/Component.js"></script>
        <script src="<?php echo base_url('assets') ?>/js/Plugin.js"></script>
        <script src="<?php echo base_url('assets') ?>/js/Base.js"></script>
        <script src="<?php echo base_url('assets') ?>/js/Config.js"></script>

        <script src="<?php echo base_url('assets') ?>/assets/js/Section/Menubar.js"></script>
        <script src="<?php echo base_url('assets') ?>/assets/js/Section/Sidebar.js"></script>
        <script src="<?php echo base_url('assets') ?>/assets/js/Section/PageAside.js"></script>
        <script src="<?php echo base_url('assets') ?>/assets/js/Section/GridMenu.js"></script>

        <!-- Config -->
        <script src="<?php echo base_url('assets') ?>/js/config/colors.js"></script>
        <script src="<?php echo base_url('assets') ?>/assets/js/config/tour.js"></script>
        <script>Config.set('assets', '<?php echo base_url('assets') ?>/assets');</script>

        <!-- Page -->
        <script src="<?php echo base_url('assets') ?>/assets/js/Site.js"></script>
        <script src="<?php echo base_url('assets') ?>/js/Plugin/asscrollable.js"></script>
        <script src="<?php echo base_url('assets') ?>/js/Plugin/slidepanel.js"></script>
        <script src="<?php echo base_url('assets') ?>/js/Plugin/switchery.js"></script>
        <script src="<?php echo base_url('assets') ?>/js/Plugin/jquery-placeholder.js"></script>

        <script>
            (function(document, window, $){
                'use strict';

                var Site = window.Site;
                $(document).ready(function(){
                    Site.run();
                });
            })(document, window, jQuery);
        </script>

    </body>
</html>
