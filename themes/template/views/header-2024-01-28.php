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
<!-- <script src="news.js"></script></head> -->

<body>

  <!-- navabr -->
  <div class="custom-navbar fixed-top">
    <nav class="navbar top navbar-expand-lg top-fixed navbar-light bg-light">
      <div class="d-flex justify-content-between container-fluid">
        <div class="mail">
          <a href="mailto:info@nhpc.org.np" target="_blank">
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
    </nav>
    <nav class="navs navbar navbar-expand-lg top-fixed navbar-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo site_url()?>"><img src="<?php echo theme_url()?>template/assets/images/logo.svg"></a>
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
			<!--<a class="btn btn-custom blink_me" href="<?php echo 'https://nhpc.gov.np/re_exam'?>">
                  Re-Exam</a>-->
                <!-- <a class="btn btn-custom" href="<?php echo site_url('site/login')?>" target="_blank" data-toggle="modal" data-target="#loginModal"> -->
                <a class="btn btn-custom" href="http://103.175.192.52/login" target="_blank" >
                <!-- <a class="btn btn-custom" href="https://webapp.nhpc.org.np/login" target="_blank" > -->
                  Log In</a>
                   <a class="btn btn-custom blink_me " href="http://103.175.192.52/register" target="_blank" >
                  New Registration</a>
<!--                  <a class="btn btn-custom blink_me" href="https://nhpc.gov.np/registration" target="_blank" >-->
<!--                      New Registration</a>-->
              <!--    <a class="btn btn-custom" href="#" onclick="alert('Site is under Maintenance please have patience')">
                  New Registration</a> -->
                  <a class="btn btn-custom" href="http://103.175.192.52/admit/card/print/index">
                  Admit Card</a>
                 <a class="btn btn-custom" href="<?php echo 'https://nhpc.gov.np/result'?>">
                  Result</a>

                  <a class="btn btn-custom" href="<?php echo site_url('expertises')?>">Expert Registration</a>
                  <!-- <a class="btn btn-custom" href="https://nhpc.gov.np/frontend/web/index.php">Old Site</a> -->
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
              <a class="nav-link active" href="<?php echo site_url(); ?>">Home</a>
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
    <marquee direction="left" style="background-color: white; font-weight: 10px;font-weight: 900; padding: 5px;">
      <blink>
          <a href="https://nhpc.gov.np/beta/news/detail/168" style="margin-left:100px" class="blink_me"> आठौँ नाम दर्ता प्रमाणपत्र परीक्षा समय तालिका सम्बन्धी सूचना</a>
          <a href="https://nhpc.gov.np/beta/news/detail/160" style="margin-left:100px" class="blink_me"> नाम  दर्ता प्रमाणपत्र बितरण सम्बन्धी सूचना</a>
          <a href="https://nhpc.gov.np/beta/news/detail/151" style="margin-left:100px" class="blink_me"> New Exam Center For Seventh License Examination</a>
          <a href="https://nhpc.gov.np/beta/news/detail/150" style="margin-left:100px" class="blink_me"> Seventh License Examination Schedule Notice</a>
          <a href="https://nhpc.gov.np/beta/news/detail/138" style="margin-left:100px" class="blink_me"> Sixth License Examination For PCL Result</a>
          <a href="https://nhpc.gov.np/beta/news/detail/137" style="margin-left:100px" class="blink_me"> Sixth License Examination For PCL Schedule Notice</a>
          <a href="https://nhpc.gov.np/beta/news/detail/131" style="margin-left:100px" class="blink_me"> Sixth License Examination Result Notice</a>
          <a href="https://nhpc.gov.np/beta/news/detail/130" style="margin-left:100px" class="blink_me"> Sixth License Examination Schedule Notice</a>
          <a href="https://nhpc.gov.np/beta/news/detail/117" style="margin-left:100px" class="blink_me"> Fifth License Examination Schedule Notice</a>
          <a href="https://nhpc.gov.np/beta/news/detail/106" style="margin-left:100px" class="blink_me"> Fifth License Examination Notice</a>
          <!-- <a href="https://nhpc.gov.np/beta/news/detail/86" style="margin-left:100px" class="blink_me"> Fourth License Examination Notice</a> -->
          <!-- <a href="https://nhpc.gov.np/beta/news/detail/73" style="margin-left:100px" class="blink_me"> Third License Examination Notice</a>
          <a href="https://nhpc.gov.np/beta/news/detail/69" style="margin-left:100px" class="blink_me"> Notice for third Licensing Examination</a>
          <a href="https://nhpc.gov.np/beta/news/detail/63" style="margin-left:100px" class="blink_me"> Notice For Registration Certificate</a>
          <a href="https://nhpc.gov.np/beta/news/detail/56" style="margin-left:100px" class="blink_me"> Notice of Retotaling (2078-10-11)</a>
          <a href="https://nhpc.gov.np/beta/news/detail/57" style="margin-left:100px" class="blink_me"> Results of Retotaling (2078-10-11)</a>
          <a href="https://nhpc.gov.np/beta/news/detail/52" style="margin-left:100px" class="blink_me"> Notice for Dental (2078-10-12)</a>
    <a href="https://nhpc.gov.np/beta/news/detail/51" style="margin-left:100px" class="blink_me"> Urgent Public Notice (2078-10-12)</a>
    <a href="https://nhpc.gov.np/beta/news/detail/49" style="margin-left:100px" class="blink_me"> Retotling Notice (2078-09-12)</a>
    <a href="https://nhpc.gov.np/beta/news/detail/45" style="margin-left:100px" class="blink_me"> Result (2078-09-10)</a>
    <a href="https://nhpc.gov.np/beta/news/detail/43" style="margin-left:100px" class="blink_me"> EXAM NOTICE (2078-09-08)</a>
	  <a href="https://nhpc.gov.np/beta/news/detail/42" style="margin-left:100px" class="blink_me"> EXAM NOTICE (2078-09-09)</a>
	  <a href="https://nhpc.gov.np/beta/news/detail/41" style="margin-left:100px" class="blink_me"> EXAM NOTICE (2078-09-10)</a>
	  <a href="https://nhpc.gov.np/beta/news/detail/39" style="margin-left:100px" class="blink_me"> EXAM NOTICE (2021-12)</a>
	  <a href="https://nhpc.gov.np/beta/news/detail/37" style="margin-left:100px" class="blink_me"> SAMABEDANA </a>
