

  <div class="main-content">
    <!--left-fixed -navigation-->
    <div class="sidebar" role="navigation">
            <div class="navbar-collapse">
        <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right dev-page-sidebar mCustomScrollbar _mCS_1 mCS-autoHide mCS_no_scrollbar" id="cbp-spmenu-s1">
          <div class="scrollbar scrollbar1">
            
          </div>
          <!-- //sidebar-collapse -->
        </nav>
      </div>
    </div>
    <!--left-fixed -navigation-->
    <!-- header-starts -->
    <div class="sticky-header header-section ">
      <div class="header-left">
        <!--logo -->
        <div class="logo">
          <a href="index.html">
            <ul>  
              <li><img src="<?php echo URLROOT; ?>public/adm/images/logo.png" alt="" /></li>
              <div class="clearfix"> </div>
            </ul>
          </a>
        </div>
        <!--//logo-->       
        
        <div class="clearfix"> </div>
      </div>
      <!--search-box-->
        <div class="search-box">
          <!-- <form class="input">
            <input class="sb-search-input input__field--madoka" placeholder="Search..." type="search" id="input-31" />
          </form> -->
            <a href="<?php echo URLROOTADM; ?>admins/dashboard"><i class="fa fa-home nav_icon"></i>Dashboard</a>&nbsp;&nbsp;|&nbsp;&nbsp;
            <a href="<?php echo URLROOTADM; ?>admins/customers"><i class="fa fa-users nav_icon"></i>Manage Customers</a>&nbsp;&nbsp;|&nbsp;&nbsp;
            <a href="<?php echo URLROOTADM; ?>admins/logout"><i class="fa fa-sign-out nav_icon"></i>Logout</a>
        </div>
        <!--//end-search-box-->
      <div class="header-right">
        
        <!--notification menu end -->
        <div class="profile_details">   
          <ul>
            <li class="dropdown profile_details_drop">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <div class="profile_img"> 
                  <span class="prfil-img"><img src="<?php echo URLROOT; ?>public/adm/images/a.png" alt=""> </span> 
                  <div class="clearfix"></div>  
                </div>  
              </a>
              <ul class="dropdown-menu drp-mnu">
                <!--  <li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li> 
              <li> <a href="#"><i class="fa fa-user"></i> Profile</a> </li>  -->
              <li> <a href="<?php echo URLROOTADM; ?>admins/logout"><i class="fa fa-sign-out"></i> Logout</a> </li>
              </ul>
            </li>
          </ul>
        </div>
        <!--toggle button start-->
        <button id="showLeftPush"><i class="fa fa-bars"></i></button>
        <!--toggle button end-->
        <div class="clearfix"> </div>       
      </div>
      <div class="clearfix"> </div> 
    </div>
    <!-- //header-ends -->