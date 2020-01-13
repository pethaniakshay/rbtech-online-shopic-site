<?php
session_start();
?>
<html>
<head>
<?php
include "design.php";
?>
    <title>Welcome to R.B.Tech</title>
    <audio autoplay>
        <source src="water.mp3" type="audio/mpeg">

    </audio>
</head>
<body>
<?php
include "header.php";
include "slider.php";
?>

<hr>
<div class="container" style="min-height:200px; max-width:1000px; border-style: solid; border-width: 0px">
    <div class="col-lg-12 col-xs-12 text-justify">

    <?php
    include "connect.php";
    $res=mysqli_query($link,"select * from home_description");
    while($row=mysqli_fetch_array($res))
    {
        echo $row['home_description'];
    }

    ?>

    </div>
</div>
<hr>

<?php
include "footer.php";
?>



</body>


</html>