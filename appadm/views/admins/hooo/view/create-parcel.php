<?php require APPROOT . 'views/inc/header_dashboard.php'; ?>

<div class="main-content">
	
	<!-- main content start-->
	<div id="page-wrapper">
		<div class="main-page">
		
			<!-- four-grids -->
			<div class="row four-grids">

				<div class="col-md-3 ticket-grid">
					<div class="tickets">
						<div class="form-title">
							<h4>Create new parcel information :</h4>
						</div>
						<div class="form-body">
					  	    <?php flash_success('register_success'); ?>
					  	    <?php flash_error('register_failure'); ?>
							<form action="<?php echo URLROOTADM; ?>admins/create-parcel/<?php echo $data['email']; ?>" method="post"> 
								<div class="form-group"> 
									<label for="parcel_desc">Parcel Description</label> 
									<input type="text" name="parcel_desc" value="<?php echo $data['parcel_desc']; ?>" class="form-control" placeholder="Parcel Description"> 
									<span style="font-size: 20px; color: #dc3545;"><?php echo $data['parcel_desc_err']; ?></span>
								</div>
                                <div class="form-group">
                                    <label for="parcel_desc">Estimated Delivery Date</label>
                                    <input type="text" name="delivery_date" id="date3" value="<?php echo $data['delivery_date']; ?>" class="form-control" placeholder="Estimated Delivery Date">
                                    <span style="font-size: 20px; color: #dc3545;"><?php echo $data['delivery_date_err']; ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="parcel_desc">Receiver Name</label>
                                    <input type="text" name="receiver" value="<?php echo $data['receiver']; ?>" class="form-control" placeholder="Receiver Name">
                                    <span style="font-size: 20px; color: #dc3545;"><?php echo $data['receiver_err']; ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="parcel_desc">Receiver Address</label>
                                    <input type="text" name="receiver_address" value="<?php echo $data['receiver_address']; ?>" class="form-control" placeholder="Receiver Address">
                                    <span style="font-size: 20px; color: #dc3545;"><?php echo $data['receiver_address_err']; ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="parcel_total">Total Parcel Items</label>
                                    <select data-placeholder="Select" class="form-control" name="total_parcel">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">20</option>
                                        <option value="20">20</option>
                                    </select>
                                    <span style="font-size: 20px; color: #dc3545;"><?php echo $data['total_parcel_err']; ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="parcel_desc">Total Weight (kg)</label>
                                    <input type="text" name="weight" value="<?php echo $data['weight']; ?>" class="form-control" placeholder="Weight (Kg)">
                                    <span style="font-size: 20px; color: #dc3545;"><?php echo $data['weight_err']; ?></span>
                                </div>
                            	<div class="form-group">
									<label for="source_location">Source Location</label> 
									<input type="text" name="source_location" value="<?php echo $data['source_location']; ?>" class="form-control" placeholder="Source Location"> 
									<span style="font-size: 20px; color: #dc3545;"><?php echo $data['source_location_err']; ?></span>
								</div>
								<div class="form-group"> 
									<label for="destination_location">Destination Location</label> 
									<input type="text" name="destination_location" value="<?php echo $data['destination_location']; ?>" class="form-control" placeholder="Destination Location"> 
									<span style="font-size: 20px; color: #dc3545;"><?php echo $data['destination_location_err']; ?></span>
								</div>
								
								<!--  <div class="form-group"> 
									<label for="exampleInputFile">File input</label> 
									<input type="file" id="exampleInputFile"> 
									<p class="help-block">Example block-level help text here.</p> 
								</div> 
								<div class="checkbox"> 
									<label> 
										<input type="checkbox"> Check me out 
									</label> 
								</div>  -->
								<div class="form-group">
									<label for="date">Present Location Date</label> 
									<input type="text" name="date2" id="date2" value="<?php echo $data['date2']; ?>" class="form-control" placeholder="Date">
									<span style="font-size: 20px; color: #dc3545;"><?php echo $data['date2_err']; ?></span>
								</div>
								<div class="form-group">
									<label for="time">Present Location Time</label> 
									<input type="text" name="time2" id="time2" value="<?php echo $data['time2']; ?>" class="form-control" placeholder="Time">
									<span style="font-size: 20px; color: #dc3545;"><?php echo $data['time2_err']; ?></span>
								</div>
								<!-- <div class="form-group">
									<label for="datetime">Date & Time</label> 
									<input type="text" id="date-format" class="form-control" placeholder="Date & Time">
								</div> -->
								<div class="form-group"> 
									<label for="tracking_code">Tracking Code</label> 
									<input type="text" name="tracking_code2" value="<?php echo $data['tracking_code']; ?>" class="form-control" placeholder="Tracking Code"> 
									<input type="hidden" name="tracking_code" value="<?php echo $data['tracking_code']; ?>" /> 
									<span style="font-size: 20px; color: #dc3545;"><?php echo $data['tracking_code_err']; ?></span>
								</div>
								<button type="submit" name="submit" class="btn btn-primary">Submit</button> 
							</form> 
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>

				<div class="col-md-9 ticket-grid">
					<div class="tickets">
						<h2><?php echo $data['user_info']->firstname . ' ' . $data['user_info']->lastname; ?>'s information</h2>
						<br>
						<?php

							$count = 1;

							$output[] = '<table class="table table-striped" id="table_id2">
											<thead>
												<tr>
													<th>S/N</th>
													<th>Description</th>
													<th>Source</th>
													<th>Destination</th>
													<th>Present Location</th>
													<th>Date</th>
													<th>Code</th>
													<th>&nbsp;</th>
													<th>&nbsp;</th>
													
												</tr>
											</thead>
											<tbody>';

											if(is_array($data['all_parcel_info'])) : 

												foreach($data['all_parcel_info'] as $parcel) : 

													$output[] = '<tr>';

													$output[] = '<td>' . $count . '</td>';
													$output[] = '<td>' . $parcel->description . '</td>';
													$output[] = '<td>' . $parcel->source_location . '</td>';
													$output[] = '<td>' . $parcel->destination_location . '</td>';
													$output[] = '<td>' . $parcel->present_location . '</td>';
													$output[] = '<td>' . $parcel->present_location_date . ' '. $parcel->present_location_time . '</td>';	
													$output[] = '<td>' . $parcel->tracking_code . '</td>';	
													if($parcel->status == "1") :
														$output[] = '<td><span class="label label-success">Arrived Destination</span></td>';
													else :
														$output[] = '<td><a href="' . URLROOTADM . 'admins/update-parcel/' . $parcel->email . '_' . $parcel->id . '" class="btn btn-info">Update Parcel Info</a></td>';
													endif;		

													$output[] = '<td><a href="' . URLROOTADM . 'admins/delete-parcel/' . $parcel->tracking_code . '" onclick="return confirm(\'Are you sure you want to DELETE this PARCEL ?\');" class="btn btn-danger">Delete</a></td>';													
														
													$output[] = '</tr>';

													$count++;

												endforeach;

											endif;																						

							$output[] = '</tbody>
										</table>';								

							echo join('',$output);
						?>
						<div class="clearfix"> </div>
					</div>
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
