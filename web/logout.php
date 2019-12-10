<?php
	require_once('config/config.php');
    require_once('config/db.php');
    include('inc/header.php');
?>

<?php

session_destroy();

header("location:index.php");
?>


<?php include('inc/footer.php'); ?>