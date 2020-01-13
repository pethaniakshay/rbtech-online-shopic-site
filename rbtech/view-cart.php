<?php
session_start();
$_SESSION["error1"] = "";
if (isset($_COOKIE['item']))  //this is for check cookies are available or nor
{
    $count_data = 0;
    foreach ($_COOKIE['item'] as $name1 => $value)   //this is for looping as per cookies if 3 cookies then loop move 3 times
    {
        $count_data = $count_data + 1;
        //$name1 variable return 1,2,3,4 so i use this for buton and textbox name
        if (isset($_POST["submit$name1"]))   //this is for checking update button pressed or not
        {
            $new_value = $_POST["text$name1"];    // this is for getting values from textbox

            if (!preg_match("/^[0-9]+$/", $new_value)) {
                $_SESSION["error1"] = "please enter only numeric value in Quantity";
            } else {


                if ($new_value == 0)   // if value found 0 then delete cookies
                {
                    setcookie("item[$name1]", "", time() - 1800);
                    ?>
                    <script type="text/javascript">window.location = "view-cart.php";</script> <?php

                } else   // this is for if user press more than 1 then this is useful for updating data
                {

                    $values11 = explode("__", $value);
                    $img1 = $values11[0];
                    $nm1 = $values11[1];
                    $prize1 = $values11[2];
                    $total1 = $prize1 * $new_value;

                    $tb_id = $values11[5];


                    setcookie("item[$name1]", $img1 . "__" . $nm1 . "__" . $prize1 . "__" . $new_value . "__" . $total1 . "__" . $tb_id, time() + 1800);
                    $_SESSION["error1"] = "";
                    ?>
                    <script type="text/javascript">window.location = "";</script> <?php

                }


            }
        }


        //this is for if user press delete button
        if (isset($_POST["delete$name1"]))   //this is for checking update button pressed or not
        {

            setcookie("item[$name1]", "", time() - 1800);
            ?>
            <script type="text/javascript">window.location = "view-cart.php";</script> <?php
        }


        //this is testing only

        /*if (isset($_POST["text$name1"]))   //this is for checking update button pressed or not
        {
            $new_value = $_POST["text$name1"];    // this is for getting values from textbox

            if (!preg_match("/^[0-9]+$/", $new_value)) {
                $_SESSION["error1"] = "please enter only numeric value in Quantity";
            } else {


                if ($new_value == 0)   // if value found 0 then delete cookies
                {
                    setcookie("item[$name1]", "", time() - 1800);
                    ?>
                    <script type="text/javascript">window.location = "view-cart.php";</script> <?php

                } else   // this is for if user press more than 1 then this is useful for updating data
                {

                    $values11 = explode("__", $value);
                    $img1 = $values11[0];
                    $nm1 = $values11[1];
                    $prize1 = $values11[2];
                    $total1 = $prize1 * $new_value;

                    $tb_id = $values11[5];


                    setcookie("item[$name1]", $img1 . "__" . $nm1 . "__" . $prize1 . "__" . $new_value . "__" . $total1 . "__" . $tb_id, time() + 1800);
                    $_SESSION["error1"] = "";
                    ?>
                    <script type="text/javascript">window.location = "";</script> <?php

                }


            }
        }*/


        //end here testing


    }

}
?>
<html>
<head>
    <?php
    include "design.php";
    ?>

    <style>
        .table > tbody > tr > td, .table > tfoot > tr > td {
            vertical-align: middle;
        }

        @media screen and (max-width: 600px) {
            table#cart tbody td .form-control {
                width: 20%;
                display: inline !important;
            }

            .actions .btn {
                width: 36%;
                margin: 1.5em 0;
            }

            .actions .btn-info {
                float: left;
            }

            .actions .btn-danger {
                float: right;
            }

            table#cart thead {
                display: none;
            }

            table#cart tbody td {
                display: block;
                padding: .6rem;
                min-width: 320px;
            }

            table#cart tbody tr td:first-child {
                background: #333;
                color: #fff;
            }

            table#cart tbody td:before {
                content: attr(data-th);
                font-weight: bold;
                display: inline-block;
                width: 8rem;
            }

            table#cart tfoot td {
                display: block;
            }

            table#cart tfoot td .btn {
                display: block;
            }

        }
    </style>


</head>

<title>View Cart | R.B.Tech</title>

<body>
<?php
include "header.php";

?>

