<?php
  class Vehicle{

    //Get Vehicle by id
    function getVehicleById($id){
      global $con;
     $query =  "SELECT * FROM ". DB_PREFIX. "buses WHERE id = :id";
    // $query =  "SELECT * FROM ". DB_PREFIX. "vehicles where id = :id";

    try{
      $stmt = $con->prepare($query);

      $stmt->bindValue(":id", $id);
      
      $stmt->execute();
      $vehicles = $stmt->fetchAll();

      if(count($vehicles)>=1){
        return $vehicles;
      }

    }
    catch(Exception $ex){
      $_SESSION['error'] = $ex->getMessage();
      redirect('vehicles.php');
    }
  }

    /*
    * Get all Vehicles
    */
    public function getAllVehicles(){
      global $con;
      $vehicles = array();

      $query = "SELECT * FROM ".DB_PREFIX."buses";
      //$query = "SELECT * FROM ".DB_PREFIX."vehicles";

      try{
        $stmt = $con->prepare($query);
        $stmt->execute();
        $vehicles = $stmt->fetchAll();
      }
      catch(Exception $ex){
        echo errorMessage($ex->getMessage());
      }
      return $vehicles;
    }

    /*
    * Get all Vehicle types
    */
    public function getAllVehicleTypes(){
      global $con;
      $vehicles = array();

      $query = "SELECT * FROM ".DB_PREFIX."bus_types";
      
      try{
        $stmt = $con->prepare($query);
        $stmt->execute();
        $vehicles = $stmt->fetchAll();
      }
      catch(Exception $ex){
        echo errorMessage($ex->getMessage());
      }
      return $vehicles;
    }

  }

?>