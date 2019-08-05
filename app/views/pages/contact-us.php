<?php require APPROOT . '/views/inc/header.php'; ?>
	
<!-- Page Breadcrumbs Start -->
  <div class="slider bg-navy-blue bg-scroll pos-rel breadcrumbs-page">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#"><i class="icofont-home"></i></a></li>
        
          <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
        </ol>
      </nav>  

      <h1>Contact Us</h1>
     
    </div>
  </div>
  <!-- Page Breadcrumbs End -->

  <!-- Main Body Content Start -->
  <main id="body-content">

    <!-- Google Map Start -->
    <section class="map-bg">
      <div id="map-holder" class="pos-rel">
         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2482.814224768029!2d0.06887591577030443!3d51.51662417963665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a61f8eacdc63%3A0x8b2a84acc01cd960!2s71+Roding+Rd%2C+London+E6+6LS%2C+UK!5e0!3m2!1sen!2sng!4v1564767546178!5m2!1sen!2sng" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>      
    </section>     
    <!-- Google Map Start -->

    <!-- Contact Details Start -->
    <section class="wide-tb-100 pos-rel">
      <div class="container">
        <div class="contact-map-bg option">
          <img src="images/map-bg.png" alt="">
        </div>

        <div class="row">
          <div class="col-md-4">
            <h2 class="h2-md mb-4 fw-7 txt-blue">Our Address</h2>
            <!-- Contact Detail Left -->
            <div class="contact-detail-shadow no-shadow mb-5 wow fadeInRight" data-wow-duration="0" data-wow-delay="0s">
              
              <div class="d-flex align-items-start items">
                <i class="icofont-google-map"></i> <span>71 Roding Road London, E6, UK</span>
              </div>
              <div class="d-flex align-items-start items">
                <i class="icofont-phone"></i> <span>+1 (408) 786 - 5117</span>
              </div>
              <div class="text-nowrap d-flex align-items-start items">
                <i class="icofont-email"></i> <a href="#">info@widerangeexpress.com</a>
              </div>
            </div>
            
            
            <!-- Contact Detail Left -->

          </div>


          <div class="col-md-8 col-sm-12">
            <h2 class="h2-md mb-4 fw-7 txt-blue">Say Hello! Its Free</h2>
            <div class="">
          
              <div class="free-quote-form contact-page-option wow fadeInLeft" data-wow-duration="0" data-wow-delay="0s">                  
                  <form action="http://mannatstudio.com/html/logzee/contact_process.php" method="post" id="contactoption" novalidate="novalidate" class="rounded-field">

                     <div class="form-row mb-8">
                        <div class="col">
                          <input type="text" name="name" class="form-control" placeholder="Your Name">
                        </div>
                      </div>
                      <br>


                      <div class="form-row mb-4">
                        <div class="col">
                          <input type="text" name="name" class="form-control" placeholder="Your Phone">
                        </div>
                        <div class="col">
                          <input type="text" name="email" class="form-control" placeholder="Email">
                        </div>
                      </div>
                     
                    
                      <div class="form-row mb-4">
                        <div class="col">
                          <textarea name="cment" rows="7" placeholder="Message" class="form-control"></textarea>
                        </div>
                      </div>
                      <div class="form-row text-center">

                          <button name="contactoption" id="contactoption" type="submit" class="form-btn mx-auto btn-theme bg-orange">Submit Now <i class="icofont-rounded-right"></i></button>
                      </div>
                  </form>                
              </div>
              
              </div>
          </div>
        </div>
      </div>        
    </section>
    <!-- Contact Details End -->   
  </main>
		
<?php require APPROOT . '/views/inc/footer.php'; ?>