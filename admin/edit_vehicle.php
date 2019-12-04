<?php 
include "includes/header.php"; 
include "includes/inner-header.php";
require_once('Models/Vehicle.class.php');
require_once('Models/Driver.class.php');

//Delete Vehicle
 if (isset($_GET['de'])){
    $id = $_GET['de'];
    $query = "DELETE FROM ".DB_PREFIX."vehicles WHERE id = :id";
    $stmt = $con->prepare($query);
    try{
      $stmt->bindValue(':id',$id);
      if($stmt->execute()){
        $_SESSION['success'] = "Vehicle removed";
        redirect('vehicles.php');
      }
    }
    catch(Exception $ex){
      $_SESSION['error'] = $ex->getMessage();
      redirect("vehicles.php");
    }
  }

if(isset($_GET['ed'])){
  $id = $_GET['ed'];
  
  $vehicle = new Vehicle();
  $theVehicle = $vehicle->getVehicleById($id);
  
  if(is_array($theVehicle)){
    foreach($theVehicle as $veh){
      $veh_num = $veh['vehicle_number'];
      $veh_type = $veh['vehicle_type'];
      $veh_cap = $veh['vehicle_capacity'];
      $veh_status = $veh['vehicle_status'];
      $vehicle_driver = $veh['name'];
      $driver_id = $veh['vehicle_driver'];

      $drivers = Driver::getAllDrivers();

    }
  }
}

?>
      
<div class="card shadow">
  <div class="card-header">
    <h3 class="card-title text-primary head-h2">Edit Vehicle Information</h3>
  </div>
      <form  method = "post" action = "vehicle_handler.php">
      <div class = "row container-fluid card-body">
        <div class="col-md-6">
          <div class="form-group">
            <input type = "hidden" name = "veh_id" value = "<?php echo $id; ?>">
            <span>Vehicle Number:</span>
            <input type="text" class="form-control" name="veh_num" value = "<?php echo $veh_num; ?>" required>
          </div>
          <div class="form-group">
            <span>Vehicle Type:</span>
            <input type="text" class="form-control" name="veh_type" value = "<?php echo $veh_type; ?>" required>
          </div> 
          <div class="form-group">
            <span>Total Seats:</span>
            <input type = "number" class="form-control"  name = "veh_cap" value = "<?php echo $veh_cap; ?>" required>
          </div> 
          </div><!-- Closing col-6 -->
          <div class="col-md-6">
            <div class="form-group">
              <span>Driver:</span>
              <select type="select" class="form-control" name="veh_driver" required>
                <option value = "<?php echo isset($driver_id)?$driver_id : '';?>" selected><?php echo isset($vehicle_driver)?$vehicle_driver: 'Select Driver'?></option>
                <?php
                foreach($drivers as $driver){
                  $d_id = $driver['id'];
                  $driver_name = $driver['name'];
                ?>
                <option value = "<?php echo $d_id; ?>"><?php echo $driver_name;?></option>
                
                <?php
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <span>Vehicle Status:</span>
              <select class="form-control" name = "veh_status" required>
                <option value = "<?php echo $veh_status ?>"><?php echo isset($veh_status)?$veh_status:'Change the status of the vehicle' ?></option>
                <option value = "Available">Available</option>
                <option value = "Unavailable">Unavailable</option>
              </select>
            </div>
            <div class="card-footer">
              <a href="vehicles.php" class="btn btn-danger">Cancel</a>
              <button class="btn btn-success" name = "updateVehicle">Update</button>
          </div>
        </div><!-- Closing col-6 -->

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
