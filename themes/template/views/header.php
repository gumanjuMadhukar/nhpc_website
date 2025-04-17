<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    #blink {
      transition: 0.5s;
    }
    .navbar-brand{
      display: flex;
      justify-content: space-between;
      width:100%;


      .logo-container, .gif-container{
        height: 120px;
        width: 100px;
        img{
          width: 100%;
          height: 100%;
          object-fit: contain;
          object-position: center;
        }
      }
      .logo-container{
        margin-left:10px !important;
      }
      .logo-text{
        display: flex;
          flex-direction: column;
          align-items: center;
        .english-text{
          font-size: 32px;
          line-height: 36px;
          font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
          font-weight: 500;
          color: #e50000;
        }
        .nepali-text{
          font-size: 48px;
          color: #045a8d;
          font-weight: 700;
          margin-top: 12px;
          line-height: 45px;
          margin-top: 12px;
          letter-spacing: 3px;
        }
        .location{
          font-size: 16px;
          font-weight: bold;
          color: #045a8d;
          margin-top: 5px;
        }
      }
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
  <link rel="stylesheet" type="text/css" href="../assets/css/styles/theStyles.css?v=1.40">
<!-- <script src="news.js"></script></head> -->

<body>

  <!-- navabr -->
  <div class="custom-navbar fixed-top">
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
    <nav class="navs navbar navbar-expand-lg top-fixed navbar-light top-navbar">
      <div class="item-container">
        <div class="navbar-brand" >
          <a class="logo-container" href="<?php echo site_url('home') ?>">
            <img src="<?php echo theme_url() ?>template/assets/images/logo/logo_nhpc.png">
          </a>
          <div class="logo-text">
            <span class="nepali-text">नेपाल स्वास्थ्य व्यवसायी परिषद</span>
            <span class="english-text" >Nepal Health Professional Council</span>
            <span class="location">बाँसबारी, काठमाण्डौं</span>
          </div>
          <div class="flag-nepal">
            <div class="gif-container">
            <img src="<?php echo theme_url() ?>template/assets/images/Flag_of_Nepal.gif">
            <!-- <img src="http://localhost/nhpc/beta/themes//template/assets/images/Flag_of_Nepal.gif" alt="Nepal's Flag" style="width: 100%; height: 100%;object-position: center;object-fit: contain;"> -->
            </div>
          </div>
        </div>

      </div>
    </nav>
    <nav class="link-navs header-nav navbar navbar-expand-lg navbar-light bg-red" >
      <div class=" d-flex justify-center nav-container" style="width: 100%;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar10">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbar10">
          <ul class="navbar-nav nav-fill">
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
                <a class="dropdown-item" href="<?php echo site_url('photos'); ?>">Photos & Media</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Registration
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?php echo site_url('uploads/site_documents/INSTITUTE RENEW SAMBANDHI FARAM.doc'); ?>" download>College Renewal Form</a>
                <a class="dropdown-item" href="<?php echo site_url('programmes'); ?>">Associate Programmes</a>

                <!-- Second Level Dropdown -->
                <div class="dropdown-submenu dropdown-toggle">
                  <a class="dropdown-item" href="#">Mandatory Documents</a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="">New Apply Register</a>
                    <a class="dropdown-item" href="">Certificate Issuance</a>
                    <a class="dropdown-item" href="<?php echo site_url('pages/index/3'); ?>">License Renewal</a>
                    <a class="dropdown-item" href="<?php echo site_url('pages/index/5'); ?>">Institutions Registration</a>
                    <a class="dropdown-item" href="<?php echo site_url('pages/index/6'); ?>">Health Professionals Registration</a>
                  </div>
                </div>
              </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('pages/index/2'); ?>
                ">Act & Regulations</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Licensing Exam
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="http://exam.nhpc.gov.np/register" target="_blank" >New Registration</a>
                <a class="dropdown-item" href="http://exam.nhpc.gov.np/" target="_blank" >Log In</a>
                <a class="dropdown-item" href="http://exam.nhpc.gov.np/admit/card/print/index">Admit Card</a>
                <a class="dropdown-item" href="<?php echo 'https://nhpc.gov.np/result' ?>">Result</a>
                <a class="dropdown-item" href="<?php echo site_url('syllabuses'); ?>">Syllabus</a>
                <a class="dropdown-item" href="<?php echo site_url('expertises') ?>">Expert Registration</a>
              </div>
            </li>
            <li class="nav-item">
                <a class="nav-link top-links" href="<?php echo site_url('news'); ?>">
                  News and Updates</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Registered Institutions
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <!-- Second Level Dropdown -->
                <div class="dropdown-submenu dropdown-toggle">
                  <a class="dropdown-item" href="#">National</a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="">CTEVT</a>
                    <a class="dropdown-item" href="">Institutions</a>
                    <a class="dropdown-item" href="<?php echo site_url('colleges'); ?>">Registered Colleges</a>
                    <a class="dropdown-item" href="">Universities</a>
                  </div>
                </div>
                <div class="dropdown-submenu dropdown-toggle">
                  <a class="dropdown-item" href="#">International</a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="">-</a>
                  </div>
                </div>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Publications
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?php echo site_url('requirements'); ?>">Minimum Requirements</a>
                <a class="dropdown-item" href="<?php echo site_url('publications'); ?>">Logbook</a>
                <a class="dropdown-item" href="<?php echo site_url('pages/index/4'); ?>">Code OF Ethics</a>
                <a class="dropdown-item" href="<?php echo site_url('pages/index/4'); ?>">Smarika / Annual Report</a>
              </div>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('pages/index/3'); ?>">License Renewal</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('services'); ?>">CPD</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('faqs'); ?>">FAQ</a>
            </li> -->
          </ul>
        </div>
      </div>
    </nav>

    <style>
      .mail{
        a{
          display: flex;
          align-items: anchor-center;
        }
      }
      .top-navbar{
        .item-container{
          width: 100%;
          display: flex;
          align-items: center;
          justify-content: center;
          flex-direction: column;

          a{
            margin: 0;

          }
        }
      }
      .navbar-collapse {
        justify-content: center;
      }
      .header-nav{
        background-color: #045a8d;
      }
    .header-nav .nav-container .navbar-nav .nav-item .nav-link{
      width: fit-content;
      padding: 0 !important;
      color: #fff;

    }
    .header-nav .nav-container .navbar-nav .nav-item{
      width: fit-content;
      display: flex;;
      /* padding: 0 !important; */
    }
    .header-nav .nav-container .navbar-collapse {
      justify-content: center;
    }
    .header-nav .nav-container .navbar-nav {
      width:85%;
    }

      .dropdown-submenu {
  position: relative;
  display: flex;
  align-items: center;
}
      .dropdown-submenu::after {
  margin-right: 10px;
  font-size: 20px;
}

.dropdown-submenu .dropdown-menu {
  top: 0;
  left: 100%;
  margin-top: -6px;
  margin-left: -1px;
  display: none;
}

.dropdown-submenu:hover .dropdown-menu {
  display: block;
}
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

  </div>
<script type="text/javascript">
        var blink = document.getElementById('blink');
        setInterval(function() {
            blink.style.opacity = (blink.style.opacity == 0 ? 1 : 0);
        }, 1500);
    </script>
