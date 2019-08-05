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
			
			<!-- <div class="col-md-3 content-top-2">				
				
			</div> -->
			<div class="col-md-12 ">
				<div class="content-top-1">
					<div class="col-md-6 top-content">
						<div class="grid-form1">
				  	       <h3>Upload User Picture</h3>
				  	       <?php flash_success('register_success'); ?>
				  	       <?php flash_error('register_failure'); ?>
				  	         <div class="tab-content">
								<div class="tab-pane active" id="horizontal-form">
									<form action="<?php echo URLROOTADM; ?>admins/uploadpics" enctype="multipart/form-data" method="post" class="form-horizontal">
										
										<div class="form-group">
									        <h4>Select Picture</h4>
									        <input type="file" name="user_pics" id="user_pics"> <br>
									
											<span id="span_user_pics_err" style="font-size: 20px; color: #dc3545;"><?php echo $data['user_pics_err']; ?></span>
									    </div>
										<div class="panel-footer">
											<div class="row">
												<div class="col-sm-12 col-sm-offset-2">
													<button type="submit" name="submit" class="btn-primary btn">Submit</button>
													<!-- <button class="btn-default btn">Cancel</button> -->
												</div>
											</div>
										 </div>
									</form>
								</div>
							</div>
						
					  	</div>
					</div>
					<div class="col-md-6 top-content1">	   
						<label>Preview</label>

						<img src="" id="profile-img-tag" width="200px" />
					</div>
					 <div class="clearfix"> </div>
				</div>

				<!-- <div class="content-top-1">
					<div class="col-md-6 top-content">
						<h5>Points</h5>
						<label>6295</label>
					</div>
					<div class="col-md-6 top-content1">	   
						<div id="demo-pie-2" class="pie-title-center" data-percent="50"> <span class="pie-value"></span> </div>
					</div>
					 <div class="clearfix"> </div>
				</div>

				<div class="content-top-1">
					<div class="col-md-6 top-content">
						<h5>Cards</h5>
						<label>3401</label>
					</div>
					<div class="col-md-6 top-content1">	   
						<div id="demo-pie-3" class="pie-title-center" data-percent="75"> <span class="pie-value"></span> </div>
					</div>
					 <div class="clearfix"> </div>
				</div> -->
			</div>
			<!-- <div class="col-md-3 content-top-2">				
				
			</div> -->
			<div class="clearfix"> </div>
		</div>
		<!---->
 		
		
		<!--//content-->

<?php require APPROOT . 'views/inc/footer_dashboard.php'; ?>
