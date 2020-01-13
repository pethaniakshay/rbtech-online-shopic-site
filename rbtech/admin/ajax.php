<?php
include "../connect.php";
$categoryid=$_GET["categoryid"];
$res = mysqli_query($link, "select * from sub_category where main_category_id='$categoryid'");
?>
<select name="sub_category_name" id="category-group"
          class="form-control selecter">

    <?php
while ($row=mysqli_fetch_array($res))
{
   ?>
    <option class='form-control selected'><?php echo $row["sub_category_name"]; ?>
    </option>
    <?php
}
    ?>
</select>



