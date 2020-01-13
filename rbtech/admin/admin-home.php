<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<?php include "design.php"; ?>
</head>
<title>Home | R.B Tech Admin</title>

<body>

<?php include "sidebar.php"; ?>
<!--/.sidebar-->

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">


    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
    </div><!--/.row-->

    <?php include "admin-head.php"; ?><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Site Overview</div>
                <div class="panel-body">
                     </div>
            </div>
        </div>
    </div><!--/.row-->

    <!--/.row-->

    <!--/.row-->
</div>	<!--/.main-->

<?php include "footer.php"; ?>