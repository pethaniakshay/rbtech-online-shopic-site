<html>
<head>
    <?php
    include "design.php";
    ?>


</head>

<title>Registration | R.B.Tech</title>

<body>
<?php
include "header.php";
?>

<div class="container" style="max-width:1000px; border-style: solid; border-width: 0px">


    <div class="row">
        <div class="col-lg-7 col-lg-push-2 col-md-7 col-md-push-2 page-content">
            <div class="inner-box category-content">
                <h3 class="title-2 uppercase text-center"><strong> Registration</strong></h3>
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
                                    <label class="col-md-3 control-label" for="textarea">Password</label>

                                    <div class="col-md-8">
                                        <input id="password" name="password"
                                               placeholder="Alphanumeric Only Between 5 To 20 Character"
                                               title="Alphanumeric Only Between 5 To 20 Character"
                                               class="form-control input-md" required pattern="[A-Za-z0-9]{5,20}"
                                               type="password">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="textarea">Address</label>

                                    <div class="col-md-8">
                                        <textarea class="form-control" id="address" name="address" REQUIRED
                                                  placeholder="Enter Your Shipping Address Here"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="textarea">City</label>

                                    <div class="col-md-8">
                                        <input id="city" name="city" placeholder="Enter City Name A To Z Only"
                                               title="Enter City Name A To Z Only"
                                               class="form-control input-md" required pattern="[A-Za-z]+" type="text">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="textarea">State</label>

                                    <div class="col-md-8">
                                        <input id="state" name="state" placeholder="Enter State A to Z only"
                                               title="Enter State A To Z only"
                                               class="form-control input-md" required pattern="[A-Za-z]+" type="text">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="textarea">Pincode</label>

                                    <div class="col-md-8">
                                        <input id="pincode" name="pincode" placeholder="Enter Pincode 6 Digit Only"
                                               title="Enter Pincode 6 Digit Only"
                                               class="form-control input-md" required pattern="[0-9]{6}" type="text">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="textarea">Mobile Number</label>

                                    <div class="col-md-8">
                                        <input id="mobile" name="mobile" placeholder="Enter Mobile Number 10 Digit Only"
                                               title="Enter Mobile Number 10 Digit Only"
                                               class="form-control input-md" required pattern="[0-9]{10}" type="text">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label"></label>

                                    <div class="col-md-8"><input type="submit" class="btn btn-primary"
                                                                 name="registration" id="registration"
                                                                 value="Register"></div>
                                </div>
                            </fieldset>
                        </form>
                        <?php
                        if (isset($_POST["registration"])) {

                            include "connect.php";
                            $pass = md5($_POST['password']);

                            mysqli_query($link, "insert into user_detail (id,name,email,password,address,city,state,pincode,mobile)values (NULL,'$_POST[name]','$_POST[email]','$pass','$_POST[address]','$_POST[city]','$_POST[state]','$_POST[pincode]','$_POST[mobile]')") or die(mysqli_errno($link));


                            ?>
                            <script type="text/javascript">
                                document.getElementById("msg").innerHTML = "<h4>Registration Sucuess, please wait we redirect you in login page.</h4>";
                                setTimeout(function () {
                                    document.getElementById("msg").innerHTML = "";
                                    window.location = "login.php";
                                }, 5000);
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


<?php
include "footer.php";
?>
<script type="text/javascript">
    function check_email() {
        var str = document.getElementById("email").value;
        if (str.length == 0) {
            document.getElementById("email_check").innerHTML = "";
            button_disable_enable();
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    var found_user = xmlhttp.responseText;

                    if (found_user == 0) {
                        document.getElementById("email_check").innerHTML = "this email is available for you";
                        document.getElementById("email_check").style.color = "green";
                    }
                    else {
                        document.getElementById("email_check").innerHTML = "this email is already registered";
                        document.getElementById("email_check").style.color = "red";
                    }
                    button_disable_enable();

                }
            };
            xmlhttp.open("GET", "registration_check.php?email=" + document.getElementById("email").value, true);
            xmlhttp.send();
        }

    }

    function button_disable_enable() {
        var email = document.getElementById("email_check").innerHTML;

        if (email == "") {
            document.getElementById("registration").disabled = false;
        }

        else if (email == "this email is available for you") {

            document.getElementById("registration").disabled = false;
        }
        else {
            document.getElementById("registration").disabled = true;
        }

    }

</script>
</body>


</html>