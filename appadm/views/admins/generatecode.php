<?php require APPROOT . 'views/inc/header_dashboard.php'; ?>

<div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">
 
  		<!--banner-->	
		    <div class="banner">
		   
				<h2>
				<a href="index.html">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Dashboard</span>
				</h2>
		    </div>
		<!--//banner-->
		<!--content-->
		<div class="content-top">
			
			<div class="col-md-4 ">

			</div>
			<div class="col-md-4 ">
				<div class="content-top-1">
					<div class="col-md-12 top-content">
						<div class="grid-form1">
					  	       <h3>Generate Codes</h3>
					  	       <p>Click on Generate Codes below</p>
					  	       <?php flash_success('register_success'); ?>
					  	       <?php flash_error('register_failure'); ?>
					  	         <div class="tab-content">
									<div class="tab-pane active" id="horizontal-form">
										<form action="<?php echo URLROOTADM; ?>admins/createcode" method="post" class="form-horizontal">

											<div class="form-group">
												<div class="col-sm-12">
													<input type="text" name="txtEmail" value="<?php echo (!empty($data['transcodes']->email)) ? $data['transcodes']->email : ''; ?>" class="form-control1" placeholder="Email Address" disabled>
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-12">
													<input type="text" name="ccc" value="<?php echo (!empty($data['transcodes']->ccc)) ? $data['transcodes']->ccc : ''; ?>" class="form-control1" placeholder="CCC" disabled>
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-12">
													<input type="text" name="cot" value="<?php echo (!empty($data['transcodes']->cot)) ? $data['transcodes']->cot : ''; ?>" class="form-control1" placeholder="COT" disabled>
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-12">
													<input type="text" name="itc" value="<?php echo (!empty($data['transcodes']->itc)) ? $data['transcodes']->itc : ''; ?>" class="form-control1" placeholder="ITC" disabled>
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-12">
													<input type="text" name="imf" value="<?php echo (!empty($data['transcodes']->imf)) ? $data['transcodes']->imf : ''; ?>" class="form-control1" placeholder="IMF" disabled>
												</div>
											</div>
											<div class="panel-footer">
												<div class="row">
													<div class="col-sm-12 col-sm-offset-2">
														<button class="btn-primary btn">Generate Codes</button>
														<!-- <button class="btn-default btn">Cancel</button> -->
													</div>
												</div>
											 </div>
										</form>
									</div>
								</div>



					  	</div>
					</div>
					 <div class="clearfix"> </div>
				</div>


			</div>

			<div class="col-md-4 ">

			</div>
			<!-- <div class="col-md-8 content-top-2">
				
				<div class="content-graph">
				
					<div class="graph-container">

						<div id="load_getallusersinfo"></div>
						
					</div>
	
				</div>
			</div> -->
			<div class="clearfix"> </div>
		</div>
		<!---->
 		
		
		<!--//content-->

<?php require APPROOT . 'views/inc/footer_dashboard.php'; ?>
