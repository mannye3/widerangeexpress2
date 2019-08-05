<?php require APPROOT . 'views/inc/header_dashboard.php'; ?>

<div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">
 
  		<!--banner-->	
		    <div class="banner">
		   
				<h2>
				<a href="index.html">Dashboard</a>
				<i class="fa fa-angle-right"></i>
				<span>Transactions</span>
				</h2>
		    </div>
		<!--//banner-->
		<!--content-->
		<div class="content-top">
			
			
			<div class="col-md-4 ">
				<div class="content-top-1">
					<div class="col-md-12 top-content">
						<div class="grid-form1">
					  	       <h3>Add Transactions</h3>
					  	       <?php flash_success('register_success'); ?>
					  	       <?php flash_error('register_failure'); ?>
					  	         <div class="tab-content">
									<div class="tab-pane active" id="horizontal-form">
										<form action="<?php echo URLROOTADM; ?>admins/addtransaction" method="post" class="form-horizontal">

											<div class="form-group">
												<div class="col-sm-12">
													<input type="text" name="txtEmail" value="<?php echo $data['email']; ?>" class="form-control1" placeholder="Email Address">
												</div>
												<span style="font-size: 20px; color: #dc3545;"><?php echo $data['email_err']; ?></span>
											</div>
											<div class="form-group">
												<div class="col-sm-12">
													<input type="date" name="txtTransDate" value="<?php echo $data['trans_date']; ?>" class="form-control1 ng-invalid ng-invalid-required" ng-model="model.date" required="">
												</div>
												<span style="font-size: 20px; color: #dc3545;"><?php echo $data['trans_date_err']; ?></span>
											</div>
											<div class="form-group">
												<div class="col-sm-12">
													<input type="text" name="txtDepositorName" value="<?php echo $data['depositor_name']; ?>" class="form-control1" placeholder="Depositor Name">
												</div>
												<span style="font-size: 20px; color: #dc3545;"><?php echo $data['depositor_name_err']; ?></span>
											</div>
											<div class="form-group"> 
												<div class="col-sm-12">
													<select name="currency" class="form-control1">
														<option value="INR" selected>&#8360;</option>
														<option value="USD">&#36;</option>
														<option value="GBP">&#163;</option>
														<option value="EUR">&#8364;</option>
													</select>	
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-12">
													<input type="text" name="txtTransAmount" value="<?php echo $data['trans_amount']; ?>" class="form-control1" placeholder="Amount">
												</div>
												<span style="font-size: 20px; color: #dc3545;"><?php echo $data['trans_amount_err']; ?></span>
											</div>
											<div class="panel-footer">
												<div class="row">
													<div class="col-sm-12 col-sm-offset-2">
														<button class="btn-primary btn">Submit</button>
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
			<div class="col-md-8 content-top-2">
				
				<div class="content-graph">
				
					<div class="graph-container">

						<div id="load_getallusertrans"></div>
						
					</div>
	
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
		<!---->
 		
		
		<!--//content-->

<?php require APPROOT . 'views/inc/footer_dashboard.php'; ?>
