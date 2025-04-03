<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    #blink {
      transition: 0.5s;
    }
  </style>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>NHPC WEB</title>
  <!-- scss file will be replaced with bundled css -->
  <!-- <link href="main.07544d9b.css" rel="stylesheet"> -->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.3.11/slick.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/styles/theStyles.css?">
<!-- <script src="news.js"></script></head> -->

<body>

  <!-- navabr -->
  <div class="custom-navbar fixed-top">
    <!-- <nav class="navbar top navbar-expand-lg top-fixed navbar-light bg-light d-none">
      <div class="d-flex justify-content-between container-fluid">
        <div class="mail">
          <a href="mailto:admin@nhpc.gov.np" target="_blank">
            <i class="ri-mail-open-line"></i>
            <span>admin@nhpc.gov.np</span>
          </a>
        </div>
        <div class="social">
          <ul class="list-inline">
            <li class="list-inline-item">
              <a href="">
                <i class="ri-facebook-circle-fill ri-lg"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="">
                <i class="ri-twitter-fill ri-lg"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="">
                <i class="ri-linkedin-box-fill ri-lg"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav> -->
    <nav class="navs navbar navbar-expand-lg top-fixed navbar-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo site_url('home') ?>"><img src="<?php echo theme_url() ?>template/assets/images/logo.svg"></a>
        <div class="mail">
          <a href="mailto:admin@nhpc.gov.np" target="_blank">
            <i class="ri-mail-open-line"></i>
            <span>admin@nhpc.gov.np</span>
          </a>
        </div>
        <div class="" id="navbarText">
          <ul class="navbar-nav mr-auto">
          </ul>
          <div class="navbar-links navbar-right">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link top-links" href="<?php echo site_url('news'); ?>">
                  <i class="ri-newspaper-line"></i>
                  News and Results</a>
              </li>
              <li class="nav-item">
                <a class="nav-link top-links" href="<?php echo site_url('degrees'); ?>">
                  <i class="ri-search-2-line"></i>
                  Search
                  Professionals</a>
              </li>
              <li class="nav-item">
                <a class="btn btn-custom" href="http://exam.nhpc.gov.np/" target="_blank" >
                  Log In</a>
                   <a class="btn btn-custom blink_me " href="http://exam.nhpc.gov.np/register" target="_blank" >
                  New Registration</a>
                  <a class="btn btn-custom" href="http://exam.nhpc.gov.np/admit/card/print/index">
                  Admit Card</a>
                 <a class="btn btn-custom" href="<?php echo 'https://nhpc.gov.np/result' ?>">
                  Result</a>

                  <a class="btn btn-custom" href="<?php echo site_url('expertises') ?>">Expert Registration</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <nav class="link-navs navbar navbar-expand-lg navbar-light bg-white">
      <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar10">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbar10">
          <ul class="navbar-nav nav-fill w-100">
            <li class="nav-item">
              <a class="nav-link active" href="<?php echo site_url('home'); ?>">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                About Us
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?php echo site_url('boardmembers'); ?>">Board Members</a>
                <a class="dropdown-item" href="<?php echo site_url('subject_committees'); ?>">Subject Committee Members</a>
                <a class="dropdown-item" href="<?php echo site_url('boardmembers/#office-staff'); ?>">Staff</a>
              </div>
            </li>
            <li class="nav-item">
                <a class="nav-link top-links" href="<?php echo site_url('news'); ?>">
                  News and Results</a>
              </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Registration
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?php echo site_url('pages/index/5'); ?>">Institutions</a>
                <a class="dropdown-item" href="<?php echo site_url('pages/index/6'); ?>">Health Professionals</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Institutions
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?php echo site_url('programmes'); ?>">Programmes</a>
                <a class="dropdown-item" href="<?php echo site_url('colleges'); ?>">Registered Colleges</a>
                <a class="dropdown-item" href="<?php echo site_url('uploads/site_documents/INSTITUTE RENEW SAMBANDHI FARAM.doc'); ?>" download>College Renewal Form</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Requirements
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?php echo site_url('requirements'); ?>">Minimum Requirements</a>
                <a class="dropdown-item" href="<?php echo site_url('publications'); ?>">Publications</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('pages/index/3'); ?>">License Renewal</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('pages/index/4'); ?>">Code OF Ethics</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Syllabus And Publications
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?php echo site_url('syllabuses'); ?>">Syllabus</a>
                <a class="dropdown-item" href="<?php echo site_url('pages/index/2'); ?>">Act & Formation</a>
                <a class="dropdown-item" href="<?php echo site_url('partners'); ?>">Partners</a>
                <a class="dropdown-item" href="<?php echo site_url('pages/index/1'); ?>">Functions</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo site_url('photos'); ?>">Photos & Media</a>
                <a class="dropdown-item" href="<?php echo site_url('news'); ?>">News and Results</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('services'); ?>">CPD</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('faqs'); ?>">FAQ</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <style>
      .blink_me {
        animation: blinker 2s linear infinite;
        padding: 5px;
      }

      @keyframes blinker {
        50% {
          opacity: 0;
        }
      }
    </style>
    <!-- <marquee direction="left" style="background-color: white; font-weight: 10px;font-weight: 900; padding: 5px;">
      <blink>
        <?php $news = featured_news()?>
<?php foreach ($news as $value) {?>
          <a href="<?php echo site_url() ?>/news/detail/<?php echo $value->id ?>" style="margin-left:100px" class="blink_me"><?php echo $value->name ?> </a>
        <?php }?>

      </blink>
    </marquee> -->
    <div class="nav-news-update">
      <div class="container-fluid">
        <div class="d-flex justify-content-between">
          <div class="update-block">
            <span>Recent Updates</span>
          </div>
          <marquee onMouseOver="this.stop()" onMouseOut="this.start()">
            <?php $news = featured_news()?>
<?php foreach ($news as $value) {?>
                <span class="blink_me ">
                    <a href="<?php echo site_url() ?>/news/detail/<?php echo $value->id ?>"><span class="date"></span><?php echo $value->name ?></a>
                </span>

            <?php }?>
          </marquee>
        </div>
      </div>
    </div>
  </div>
<script type="text/javascript">
        var blink = document.getElementById('blink');
        setInterval(function() {
            blink.style.opacity = (blink.style.opacity == 0 ? 1 : 0);
        }, 1500);
    </script>
