<?php
session_start();
require_once 'class.user.php';
$user = new USER();

if($user->is_logged_in()!="")
{
  $user->redirect('home.php');
}

if(isset($_POST['btn-submit']))
{
  $email = $_POST['txtemail'];
  
  $stmt = $user->runQuery("SELECT user_id FROM users WHERE user_email=:email LIMIT 1");
  $stmt->execute(array(":email"=>$email));
  $row = $stmt->fetch(PDO::FETCH_ASSOC);  
  if($stmt->rowCount() == 1)
  {
    $id = base64_encode($row['user_id']);
    $code = 1;
    
    $stmt = $user->runQuery("UPDATE users SET tokenCode=:token WHERE user_email=:email");
    $stmt->execute(array(":token"=>$code,"email"=>$email));
    
    $message= "
           Hello , $email
           <br /><br />
           We got requested to reset your password, if you did this, then just click the following link to reset your password, if not just ignore                   this email,
           <br /><br />
           Click Following Link To Reset Your Password 
           <br /><br />
           <a href='https://biosec.com.ng/nin/admin/resetpass.php?id=$id&code=$code'>click here to reset your password</a>
           <br /><br />
           thank you :)
           ";
    $subject = "Password Reset";
    
    $user->send_mail($email,$message,$subject);
    
    $msg = "<div class='alert alert-success'>
          <button class='close' data-dismiss='alert'>&times;</button>
          We've sent an email to $email.
                    Please click on the password reset link in the email to generate new password. 
          </div>";
  }
  else
  {
    $msg = "<div class='alert alert-danger'>
          <button class='close' data-dismiss='alert'>&times;</button>
          <strong>Sorry!</strong>  this email was not found. 
          </div>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin - Forgot Password</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                    <p class="mb-4">We get it, stuff happens. Just enter your email address below and we'll send you a link to reset your password!</p>
                  </div>
                  <form class="user" method="post">
                    <?php
                      if(isset($msg))
                      {
                        echo $msg;
                      }
                      ?>
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="txtemail">
                    </div>
                    <button class="btn btn-primary btn-user btn-block" name="btn-submit">
                      Reset Password
                    </button>
                  </form>
                  <hr>
                  <!-- <div class="text-center">
                    <a class="small" href="register.html">Create an Account!</a>
                  </div> -->
                  <div class="text-center">
                    <a class="small" href="index.php">You just remembered your password? Login!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
