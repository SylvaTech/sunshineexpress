<?php 
include "includes/header.php"; 
include "includes/inner-header.php";
require_once('Models/Journey.class.php');
require_once('Models/Booking.class.php');

if(isset($_GET['j'])){
  $j_id = $_GET['j'];
  $journey_date = $_SESSION['journey_date'];
  $journey = new Journey();
  $jonyDetails = $journey->getJouneyDetails($j_id);
  foreach($jonyDetails as $jon){
    $total_seat = $jon["TotalSeat"];
  }

  //Checking for the booked seats
  $bd = new Booking();
  $seats = $bd->getBookedSeats($j_id,$journey_date);

  $seat_nos = $seats;//The new array with only booked seat nos
  if(count($seat_nos) == $total_seat AND $total_seat != 0){
    echo count($seat_nos)." is the number booked and $total_seat is the capacity hence, bus is full";
    //Book another bus
  }
?>

<!-- Begin Page Content -->
<div class="container-fluid card">
        
  <form action = "book_bus.php" method = "post">
      <div class="container row">
        <div class="col-md-4">
          <p class = "lead">Passenger's Details</p class = "lead">
          <hr>
          <div class="form-group">
              <span>Passenger Name:</span>
              <input type="text" class="form-control form-control-user" name="pname" placeholder="Passenger Name" required>
            </div>
            <div class="form-group">
              <span>Gender:</span>
              <select name="pgender" class="states order-alpha form-control form-control-user" id="stateId">
                <option value="" hidden>Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
            </div> 
            <div class="form-group">
              <span>Passenger's Phone Number:</span>
              <input type="text"  minlength="11" maxlength="11" class="form-control form-control-user" name="p_phone" placeholder="Passenger's phone" value = "<?php echo $_SESSION['phone'];?>" required>
            </div> 
            <div class="form-group">
              <span>Passenger Address:</span>
              <input type="text" class="form-control form-control-user" name="paddress" placeholder="Passenger Address" required>
            </div>
            <div class="form-group">
              <span>Transaction Email:</span>
              <input type="text" disabled class="form-control form-control-user" name="customer_email" placeholder="Email Address" value = "<?php echo $_SESSION['email'];?>" required>
              <input type="hidden" class="form-control form-control-user" name="customer_email" value = "<?php echo $_SESSION['email'];?>" required>
            </div>
          </div>
          <div class="col-md-4">
            <p class="lead">Next of Kin's Details:</p>
            <hr>
            <div class="form-group">
              <span>Next of Kin's Name:</span>
              <input type="text" class="form-control form-control-user" name="nok_name" placeholder="Next of Kin's Name" required>
            </div>
            <div class="form-group">
              <span>Next of Kin's Phone:</span>
              <input type="number" minlength="11" maxlength="11" class="form-control form-control-user" name="nok_phone" placeholder="Next of kin's Phone number" required>
            </div>
            <div class="form-group">
              <span>Passenger Address:</span>
              <input type="text" class="form-control form-control-user" name="nok_address" placeholder="Next of Kin's Address" required>
            </div>
          </div>
        <div class="col-md-4">
          <p class="lead">Journey Details:</p>
          <hr>

          <?php 
          // var_dump($jonyDetails);

          foreach($jonyDetails as $jony){ 
            $from = $jony["from_destination"];
            $to = $jony['to_destination'];
            $fare = $jony['fare'];  

          ?>
            <input type="hidden" class="form-control" name="j_id" value="<?php echo $j_id;?>" required>
            <div class="form-group">
              <span>From:</span>
              <input type="text" disabled class="form-control" name="j_from" placeholder="From" value="<?php echo $from;?>" required>
              <input type="hidden" class="form-control form-control-user" name="j_from" value="<?php echo $from;?>" required>
            </div>
            <div class="form-group">
              <span>To:</span>
              <input type="text" disabled class="form-control form-control-user" name="j_to" placeholder="to" value="<?php echo $to;?>" required>
              <input type="hidden" class="form-control form-control-user" name="j_to" value="<?php echo $to;?>" required>
            </div>
            <div class="form-group">
              <span>Fare:</span>
              <input type="text" disabled class="form-control form-control-user" name="j_fare" value="<?php echo $fare;?>" required>
              <input type="hidden" class="form-control form-control-user" name="j_fare" value="<?php echo $fare;?>" required>
            </div>
            <div class="form-group">
              <span>Journey Date:</span>
              <input type="text" disabled class="form-control form-control-user" name="j_date" value="<?php echo $journey_date;?>" required>
              <input type="hidden" class="form-control" name="j_date" value="<?php echo $journey_date;?>" required>
            </div>
            <div class="form-group">
            <span>Select seat number:</span>
            <select name="seat" class="form-control">
              <?php
              if(!$seat_nos == " " OR $total_seat != 0){
                for($i=1; $i<=$total_seat;$i++){
                  if(!in_array($i, $seat_nos))
                  { 
                  ?>
                     <option value="<?php echo $i;?>"><?php echo $i;?></option>
                  <?php
                  }
                }
              }
              else{
                for($i=1; $i<=$_total_seat; $i++){
                  ?>
                  <option value="<?php echo $i;?>"><?php echo $i;?></option>
                  <?php
                }
              }
              ?>                
            </select>
          </div>
          <?php}?>
          <div>
            <hr>
            <a href = "dashboard.php" class = "btn btn-danger">Cancel</a href = "dashboard.php" class = "btn btn-danger">
            <button type = "submit" name = "proceed" class = "btn btn-success">Proceed</button>
          </div>
        </div>
    </div>
    </form>    
</div>
<?php } } 
else if (isset($_POST['proceed'])){
  // Passenger Details
  $p_name = $_POST['pname'];
  $p_gender = $_POST['pgender'];
  $p_phone = $_POST['p_phone'];
  $p_address = $_POST['paddress'];  
  $trxn_email = $_POST['customer_email'];
  // Nok details
  $nok_name = $_POST['nok_name'];
  $nok_phone = $_POST['nok_phone'];
  $nok_address = $_POST['nok_address'];
  //Journey Details
  $j_from = $_POST['j_from'];
  $j_to = $_POST['j_to'];
  $j_fare = $_POST['j_fare'];
  $j_id = $_POST['j_id'];
  $j_date = $_POST['j_date'];
  $seat = $_POST['seat'];
  $payment_status = "pending";
  $booking_id = strtoupper(uniqid());
  // $_SESSION["b_id"] = $booking_id;
  // $_SESSION["j_id"] = $j_id;
  $created_at = date("Y-m-d H:i:s");
  //Save to db
  $booking = new Booking();
  $booking->saveBookingDetails($booking_id,$p_name,$p_gender,$p_phone,$p_address,$trxn_email,$nok_name,$nok_phone,$nok_address,$j_id,$j_date,$seat,$payment_status,$created_at);
?>
<!-- Process Payment -->
<div class="container-fluid">
 
  <form action = "#" method = "post">
      <div class="container row">
        <div class="col-md-6">
          <div class="form-group">
              <span>Passenger Name:</span>
              <input type="text" disabled class="form-control form-control-user" name="pname" value = "<?php echo $p_name;?>" required>
              <input type="hidden" class="form-control form-control-user" name="pname" value = "<?php echo $p_name;?>" required>
            </div>
            <div class="form-group">
              <span>Gender:</span>
              <input type="text" disabled name = "pgender" value = "<?php echo $p_gender;?>" class = "form-control">
              <input type = "hidden" name = "pgender" value = "<?php echo $p_gender;?>" class = "form-control">
            </div>
            <div class="form-group">
              <span>Phone:</span>
              <input type="text" disabled name = "phone" value = "<?php echo $p_phone;?>" id = "p_phone" class = "form-control">
              <input type = "hidden" name = "phone" value = "<?php echo $p_phone;?>" id = "p_phone" class = "form-control">
            </div>
            <div class="form-group">
              <span>Passenger Address:</span>
              <input type="text" disabled class="form-control form-control-user" name="paddress" value = "<?php echo $p_address;?>" required>
              <input type="hidden" class="form-control form-control-user" name="paddress" value = "<?php echo $p_address;?>" required>
            </div>
            <div class="form-group">
              <span>Transaction Email:</span>
              <input type="text" disabled class="form-control form-control-user" id = "customer_email" name="customer_email" value = "<?php echo $trxn_email;?>" required>
            </div>
        </div> 
        <div class="col-md-6">

          <div class="form-group">
              <span>From:</span>
              <input type="text" disabled class="form-control form-control-user" name="j_from" placeholder="From" value="<?php echo $j_from;?>" required>
              <input type="hidden" class="form-control form-control-user" name="j_from" value="<?php echo $j_from;?>" required>
            </div>
            <div class="form-group">
              <span>To:</span>
              <input type="text" disabled class="form-control form-control-user" name="j_to" placeholder="to" value="<?php echo $j_to;?>" required>
              <input type="hidden" class="form-control form-control-user" name="j_to" value="<?php echo $j_to;?>" required>
            </div>
            <div class="form-group">
              <span>Fare:</span>
              <input type="text" disabled class="form-control form-control-user" name="j_fare" value="<?php echo $j_fare;?>" required>
              <input type="hidden" class="form-control form-control-user" id = "fare" name="j_fare" value="<?php echo $j_fare;?>" required>
            </div>
            <div class="form-group">
            <span>Seat number:</span> 
            <input type="text" disabled name = "seat" class = "form-control" value="<?php echo $seat;?>" >
            <input type = "hidden" name = "seat" class = "form-control" value="<?php echo $seat;?>" >
          </div>
          <div>
            <script src="https://js.paystack.co/v1/inline.js"></script>
            <a href = "dashboard.php" class = "btn btn-danger">Cancel</a href = "dashboard.php" class = "btn btn-danger">
            <button type = "button" name = "pay" class = "btn btn-success" onclick='payWithPaystack()'>Make payment</button>
          </div>
          <?php 
            $verifier = md5(mt_rand(000000,999999));
            $_SESSION['verifier_token'] = $verifier;
          ?>
        </div>
    </div>
    </form> 
    <script>
              function payWithPaystack(){
                var email = document.getElementById('customer_email').value;
                var phone = document.getElementById('p_phone').value;
                var fare = document.getElementById('fare').value+"00";
                // console.log(email);

              var handler = PaystackPop.setup({
                key: 'pk_test_a64937a93b0dc0e89ccd4fe0be16be607dca8655',
                // email: 'person@email.com',
                email:email,
                amount: fare,
                ref: ''+Math.floor((Math.random() * 1000000000) + 1), 
                metadata: {
                   custom_fields: [
                      {
                          display_name: 'Mobile Number',
                          variable_name: 'mobile_number',
                          value: phone
                      }
                   ]
                },
                callback: function(response){
                  var ver = "<?php echo $verifier ?>";
                  var booking_id = "<?php echo $booking_id ?>";
                  var j_id = "<?php echo $j_id ?>";
                  alert('Success. Your transaction ref is ' + response.reference);
                  window.location = 'reciept.php?ver='+ver+'&bid='+booking_id+'&jid='+j_id+'&tf='+ response.reference;
                },
                onClose: function(){
                    alert('window closed');
                }
              });
              handler.openIframe();
            }
          </script>
  

</div>
<?php
}
?>