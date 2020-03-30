<?php include 'include/db.php'; 
session_start(); 
$error='' ; 
if (isset($_POST['log_submit'])) {
	$log_email=validation($_POST[ 'reg_id']);
	$sql="SELECT * FROM as_user where email = '" .$log_email. "'";
	$result=mysqli_query($conn, $sql); 
	if (mysqli_num_rows($result)>0) { 
		$row = mysqli_fetch_assoc($result);
		$_SESSION['sec_email'] = $row['email'];
		$_SESSION['id'] = $row['id'];
		$_SESSION['name'] = $row['name'];
		$_SESSION['check'] = 1;
		$sql="SELECT * FROM as_result WHERE user_id='".$_SESSION['id']."'";
        $select_result_sub = mysqli_query($conn, $sql);
        $select_row_sub=mysqli_num_rows($select_result_sub);
        if($select_row_sub){
            // $_SESSION['name'] = $row['input_name'];
        	echo "
            <script type='text/javascript'>
            	window.location.replace('./result.php?check=1');
            </script>";
            die;
        }else{
            header("Location: userInfo.php"); 
        }
		
	} else {
		$error = 'Wrong Registration ID'; 
	} 
	mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admission Test</title>
	<link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="./images/favicon.ico" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<!--[if lt IE 9]> <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script> <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script> <![endif]-->
	<link rel="stylesheet" href="style.css">
</head>

<body class="login">
	<div class="aslogInOuter">
		<div class="loginInner">
			<div class="logo">
				<a href="http://www.bubt.edu.bd/" target="_blank">
					<img src="images/BUBT-Logo.png" alt="BUBT">
				</a>
			</div>

			<?php 
			if(isset($error)){
				echo '<p style="color: red">'.$error.'</p>';
			}
			?>
			<form action="" method="post">
				<div class="form-group">
					<label>Registration ID</label>
					<input type="text" class="form-control" name="reg_id" required placeholder="Registration ID">
				</div>
				<div class="form-group">
					<input type="submit" value="Login" class="btn btn-primary" name="log_submit">
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