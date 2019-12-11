<?php
	session_Start();
	include_once('../includes/init.php');
	/**  
	*	This file processes forms related to vehicle
	**/
	//Update Vehicle
	if(isset($_POST['updateVehicle'])){
		$vehicle_id			= $_POST['veh_id'];
		$vehicle_number		= $_POST['veh_num'];
		$vehicle_type 		= $_POST['veh_type'];
		$updated = date("Y-m-d H:i:s");
		
		$query = "UPDATE ".DB_PREFIX."buses SET bus_number = :v_num,bus_type = :v_type,updated_at = :updated WHERE id = :id";
		try{
			$stmt = $con->prepare($query);
			$stmt -> bindValue(":updated",$updated);
			$stmt -> bindValue(":id",$vehicle_id);
			$stmt -> bindValue(":v_num",$vehicle_number);
			$stmt -> bindValue(":v_type",$vehicle_type);
			if($stmt->execute()){
				$_SESSION['success'] = "Bus information updated Successfully";
				redirect('../vehicles.php');	
			}
		}
		catch(Exception $ex){
			$_SESSION['error'] = $ex->getMessage();
			redirect("../vehicles.php");
		}
	}
	//Add Vehicle
	if(isset($_POST['addVehicle'])){
		$vehicle_number = $_POST['veh_number'];
		$vehicle_type = $_POST['veh_type'];
		$date = date("Y-m-d");

		$query = "INSERT INTO " .DB_PREFIX."buses(bus_number,bus_type,created_at) VALUES(:number,:type,:date_added)";
		try{
		
			$stmt = $con->prepare($query);

			$stmt->bindValue(":number", $vehicle_number);		
			$stmt->bindValue(":type", $vehicle_type);		
			$stmt->bindValue(":date_added", $date);		
									
			if($stmt->execute()){

				$_SESSION['success'] = "Vehicle Added Successfully";
				redirect('../vehicles.php');
			}
			else{
				$_SESSION['error'] = "Unable to add vehicle";
				redirect("../vehicles.php");
			}

		}
		catch(Exception $ex){
			$_SESSION['error'] = "Unable to add vehicle Ensure that the plate number is not a duplicate of another";
			redirect("vehicles.php");
		}
		
	}
	//Delete Vehicle
	if (isset($_GET['de'])){
		$id = $_GET['de'];
		$datetime = date("Y-m-d H:i:s");
		$query = "UPDATE ".DB_PREFIX."buses SET deleted_at = :deleted_at WHERE id = :id";
		$stmt = $con->prepare($query);
		try{
		  $stmt->bindValue(':deleted_at',$datetime);
		  $stmt->bindValue(':id',$id);
		  if($stmt->execute()){
		    $_SESSION['success'] = "Bus removed";
		    redirect('../vehicles.php');
		  }
		}
		catch(Exception $ex){
		  $_SESSION['error'] = $ex->getMessage();
		  redirect("../vehicles.php");
		}
	}

?>
