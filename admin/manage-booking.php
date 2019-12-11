<?php 
include "includes/header.php"; 
include "includes/inner-header.php";
require_once("Models/Booking.class.php");

$booking = new Booking();
$bookings = $booking->getAllBookings();
// var_dump($bookings);
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Manage Booking</h1>
          <p class="mb-4"></p>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Booking Records</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Passenger Name</th>
                      <th>Bus Type</th> 
                      <th>From </th>
                      <th>To</th>
                      <th>Journey Date</th>
                      <th>Booked On</th>
                      <th>Seat No booked</th>
                      <th>Departure Time</th>
                      <th>Fare(&#8358;)</th>
                      <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                      foreach($bookings as $booked){
                    ?>
                    <tr>
                      <td><?php echo $booked['passenger_name'];?></td>
                      <td><?php echo $booked['BusType'];?></td>
                      <td><?php echo $booked['from_destination'];?></td>
                      <td><?php echo $booked['to_destination'];?></td>
                      <td><?php echo date_format(date_create($booked['journey_date']), "jS-M-Y");?></td>
                      <td><?php echo date_format(date_create($booked['created_at']), "jS-M-Y H:i A");?></td>
                      <td><?php echo $booked['seat_no'];?></td>
                      <td><?php echo date("h:i A", strtotime($booked['departure_time']));?></td>
                      <td><?php echo number_format($booked['fare']);?></td>
                      <td>
                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">update</button>
                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal1">Cancel</button>
                      </td>
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

              <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit booking details</h4>
      </div>
      
      <div class="modal-body">
        <form>
            <div class="container row">
              <div class="col-md-6">
                <div class="form-group">
                    <span>Bus Number:</span>
                    <input type="text" class="form-control form-control-user" name="name" value="TLB-1" required>
                  </div>
                  <div class="form-group">
                    <span>Departure Time:</span>
                    <input type="time" class="form-control form-control-user" name="name" value="Nnamdi Azikiwe" required>
                  </div>  
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                    <span>Fare:</span>
                    <input type="text" class="form-control form-control-user" name="name" value="₦6,000" required>
                  </div>
                  <div class="form-group">
                  <span>Number of seats:</span>
                  <input name="seat" class=" order-alpha form-control form-control-user" value="8">
                </div>
              </div>
          </div>
          </form> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button class="btn btn-success" onclick="myFunction()">Update</button>
      </div>
    </div>

  </div>
</div>

        <div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Delete bus details</h4>
      </div>
      
      <div class="modal-body">
        <p>
          Are your sure you want to cancel this booking request?
        </p> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        <button class="btn btn-success" onclick="myFunction1()">Yes</button>
      </div>
    </div>

  </div>
</div>

      <script>
function myFunction() {
  alert("Record updated successfully!");
  window.location.href = 'buses.php';
}

function myFunction1() {
  alert("Booking Cancelled successfully!");
  window.location.href = 'buses.php';
}
</script>

<?php
     include "includes/footer.php"; 

?>