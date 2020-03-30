<?php include 'include/db.php'; 
session_start(); 
$error='' ; 
if ($_POST)
{
	//$name = validation($_POST['name']);
	$subject_id = validation($_POST['subject_id']);
	$sql_insert = "UPDATE as_user SET subject_id='" . $subject_id . "' WHERE email='".$_SESSION['sec_email']."'";
	if (mysqli_query($conn, $sql_insert))
	{
// 		$_SESSION['name'] =$name;
		$success = "Successfully added";
		header("Location: qus.php"); 
	}
	else
	{
		$error = "Not successfully";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admission Test</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<!--[if lt IE 9]> <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script> <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script> <![endif]-->
	<link rel="stylesheet" href="style.css">
</head>

<body class="login">
	<div class="aslogInOuter">
		<div class="logo">
			<a href="http://www.bubt.edu.bd/" target="_blank">
				<img src="images/BUBT-Logo.png" alt="BUBT">
			</a>
		</div>
		<div class="loginInner">
			<?php 
			if(isset($error)){
				echo '<p style="color: red">'.$error.'</p>';
			}
			?>
			<form action="" method="post">
				<!-- <div class="form-group">
					<label>Name</label>
					<input required="" type="text" class="form-control" name="name" required placeholder="Enter Your Name">
				</div> -->

				<div class="form-group">
					<label>Select Program</label>
					<select required class="form-control" id="subject_id" name="subject_id">
						<option value="">--Select Program---</option>
						<?php
						$sql = "SELECT * FROM as_category";
						$result = mysqli_query($conn, $sql);

						while ($row = mysqli_fetch_assoc($result))
							{ ?>
								<option value="<?php echo $row['cat_id'] ?>">
									<?php echo $row['categoryName'] ?>
								</option>
								<?php
							} ?>
						</select>
					</div>
					<div class="form-group">
						<input type="submit" value="Start Exam" class="btn btn-primary" name="log_submit">
					</div>
				</form>
			</div>
		</div>
		<script src="js/jquery.js"></script>
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
		<script src="js/bootstrap.min.js"></script>
		<script src="js/custom.js"></script>
		<script type="text/javascript"></script>
	</body>

	</html>