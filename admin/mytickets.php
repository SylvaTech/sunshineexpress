<?php 
include "includes/header.php"; 
include "includes/inner-header.php";

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
                      <th>Bus Number</th> 
                      <th>From </th>
                      <th>To</th>
                      <th>Journey Date</th>
                      <th>Booking Date</th>
                      <th>Seat nos reserved</th>
                      <th>Departure time</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>

                  <tbody>
                    <tr>
                      <td>ADM 1234 YLA</td>
                      <td>Abuja</td>
                      <td>Lagos</td>
                      <td>10-05-2019</td>
                      <td>05-05-2019</td>
                      <td>5</td>
                      <td>8:00 AM</td>
                      <td><a href="#" class="btn btn-success">view </a></td>
                      <td><a href="#" class="btn btn-danger">Cancel </a></td>
                    </tr>

                    <tr>
                      <td>ABJ 1235 GKR</td>
                      <td>Abuja</td>
                      <td>Lagos</td>
                      <td>10-05-2019</td>
                      <td>05-05-2019</td>
                      <td>5</td>
                      <td>8:00 AM</td>
                      <td><a href="#" class="btn btn-success">view </a></td>
                      <td><a href="#" class="btn btn-danger">Cancel </a></td>
                    </tr>

                    <tr>
                      <td>GWA 1134 ABJ</td>
                      <td>Abuja</td>
                      <td>Lagos</td>
                      <td>10-05-2019</td>
                      <td>05-05-2019</td>
                      <td>5</td>
                      <td>8:00 AM</td>
                      <td><a href="#" class="btn btn-success">view </a></td>
                      <td><a href="#" class="btn btn-danger">Cancel </a></td>
                    </tr>

                    <tr>
                      <td>OYO 1224 YLA</td>
                      <td>Abuja</td>
                      <td>Lagos</td>
                      <td>10-05-2019</td>
                      <td>05-05-2019</td>
                      <td>5</td>
                      <td>8:00 AM</td>
                      <td><a href="#" class="btn btn-success">view </a></td>
                      <td><a href="#" class="btn btn-danger">Cancel </a></td>
                    </tr>

                    <tr>
                      <td>BAU 1674 BWR</td>
                      <td>Abuja</td>
                      <td>Lagos</td>
                      <td>10-05-2019</td>
                      <td>05-05-2019</td>
                      <td>5</td>
                      <td>8:00 AM</td>
                      <td><a href="#" class="btn btn-success">view </a></td>
                      <td><a href="#" class="btn btn-danger">Cancel </a></td>
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

<?php
     include "includes/footer.php"; 

?>