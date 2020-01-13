<?php
session_start();
?>
<html>
<head>
    <?php
    include "design.php";
    ?>


</head>

<title>Login | R.B.Tech</title>

<body>
<?php
include "header.php";
?>

<div class="container" style="max-width:1000px; border-style: solid; border-width: 0px">


    <div class="row">

        <div class="col-lg-6 col-lg-push-3 col-md-6 col-md-push-3 page-content">
            <div class="inner-box category-content">
                <h3 class="title-2 uppercase text-center"><strong><u> Login</u></strong></h3>
                <hr>

                <div class="row">
                    <div class="col-sm-12">
                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <fieldset>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Email Id</label>

                                    <div class="col-md-8">
                                        <input id="loginemail" name="loginemail" placeholder="Enter Your Registered Email Id" title="Enter Your Registered Email Id"
                                               class="form-control input-md" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" type="text">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Password</label>

                                    <div class="col-md-8">
                                        <input id="loginpassword" name="loginpassword" placeholder="Enter Your Password" title="Enter Your Valid Password"
                                               class="form-control input-md" required pattern="[A-Za-z0-9]{5,20}" type="password">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-md-3 control-label"></label>

                                    <div class="col-md-8"><input type="submit" class="btn btn-primary" name="login" id="login"
                                                                 value="Login">&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="forgot-pass.php">Forgot Password ?</a>
                                    </div><br><br>
                                    <div class="col-md-8 col-xs-push-3">
                                    <a href="registration.php" name="regiter" id="register"
                                       value="Register">Click Here To Register</a>
                                        </div>
                                </div>
                            </fieldset>
                        </form>
                        <?php
                        if (isset($_POST["login"])) {

                            include "connect.php";
                            $loginpass=md5($_POST['loginpassword']);

                            $res = mysqli_query($link,"select * from user_detail WHERE (email='$_POST[loginemail]') && password='$loginpass'");
                            $count = 0;
                        while ($row = mysqli_fetch_array($res))
                        {
                            $_SESSION['rbtechname']=$row['name'];
                            $_SESSION['rbtechemail']=$row['email'];
                            $count = 1;

                            if($_SESSION["checkout"]=="yes")
                        { ?>
                            <script type="text/javascript">
                                window.location = "address-verify.php";
                            </script>
                        <?php
                        }
                            else
                        { ?>
                            <script type="text/javascript">
                                window.location = "my-orders.php";
                            </script>
                        <?php
                        }



                        }
                        if ($count == 0) {
                        ?>
                            <script type="text/javascript">

                                alert("Username or Password Doesn't Match");</script>
                            <?php
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