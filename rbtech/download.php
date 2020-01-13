<?php
session_start();
?>
<html>
<head>
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
            z-index:100;
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

    <?php
    include "design.php";
    ?>
    <title>Download | R.B.Tech</title>


</head>
<body>
<?php
include "header.php";
?>

<div class="container" id="image1" style="max-width:1000px; min-height:350px; margin: 0px; padding: 0px; border-style: solid; border-width: 0px; z-index: 0;">

    <img src="images/contact-us.jpg" class="img img-responsive" style="margin: 0px; padding: 0px;">

    <?php
    include "companymenu.php";
    ?>

    <div class="col-lg-8 col-md-8" style="padding: 10px;">
        <h5 class="text-center" style="font-size: 26px; color: #0066cc"><u>Download</u></h5><br>
        <p align="center">
            <div class="col-lg-6">
           <a href="pdf/rbtech.pdf"> <img src="pdf/rbtech.jpg" style="max-height: 250px;" class="img img-responsive img-thumbnail img-rounded"></a><br>
                <a href="pdf/rbtech.pdf" style="font-size: 15px;">Click Here To Download</a>
        </div>
        <div class="col-lg-6">
            <a href="pdf/ad.pdf"> <img src="pdf/ad.jpg" style="max-height: 250px;"  class="img img-responsive img-thumbnail img-rounded"></a><br>
            <a href="pdf/ad.pdf" style="font-size: 15px;">Click Here To Download</a>

        </p>
            </div>


</div>
    </div>

<hr>
<?php
include "footer.php";
?>


</body>


</html>