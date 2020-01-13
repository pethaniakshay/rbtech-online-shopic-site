<?php
session_start();
?>
    <!DOCTYPE html>
    <html>
    <head>
        <?php include "design.php"; ?>


    </head>
    <title>Edit Product | R.B.Tech Admin</title>
<?php
include "../connect.php";
$pnum=$_GET['pnum'];
$res = mysqli_query($link,"select * from products where pnum='$pnum' ");
while ($row = mysqli_fetch_array($res)) {
    $pnum = $row["pnum"];
    $main_category=$row["main_category_name"];
    $sub_category=$row["sub_category_name"];
    $sub_sub_category=$row["sub_sub_category_name"];
    $pro_name = $row["pname"];
    $pdescription = $row["pdescription"];
    $pfeatures = $row["pfeatures"];
    $pwidth = $row["pwidth"];
    $pheight = $row["pheight"];
    $pflavor = $row["pflavor"];
    $pibnum = $row["pibnum"];
    $pibtype = $row["pibtype"];
    $pobnum = $row["pobnum"];
    $pprice = $row["pprice"];
    $pimage = $row["pimage"];

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
                <div class="panel-heading">Edit Product</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                                <fieldset>
                                    <div class="form-group">


                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Select Main Category</label>

                                            <div class="col-md-4">
                                                <select name="main_category_name" id="category-group" class="form-control selecter">
                                                    <option selected='selected'  class='form-control selected' value="<?php echo $main_category; ?>"><?php echo $main_category; ?></option>

                                                    <?php

                                                    $res1=mysqli_query($link,"select * from main_category");
                                                    while($row1=mysqli_fetch_array($res1))
                                                    {

                                                        ?>

                                                        <option value="<?php echo $row1['main_category_name'];?>"><?php echo $row1['main_category_name'];?></option> <?php } ?>
                                                </select>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Select Sub Category</label>

                                            <div class="col-md-4">
                                                <select name="sub_category_name" id="category-group" class="form-control selecter">
                                                    <option selected='selected'  class='form-control selected'><?php echo $sub_category; ?></option>
                                                    <?php

                                                    $res2=mysqli_query($link,"select * from sub_category");
                                                    while($row2=mysqli_fetch_array($res2))
                                                    {

                                                        ?>
                                                        <option value="<?php echo $row2['sub_category_name'];?>"><?php echo $row2['sub_category_name'];?></option>
                                                    <?php } ?>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Select Sub Sub Category</label>

                                            <div class="col-md-4">
                                                <select name="sub_sub_category_name" id="category-group" class="form-control selecter">
                                                    <option selected='selected'  class='form-control selected'><?php echo $sub_sub_category; ?></option>
                                                    <?php

                                                    $res3=mysqli_query($link,"select * from sub_sub_category");
                                                    while($row3=mysqli_fetch_array($res3))
                                                    {

                                                        ?>
                                                        <option value="<?php echo $row3['sub_sub_category_name'];?>"><?php echo $row3['sub_sub_category_name'];?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Product Name</label>

                                        <div class="col-md-8">
                                            <input id="pname" type="text" name="pname" placeholder="Product Name"
                                                   class="form-control input-md" required="" value="<?php echo $pro_name; ?>" >

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="textarea">Product Description</label>

                                        <div class="col-md-8">
                                            <textarea class="form-control" required id="textarea" name="pdescription"><?php echo $pdescription;?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="textarea">Product Features</label>

                                        <div class="col-md-8">
                                            <textarea class="form-control" required id="textarea" name="pfeatures" placeholder="Describe Product Features Here"><?php echo $pfeatures;?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="size">Size</label>

                                        <div class="col-md-4">
                                            <input id="size" name="pwidth" class="form-control"
                                                   placeholder="Enter Width" required="" type="text" value="<?php echo $pwidth;?>"> x
                                            <input id="size" name="pheight" class="form-control"
                                                   placeholder="Enter Height" required="" type="text" value="<?php echo $pheight;?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Flavor</label>

                                        <div class="col-md-8">
                                            <select name="pflavor" id="category-group" class="form-control selecter">
                                                <option selected='selected' class='form-control selected'><?php echo $pflavor; ?></option>
                                                <option value="Lemon">Lemon</option>
                                                <option value="Lavender"">Lavender</option>
                                                <option value="Aloevera & Cucumber Mix">Aloevera & Cucumber Mix</option>
                                                <option value="As Per Requirement">As Per Requirement</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Packaging Of Inner Box</label>

                                        <div class="col-md-4">
                                            <input id="pibnum" name="pibnum" class="form-control"
                                                   placeholder="" required="" type="text" value="<?php echo $pibnum; ?>">
                                            <select name="pibtype" id="category-group" class="form-control selecter">
                                                <option selected='selected' class='form-control selected'><?php echo $pibtype; ?></option>
                                                <option value="pcs/IB">pcs/IB</option>
                                                <option value="Pkts/IB">Pkts/IB</option>
                                                <option value="Rolls/IB">Rolls/IB</option>
                                                <option value="pcs/bag">pcs/bag</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Packaging Of Outer Box</label>

                                        <div class="col-md-4">
                                            <input id="pobnum" name="pobnum" class="form-control"
                                                   placeholder="" required="" type="text" value="<?php echo $pobnum;?>">
                                            <label> IB/OB </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="Price">Price</label>

                                        <div class="col-md-4">
                                            <div class="input-group"><span class="input-group-addon">₹</span>
                                                <input id="pprice" name="pprice" class="form-control"
                                                       placeholder="Enter Price" required="" type="text" value="<?php echo $pprice;?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="textarea"> Product Photo </label>
                                        <div class="col-md-6">
                                            <div class="mb10">
                                                <label class="control-label">Select File</label>
                                                <input id="pimage" name="pimage" type="file" multiple class="file-loading">                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label"></label>

                                        <div class="col-md-8">
                                            <input type="submit" class="btn btn-primary" name="submitproduct" id="submit"
                                                                     value="Submit">
                                          <a href="all-product.php" class="btn btn-primary">Cancel</a>
                                        </div>
                                    </div>

                                </fieldset>
                            </form>
                            <?php
                            if (isset($_POST["submitproduct"])) {

                                include "../connect.php";
							 $main_category_name1=mysqli_real_escape_string($link,$_POST['main_category_name']);
                                    $sub_category_name1=mysqli_real_escape_string($link,$_POST['sub_category_name']);
                                    $sub_sub_category_name1=mysqli_real_escape_string($link,$_POST['sub_sub_category_name']);
                                    $pname1=mysqli_real_escape_string($link,$_POST['pname']);
                                    $pdescription1=mysqli_real_escape_string($link,$_POST['pdescription']);
                                    $pfeatures1=mysqli_real_escape_string($link,$_POST['pfeatures']);




                                $fnm=$_FILES["pimage"]["name"];

                                if($fnm=="")
                                {

                                    mysqli_query($link, "update products set main_category_name='$main_category_name1',sub_category_name='$sub_category_name1',sub_sub_category_name='$sub_sub_category_name1', pname='$pname1',pdescription='$pdescription1',pfeatures='$pfeatures1',pwidth='$_POST[pwidth]',pheight='$_POST[pheight]',pflavor='$_POST[pflavor]',pibnum='$_POST[pibnum]',pibtype='$_POST[pibtype]',pobnum='$_POST[pobnum]',pprice='$_POST[pprice]' WHERE pnum='$pnum'") or die(mysqli_errno($link));
                                }
                                else {

                                    $tm=md5(md5(time()));

                                    $dst="../product_images/".$tm.$fnm;
                                    $dst1="product_images/".$tm.$fnm;

                                    move_uploaded_file($_FILES["pimage"]["tmp_name"],$dst);
                                //    echo $_POST["main_category_name"];


                                    $res=mysqli_query($link,"select *  products where pnum='$pnum'");
                                    while($row=mysqli_fetch_array($res))
                                    {
                                        $photo=$row["pimage"];
                                    }
                                    $photo="../".$photo;
                                    unlink($photo);

                                   


                                    mysqli_query($link, "update products set main_category_name='$main_category_name1',sub_category_name='$sub_category_name1',sub_sub_category_name='$sub_sub_category_name1', pname='$pname1',pdescription='$pdescription1',pfeatures='$pfeatures1',pwidth='$_POST[pwidth]',pheight='$_POST[pheight]',pflavor='$_POST[pflavor]',pibnum='$_POST[pibnum]',pibtype='$_POST[pibtype]',pobnum='$_POST[pobnum]',pprice='$_POST[pprice]',pimage='$dst1' WHERE pnum='$pnum'") or die(mysqli_error($link));

                                }
                                ?>
                                <script type="text/javascript">
                                alert("Your Record Updated successfully");
                                 window.location ="all-product.php";
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

    <script>
        $(document).on('ready', function() {
            $("#input-upload-img1").fileinput({
                initialPreview: [
                    '<img src="<?php echo '../product_images'.$pimage; ?>" class="file-preview-image" alt="image 1" title="image 1">'
                ],
                overwriteInitial: true,
                maxFileSize: 150,
                showUpload: false,

                allowedFileExtensions: ["jpg", "jpeg", "png"],
                initialCaption: "Book image 1"
            });
        });
    </script>
