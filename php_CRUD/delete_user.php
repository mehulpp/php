<?php
include 'db.php';
mysqli_query($conn,"DELETE FROM users WHERE userId='" . $_GET["userId"] . "'");
header("Location:list_user.php");
?>