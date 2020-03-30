<?php
session_start();
	unset($_SESSION['sec_email']);
	session_destroy();
 header("Location: index.php");
exit();
?>