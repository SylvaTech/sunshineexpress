<?php
	include_once("includes/header.php");
	include_once("includes/inner-header.php");
?>
<div class="container-fluid">
	<!-- Feedback -->
	<div class="container card">
            <div class="imagebg"></div>
            <div class="row " style="margin-top: 50px">
                <div class="col-md-2"></div>
                <div class="col-md-6 col-md-offset-3 form-container">
                    <h2>Feedback</h2> 
                    <p> Please provide your feedback below: </p>
                    <form  action = "controllers/feedback_controller.php" role="form" method="post" id="reused_form">
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label>How do you rate your overall experience?</label>
                                <p>
                                    <label class="radio-inline">
                                        <input type="radio" name="experience" id="radio_experience" value="bad" >
                                        Bad 
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="experience" id="radio_experience" value="average" >
                                        Average 
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="experience" id="radio_experience" value="good" >
                                        Good 
                                    </label>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label for="comments"> Comment:</label>
                                <textarea class="form-control" type="textarea" name="comment" id="comments" placeholder="Your Comments" maxlength="6000" rows="7"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <input type="hidden" class="form-control" id="name" name="name" value = "<?php echo $_SESSION['user'];?>" required>
                            <input type="hidden" class="form-control" id="email" name="email" value = "<?php echo $_SESSION['email'];?>" required>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <button type="submit" name = "feedback" class="btn btn-lg btn-warning btn-block" >Post </button>
                            </div>
                        </div>
                    </form>
                    <div id="success_message" style="width:100%; height:100%; display:none; "> <h3>Posted your feedback successfully!</h3> </div>
                    <div id="error_message" style="width:100%; height:100%; display:none; "> <h3>Error</h3> Sorry there was an error sending your form. </div>
                </div>
            </div>
        </div>
	<!-- /Feedback -->
	
</div><!-- Closing container-fluid -->
</div>
<?php include "includes/footer.php"; ?>