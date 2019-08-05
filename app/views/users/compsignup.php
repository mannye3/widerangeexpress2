<?php require APPROOT . 'views/inc/header.php'; ?>

	<!-- Page Breadcrumbs Start -->
  <div class="slider bg-navy-blue bg-scroll pos-rel breadcrumbs-page">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#"><i class="icofont-home"></i></a></li>
        
          <li class="breadcrumb-item active" aria-current="page">Complete Registration </li>
        </ol>
      </nav>  

      <h1>Complete Registration</h1>
     
    </div>
  </div>
  <!-- Page Breadcrumbs End -->

  <!-- Main Body Content Start -->
  <main id="body-content">

    <!-- Tracking Your Freight Start -->
    <section class="wide-tb-100">
      <div class="container">
       <div class="row">

				<div class="col-md-3">
					
				</div>

				<div class="col-md-6">
					<?php flash_success('register_success'); ?>
					<?php flash_error('register_failure'); ?>
					<div class="contact-map">
						<form id="mainContact" action="<?php echo URLROOT; ?>users/compsignup/<?php echo $data['email']; ?>" method="POST">

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
									    <label for="firstname">First Name</label>
									    <input name="first_name" type="text" value="<?php echo $data['first_name']; ?>" class="form-control" placeholder="">
									    <span style="font-size: 20px; color: #dc3545;"><?php echo $data['first_name_err']; ?></span>
									</div>
								</div>
								<div class="col-md-6">
								  <div class="form-group">
								    <label for="lastname">Last Name</label>
								    <input name="last_name" type="text" value="<?php echo $data['last_name']; ?>" class="form-control" placeholder="">
								    <span style="font-size: 20px; color: #dc3545;"><?php echo $data['last_name_err']; ?></span>
								  </div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
								  <div class="form-group">
								    <label for="phone">Phone Number</label>
								    <input name="phone" type="text" value="<?php echo $data['phone']; ?>" class="form-control" placeholder="">
								    <span style="font-size: 20px; color: #dc3545;"><?php echo $data['phone_err']; ?></span>
								  </div>
								</div>
								<div class="col-md-6">
								  <div class="form-group">
								    <label for="email">Email address</label>
								    <input name="email" type="email" value="<?php echo $data['email']; ?>" class="form-control" placeholder="">
								    <span style="font-size: 20px; color: #dc3545;"><?php echo $data['email_err']; ?></span>
								  </div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
								  <div class="form-group">
								    <label for="password">Password</label>
								    <input name="password" type="password" value="<?php echo $data['password']; ?>" class="form-control" placeholder="">
								    <span style="font-size: 20px; color: #dc3545;"><?php echo $data['password_err']; ?></span>
								  </div>
								</div>
								<div class="col-md-6">
								  <div class="form-group">
								    <label for="confirmpassword">Confirm Password</label>
								    <input name="confirm_password" type="password" value="<?php echo $data['confirm_password']; ?>" class="form-control" placeholder="">
								    <span style="font-size: 20px; color: #dc3545;"><?php echo $data['confirm_password_err']; ?></span>
								  </div>
								</div>
							</div>

							<div class="form-group text-area">
								<label for="address">Address</label>
								<input name="address" type="text" value="<?php echo $data['address']; ?>" class="form-control" placeholder="">
								<span style="font-size: 20px; color: #dc3545;"><?php echo $data['address_err']; ?></span>
							</div>
							<!-- <div class="form-group text-area">
								<div class="captcha_wrapper">
				                   <div class="g-recaptcha" data-sitekey="6LecZ0sUAAAAAGnzqDEGd5ktB3rEX4Y33nKinosR"></div>
			                  	</div>
							</div> -->

							<button type="submit" class="form-btn mx-auto btn-theme bg-orange">Complete Registration</button>
						</form>
					</div>
				</div>

				<div class="col-md-3">
					
				</div>
			</div>
      </div>        
    </section>
    <!-- Tracking Your Freight End -->
  </main>

	
<?php require APPROOT . 'views/inc/footer.php'; ?>