<?php
	session_start();
	require_once('js/functions.php');
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="codepixer">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Bus Booking</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
		CSS
		============================================= -->
		<link rel="stylesheet" href="css/linearicons.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/magnific-popup.css">
		<link rel="stylesheet" href="css/nice-select.css">					
		<link rel="stylesheet" href="css/animate.min.css">
		<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">			
		<link rel="stylesheet" href="css/owl.carousel.css">
		<link rel="stylesheet" href="css/main.css">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
		<style type="text/css">
			.bg-cover{
				background-image:url(img/slider2.png); 
			  	background-repeat:no-repeat; 
				background-position:center; 
				background-size: cover;
				width:100%;
				height:100%;
				margin:10px auto;

			}
		</style>
	</head>
	<body class = "bg-cover">

	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-6">
			<?php 
			if (isset($_SESSION['error']) && !empty($_SESSION['error'])){
              echo errorMessage($_SESSION['error']);
              $_SESSION['error'] = "";
             }
             elseif(isset($_SESSION['success']) && !empty($_SESSION['success'])){
              echo successMessage($_SESSION['success']);
              $_SESSION['success'] = "";
             }
          ?> 
		</div>
	</div>
		<div class = "row">
		<div class="col-md-4"></div>
		<div class="col-md-4">

		    <div class="header-right">
		        <h4 class="text-white pb-30">Register Today!</h4>
		    						    
				<form action = "customer_controller.php" method = "post">
					<div class="from-group">
				    	<input class="form-control txt-field" type="text" name="name" placeholder="Your name" required>
				    </div>
			    	<div class="form-group">
						<select name="gender" class = "form-control" required>
							<option value="" disabled selected hidden>Gender</option>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select>
					</div>
					<div class="form-group">
						<input class="form-control txt-field" type="email" name="email" placeholder="Email address" required>
					</div>
					<div class="form-group">
				    	<input class="form-control txt-field" type="tel" name="phone" placeholder="Phone number" required>
					</div>
			    	<div class="form-group">
			    		<input class="form-control txt-field" type="password" name="password" placeholder="Password" required>
			    	</div>
			    	<div class="form-group">
				    	<input class="form-control txt-field" type="password" name="password1" placeholder="Confirm Password" required>
			    	</div>

				    <div class = "row">
				    	<div class="col-md-6"></div>
				    	<div class="form-group">
					        <button type="reset" class="btn btn-danger">Reset</button>
					        <button type="submit" name = "reg_customer" class="btn btn-success">Register</button>
				    	</div>
					</div>
				</form>
			</div>
		</div>
	</div>
		<div class="footer">
			<script src="js/vendor/jquery-2.2.4.min.js"></script>
  			<script src="js/vendor/bootstrap.min.js"></script>
  			<!-- <script src="js/vendor/jquery-easing/jquery.easing.min.js"></script> -->
		</div>
	</div>
</body>
</html>