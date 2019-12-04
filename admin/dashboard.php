<?php 
  include "includes/header.php"; 
  include "includes/inner-header.php";
  include "Models/Journey.class.php"; 
?>
   
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Available Trips Today</div>

                      <div class="h5 mb-0 font-weight-bold text-gray-800">20</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Number of Happy clients</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">2000+</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>  
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Number of Vehicles</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">30</div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-bus fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Number of registered Customers</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">2300+</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

              <!-- Booking Schedules -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Journey Schedules</h6>
                </div>
                <form action = "" method = "post">
                  <div class="row">
                    <div class="col-md-6 row well">
                      <div class="col-md-8"></div>
                      <div class="col-md-4">
                        <label class = "lead well">Choose Date:</label>
                      </div>
                    </div>
                    <div class="col-md-6 row">
                      <?php 
                        $date = date("Y-m-d");
                        $_SESSION['journey_date'] = $date
                      ?>
                       <div class="col-md-6 well">
                        <input type = "date" min = "<?php echo date('Y-m-d');?>" name = "jonyDate" value="<?php echo isset($_POST['search'])?$_POST['jonyDate']:$date;?>" class = "form-control">
                      </div>
                      <div class="col-md-6">
                        <button class="btn btn-primary" name = "search">Search</button>
                      </div>
                     
                    </div>
                  </div>
              </form>
                <div class="card-body">
                <div class="table-responsive">
                    
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>S/N</th>
                      <th>From</th>
                      <th>To</th>
                      <th>Bus Type</th>                      
                      <th>Journey Date</th>                      
                      <th>Departure Time</th>
                      <th>Estimated Arrival Time</th>
                      <th>Fare</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>S/N</th>
                      <th>From</th>
                      <th>To</th>
                      <th>Bus Type</th>     
                      <th>Journey Date</th>     
                      <th>Departure Time</th>
                      <th>Estimated Arrival Time</th>
                      <th>Fare</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <!-- When the user searches for a date -->
                    <?php
                      if(isset($_POST['search'])){
                        $jony_date = strtotime($_POST['jonyDate']);
                        $today_plus_6 = strtotime('+6 day');
                        if($jony_date<$today_plus_6){
                          $date = $_POST['jonyDate'];
                          $_SESSION['journey_date'] = $date;
                          $journey = new Journey();
                        $journeys = $journey->getAllInterJourneys();
                        //var_dump($journeys);
                        foreach($journeys as $jony){
                          $id = $jony['j_id'];
                          $from = $jony['from_destination'];
                          $to = $jony['to_destination'];
                          $bus_type = $jony['BusType'];
                          $departure = $jony['departure_time'];
                          $departure = date('h:i A', strtotime($departure));
                          $arrival = $jony['est_arrival_time'];
                          $arrival = date('h:i A', strtotime($arrival));
                          $fare = $jony['fare'];
                    ?>
                    <tr>
                      <td><?php echo $id;?></td>
                      <td><?php echo $from; ?></td>
                      <td><?php echo $to; ?></td>
                      <td><?php echo $bus_type; ?></td>
                      <td><?php echo $date; ?></td>
                      <td><?php echo $departure; ?></td>
                      <td><?php echo $arrival; ?></td>
                      <td><?php echo $fare; ?></td>
                      <td><a class="btn btn-success" href="book_bus.php?j=<?php echo $id;?>">Book</a></td>
                      <!-- <td><button class="btn btn-success" data-toggle="modal" data-target="#myModal">Book</button></td> -->
                    </tr>
                    <?php
                        }
                      }
                        else{
                          ?>
                          <tbody>
                            <tr><div class = "alert alert-danger">Sorry no Journey Schedules for this date  yet. Please check later</div></tr>
                          </tbody>
                          <?php
                        }
                      }
                      else{
                    ?>
                    <!-- When Ther is no set date -->
                    <?php
                        $journey = new Journey();
                        $journeys = $journey->getAllInterJourneys();
                        //var_dump($journeys);
                        foreach($journeys as $jony){
                          $id = $jony['j_id'];
                          $from = $jony['from_destination'];
                          $to = $jony['to_destination'];
                          $bus_type = $jony['BusType'];
                          $departure = $jony['departure_time'];
                          $departure = date('h:i A', strtotime($departure));
                          $arrival = $jony['est_arrival_time'];
                          $arrival = date('h:i A', strtotime($arrival));
                          $fare = $jony['fare'];
                    ?>
                    <tr>
                      <td><?php echo $id;?></td>
                      <td><?php echo $from; ?></td>
                      <td><?php echo $to; ?></td>
                      <td><?php echo $bus_type; ?></td>
                      <td><?php echo $date; ?></td>
                      <td><?php echo $departure; ?></td>
                      <td><?php echo $arrival; ?></td>
                      <td><?php echo $fare; ?></td>
                      <td><a class="btn btn-success" href="book_bus.php?j=<?php echo $id;?>">Book</a></td>
                      <!-- <td><button class="btn btn-success" data-toggle="modal" data-target="#myModal">Book</button></td> -->
                    </tr>
                    <?php }}?>
                  </tbody>
                </table>
              </div>
                  
                </div>

          </div>

        </div>
       <!-- /.container-fluid -->
      </div>
        
      <!-- End of Main Content -->

<?php include "includes/footer.php"; ?>
