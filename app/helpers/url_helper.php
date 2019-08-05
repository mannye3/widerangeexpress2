<?php
	// Simple Page Redirect
	function redirect($page){
		header('location: ' . URLROOT . $page);
	}

	function redirect_home(){
		header('location: ' . URLROOT);
	}
?>