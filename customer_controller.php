<?php
	session_Start();
	include_once('admin/includes/init.php');

	/**
	* User Model Controller.
	* Processes any form submitted for any user-related issues
	*/

	//Update User information
	if(isset($_POST['updateUser'])){
		$id = $_POST['user_id'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$phone = $_POST['phone'];
		$rank = $_POST['rank'];
		$rank = $_POST['rank'];
		$fetchedEmail = $_POST['fetched_email'];
		$time_updated = date("Y-m-d H:i:s");
		if(!empty($_POST['password'])) {
			$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

			$query2 = "UPDATE " .DB_PREFIX."login SET email = :email, password = :pass WHERE email = :fetchedEmail";
			try{
				$stmt = $con->prepare($query2);
				$stmt->bindValue(":email", $email);
				$stmt->bindValue(":fetchedEmail", $fetchedEmail);
				$stmt->bindValue(":pass", $password);
				
				$stmt->execute();
			}
			catch(Exception $ex){
				$_SESSION['error'] = $ex->getMessage();
				redirect("manage-users.php");
			}
		}
		$query = "UPDATE " .DB_PREFIX."users SET name = :name, email = :email, phone = :phone, role = :rank, address = :address, updated_at = :time_updated WHERE id = :id";

		$stmt = $con->prepare($query);
		$stmt->bindValue(":id",$id);
		$stmt->bindValue(":name",$name);
		$stmt->bindValue(":email",$email);
		$stmt->bindValue(":phone",$phone);
		$stmt->bindValue(":rank",$rank);
		$stmt->bindValue(":address",$address);
		$stmt->bindValue(":time_updated",$time_updated);

		if($stmt->execute()){
			$_SESSION["success"] = "User information updated";
			redirect("manage-users.php");
		}
	}

	// Login User
	if(isset($_POST['login'])){
		$mail = $_POST['email'];
		$pass = $_POST['password'];

		$query = "SELECT * FROM ".DB_PREFIX."users WHERE email = :mail";
		try{
			$stmt = $con->prepare($query);
			$stmt->bindValue(":mail", $mail);		
			$stmt->execute();
			$result = $stmt->fetchAll();

			if(count($result)>0){
				
				$hashedPass = $result['0']["password"];
				$user_pass = password_verify($pass,$hashedPass);
			
				if($user_pass){
					// var_dump($result);				
					$user = $result[0]['name'];
					$email = $result[0]['email'];
					$userID = $result[0]['id'];
					$rank = $result[0]['rank'];
					$phone = $result[0]['phone'];
					$_SESSION['user'] = $user;
					$_SESSION['email'] = $email;
					$_SESSION['id'] = $userID;
					$_SESSION['role'] = $rank;
					$_SESSION['phone'] = $phone;
					
					$_SESSION["success"] = "Welcome $user";
					redirect("admin/dashboard.php");
				}
				else{
					$_SESSION['error'] = "Sorry Username or Password is incorrect Please verify.";
					redirect("index.php");
				}
			}						
			else{
				$_SESSION['error'] = "Sorry Username or Password is incorrect Please verify.";
				redirect("index.php");
			}
		}
		catch(Exception $ex){
			$_SESSION['error'] = $ex->getMessage();
				redirect("index.php");
		}
		
	}
	//Add User
	if(isset($_POST['reg_customer'])){
		$name 			= 	$_POST['name'];
		$email 			= 	$_POST['email'];
		$phone 			= 	$_POST['phone'];
		$password 		= 	$_POST['password'];
		$password 		= 	password_hash($password,PASSWORD_DEFAULT);
		$date			=	date("Y:m:d H:i:s");
	
		
		$query =  "INSERT INTO ". DB_PREFIX. "users(name,email,phone,password,created_at)VALUES(:name,:email,:phone,:password,:created_at)";

		try{
			$stmt = $con->prepare($query);

			$stmt->bindValue(":name", $name);
			$stmt->bindValue(":email", $email);
			$stmt->bindValue(":phone", $phone);
			$stmt->bindValue(":password", $password);
			$stmt->bindValue(":created_at", $date);

			if($stmt->execute()){

				$_SESSION['success'] = "Registration successful";
				// redirect('index.php');
			}

		}
		catch(Exception $ex){
			$_SESSION['error'] = $ex->getMessage();
			// redirect('index.php');
		}
	}
?>
