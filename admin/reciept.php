<?php 
include "includes/header.php"; 
include "includes/inner-header.php"; 
require_once('Models/Journey.class.php');
require_once('Models/Booking.class.php');
  
if(isset($_GET['tf']) && isset($_GET['ver'])) {
  $verifier = $_GET['ver'];
  $trans_ref = $_GET['tf'];
  $jid = $_GET['jid'];
  $booking_id = $_GET['bid'];
  //Get all details of the journey from booking details
  // Update status to paid and splash the details on the table
  

  $bookingInfo = new Booking();
  $updated = $bookingInfo->updateIfPaid($booking_id,$trans_ref);
  if($updated == true){
  $b_details = $bookingInfo->getBookingDetails($booking_id);
  foreach($b_details as $theDetails){
    $pname = $b_details['pname'];
    $jdate = $b_details['jdate'];
    $from = $b_details['from'];
    $to = $b_details['to'];
    $dep_time = $b_details['dep_time'];
    $arr_time = $b_details['arr_time'];
    $seatNo = $b_details['seatNo'];
    $fare = $b_details['fare'];
  }
?>
   
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Your Receipt</h1>
      <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Download Receipt</a> -->
    </div>
    <div class="mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div id = "printee" class="col-md-12 mr-2 ">
            <div class="col-md-4"></div>
              <hr>
              <hr>
              <div class = "row">
                <div class="col-md-6">
                <p>Adamawa Sunshine Express<br>
                Kofare, Yola Adamawa State</p> 
              </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-8"></div>
                    <div class = "col-md-4">
                      <img src="img/logo.png" alt="Sunshine Express Logo"/>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
                <h3>Dear <?php echo $pname;?>,</h3>
              <p>
                Thank you for booking with Adamawa Sunshine Express, please find below the details of your reservation. We wish you an enjoyable trip.
              </p>
              <hr>
              <div class = "row">
                <div class="col-md-6"></div>
                <div class="col-md-6"><p>Booking Reference: <?php echo $booking_id;?></p> <hr></div>
              </div>
                <div class="table-responsive">
                  <table class="table table-bordered" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <td>Passenger</td>
                        <td>Journey Date</td>
                        <td>From</td>
                        <td>To</td>
                        <td>Departure Time</td>
                        <td>Estimated Arrival Time</td>
                        <td>Seat Number</td>
                        <td>Fare(N)</td>
                      </tr>
                      <tbody>
                        <tr>
                          <td><?php echo $pname;?></td>
                          <td><?php echo $jdate;?></td>
                          <td><?php echo $from;?></td>
                          <td><?php echo $to;?></td>
                          <td><?php echo date('h:i A',strtotime($dep_time));?></td>
                          <td><?php echo date('h:i A',strtotime($arr_time));?></td>
                          <td><?php echo $seatNo;?></td>
                          <td><?php echo number_format($fare);?></td>
                        </tr>
                      </tbody>
                    </thead>
                  </table>
                </div>                       
                </div>
                  <div class="col-md-4"></div>
                  <div class = "col-md-2">
                    <button type ="" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" onclick="javascript:printDiv('printee')"><i class="fas fa-print fa-sm text-white-50"></i> Print Reciept</button>
                  </div>
                </div><!-- Content Row -->
      </div>
    </div><!-- Closing card-body -->
  </div>
  </div><!-- /.container-fluid -->
  <?php
  }
}
  else{
  ?>
    <script type = "text/JavaScript">
      window.location = "dashboard.php";
    </script>
  <?php
  }

  ?>
</div><!-- End of Main Content -->

<?php include "includes/footer.php"; ?>

