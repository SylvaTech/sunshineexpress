<?php
	session_Start();
	include_once('../includes/init.php');

	/**
	* Processes any form submitted for journey scheduling
	*/
	if(isset($_POST['shed_journey'])){
		$bus_type = $_POST['bus_type'];
		$from = $_POST['from_location'];
		$to = $_POST['to_destination'];
		$interstate = $_POST['interstate'];
		$departure = $_POST['departure_time'];
		$arrival = $_POST['arrival_time'];
		$fare = $_POST['fare'];
		$status = $_POST['status'];
		
		$query = ("INSERT INTO ". DB_PREFIX. "journeys(from_destination,to_destination, interstate,bus_type,departure_time,est_arrival_time,fare,journey_status)VALUES(:from,:to,:interstate,:busType,:depTime,:arrTime,:fare,:jonyStatus)");

		try{
			$stmt = $con->prepare($query);

			$stmt->bindValue(":from", $from);
			$stmt->bindValue(":to", $to);
			$stmt->bindValue(":interstate", $interstate);
			$stmt->bindValue(":busType", $bus_type);
			$stmt->bindValue(":depTime", $departure);
			$stmt->bindValue(":arrTime", $arrival);
			$stmt->bindValue(":fare", $fare);
			$stmt->bindValue(":jonyStatus", $status);

			if($stmt->execute()){

				$_SESSION['success'] = "Journey Scheduled";
				redirect('../journey.php');
			}

		}
		catch(Exception $ex){
			$_SESSION['error'] = $ex->getMessage();
			redirect('../journey.php');
		}
	}

?>