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

<title>Product | R.B.Tech</title>


<body>

<?php
include "header.php";
include "slider.php";

?>
<!---- Product Layout--->

<?php
if ($_GET["category"] == "All Products")
{

?>
<div class="container" id="products"
     style="max-width:1000px; border-style: solid; border-width: 0px;">

    <div class="item">
        <div class="col-lg-12">


            <?php
            $category = $_GET["category"];

            $res1 = mysqli_query($link, "select distinct sub_category_name from products where main_category_name='OEM'");
            while ($row1 = mysqli_fetch_array($res1))
            {


            $res = mysqli_query($link, "select * from products where main_category_name='OEM' && sub_category_name='$row1[sub_category_name]'");


            $count = 0;
            while ($row = mysqli_fetch_array($res))
            {
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
            $main_category = $row["main_category_name"];

            ?>


            <div class="col-sm-6 col-md-4">

                <?php
                if ($main_category != "OEM") {

                if ($count == 1) {
                    ?>
                    <div class="well well-sm">
                        <strong><?php echo $_GET['category']; ?></strong>

                    </div>

                    <?php

                }


                ?>
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
                                    <label>&#x20b9; <?php echo $pprice; ?></label></h3>
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

                            <?php
                            }

                            ?>
                            <?php
                            if ($main_category == "OEM")
                            {
                            ?>
                            <div class="thumbnail" style="min-height:250px">
                                <img src="<?php echo $pimage; ?>"
                                     style="max-height:150px; max-width:214px; "
                                     class="img-responsive zoom">
                                <div class="caption">
                                    <div class="row">
                                        <div class="col-md-6 col-xs-6 col-lg-12">
                                           
                                            <br><br>
                                            <center><a class="btn btn-success btn-product">
                                                    <?php echo $pname; ?></a></center>
                                        </div>

                                        <?php

                                        }
                                        ?>

                                    </div>


                                    <p></p>
                                </div>
                            </div>
                        </div>
                        <!----End For Single Product---->


                        <?php
                        }
                        }
                        ?>
                    </div>

                </div>

            </div>
            <!----End For Single Product---->


            <?php


            }
            else
            {


            ?>


            <div class="container" id="products"
                 style="max-width:1000px; border-style: solid; border-width: 0px;">
                <div class="well well-sm">
                    <strong><?php echo $_GET['category']; ?></strong>

                </div>
                <div class="item">
                    <div class="col-lg-12">


                        <?php
                        $category = $_GET["category"];
                        if ($category == "") {
                            $page = $_GET["page"];

                            if ($page == "" || $page == "1") {
                                $start = "0";
                            } else {
                                $start = ($page * 10) - 10;

                            }

                            $res = mysqli_query($link, "select * from products where main_category_name='Oasis' limit $start,10");

                        } else {

                            $res = mysqli_query($link, "select * from products where sub_category_name='$category'");

                        }


                        while ($row = mysqli_fetch_array($res))
                        {
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
                        $main_category = $row["main_category_name"];

                        ?>
                        <!----For Single Product---->

                        <div class="col-sm-6 col-md-4">

                            <?php
                            if ($main_category != "OEM") {

                            ?>
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

                                        <?php
                                        }

                                        ?>
                                        <?php

                                        if ($main_category == "OEM")
                                        {
                                        ?>
                                        <div class="thumbnail" style="min-height:250px">
                                            <img src="<?php echo $pimage; ?>"
                                                 style="max-height:150px; max-width:214px; "
                                                 class="img-responsive zoom">
                                            <div class="caption">
                                                <div class="row">
                                                    <div class="col-md-6 col-xs-6 col-lg-12">

                                                        <br><br>
                                                        <center><a class="btn btn-success btn-product">
                                                                <?php echo $pname; ?></a></center>
                                                    </div>

                                                    <?php

                                                    }
                                                    ?>

                                                </div>


                                                <p></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!----End For Single Product---->


                                    <?php
                                    }
                                    ?>
                                </div>

                            </div>

                        </div>
                        <?php
                        }

                        ?>

                        <?php
                        if ($_GET["category"] == "") {
                            $prev = $_GET["page"];
                            if ($prev > 1) {
                                $prev = $prev - 1;
                            }
                            ?>
                            <center>
                                <nav aria-label="Page navigation">
                                    <ul class="pagination">
                                        <li class="page-item">
                                            <a class="page-link"
                                               href="product.php?page=<?php echo $prev; ?>"
                                               aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                        </li>
                                        <?php
                                        $tot = 0;
                                        $res = mysqli_query($link, "select * from products where main_category_name='Oasis'");
                                        $tot = mysqli_num_rows($res);
                                        $tot = $tot / 10;
                                        $tot = ceil($tot);

                                        for ($i = 1; $i <= $tot; $i++) {
                                            ?>
                                            <li class="page-item"><a class="page-link"
                                                                     href="product.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                        <?php
                                        $next = $_GET["page"];
                                        if ($next < $tot) {
                                            $next = $next + 1;
                                        }
                                        ?>
                                        <li class="page-item">
                                            <a class="page-link"
                                               href="product.php?page=<?php echo $next; ?>"
                                               aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </center>
                            <?php
                        }
                        ?>


                        <!--</div>-->
                        <!---- End sProduct Layout--->

                        <?php
                        include "footer.php";
                        ?>

</body>


</html>