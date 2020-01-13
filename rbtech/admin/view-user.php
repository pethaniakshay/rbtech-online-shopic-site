<?php
session_start();

?>
    <!DOCTYPE html>
    <html>
    <head>
        <?php include "design.php"; ?>
    </head>
    <title>View User | R.B.Tech Admin</title>

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
                <div class="panel-heading">View Orders</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table">
                                <thead class="thead-inverse">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Addresss</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Pincode</th>
                                    <th>Mobile No.</th>
                                    <th>Edit</th>

                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                include "../connect.php";

                                $res = mysqli_query($link,"select * from user_detail order by id desc")or die(mysqli_errno($link));
                                while ($row = mysqli_fetch_array($res))
                                {
                                    $id=$row['id'];
                                    $name=$row['name'];
                                    $email=$row['email'];
                                    $address=$row['address'];
                                    $city=$row['city'];
                                    $state=$row['state'];
                                    $pincode=$row['pincode'];
                                    $mobile=$row['mobile'];

                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $id; ?></th>
                                        <td><?php echo $name; ?></td>
                                        <td><?php echo $email; ?></td>
                                        <td><?php echo $address ?></td>
                                        <td><?php echo $city; ?></td>
                                        <td><?php echo $state; ?></td>

                                        <td><?php echo $pincode; ?></td>
                                        <td><?php echo $mobile; ?></td>
                                        <td><a href="<?php echo 'edit-user.php?id='.$id; ?>" class="btn btn-primary">Edit</a></td>

                                        <td><a href="<?php echo 'delete-user.php?id='.$id; ?>" class="btn btn-danger">Delete</a></td>
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
</div>	<!--/.main-->

<?php include "footer.php"; ?>