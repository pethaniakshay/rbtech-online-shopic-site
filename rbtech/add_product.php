<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <style>
        .carousel-inner > .item > img,
        .carousel-inner > .item > a > img {
            width: 70%;
            margin: auto;
        }
    </style>
    </head>
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12 page-content">
                <div class="inner-box category-content">
                    <h2 class="title-2 uppercase"><strong> Add Product</strong></h2>

                    <div class="row">
                        <div class="col-sm-12">
                            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                                <fieldset>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Product Name</label>

                                        <div class="col-md-8">
                                            <input id="pname" name="pname" placeholder="Product Name"
                                                   class="form-control input-md" required="" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="textarea">Product Description</label>

                                        <div class="col-md-8">
                                            <textarea class="form-control" id="textarea" name="pdescription" placeholder="Describe Product Here"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="textarea">Product Features</label>

                                        <div class="col-md-8">
                                            <textarea class="form-control" id="textarea" name="pfeatures" placeholder="Describe Product Features Here"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="size">Size</label>

                                        <div class="col-md-4">
                                                <input id="size" name="pwidth" class="form-control"
                                                       placeholder="Enter Width" required="" type="text"> x
                                                <input id="size" name="pheight" class="form-control"
                                                   placeholder="Enter Height" required="" type="text">
                                            </div>
                                        </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Flavor</label>

                                        <div class="col-md-8">
                                            <select name="pflavor" id="category-group" class="form-control selecter">
                                                <option selected='selected' disabled='disabled' class='form-control selected'>Select Flavor</option>
                                                <option>Lemon</option>
                                                <option>Lavender</option>
                                                <option>Aloevera & Cucumber Mix</option>
                                                </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Packaging Of Inner Box</label>

                                        <div class="col-md-4">
                                            <input id="pibnum" name="pibnum" class="form-control"
                                                   placeholder="" required="" type="text">
                                            <select name="pibtype" id="category-group" class="form-control selecter">
                                                <option selected='selected' disabled='disabled' class='form-control selected'>Select Packaging</option>
                                                <option>pcs/IB</option>
                                                <option>Pkts/IB</option>
                                                <option>Rolls/IB</option>
                                                <option>pcs/bag</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Packaging Of Outer Box</label>

                                        <div class="col-md-4">
                                            <input id="pobnum" name="pobnum" class="form-control"
                                                   placeholder="" required="" type="text">
                                            <label> IB/OB </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="Price">Price</label>

                                        <div class="col-md-4">
                                            <div class="input-group"><span class="input-group-addon">₹</span>
                                                <input id="pprice" name="pprice" class="form-control"
                                                       placeholder="Enter Price" required="" type="text">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="textarea"> Product Photo </label>
                                        <div class="col-md-6">
                                            <div class="mb10">
                                                <input id="input-upload-img1" name="pimage" type="file" multiple class="file-loading"
                                                       data-preview-file-type="text">
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

                               include "connect.php";

                                $tm=md5(md5(time()));

                                $fnm=$_FILES["pimage"]["name"];
                                $dst="./images/".$tm.$fnm;
                                $dst1="images/".$tm.$fnm;

                                move_uploaded_file($_FILES["pimage"]["tmp_name"],$dst);

                                mysqli_query($link,"insert into products(pnum,pname,pdescription,pfeatures,pwidth,pheight,pflavor,pibnum,pibtype,pobnum,pprice,pimage)values (NULL,'$_POST[pname]','$_POST[pdescription]','$_POST[pfeatures]','$_POST[pwidth]','$_POST[pheight]','$_POST[pflavor]','$_POST[pibnum]','$_POST[pibtype]','$_POST[pobnum]','$_POST[pprice]','$dst1')") or die(mysqli_errno($link));


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

    </div>

</div>
</html>