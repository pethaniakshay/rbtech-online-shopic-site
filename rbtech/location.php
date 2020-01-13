<?php
session_start();
?>
<html>
<head>
    <?php
    include "design.php";
    ?>
    <title>Location | R.B.Tech</title>
</head>
<body>
<?php
include "header.php";
?>

<div class="container" id="image1" style="max-width:1000px; height:auto; margin: 0px; padding: 0px; border-style: solid; border-width: 0px; z-index: 0;">

    <img src="images/Location.jpg" class="img img-responsive" style="margin: 0px; padding: 0px;">

    <?php
    include "companymenu.php";
    ?>

    <div class="col-lg-8 col-md-8 text-center" style="padding: 10px;">
        <h5 class="text-center" style="font-size: 26px; color: #0066cc"><u>Location</u></h5>
     <br>
        <h5 class="text-center" style="font-size: 24px; color: #0066cc">Factory Location</h5>
        <img src="images/factorymap.jpg" class="img img-responsive img-thumbnail img-rounded center-block">

        <hr>

        <h5 class="text-center" style="font-size: 24px; color: #0066cc">Corporate Office Location</h5>
        <img src="images/officemap.jpg" class="img img-responsive img-thumbnail img-rounded center-block">

    </div>

</div>
<hr>

<?php
include "footer.php";
?>


</body>


</html>