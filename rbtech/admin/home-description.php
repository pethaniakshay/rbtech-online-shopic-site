<?php
session_start();

?>
    <!DOCTYPE html>
    <html>
    <head>
        <?php include "design.php"; ?>
        <script src="http://cdn.tinymce.com/4/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea' });</script>
    </head>
    <title>Add Home Description | R.B.Tech Admin</title>

<body>
<?php

include "../connect.php";

$res = mysqli_query($link,"select * from home_description")or die(mysqli_errno($link));
while ($row = mysqli_fetch_array($res)) {
    $home_description=$row['home_description'];
}
?>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><span>Lumino</span>Admin</a>
            <ul class="user-menu">
                <li class="dropdown pull-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg><?php echo $_SESSION['username'];
                        ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="logout.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>

    </div><!-- /.container-fluid -->
</nav>
<?php include "sidebar.php"; ?>
<!--/.sidebar-->

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">


    <div class="row">
        <div class="col-lg-12">
            <br>
        </div>
    </div><!--/.row-->


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Add HomePage Description</div>
                <div class="panel-body">
                    <div class="row">
                        <form name="homedescription" method="post" action="" method="post">
                        <div class="form-group">

                            <textarea name="add_desc" style="min-height:300px;"><?php echo $home_description; ?></textarea>

                        </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>

                        <div class="col-md-8"><input type="submit" class="btn btn-primary" name="submit" id="submit"
                                                     value="Update Detail"></div>
                    </div>
                    </div>
                    <?php

                    if(isset($_POST['submit']))
                    {
                        include "../connect.php";
                        mysqli_query($link,"update home_description set home_description='$_POST[add_desc]'")or die(mysqli_errno($link));
                        ?>
                        <script type="text/javascript">

                            alert("Homepage Description Successfully Updated");
                            location.href=location.href;

                        </script>


                        <?php

                    }


                    ?>
                    </form>
                </div>
            </div>
        </div>
    </div><!--/.row-->

    <!--/.row-->

    <!--/.row-->
</div>	<!--/.main-->

<?php include "footer.php"; ?>