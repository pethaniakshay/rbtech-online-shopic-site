<?php
session_start();
?>
<html>
<head>
<?php
include "design.php";
?>
    <title>Feedback | R.B.Tech</title>
</head>
<body>
<?php
include "header.php";
?>

<hr>
<div class="container" style="min-height:200px; max-width:1000px; border-style: solid; border-width: 0px">

   <div class="row">
        <div class="col-lg-7 col-lg-push-2 col-md-7 col-md-push-2 page-content">
            <div class="inner-box category-content">
                <h3 class="title-2 uppercase text-center"><strong>Feedback Form</strong></h3>
                <hr>

                    <div class="row">
                    <div class="col-sm-12">
                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <fieldset>

                                <div class="alert-success text-center" id="msg"><span></span></div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Name</label>

                                    <div class="col-md-8">
                                        <input id="name" name="name"
                                               class="form-control input-md" required pattern="[A-Za-z  ]+"
                                               placeholder="Enter Alphabetic A To Z Only"
                                               title="Enter Alphabetic A to Z Only" type="text">
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-3 control-label">Company Name</label>

                                    <div class="col-md-8">
                                        <input id="companyname" name="companyname"
                                               class="form-control input-md" required pattern="[A-Za-z  ]+"
                                               placeholder="Enter Alphabetic A To Z Only"
                                               title="Enter Alphabetic A to Z Only" type="text">
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-3 control-label" for="textarea">Contact Number</label>

                                    <div class="col-md-8">
                                        <input id="mobile" name="mobile" placeholder="Enter Mobile Number 10 Digit Only"
                                               title="Enter Mobile Number 10 Digit Only"
                                               class="form-control input-md" required pattern="[0-9]{10}" type="text">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="textarea">Address</label>

                                    <div class="col-md-8">
                                        <textarea class="form-control" id="address" name="address" REQUIRED
                                                  placeholder="Enter Your Address Here"></textarea>
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-3 control-label" for="textarea">Feedback Message</label>

                                    <div class="col-md-8">
                                        <textarea class="form-control" id="feedbackmsg" name="feedbackmsg" REQUIRED
                                                  placeholder="Enter Your Feedback Here"></textarea>
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-3 control-label" for="textarea">Ratings</label>

                                    <div class="col-md-8">
                                         <select name="ratings">
  											<option value="1">1</option>
  											<option value="2">2</option>
  											<option value="3">3</option>
  											<option value="4">4</option>
											<option value="5">5</option>
										</select> / 5
                                    </div>
                                </div>

                                
                                <div class="form-group">
							      <label class="col-md-3 control-label"></label>

                                    <div class="col-md-8"><input type="submit" class="btn btn-primary"
                                                                 name="feedback" id="feedback"
                                                                 value="Submit"></div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                



                    <?php
                            if (isset($_POST["submit"])) {

                               include "connect.php";



                                $name=mysqli_real_escape_string($link,$_POST['name']);
								$companyname=mysqli_real_escape_string($link,$_POST['companyname']);
								$mobile=mysqli_real_escape_string($link,$_POST['mobile']);
                                $address=mysqli_real_escape_string($link,$_POST['address']);
								$feedbackmsg=mysqli_real_escape_string($link,$_POST['feedbackmsg']);
                                $ratings=mysqli_real_escape_string($link,$_POST['ratings']);
								$subject=Feedback;


                                $to      = 'rbtech@rbtechindia.com';
                                $msg = "Name =".$name."\nCompany Name =".$companyname."\nMobile Number =".$mobile."\nAddress =".$address."\nFeedback Message =".$feedbackmsg."\nRatings =".$ratings;


                                mail($to, $subject, $msg);


                                ?>
                                <script type="text/javascript">
                                    alert("Your Message Sent Successfully ");
                                </script>
                                <?php


                            }
             ?>


                </div>
				</div>
        </div>


    </div>

    </div>

<hr>

<?php
include "footer.php";
?>



</body>


</html>