<div class="right_menu pull-right">
	<?php 
	$id = $_SESSION[ 'id']; 
	$sql="SELECT as_user.name, as_result.re_id  FROM as_result left join as_user on as_user.id=as_result.user_id  WHERE to_user_id='" .$id. "' and is_comp=0 LIMIT 10"; 
	$select_result=mysqli_query($conn, $sql);
	$count = mysqli_num_rows($select_result);

	$sql="SELECT point  FROM as_user WHERE id='" .$id. "'"; 
	$user_result=mysqli_query($conn, $sql);
	$user_data = mysqli_fetch_array($user_result);

	?>

	<div class="btn-group">
		<button type="button" class="btn btn btn-success dropdown-toggle">
			<?=$_SESSION['name'];?>
		</button>
	</div>
	<div class="btn-group">
		<a class="btn btn-info" href="./logout.php">Logout</a>
	</div>
</div>
