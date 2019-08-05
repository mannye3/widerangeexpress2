 <?php require APPROOT . '/views/inc/header_inner.php'; ?>    



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
                                    <h4 class="page-title">Users  <!-- <?php echo $row["name"]; ?> --></h4>
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


                        <div class="row">
                            <div class="col-md-4">
                                <!-- Personal-Information -->
                                <div class="card-box">
                                  
                                    <div class="panel-body">
                                       <center>
                                        <?php
                                            
                                          if ($data['user_info']->image ==""){
                                           echo '<img src="'.URLROOT.'/assets/images/3002121059.jpg" width="150" height="150" />';
                                           }  


                                           elseif ($data['user_info']->image !=="") {

                                             echo '<img src="http://localhost/prifa/profile_pic/'.$data['user_info']->image.'" width="150" height="150">';
                                                
                                             }  


                                        ?></center>

                                        <hr/>

                                        <div class="text-left">
                                            <p class="text-muted font-13"><strong>Full Name :</strong> <span class="m-l-15"><?php echo $data['user_info']->name;  ?></span></p>

                                            <p class="text-muted font-13"><strong>Mobile :</strong><span class="m-l-15"><?php echo $data['user_info']->phone;  ?></span></p>

                                            <p class="text-muted font-13"><strong>Email :</strong> <span class="m-l-15"><?php echo $data['user_info']->email;  ?></span></p>

                                            <!-- <p class="text-muted font-13"><strong>State :</strong> <span class="m-l-15">Lagos</span></p>

                                             <p class="text-muted font-13"><strong>City :</strong> <span class="m-l-15">Surulere</span></p> -->

                                           

                                        </div>

                                       <!--  <ul class="social-links list-inline m-t-20 m-b-0">
                                            <li class="list-inline-item">
                                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="#" data-original-title="Facebook"><i class="fa fa-facebook"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="#" data-original-title="Twitter"><i class="fa fa-twitter"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="#" data-original-title="Skype"><i class="fa fa-skype"></i></a>
                                            </li>
                                        </ul> -->
                                    </div>
                                </div>
                                <!-- Personal-Information -->

                              

                            </div>


                            <div class="col-md-8">

                                <!-- end row -->


                                <div class="card-box">
                                    <h4 class="header-title mt-0 mb-3">Edit Profile </h4>
                                    <div class="">
                                        <div class="">

                                            <form action="<?php echo URLROOT; ?>/accounts/user/<?php echo $data['user_info']->id;  ?>" method="post">
                                        <div class="form-group">
                                            <label for="userName">Full Name<span class="text-danger">*</span></label>
                                            <input type="text" name="name" parsley-trigger="change" required
                                                   value="<?php echo $data['user_info']->name;  ?>" class="form-control" id="userName">
                                        </div>

                                         

                                        <div class="form-group">
                                           <label for="emailAddress">Email address<span class="text-danger">*</span></label>
                                            <input type="text" name="email" parsley-trigger="change" required
                                                  required value="<?php echo $data['user_info']->email;  ?>" class="form-control" id="userName">
                                        </div>



                                         <div class="form-group">
                                            <label for="emailAddress">Phone Number<span class="text-danger">*</span></label>
                                            <input type="text" name="phone" parsley-trigger="change" required
                                                  required value="<?php echo $data['user_info']->phone;  ?>" class="form-control" id="userName">
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

                                <div class="card-box">
                                    <h4 class="header-title mb-3">Change Password</h4>
                                    <form action="<?php echo URLROOT; ?>/accounts/edit_userpass/<?php echo $data['user_info']->id;  ?>" method="post">
                                    <div class="table-responsive">
                                        <div class="form-group">
                                            <label for="pass1">Password<span class="text-danger">*</span></label>
                                            <input id="password" name="password" type="password" placeholder="Password" required
                                                   class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="passWord2">Confirm Password <span class="text-danger">*</span></label>
                                            <input data-parsley-equalto="#pass1" type="password" required
                                                   placeholder="Password" class="form-control" id="confirm_password">
                                        </div>

                                         <div class="form-group text-right m-b-0">
                                            <button class="btn btn-custom waves-effect waves-light" type="submit">
                                                Submit
                                            </button>
                                           
                                        </div>
                                    </div>
                                    </form>
                                </div>

                            </div>
                            <!-- end col -->

                        </div>
                        <!-- end row -->



  <?php require APPROOT . '/views/inc/footer_inner.php'; ?>    