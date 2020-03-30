<?php
include '../include/db.php';
include '../include/session.php';
$id = $_GET['id'];
$sql = "DELETE FROM as_category WHERE cat_id = $id";
$result  = mysqli_query($conn, $sql);
header("Location: ../all_program.php");
?>