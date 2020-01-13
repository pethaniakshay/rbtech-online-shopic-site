<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
<title>Login | R.B.Tech Admin</title>
</head>

<body>

<div class="row">
    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">Admin Log in</div>
            <div class="panel-body">
                <form role="form" name="login" method="post" action="">
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" required placeholder="Username" name="username" type="text" autofocus="">
                        </div>
                        <div class="form-group">
                            <input class="form-control" required placeholder="Password" name="password" type="password" value="">
                        </div>
                        <div class="checkbox">

                        </div>
                        <input type="submit" name="login" id="login" value="login" class="btn btn-primary">
                    </fieldset>
                </form>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->
<?php

if (isset($_POST["login"])) {
    include "../connect.php";
    $username=mysqli_real_escape_string($link,$_POST['username']);
    $password=mysqli_real_escape_string($link,$_POST['password']);


    $res = mysqli_query($link,"select * from admin_login WHERE username='$username' && password='$password'")or die();
    $count = 0;
while ($row = mysqli_fetch_array($res))
{
    $_SESSION['username'] = $row['username'];
    $count = 1;
    ?>
    <script type="text/javascript">
        window.location = "admin-home.php";
    </script>
<?php
}
if ($count == 0) {
?>
    <script type="text/javascript">

        alert("Username or Password Doesn't Match");</script>
    <?php
}


}
?>


<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/chart.min.js"></script>
<script src="js/chart-data.js"></script>
<script src="js/easypiechart.js"></script>
<script src="js/easypiechart-data.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script>
    !function ($) {
        $(document).on("click","ul.nav li.parent > a > span.icon", function(){
            $(this).find('em:first').toggleClass("glyphicon-minus");
        });
        $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
    }(window.jQuery);

    $(window).on('resize', function () {
        if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
    })
    $(window).on('resize', function () {
        if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
    })
</script>
</body>

</html>
