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
?>
<html>
<head>
    <?php
    include "design.php";
    ?>
</head>
<body>
<title>My Orders | R.B.Tech</title>
<?php
include "header.php";
?>
<?php
include "connect.php";
echo $_SESSION['rbtechemail '];
$res3 = mysqli_query($link,"select * from cart_user_details where email='$_SESSION[rbtechemail]'");
$order_count = mysqli_num_rows($res3);
if($order_count==0)
{
    ?>
    <div class="container" style="min-height:300px; max-width: 1000px; border-style: solid; border-width: 0px; ">

        <h3 class="text-center">No Orders Found</h3>

    </div>
<?php
}
else
{


?>

<div class="container" style="min-height:100px; max-width: 1000px; border-style: solid; border-width: 0px; ">
    <h3>My Orders</h3>
    <hr>
    <div class="row hidden-xs">

        <div class="col-lg-2 col-md-2 col-sm-2  hidden-xs" style="min-height:10px;"><strong>Order No</strong></div>
        <div class="col-lg-3 col-md-3 col-sm-3  hidden-xs" style="min-height:10px; "><strong>Name</strong></div>
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs" style="min-height:10px;"><strong>Order Date</strong></div>
        <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs" style="min-height:10px;"><strong>Order Time</strong></div>
        <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs" style="min-height:10px; "><strong>View Detail</strong></div>


    </div>
    <hr class="hidden-xs">
        <?php
        include "connect.php";


                        $res = mysqli_query($link, "select * from cart_user_details where email='$_SESSION[rbtechemail]' ORDER BY id DESC ");
                        while ($row = mysqli_fetch_array($res)) {

                            $order_id = $row['id'];
                            $name = $row['name'];
                            $order_date = $row['order_date'];
                            $order_time = $row['order_time'];

                            ?>

                            <div class="row">

                                <div class="col-lg-2 col-md-2 col-sm-2 "
                                     style="min-height:10px;"><?php echo $order_id; ?></div>
                                <div class="col-lg-3 col-md-3 col-sm-3 "
                                     style="min-height:10px; "><?php echo $name; ?></div>
                                <div class="col-lg-3 col-md-3 col-sm-3 "
                                     style="min-height:10px;"><?php echo $order_date; ?></div>
                                <div class="col-lg-2 col-md-2 col-sm-2 "
                                     style="min-height:10px;"><?php echo $order_time; ?></div>
                                <div class="col-lg-2 col-md-2 col-sm-2 " style="min-height:10px; "><a
                                        href="view-order.php?view_order=<?php echo $order_id; ?>" class="btn btn-info">View
                                        Detail</a></div>


                            </div>


                            <hr>

                        <?php }



        ?>

</div>



<?php
}
include "footer.php";
?>



</body>


</html>