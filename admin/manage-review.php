<?php 
include "includes/header.php"; 
include "includes/inner-header.php"; 

?>
   
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Feedback Management</h1>
          </div>

                      <!-- Earnings (Monthly) Card Example -->
            <div class="mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <form method="post" >    
		                    <div class="form-group">
		                      <span>Enter Search Term:</span>
		                      <input type="text" class="form-control form-control-user" name="search" required/>
		                  	</div>

		                	<div class="form-group">
	                          <button type="submit" name="createAgent" class="btn btn-primary">Search</button>
	                        </div>
			            </form>   
	                   </div>
                  	</div>
                 </div>
              </div>
            </div>

            <!-- Content Column -->



          <?php
          if (!isset($_POST['createAgent'])) {

            echo "
              <div class='card shadow mb-4'>
                <div class='card-header py-3'>
                  <h6 class='m-0 font-weight-bold text-primary'>Review List</h6>
                </div>
                <div class='card-body'>
                  <div class='table-responsive'>
                <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
                  <thead>
                    <tr>
                      <th>S/N</th>
                      <th>Passenger Name</th>
                      <th>Review</th>
                      <th>Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>Nnamdi Azikiwe</td>
                      <td>Lorem Ipsum es un texto de marcador de posición comúnmente utilizado en las industrias gráficas, gráficas y editoriales para previsualizar diseños y maquetas visuales.</td>
                      <td>10-05-2019</td>
                      <td>
                        <button class='btn btn-info' data-toggle='modal' data-target='#myModal1'>Delete</button>
                        <button class='btn btn-danger' data-toggle='modal' data-target='#myModal'>View</button>
                      </td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>Olusegun Obasanjo</td>
                       <td>Lorem Ipsum es un texto de marcador de posición comúnmente utilizado en las industrias gráficas, gráficas y editoriales para previsualizar diseños y maquetas visuales.</td>
                      <td>10-05-2019</td>
                      <td>
                        <button class='btn btn-info' data-toggle='modal' data-target='#myModal1'>Delete</button>
                        <button class='btn btn-danger' data-toggle='modal' data-target='#myModal'>View</button>
                      </td>
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>Goodluck Jonathan</td>
                       <td>Lorem Ipsum es un texto de marcador de posición comúnmente utilizado en las industrias gráficas, gráficas y editoriales para previsualizar diseños y maquetas visuales.</td>
                      <td>10-05-2019</td>
                      <td>
                        <button class='btn btn-info' data-toggle='modal' data-target='#myModal1'>Delete</button>
                        <button class='btn btn-danger' data-toggle='modal' data-target='#myModal'>View</button>
                      </td>
                    </tr>
                    <tr>
                      <td>4.</td>
                      <td>Muhammadu Buhari</td>
                       <td>Lorem Ipsum es un texto de marcador de posición comúnmente utilizado en las industrias gráficas, gráficas y editoriales para previsualizar diseños y maquetas visuales.</td>
                      <td>10-05-2019</td>
                      <td>
                        <button class='btn btn-info' data-toggle='modal' data-target='#myModal1'>Delete</button>
                        <button class='btn btn-danger' data-toggle='modal' data-target='#myModal'>View</button>
                      </td>
                    </tr>
                    <tr>
                      <td>5.</td>
                      <td>Tafawa Balewa</td>
            <td>Lorem Ipsum es un texto de marcador de posición comúnmente utilizado en las industrias gráficas, gráficas y editoriales para previsualizar diseños y maquetas visuales.</td>
                      <td>10-05-2019</td>
                      <td>
                        <button class='btn btn-info' data-toggle='modal' data-target='#myModal1'>Delete</button>
                        <button class='btn btn-danger' data-toggle='modal' data-target='#myModal'>View</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
                  
                </div>

          </div>";
        }

          if (isset($_POST['createAgent'])) {
          	$term = $_POST['search'];
            echo "<div class='card shadow mb-4'>
                <div class='card-header py-3'>
                  <h4 class='m-0 font-weight-bold text-primary'>Search Result for ".$term."</h4>
                </div>
                <div class='card-body'>
                  <div class='table-responsive'>
                <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
                  <thead>
                    <tr>
                      <th>S/N</th>
                      <th>Passenger Name</th>
                      <th>Review</th>
                      <th>Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>S/N</th>
                      <th>Passenger Name</th>
                      <th>Review</th>
                      <th>Date</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>Nnamdi Azikiwe</td>
                      <td>Lorem Ipsum es un texto de marcador de posición comúnmente utilizado en las industrias gráficas, gráficas y editoriales para previsualizar diseños y maquetas visuales.</td>
                      <td>10-05-2019</td>
                      <td>
                        <button class='btn btn-info' data-toggle='modal' data-target='#myModal1'>Delete</button>
                        <button class='btn btn-danger' data-toggle='modal' data-target='#myModal'>View</button>
                      </td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>Olusegun Obasanjo</td>
                       <td>Lorem Ipsum es un texto de marcador de posición comúnmente utilizado en las industrias gráficas, gráficas y editoriales para previsualizar diseños y maquetas visuales.</td>
                      <td>10-05-2019</td>
                      <td>
                        <button class='btn btn-info' data-toggle='modal' data-target='#myModal1'>Delete</button>
                        <button class='btn btn-danger' data-toggle='modal' data-target='#myModal'>View</button>
                      </td>
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>Goodluck Jonathan</td>
                       <td>Lorem Ipsum es un texto de marcador de posición comúnmente utilizado en las industrias gráficas, gráficas y editoriales para previsualizar diseños y maquetas visuales.</td>
                      <td>10-05-2019</td>
                      <td>
                        <button class='btn btn-info' data-toggle='modal' data-target='#myModal1'>Delete</button>
                        <button class='btn btn-danger' data-toggle='modal' data-target='#myModal'>View</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
                  
                </div>

          </div>";
          }
          ?>


        </div>
        <!-- /.container-fluid -->

        <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">View Review</h4>
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
                  <div class="form-group">
                  <span>Number of seats:</span>
                  <select name="seat" class="states order-alpha form-control form-control-user">
                      <option value="">8</option>
                      <option value="">3</option>
                      <option value="">4</option>
                      <option value="">5</option>
                      <option value="">6</option>
                      <option value="">7</option>
                      <option value="">9</option>
                      <option value="">10</option>
                      <option value="">11</option>
                      <option value="">12</option>
                  </select>
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
