<?php
session_start();
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"rbtechindia");
$_SESSION["er"] = "";  //changes
if(isset($_POST["submit1"]))
{
    $_SESSION["er"] = "Your Item successfully added in cart"; //changes
    $d = 0;
    if (isset($_COOKIE['item'])) //this is for checking cookies available or not
    {
        foreach ($_COOKIE['item'] as $name => $value) {
            $d = $d + 1;
        }
        $d = $d + 1;
    } else {
        $d = $d + 1;
    }

//to get item description from table
    $res3 = mysqli_query($link, "select * from products WHERE pnum='$_GET[pnum]'");
    while ($row3 = mysqli_fetch_array($res3)) {
        $img1 = $row3["pimage"];
        $nm = $row3["pname"];
        $prize = $row3["pprice"];
        $qty = $_POST["qty1"];
        $total = $prize * $qty;
        $tb_id = $row3["pnum"];

    }




    if (isset($_COOKIE['item']))  //this is for check cookies are available or nor
    {
        foreach ($_COOKIE['item'] as $name1 => $value)   //this is for looping as per cookies if 3 cookies then loop move
        {
            $values11 = explode("__", $value);
            $found = 0;
            if ($img1 == $values11[0])      //this is for check same cookies available or not if available then increase qty
            {


//check here for quantity add in the cart for more than available quantity
                $found = $found + 1;
                $qty=$values11[3]+$_POST["qty1"];
                $total=$values11[2]*$qty;
                setcookie("item[$name1]",$img1."__".$nm."__".$prize."__".$qty."__".$total."__".$tb_id,time()+1800);

                ?>
                <!--- <script type="text/javascript">window.location = "view-cart.php";</script> --->
                <script type="text/javascript">
                    alert("Your Product Added Successfully To The Cart");
                </script> <?php


            }

        }

        if ($found == 0) {

            setcookie("item[$d]", $img1 . "__" . $nm . "__" . $prize . "__" . $qty . "__" . $total . "__" . $tb_id, time() + 1800);//new

            //this is for if 2 cookies available and when you add new cookies then this run
            ?>
            <script type="text/javascript">
                alert("Your Product Added Successfully To The Cart");
                </script> <?php

        }

    } else   // this execute when item not found so this enter new item means cookie blank 0 cookies
    {
        setcookie("item[$d]", $img1 . "__" . $nm . "__" . $prize . "__" . $qty . "__" . $total . "__" . $tb_id, time() + 1800);//new
        ?>
        <script type="text/javascript">
            alert("Your Product Added Successfully To The Cart");
        </script> <?php
    }

}
?>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <?php
    include "design.php";
    ?>
    <script type="text/javascript">
        // Quantity spin buttons
        function increase_by_one(field) {
            nr = parseInt(document.getElementById(field).value);
            document.getElementById(field).value = nr + 1;
        }

        function decrease_by_one(field) {
            nr = parseInt(document.getElementById(field).value);
            if (nr > 0) {
                if ((nr - 1) > 0) {
                    document.getElementById(field).value = nr - 1;
                }
            }
        }
    </script>
    <!-- css-->
    <style type="text/css">
        /**THE SAME CSS IS USED IN ALL 3 DEMOS**/
        /**gallery margins**/
        ul.gallery{
            margin-left: 3vw;
            margin-right:3vw;
        }

        .zoom {
            -webkit-transition: all 0.35s ease-in-out;
            -moz-transition: all 0.35s ease-in-out;
            transition: all 0.35s ease-in-out;
            cursor: -webkit-zoom-in;
            cursor: -moz-zoom-in;
            cursor: zoom-in;
        }

        .zoom:hover,
        .zoom:active,
        .zoom:focus {
            /**adjust scale to desired size,
            add browser prefixes**/
            -ms-transform: scale(2.5);
            -moz-transform: scale(2.5);
            -webkit-transform: scale(2.5);
            -o-transform: scale(2.5);
            transform: scale(2.5);
            position:relative;
            z-index:9999;
        }

        /**To keep upscaled images visible on mobile,
        increase left & right margins a bit**/
        @media only screen and (max-width: 768px) {
            ul.gallery {
                margin-left: 15vw;
                margin-right: 15vw;
            }

            /**TIP: Easy escape for touch screens,
            give gallery's parent container a cursor: pointer.**/
            .DivName {cursor: pointer}
        }
    </style>
    <!-- emd here-->

</head>

<title>Product Description | R.B.Tech</title>