<a href="https://nhpc.gov.np/beta/news/detail/34" style="margin-left:100px" class="blink_me"> NOTICE FOR LICENSE RENEWAL. </a>
<a href="https://nhpc.gov.np/beta/news/detail/33" style="margin-left:100px" class="blink_me"> NOTICE FOR LICENSE (COPY )</a>
<a href="https://nhpc.gov.np/beta/news/detail/32" style="margin-left:100px" class="blink_me"> SECOND LICENSING EXAMINATION NOTICE</a> -->
<a href="https://nhpc.gov.np/beta/news/detail/19" style="margin-left:100px" class="blink_me">Rules To Follow During Examination</a>
<a href="https://nhpc.gov.np/beta/news/detail/18" style="margin-left:100px" class="blink_me">Computer Related Exam Rule</a>
<!-- <a href="https://nhpc.gov.np/beta/news/detail/30" style="margin-left:100px" class="blink_me">URGENT NOTICE</a> -->
<!-- <a href="https://nhpc.gov.np/beta/news/detail/29" style="margin-left:100px" class="blink_me">Exam Retotaling</a> -->
<!-- <a href="https://nhpc.gov.np/beta/news/detail/23" style="margin-left:100px" class="blink_me">NOTICE BACHELOR MASTER</a> -->
<!-- <a href="https://nhpc.gov.np/beta/news/detail/24" style="margin-left:100px" class="blink_me">NOTICE PCL</a> -->
<!-- <a href="https://nhpc.gov.np/beta/news/detail/25" style="margin-left:100px" class="blink_me">NOTICE PCL GM 4</a> -->
<!-- <a href="https://nhpc.gov.np/beta/news/detail/26" style="margin-left:100px" class="blink_me">NOTICE PCL GM PG 1</a> -->
<!-- <a href="https://nhpc.gov.np/beta/news/detail/27" style="margin-left:100px" class="blink_me">NOTICE PCL GM PG 2</a>  -->
<!-- <a href="https://nhpc.gov.np/beta/news/detail/28" style="margin-left:100px" class="blink_me">NOTICE PCL GM PG 3</a> -->

        <a href="https://nhpc.gov.np/beta/news/detail/15" style="margin-left:100px" class="blink_me">License Exam Notice</a>


        <a href="https://nhpc.gov.np/beta/news/detail/20" style="margin-left:100px" class="blink_me">Notice</a>
      </blink>
    </marquee>
    <!-- <div class="nav-news-update">
      <div class="container-fluid">
        <div class="d-flex justify-content-between">
          <div class="update-block">
            <span>Recent Updates</span>
          </div>
          <marquee onMouseOver="this.stop()" onMouseOut="this.start()">
            <span>
              <a href="news-inner.html"><span class="date">18 OCT 2020</span>Health certificates issued as per the
                decision of the
                council </a>
            </span>
            <span>
              <a href="news-inner.html"><span class="date">20 OCT 2020</span>Health certificates issued as per the
                decision of the
                council </a>
            </span>
            <span>
              <a href="news-inner.html"><span class="date">30 OCT 2020</span>Health certificates issued as per the
                decision of the
                council </a>
            </span>

          </marquee>
        </div>
      </div>
    </div> -->
  </div>
<script type="text/javascript">
        var blink = document.getElementById('blink');
        setInterval(function() {
            blink.style.opacity = (blink.style.opacity == 0 ? 1 : 0);
        }, 1500);
    </script>
