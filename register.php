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
	</head>
	<body>

	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
		    <div class="header-right">
		        <h4 class="text-white pb-30">Register Today!</h4>
		    						    
				<form action = "customer_controller.php" method = "post">
					<div class="from-group">
				    	<input class="form-control txt-field" type="text" name="name" placeholder="Your name">
				    </div>
			    	<div class="form-group">
						<select name="gender" class = "form-control">
							<option value="" disabled selected hidden>Gender</option>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select>
					</div>
					<div class="form-group">
						<input class="form-control txt-field" type="email" name="email" placeholder="Email address">
					</div>
					<div class="form-group">
				    	<input class="form-control txt-field" type="tel" name="phone" placeholder="Phone number">
					</div>
			    	<div class="form-group">
			    		<input class="form-control txt-field" type="password" name="password" placeholder="Password">
			    	</div>
			    	<div class="form-group">
				    	<input class="form-control txt-field" type="password" name="password1" placeholder="Confirm Password">
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
</body>
</html>