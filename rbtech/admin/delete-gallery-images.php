<?php
$id=$_GET["id"];
include "../connect.php";
$res=mysqli_query($link,"select * from galleryphoto where id=$id");
while($row=mysqli_fetch_array($res))
{
    $photo=$row["photo"];
}
$photo="../".$photo;
unlink($photo);

mysqli_query($link,"delete from galleryphoto where id=$id");

?>

<script type="text/javascript">
    window.location="add-gallery-photo.php";
</script>
