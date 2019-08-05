<?php require APPROOT . 'views/inc/header_dashboard.php'; ?>

<div class="main-content">
	
	<!-- main content start-->
	<div id="page-wrapper">
		<div class="main-page">
		
			<!-- four-grids -->
			<div class="row four-grids">

				<div class="col-md-4 ticket-grid">

				</div>

				<div class="col-md-4 ticket-grid">
					<div class="tickets">
						<div class="form-title">
							<h4>Update parcel information : <?php echo $data['user_info']->firstname . ' ' . $data['user_info']->lastname; ?></h4>
						</div>
						<div class="form-body">
					  	    <?php flash_success('register_success'); ?>
					  	    <?php flash_error('register_failure'); ?>
							<form action="<?php echo URLROOTADM; ?>admins/update-parcel/<?php echo $data['email'] . '_' . $data['id']; ?>" method="post"> 
								<div class="form-group"> 
									<label for="parcel_desc">Parcel Description</label> 
									<input type="text" name="parcel_desc" value="<?php echo (!empty($data['parcel_info']->description)) ? $data['parcel_info']->description : ''; ?>" class="form-control"> 
								</div> 
								<div class="form-group"> 
									<label for="source_location">Source Location</label> 
									<input type="text" name="source_location" value="<?php echo (!empty($data['parcel_info']->source_location)) ? $data['parcel_info']->source_location : ''; ?>" class="form-control"> 
								</div>
								<div class="form-group"> 
									<label for="destination_location">Destination Location</label> 
									<input type="text" name="destination_location" value="<?php echo (!empty($data['parcel_info']->destination_location)) ? $data['parcel_info']->destination_location : ''; ?>" class="form-control"> 
								</div>

								<div class="form-group"> 
									<label for="present_location">Present Location</label> 
									<input type="text" name="present_location" value="<?php echo (!empty($data['parcel_info']->present_location)) ? $data['parcel_info']->present_location : ''; ?>" class="form-control"> 
									<span style="font-size: 20px; color: #dc3545;"><?php echo $data['present_location_err']; ?></span>
								</div>
								<div class="form-group">
									<label for="date">Present Location Date</label> 
									<input type="text" name="date2" id="date2" value="<?php echo (!empty($data['parcel_info']->present_location_date)) ? $data['parcel_info']->present_location_date : ''; ?>" class="form-control" placeholder="Date">
									<span style="font-size: 20px; color: #dc3545;"><?php echo $data['date2_err']; ?></span>
								</div>
								<div class="form-group">
									<label for="time">Present Location Time</label> 
									<input type="text" name="time2" id="time2" value="<?php echo (!empty($data['parcel_info']->present_location_time)) ? $data['parcel_info']->present_location_time : ''; ?>" class="form-control" placeholder="Time">
									<span style="font-size: 20px; color: #dc3545;"><?php echo $data['time2_err']; ?></span>
								</div>
								<div class="form-group"> 
									<label for="status">Parcel Status</label> 
									<select name="status" class="form-control">
										<option value="0" selected>Not yet arrived at destination</option>
										 <option value="1">Has arrived at destination</option>
									</select>
								</div>

                                <div class="form-group">
                                    <label for="status">Shipment Status</label>
                                    <select name="shipment" class="form-control">
                                        <?php if($data['parcel_info']->status_tag == ''){ ?>
                                        <option value=""  selected>Select..</option>
                                        <?php }else{ ?>
                                            <option value="<?php echo $data['parcel_info']->status_tag; ?>" selected><?php echo $data['parcel_info']->status; ?></option>
                                        <?php } ?>
                                        <option value="Dispatched">Dispatched (from departure)</option>
                                        <option value="Processed">Processed</option>
                                        <option value="Shipment on hold">Shipment on hold</option>
                                        <option value="Delivered">Delivered (to Arrival Destination)</option>
                                   </select>
                                    <span style="font-size: 20px; color: #dc3545;"><?php echo $data['shipment_err']; ?></span>
                                </div>
								<div class="form-group"> 
									<label for="tracking_code">Tracking Code</label> 
									<input type="text" name="tracking_code2" value="<?php echo (!empty($data['parcel_info']->tracking_code)) ? $data['parcel_info']->tracking_code : ''; ?>" class="form-control" disabled> 
									<input type="hidden" name="tracking_code" value="<?php echo (!empty($data['parcel_info']->tracking_code)) ? $data['parcel_info']->tracking_code : ''; ?>">
								</div>
								<button type="submit" name="submit" class="btn btn-primary">Submit</button> 
							</form> 
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>

				<div class="col-md-4 ticket-grid">

				</div>

				<!-- <div class="col-md-3 ticket-grid">
					<div class="tickets">
						<div class="grid-left">
							<div class="book-icon">
								<i class="fa fa-rocket"></i>
							</div>
						</div>
						<div class="grid-right">
							<h3>New <span>Projects</span></h3>
							<p>745</p>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-3 ticket-grid">
					<div class="tickets">
						<div class="grid-left">
							<div class="book-icon">
								<i class="fa fa-bar-chart"></i>
							</div>
						</div>
						<div class="grid-right">
							<h3>Our <span>Status</span></h3>
							<p>125</p>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-3 ticket-grid">
					<div class="tickets">
						<div class="grid-left">
							<div class="book-icon">
								<i class="fa fa-user"></i>
							</div>
						</div>
						<div class="grid-right">
							<h3>Daily <span>Visitors</span></h3>
							<p>7462</p>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div> -->
				<div class="clearfix"> </div>
			</div>
			<!-- //four-grids -->
		</div>
	</div>

<?php require APPROOT . 'views/inc/footer_dashboard.php'; ?>
