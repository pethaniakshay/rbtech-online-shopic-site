<?php
include "connect.php";
?>


<div class="container" style="max-width:1000px; height:auto;  padding:0px; -webkit-box-shadow: 0px 0px 5px 5px rgba(227,223,227,1);
-moz-box-shadow: 0px 0px 5px 5px rgba(227,223,227,1);
box-shadow: 0px 0px 5px 5px rgba(227,223,227,1);">
<div class="container" style="max-width:1000px; height:auto; border-style: solid; border-width: 0px;">

    <div class="row" style="background-color:#fbfcfe">

        <div class="col-lg-12"
             style="min-height:82px; background-image:url('images/topbg.png'); background-repeat: no-repeat;margin: 0px; padding: 0px; background-color:#fbfcfe">
       <div class="col-lg-12 col-xs-12" style="min-height: 20px; margin-top:5px;">
                <div class="col-lg-5 col-lg-push-7 col-xs-12 col-md-push-6 col-sm-push-3" id="main_menu">

                    <ul class="col-xs-12">
                        <li><a href="index.php">Home</a></li>
                        <li> |</li>
                        <li><a href="contactus.php">Contact&nbsp;Us </a></li>
                        <li>|</li>
                        <li><a href="customer-support.php">Customer Support</a></li>
                        <li>|</li>
                        <li><a href="view-cart.php"><i class="fa fa-shopping-cart" aria-hidden="true" ></i>&nbsp;cart(<label id="cart_item" ></label>)</a></li>
                    </ul>

                </div>
            </div>
            <br>

            <div class="col-lg-4 col-md-4" style="min-height: 62px;">
                <center>
                    <a href="index.php"><img src="images/logo.png" style="margin-top: 5px;"></a>
                </center>
            </div>






            <!-- this is for menu-->
            <div style="height:40px">
            <div class="col-lg-8 col-md-8 col-sm-push-0 col-lg-push-0"
                 style="max-height: 62px; max-width:750px; z-index: 9999;  ">

                <nav class="navbar navbar-inverse" style=" 
