<!doctype html>
<html lang="en">
  
<!-- Mirrored from mannatstudio.com/html/logzee/index-5.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Aug 2019 16:49:16 GMT -->
<head>
    <!-- xxx Basics xxx -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- xxx Change With Your Information xxx -->    
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no" />
    <title><?php echo SITENAME; ?></title>
    <meta name="author" content="Mannat Studio">     
    <meta name="description" content="Logzee is a Responsive HTML5 Template for Logistic and Cargo related services.">
    <meta name="keywords" content="Logzee, responsive, html5, business, cargo, chain supply, company, corporate, expedition, freight, logistics, packaging, services, shipping, transport, transportation, trucking, warehousing">
    
    <!-- xxx Favicon xxx -->    
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo URLROOT; ?>/images/ebb_logo.png">

    <!-- Core Css Stylesheets -->
    <link href="<?php echo URLROOT; ?>/css/base.css" rel="stylesheet">

    <!-- REVOLUTION STYLE SHEETS -->
    <link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/rev-slider/revolution/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/rev-slider/revolution/fonts/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/rev-slider/revolution/css/settings.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/rev-slider/revolution/css/layers.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/rev-slider/revolution/css/navigation.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->		
	</head>
<body>

  <!-- Page loader Start -->
 <!--  <div id="pageloader">   
    <div class="loader-item">
      <div class="loader">
        <div class="spin"></div>
        <div class="bounce"></div>
      </div>
    </div>
  </div> -->
  <!-- Page loader End -->

  <header class="fixed-top header-fullpage top-border top-transparent wow fadeInDown">
    <div class="top-bar-right d-flex align-items-center text-md-left">
      <div class="container">
        <div class="row align-items-center">
          <div class="col">
            <i class="icofont-email"></i> info@ebbcourierlimited.com
          </div>
          <div class="col-md-auto">

            

           <!-- Topbar Social Icons Start -->
            
        
              <!-- Topbar Social Icons End -->
            <!-- Topbar Language Dropdown Start -->
            <div class="dropdown d-inline-flex lang-toggle shadow-sm">
            	 <div class="col">
            
            
               <?php if(isset($_SESSION['user_email'])) : ?>
               	 <i class="icofont-logout"></i> <a  href="<?php echo URLROOT; ?>users/logout">Logout</a>
                <i class="icofont-user"></i> <a  href="<?php echo URLROOT; ?>dashboards"> Profile </a>
                
                <?php else : ?>
                <i class="icofont-login"></i> <a  href="<?php echo URLROOT; ?>users/login"> Login</a>
                <i class="icofont-user"></i> <a  href="<?php echo URLROOT; ?>users/register"> Register</a>
                 <?php endif; ?>
                </div>
              <div id="google_translate_element"></div>
              <!-- <div class="dropdown-menu dropdownhover-bottom dropdown-menu-right" role="menu">
                <a class="dropdown-item active" href="#">English</a>
                <a class="dropdown-item" href="#">Deutsch</a>
                <a class="dropdown-item" href="#">Español&lrm;</a>
              </div> -->
            </div>            
            <!-- Topbar Language Dropdown End -->          
          </div>
        </div>
      </div>
    </div>
    
    <!-- Main Navigation Start -->
    <nav class="navbar navbar-expand-lg bg-transparent">
      <div class="container text-nowrap">
        <div class="d-flex align-items-center w-100 col p-0">
          <a class="navbar-brand rounded-bottom light-bg" href="index.html">
            <img src="<?php echo URLROOT; ?>/images/ebb_logo.png" alt="">
          </a> 
        </div>
        <!-- Topbar Request Quote Start -->
        <div class="d-inline-flex request-btn order-lg-last col p-0"> 
          <!-- <a class="btn-theme icon-left bg-navy-blue no-shadow d-none d-lg-inline-block align-self-center" href="#" role="button" data-toggle="modal" data-target="#request_popup"><i class="icofont-page"></i> Request Quote</a>  -->
          <!-- Toggle Button Start -->
          <button class="navbar-toggler x collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
          <!-- Toggle Button End -->  
        </div>
        <!-- Topbar Request Quote End -->

        <div class="collapse navbar-collapse" id="navbarCollapse" data-hover="dropdown" data-animations="slideInUp slideInUp slideInUp slideInUp">
          <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="<?php echo URLROOT; ?>">Home</a>
              </li>


               <li class="nav-item">
                <a class="nav-link" href="<?php echo URLROOT; ?>pages/about-us">Who We Are</a>
              </li>

               <li class="nav-item">
                <a class="nav-link" href="<?php echo URLROOT; ?>pages/service">Services</a>
              </li>

               <li class="nav-item">
                <a class="nav-link" href="<?php echo URLROOT; ?>pages/our-client">Our Clients</a>
              </li>

               <li class="nav-item">
                <a class="nav-link" href="<?php echo URLROOT; ?>pages/track-trace">Track & Trace</a>
              </li>

               <li class="nav-item">
                <a class="nav-link" href="<?php echo URLROOT; ?>pages/faq">FAQ</a>
              </li>

               <li class="nav-item">
                <a class="nav-link" href="<?php echo URLROOT; ?>pages/contact-us">Contact Us</a>
              </li>

            
              </li>
          </ul>
          
          <!-- Main Navigation End -->
        </div>
      </div>
    </nav>
    <!-- Main Navigation End -->
  </header>