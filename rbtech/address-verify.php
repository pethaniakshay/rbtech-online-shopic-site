<?php
session_start();
if($_SESSION["checkout"]!="yes" || $_SESSION["cart_item"]!="yes" || $_SESSION["rbtechemail"]=="")
{
    ?>
    <script type="text/javascript">
        window.location="product.php";
    </script>
    <?php
}
else {
    $_SESSION["address_verify"]="yes";
    ?>
    <html>
    <head>
        <?php
        include "design.php";
        ?>
    </head>
    <title>Verify Your Detail | R.B.Tech</title>

    <body>
    <?php
    include "header.php";
    ?>

    <?php
    include "connect.php";

    $res = mysqli_query($link, "select * from user_detail WHERE email='$_SESSION[rbtechemail]'") or die(mysqli_errno($link));
    while ($row = mysqli_fetch_array($res)) {
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

        <h3 class="title-2 uppercase text-center"><strong><u>Verify Your Details</u></strong></h3>

        <div class="col-lg-6 col-md-6">
            <div class="inner-box category-content">


                <div class="panel panel-primary">
                    <div class="panel-heading">Your Details</div>
                    <div class="panel-body">
                        Name :<?php echo $name; ?><br>
                        Email :<?php echo $email; ?><br>
                        Address :<?php echo $address; ?><br>
                        City :<?php echo $city; ?><br>
                        State :<?php echo $state; ?><br>
                        Pincode :<?php echo $pincode; ?><br>
                        Mobile :<?php echo $mobile; ?>

                        <br><br>

                        <div class="form-group">

                            <div class="col-lg-6 col-md-6"><a href="payment.php" class="btn btn-primary">Continue </a>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>


        <div class="col-lg-6 col-md-6">
            <div class="inner-box category-content">


                <div class="panel panel-primary">
                    <div class="panel-heading">Edit Details</div>
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
                                                       class="form-control input-md" required pattern="[A-Za-z]+"
                                                       type="text">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="textarea">State</label>

                                            <div class="col-md-8">
                                                <input id="state" name="state" value="<?php echo $state; ?>"
                                                       class="form-control input-md" required pattern="[A-Za-z]+"
                                                       type="text">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="textarea">Pincode</label>

                                            <div class="col-md-8">
                                                <input id="pincode" name="pincode" value="<?php echo $pincode; ?>"
                                                       class="form-control input-md" required pattern="[0-9]{6}"
                                                       type="text">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="textarea">Mobile Number</label>

                                            <div class="col-md-8">
                                                <input id="mobile" name="mobile" value="<?php echo $mobile; ?>"
                                                       class="form-control input-md" required pattern="[0-9]{10}"
                                                       type="text">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label"></label>

                                            <div class="col-md-8"><input type="submit" class="btn btn-primary"
                                                                         name="save" id="submit"
                                                                         value="Save & Continue"></div>
                                        </div>
                                    </fieldset>
                                </form>
                                <?php
                                if (isset($_POST["save"])) {

                                    include "connect.php";

                                    mysqli_query($link, "update user_detail set address='$_POST[address]', city='$_POST[city]',state='$_POST[state]',pincode='$_POST[pincode]',mobile='$_POST[mobile]' WHERE email='$_SESSION[rbtechemail]'") or die(mysqli_errno($link));

                                    ?>
                                    <script type="text/javascript">
                                        window.location = "payment.php";
                                    </script>
                                    <?php


                                }
                                ?>
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
    <?php
}
    ?>