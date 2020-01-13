<?php
session_start();
if($_SESSION["checkout"]!="yes" || $_SESSION["cart_item"]!="yes" || $_SESSION["rbtechemail"]=="" || $_SESSION["address_verify"]!="yes" && $_SESSION["payment"]!="yes")
{
    ?>
    <script type="text/javascript">
        window.location="product.php";
    </script>
    <?php
}
else {

    date_default_timezone_set("Asia/Kolkata");
    $date = date("d/m/y");
    $time = date("h:m:s");


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
    $read = "n";
    mysqli_query($link, "insert into cart_user_details(id,name,email,address,city,state,pincode,mobile,order_date,order_time,read1) values (NULL,'$name','$email','$address','$city','$state','$pincode','$mobile','$date','$time','$read')");


    $res1 = mysqli_query($link, "select * from cart_user_details order by id desc limit 1");
    while ($row1 = mysqli_fetch_array($res1)) {
        $order_id = $row1['id'];

    }

    if (isset($_COOKIE['item'])) {
        foreach ($_COOKIE['item'] as $name => $value) {
            $values = explode("__", $value);
            $img = $values[0];
            $title = $values[1];
            $price = $values[2];
            $qty = $values[3];
            $sub_tot = $values[2] * $values[3];
$title=mysqli_real_escape_string($link,$title);
            mysqli_query($link, "insert into cart_item(id,cart_user_id,email,ptitle,pimage,pprice,pquantity,psubtotal) values (NULL,'$order_id','$email','$title','$img','$price','$qty','$sub_tot')");

        }
    }


    $_SESSION['checkout'] = "";
    $_SESSION['sub_total'] = "";
    $_SESSION['cookie_product_name'] = "";
    $_SESSION["cart_item"] = "";
    $_SESSION["address_verify"] = "";
    $_SESSION["payment"] = "";


    if (isset($_COOKIE['item'])) {
        foreach ($_COOKIE['item'] as $name => $value) {
            setcookie("item[$name]", "", time() - 3600);
        }
    }


    ?>

    <script type="text/javascript">

        window.location = "my-orders.php";

    </script>
    <?php
}
?>