<?php
session_start();
?>
<html>
<head>
    <?php
    include "design.php";
    ?>
</head>
<title>Payment Failed | R.B.Tech</title>
<body>
<?php
include "header.php";
?>



<div class="container" style="max-width:1000px; min-height: 320px; border-style: solid; border-width: 0px">


    <div class="col-lg-12 col-md-12">
        <div class="inner-box category-content">


            <div class="panel panel-primary">
                <div class="panel-body" style="min-height:220px; margin-top: 70px;">
                    <div class="form-group text-center">

                        <div class="col-md-12 col-sm-12">
                            <center><img src="images/warning.png" class="img img-responsive " style="max-height: 80px; max-width: 80px;"
                            </center>  <center><h3 class="col-lg-12 control-label text-center">Your Payment Not Successful</h3></center>


                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>





</div>


<?php
include "footer.php";
?>



</body>


</html>