<?php
session_start();
?>
<html>
<head>
    <?php
    include "design.php";
    ?>
    <title>Organization | R.B.Tech</title>
</head>
<body>
<?php
include "header.php";
?>

<div class="container" id="image1" style="max-width:1000px; height:auto; margin: 0px; padding: 0px; border-style: solid; border-width: 0px; z-index: 0;">

    <img src="images/Organisation.jpg" class="img img-responsive" style="margin: 0px; padding: 0px;">

    <?php
    include "companymenu.php";
    ?>

    <div class="col-lg-8 col-md-8 text-center" style="padding: 10px;">
        <h5 class="text-center" style="font-size: 26px; color: #0066cc"><u>Organisation</u></h5>
        <br>

        <img src="images/organizationchart.jpg" class="img img-thumbnail img-rounded img-responsive center-block">


    </div>

</div>

<hr>
<?php
include "footer.php";
?>


</body>


</html>