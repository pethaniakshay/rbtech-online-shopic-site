<?php
session_start();

?>
    <!DOCTYPE html>
    <html>
    <head>
        <?php include "design.php"; ?>
    </head>
    <title>Edit User | R.B.Tech Admin</title>

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
<?php
include "../connect.php";
$id=$_GET['id'];
$res = mysqli_query($link,"select * from user_detail where id='$id'");
while ($row = mysqli_fetch_array($res))
{
    $name=$row['name'];
    $email=$row['email'];
    $address=$row['address'];
    $city=$row['city'];
    $state=$row['state'];
    $pincode=$row['pincode'];
    $mobile=$row['mobile'];
}
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">


    <div class="row">
        <div class="col-lg-12">
            <br>
        </div>
    </div><!--/.row-->


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Edit User</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                                <fieldset>

                                    <div class="alert-success text-center" id="msg"><span></span></div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="textarea">Name</label>

                                        <div class="col-md-8">
                                            <textarea class="form-control" required id="name" name="name" ><?php echo $name;?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="textarea">Email</label>

                                        <div class="col-md-8">
                                            <textarea class="form-control" required id="email" name="email" ><?php echo $email;?></textarea>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="textarea">Address</label>

                                        <div class="col-md-8">
                                            <textarea class="form-control" required id="address" name="address" ><?php echo $address;?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="textarea">City</label>

                                        <div class="col-md-8">
                                            <input id="city" name="city" value="<?php echo $city;?>"
                                                   class="form-control input-md" required="" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="textarea">State</label>

                                        <div class="col-md-8">
                                            <input id="state" name="state" value="<?php echo $state;?>"
                                                   class="form-control input-md" required="" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="textarea">Pincode</label>

                                        <div class="col-md-8">
                                            <input id="pincode" name="pincode" value="<?php echo $pincode;?>"
                                                   class="form-control input-md" required="" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="textarea">Mobile Number</label>

                                        <div class="col-md-8">
                                            <input id="mobile" name="mobile" value="<?php echo $mobile;?>"
                                                   class="form-control input-md" required="" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label"></label>

                                        <div class="col-md-8"><input type="submit" class="btn btn-primary" name="save" id="submit"
                                                                     value="Update Detail"></div>
                                    </div>
                                </fieldset>
                            </form>
                            <?php
                            if (isset($_POST["save"])) {

                                include "../connect.php";

                                mysqli_query($link,"update user_detail set name='$_POST[name]', email='$_POST[email]', address='$_POST[address]', city='$_POST[city]',state='$_POST[state]',pincode='$_POST[pincode]',mobile='$_POST[mobile]' WHERE id='$_GET[id]'")or die(mysqli_errno($link));

                                ?>
                                <script type="text/javascript">
                                    window.location="view-user.php";
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

<?php include "footer.php"; ?>