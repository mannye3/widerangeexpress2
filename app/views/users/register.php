<?php require APPROOT . 'views/inc/header.php'; ?>

<!-- Page Breadcrumbs Start -->
  <div class="slider bg-navy-blue bg-scroll pos-rel breadcrumbs-page">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#"><i class="icofont-home"></i></a></li>
        
          <li class="breadcrumb-item active" aria-current="page">Register </li>
        </ol>
      </nav>  

      <h1>Register</h1>
     
    </div>
  </div>
  <!-- Page Breadcrumbs End -->

  <!-- Main Body Content Start -->
  <main id="body-content">

    <!-- Tracking Your Freight Start -->
    <section class="wide-tb-100">
      <div class="container">
        <div class="row">              
            <div class="col-lg-7 ml-lg-auto pos-rel col-md-12">               

              <!-- Heading Main -->
              <h1 class="heading-main text-left">
              
                Register 
              </h1>
              <!-- Heading Main -->
					<?php flash_success('register_success'); ?>
					<?php flash_error('register_failure'); ?>
					<div class="contact-map">
						<form id="mainContact" action="<?php echo URLROOT; ?>users/register" method="POST">
						  	<div class="form-group">
						    	<label for="email">Enter Your Email address</label>
						    	<input type="" value="<?php echo $data['email']; ?>" name="email" class="form-control">
                          <span style="font-size: 20px; color: #dc3545;"><?php echo $data['email_err']; ?></span>
						  	</div>

							<button name="contactoption" id="contactoption" type="submit" class="form-btn mx-auto btn-theme bg-orange">Register <i class="icofont-rounded-right"></i></button>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo URLROOT; ?>users/login">Have an account? Login</a>
						</form>
					 <!-- Tracking Form -->

              <!-- Forklift Image -->
              <div class="forklift-image wow slideInLeft" data-wow-duration="0" data-wow-delay="0s">
                <img src="<?php echo URLROOT; ?>/images/forklift_Image.png" alt="">
              </div>
              <!-- Forklift Image -->

            </div>              
        </div>
      </div>        
    </section>
    <!-- Tracking Your Freight End -->
  </main>

	
<?php require APPROOT . 'views/inc/footer.php'; ?>