<?php
$res = mysqli_query($link, "select * from products WHERE pnum='$_GET[pnum]'");
while ($row = mysqli_fetch_array($res)) {
    $pnum = $row["pnum"];
    $pname = $row["pname"];
    $pdescription = $row["pdescription"];
    $pfeatures = $row["pfeatures"];
    $pwidth = $row["pwidth"];
    $pheight = $row["pheight"];
    $pflavor = $row["pflavor"];
    $pibnum = $row["pibnum"];
    $pibtype = $row["pibtype"];
    $pobnum = $row["pobnum"];
    $pprice = $row["pprice"];
    $pdiscount = $row["pdiscounts"];
    $pimage = $row["pimage"] ;
    $main_category=$row["main_category_name"];

}
?>
<body>
<?php
include "header.php";

?>

<form name="form1" action="" method="post">
    <div class="container" id="product-section"
         style="max-width:1000px; min-height:460px; border-style: solid; border-width: 0px;">
        <div class="row">

            <div class="col-md-6">
                <img src="<?php echo $pimage; ?>"  class="img img-responsive img thumbnail zoom"
                />
            </div>

            <div class="col-md-6">

                <div class="row">
                    <div class="col-md-12">
                        <h1><?php echo $pname; ?></h1>
                    </div>
                </div><!-- end row -->

                <div class="row">
                    <div class="col-md-12">
                        <span class="label label-primary">Product Code</span>
                        <span class="label label-info">No. <?php echo $pnum; ?></span>
                    </div>
                </div><!-- end row -->

                <div class="row">
                    <div class="col-md-12">
                        <p class="description"><br>
                            <?php echo $pdescription; ?>
                        </p>
                    </div>
                </div><!-- end row -->

                <div class="row">
                    <div class="col-md-12">
                        <p class="description">
                        <h4>Size : <?php echo $pwidth;
                            echo " X ";
                            echo $pheight; ?> mm</h4>
                        </p>
                    </div>
                </div><!-- end row -->

                <div class="row">
                    <div class="col-md-12">
                        <p class="description">
                        <h4>Flavor : <?php echo $pflavor; ?></h4>
                        </p>
                    </div>
                </div><!-- end row -->


                <?php
                if($main_category!="OEM")
                {

                    ?>
                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <h3 class="product-price">&#8377; <?php echo $pprice."/-"; ?>
                                <?php
                                $va=str_replace("*","",$pdiscount);
                                $dd=($pprice*$va)/100;
                                $dd=round($dd);
                                $fi=$pprice+$dd;

                                ?>
                                <strike style="color: red; font-size: medium;">&#8377;<?php echo $fi; ?></strike>

                            </h3>
                        </div>
                        <div class="col-md-12 col-lg-4 ">
                            <h3><span class="label label-primary" style="border-radius: 50%;"><?php echo $pdiscount . "% OFF"; ?></span></h3>
                        </div>
                    </div>
                    <div class="row add-to-cart">
                        <div class="col-md-5 product-qty">
                    <span class="btn btn-default btn-lg btn-qty" onclick="increase_by_one('qty1');">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </span>

                            <input name="qty1" class="btn btn-default btn-lg btn-qty" id="qty1" value="1"/>

                            <span class="btn btn-default btn-lg btn-qty" onclick="decrease_by_one('qty1');">
                    <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                    </span>
                        </div>

                        <div class="col-md-4">

                            <input type="submit" name="submit1" value="Add to Cart"
                                   class="btn btn-lg btn-brand btn-full-width">

                            </input>
                        </div>
                    </div><!-- end row -->


                    <?php

                }
                ?>











                <div class="row">
                    <div class="col-md-12">
                        <p class="description"><br>
                            Packaging Of Inner Box : <?php echo $pibnum;
                            echo " ";
                            echo $pibtype; ?><br>
                            Packaging Of Outer Box : <?php echo $pobnum; ?> IB/OB
                        </p>
                    </div>
                </div>

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#description"
                           aria-controls="description"
                           role="tab"
                           data-toggle="tab"
                        >Description</a>
                    </li>
                    <li role="presentation">
                        <a href="#features"
                           aria-controls="features"
                           role="tab"
                           data-toggle="tab"
                        >Features</a>
                    </li>

                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="description">
                        <p class="top-10">
                            <?php echo $pdescription; ?>
                        </p>
                    </div>
                    <div role="tabpanel" class="tab-pane top-10" id="features">
                        <p class="top-10">
                            <?php echo $pfeatures; ?>
                        </p>
                    </div>
                </div>

            </div>


        </div><!-- end row -->
    </div><!-- end container -->

</form>
<?php include "footer.php"; ?>

</body>


</html>