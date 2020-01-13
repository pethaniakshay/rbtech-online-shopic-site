<?php
include "connect.php";
?>
<link href="http://www.jqueryscript.net/css/jquerysctipttop1.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="nivo-slider/themes/default/default.css" type="text/css" media="screen" />
<link rel="stylesheet" href="nivo-slider/nivo-slider.css" type="text/css" media="screen" />




    <div id="wrapper">
        <div class="slider-wrapper theme-default">
            <div id="slider" class="nivoSlider">
<?php
$res=mysqli_query($link,"select * from galleryphoto order by id desc");
while($row=mysqli_fetch_array($res))
{
    ?>

                <img src="<?php echo $row["photo"]; ?>" data-thumb="<?php echo $row["photo"]; ?>"/>

<?php

}
?>



        </div>
    </div>





<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="nivo-slider/jquery.nivo.slider.js"></script>
<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
</script>