background: rgba(4,98,176,1);
background: -moz-linear-gradient(top, rgba(4,98,176,1) 0%, rgba(6,80,167,1) 12%, rgba(6,64,167,1) 71%, rgba(6,60,167,1) 76%, rgba(6,48,167,1) 90%);
background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(4,98,176,1)), color-stop(12%, rgba(6,80,167,1)), color-stop(71%, rgba(6,64,167,1)), color-stop(76%, rgba(6,60,167,1)), color-stop(90%, rgba(6,48,167,1)));
background: -webkit-linear-gradient(top, rgba(4,98,176,1) 0%, rgba(6,80,167,1) 12%, rgba(6,64,167,1) 71%, rgba(6,60,167,1) 76%, rgba(6,48,167,1) 90%);
background: -o-linear-gradient(top, rgba(4,98,176,1) 0%, rgba(6,80,167,1) 12%, rgba(6,64,167,1) 71%, rgba(6,60,167,1) 76%, rgba(6,48,167,1) 90%);
background: -ms-linear-gradient(top, rgba(4,98,176,1) 0%, rgba(6,80,167,1) 12%, rgba(6,64,167,1) 71%, rgba(6,60,167,1) 76%, rgba(6,48,167,1) 90%);
background: linear-gradient(to bottom, rgba(4,98,176,1) 0%, rgba(6,80,167,1) 12%, rgba(6,64,167,1) 71%, rgba(6,60,167,1) 76%, rgba(6,48,167,1) 90%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#0462b0', endColorstr='#0630a7', GradientType=0 );
">
                    <div class="container-fluid" style="margin:0px; padding:0px;    ">
                        <div class="navbar-header" >
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand hidden-lg hidden-md hidden-sm " href="#" style="color:White">Menu</a>
                        </div>
                        <div class="collapse navbar-collapse" id="myNavbar"
                             style="max-width:750px; min-height:40px; overflow:hidden;  font-weight: bold; font-size: 16px; margin:0px; padding:0px; ">
                            <ul class="nav navbar-nav" id="menu">


                                <li><a href="greeting.php">About Us</a></li>
                                <!--<li class="hidden-xs"><a href="#">|</a></li>-->

                                <?php
                                $res = mysqli_query($link, "select * from main_category");
                                while ($row = mysqli_fetch_array($res)) {
                                    ?>
                                    <li class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown"
                                           href="#"><?php if($row["main_category_name"]=="Oasis"){echo "Products";}else{echo $row["main_category_name"];} ?>
                                            <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <?php
                                            $mainid = $row["id"];
                                           // echo $mainid;
                                            $count = 0;
                                            $res1 = mysqli_query($link, "select * from sub_category where main_category_id=$mainid");
                                            $count = mysqli_num_rows($res1);
                                            while ($row1 = mysqli_fetch_array($res1)) {
                                                $sub_cat = mysqli_real_escape_string($link,$row1["sub_category_name"]);

                                                $sub_id = $row1["id"];
                                               // echo $sub_id;
                                                $count1 = 0;
                                                $res2 = mysqli_query($link, "select * from sub_sub_category where sub_category_id=$sub_id");
                                                $count1 = mysqli_num_rows($res2);
                                                ?>
                                                <li class="<?php if ($count1 > 0) {
                                                    echo "dropdown-submenu";
                                                } ?>">
                                                    <a style="color: black;" tabindex="-1"
                                                       href="product.php?category=<?php echo $row1["sub_category_name"]; ?>"><?php echo $row1["sub_category_name"]; ?></a>
                                                    <ul class="dropdown-menu">
                                                        <?php


                                                        $count1 = 0;
                                                        $res2 = mysqli_query($link, "select * from sub_sub_category where sub_category_id=$sub_id");
                                                        $iid = "";
                                                        while ($row2 = mysqli_fetch_array($res2)) {
                                                            $sub_category_name2 = mysqli_real_escape_string($link,$row2["sub_sub_category_name"]);
    /*echo "<font color='red'>";
                                                            echo $sub_cat.",".$sub_category_name2;
                               echo "</font>";*/
                                                            $res4 = mysqli_query($link, "select pnum from products where sub_category_name='$sub_cat' && sub_sub_category_name='$sub_category_name2' ");
                                                            while ($row4 = mysqli_fetch_array($res4)) {
                                                                $iid = $row4["pnum"];
                                                            }
                                                            ?>
                                                            <li><a tabindex="-1"
                                                                   href="product-description.php?pnum=<?php echo $iid; ?>"
                                                                   style="color: black;"><?php echo $row2["sub_sub_category_name"]; ?></a>
                                                            </li>

                                                            <?php

                                                        }

                                                        ?>

                                                    </ul>
                                                </li>

                                                <?php
                                            }
                                            ?>




                                            <?php


                                            ?>

                                        </ul>
                                    </li>

                                    <?php

                                }


                                ?>


                                <!--<li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">OEM
                                        <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li> <a style="color: black;" tabindex="-1" href="product-description.php?pnum=8">VarieTea</a>

                                        </li>
                                    </ul>
                                </li>-->
                                <?php

                                $fu_name="";
                                if(isset($_SESSION["rbtechname"]))
                                {
                                    $fu_name=explode(" ",$_SESSION["rbtechname"]);

                                }


                                ?>
                                <li><a href="online-store.php">Online Store</a></li>

                                

                                <li><a href="download.php">Download</a></li>
								<li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <?php if(!isset($_SESSION["rbtechname"])){echo "User";}else{echo $fu_name[0];} ?>
                                        <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <?php
                                        if(!isset($_SESSION["rbtechname"]))
                                        {
                                            ?>
                                            <li><a href="login.php" style="color:black">Login</a></li>
                                            <li><a href="registration.php" style="color:black">SignUp</a></li>
                                            <?php

                                        }
                                        else
                                        {
                                            ?>
                                            <li><a href="update-profile.php" style="color:black">Update Profile</a></li>
                                            <li><a href="my-orders.php" style="color:black">My Orders</a></li>
                                            <li><a href="logout.php" style="color:black">Logout</a></li>
                                            <?php

                                        }
                                        ?>




                                    </ul>
                                </li>

                            </ul>

                        </div>
                    </div>
                </nav>


            </div>
            </div>
            <!-- end here-->















        </div>


    </div>

</div>
<script type="text/javascript">
setInterval(function(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "cookies_count.php", false);
    xmlhttp.send(null);
    var tot = xmlhttp.responseText;
    document.getElementById("cart_item").innerHTML = tot;
},500)


</script>
