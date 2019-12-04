<?php
  class Booking
  {
    //Get Available Seats for a journey
    function getBookedSeats($j_id,$j_date){
    	global $con;
    	$payment_status = "paid";
    	$seats = array();
    	$query = "SELECT journey_id, seat_no, TotalSeat FROM booking_details bd 
    			INNER JOIN sunshine_journeys sj 
    			ON bd.journey_id = sj.j_id
    			INNER JOIN sunshine_bus_types sbt ON sj.bus_type = sbt.bt_id
    			WHERE bd.journey_id = :j_id AND bd.journey_date = :j_date AND bd.payment_status = :paid ORDER BY bd.seat_no ASC  ";
    	try{
	        $stmt = $con->prepare($query);

	        $stmt->bindValue(":j_id", $j_id);
	        $stmt->bindValue(":j_date", $j_date);
	        $stmt->bindValue(":paid", $payment_status);
	        
	        $stmt->execute();
	        $seats = $stmt->fetchAll();
	        $booked_seats =array();
	        $i=0;
	        foreach($seats as $seat){
	        	$booked_seats[] = $seat['seat_no'];
	        }
	        
	        return $booked_seats;
	    }
	    catch(Exception $e){
	    	echo $e->getMessage();
	    }
    }
    /*Save booking details before proceeding to payment*/
    function saveBookingDetails($bookingId, $pName,$pGender,$pPhone,$pAddress,$trxnEmail,$nokName,$nokPhone,$nokAddress,$jId,$jDate,$seatNo,$paymentStatus,$createdAt){
    	global $con;
    	$query = ("INSERT INTO booking_details(booking_id,passenger_name,gender,phone,address,email,nok_name,nok_phone,nok_address,journey_id,journey_date,seat_no,payment_status,created_at) VALUES(:booking_id,:passenger_name,:gender,:phone,:address,:email,:nok_name,:nok_phone,:nok_address,:journey_id,:journey_date,:seat_no,:payment_status,:created_at)");
    	try{
			$stmt = $con->prepare($query);

			$stmt->bindValue(":booking_id", $bookingId);
			$stmt->bindValue(":passenger_name", $pName);
			$stmt->bindValue(":gender", $pGender);
			$stmt->bindValue(":phone", $pPhone);
			$stmt->bindValue(":address", $pAddress);
			$stmt->bindValue(":email", $trxnEmail);
			$stmt->bindValue(":nok_name", $nokName);
			$stmt->bindValue(":nok_phone", $nokPhone);
			$stmt->bindValue(":nok_address", $nokAddress);
			$stmt->bindValue(":journey_id", $jId);
			$stmt->bindValue(":journey_date", $jDate);
			$stmt->bindValue(":seat_no", $seatNo);
			$stmt->bindValue(":payment_status", $paymentStatus);
			$stmt->bindValue(":created_at", $createdAt);
			$stmt->execute();

		}
		catch(Exception $ex){
			$_SESSION['error'] = $ex->getMessage();
			// redirect('../book.php');
		}

    }
    function getBookingDetails($bid){
    	global $con;
    	$query = "SELECT booking_details.*, sunshine_journeys.* FROM booking_details INNER JOIN sunshine_journeys ON booking_details.journey_id = sunshine_journeys.j_id WHERE booking_id = :bid";
    	try{
	        $stmt = $con->prepare($query);

	        $stmt->bindValue(":bid", $bid);
	        if($stmt->execute()){
		        $details = $stmt->fetchAll();
		        $booking_info = array();
	        }
	        foreach($details as $detail){
	        	$booking_info['pname'] = $detail['passenger_name']; 
	        	$booking_info['jdate'] = $detail['journey_date']; 
	        	$booking_info['seatNo'] = $detail['seat_no']; 
	        	$booking_info['from'] = $detail['from_destination']; 
	        	$booking_info['to'] = $detail['to_destination']; 
	        	$booking_info['dep_time'] = $detail['departure_time']; 
	        	$booking_info['arr_time'] = $detail['est_arrival_time']; 
	        	$booking_info['fare'] = $detail['fare']; 
	        }
	        
	        return $booking_info;
	    }
	    catch(Exception $e){
	    	echo $e->getMessage();
	    }

    }
    function updateIfPaid($bid,$trn_ref){
    	global $con;
    	$payment_status = "paid";
    	$trxn_time = date("Y-m-d H:i:s");
    	$query = "UPDATE booking_details SET payment_status = :payment_status, updated_at = :trxn_time, transaction_ref = :trn_ref WHERE booking_id = :bid";
    	try{
	        $stmt = $con->prepare($query);

	        $stmt->bindValue(":payment_status", $payment_status);
	        $stmt->bindValue(":trn_ref", $trn_ref);
	        $stmt->bindValue(":trxn_time", $trxn_time);
	        $stmt->bindValue(":bid", $bid);
	        if($stmt->execute()){
		        return true;
	        }
	    }
	    catch(Exception $e){
	    	echo $e->getMessage();
	    }

    }

  }