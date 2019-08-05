
<!--footer-->
	<div class="dev-page">
 
		<!-- page footer -->   
		<!-- dev-page-footer-closed dev-page-footer-fixed -->
        <div class="dev-page-footer dev-page-footer-fixed"> 
			<!-- container -->
			<div class="container">
				<div class="copyright">
					<p>&copy; 2018 <?php echo URLNAME; ?>. All Rights Reserved</a></p> 
				</div>
            
            </div>
			<!-- //container -->
        </div>
        <!-- /page footer -->
	</div>
    <!--//footer-->
	</div>
	<!-- Classie -->
		<script src="<?php echo URLROOT; ?>public/adm/js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			

			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!-- Bootstrap Core JavaScript --> 
		
        <script type="text/javascript" src="<?php echo URLROOT; ?>public/adm/js/bootstrap.min.js"></script>

        <script type="text/javascript" src="<?php echo URLROOT; ?>public/adm/js/dev-loaders.js"></script>
        <script type="text/javascript" src="<?php echo URLROOT; ?>public/adm/js/dev-layout-default.js"></script>
		<script type="text/javascript" src="<?php echo URLROOT; ?>public/adm/js/jquery.marquee.js"></script>
		<link href="<?php echo URLROOT; ?>public/adm/css/bootstrap.min.css" rel="stylesheet">
		
		<!-- candlestick -->
		<script type="text/javascript" src="<?php echo URLROOT; ?>public/adm/js/jquery.jqcandlestick.min.js"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>public/adm/css/jqcandlestick.css" />
		<!-- //candlestick -->
		
		<!--max-plugin-->
		<script type="text/javascript" src="<?php echo URLROOT; ?>public/adm/js/plugins.js"></script>
		<!--//max-plugin-->
		
		<!--scrolling js-->
		<script src="<?php echo URLROOT; ?>public/adm/js/jquery.nicescroll.js"></script>
		<script src="<?php echo URLROOT; ?>public/adm/js/scripts.js"></script>
		<!--//scrolling js-->

		<!-- date-picker -->
		<script type="text/javascript">
		$(document).ready(function()
		{
			$('#date').bootstrapMaterialDatePicker
			({
				time: false
			});

			$('#time').bootstrapMaterialDatePicker
			({
				date: false,
				shortTime: true,
				format: 'HH:mm'
			});

			$('#date2').bootstrapMaterialDatePicker
			({
				time: false,
				format: 'dddd DD MMMM YYYY'
			});

			$('#date3').bootstrapMaterialDatePicker
			({
				time: false,
				format: 'dddd DD MMMM YYYY'
			});

			$('#time2').bootstrapMaterialDatePicker
			({
				date: false,
				shortTime: true,
				format: 'HH:mm'
			});

			$('#date-format').bootstrapMaterialDatePicker
			({
				format: 'dddd DD MMMM YYYY - HH:mm'
			});
			$('#date-fr').bootstrapMaterialDatePicker
			({
				format: 'DD/MM/YYYY HH:mm',
				lang: 'fr',
				weekStart: 1, 
				cancelText : 'ANNULER'
			});

			$('#date-end').bootstrapMaterialDatePicker
			({
				weekStart: 0, format: 'DD/MM/YYYY HH:mm'
			});
			$('#date-start').bootstrapMaterialDatePicker
			({
				weekStart: 0, format: 'DD/MM/YYYY HH:mm'
			}).on('change', function(e, date)
			{
				$('#date-end').bootstrapMaterialDatePicker('setMinDate', date);
			});

			$('#min-date').bootstrapMaterialDatePicker({ format : 'DD/MM/YYYY HH:mm', minDate : new Date() });

			$.material.init()
		});
		</script>
		<script type="text/javascript" src="<?php echo URLROOT; ?>public/adm/js/material.min.js"></script>
		<script type="text/javascript" src="<?php echo URLROOT; ?>public/adm/js/moment-with-locales.min.js"></script>
		<script type="text/javascript" src="<?php echo URLROOT; ?>public/adm/js/bootstrap-material-datetimepicker.js"></script>
		<!-- //date-picker -->

		<script type="text/javascript">
		      var auto_refresh = setInterval(function (){
		      $('#load_getallusersinfo').load('<?php echo URLROOTADM;?>javascriptuses/getallusersinfo').fadeIn("slow");
		      }, 1000); // autorefresh the content of the div after
		                 //every 1000 milliseconds(1sec)  
		</script>

		<script type="text/javascript">
			/*function getUrlVars() {
			    var vars = {};
			    var parts = location.search.replace(/[?&]+([^=&]+)=([^&]*)/gi,
			    function (m, key, value) {
			        vars[key] = value;
			    });
			    return vars;      getUrlVars()["ssRegNum"]
			}*/

		      var auto_refresh1 = setInterval(function (){
		      $('#load_getallusertrans').load('<?php echo URLROOTADM;?>javascriptuses/getallusertrans/<?php echo $_SESSION['selected_user_email']; ?>').fadeIn("slow");
		      }, 1000); // autorefresh the content of the div after
		                 //every 1000 milliseconds(1sec)  
		</script>

		<script type="text/javascript">
		      var auto_refresh2 = setInterval(function (){
		      $('#load_getallusers').load('<?php echo URLROOTADM;?>javascriptuses/getalluser').fadeIn("slow");
		      }, 1000); // autorefresh the content of the div after
		                 //every 1000 milliseconds(1sec)  
		</script>

		<script type="text/javascript">
		      var auto_refresh3 = setInterval(function (){
		      $('#load_displaycardbankdetails').load('<?php echo URLROOTADM;?>javascriptuses/getusercardbank/<?php echo $_SESSION['selected_user_email']; ?>').fadeIn("slow");
		      }, 1000); // autorefresh the content of the div after
		                 //every 1000 milliseconds(1sec)  
		</script>

		<script type="text/javascript">
		    function readURL(input) {
		        if (input.files && input.files[0]) {
		            var reader = new FileReader();
		            
		            reader.onload = function (e) {
		                $('#profile-img-tag').attr('src', e.target.result);
		            }
		            reader.readAsDataURL(input.files[0]);
		        }
		    }

		    $("#user_pics").change(function(){
		    	$("#span_user_pics_err").text("");
		        readURL(this);
		    });
		    
		</script>
		
</body>
</html>