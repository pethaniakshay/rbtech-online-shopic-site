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
<title>View Orders  | R.B.Tech</title>
<?php
include "header.php";
?>

<?php
include "connect.php";

$res = mysqli_query($link,"select * from user_detail WHERE email='$_SESSION[rbtechemail]'")or die(mysqli_errno($link));
while ($row = mysqli_fetch_array($res))
{
    $name=$row['name'];
    $email=$row['email'];
    $address=$row['address'];
    $city=$row['city'];
    $state=$row['state'];
    $pincode=$row['pincode'];
    $mobile=$row['mobile'];
}
?>

<div class="container" style="min-height:100px; max-width: 1000px; border-style: solid; border-width: 0px; ">
    <div class="panel panel-primary text-center">
        <div class="panel-heading">Your Order Details</div>
        <div class="panel-body">
            Name :<?php echo $name;?><br>
            Email :<?php echo $email;?><br>
            Address :<?php echo $address;?><br>
            City :<?php echo $city;?><br>
            State :<?php echo $state;?><br>
            Pincode :<?php echo $pincode;?><br>
            Mobile :<?php echo $mobile;?><br>
            Order No. :<?php echo $_GET['view_order'];?>
        </div>

    </div>
    <hr>

    <div class="row hidden-xs">

        <div class="col-lg-1 col-md-1 col-sm-1  hidden-xs" style="min-height:10px;"><strong>No</strong></div>
        <div class="col-lg-3 col-md-3 col-sm-3  hidden-xs" style="min-height:10px; "><strong>Product Image</strong></div>
        <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs" style="min-height:10px;"><strong>Product Name</strong></div>
        <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs" style="min-height:10px;"><strong>Price</strong></div>
        <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs" style="min-height:10px; "><strong>Quantity</strong></div>
        <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs" style="min-height:10px; "><strong>Sub Total</strong></div>


    </div>
    <hr class="hidden-xs">
    <form name="form1" action="" method="post">



        <?php
        include "connect.php";
        $sub_total=0;
        echo $_SESSION['rbtechemail '];
        $res1 = mysqli_query($link,"select * from cart_item where email='$_SESSION[rbtechemail]' && cart_user_id='$_GET[view_order]'");
        while ($row1 = mysqli_fetch_array($res1))
        {

            $id=$row1['id'];
            $pname=$row1['ptitle'];
            $pimage=$row1['pimage'];
            $pprice=$row1['pprice'];
            $pquantity=$row1['pquantity'];
            $psubtot=$row1['psubtotal'];

            ?>

            <div class="row">

                <div class="col-lg-1 col-md-1 col-sm-1" style="min-height:10px;"><?php echo $id;?></div>
                <div class="col-lg-3 col-md-3 col-sm-3" style="min-height:10px; "><img src="<?php echo $pimage;?>" class="img-responsive"></div>
                <div class="col-lg-2 col-md-2 col-sm-2" style="min-height:10px;"><?php echo $pname;?></div>
                <div class="col-lg-2 col-md-2 col-sm-2" style="min-height:10px;"><?php echo $pprice;?></div>
                <div class="col-lg-2 col-md-2 col-sm-2" style="min-height:10px; "><?php echo $pquantity;?></div>
                <div class="col-lg-2 col-md-2 col-sm-2" style="min-height:10px; "><?php echo $psubtot;?></div>

            </div>

            <hr>
            <?php
            $sub_total=$sub_total+$psubtot;

         } ?>

</div>
<div class="row">

    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-2" style=" "></div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style=" "><strong>Total</strong></div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-5" style=" "><strong><?php echo $sub_total; ?> &#x20b9;</strong></div>
    <br><br>

</div>

    </form>


    <?php
    include "footer.php";
    ?>



</body>


</html>