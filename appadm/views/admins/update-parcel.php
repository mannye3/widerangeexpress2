<?php require APPROOT . '/views/inc/header_inner.php'; ?>    

<body>

        <!-- Begin page -->
        <div id="wrapper">

            <?php require APPROOT . 'views/inc/navbar.php'; ?>

 <div class="content-page">

                <!-- Top Bar Start -->
                <div class="topbar">

                    <nav class="navbar-custom">

                     <?php require APPROOT . '/views/inc/inner_nav.php'; ?>

                        <ul class="list-inline menu-left mb-0">
                            <li class="float-left">
                                <button class="button-menu-mobile open-left disable-btn">
                                    <i class="dripicons-menu"></i>
                                </button>
                            </li>
                            <li>
                                <div class="page-title-box">
                                    <h4 class="page-title">Create Parcel  <!-- <?php echo $row["name"]; ?> --></h4>
                                    <ol class="breadcrumb">
                                        <!-- <li class="breadcrumb-item active">Welcome to Highdmin admin panel !</li> -->
                                    </ol>
                                </div>
                            </li>

                        </ul>

                    </nav>

                </div>
                <!-- Top Bar End -->



                <!-- Start Page content -->
                <div class="content">
                    <div class="container-fluid">

                    	  <?php flash_success('register_success'); ?>
					  	    <?php flash_error('register_failure'); ?>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Personal-Information -->
                               <div class="card-box">
                                    <h4 class="header-title mt-0 mb-3">Create new parcel information </h4>
                                    <div class="">
                                        <div class="">

                                          <form action="<?php echo URLROOTADM; ?>admins/update-parcel/<?php echo $data['email'] . '_' . $data['id']; ?>" method="post"> 
								<div class="form-group"> 
									<label for="parcel_desc">Parcel Description</label> 
									<input type="text" name="parcel_desc2" value="<?php echo (!empty($data['parcel_info']->description)) ? $data['parcel_info']->description : ''; ?>" class="form-control" disabled> 
									<input type="hidden" name="parcel_desc" value="<?php echo (!empty($data['parcel_info']->description)) ? $data['parcel_info']->description : ''; ?>">
								</div> 
								<div class="form-group"> 
									<label for="source_location">Source Location</label> 
									<input type="text" name="source_location2" value="<?php echo (!empty($data['parcel_info']->source_location)) ? $data['parcel_info']->source_location : ''; ?>" class="form-control" disabled> 
									<input type="hidden" name="source_location" value="<?php echo (!empty($data['parcel_info']->source_location)) ? $data['parcel_info']->source_location : ''; ?>">
								</div>
								<div class="form-group"> 
									<label for="destination_location">Destination Location</label> 
									<input type="text" name="destination_location2" value="<?php echo (!empty($data['parcel_info']->destination_location)) ? $data['parcel_info']->destination_location : ''; ?>" class="form-control" disabled> 
									<input type="hidden" name="destination_location" value="<?php echo (!empty($data['parcel_info']->destination_location)) ? $data['parcel_info']->destination_location : ''; ?>">
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
									<label for="tracking_code">Tracking Code</label> 
									<input type="text" name="tracking_code2" value="<?php echo (!empty($data['parcel_info']->tracking_code)) ? $data['parcel_info']->tracking_code : ''; ?>" class="form-control" disabled> 
									<input type="hidden" name="tracking_code" value="<?php echo (!empty($data['parcel_info']->tracking_code)) ? $data['parcel_info']->tracking_code : ''; ?>">
								</div>
                                    

                                        <div class="form-group text-right m-b-0">
                                            <button class="btn btn-custom waves-effect waves-light" type="submit">
                                                Submit
                                            </button>
                                           
                                        </div>

                                    </form>
                                        </div>

                                        

                                    </div>
                                </div>
                                <!-- Personal-Information -->

                              

                            </div>


                            

                                

                            </div>
                            <!-- end col -->

                        </div>
                        <!-- end row -->

<?php require APPROOT . 'views/inc/footer_inner.php'; ?>
