<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <?php include "design.php"; ?>
</head>
<title>View Order Information s| R.B.Tech Admin</title>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><span>Lumino</span>Admin</a>
            <ul class="user-menu">
                <li class="dropdown pull-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <svg class="glyph stroked male-user">
                            <use xlink:href="#stroked-male-user"></use>
                        </svg><?php echo $_SESSION['username'];
                        ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="logout.php">
                                <svg class="glyph stroked cancel">
                                    <use xlink:href="#stroked-cancel"></use>
                                </svg>
                                Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>

    </div><!-- /.container-fluid -->
</nav>
<?php include "sidebar.php"; ?>
<?php
include "../connect.php";
$product_id = $_GET['id'];
mysqli_query($link, "update cart_user_details set read1='y' WHERE id=$product_id");
$res = mysqli_query($link, "select * from cart_user_details WHERE id=$product_id") or die(mysqli_errno($link));
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

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="panel panel-primary ">
        <div class="panel-heading">Customer Details</div>
        <div class="panel-body">
            Name :<?php echo $name; ?><br>
            Email :<?php echo $email; ?><br>
            Address :<?php echo $address; ?><br>
            City :<?php echo $city; ?><br>
            State :<?php echo $state; ?><br>
            Pincode :<?php echo $pincode; ?><br>
            Mobile :<?php echo $mobile; ?><br>
            Order No : <?php echo $product_id; ?>
        </div>

    </div>
</div>
<hr>

<div class="row" style="margin:0px; padding:0px;">
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="panel panel-primary">
            <div class="panel-heading ">Ordered Products</div>
            <div class="panel-body">

                <div class="col-lg-1 col-md-1 col-sm-1  hidden-xs" style="min-height:10px;"><strong>No</strong></div>
                <div class="col-lg-3 col-md-3 col-sm-3  hidden-xs" style="min-height:10px; "><strong>Product
                        Image</strong></div>
                <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs" style="min-height:10px;"><strong>Product Name</strong>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs" style="min-height:10px;"><strong>Price</strong></div>
                <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs" style="min-height:10px; "><strong>Quantity</strong>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs" style="min-height:10px; "><strong>Sub Total</strong>
                </div>


            </div>
            <hr class="hidden-xs">


            <?php
            $sub_total = 0;
            echo $_SESSION['rbtechemail '];
            $res1 = mysqli_query($link, "select * from cart_item where  cart_user_id='$product_id'");
            while ($row1 = mysqli_fetch_array($res1)) {

                $id = $row1['id'];
                $pname = $row1['ptitle'];
                $pimage = $row1['pimage'];
                $pprice = $row1['pprice'];
                $pquantity = $row1['pquantity'];
                $psubtot = $row1['psubtotal'];

                ?>

                <div class="row">

                    <div class="col-lg-1 col-md-1 col-sm-1" style="min-height:10px; text-align: center"><?php echo $id; ?></div>
                    <div class="col-lg-3 col-md-3 col-sm-3" style="min-height:10px; "><img
                            src="../<?php echo $pimage; ?>" class="img-responsive"></div>
                    <div class="col-lg-2 col-md-2 col-sm-2" style="min-height:10px;"><?php echo $pname; ?></div>
                    <div class="col-lg-2 col-md-2 col-sm-2" style="min-height:10px;"><?php echo $pprice; ?></div>
                    <div class="col-lg-2 col-md-2 col-sm-2" style="min-height:10px; "><?php echo $pquantity; ?></div>
                    <div class="col-lg-2 col-md-2 col-sm-2" style="min-height:10px; "><?php echo $psubtot; ?></div>

                </div>

                <hr>
                <?php
                $sub_total = $sub_total + $psubtot;

            } ?>
            <div class="row">

                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-2" style=" "></div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style=" "><strong>Total</strong></div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-5" style=" "><strong><?php echo $sub_total; ?>
                        &#x20b9;</strong></div>
                <br><br>

            </div>
        </div>

    </div>
</div>


<?php
include "footer.php";
?>


</body>


</html>