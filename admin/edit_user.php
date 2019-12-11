<?php 
include "includes/header.php"; 
include "includes/inner-header.php";
require_once('Models/User.class.php');
//Delete User
 if (isset($_GET['deu'])){
    $id = $_GET['deu'];
    $query = "DELETE FROM ".DB_PREFIX."users WHERE id = :id";
    $stmt = $con->prepare($query);
    try{
      $stmt->bindValue(':id',$id);
      if($stmt->execute()){
        $_SESSION['success'] = "User deleted";
        redirect('manage-users.php');
      }
    }
    catch(Exception $ex){
      $_SESSION['error'] = $ex->getMessage();
      redirect("manage-users.php");
    }
  }

if(isset($_GET['edu'])){
  $id = $_GET['edu'];
  $user = new User();
  $theUser = $user->getUserById($id);
  if(is_array($theUser)){
    foreach($theUser as $fetchedUser){
      $name = $fetchedUser['name'];
      $email = $fetchedUser['email'];
      // $address = $fetchedUser['address'];
      $rank = $fetchedUser['rank'];
      $phone = $fetchedUser['phone'];
      //$password = $fetchedUser['password'];
    }
  }
}

?>
      
<div class="card shadow">
  <div class="card-header">
    <h3 class="card-title text-primary head-h2">Edit User Information</h3>
  </div>
      <form  method = "post" action = "controllers/user_controller.php">
      <div class = "row container-fluid card-body">
        <div class="col-md-6">
          <div class="form-group">
            <input type = "hidden" name = "user_id" value = "<?php echo $id; ?>">
            <span>Name:</span>
            <input type="text" class="form-control form-control-user" name="name" value = "<?php echo $name; ?>" required>
          </div>
          <div class="form-group">
            <span>Email:</span>
            <input type = "hidden" name = "fetched_email" value = "$email">
            <input type="email" class="form-control form-control-user" name="email" value = "<?php echo $email; ?>" required>
          </div> 
          <div class="form-group">
              <span>Rank:</span>
              <select type="select" class="form-control form-control-user" name="rank" required>
                <option value = "<?php echo isset($rank)?$rank : '';?>" selected><?php echo isset($rank)?$rank: 'Select Rank'?></option>
                <option value = "Manager">Manager</option>
                <option value = "Accountant">Accountant</option>
                <option value = "Operations Staff">Operations Staff</option>
              </select>
            </div>
          <!-- <div class="form-group">
            <span>Address:</span>
            <input type = "text" class="form-control form-control-user"  name = "address" value = "<?php echo $address; ?>" required>
          </div>  -->
          </div><!-- Closing col-6 -->
          <div class="col-md-6">
            <div class="form-group">
              <span>Phone:</span>
              <input type = "number" class="form-control form-control-user" name = "phone" value = "<?php echo $phone; ?>" required>
            </div>
            <div class="form-group">
              <span>Password:</span>
              <input type = "password" class="form-control form-control-user" name = "password" placeholder="Leave this empty if you dont want to change the password">
              <!-- <input type = "hidden" name = "fetched_password" value = "<?php echo $password;?>"> -->
            </div>
            <div class="card-footer">
              <a href="manage-users.php" class="btn btn-danger">Cancel</a>
              <button class="btn btn-success" name = "updateUser">Update</button>
          </div>
        </div><!-- Closing col-6 -->

      </div>
    </div><!-- Closing row -->
  </form>
</div><!-- Closing card shadow -->
    
  </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
</div>
<?php
     include "includes/footer.php"; 
?>
