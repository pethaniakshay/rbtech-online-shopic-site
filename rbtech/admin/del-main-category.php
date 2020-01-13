<?php

include "../connect.php";
$id=$_GET['id'];

mysqli_query($link,"delete from main_category where id='$id'");
?>
    <script type="text/javascript">

        alert("Your Main Category Sucuessfully Deleted");
        window.location = "add-main-category.php";


    </script>
