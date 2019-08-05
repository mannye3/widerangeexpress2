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
			
			<div class="col-md-4 content-top-2">				
				
			</div>
			<div class="col-md-4 ">
				<div class="content-top-1">
					<div class="col-md-12 top-content">
						<div class="grid-form1">
					  	       <h3>Edit User</h3>
					  	       <?php flash_success('register_success'); ?>
					  	       <?php flash_error('register_failure'); ?>
					  	         <div class="tab-content">
									<div class="tab-pane active" id="horizontal-form">
										<form action="<?php echo URLROOTADM; ?>admins/updateuser" method="post" class="form-horizontal">
											<div class="form-group">
												<div class="col-sm-12">
													<input type="text" name="txtAccountName" value="<?php echo (!empty($data['all_user_info']->account_name)) ? $data['all_user_info']->account_name : ''; ?>" class="form-control1" placeholder="Account Name">													
												</div>
												<span style="font-size: 20px; color: #dc3545;"><?php echo $data['accname_err']; ?></span>
											</div>
<!-- account_info., account_info., account_info., account_info., account_info., account_info., account_info., registration., registration. -->
											<div class="form-group">
												<div class="col-sm-12">
													<input type="text" name="txtAccountNumber" value="<?php echo (!empty($data['all_user_info']->account_number)) ? $data['all_user_info']->account_number : ''; ?>" class="form-control1" placeholder="Account Number">
												</div>
												<span style="font-size: 20px; color: #dc3545;"><?php echo $data['accnumber_err']; ?></span>
											</div>

											<div class="form-group">
												<div class="col-sm-12">
													<input type="text" name="txtAccountPin" value="<?php echo (!empty($data['all_user_info']->account_pin)) ? $data['all_user_info']->account_pin : ''; ?>" class="form-control1" placeholder="Account Pin">
												</div>
												<span style="font-size: 20px; color: #dc3545;"><?php echo $data['accpin_err']; ?></span>
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
													<input type="text" name="txtLedgerBalance" value="<?php echo (!empty($data['all_user_info']->ledger_balance)) ? $data['all_user_info']->ledger_balance : ''; ?>" class="form-control1" placeholder="Ledger Balance">
												</div>
												<span style="font-size: 20px; color: #dc3545;"><?php echo $data['ledgerbalance_err']; ?></span>
											</div>

											<div class="form-group">
												<div class="col-sm-12">
													<input type="text" name="txtAvailableBalance" value="<?php echo (!empty($data['all_user_info']->available_balance)) ? $data['all_user_info']->available_balance : ''; ?>" class="form-control1" placeholder="Available Balance">
												</div>
												<span style="font-size: 20px; color: #dc3545;"><?php echo $data['availablebalance_err']; ?></span>
											</div>

											<div class="form-group">
												<div class="col-sm-12">
													<input type="text" name="txtLastDeposit" value="<?php echo (!empty($data['all_user_info']->last_deposit)) ? $data['all_user_info']->last_deposit : ''; ?>" class="form-control1" placeholder="Last Deposit">
												</div>
												<span style="font-size: 20px; color: #dc3545;"><?php echo $data['lastdeposit_err']; ?></span>
											</div>

											<div class="form-group">
												<div class="col-sm-12">
													<input type="text" name="txtPhone" value="<?php echo (!empty($data['all_user_info']->phone)) ? $data['all_user_info']->phone : ''; ?>" class="form-control1" placeholder="Mobile Number">
												</div>
												<span style="font-size: 20px; color: #dc3545;"><?php echo $data['phone_err']; ?></span>
											</div>

											<div class="form-group">
												<div class="col-sm-12">
													<input type="text" name="txtEmail2" value="<?php echo (!empty($data['all_user_info']->email)) ? $data['all_user_info']->email : ''; ?>" class="form-control1" placeholder="Email Address" disabled>

													<input type="hidden" name="txtEmail" value="<?php echo (!empty($data['all_user_info']->email)) ? $data['all_user_info']->email : ''; ?>">
												</div>
												<span style="font-size: 20px; color: #dc3545;"><?php echo $data['email_err']; ?></span>
											</div>

											<div class="form-group">
												<div class="col-sm-12">
													<input type="text" name="txtHomeAddress" value="<?php echo (!empty($data['all_user_info']->home_address)) ? $data['all_user_info']->home_address : ''; ?>" class="form-control1" placeholder="Home Address">
												</div>
												<span style="font-size: 20px; color: #dc3545;"><?php echo $data['homeaddress_err']; ?></span>
											</div>
											
											<div class="panel-footer">
												<div class="row">
													<div class="col-sm-12 col-sm-offset-2">
														<button class="btn-primary btn">Update</button>
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
			<div class="col-md-4 content-top-2">				
				
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
