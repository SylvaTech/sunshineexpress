<?php 
require_once "includes/header.php"; 
require_once "includes/inner-header.php";
require_once "Models/Vehicle.class.php";
require_once "Models/CoveredRoutes.class.php";
require_once("Models/Journey.class.php");
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Manage Journey</h1>
          <p class="mb-4"></p>
            <div class="mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-header">
                  <h4>Create new journey schedule</h4>
                </div>
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <form action = "controllers/journey_controller.php" method = "post">
                          <div class="container row">
                            <div class="col-md-6">
                              <div class="form-group">
                                  <?php
                                  $vehicle = new Vehicle();
                                  $vehicleTypes = $vehicle->getAllVehicleTypes();
                                  $routesCovered = new CoveredRoutes();
                                  $sunhineRoutes = $routesCovered->getAllRoutes();
                                  //var_dump($routes);
                                  ?>
                                  <span>Bus Type:</span>
                                  <select class="form-control form-control-user" name="bus_type" required>
                                    <option value = "" hidden>Select Bus Type</option>
                                    <?php foreach($vehicleTypes as $vehType){ ?>
                                      <option value = "<?php echo $vehType['bt_id']?>" ><?php echo $vehType['BusType']?></option>
                                    <?php }?>
                                  </select>

                                </div>
                                <div class="form-group">
                                  <span>From:</span>
                                <select class = "form-control" name = "from_location" required>
                                    <option value="" hidden>From</option>
                                    <option value = "Yola">Yola</option>
                                </select>
                              </div>
                              
                              <div class="form-group">
                                <span>To:</span>
                                <select class = "form-control" name = "to_destination" editable="true" required>
                                    <option value="" hidden>To</option>
                                    <?php foreach($sunhineRoutes as $sun_routes){ ?>
                                    <option value="<?php echo $sun_routes['place_name'];?>"><?php echo $sun_routes['place_name'];?></option>
                                  <?php }?> 
                                </select>
                              </div>
                              <div class="form-group">
                                <span>Interstate:</span>
                                <input type="hidden" id = "notInterstate" checked value = "0" name="interstate">
                                <input type="checkbox" id = "interstate" value = "1" name="interstate">
                              </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <span>Departure Time:</span>
                                <input type="time" class="form-control form-control-user" name="departure_time" required>
                              </div>
                              <div class="form-group">
                                  <span>Estimated Arival Time</span>
                                  <input type="time" class="form-control form-control-user" name="arrival_time" required>
                                </div>
                                <div class="form-group">
                                  <span>Fare:</span>
                                  <input type="number" min = "500" class="form-control form-control-user" name="fare" required>
                                </div>  
                                <div class="form-group">
                                  <span>Available:</span>
                                  <input type="hidden" name="status" value = "0" id = "notAvailable">
                                  <input type="checkbox" name="status" value = "1" id = "available">
                                  <!-- <label for = "status">Not Available</label>
                                  <script type = "text/JavaScript">
                                    var stat = document.getElementByName("status");
                                    var info = document.getElementById("status");
                                    // info.Value= "Not Available";
                                    stat.addEventListener('click',function(evt){
                                      if(stat.checked){
                                        info.value = "Available";
                                      }

                                    },false);

                                    
                                  </script> -->
                                </div>  
                            </div>
                        </div>
                         <hr>
                        <input type = "submit"  name = "shed_journey" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" value = "Submit">
                        <button type = "reset" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">Reset</button>
                      </form> 
                    </div>
                  </div>
                 
                </div>
              </div>
            </div>


          <!-- Interstate Routes -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Interstate Schedule</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>S/N</th>
                      <th>From</th>
                      <th>To</th>
                      <th>Bus Type</th>                      
                      <th>Departure Time</th>
                      <th>Estimated Arrival Time</th>
                      <th>Fare</th>
                      <th>Action</th>
                      <th>Action</th>
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
                      <td><a class="btn btn-primary btn-sm" href="journey.php?j=<?php echo $id;?>">Edit</a></td>
                      <td><a class="btn btn-danger btn-sm" href="journey.php?jd=<?php echo $id;?>">Delete</a></td>
                      
                    </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        <!-- Intrastate Routes -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Intrastate Schedule</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>S/N</th>
                      <th>From</th>
                      <th>To</th>
                      <th>Bus Type</th>                      
                      <th>Departure Time</th>
                      <th>Estimated Arrival Time</th>
                      <th>Fare</th>
                      <th>Action</th>
                      <th>Action</th>
                    </tr>
                  </thead>


                  <tbody>
                    <?php
                      $intra_joni = new Journey();
                      $intrastates = $intra_joni->getAllIntraJourneys();
                      $sn = 0;
                      foreach($intrastates as $intra){
                        $sn++;
                        $id = $intra['j_id'];
                        $from = $intra['from_destination'];
                        $to = $intra['to_destination'];
                        $bus_type = $intra['BusType'];
                        $departure = $intra['departure_time'];
                        $departure = date('h:i A', strtotime($departure));
                        $arrival = $intra['est_arrival_time'];
                        $arrival = date('h:i A', strtotime($arrival));
                        $fare = $intra['fare'];
                    ?>
                    <tr>
                      <td><?php echo $sn;?></td>
                      <td><?php echo $from; ?></td>
                      <td><?php echo $to; ?></td>
                      <td><?php echo $bus_type; ?></td>
                      <td><?php echo $departure; ?></td>
                      <td><?php echo $arrival; ?></td>
                      <td><?php echo $fare; ?></td>
                      <td><a class="btn btn-primary btn-sm" href="journey.php?j=<?php echo $id;?>">Edit</a></td>
                      <td><a class="btn btn-danger btn-sm" href="journey.php?jd=<?php echo $id;?>">Delete</a></td>
                      
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