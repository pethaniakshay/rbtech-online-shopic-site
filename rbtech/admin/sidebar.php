<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><span>R.B Tech </span>Admin</a>
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
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <form role="search">
        <div class="form-group">
<label> Admin Area</label>        </div>
    </form>


    <?php
    $pname=basename($_SERVER['PHP_SELF']);
    ?>
    <ul class="nav menu">
        <li <?php if($pname=="admin-home.php"){echo "class=active";} ?>><a href="admin-home.php"><i class="fa fa-cube" aria-hidden="true"></i>&nbsp;Dashboard</a></li><hr>
        <li <?php if($pname=="view-user.php"){echo "class=active";} ?>><a href="view-user.php"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;View User</a></li><hr>
        <li <?php if($pname=="add-product.php"){echo "class=active";} ?>><a href="add-product.php"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Add Product</a></li>
        <li <?php if($pname=="all-product.php"){echo "class=active";} ?>><a href="all-product.php"><i class="fa fa-bars" aria-hidden="true"></i>&nbsp;All Product</a></li><hr>
        <li <?php if($pname=="add-main-category.php"){echo "class=active";} ?>><a href="add-main-category.php"><i class="fa fa-folder-open-o" aria-hidden="true"></i>&nbsp;Add Main Category</a></li>
        <li <?php if($pname=="add-sub-category.php"){echo "class=active";} ?>><a href="add-sub-category.php"><i class="fa fa-folder-open-o" aria-hidden="true"></i>&nbsp;Add Sub Category</a></li>
        <li <?php if($pname=="add-sub-sub-category.php"){echo "class=active";} ?>><a href="add-sub-sub-category.php"><i class="fa fa-folder-open-o" aria-hidden="true"></i>&nbsp;Add Sub Sub Category</a></li><hr>
        <li <?php if($pname=="view-orders.php"){echo "class=active";} ?>><a href="view-orders.php"><i class="fa fa-share" aria-hidden="true"></i>&nbsp;View Orders</a></li>
        <li <?php if($pname=="add-gallery-photo.php"){echo "class=active";} ?>><a href="add-gallery-photo.php"><i class="fa fa-picture-o" aria-hidden="true"></i>&nbsp;Add Gallery Photo</a></li>
        <li <?php if($pname=="home-description.php"){echo "class=active";} ?>><a href="home-description.php"><i class="fa fa-indent" aria-hidden="true"></i>&nbsp;Add Home Description</a></li>



    </ul>

</div>