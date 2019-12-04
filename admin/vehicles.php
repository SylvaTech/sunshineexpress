<?php 
  include "includes/header.php"; 
  include "includes/inner-header.php"; 
  require_once('Models/Vehicle.class.php');
?>
   
        <!-- Project Card Example -->
        <div class="card shadow mb-4">
          <div class="card-header">
            <h2 class="text-primary head-h2">All Vehicles</h2>
            <button class = "btn btn-primary add-btn" data-toggle="modal" data-target="#addModal">Add vehicle</button>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <?php
                $vehicle = new Vehicle();
                $vehicles = $vehicle->getAllVehicles();
              ?>
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Plate Number</th>
                    <th>Total Seat</th>
                    <th>Bus Type</th>
                    <th>Action</th>
                  </tr>
                </thead>

                <tbody>
                  <?php
                  //var_dump($vehicles);
                  foreach($vehicles as $vehicle){
                    // $v_id = $vehicle[];
                    $number = $vehicle['bus_number'];
                    $type = $vehicle['total_seat'];
                    $seat = $vehicle['bus_type'];
                    
                  ?>
                  <tr>
                    <td><?php echo $number; ?></td>
                    <td><?php echo $type; ?></td>
                    <td><?php echo $seat; ?></td>
                    <td>
                      <a href="<?php echo 'edit_vehicle.php?ed='.$v_id; ?>" class="btn btn-primary btn-sm">Edit</a>
                      <button class = "btn btn-sm btn-danger" data-toggle = "modal" data-target = "#deleteModal">Delete</button>
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
  <div id="addModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Add Vehicle</h4>
          </div>
          <div class="modal-body">
          <form  method = "post" action = "vehicle_handler.php">
            <div class="container row">
              <div class="col-md-12">
                <div class="form-group">
                    <span>Vehicle Number:</span>
                    <input type="text" class="form-control form-control-user" name="veh_number" value = "" required>
                  </div>
                  <div class="form-group">
                    <span>Vehicle Type:</span>
                    <input type="text" class="form-control form-control-user" name="veh_type" value= "" required>
                  </div> 
                  <div class="form-group">
                    <span>Total Seats:</span>
                    <input type = "number" min = "5" class="form-control form-control-user"  name = "veh_cap" required>
                  </div> 
                  <div class="form-group">
                    <span>Vehicle's Driver:</span>
                    <select type="select" class="form-control form-control-user" name="veh_driver" required>
                      <option value = "" disabled selected>Select Driver</option>
                      <?php foreach($drivers as $driver){
                        $driver_id = $driver['id'];
                        $driver_name = $driver['name'];
                      ?>
                      <option value = "<?php echo $driver_id; ?>"><?php echo $driver_name; ?></option>
                      
                      <?php
                      }
                      ?>
                      
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
              <button class="btn btn-success" name = "addVehicle">Save</button>
            </div>
          </div>
        </form>

  </div>
</div>
<!-- End of addModal -->

  <div id="deleteModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Delete bus details</h4>
      </div>
      
      <div class="modal-body">
        <h5>Are you sure you want to remove this vehicle?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
        <a href="<?php echo 'edit_driver.php?de='.$d_id; ?>" class="btn btn-success" onclick="myFunction1()">Delete</a>
      </div>
    </div>

  </div>
</div>

      </div>
        
      <!-- End of Main Content -->

<?php include "includes/footer.php"; ?>
