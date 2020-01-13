<?php

include "../connect.php";
$id=$_GET['id'];

mysqli_query($link,"delete from sub_sub_category where id='$id'");
?>
<script type="text/javascript">

    alert("Your Sub Sub Category Sucuessfully Deleted");
    window.location = "add-sub-sub-category.php";


</script>
