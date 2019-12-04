<?php
  class CoveredRoutes{

  	/*
    * Get all Vehicles
    */
    public function getAllRoutes(){
      global $con;
      $covered_routes = array();

      // $query = "SELECT * FROM ".DB_PREFIX."covered_routes";
      $query = "SELECT * FROM places";
      
      try{
        $stmt = $con->prepare($query);
        $stmt->execute();
        $covered_routes = $stmt->fetchAll();
      }
      catch(Exception $ex){
        echo errorMessage($ex->getMessage());
      }
      return $covered_routes;
    }

  		
  }
 ?>