<?php require APPROOT . 'views/inc/header_inner.php'; ?>



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
                            <div class="col-md-4">
                                <!-- Personal-Information -->
                               <div class="card-box">
                                    <h4 class="header-title mt-0 mb-3">Create new parcel information </h4>
                                    <div class="">
                                        <div class="">

                                            <form action="<?php echo URLROOTADM; ?>admins/create-parcel/<?php echo $data['email']; ?>" method="post"> 
								<div class="form-group"> 
									<label for="parcel_desc">Parcel Description</label> 
									<input type="text" name="parcel_desc" value="<?php echo $data['parcel_desc']; ?>" class="form-control" placeholder="Parcel Description"> 
									<span style="font-size: 20px; color: #dc3545;"><?php echo $data['parcel_desc_err']; ?></span>
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
								
								
								<div class="form-group">
									<label for="date">Present Location Date</label> 
									<input type="date" name="date2" id="date2" value="<?php echo $data['date2']; ?>" class="form-control" placeholder="Date">
									<span style="font-size: 20px; color: #dc3545;"><?php echo $data['date2_err']; ?></span>
								</div>
								<div class="form-group">
									<label for="time">Present Location Time</label> 
									<input type="time" name="time2" id="time2" value="<?php echo $data['time2']; ?>" class="form-control" placeholder="Time">
									<span style="font-size: 20px; color: #dc3545;"><?php echo $data['time2_err']; ?></span>
								</div>
								
								<div class="form-group"> 
									<label for="tracking_code">Tracking Code</label> 
									<input type="text" name="tracking_code2" value="<?php echo $data['tracking_code']; ?>" class="form-control" placeholder="Tracking Code"> 
									<input type="hidden" name="tracking_code" value="<?php echo $data['tracking_code']; ?>" /> 
									<span style="font-size: 20px; color: #dc3545;"><?php echo $data['tracking_code_err']; ?></span>
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


                            <div class="col-md-8">

                                <!-- end row -->
                               

                                <div class="card-box">
                                	 <h4><?php echo $data['user_info']->firstname . ' ' . $data['user_info']->lastname; ?>'s information</h4>
                                	  <div class="row">
                            		<div class="col-12">
                                <div class="card-box table-responsive">
                                    <table id="datatable-buttons" class="table table-hover m-0 tickets-list table-actions-bar dt-responsive nowrap" cellspacing="0" width="100%" >


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

                                        <tbody>
                                             <?php 
                                             $count = 1;

                                             foreach($data['all_parcel_info'] as $parcel) : 
                                                   ?>

                                        <tr>
                                            <td><b><?php echo $count;  ?></b></td>
                                            

                                            <td>
                                                <?php echo $parcel->description;  ?>
                                            </td>

                                            <td>
                                                <?php echo $parcel->source_location;  ?>
                                            </td>

                                            <td>
                                                <?php echo $parcel->destination_location;  ?>
                                            </td>

                                            <td>
                                                <?php echo $parcel->present_location;  ?>
                                            </td>


                                            <td>
                                                <?php echo $parcel->present_location_date;  ?>
                                            </td>

                                            <!--  <td>
                                                <?php echo $parcel->present_location_time;  ?>
                                            </td> -->


                                             <td>
                                                <?php echo $parcel->tracking_code;  ?>
                                            </td>
                                            <td><?php

                                            if($parcel->status == "1") :
														$output[] = '<td><span class="label label-success">Arrived Destination</span></td>';
													else :
														$output[] = '<td><a href="' . URLROOTADM . 'admins/update-parcel/' . $parcel->email . '_' . $parcel->id . '" class="btn btn-info">Update Parcel Info</a></td>';
													endif;	
													?>	

                                           
                                            </td>
                                            
                                            <td>
                                               
                                              <a href="<?php echo URLROOT; ?>adm/admins/update-parcel/<?php echo $parcel->email . '_' . $parcel->id ?>" class="btn btn-custom waves-effect waves-light">Update Parcel Info</a>
                                            </td>
                                        </tr>

                                        <?php endforeach; ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                                </div>

                                

                            </div>
                            <!-- end col -->

                        </div>
                        <!-- end row -->

<?php require APPROOT . 'views/inc/footer_inner.php'; ?>
