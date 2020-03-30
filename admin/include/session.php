<?php 
session_start(); 
//echo $_SESSION['admin_email'];die();
if($_SESSION['admin_email']==''){
echo "
<script type='text/javascript'>
	window.location.replace('./');
</script>";

}