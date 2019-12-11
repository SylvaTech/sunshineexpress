<?php
	session_Start();
	include_once('../includes/init.php');

	if(isset($_POST['feedback'])){
		$experience = $_POST['experience'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$comment = $_POST['comment'];

		$query = ("INSERT INTO feedbacks(username,email,experience,comment)VALUES(:name,:email,:experience,:comment)");

		try{
			$stmt = $con->prepare($query);

			$stmt->bindValue(":name", $name);
			$stmt->bindValue(":email", $email);
			$stmt->bindValue(":experience", $experience);
			$stmt->bindValue(":comment", $comment);
			
			if($stmt->execute()){

				$_SESSION['success'] = "Thank you for rating us, we promise to use your suggestions to improve our services";
				redirect('../give-feedback.php');
			}

		}
		catch(Exception $ex){
			$_SESSION['error'] = $ex->getMessage();
			redirect('../give-feedback.php');
		}


	}
?>