<?php
session_start();
include "../connect.php";
?>
    <!DOCTYPE html>
    <html>
    <head>
        <?php include "design.php"; ?>
    </head>
    <title>Edit Sub Sub Category | R.B.Tech Admin</title>

<?php
$id=$_GET['id'];

$res=mysqli_query($link,"select * from sub_sub_category where id=$id");
while($row=mysqli_fetch_array($res)) {
    $main_category_id=$row["main_category_id"];
    $sub_category_id=$row['sub_category_id'];
    $sub_sub_category_name=$row['sub_sub_category_name'];
}



?>


<body>
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
                <div class="panel-heading">Edit Sub Sub Category</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                                <fieldset>





                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Edit Sub Sub Category</label>

                                        <div class="col-md-8">
                                            <input id="pname" name="sub_sub_category_name" placeholder="Edit Sub Sub Category"
                                                   class="form-control input-md" required="" value="<?php echo $sub_sub_category_name; ?>" type="text">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-3 control-label"></label>

                                        <div class="col-md-8"><input type="submit" class="btn btn-primary" name="submitsubsubcategory" id="submit"
                                                                     value="Submit"></div>
                                    </div>
                                </fieldset>
                            </form>
                            <?php
                            if (isset($_POST["submitsubsubcategory"])) {


                                include "../connect.php";
                                $sub_sub_category_name =mysqli_real_escape_string($link,$_POST['sub_sub_category_name']);


                                mysqli_query($link,"update sub_sub_category set sub_sub_category_name='$sub_sub_category_name' where id='$_GET[id]'") or die(mysqli_errno($link));


                                ?>
                                <script type="text/javascript">
                                    alert("Category Updated Successfully");
                                    window.location = "add-sub-sub-category.php";

                                </script>
                                <?php


                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.row-->

    <!--/.row-->

    <!--/.row-->
</div>	<!--/.main-->

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">


    <div class="row">
        <div class="col-lg-12">
            <br>
        </div>
    </div><!--/.row-->


    <!--/.row-->

    <!--/.row-->

    <!--/.row-->
</div>

<?php include "footer.php"; ?>