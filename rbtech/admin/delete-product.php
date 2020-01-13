<?php

include "../connect.php";
$pnum=$_GET['pnum'];

$res=mysqli_query($link,"select * from products where pnum='$pnum'");
while($row=mysqli_fetch_array($res))
{
    $photo=$row["pimage"];
}
$photo="../".$photo;
unlink($photo);




mysqli_query($link,"delete from products where pnum='$pnum'");
?>
<script type="text/javascript">

    alert("Your Product Sucuessfully");
    window.location = "all-product.php"


</script>
