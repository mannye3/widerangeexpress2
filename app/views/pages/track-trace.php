<?php require APPROOT . '/views/inc/header.php'; ?>
	
<!-- Page Breadcrumbs Start -->
  <div class="slider bg-navy-blue bg-scroll pos-rel breadcrumbs-page">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#"><i class="icofont-home"></i></a></li>
        
          <li class="breadcrumb-item active" aria-current="page">Track And Trace </li>
        </ol>
      </nav>  

      <h1>Track And Trace</h1>
     
    </div>
  </div>
  <!-- Page Breadcrumbs End -->

  <!-- Main Body Content Start -->
  <main id="body-content">

    <!-- Tracking Your Freight Start -->
    <section class="wide-tb-100">
      <div class="container">
        <div class="row">              
            <div class="col-lg-7 ml-lg-auto pos-rel col-md-12">               

              <!-- Heading Main -->
              <h1 class="heading-main text-left">
                <span>get updates</span>
                Track Your Parcel
              </h1>
              <!-- Heading Main -->
               <?php flash_success('register_success'); ?>
              <?php flash_error('register_failure'); ?>
              <!-- Tracking Form -->
              <form class="form-inline tracking"  action="<?php echo URLROOT; ?>pages/track-trace" method="post">
                <input type="text" name="code" class="form-control mb-2 mr-sm-2 col" placeholder="Enter order number">
                 <span style="font-size: 20px; color: #dc3545;"><?php echo $data['code_err']; ?></span>
                <button type="submit" class="btn btn-theme bg-orange mb-2 ml-3">Check Now <i class="icofont-rounded-right"></i></button>
              </form>

                <?php

            $output1[] = '<table class="table table-striped">';

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
              <!-- Tracking Form -->

              <!-- Forklift Image -->
              <div class="forklift-image wow slideInLeft" data-wow-duration="0" data-wow-delay="0s">
                <img src="<?php echo URLROOT; ?>/images/forklift_Image.png" alt="">
              </div>
              <!-- Forklift Image -->

            </div>              
        </div>
      </div>        
    </section>
    <!-- Tracking Your Freight End -->
  </main>
		
<?php require APPROOT . '/views/inc/footer.php'; ?>