<?php
if ($count_data == 0) {
    ?>
    <div class="container" style="max-width:1000px; height: 200px;">
        <center><h3>No data available in cart</h3></center>
    </div>
    <?php
} else {

    ?>
    <div class="container" style="min-height:100px; max-width: 1000px; border-style: solid; border-width: 0px; ">
        <h3>Shopping Cart</h3>
        <hr>
        <div class="row">

            <div class="col-lg-1 col-md-1 col-sm-1  hidden-xs" style="min-height:10px;"><strong>Item No</strong></div>
            <div class="col-lg-2 col-md-2 col-sm-2  hidden-xs" style="min-height:10px; "><strong>Product Image</strong>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-2 hidden-xs" style="min-height:10px;"><strong>Product Title</strong>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 hidden-xs" style="min-height:10px;"><strong>Price</strong></div>
            <div class="col-lg-2 col-md-2 col-sm-3 hidden-xs" style="min-height:10px; "><strong>Quantity</strong></div>
            <div class="col-lg-1 col-md-1 col-sm-1 hidden-xs" style="min-height:10px; "><strong>Subtotal</strong></div>
            <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs" style="min-height:10px; "></div>


        </div>
        <?php

        ?>
        <hr>
        <form name="form1" action="" method="post">
            <?php

            $sub_total = 0;
            $_SESSION["cookie_product_name"] = "";
            if (isset($_COOKIE['item'])) {
                $count = 0;
                foreach ($_COOKIE['item'] as $name => $value) {
                    $values = explode("__", $value);
                    $count = $count + 1;
                    ?>
                    <div class="row">

                        <div class="col-lg-1 col-md-1 col-sm-1 " style=" "><strong><?php echo $count; ?></strong></div>
                        <div class="col-lg-2 col-md-2 col-sm-2" style=" "><img src="<?php echo $values[0]; ?>" alt="..."
                                                                               class="img-responsive"/></div>
                        <div class="col-lg-3 col-md-3 col-sm-2" style=" "><h4
                                class="nomargin"><?php echo $values[1]; ?></h4>
                        </div>
                        <div class="col-lg-1 col-md-1 col-sm-1" style=" "><?php echo $values[2]; ?> ₹
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-3" style=" "><input name="text<?php echo $name ?>"
                                                                                 value="<?php echo $values[3]; ?>"
                                                                                 type="number"
                                                                                 class="form-control text-center"
                                                                                 value="1">
                        </div>
                        <div class="col-lg-1 col-md-2 col-sm-1" style=" "><?php echo $values[2] * $values[3]; ?> ₹</div>
                        <div class="col-lg-2 col-md-2 col-sm-2" style="">
                            <button type="submit" name="submit<?php echo $name ?>"
                                    class="btn btn-info btn-sm">

                                <i
                                    class="fa fa-refresh"></i>


                            </button>
                            <button type="submit" name="delete<?php echo $name ?>" class="btn btn-danger btn-sm">
                                <i
                                    class="fa fa-trash-o"></i>
                            </button>
                        </div>


                    </div>
                    <hr>

                    <?php

                    $sub_total = $sub_total + $values[4];
                    if ($_SESSION["cookie_product_name"] == "") {
                        $_SESSION["cookie_product_name"] = $values[1];
                    } else {
                        $_SESSION["cookie_product_name"] = $_SESSION["cookie_product_name"] . "," . $values[1];
                    }
                }
            }

            $_SESSION["sub_total"] = $sub_total;
            ?>

            <hr>
            <div class="row">

                <div class="col-lg-7 col-md-7 col-sm-8 " style=" "><a href="#" class="btn btn-warning"><i
                            class="fa fa-angle-left"></i> Continue Shopping</a></div>


                <div class="col-lg-1 col-md-1 col-sm-2 col-xs-2 col-lg-push-1 " style=" "><strong><h4>Total</h4></strong></div>
                <div class="col-lg-2 col-md-2 col-sm-1 col-xs-5 col-lg-push-1" style=" "><h4><?php echo $sub_total; ?>
                        &#x20b9;</h4></div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"><a href="checkout.php"
                                                                     class="btn btn-info">Checkout</a>
                </div>

            </div>
            <div class="col-lg-12 col-lg-push-9 col-md-12 col-sm-12"> <p style="color: red; font-weight: bold; ">*Above Rs. 400 Delivery is Free.</p></div>

            <br><br>
        </form>

    </div>

    <?php
}
$_SESSION["cart_count"]="0";
if (isset($_COOKIE['item'])) {
    $count = 0;
    foreach ($_COOKIE['item'] as $name => $value)
    {
        $count=$count+1;
    }
    $_SESSION["cart_count"]=$count;

}
include "footer.php";


?>


</body>


