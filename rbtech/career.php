<?php
session_start();
?>
<html>
<head>
<?php
include "design.php";
?>
    <title>Career | R.B.Tech</title>
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
                <h3 class="title-2 uppercase text-center"><strong>Career</strong></h3>
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
                                    <label class="col-md-3 control-label" for="textarea">Email Id</label>

                                    <div class="col-md-8">
                                        <input id="email" name="email" placeholder="Enter Your Valid Email Id"
                                               title="Enter Your Valid Email Id"
                                               class="form-control input-md" autocomplete="off" required
                                               pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" type="email"
                                               onkeyup="check_email();">
                                        <div id="email_check"></div>
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-3 control-label" for="textarea">Gender</label>

                                    <div class="col-md-8">
                                         <select name="gender">
  											<option value="male">Male</option>
  											<option value="female">Female</option>
										</select>
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-3 control-label" for="textarea">Attach Resume</label>

                                    <div class="col-md-8">
                                        <input type="file" name="resume">
                                    </div>
                                </div>				

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="textarea">Introduction</label>

                                    <div class="col-md-8">
                                        <textarea class="form-control" id="introduction" name="introduction" REQUIRED
                                                  placeholder="Enter Your Introduction Here"></textarea>
                                    </div>
                                </div>				

                                
                                <div class="form-group">
							      <label class="col-md-3 control-label"></label>

                                    <div class="col-md-8"><input type="submit" class="btn btn-primary"
                                                                 name="career" id="career"
                                                                 value="Submit"></div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                



                    <?php
                            if (isset($_POST["submit"]) && isset($_FILES['resume'])) {

                               include "connect.php";



                                $name=mysqli_real_escape_string($link,$_POST['name']);
								$email=mysqli_real_escape_string($link,$_POST['email']);
								$gender=mysqli_real_escape_string($link,$_POST['gender']);
                                $introduction=mysqli_real_escape_string($link,$_POST['introduction']);
								
								$subject=Career;


                                $to      = 'rbtech@rbtechindia.com';
								$from = 'noreply@rbtechindia.com';
								
								//Get uploaded file data
    							$file_tmp_name    = $_FILES['resume']['tmp_name'];
    							$file_name        = $_FILES['resume']['name'];
    							$file_size        = $_FILES['resume']['size'];
    							$file_type        = $_FILES['resume']['type'];
    							$file_error       = $_FILES['resume']['error'];

    							if($file_error > 0)
    								{
        								die('Upload error or No files uploaded');
    								}
    							
								//read from the uploaded file & base64_encode content for the mail
    							$handle = fopen($file_tmp_name, "r");
    							$content = fread($handle, $file_size);
    							fclose($handle);
    							$encoded_content = chunk_split(base64_encode($content));

        						$boundary = md5("sanwebe");
        						//header
        						$headers = "MIME-Version: 1.0\r\n"; 
        						$headers .= "From:".$from."\r\n"; 
        						$headers .= "Reply-To: ".$email."" . "\r\n";
        						$headers .= "Content-Type: multipart/mixed; boundary = $boundary\r\n\r\n"; 
        
        						//plain text 
        						$body = "--$boundary\r\n";
        						$body .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
        						$body .= "Content-Transfer-Encoding: base64\r\n\r\n"; 
        						$body .= chunk_split(base64_encode($introduction));
								
								$body = "--$boundary\r\n";
        						$body .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
        						$body .= "Content-Transfer-Encoding: base64\r\n\r\n"; 
        						$body .= chunk_split(base64_encode($gender)); 
        
        						//attachment
        						$body .= "--$boundary\r\n";
        						$body .="Content-Type: $file_type; name=".$resume."\r\n";
        						$body .="Content-Disposition: attachment; filename=".$resume."\r\n";
        						$body .="Content-Transfer-Encoding: base64\r\n";
        						$body .="X-Attachment-Id: ".rand(1000,99999)."\r\n\r\n"; 
        						$body .= $encoded_content; 
    
    							mail($to, $subject, $body, $headers);

								
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