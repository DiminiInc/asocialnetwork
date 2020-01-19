<?php
setcookie("username", "", 1);
setcookie("password", "", 1);
session_unset();
session_destroy();
header("location:index.php");
?>