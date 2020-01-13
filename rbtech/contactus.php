<?php
session_start();
?>
<html>
<head>
    <script src="http://maps.googleapis.com/maps/api/js">
    </script>
    <script>
        function initialize() {
            var mapProp = {
                center:new google.maps.LatLng(23.0386729,72.6885927),
                zoom:10,
                mapTypeId:google.maps.MapTypeId.ROADMAP
            };
            var map=new google.maps.Map(document.getElementById("googleMap"), mapProp);

            var location = new google.maps.LatLng(23.0386729,72.6885927);
            var marker = new google.maps.Marker({
                position: location,
                map: map
            });

        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>

    <?php
    include "design.php";
    ?>
    <title>Contact Us | R.B.Tech</title>
</head>
<body>
<?php
include "header.php";
?>

<div class="container" id="image1" style="max-width:1000px; height:auto; margin: 0px; padding: 0px; border-style: solid; border-width: 0px; z-index: 0;">

    <img src="images/contact-us.jpg" class="img img-responsive" style="margin: 0px; padding: 0px;">

    <?php
    include "companymenu.php";
    ?>

    <div class="col-lg-4 col-md-8 " >
        <h5 class="text-center" style="font-size: 26px; color: #0066cc"><u>Contact Us</u></h5>
        <br>
        <h5><strong>Factory Address:</strong></h5>
        <img src="images/logotext.jpg" class="img img-responsive ">
        <p>43, Victoria Industrial Park,<br>
            Kathwada GIDC, Road #5,<br>
            Sardar Patel Ring Road,<br>
            Kathwada,<br>
            Ahmedabad 382-430<br>
            GUJARAT, INDIA
        </p>
        <br>

        <h5><strong>Office Address :</strong></h5>
        <img src="images/logotext.jpg" class="img img-responsive ">
        <p>43,Victoria Industrial Park,<br>
            Road No.5, Kathwada G.I.D.C.,<br>
            S.P.Ring Road, Ahmedabad - 382-430<br>
            Gujarat, India.
        </p>

        <p>Phone : +91-6544-8862<br>
        Mobile : +91-98796-71986</p>
        <p>Email :
            <a href="mailto:rbtech@rbtechindia.com" class="paratextCopy">rbtech@rbtechindia.com</a>
        </p>
        <p>Web :
            <a href="http://www.rbtechindia.com" target="_blank" class="paratextCopy">www.rbtechindia.com</a>
        </p>
    </div>

    <div class="col-lg-4 col-md-8 " >
        <br><Br>
        <div id="googleMap" style="width:100%;height:200px;"></div>
    </div>

</div>


<?php
include "footer.php";
?>



</body>


</html>