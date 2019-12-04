<?php
    require_once('includes/init.php');
	
	class User{
        
		/**
     * Get details of all users
    */
    
    public function getAllUsers(){
      global $con;
      $users = array();

      $query = "SELECT * FROM ".DB_PREFIX."users";

      try{
        $stmt = $con->prepare($query);
        $stmt->execute();
        $users = $stmt->fetchAll();
      }
      catch(Exception $ex){
        echo errorMessage($ex->getMessage());
      }
      return $users;
    }
    //Get user by id
    function getUserById($id){
      global $con;
    $query =  "SELECT * FROM ". DB_PREFIX. "users where id = :id";

    try{
      $stmt = $con->prepare($query);

      $stmt->bindValue(":id", $id);
      
      $stmt->execute();
      $user = $stmt->fetchAll();

      if(count($user)>0){
        return $user;
      }

    }
    catch(Exception $ex){
      $_SESSION['error'] = $ex->getMessage();
      redirect('manage-users.php');
    }
  }
}
?>