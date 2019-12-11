<?php
	session_start();
	require_once('includes/init.php');
	if($_SESSION['role'] == "user"){
		if(session_destroy()){
			redirect("dashboard.php");
		}
	}
	else{ 
		if(session_destroy()){
			redirect("index.php");
		}
	}
?>