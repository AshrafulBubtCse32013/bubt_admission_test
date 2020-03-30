<?php
include '../include/db.php';
include '../include/session.php';
$id = $_GET['id'];
$sql = "DELETE FROM as_quertion WHERE qus_id = $id";
$sql2 = "DELETE FROM as_option WHERE qus_id = $id";



if ((mysqli_query($conn, $sql))&&(mysqli_query($conn, $sql2))) {
    mysqli_query($conn,"COMMIT");
} else {
    mysqli_query($conn,"ROLLBACK");
}
header("Location: ../all_question.php");
?>