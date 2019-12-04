<?php 
include "includes/header.php"; 
include "includes/inner-header.php";
?>
<div class="container-fluid">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Search</h6>
            </div>
            <br>
            <form method="post" >
                <div class="container row">
                <div class="col-md-6">
                    <input type="hidden" name="country" id="countryId" value="NG"/>
                    <div class="form-group">
                      <span>From:</span>
                    <select name="from" class="states order-alpha form-control form-control-user" id="stateId">
                        <option value="">From</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <span>To:</span>
                    <select name="to" class="states order-alpha form-control form-control-user" id="stateId">
                        <option value="">To</option>
                    </select>
                  </div>
                    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
                    <script src="//geodata.solutions/includes/state.js"></script>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <span>Travel date:</span>
                      <input type="date" class="form-control form-control-user" name="date" placeholder="date" required>
                    </div>
                </div>
                <div class="form-group">
                          <button type="submit" name="createAgent" class="btn btn-primary">Search</button>
                        </div>
            </div>
            </form>   
          </div>
          <!-- DataTales Example -->

          <?php
          if (isset($_POST['createAgent'])) {
            echo "<div class='card shadow mb-4'>
                <div class='card-header py-3'>
                  <h6 class='m-0 font-weight-bold text-primary'>Search Result</h6>
                </div>
                <div class='card-body'>
                  <div class='table-responsive'>
                <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
                  <thead>
                    <tr>
                      <th>S/N</th>
                      <th>Destination</th>
                      <th>Driver</th>
                      <th>Plate Number</th>
                      <th>Time</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>S/N</th>
                      <th>Destination</th>
                      <th>Driver</th>
                      <th>Plate Number</th>
                      <th>Time</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>Abia</td>
                      <td>Nnamdi Azikiwe</td>
                      <td>ABC 1234</td>
                      <td>8:00 am</td>
                      <td><button class='btn btn-success' data-toggle='modal' data-target='#myModal'>Book</button></td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>Adamawa</td>
                      <td>Olusegun Obasanjo</td>
                      <td>DEF 5678</td>
                      <td>8:00 am</td>
                      <td><button class='btn btn-success' data-toggle='modal' data-target='#myModal'>Book</button></td>
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>Akwa Ibom</td>
                      <td>Goodluck Jonathan</td>
                      <td>GHI 9101</td>
                      <td>8:00 am</td>
                      <td><button class='btn btn-success' data-toggle='modal' data-target='#myModal'>Book</button></td>
                    </tr>
                    <tr>
                      <td>4.</td>
                      <td>Anambra</td>
                      <td>Muhammadu Buhari</td>
                      <td>JKL 1121</td>
                      <td>8:00 am</td>
                      <td><button class='btn btn-success' data-toggle='modal' data-target='#myModal'>Book</button></td>
                    </tr>
                    <tr>
                      <td>5.</td>
                      <td>Bauchi</td>
                      <td>Tafawa Balewa</td>
                      <td>MNO 3141</td>
                      <td>8:00 am</td>
                      <td><button class='btn btn-success' data-toggle='modal' data-target='#myModal'>Book</button></td>
                    </tr>
                  </tbody>
                </table>
              </div>
                  
                </div>

          </div>";
          }
          ?>
        </div>

                <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Enter booking details</h4>
      </div>
      
      <div class="modal-body">
        <form>
            <div class="container row">
              <div class="col-md-6">
                <div class="form-group">
                    <span>Passenger Name:</span>
                    <input type="text" class="form-control form-control-user" name="name" placeholder="Passenger Name" required>
                  </div>
                  <div class="form-group">
                    <span>Gender:</span>
                    <select name="to" class="states order-alpha form-control form-control-user" id="stateId">
                      <option value="">Male</option>
                      <option value="">Female</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <span>Passenger Address:</span>
                    <input type="text" class="form-control form-control-user" name="name" placeholder="Passenger Name" required>
                  </div>
              </div>
              <div class="col-md-6">
                  
                  <input type="hidden" name="country" id="countryId" value="NG"/>
                  <div class="form-group">
                    <span>From:</span>
                    <input type="text" class="form-control form-control-user" name="from" placeholder="From" value="Abia" required>
                  </div>
                  <div class="form-group">
                    <span>To:</span>
                    <input type="text" class="form-control form-control-user" name="to" placeholder="to" value="Abuja" required>
                  </div>
                  <div class="form-group">
                  <span>Select seat number:</span>
                  <select name="seat" class="states order-alpha form-control form-control-user">
                      <option value="">3</option>
                      <option value="">4</option>
                      <option value="">5</option>
                      <option value="">6</option>
                      <option value="">7</option>
                      <option value="">8</option>
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
        <script src='https://js.paystack.co/v1/inline.js'></script>
          <button type='submit' class='btn btn-success' onclick='payWithPaystack2()'>Make payment</button>
          <script>
              function payWithPaystack2(){
              var handler = PaystackPop.setup({
                key: 'pk_test_20e1148d832e28f2b5d30b9172abc9bddf4ba3c2',
                email: 'person@email.com',
                amount: 50000,
                ref: ''+Math.floor((Math.random() * 1000000000) + 1), 
                metadata: {
                   custom_fields: [
                      {
                          display_name: 'Mobile Number',
                          variable_name: 'mobile_number',
                          value: '1234567892'
                      }
                   ]
                },
                callback: function(response){
                   alert('success. your transaction ref is ' + response.reference);
                   window.location = 'reciept.php?id=$id&refid='+ response.reference;
                },
                onClose: function(){
                    alert('window closed');
                }
              });
              handler.openIframe();
            }
          </script>
      </div>
    </div>

  </div>
</div>

<?php
     include "includes/footer.php"; 

?>