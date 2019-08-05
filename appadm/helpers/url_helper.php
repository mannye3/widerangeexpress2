<?php
	// Simple Page Redirect
	function redirect($page){
		header('location: ' . URLROOTADM . $page);
	}

	function redirect_home(){
		header('location: ' . URLROOTADM);
	}
?>