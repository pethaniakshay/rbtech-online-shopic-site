<?php
session_start();
?>
    <!DOCTYPE html>
    <html>
    <head>
        <?php include "design.php"; ?>
    </head>
    <title>All Products | R.B.Tech Admin</title>

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
                <div class="panel-heading">All Product</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table">
                                <thead class="thead-inverse">
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Features</th>
                                    <th>width</th>
                                    <th>Height</th>
                                    <th>Flavour</th>
                                    <th>PIB Number</th>
                                    <th>PIB Type</th>
                                    <th>POB Number</th>
                                    <th>Price</th>

                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
<?php
include "../connect.php";
$res = mysqli_query($link,"select * from products order by pnum asc");
while ($row = mysqli_fetch_array($res))
{
    $pnum=$row["pnum"];
    $pname=$row["pname"];
    $pdescription=$row["pdescription"];
    $pfeatures=$row["pfeatures"];
    $pwidth=$row["pwidth"];
    $pheight=$row["pheight"];
    $pflavor=$row["pflavor"];
    $pibnum=$row["pibnum"];
    $pibtype=$row["pibtype"];
    $pobnum=$row["pobnum"];
    $pprice=$row["pprice"];
    $pimage=$row["pimage"];

    ?>
                                <tr>
                                    <th scope="row"><?php echo $pnum; ?></th>
                                    <td><img src="<?php echo '../'.$pimage; ?>" name="product image" alt="Product" style="height: 200px; max-width:200px;" class="img img-responsive img-thumbnail"> </td>

                                    <td><?php echo $pname; ?></td>
                                    <td><?php echo $pdescription; ?></td>
                                    <td><?php echo $pfeatures; ?></td>
                                    <td><?php echo $pwidth; ?></td>
                                    <td><?php echo $pheight; ?></td>
                                    <td><?php echo $pflavor; ?></td>
                                    <td><?php echo $pibnum; ?></td>
                                    <td><?php echo $pibtype; ?></td>
                                    <td><?php echo $pobnum; ?></td>
                                    <td><?php echo $pprice; ?></td>
                                     <td><a href="<?php echo 'edit-product.php?pnum='.$pnum; ?>" class="btn btn-primary">Edit</a></td>
                                    <td><a href="<?php echo 'delete-product.php?pnum='.$pnum; ?>" class="btn btn-danger">Delete</a></td>
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