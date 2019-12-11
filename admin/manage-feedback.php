<?php 
include "includes/header.php"; 
include "includes/inner-header.php"; 
require_once("Models/Feedback.class.php");
$feedback = new Feedback();
$feedbacks = $feedback->getAllFeedbacks();
?>
   
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Feedback Management</h1>
          </div>
            <div class="mb-4"></div>

            <!-- Content Column -->

              <div class='card shadow mb-4'>
                <div class='card-header py-3'>
                  <h6 class='m-0 font-weight-bold text-primary'>Feedback List</h6>
                </div>
                <div class='card-body'>
                  <div class='table-responsive'>
                <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
                  <thead>
                    <tr>
                      <th>S/N</th>
                      <th>Passenger Name</th>
                      <th>Email</th>
                      <th>Rating</th>
                      <th>Message</th>
                      <th>Date</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                    $sn = 0;
                     foreach($feedbacks as $feed){
                      $sn++;
                    ?>
                      <tr>
                      <td><?php echo $sn;?></td>
                      <td><?php echo $feed['username'];?></td>
                      <td><?php echo $feed['email'];?></td>
                      <td><?php echo $feed['experience'];?></td>
                      <td><?php echo $feed['comment'];?></td>
                      <td><?php echo $feed['date_sent'];?></td>
                      <td>
                        <button class='btn btn-primary btn-sm' data-toggle='modal' data-target=''>View</button>
                      </td>
                      <td>
                        <button class='btn btn-success btn-sm' data-toggle='modal' data-target=''>Reply</button>
                      </td>
                    </tr>
                    <?php
                     }
                    ?>
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

        <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">View Feedback</h4>
      </div>
      
      <div class="modal-body">
        <form>
            <div class="container row">
              <div class="col-md-6">
                <div class="form-group">
                    <span>Name:</span>
                    <input type="text" class="form-control form-control-user" name="name" value="TLB-1" required>
                  </div>
                  <div class="form-group">
                    <span>Feedback:</span>
                    <textarea class="form-control form-control-user" name="name" value="Lorem Ipsum es un texto de marcador de posición comúnmente utilizado en las industrias gráficas, gráficas y editoriales para previsualizar diseños y maquetas visuales." disabled>
                    </textarea>
                  </div>  
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                    <span>Date:</span>
                    <input type="text" class="form-control form-control-user" name="name" value="ABC 1234" required>
                  </div>
              </div>
          </div>
          </form> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button class="btn btn-success" onclick="myFunction()">Update</button>
      </div>
    </div>

  </div>
</div>

        <div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Delete bus details</h4>
      </div>
      
      <div class="modal-body">
        <form>
            <div class="container row">
              <div class="col-md-6">
                <input type="hidden" class="form-control form-control-user" name="id" value="TLB-1" disabled>
                <div class="form-group">
                    <span>Bus Name:</span>
                    <input type="text" class="form-control form-control-user" name="name" value="TLB-1" disabled>
                  </div>
                  <div class="form-group">
                    <span>Bus Driver:</span>
                    <input type="text" class="form-control form-control-user" name="name" value="Nnamdi Azikiwe" disabled>
                  </div>  
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                    <span>Plate Number:</span>
                    <input type="text" class="form-control form-control-user" name="name" value="ABC 1234" disabled>
                  </div>
                  <div class="form-group">
                  <span>Number of seats:</span>
                  <input type="text" class="form-control form-control-user" name="name" value="8" disabled>
                </div>
              </div>
          </div>
          </form> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button class="btn btn-success" onclick="myFunction1()">Delete</button>
      </div>
    </div>

  </div>
</div>

      </div>
        
      <!-- End of Main Content -->

      <script>
function myFunction() {
  alert("Record updated successfully!");
  window.location.href = 'buses.php';
}

function myFunction1() {
  alert("Record deleted successfully!");
  window.location.href = 'buses.php';
}
</script>

<?php include "includes/footer.php"; ?>
