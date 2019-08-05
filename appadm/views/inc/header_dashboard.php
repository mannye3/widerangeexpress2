<!DOCTYPE HTML>
<html>
<head>
<title>Admin | <?php echo SITENAME; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- <meta name="keywords" content="Baxster Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" /> -->
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="<?php echo URLROOT; ?>public/adm/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="<?php echo URLROOT; ?>public/adm/css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<link rel="icon" href="<?php echo URLROOT; ?>public/adm/favicon.ico" type="image/x-icon" >
<!-- font-awesome icons -->
<link href="<?php echo URLROOT; ?>public/adm/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- chart -->
<script src="<?php echo URLROOT; ?>public/adm/js/Chart.js"></script>
<!-- //chart -->
 <!-- js-->
<script src="<?php echo URLROOT; ?>public/adm/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo URLROOT; ?>public/adm/js/modernizr.custom.js"></script>
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!--animate-->
<link href="<?php echo URLROOT; ?>public/adm/css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="<?php echo URLROOT; ?>public/adm/js/wow.min.js"></script>
    <script>
         new WOW().init();
    </script>
<!--//end-animate-->
<!-- Metis Menu -->
<script src="<?php echo URLROOT; ?>public/adm/js/metisMenu.min.js"></script>
<script src="<?php echo URLROOT; ?>public/adm/js/custom.js"></script>
<link href="<?php echo URLROOT; ?>public/adm/css/custom.css" rel="stylesheet">
<!--//Metis Menu -->

<!-- date-picker -->
<link rel="stylesheet" href="<?php echo URLROOT; ?>public/adm/css/bootstrap-material-datetimepicker.css" />
<link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!-- //date-picker -->

<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>public/adm/media/css/jquery.dataTables.css" />
  
<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="<?php echo URLROOT; ?>public/adm/media/js/jquery.js"></script>
  
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="<?php echo URLROOT; ?>public/adm/media/js/jquery.dataTables.js"></script>

<script type="text/javascript">
$.extend( $.fn.dataTable.defaults, {
    //searching: false,
    ordering:  false
} );
</script>

<script type="text/javascript">
$(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>

<script type="text/javascript">
$(document).ready( function () {
    $('#table_id2').DataTable();
} );
</script>

</head> 
<body class="cbp-spmenu-push">
    <?php require APPROOT . 'views/inc/navbar_dashboard.php'; ?>