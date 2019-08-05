<?php require APPROOT . 'views/inc/header_dashboard.php'; ?>

<!-- Page Breadcrumbs Start -->
  <div class="slider bg-navy-blue bg-scroll pos-rel breadcrumbs-page">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#"><i class="icofont-home"></i></a></li>
          <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
      </nav>  

      <h1>Dashboard</h1>
      
    </div>
  </div>
  <!-- Page Breadcrumbs End -->

  <!-- Main Body Content Start -->
  <main id="body-content">

    <!-- Default Grid Start -->
   

   
   <section class="bg-light-gray wide-tb-100 bg-wave">
      <div class="container pos-rel">
        <div class="row">
          <div class="col-md-8">
                 <div class="container">

                 <h2 class="entry-title"><?php echo $data['user_info']->firstname . ' ' . $data['user_info']->lastname; ?>'s Parcel information</h2>
				<?php

					$count = 1;

					$output[] = '<table id="datatable-buttons" class="table table-hover m-0 tickets-list table-actions-bar dt-responsive nowrap" cellspacing="0" width="100%" >
									<thead>
										<tr>
											<th>S/N</th>
											<th>Description</th>
											<th>Source Location</th>
											<th>Destination Location</th>
											<th>Present Location</th>
											<th>Date</th>
											<th>Code</th>
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
												$output[] = '<td><span class="btn btn-success">Arrived Destination</span></td>';
											else :
												$output[] = '<td><span class="btn btn-danger">In Transit</span></td>';
											endif;															
												
											$output[] = '</tr>';

											$count++;

										endforeach;

									endif;																						

					$output[] = '</tbody>
								</table>';								

					echo join('',$output);
				?>				    
				<!-- END PAGINATION -->       
            
            
        </div>  
          </div>
          
          <div class="col-md-4">
           <h2>Track your parcel</h2>
						 <form class="form-inline tracking" action="<?php echo URLROOT; ?>dashboards" method="post">
                <input type="text" required="" name="code" class="form-control mb-2 mr-sm-2 col" placeholder="Enter order number">
                <span style="font-size: 20px; color: #dc3545;"><?php echo $data['code_err']; ?></span>
                <button type="submit" class="btn btn-theme bg-orange mb-2 ml-3">Check Now <i class="icofont-rounded-right"></i></button>
              </form>

            <div style="margin: -200px 0px 0px 0px">
            		 <?php

					$output1[] = '<table class="table table-hover m-0 tickets-list table-actions-bar dt-responsive nowrap">';

									if(is_array($data['search_parcel_info'])) : 

										foreach($data['search_parcel_info'] as $parcel_info) : 

											$output1[] = '<tr><th>Description</th>';

											$output1[] = '<td>' . $parcel_info->description . '</td>';

											$output1[] = '</tr>';

											$output1[] = '<tr><th>Source Location</th>';

											$output1[] = '<td>' . $parcel_info->source_location . '</td>';
											
											$output1[] = '</tr>';

											$output1[] = '<tr><th>Destination Location</th>';

											$output1[] = '<td>' . $parcel_info->destination_location . '</td>';
											
											$output1[] = '</tr>';

											$output1[] = '<tr><th>Present Location</th>';

											$output1[] = '<td>' . $parcel_info->present_location . '</td>';
											
											$output1[] = '</tr>';

											$output1[] = '<tr><th>Date</th>';

											$output1[] = '<td>' . $parcel_info->present_location_date . ' '. $parcel_info->present_location_time . '</td>';
											
											$output1[] = '</tr>';

											$output1[] = '<tr><th>Code</th>';

											$output1[] = '<td>' . $parcel_info->tracking_code . '</td>';
											
											$output1[] = '</tr>';

											$output1[] = '<tr><th>Status</th>';

											if($parcel_info->status == "1") :
												$output1[] = '<td><span class="btn btn-success">Arrived Destination</span></td>';
											else :
												$output1[] = '<td><span class="btn btn-danger">In Transit</span></td>';
											endif;
											
											$output1[] = '</tr>';

										endforeach;

									endif;																						

					$output1[] = '</table>';								

					echo join('',$output1);
				?>
            </div>
              
					
			    </div><!-- /.sidebar -->

			   
          </div>
        </div>
        
      </div>
    </section>
    <!-- Default Grid End --> 

    
    <!-- Default Grid End -->    
  </main>


<?php require APPROOT . 'views/inc/footer_dashboard.php'; ?>