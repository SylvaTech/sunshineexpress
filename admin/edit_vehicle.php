<?php 
include "includes/header.php"; 
include "includes/inner-header.php";
require_once('Models/Vehicle.class.php');

if(isset($_GET['ed'])){
  $id = $_GET['ed'];
  
  $vehicle = new Vehicle();
  $theVehicle = $vehicle->getVehicleById($id);
  
  if(is_array($theVehicle)){
    foreach($theVehicle as $veh){
      $veh_num = $veh['bus_number'];
      $veh_type = $veh['bus_type'];
    }
  }
}

?>
<div class="card shadow">
  <div class="card-header">
    <h3 class="card-title text-primary head-h2">Edit Vehicle Information</h3>
  </div>
      <form  method = "post" action = "controllers/vehicle_controller.php">
      <div class = "row container-fluid card-body">
        <div class="col-md-8">
          <div class="form-group">
            <input type = "hidden" name = "veh_id" value = "<?php echo $id; ?>">
            <span>Bus Number:</span>
            <input type="text" class="form-control" name="veh_num" value = "<?php echo $veh_num; ?>" required>
          </div>
          <div class="form-group">
            <span>Bus Type:</span>
            <input type="text" class="form-control" name="veh_type" value = "<?php echo $veh_type; ?>" required>
          </div> 
          <!-- <div class="form-group">
            <span>Vehicle Type:</span>
            <select class="form-control" name="veh_type" value= "" required>
              <option value="" hidden>Select Vehicle Type</option>
              <?php foreach ($vehicle_types as $vehType){ ?>
                <option value="<?php echo $vehType['bt_id'];?>"><?php echo $vehType['BusType'];?></option>
              <?php
              }
              ?>

            </select>
          </div>  -->

          <div class="card-footer">
            <a href="vehicles.php" class="btn btn-danger">Cancel</a>
            <button class="btn btn-success" name = "updateVehicle">Update</button>
        </div>
        </div><!-- Closing col-8 -->

      </div>
    </div><!-- Closing row -->
  </form>
</div><!-- Closing card shadow -->
    
  </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
</div>
<?php
     include "includes/footer.php"; 
?>
