<?php
    require_once('includes/init.php');
	
	class User{
        
		/**
     * Save user details to db
    */
    public function addUser()
    {
        $query = "
          INSERT INTO
            {$GLOBALS['CONFIG']['db_prefix']}users
        ";
        $stmt = $this->connection->prepare($query);
        $stmt->execute(array(
            ':id' => $this->id
        ));
        $result = $stmt->fetchColumn();

        if ($stmt->rowCount() !=1) {
            return false;
        }

        return $result;
    }

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
  }
?>