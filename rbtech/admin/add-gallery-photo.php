<?php
session_start();
include "../connect.php";
?>
    <!DOCTYPE html>
    <html>
    <head>
        <?php include "design.php"; ?>
    </head>
    <title>Add Gallery Photos | R.B.Tech Admin</title>

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
                <div class="panel-heading">Add Product ( width:1000px; height:460px )</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                                <fieldset>
                                        <div class="form-group">
                                        <label class="col-md-3 control-label" for="textarea"> Select Gallery Photo</label>
                                        <div class="col-md-6">
                                            <div class="mb10">
                                                <input id="input-upload-img1" name="pimage" type="file" multiple class="file-loading"
                                                       data-preview-file-type="text" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label"></label>

                                        <div class="col-md-8"><input type="submit" class="btn btn-primary" name="submitproduct" id="submit"
                                                                     value="Submit"></div>
                                    </div>
                                </fieldset>
                            </form>
                            <?php
                            if (isset($_POST["submitproduct"])) {

                                include "../connect.php";

                                $tm=md5(md5(time()));

                                $fnm=$_FILES["pimage"]["name"];
                                $dst="../gallery_images/".$tm.$fnm;
                                $dst1="gallery_images/".$tm.$fnm;

                                move_uploaded_file($_FILES["pimage"]["tmp_name"],$dst);

                                mysqli_query($link,"insert into galleryphoto(id,photo)values (NULL,'$dst1')") or die(mysqli_errno($link));


                                ?>
                                <script type="text/javascript">
                                   window.location.href=window.location.href;
                                </script>
                                <?php


                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>




            <div class="panel panel-default">
                <div class="panel-heading">Uploaded Photo</div>
                <div class="panel-body">
                    <div class="row">
                        <?php
                        $count=0;
                        $res=mysqli_query($link,"select * from galleryphoto order by id desc");
                        while($row=mysqli_fetch_array($res))
                        {
                            $count=$count+1;
                            ?>
                            <div class="col-sm-12">
                                <center>(<?php echo $count; ?>)</center>
                                <br>
                                <img src="../<?php echo $row["photo"]; ?>" width="1000" height="460">
                                <br>
                                <center>
                                <a href="delete-gallery-images.php?id=<?php echo $row["id"]; ?>">Delete this image</a>
                                </center>
                                <hr>

                            </div>
                            <?php

                        }


                        ?>

                    </div>
                </div>
            </div>






















        </div>
    </div><!--/.row-->

    <!--/.row-->

    <!--/.row-->
</div>	<!--/.main-->


<?php include "footer.php"; ?>