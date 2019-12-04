<?php
  session_start();
  require_once('init.php');
  verify_login();
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SunshinExpress</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
   

   <!-- Print Receipt -->
    <script language="javascript" type="text/javascript">
        function printDiv(divID) {
            //Get the HTML of div
            var divElements = document.getElementById(divID).innerHTML;
            //Get the HTML of whole page
            var oldPage = document.body.innerHTML;

            //Reset the page's HTML with div's HTML only
            document.body.innerHTML = 
              "<html><head><title> </title></head><body>" + 
              divElements + "</body>";

            //Print Page
            window.print();

            //Restore orignal HTML
            document.body.innerHTML = oldPage;    
        }
    </script>


</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <div id="logo" class="" style = "margin-top: 20px;">
          <!-- <a href="index.php">Adamawa<small>Sunshine</small></a> -->
          <a href="index.php"><img src="img/logo.png" alt="Sunshine Express"/></a>
      </div>
      
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <li class="nav-item">
        <a class="nav-link" href="profile.php">
          <i class="fas fa-fw fa-user"></i>
          <span>Profile</span></a>
      </li>
    <?php 
      if($_SESSION['role'] === "customer"){ ?>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="mytickets.php">
          <i class="fas fa-fw fa-credit-card"></i>
          <span>My tickets</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="search-journey.php">
          <i class="fas fa-fw fa-bus"></i>
          <span>Search Journey</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="book-bus.php">
          <i class="fas fa-fw fa-globe"></i>
          <span>Book Bus</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="book-bus.php">
          <i class="fas fa-fw fa-globe"></i>
          <span>Give Feedback</span></a>
      </li>

      <?php
      } 
      if($_SESSION['role'] === "admin"){ ?>


      <li class="nav-item">
        <a class="nav-link" href="vehicles.php">
          <i class="fas fa-fw fa-bus"></i>
          <span>Manage Buses</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="journey.php">
          <i class="fas fa-fw fa-globe"></i>
          <span>Manage Journey</span></a>
      </li>
<!--       <li class="nav-item">
        <a class="nav-link" href="cbooking.php">
          <i class="fas fa-fw fa-edit"></i>
          <span>Manage Routes</span></a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link" href="manage-booking.php">
          <i class="fas fa-fw fa-credit-card"></i>
          <span>Manage Booking</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="manage-review.php">
          <i class="fas fa-fw fa-comments"></i>
          <span>Manage Feedbacks</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="manage-users.php">
          <i class="fas fa-fw fa-users"></i>
          <span>Manage Users</span></a>
      </li>

      <?php } ?>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
      <li class="nav-item">
        <a class="nav-link" href="logout.php">
          <i class="fas fa-fw fa-share-square"></i>
          <span>Logout</span></a>
      </li>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->