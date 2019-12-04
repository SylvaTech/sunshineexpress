<?php 
include "includes/header.php"; 
include "includes/inner-header.php";

?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Manage Booking</h1>
          <p class="mb-4"></p>

                      <!-- Earnings (Monthly) Card Example -->
<!--             <div class="mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <form>
                          <div class="container row">
                            <div class="col-md-6">
                              <input type="hidden" class="form-control form-control-user" name="id" required>
                              <div class="form-group">
                                  <span>Bus Number:</span>
                                  <input type="text" class="form-control form-control-user" name="bus-number" required>
                                </div>
                                <input type="hidden" name="country" id="countryId" value="NG"/>
                                <div class="form-group">
                                  <span>From:</span>
                                <select name="from" class="states order-alpha form-control form-control-user" id="stateId">
                                    <option value="">From</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <span>To:</span>
                                <select name="to" class="states order-alpha form-control form-control-user" id="stateId">
                                    <option value="">To</option>
                                </select>
                              </div>
                                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
                                <script src="//geodata.solutions/includes/state.js"></script>
                                <div class="form-group">
                                  <span>Journey Date:</span>
                                  <input type="date" class="form-control form-control-user" name="name" required>
                                </div> 
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <span>Departure Time:</span>
                                <input type="time" class="form-control form-control-user" name="name" required>
                              </div>
                              <div class="form-group">
                                  <span>Estimated Arival Time</span>
                                  <input type="time" class="form-control form-control-user" name="name" required>
                                </div>
                                <div class="form-group">
                                  <span>Fare:</span>
                                  <input type="money" class="form-control form-control-user" name="name" required>
                                </div>  
                            </div>
                        </div>
                        </form> 
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>

                  </div>
                  <hr>
                  <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Submit</a>
                </div>
              </div>
            </div> -->


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
                      <th>Bus Number</th> 
                      <th>From </th>
                      <th>To</th>
                      <th>Journey Date</th>
                      <th>Booking Date</th>
                      <th>Seat No booked</th>
                      <th>Departure Time</th>
                      <th>Fare</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>

                  <tbody>
                    <tr>
                      <td>Mrs. Bello</td>
                      <td>ADM 1234 YLA</td>
                      <td>Abuja</td>
                      <td>Lagos</td>
                      <td>10-05-2019</td>
                      <td>05-05-2019</td>
                      <td>5</td>
                      <td>10:00 PM</td>
                      <td>₦8,000</td>
                      <td><button class="btn btn-info" data-toggle="modal" data-target="#myModal">update</button>
                      </td>
                      <td>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#myModal1">Cancel</button>
                      </td>
                    </tr>

                    <tr>
                      <td>Mrs. Bello</td>
                      <td>ADM 1234 YLA</td>
                      <td>Abuja</td>
                      <td>Lagos</td>
                      <td>10-05-2019</td>
                      <td>05-05-2019</td>
                      <td>5</td>
                      <td>10:00 PM</td>
                      <td>₦8,000</td>
                      <td><button class="btn btn-info" data-toggle="modal" data-target="#myModal">update</button>
                      </td>
                      <td>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#myModal1">Cancel</button>
                      </td>
                    </tr>

                    <tr>
                      <td>Mrs. Bello</td>
                      <td>ADM 1234 YLA</td>
                      <td>Abuja</td>
                      <td>Lagos</td>
                      <td>10-05-2019</td>
                      <td>05-05-2019</td>
                      <td>5</td>
                      <td>10:00 PM</td>
                      <td>₦8,000</td>
                      <td><button class="btn btn-info" data-toggle="modal" data-target="#myModal">update</button>
                      </td>
                      <td>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#myModal1">Cancel</button>
                      </td>
                    </tr>

                    <tr>
                      <td>Mrs. Bello</td>
                      <td>ADM 1234 YLA</td>
                      <td>Abuja</td>
                      <td>Lagos</td>
                      <td>10-05-2019</td>
                      <td>05-05-2019</td>
                      <td>5</td>
                      <td>10:00 PM</td>
                      <td>₦8,000</td>
                      <td><button class="btn btn-info" data-toggle="modal" data-target="#myModal">update</button>
                      </td>
                      <td>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#myModal1">Cancel</button>
                      </td>
                    </tr>

                    <tr>
                      <td>Mrs. Bello</td>
                      <td>ADM 1234 YLA</td>
                      <td>Abuja</td>
                      <td>Lagos</td>
                      <td>10-05-2019</td>
                      <td>05-05-2019</td>
                      <td>5</td>
                      <td>10:00 PM</td>
                      <td>₦8,000</td>
                      <td><button class="btn btn-info" data-toggle="modal" data-target="#myModal">update</button>
                      </td>
                      <td>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#myModal1">Cancel</button>
                      </td>
                    </tr>
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