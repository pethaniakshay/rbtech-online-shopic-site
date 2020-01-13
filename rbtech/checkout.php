<?php
session_start();
if($_SESSION["cart_count"]==0)
{
    ?>
    <script type="text/javascript">
        window.location="product.php";
    </script>

    <?php

}
else
{
    $_SESSION["checkout"]="yes"; //this is for login page is value is available then after login forward in checkout pricess otherwise on dashboard
    $_SESSION["cart_item"]="yes";
    if(!isset($_SESSION['rbtechname']))
    { ?>
        <script type="text/javascript">
            window.location="login.php";
        </script>
        <?php
    }

    else
    { ?>
        <script type="text/javascript">
            window.location="address-verify.php";
        </script>
        <?php
    }
}
?>
