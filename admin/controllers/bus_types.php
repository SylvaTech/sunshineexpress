<?php
	session_Start();
	include_once('../includes/init.php');

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
?>