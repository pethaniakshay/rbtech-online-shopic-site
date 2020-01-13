<?php
include "connect.php";

if($_GET["email"]!="") {

    $email = $_GET["email"];
    $count_email = 0;
    $res = mysqli_query($link, "select email from user_detail where email='$email'");
    $count_email = mysqli_num_rows($res);
    echo $count_email;
}


    ?>