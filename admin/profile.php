<?php 
include "includes/header.php"; 
include "includes/inner-header.php"; 

?>
   
        <!-- Begin Page Content -->
        <div class="container-fluid">
              <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-12 col-md-9">
                  <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                      <!-- Nested Row within Card Body -->
                      <div class="row">
                        <div class="col-lg-6 d-none d-lg-block">
                          <img src="img/profile.png" alt="profile pic" width="200" height = "250">
                          
                        </div>
                        <div class="col-lg-6">
                          <div class="p-5">
                            <div class="text-center">
                              <h1 class="h4 text-gray-900 mb-2">My Profile</h1>
                            </div>
                            <hr>
                            <form class="user">
                              <table>
                                  <tr>
                                    <td><b>Name:</b> </td>
                                    <td align="left"><?php echo $_SESSION['user']; ?></td>
                                  </tr>
                                  <tr>
                                    <td><b>Email Address:</b></td> 
                                    <td align="left"><?php echo $_SESSION['email']; ?></td>
                                  </tr>
                                  <tr>
                                    <td><b>User Role:</b></td> 
                                    <td align="left"><?php echo $_SESSION['role']; ?></td>
                                  </tr>
                                  <tr>
                                    <td><b>Phone Number:</b></td> 
                                    <td align="left"><?php echo $_SESSION['phone']; ?></td>
                                  </tr>
                              </table>
                              <hr>
                              <a href="#" class="btn btn-primary btn-danger btn-user"><i class="fas fa-edit"></i>Edit Profile</a>
                              <a href="dashboard.php" class="btn btn-primary btn-user"><i class="fas fa-home"></i>
                                Back Home
                              </a>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          <!-- Content Row -->

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php include "includes/footer.php"; ?>
