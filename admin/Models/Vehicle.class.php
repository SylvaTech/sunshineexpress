<?php
  class Vehicle{

    //Get Vehicle by id
    function getVehicleById($id){
      global $con;
     $query =  "SELECT ". DB_PREFIX. "buses.*,". DB_PREFIX."bus_types.* FROM sunshine_buses INNER JOIN ". DB_PREFIX. "bus_types ON ". DB_PREFIX."buses.bus_type = ". DB_PREFIX."bus_types.bt_id WHERE " . DB_PREFIX. "buses.id = :id AND ". DB_PREFIX."buses.deleted_at is :null";
    // $query =  "SELECT * FROM ". DB_PREFIX. "vehicles where id = :id";

    try{
      $stmt = $con->prepare($query);

      $stmt->bindValue(":id", $id);
      $stmt->bindValue(':null', null, PDO::PARAM_NULL);
      
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
      $none = "NULL";

      $query = "SELECT ". DB_PREFIX. "buses.*,". DB_PREFIX."bus_types.* FROM sunshine_buses INNER JOIN ". DB_PREFIX. "bus_types ON ". DB_PREFIX."buses.bus_type = ". DB_PREFIX."bus_types.bt_id WHERE ". DB_PREFIX."buses.deleted_at is :null";
      try{
        $stmt = $con->prepare($query);
        $stmt->bindValue(':null', null, PDO::PARAM_NULL); //Hard lesson ordinary binding doesn't work on this
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