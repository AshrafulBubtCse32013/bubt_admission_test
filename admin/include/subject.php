<?php
include 'db.php';
$subject = '<option value="">--Select Subject---</option>';
if(isset($_POST['cat_id'])){
	$cat_id = intval(validation($_POST['cat_id']));
	$sql = "SELECT * FROM as_subject WHERE cat_id = '".$cat_id."'";
	$result = mysqli_query($conn, $sql);
	while ($row = mysqli_fetch_assoc($result)) {
		$subject .= "<option value=".$row['sub_id'].">".$row['subject_name']."</option>";
		
	}
}
echo $subject;
?>