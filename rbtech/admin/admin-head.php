<?php
include "../connect.php";
$new_order=0;
$res=mysqli_query($link,"select * from cart_user_details where read1='n'");
$new_order=mysqli_num_rows($res);


$total_user=0;
$res1=mysqli_query($link,"select * from user_detail");
$total_user=mysqli_num_rows($res1);

$total_products=0;
$res2=mysqli_query($link,"select * from products");
$total_products=mysqli_num_rows($res2);


?>
<div class="row">
    <div class="col-xs-12 col-md-6 col-lg-3">
        <div class="panel panel-blue panel-widget ">
            <div class="row no-padding">
                <div class="col-sm-3 col-lg-5 widget-left">
                    <svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>
                </div>
                <div class="col-sm-9 col-lg-7 widget-right">
                    <div class="large"><?php echo $new_order; ?></div>
                    <div class="text-muted">New Orders</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-6 col-lg-3">
        <div class="panel panel-teal panel-widget">
            <div class="row no-padding">
                <div class="col-sm-3 col-lg-5 widget-left">
                    <svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
                </div>
                <div class="col-sm-9 col-lg-7 widget-right">
                    <div class="large"><?php echo $total_user; ?></div>
                    <div class="text-muted">Total Users</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-6 col-lg-3">
        <div class="panel panel-red panel-widget">
            <div class="row no-padding">
                <div class="col-sm-3 col-lg-5 widget-left">
                    <svg class="glyph stroked app-window-with-content"><use xlink:href="#stroked-app-window-with-content"></use></svg>
                </div>
                <div class="col-sm-9 col-lg-7 widget-right">
                    <div class="large"><?php echo $total_products; ?></div>
                    <div class="text-muted">Total Products</div>
                </div>
            </div>
        </div>
    </div>
</div>