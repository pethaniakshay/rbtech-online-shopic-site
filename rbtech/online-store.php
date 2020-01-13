<?php
session_start();
include "connect.php";
?>


<html>
<head>
    <?php
    include "design.php";
    ?>

    <style type="text/css">
        /**THE SAME CSS IS USED IN ALL 3 DEMOS**/
        /**gallery margins**/
        ul.gallery {
            margin-left: 3vw;
            margin-right: 3vw;
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
            position: relative;
            z-index: 9999;
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
            .DivName {
                cursor: pointer
            }
        }
    </style>


</head>

<title>Online Store | R.B.Tech</title>


<body>

<?php
include "header.php";
include "slider.php";

?>
<!---- Product Layout--->


<div class="container" id="products"
     style="max-width:1000px; border-style: solid; border-width: 0px;">
<?php
    $res1 = mysqli_query($link, "select distinct sub_category_name from products where main_category_name='Oasis'");
    while($row1=mysqli_fetch_array($res1)) {


        $res = mysqli_query($link, "select * from products where main_category_name='Oasis' && sub_category_name='$row1[sub_category_name]'");


        $count = 0;
        while ($row = mysqli_fetch_array($res)) {

            $count = $count + 1;

            if ($count == 1) {
                ?>

                <div class="col-lg-12">
                    <div class="well well-sm">
                        <strong><?php echo $row["sub_category_name"]; ?></strong>

                    </div>
                </div>
                <?php

            }

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
            $pimage = $row["pimage"];

?>
    <div class="col-sm-6 col-md-4">

        <div class="thumbnail" style="min-height:370px">

            <img src="<?php echo $pimage; ?>"
                 style="max-height:150px; max-width:214px; "
                 class="img-responsive zoom">


        <div class="caption">


            <div class="row">


                <div class="col-md-6 col-xs-6 col-lg-12">
                    <h3><?php echo $pname; ?></h3>
                </div>
                <div class="col-md-6 col-xs-6 col-lg-12 price">
                    <h3>
                        <label>&#x20b9; <?php echo $pprice . "/-"; ?></label></h3>
                </div>
                <div class="col-md-6 col-xs-6 col-lg-12">
                    <p><strong>Size :</strong> <?php echo $pwidth;
                        echo "x";
                        echo $pheight; ?>mm</p>
                </div>

                <div class="col-md-6">
                    <a href="product-description.php?pnum=<?php echo $pnum; ?>"
                       class="btn btn-success btn-product"><i class="fa fa-bars"
                                                              aria-hidden="true"></i>
                        View Detail</a>
                </div>
            </div>

        </div>
        </div>
    </div>

    <?php


        }
    }
?>





    </div>
<hr>

                        <!--</div>-->
                        <!---- End sProduct Layout--->

                        <?php
                        include "footer.php";
                        ?>

</body>


</html>