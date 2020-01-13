<?php
session_start();
include "../connect.php";
?>
    <!DOCTYPE html>
    <html>
    <head>
        <?php include "design.php"; ?>
    </head>
    <title>Add Sub Sub Category | R.B.Tech Admin</title>

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
                                                <option selected='selected' disabled='disabled' class='form-control selected'>Select Main Category</option>

                                                <?php

                                                $res1=mysqli_query($link,"select * from main_category");
                                                while($row1=mysqli_fetch_array($res1))
                                                {

                                                    ?>

                                                    <option><?php echo $row1['main_category_name'];?></option> <?php } ?>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Select Sub Category</label>

                                        <div class="col-md-4">
                                            <select name="sub_category_name" id="category-group" class="form-control selecter">
                                                <option selected='selected' disabled='disabled' class='form-control selected'>Select Sub Category</option>

                                                <?php

                                                $res1=mysqli_query($link,"select * from sub_category");
                                                while($row1=mysqli_fetch_array($res1))
                                                {

                                                    ?>

                                                    <option><?php echo $row1['sub_category_name'];?></option> <?php } ?>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Add Sub Sub Category</label>

                                        <div class="col-md-8">
                                            <input id="pname" name="sub_sub_category_name" placeholder="Add Sub Sub Category"
                                                   class="form-control input-md" required="" type="text">
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
                                $main_category_name1=mysqli_real_escape_string($link,$_POST['main_category_name']);

                                $res1=mysqli_query($link,"select * from main_category where main_category_name='$main_category_name1' ");
                                while($row1=mysqli_fetch_array($res1))
                                {
                                    $main_category_id=$row1['id'];
                                }

                                $sub_category_name1= mysqli_real_escape_string($link,$_POST['sub_category_name']);
                                $res2=mysqli_query($link,"select * from sub_category where sub_category_name='$sub_category_name1' ");
                                while($row2=mysqli_fetch_array($res2))
                                {
                                    $sub_category_id= $row2['id'];
                                }

                                $sub_sub_category_name1=mysqli_real_escape_string($link,$_POST['sub_sub_category_name']);

                                mysqli_query($link,"insert into sub_sub_category(id,main_category_id,sub_category_id,sub_sub_category_name)values (NULL,'$main_category_id','$sub_category_id','$sub_sub_category_name1')") or die(mysqli_errno($link));


                                ?>
                                <script type="text/javascript">
                                    alert("record inserted successfully");
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


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">View Sub Category</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table">
                                <thead class="thead-inverse">
                                <tr>
                                    <th>#</th>
                                    <th>Main Category Name</th>
                                    <th>Sub Category Name</th>
                                    <th>Sub Sub Category Name</th>
                                    <th>Edit</th>
                                    <th>Delete</th>


                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                include "../connect.php";

                                $res = mysqli_query($link,"select * from sub_sub_category");

                                while ($row = mysqli_fetch_array($res))
                                {
                                    $id=$row["id"];
                                    $main_category_id=$row['main_category_id'];
                                    $sub_category_id=$row['sub_category_id'];
                                    $sub_sub_category_name=$row['sub_sub_category_name'];



                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $id; ?></th>
                                        <td><?php $res3=mysqli_query($link,"select * from main_category where id='$main_category_id'");
                                            while ($row3 = mysqli_fetch_array($res3))
                                            {
                                                echo $row3['main_category_name'];
                                            }



                                            ?></td>
                                        <td><?php $res2=mysqli_query($link,"select * from sub_category where id='$sub_category_id'");
                                            while ($row2 = mysqli_fetch_array($res2))
                                            {
                                                echo $row2['sub_category_name'];
                                            }



                                            ?></td>
                                        <td><?php echo $sub_sub_category_name; ?></td>
                                        <td><a href="edit-sub-sub-category.php?id=<?php echo $id; ?>" class="btn btn-primary">Edit</a></td>
                                        <td><a href="del-sub-sub-category.php?id=<?php echo $id; ?>" class="btn btn-danger">Delete</a></td>


                                    </tr>

                                <?php } ?>
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.row-->

    <!--/.row-->

    <!--/.row-->
</div>

<?php include "footer.php"; ?>