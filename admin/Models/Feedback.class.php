<?php
  class Feedback
  {
  	function getAllFeedBacks(){
    	global $con;
    	$query = "SELECT * FROM feedbacks";
    	try{
	        $stmt = $con->prepare($query);
	        if($stmt->execute()){
		        $feedbacks = $stmt->fetchAll();
		    }
	        	        
	        return $feedbacks;
	    }
	    catch(Exception $e){
	    	echo $e->getMessage();
	    }
    }
}