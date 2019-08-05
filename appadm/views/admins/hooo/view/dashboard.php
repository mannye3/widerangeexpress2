<?php require APPROOT . 'views/inc/header_dashboard.php'; ?>

<div class="main-content">
	
	<!-- main content start-->
	<div id="page-wrapper">
		<div class="main-page">
		
			<!-- four-grids -->
			<div class="row four-grids">
				<div class="col-md-12 ticket-grid">
					<div class="tickets">
                        <h2><b>Manager Customers</b></h2><br/>
                   <div class="row">
                       <div class="col-md-9"></div>
                       <div class="col-md-3"><a href="<?php echo URLROOTADM; ?>admins/addcustomer" class="btn btn-success"><i class="fa fa-user"></i> Create Customer Profile</a></div>
                   </div>
                        <br/>
						<?php

							$count = 1;

							$output[] = '<table class="table table-striped" id="table_id">
											<thead>
												<tr>
													<th>S/N</th>
													<th>Email</th>
													<th>Customer Name</th>
													<th>&nbsp;</th>
													<th>&nbsp;</th>
													<th>&nbsp;</th>
													
												</tr>
											</thead>
											<tbody>';

											if(is_array($data['all_users'])) : 

												foreach($data['all_users'] as $users) : 

													$output[] = '<tr>';

													$output[] = '<td>' . $count . '</td>';
													$output[] = '<td>' . $users->email . '</td>';
													$output[] = '<td>' . $users->firstname . ' '. $users->lastname . '</td>';					
													$output[] = '<td><a href="' . URLROOTADM . 'admins/create-parcel/' . $users->email . '" class="btn btn-info">Add/Update Parcel Item</a></td>';
                                                    $output[] = '<td><a href="' . URLROOTADM . 'admins/create-parcel/' . $users->email . '" class="btn btn-info">All Shipments List</a></td>';
                                                    $output[] = '<td><a href="' . URLROOTADM . 'admins/delete-user/' . $users->usercode . '" onclick="return confirm(\'Are you sure you want to DELETE this USER ?\');" class="btn btn-danger">Delete</a></td>';
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
