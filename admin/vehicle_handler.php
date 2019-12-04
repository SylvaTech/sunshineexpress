<?php
	session_Start();
	include_once('includes/init.php');
	/**  
	*	This file processes forms related to vehicle
	**/
	//Update Vehicle
	if(isset($_POST['updateVehicle'])){
		$vehicle_id			= $_POST['veh_id'];
		$vehicle_number		= $_POST['veh_num'];
		$vehicle_type 		= $_POST['veh_type'];
		$vehicle_capacity 	= $_POST['veh_cap']; 
		$vehicle_driver		= $_POST['veh_driver']; 
		$vehicle_status		= $_POST['veh_status']; 

		$query = "UPDATE ".DB_PREFIX."vehicles SET vehicle_number = :v_num,vehicle_type = :v_type,vehicle_capacity = :v_cap,vehicle_driver = :v_dri,vehicle_status = :v_sta WHERE id = :id";
		try{
			$stmt = $con->prepare($query);
			$stmt -> bindValue(":id",$vehicle_id);
			$stmt -> bindValue(":v_num",$vehicle_number);
			$stmt -> bindValue(":v_type",$vehicle_type);
			$stmt -> bindValue(":v_cap",$vehicle_capacity);
			$stmt -> bindValue(":v_dri",$vehicle_driver);
			$stmt -> bindValue(":v_sta",$vehicle_status);
			if($stmt->execute()){
				$_SESSION['success'] = "Vehicle information updated Successfully";
				redirect('vehicles.php');	
			}
		}
		catch(Exception $ex){
			$_SESSION['error'] = $ex->getMessage();
			redirect("vehicles.php");
		}
	}
	//Add Vehicle
	if(isset($_POST['addVehicle'])){
		$vehicle_number = $_POST['veh_number'];
		$vehicle_type = $_POST['veh_type'];
		$total_seat = $_POST['veh_cap']; 
		$vehicle_driver = $_POST['veh_driver']; 
		$status = "Available";

		$query = "INSERT INTO " .DB_PREFIX."vehicles(vehicle_number,vehicle_type,vehicle_capacity,vehicle_driver,vehicle_status) VALUES(:number,:type,:seat,:driver,:status)";
		try{
		
			$stmt = $con->prepare($query);

			$stmt->bindValue(":number", $vehicle_number);		
			$stmt->bindValue(":type", $vehicle_type);		
			$stmt->bindValue(":seat", $total_seat);		
			$stmt->bindValue(":driver", $vehicle_driver);		
			$stmt->bindValue(":status", $status);		
						
			if($stmt->execute()){

				$_SESSION['success'] = "Vehicle Added Successfully";
				redirect('vehicles.php');
			}
			else{
				$_SESSION['error'] = "Unable to add vehicle";
				redirect("vehicles.php");
			}

		}
		catch(Exception $ex){
			$_SESSION['error'] = "Unable to add vehicle Ensure that the plate number is not a duplicate of another";
			redirect("vehicles.php");
		}
		
	}
	
?>
