<?php 
include "includes/header.php"; 
include "includes/inner-header.php";
require_once("Models/Booking.class.php");
$ticket = new Booking();
$user = $_SESSION['id'];
$tickets = $ticket->getAllUserBookings($user);
// var_dump($tickets);
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">My Tickets</h1>
          <p class="mb-4"></p>


          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tickets Record</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Booking Reference</th> 
                      <th>From </th>
                      <th>To</th>
                      <th>Journey Date</th>
                      <th>Booking Date</th>
                      <th>Seat nos reserved</th>
                      <th>Departure time</th>
                      <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                      foreach($tickets as $theTicket){

                    ?>
                    <tr>
                      <td><?php echo $theTicket['booking_id'];?></td>
                      <td><?php echo $theTicket['from_destination'];?></td>
                      <td><?php echo $theTicket['to_destination'];?></td>
                      <td><?php echo date_format(date_create($theTicket['journey_date']), "jS-M-Y");?></td>
                      <td><?php echo date_format(date_create($theTicket['created_at']), "jS-M-Y H:i A");?></td>
                      
                      <td><?php echo $theTicket['seat_no'];?></td>
                      <td><?php echo date("h:i A", strtotime($theTicket['departure_time']));?></td>
                      <td><a href="reciept.php?bkr=<?php echo $theTicket['booking_id'];?>" class="btn btn-success">Print</a></td>
                      <!-- <td><a href="#" class="btn btn-danger">Cancel </a></td> -->
                    </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php
     include "includes/footer.php"; 

?>