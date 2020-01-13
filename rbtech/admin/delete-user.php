<?php

include "../connect.php";
$id=$_GET['id'];

mysqli_query($link,"delete from user_detail where id='$_GET[id]'");
?>
<script type="text/javascript">

    alert("User Sucuessfully Deleted");
    window.location = "view-user.php";


</script>
