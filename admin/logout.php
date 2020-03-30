<?php
session_start();

unset($_SESSION['admin_email']);
unset($_SESSION['admin_name']);
unset($_SESSION['admin_check']);
session_destroy();
header("Location: index.php");
exit();
?>