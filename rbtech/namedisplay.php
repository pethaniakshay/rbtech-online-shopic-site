<?php
if(!isset($_SESSION['rbtechname'])) {
}
else{ ?>

    <div class="inner-box category-content">
        <h5 class="title-2 uppercase text-right"><strong>Hello, <?php echo $_SESSION['rbtechname']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></h5>
        <hr>
    </div>
    <?php
}
?>