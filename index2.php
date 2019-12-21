<?php
	session_start(); 
	require_once("admin/includes/init.php");
	require_once("admin/Models/Journey.class.php");
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
		</head>
		<body>

			  <header id="header" id="home">
			    <div class="container">
			    	<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo" class="logo-text">
				      	<a href="index.php">Adamawa<small>Sunshine</small></a>
				        <!-- <a href="index.php"><img src="img/logo.png" alt="" title="" /></a> -->
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li class="menu-active"><a href="#home">Home</a></li>
				          <li><a href="#about">About</a></li>
				          <li><a href="#routes">Routes</a></li>
				          <li><a href="#schedules">Schedules</a></li>
				          <li><a href="#contact">Contact</a></li>
				          <li><a href="register.php">Register</a></li>		
				          <li class="menu-has-children"><a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modalLoginForm">Login</a></li>	
				        </ul>
				      </nav><!-- #nav-menu-container -->		    		
			    	</div>
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
			    </div>
			  </header><!-- #header -->

			  <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content header-right">
				      <div class="modal-header text-center">
				        <h4 class="modal-title w-100 font-weight-bold text-white">Login</h4>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>

					<form action = "customer_controller.php" method = "post">
				        <div class="md-form mb-5">
				          <!-- <i class="fa fa-envelope fa-lg prefix grey-text"></i> -->
				          <input type="email" id="defaultForm-email" name = "email" class="form-control validate" placeholder="Email Address">
				          <!-- <label data-error="wrong" data-success="right" for="defaultForm-email">Your email</label> -->
				        </div>

				        <div class="md-form mb-4">
				          <!-- <i class="fa fa-lock fa-lg prefix grey-text"></i> -->
				          <input type="password" id="defaultForm-pass" name = "password" class="form-control validate" placeholder="Password">
				          <!-- <label data-error="wrong" data-success="right" for="defaultForm-pass">Your password</label> -->
				        </div>

				      <div class="modal-footer d-flex justify-content-center">
				        <button type = "submit" name = "login"class="btn btn-danger">Login</button>
				      </div>
				  	</form>
				    </div>
				  </div>
				</div>
				<!-- Former Reg modal  -->
			<!-- start banner Area -->
			<section class="banner-area relative" id="home">
			<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
    <li data-target="#demo" data-slide-to="3"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active" >
      <img src="img/slider1.png" alt="Bus image" width="100%" height="625">
    </div>
    <div class="carousel-item">
      <img src="img/slider2.png" alt="Bus image " width="100%" height="625">
    </div>
    <div class="carousel-item">
      <img src="img/slider3.png" alt="Bus image" width="100%" height="625">
    </div>
    <div class="carousel-item">
      <img src="img/slider4.png" alt="Bus image" width="100%" height="625">
    </div>
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>	
	</section>
			<!-- End banner Area -->	

			<!-- Start feature Area -->
			<section class="feature-area section-gap" id="about">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="col-md-8 pb-40 header-text">
							<h1>About us</h1>
							<p class = "" style = "text-align:justify; font-size:18px;">
								We ensure that you get to your desired destination safely and in time.
								We take you to your loved ones and help you meet your business appointments at an affordable price.
								We ensure your goods arrive in one piece and on time. 
								Timeliness and safety are not just our watch words, they are our attitude.
							</p>
							
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4 col-md-6">
							<div class="single-feature">
								<h4><span class="lnr lnr-user"></span>Expert Technicians</h4>
								<p>
									With our highly qalified technicians onboard the vehicle you book we ensure that any form of
									 breakdown will be fixed to ensure your on-time arrival to your destination.
								</p>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="single-feature">
								<h4><span class="lnr lnr-license"></span>Professional Service</h4>
								<p>
									Our team of highly qualified professionals ensure you are well attended to.
									Our qualified drivers ensure your safety on transit to your desired destination.
								</p>								
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="single-feature">
								<h4><span class="lnr lnr-phone"></span>Great Support</h4>
								<p>
									We are here to serve you all you have to do is ask. 
									We provide great support to all and sundry. We ensure you are clarified about our services.
									In case of any form of unsatisfaction please contact us and we promised to make corrections where we go wrong.
								</p>								
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="single-feature">
								<h4><span class="lnr lnr-rocket"></span>Technical Skills</h4>
								<p>
									We have the required skills needed to serve you feel free and enjoy your ride. Timeliness and safety is our attitude.
								</p>				
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="single-feature">
								<h4><span class="lnr lnr-diamond"></span>Highly Recomended</h4>
								<p>
									Several customers recommend us and we have thousands of positive feedbacks. We will continue to improve to serve you better.
								</p>								
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="single-feature">
								<h4><span class="lnr lnr-bubble"></span>Positive Reviews</h4>
								<p>
									We have upgraded in various ways in a bid to satisfy our customers. You can contact us vian any of our links if there is anything you want us to improve.
								</p>									
							</div>
						</div>						
					</div>
				</div>	
			</section>
			<!-- End feature Area -->

						<!-- Start callaction Area -->
			<section class="callaction-area relative section-gap" id="routes">
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-10">
							<h1 class="text-white">Routes Covered</h1>
							<h3 class="text-white">Interstate Roues</h3>
							<table class="table table-bordered"  width="100%" cellspacing="0">

			                  <tbody>
			                    <tr>
								  <td>Abia</td> 
								  <td>Adamawa </td>
								  <td>Akwa Ibom</td>
								  <td>Anambra </td>
								  <td>Bauchi  </td>
								  <td>Bayelsa </td>
								  <td>Borno</td>
								</tr>

								<tr>
								   
								  <td>Cross </td>
								  <td>Delta </td>
								  <td>Ebonyi </td>
								  <td>Edo </td>
								  <td>Ekiti </td>
								  <td>Enugu</td>
								  <td>FCT Abuja</td>
								</tr>

								<tr>
								  <td>Gombe </td>
								  <td>Imo </td>
								  <td>Jigawa </td>
								  <td>Kaduna </td>
								  <td>Kano  </td>
								  <td>Katsina </td>
								  <td>Kebbi</td>
								</tr>

								<tr>   
								  <td>Kogi  </td>
								  <td>Kwara </td>
								  <td>Lagos</td>
								  <td>Nasarawa  </td>
								  <td>Niger</td>
								  <td>Ogun</td>  
								  <td>Ondo </td>
								</tr>

								<tr> 
								  <td>Osun  </td>
								  <td>Oyo </td>
								  <td>Plateau </td>
								  <td>Rivers  </td>
								  <td>Sokoto </td>
								  <td>Taraba</td>  
								  <td>Yobe  </td>
								</tr>

								<tr>
								  
								  <td>Zamfara</td>
								</tr>
			                  </tbody>
			                </table>
							<!-- <a class="callaction-btn text-uppercase" href="#">Reach Our Support Team</a>	 -->
							</div>
					</div>
				</div>	
			</section>
			<!-- End callaction Area -->		
							
			<!-- Start callaction Area -->
			<section class="callaction-area relative section-gap" id="routes">
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-10">
							<h1 class="text-white">Intrastate Routes</h1>
							<table class="table table-bordered"  width="100%" cellspacing="0">

			                  <tbody>
			                    <tr>
								  <td>Ganye</td> 
								  <td>Mubi </td>
								  <td>Hong</td>
								  <td>Song</td>
								  <td>Numan</td>
								  <td>Fufore</td>
								  <td>Borno</td>
								</tr>
			                  </tbody>
			                </table>
							<!-- <a class="callaction-btn text-uppercase" href="#">Reach Our Support Team</a>	 -->
							</div>
					</div>
				</div>	
			</section>
			<!-- End callaction Area -->		
							

			<!-- Start reviews Area -->
			<section class="section-top-border" id="schedules">
				<div class="container">
					<div class="col-md-8 pb-40 header-text text-center">
						<h1>Journey Schedules</h1>
					</div>
					<div class="progress-table-wrap">
						<div class="progress-table">
							<table class="table table-stripped" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
						<th>S/N.</th>
						<th>Bus Number</th> 
						<th>From </th>
						<th>To</th>
						<th>Departure Time</th>
						<th>Estimated Arrival Time</th>
						<th>Fare</th>
                    </tr>
                  </thead>

                  <tbody>
                   <?php
                      $joni = new Journey();
                      $interstates = $joni->getAllInterJourneys();
                      $sn = 0;
                      foreach($interstates as $joni){
                        $sn++;
                        $id = $joni['j_id'];
                        $from = $joni['from_destination'];
                        $to = $joni['to_destination'];
                        $bus_type = $joni['BusType'];
                        $departure = $joni['departure_time'];
                        $departure = date('h:i A', strtotime($departure));
                        $arrival = $joni['est_arrival_time'];
                        $arrival = date('h:i A', strtotime($arrival));
                        $fare = $joni['fare'];
                    ?>
                    <tr>
                      <td><?php echo $sn;?></td>
                      <td><?php echo $from; ?></td>
                      <td><?php echo $to; ?></td>
                      <td><?php echo $bus_type; ?></td>
                      <td><?php echo $departure; ?></td>
                      <td><?php echo $arrival; ?></td>
                      <td><?php echo $fare; ?></td>
                    </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
						</div>
					</div>
				</div>	
			</section>
			<!-- End reviews Area -->


			<!-- Start fact Area -->
			<section class="facts-area section-gap" id="facts-area">
				<div class="container">
					<div class="row">
						<div class="col single-fact">
							<h1 class="counter">2536</h1>
							<p>Completed Trips</p>
						</div>
						<div class="col single-fact">
							<h1 class="counter">424</h1>
							<p>Really Happy Clients</p>
						</div>
						<div class="col single-fact">
							<h1 class="counter">39</h1>
							<p>Total Number of cars</p>
						</div>	
						<div class="col single-fact">
							<h1 class="counter">435</h1>
							<p>Number of registered customers</p>
						</div>												
					</div>
				</div>	
			</section>
			<!-- end fact Area -->	

			<!-- Start contact-page Area -->
			<section class="contact-page-area section-gap" id="contact">
				<div class="container">
					<div class="row">
						<!-- <div class="map-wrap" style="width:100%; height: 445px;" id="map"></div> -->
						<div class="col-lg-4 d-flex flex-column address-wrap">
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-home"></span>
								</div>
								<div class="contact-details">
									<h5>Yola, Adamawa State</h5>
									<p>Kofare</p>
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-phone-handset"></span>
								</div>
								<div class="contact-details">
									<h5>07032298236</h5>
									<p>Sun to Sat 6 AM to 6 PM</p>
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-envelope"></span>
								</div>
								<div class="contact-details">
									<h5>support@sunshinexpress.com</h5>
									<p>Send us your query anytime!</p>
								</div>
							</div>														
						</div>
			
						<div class="col-lg-8">
							<form class="form-area " id="myForm" action="mail.php" method="post" class="contact-form text-right">
								<div class="row">	
									<div class="col-lg-6 form-group">
										<input name="name" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control" required="" type="text">
									
										<input name="email" placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="common-input mb-20 form-control" required="" type="email">

										<input name="subject" placeholder="Enter your subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your subject'" class="common-input mb-20 form-control" required="" type="text">
										<div class="mt-20 alert-msg" style="text-align: left;"></div>
									</div>
									<div class="col-lg-6 form-group">
										<textarea class="common-textarea form-control" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
										<button class="primary-btn mt-20 text-white" style="float: right;">Send Message</button>
																				
									</div>
								</div>
							</form>	
						</div>
					</div>
				</div>	
			</section>
			<!-- End contact-page Area -->


			<!-- start footer Area -->		
			<footer class="footer-area section-gap">
				<div class="container">
					<div class="row">	
						<p class="mt-50 mx-auto footer-text col-lg-12">
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This site is owned and managed by <a href="#home">CS/11/1488 &amp; CS/14/1772</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>											
					</div>
				</div>
			</footer>	
			<!-- End footer Area -->	
			<script type="text/javascript">
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 9000);    
}
			</script>
			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="js/vendor/bootstrap.min.js"></script>			
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
			<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>			
  			<script src="js/easing.min.js"></script>			
			<script src="js/hoverIntent.js"></script>
			<script src="js/superfish.min.js"></script>	
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>	
			<script src="js/owl.carousel.min.js"></script>			
			<script src="js/jquery.sticky.js"></script>
			<script src="js/jquery.nice-select.min.js"></script>	
			<script src="js/waypoints.min.js"></script>
			<script src="js/jquery.counterup.min.js"></script>					
			<script src="js/parallax.min.js"></script>		
			<script src="js/mail-script.js"></script>	
			<script src="js/main.js"></script>	

  <!-- Page level plugins -->
  <script src="admin/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="admin/js/demo/datatables-demo.js"></script>
		</body>
	</html>



