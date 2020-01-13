<?php
session_start();
if($_SESSION["rbtechemail"]=="")
{
    ?>
    <script type="text/javascript">
        window.location="login.php";
    </script>

    <?php
}
include "design.php";
?>

<html>
<head>
</head>

<title>Upadte Profile | R.B.Tech</title>

<body>
<?php
include "header.php";
?>

<?php
include "connect.php";

$res = mysqli_query($link, "select * from user_detail WHERE email='$_SESSION[rbtechemail]'") or die(mysqli_errno($link));
while ($row = mysqli_fetch_array($res)) {
    $password = $row['password'];
    $name = $row['name'];
    $email = $row['email'];
    $address = $row['address'];
    $city = $row['city'];
    $state = $row['state'];
    $pincode = $row['pincode'];
    $mobile = $row['mobile'];
}
?>

<div class="container" style="max-width:1000px; border-style: solid; border-width: 0px">


    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="inner-box category-content">


                <div class="panel panel-primary">
                    <div class="panel-heading">Update Profile</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                                    <fieldset>

                                        <div class="alert-success text-center" id="msg"><span></span></div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="textarea">Address</label>

                                            <div class="col-md-8">
                                                <textarea class="form-control" id="address" required
                                                          name="address"><?php echo $address; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="textarea">City</label>

                                            <div class="col-md-8">
                                                <input id="city" name="city" value="<?php echo $city; ?>"
                                                       class="form-control input-md" required pattern="[A-Za-z]+" type="text">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="textarea">State</label>

                                            <div class="col-md-8">
                                                <input id="state" name="state" value="<?php echo $state; ?>"
                                                       class="form-control input-md" required pattern="[A-Za-z]+" type="tex">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="textarea">Pincode</label>

                                            <div class="col-md-8">
                                                <input id="pincode" name="pincode" value="<?php echo $pincode; ?>"
                                                       class="form-control input-md" required pattern="[0-9]{6}" type="text">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="textarea">Mobile Number</label>

                                            <div class="col-md-8">
                                                <input id="mobile" name="mobile" value="<?php echo $mobile; ?>"
                                                       class="form-control input-md" required pattern="[0-9]{10}" type="text">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label"></label>

                                            <div class="col-md-8"><input type="submit" class="btn btn-primary"
                                                                         name="updateprofile" id="submit"
                                                                         value="Update Profile"></div>
                                        </div>
                                    </fieldset>
                                </form>
                                <?php
                                if (isset($_POST["updateprofile"])) {

                                    include "connect.php";

                                    mysqli_query($link, "update user_detail set address='$_POST[address]', city='$_POST[city]',state='$_POST[state]',pincode='$_POST[pincode]',mobile='$_POST[mobile]' WHERE email='$_SESSION[rbtechemail]'") or die(mysqli_errno($link));

                                    ?>

                                    <?php
                                    echo "<center>";
                                    echo "<b>";
                                    echo "Your Profile Updated Successfully";
                                    echo "</b>";
                                    echo "</center>";
                                }
                                ?>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6">
            <div class="inner-box category-content">


                <div class="panel panel-primary">
                    <div class="panel-heading">Update Password</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                                    <fieldset>

                                        <div class="form-group">
                                            <label class="col-md-5 control-label" for="textarea">Old Password</label>

                                            <div class="col-md-7">
                                                <input id="oldpass" name="oldpass" placeholder="Enter Your Old Password" title="Enter Valid Old Password"
                                                       class="form-control input-md" required pattern="[A-Za-z0-9]{5,20}" type="password">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-5 control-label" for="textarea">New Password</label>

                                            <div class="col-md-7">
                                                <input id="newpass" name="newpass" placeholder="Enter Your New Password" title="Enter New Password alphanumeric between 5 to 20"
                                                       class="form-control input-md" required pattern="[A-Za-z0-9]{5,20}" type="password">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-5 control-label" for="textarea">Confirm
                                                Password</label>

                                            <div class="col-md-7">
                                                <input id="confpass" name="confpass"
                                                       placeholder="Enter Your New Password Again"
                                                       class="form-control input-md" required pattern="[A-Za-z0-9]{5,20}" title="Enter New Password alphanumeric between 5 to 20" type="password">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label"></label>

                                            <div class="col-md-8"><input type="submit" class="btn btn-primary"
                                                                         name="updatepassword" id="submit"
                                                                         value="Update Password"></div>
                                        </div>
                                    </fieldset>
                                </form>
                                <?php
                                include "connect.php";

                                if (isset($_POST["updatepassword"])) {
                                    $oldpass = md5($_POST['oldpass']);
                                    $newpass = md5($_POST['newpass']);
                                    $confpass = md5($_POST['confpass']);

                                    if ($password == $oldpass) {
                                        if ($newpass == $confpass) {

                                            mysqli_query($link, "update user_detail set password='$confpass' WHERE email='$_SESSION[rbtechemail]'") or die(mysqli_errno($link));
                                            echo "<center>";
                                            echo "<b>";
                                            echo "Your Password Sucuessfully Changed";
                                            echo "</b>";
                                            echo "</center>";
                                        } else {
                                            echo "<center>";
                                            echo "<b>";
                                            echo "Please Confirm Password";
                                            echo "</b>";
                                            echo "</center>";

                                        }

                                    } else {
                                        echo "<center>";
                                        echo "<b>";
                                        echo "Password Doesn't Match";
                                        echo "</b>";
                                        echo "</center>";

                                    }
                                }

                                ?>
                            </div>
                        </div>

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