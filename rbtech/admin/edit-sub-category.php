<?php
session_start();
include "../connect.php";
?>
    <!DOCTYPE html>
    <html>
    <head>
        <?php include "design.php"; ?>
    </head>
    <title>Edit Sub Category | R.B.Tech Admin</title>
<?php
$id=$_GET['id'];

$res=mysqli_query($link,"select main_category_id,sub_category_name from sub_category where id=$id");
while($row=mysqli_fetch_array($res)) {
   $main_category_id=$row["main_category_id"];
    $sub_category_name=$row['sub_category_name'];
}
$res1=mysqli_query($link,"select main_category_name from main_category where id=$main_category_id" );
while($row1=mysqli_fetch_array($res1)) {
    $main_category_name=$row1['main_category_name'];

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
                <div class="panel-heading">Add Sub Categoryt</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                                <fieldset>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Select Main Category</label>

                                        <div class="col-md-4">
                                            <select name="main_category_name" id="category-group" class="form-control selecter">
                                                <option selected='selected' class='form-control selected'><?php echo $main_category_name; ?></option>

                                                <?php
                                                $id=$_GET['id'];

                                                $res1=mysqli_query($link,"select * from main_category");
                                                while($row1=mysqli_fetch_array($res1))
                                                {

                                                    ?>

                                                    <option value="<?php echo $row1['main_category_name'];?>"><?php echo $row1['main_category_name'];?></option> <?php } ?>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Edit Sub Category</label>

                                        <div class="col-md-8">
                                            <input id="pname" name="sub_category" placeholder="Edit Sub Category"
                                                   class="form-control input-md" required="" value="<?php echo $sub_category_name; ?>" type="text">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-3 control-label"></label>

                                        <div class="col-md-8"><input type="submit" class="btn btn-primary" name="submitsubcategory" id="submit"
                                                                     value="Submit"></div>
                                    </div>
                                </fieldset>
                            </form>
                            <?php
                            if (isset($_POST["submitsubcategory"])) {

                                include "../connect.php";
                                $main_category_name1=mysqli_real_escape_string($link,$_POST['main_category_name']);
                                $res3=mysqli_query($link,"select * from main_category where main_category_name='$main_category_name1' ");
                                while($row3=mysqli_fetch_array($res3))
                                {
                                    $main_category_id= $row3['id'];
                                }

                                $sub_category_name1=mysqli_real_escape_string($link,$_POST['sub_category']);
                                mysqli_query($link,"update sub_category set main_category_id='$main_category_id',sub_category_name='$sub_category_name1' where id ='$_GET[id]' ") or die(mysqli_errno($link));


                                ?>
                                <script type="text/javascript">
                                    alert("Category Updated Successfully");
                                    window.location = "add-sub-category.php";
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