<?php
  class Journey{

    //Get all interstate Journeys
    function getAllInterJourneys(){
      global $con;
      $inter = "1";
     // $query =  "SELECT * FROM ". DB_PREFIX. "journeys WHERE j.bus_type = interstate = :inter AND journey_status = :inter";
      $query = "SELECT ". DB_PREFIX. "journeys.*,". DB_PREFIX. "bus_types.* FROM ". DB_PREFIX. "journeys INNER JOIN ". DB_PREFIX. "bus_types ON ". DB_PREFIX."journeys.bus_type = ". DB_PREFIX. "bus_types.bt_id ";
      try{
        $stmt = $con->prepare($query);

        $stmt->bindValue(":inter", $inter);
        
        $stmt->execute();
        $journeys = $stmt->fetchAll();

        if(count($journeys)>=1){
          return $journeys;
        }
      }
      catch(Exception $ex){
        $_SESSION['error'] = $ex->getMessage();
        // redirect('dashboard.php');
      }
    }//Get all interstate Journeys
    function getJouneyDetails($j_id){
      global $con;
      $inter = "1";
     // $query =  "SELECT * FROM ". DB_PREFIX. "journeys j". DB_PREFIX. "bus_types b WHERE j.bus_type = interstate = :inter AND journey_status = :inter";
      $query = "SELECT ". DB_PREFIX. "journeys.*,". DB_PREFIX. "bus_types.* FROM ". DB_PREFIX. "journeys INNER JOIN ". DB_PREFIX. "bus_types ON ". DB_PREFIX."journeys.bus_type = ". DB_PREFIX."bus_types.bt_id WHERE j_id = :id AND ". DB_PREFIX. "journeys.j_id = :id";
      try{
        $stmt = $con->prepare($query);

        $stmt->bindValue(":id", $j_id);
        
        $stmt->execute();
        $journey = $stmt->fetchAll();

        if(count($journey)>=1){
          return $journey;
        }
      }
      catch(Exception $ex){
        $_SESSION['error'] = $ex->getMessage();
        // redirect('dashboard.php');
      }
    }

  }//Ending class
?>