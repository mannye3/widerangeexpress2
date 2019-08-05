<header class="header">
	<nav class="top-bar">
		<div class="overlay-bg">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-xs-12">
  					<div class="call-to-action">
  						<ul class="list-inline">
  							<!-- <li><a href="#"><i class="fa fa-phone"></i> 1-800-987-654</a></li> -->
                  			<li><a href="#"><i class="fa fa-envelope"></i> info@widerangeexpress.com</a></li>
  						</ul>
  					</div><!-- /.call-to-action -->
					</div><!-- /.col-sm-6 -->
					
					<div class="col-sm-6 hidden-xs">
  					<div class="topbar-right">
	  					<div class="lang-support pull-right">
							<div class="call-to-action">
		  						<ul class="list-inline">
		  							<!-- <li><a href="#"><i class="fa fa-phone"></i> 1-800-987-654</a></li> -->
		                  			<li><a href="<?php echo URLROOT; ?>users/logout"><i class="fa fa-sign-in"></i>Logout</a></li>
		  						</ul>
		  					</div><!-- /.call-to-action -->
						</div>

  						<!-- <ul class="social-links list-inline pull-right">
  							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
  							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
  							<li><a href="#"><i class="fa fa-instagram"></i></a></li>
  							<li><a href="#"><i class="fa fa-tumblr"></i></a></li>
  						</ul> -->
  					</div><!-- /.social-links -->
					</div><!-- /.col-sm-6 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</div><!-- /.overlay-bg -->
	</nav><!-- /.top-bar -->
	
	<!-- <div id="search">
	    <button type="button" class="close">×</button>
	    <form>
	        <input type="search" value="" placeholder="type keyword(s) here" />
	        <button type="submit" class="btn btn-primary">Search</button>
	    </form>
	</div> -->

	<nav class="navbar navbar-default" role="navigation">
		<div class="container mainnav">
			<div class="navbar-header">
				<h1 class="logo"><a class="navbar-brand" href="<?php echo URLROOT; ?>"><img src="<?php echo URLROOT; ?>public/img/logo.png" alt=""></a></h1>

				<!-- offcanvas-trigger -->
                <button type="button" class="navbar-toggle collapsed pull-right" >
                  <span class="sr-only">Toggle navigation</span>
                  <i class="fa fa-bars"></i>
                </button>

			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-collapse">

				<ul class="nav navbar-nav navbar-right">
					<!-- Home -->
                    <li><a href="index.html">Profile <span class="fa fa-user"></span></a></li>
                    <!-- /Home -->

                    <li><a href="contact.html">Contact <span class="fa fa-info"></span></a></li>

                    <!-- Pages -->
                    <li><a href="<?php echo URLROOT; ?>users/logout">Logout <span class="fa fa-sign-in"></span></a></li>
                    <!-- /Pages -->                   
					
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container -->
	</nav>
</header>