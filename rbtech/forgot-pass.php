<?php
session_start();
?>
<html>
<head>
    <?php
    include "design.php";
    ?>


</head>

<title>Forgot Password | R.B.Tech</title>

<body>
<?php
include "header.php";
?>

<div class="container" style="max-width:1000px; min-height: 290px; border-style: solid; border-width: 0px">


    <div class="row">

        <div class="col-lg-12 col-md-12 col-sm-12 page-content">
            <div class="inner-box category-content">
                <h3 class="title-2 uppercase text-center"><strong><u> Recover Your Password</u></strong></h3>
                <hr>

                <div class="row">
                    <div class="col-lg-12 col-lg-push-1 col-md-12 col-md-push-1 col-sm-12">
                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <fieldset>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Registered Email Id</label>

                                    <div class="col-md-4">
                                        <input id="loginemail" name="loginemail"
                                               placeholder="Enter Your Registered Email Id"
                                               class="form-control input-md" required
                                               pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" type="text">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-md-3 control-label"></label>

                                    <div class="col-md-8 col-xs-12"><input type="submit" class="btn btn-primary"
                                                                           name="forgotpass" id="forgotpass"
                                                                           value="Recover Your Password">&nbsp;&nbsp;&nbsp;&nbsp;
                                        <br><br>
                                        <a href="login.php">Click Here To Login</a>
                                    </div>
                                    <br><br>
                                </div>
                            </fieldset>
                        </form>
                        <?php
                        if (isset($_POST["forgotpass"])) {

                            include "connect.php";

                            $count = 0;
                            $res = mysqli_query($link, "select * from user_detail WHERE email='$_POST[loginemail]'");
                            $count = mysqli_num_rows($res);

                            if ($count == 0) {

                                ?>
                                <div class="form-group">

                                    <div class="col-lg-12 col-lg-push-3 col-md-12 col-md-push-3 col-sm-12"
                                         style="color:red">
                                        <b>This email id does not exist</b>
                                    </div>
                                </div>
                                <?php
                            }
                            else
                            {
                                while($row=mysqli_fetch_array($res))
                                {
                                    $pass=$row["password"];
                                    $msg="your r b tech login password is=".$pass;
                                    mail($_POST["loginemail"],"your r b tech account password",$msg);
                                    ?>
                                    <div class="form-group">

                                        <div class="col-lg-12 col-lg-push-3 col-md-12 col-md-push-3 col-sm-12"
                                             style="color:green">
                                            <b>We send you password in your email.</b>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }

                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>


    </div>

</div>


<?php
include "footer.php";
?>


</body>


</html>