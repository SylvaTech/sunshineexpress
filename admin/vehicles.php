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
                $vehicle_types = $vehicle->getAllVehicleTypes();
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
                  // var_dump($vehicles);
                  foreach($vehicles as $vehicle){
                    $v_id = $vehicle['id'];
                    $number = $vehicle['bus_number'];
                    $type = $vehicle['TotalSeat'];
                    $seat = $vehicle['BusType'];
                    
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
          <form  method = "post" action = "controllers/vehicle_controller.php">
            <div class="container row">
              <div class="col-md-12">
                <div class="form-group">
                    <span>Vehicle Number:</span>
                    <input type="text" class="form-control form-control-user" name="veh_number" value = "" required>
                  </div>
                  <div class="form-group">
                    <span>Vehicle Type:</span>
                    <select class="form-control" name="veh_type" value= "" required>
                      <option value="" hidden>Select Vehicle Type</option>
                      <?php foreach ($vehicle_types as $vehType){ ?>
                        <option value="<?php echo $vehType['bt_id'];?>"><?php echo $vehType['BusType'];?></option>
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
        <a href="<?php echo 'controllers/vehicle_controller.php?de='.$v_id; ?>" class="btn btn-success" onclick="myFunction1()">Delete</a>
      </div>
    </div>

  </div>
</div>

      </div>
        
      <!-- End of Main Content -->

<?php include "includes/footer.php"; ?>
