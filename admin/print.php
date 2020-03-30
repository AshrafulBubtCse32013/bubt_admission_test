<?php
include 'include/db.php';
include 'include/session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>BUBT | Admission Test</title>
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" href="assets/stylesheets/theme-custom.css">
</head>
<body>
	<?php
	$sql="SELECT * FROM as_subject";
	$select_result_sub = mysqli_query($conn, $sql);
	$k=1;
	while($select_row_sub=mysqli_fetch_array($select_result_sub)){
		$sql="SELECT * FROM as_quertion where sub_id = '" .$select_row_sub['sub_id']. "' ORDER BY rand() limit ".$select_row_sub['subject_limit']."";
		$select_result=mysqli_query($conn, $sql);
		while($select_row=mysqli_fetch_array($select_result)){ 
			$k++;
		} 
	}
	?>
	<table>
		<tr>
			<td width="100px"><img src="./assets/images/logo.png" alt="BUBT" width="90px"></td>
			<td colspan="2" valign="top">
				<h2 align="center">Bangladesh University of Business and Technology (BUBT)</h2>
				<h3 align="center">Admission Test</h3>
			</td>
		</tr>
		<br>
		<tr>
			<td>&nbsp;</td>
			<td colspan="2">
				Name:..............................................&nbsp;&nbsp;
				ID:.....................................&nbsp;&nbsp;
				Program:....................
			</td>
		</tr>
		<br>
		<tr>
			<td>Time: <?php echo --$k;?> Minites</td>
			<td colspan="2" align="right">
				Marks: <?=$k;?> 
			</td>
		</tr>
		<br>
	</table>
<?php
	$sql="SELECT * FROM as_subject";
	$select_result_sub = mysqli_query($conn, $sql);
	$i=1;
	while($select_row_sub=mysqli_fetch_array($select_result_sub)){
		$sql="SELECT * FROM as_quertion where sub_id = '" .$select_row_sub['sub_id']. "' ORDER BY rand() limit ".$select_row_sub['subject_limit']."";
		$select_result=mysqli_query($conn, $sql);
		if(mysqli_num_rows($select_result) > 0){
			echo '<h3 class="subName"><span>Subject:- '.$select_row_sub['subject_name'].'</span></h3>';
		}
		echo '<div class="row clearoption">';
		while($select_row=mysqli_fetch_array($select_result)){ ?>
			<div class="col-md-6">
				<p style="font-size:15px;font-weight:600;"><?php echo $i.' ) '; echo $select_row['quertion']?></p>
				<?php
				$qus_id=$select_row[ 'qus_id']; $sql1="SELECT * FROM as_option where qus_id = '" .$qus_id. "'"; $select_result1=mysqli_query($conn, $sql1);
				echo'<ol type="a">';
				while($select_row1=mysqli_fetch_array($select_result1)){ ?>
					<li><?php echo $select_row1[ 'option'];?></li>
				<?php 
				}
				echo'</ol>';
				?>
			</div>
			<?php $i++;} 
			echo '</div>';
		}
		?>
</body>
</html>