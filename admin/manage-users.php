<?php 
include "includes/header.php"; 
include "includes/inner-header.php";
require_once('Models/User.class.php');
?>

      <!-- DataTales  -->
              <div class="card shadow">
                <div class="card-header">
                  <h3 class="card-title text-primary head-h2">Manage Users</h3>
                  <button class="btn btn-primary add-btn" data-toggle="modal" data-target="#myModal">Add User</button>
                </div>
                <div class="card-body">
                  <?php
                    $users = new User();
                    $allUsers = $users->getAllUsers();
                    // var_dump($allUsers);
                  ?>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Staff Name</th>
                      <th>Rank</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th colspan="2">Action</th>
                    </tr>
                  </thead>
                  <tbody>

                      <?php
                        foreach($allUsers as $user){
                          $id = $user['id'];
                          $name = $user['name'];                          
                          $email = $user['email'];
                          $phone = $user['phone'];
                          $role = $user['rank'];
                      ?>
                      <tr>
                      <td><?php echo $name; ?></td>
                      <td><?php echo $role; ?></td>
                      <td><?php echo $email; ?></td>
                      <td><?php echo $phone; ?></td>
                      <td colspan = "2">
                        <a href = "<?php echo 'edit_user.php?edu='.$id;?>" class = "btn btn-sm btn-primary">update</a> 
                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal">Delete</button>
                      </td>
                    </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>

            </div><!-- Closing table div -->
            
          </div><!-- /Card body -->
        </div><!-- Closing Card -->
      </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Add User Details</h4>
          </div>
          <div class="modal-body">
          <form  method = "post" action = "controllers/user_controller.php">
            <div class="container row">
              <div class="col-md-6"> 
                <div class="form-group">
                    <span>Name:</span>
                    <input type="text" class="form-control form-control-user" name="name" value = "" required>
                  </div>
                  <div class="form-group">
                    <span>Email:</span>
                    <input type="email" class="form-control form-control-user" name="email" value= "" required>
                  </div>
                  <div class="form-group">
                    <span>Rank:</span>
                    <select type="select" class="form-control form-control-user" name="rank" required>
                      <option value = "" disabled selected>Select Rank</option>
                      <option value = "admin">Admin</option>
                      <option value = "user">User</option>
                    </select>
                  </div>
                  <!-- <div class="form-group">
                    <span>Address:</span>
                    <input type = "text" class="form-control form-control-user"  name = "address" required>
                  </div>  -->
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                    <span>Phone:</span>
                    <input type = "number" class="form-control form-control-user" name = "phone" required>
                  </div>
                  <div class="form-group">
                    <span>Password:</span>
                    <input type = "text" class="form-control form-control-user" name = "password" required>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
              <button class="btn btn-success" name = "addUser">Add User</button>
            </div>
          </div>
        </form>

  </div>
</div>
<!-- End of addModal -->
        <div id="deleteModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Delete user details</h4>
      </div>
      
      <div class="modal-body">
        <p>
          Are your sure you want to delete this user ?
        </p> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        <a href = "<?php echo 'edit_user.php?deu='.$id;?>" class = "btn btn-success">Yes</a>
      </div>
    </div>

  </div>
</div>

      <script>
// function myFunction() {
//   alert("Record updated successfully!");
//   window.location.href = 'manage-user.php';
// }

// function myFunction1() {
//   //alert("User modified successfully!");
//   window.location.href = 'manage-user.php';
// }
</script>
<?php
     include "includes/footer.php"; 
?>
