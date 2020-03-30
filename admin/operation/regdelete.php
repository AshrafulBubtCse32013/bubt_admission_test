<?php
include '../include/db.php';
include '../include/session.php';
$id = $_GET['id'];
$sql = "DELETE FROM as_user WHERE id = $id";
$result  = mysqli_query($conn, $sql);
header("Location: ../all_reg.php");
?>